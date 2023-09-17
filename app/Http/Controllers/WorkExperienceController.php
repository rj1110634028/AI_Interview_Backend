<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use App\Http\Requests\StoreWorkExperienceRequest;
use App\Http\Requests\UpdateWorkExperienceRequest;
use App\Http\Resources\WorkExperienceResource;
use App\Models\Resume;

class WorkExperienceController extends Controller
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
     * @param  \App\Http\Requests\StoreWorkExperienceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkExperienceRequest $request)
    {
        $data = $request->validated();
        $resume = Resume::firstOrCreate(['user_id' => auth()->id()]);
        $workExperience = $resume->workExperiences()->create($data);
        return response()->json(new WorkExperienceResource($workExperience));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function show(WorkExperience $workExperience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkExperienceRequest  $request
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkExperienceRequest $request, WorkExperience $workExperience)
    {
        $data = $request->validated();
        $workExperience->update($data);
        return response()->json(new WorkExperienceResource($workExperience));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkExperience $workExperience)
    {
        //
    }
}
