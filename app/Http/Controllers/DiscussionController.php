<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyDiscussionRequest;
use App\Models\Discussion;
use App\Http\Requests\StoreDiscussionRequest;
use App\Http\Requests\UpdateDiscussionRequest;
use App\Models\Category;
use App\Models\DiscussionTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discussion = Discussion::withCount('comments')->withCount('userFavorites')->get()->map(function ($item) {
            $result = $item->toArray();
            $result['poster_name'] = $item->user->name;
            $result['poster_sex'] = $item->user->sex;
            $result['category'] = $item->category->name;
            $result['tags'] = $item->tags()->get()->map(function ($item) {
                return $item->name;
            });
            return $result;
        });
        return response()->json($discussion);
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
        $result = $discussion->toArray();
        $result['poster_name'] = $discussion->user->name;
        $result['poster_sex'] = $discussion->user->sex;
        $result['category'] = $discussion->category->name;
        $result['tags'] = $discussion->tags()->get()->map(function ($item) {
            return $item->name;
        });
        return response()->json(Arr::except($result, ['user']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        $result = $discussion->toArray();
        $result['poster_name'] = $discussion->user->name;
        $result['poster_sex'] = $discussion->user->sex;
        $result['category'] = $discussion->category->name;
        $result['tags'] = $discussion->tags()->get()->map(function ($item) {
            return $item->name;
        });
        return response()->json($result);
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
        if (array_key_exists('category_id', $data)) {
            $category = Category::find($data['category_id']);
            $discussion->category()->associate($category);
        }
        if (array_key_exists('title', $data))
            $discussion->title = $data['title'];

        if (array_key_exists('content', $data))
            $discussion->content = $data['content'];
        $discussion->save();

        if (array_key_exists('tags', $data)) {
            foreach ($data['tags'] as &$item) {
                $item = Tag::firstOrCreate(['name' => $item])->id;
            }
            $discussion->tags()->sync($data['tags']);
        }
        $result = $discussion->toArray();
        $result['poster_name'] = $discussion->user->name;
        $result['poster_sex'] = $discussion->user->sex;
        $result['category'] = $discussion->category->name;
        $result['tags'] = $discussion->tags()->get()->map(function ($item) {
            return $item->name;
        });
        return response()->json(Arr::except($result, ['user']));
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
}
