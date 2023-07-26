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
        $discussion = Discussion::with(['user:id,name,sex', 'category:id,name', 'tags:id,name'])->get()->map(function ($item) {
            $tags = $item['tags']->map(function ($item) {
                return $item->name;
            });
            unset($item['tags']);
            $item['tags'] = $tags;
            return Arr::except($item, ['user_id', 'category_id']);
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
        //
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
