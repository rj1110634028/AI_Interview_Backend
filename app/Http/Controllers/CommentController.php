<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Discussion;
use App\Models\Experience;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($article_type, $article_id)
    {
        $article = ucfirst('App\\Models\\'.$article_type)::find($article_id);
        $result = $article->comments()->get()->map(function ($item) {
            $item['poster_name'] = $item->user->name;
            $item['poster_sex'] = $item->user->sex;
            unset($item['user']);
            return $item;
        });
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request, $article_type, $article_id)
    {
        $data = $request->validated();
        $article = ucfirst('App\\Models\\'.$article_type)::find($article_id);
        $comment = $article->comments()->create(array_merge(
            $data,
            ['user_id' => auth()->user()->id]
        ));
        if ($comment !== null)
            return response()->json(['message' => 'seccuss']);
        return response()->json(['message' => 'server error'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        if ($comment !== null)
            return response()->json(['message' => 'seccuss']);
        return response()->json(['message' => 'server error'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== auth()->user()->id)
            return response()->json(['message' => 'Forbidden'], 403);
        $comment->delete();
        return response()->json(['message' => 'seccuss']);
    }
}
