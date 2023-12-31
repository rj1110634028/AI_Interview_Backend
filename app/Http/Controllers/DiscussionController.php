<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyDiscussionRequest;
use App\Models\Discussion;
use App\Http\Requests\StoreDiscussionRequest;
use App\Http\Requests\UpdateDiscussionRequest;
use App\Http\Resources\DiscussionResource;
use App\Models\Category;
use App\Models\DiscussionTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;
        $query = Discussion::query()->withCount(['comments', 'userFavorites']);
        $query->when(
            $search,
            function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhereHas(
                        'tags',
                        function ($query) use ($search) {
                            $query->where('name', 'like', "%{$search}%");
                        }
                    );
            }
        );
        $query->when(
            $category,
            function ($query) use ($category) {
                $query->WhereHas(
                    'category',
                    function ($query) use ($category) {
                        $query->where('id', $category);
                    }
                );
            }
        );
        $popular = $query->orderBy('comments_count', 'desc')->get();
        $query->getQuery()->orders = null;
        $new = $query->orderBy('created_at', 'desc')->get();
        $result = [
            'popular' => DiscussionResource::collection($popular),
            'new' => DiscussionResource::collection($new),
        ];
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \App\Http\Requests\StoreDiscussionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscussionRequest $request)
    {
        $data = $request->validated();
        $user = $request->user;
        $category = Category::find($data['category_id']);
        $discussion = new Discussion;
        $discussion->user()->associate($user);
        $discussion->category()->associate($category);
        $discussion->title = $data['title'];
        $discussion->content = $data['content'];
        $discussion->save();
        foreach ($data['tags'] as $item) {
            $tag = Tag::firstOrCreate(['name' => $item]);
            $discussionTag = new DiscussionTag;
            $discussionTag->discussion()->associate($discussion);
            $discussionTag->tag()->associate($tag);
            $discussionTag->save();
        }
        return response()->json(new DiscussionResource($discussion));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        return response()->json(new DiscussionResource($discussion->loadCount('comments')->loadCount('userFavorites')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscussionRequest  $request
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscussionRequest $request, Discussion $discussion)
    {
        $data = $request->validated();
        $discussion->update(Arr::except($data, ['tags']));
        if (array_key_exists('tags', $data)) {
            foreach ($data['tags'] as &$item) {
                $item = Tag::firstOrCreate(['name' => $item])->id;
            }
            $discussion->tags()->sync($data['tags']);
        }
        return response()->json(new DiscussionResource($discussion->loadCount('comments')->loadCount('userFavorites')));
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion)
    {
        if ($discussion->user_id !== auth()->user()->id)
            return response()->json(['message' => 'Forbidden'], 403);
        $discussion->delete();
        return response()->json(['message' => 'success']);
    }

    /**
     * Show user's own discussions.
     * 
     * @return \Illuminate\Http\Response
     */
    public function ownDiscussion()
    {
        $discussions = auth()->user()->discussions;
        return response()->json(DiscussionResource::collection($discussions->loadCount('comments')->loadCount('userFavorites')));
    }

    public function popularTag()
    {
        return Tag::withCount('discussions')->has('discussions')->orderBy('discussions_count', 'desc')->get();
    }
}
