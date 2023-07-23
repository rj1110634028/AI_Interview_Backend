<?php

namespace App\Http\Controllers;

use App\Models\DiscussionTag;
use App\Http\Requests\StoreDiscussionTagRequest;
use App\Http\Requests\UpdateDiscussionTagRequest;

class DiscussionTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiscussionTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscussionTagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiscussionTag  $discussionTag
     * @return \Illuminate\Http\Response
     */
    public function show(DiscussionTag $discussionTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscussionTagRequest  $request
     * @param  \App\Models\DiscussionTag  $discussionTag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscussionTagRequest $request, DiscussionTag $discussionTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiscussionTag  $discussionTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscussionTag $discussionTag)
    {
        //
    }
}
