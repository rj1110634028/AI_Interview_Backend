<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Http\Requests\StoreDiscussionRequest;
use App\Http\Requests\UpdateDiscussionRequest;
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
        $discussion = Discussion::all()->map(function ($item) {
            $item['poster_name'] = $item->user->name;
            $item['poster_sex'] = $item->user->sex;
            $tags = $item->tags->map(fn ($item) => $item->name );
            $category = $item->category->name;
            unset($item['tags'],$item['user'],$item['category']);
            $item['tags'] = $tags;
            $item['category'] = $category;
            return Arr::except($item, ['user_id', 'category_id']);
        });
        return response()->json($discussion);
    }

    /**
     * Store a newly created resource in storage.
     * TODO get user id in token
     * @param  \App\Http\Requests\StoreDiscussionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscussionRequest $request)
    {
        $data = $request->validated();
        $user = User::find(1);
        $category = User::find($data['category_id']);
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
        $discussion['user'] = $discussion->user()->get(['id', 'name', 'sex']);
        $discussion['category'] = $discussion->category()->get(['id', 'name']);
        $discussion['tags'] = $discussion->tags()->get()->map(function ($item) {
            return $item->name;
        });
        return response()->json($discussion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        $discussion['poster_name'] = $discussion->user->name;
        $discussion['poster_sex'] = $discussion->user->sex;
        $discussion['category'] = $discussion->category->name;
        $discussion['tags'] = $discussion->tags()->get()->map(function ($item) {
            return $item->name;
        });
        return response()->json($discussion);
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
            $category = User::find($data['category_id']);
            $discussion->category()->associate($category);
        }
        if (array_key_exists('title', $data))
            $discussion->title = $data['title'];
        if (array_key_exists('content', $data))
            $discussion->content = $data['content'];
        $discussion->save();

        if (array_key_exists('content', $data)) {
            foreach ($data['tags'] as &$item) {
                $item = Tag::firstOrCreate(['name' => $item])->id;
            }
            $discussion->tags()->sync($data['tags']);
        }
        $discussion['poster_name'] = $discussion->user->name;
        $discussion['poster_sex'] = $discussion->user->sex;
        $discussion['category'] = $discussion->category->name;
        $discussion['tags'] = $discussion->tags()->get()->map(function ($item) {
            return $item->name;
        });
        return response()->json($discussion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion)
    {
        //
    }
}
