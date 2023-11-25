<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Http\Resources\ExperienceResource;
use Illuminate\Support\Arr;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = [
            'popular'=>ExperienceResource::collection(Experience::withCount(['comments','userFavorites'])->orderBy('comments_count', 'desc')->get()),
            'new'=>ExperienceResource::collection(Experience::withCount(['comments','userFavorites'])->orderBy('created_at', 'desc')->get()),
        ];
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExperienceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExperienceRequest $request)
    {
        $data = $request->validated();
        $user = $request->user;
        $experience = $user->experiences()->create(Arr::except($data,['questions']));
        foreach ($data['questions'] as $item) {
            $experience->question()->create(['question' => $item['question'], 'answer' => $item['answer']]);
        }
        return response()->json(new ExperienceResource($experience));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        return response()->json(new ExperienceResource($experience->loadCount('comments')->loadCount('userFavorites')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExperienceRequest  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $data = $request->validated();
        $experience->update(Arr::except($data,['questions']));
        $experience->question()->delete();
        foreach ($data['questions'] as $item) {
            $experience->question()->create(['question' => $item['question'], 'answer' => $item['answer']]);
        }
        return response()->json(new ExperienceResource($experience));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        if ($experience->user_id !== auth()->user()->id)
            return response()->json(['message' => 'Forbidden'], 403);
        $experience->delete();
        return response()->json(['message' => 'success']);
    }

    /**
     * Show user's own experiences.
     * 
     * @return \Illuminate\Http\Response
     */
    public function ownExperience()
    {
        $experiences = auth()->user()->experiences;
        return response()->json(ExperienceResource::collection($experiences->loadCount('comments')->loadCount('userFavorites')));
    }
}
