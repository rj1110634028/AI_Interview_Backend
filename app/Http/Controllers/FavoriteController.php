<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use App\Models\Discussion;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $discussion = $user->favoriteDiscussions()->get();
        $experience = $user->favoriteExperiences()->get();

        return response()->json(["discussion" => $discussion, "experience" => $experience]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $article_type, $article_id)
    {
        $article = ucfirst('App\\Models\\' . $article_type)::find($article_id);
        if ($article == null)
            return response()->json(["message" => "找不到文章"], 404);
        $user = User::find($request->user->id);
        $article->userFavorites()->sync([$user->id]);
        return response()->json(["message" => "新增成功"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavoriteRequest  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavoriteRequest $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $article_type, $article_id)
    {
        $article = ucfirst('App\\Models\\' . $article_type)::find($article_id);
        if ($article == null)
            return response()->json(["message" => "找不到文章"], 404);
        $user = User::find($request->user->id);
        $article->userFavorites($user)->detach();
        return response()->json(["message" => "刪除成功"]);
    }
}
