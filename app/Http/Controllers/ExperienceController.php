<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Models\ExperienceQuestion;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = Experience::all()->map(function ($item) {
            $result = $item->toArray();
            $result['poster_name'] = $item->user->name;
            $result['poster_sex'] = $item->user->sex;
            $result['question'] = $item->question()->get()->map(fn($item)=>$item->question);
            $result['answer'] = $item->question()->get()->map(fn($item)=>$item->answer);
            unset($result['user']);
            return $result;
        });
        return response()->json($experience);
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
        $experience = new Experience();
        $experience->user()->associate($user);
        $experience['company'] = $data["company"];
        $experience['position'] = $data["position"];
        $experience['date'] = $data["date"];
        $experience['result'] = $data["result"];
        $experience['difficulty'] = $data["difficulty"];
        $experience['description'] = $data["description"];
        $experience->save();
        foreach ($data['question'] as $key => $value) {
            $experience->question()->create(['question' => $value, 'answer' => $data['answer'][$key]]);
        }
        $result = $experience->toArray();
        $result['poster_name'] = $experience->user->name;
        $result['poster_sex'] = $experience->user->sex;
        $result['question'] = $experience->question()->get()->map(fn($item)=>$item->question);
        $result['answer'] = $experience->question()->get()->map(fn($item)=>$item->answer);
        unset($result['user']);
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        $result = $experience->toArray();
        $result['poster_name'] = $experience->user->name;
        $result['poster_sex'] = $experience->user->sex;
        $result['question'] = $experience->question()->get()->map(fn($item)=>$item->question);
        $result['answer'] = $experience->question()->get()->map(fn($item)=>$item->answer);
        unset($result['user']);
        return response()->json($result);
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
        //
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
}
