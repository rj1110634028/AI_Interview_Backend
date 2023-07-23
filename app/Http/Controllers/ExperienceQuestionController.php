<?php

namespace App\Http\Controllers;

use App\Models\ExperienceQuestion;
use App\Http\Requests\StoreExperienceQuestionRequest;
use App\Http\Requests\UpdateExperienceQuestionRequest;

class ExperienceQuestionController extends Controller
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
     * @param  \App\Http\Requests\StoreExperienceQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExperienceQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExperienceQuestion  $experienceQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(ExperienceQuestion $experienceQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExperienceQuestionRequest  $request
     * @param  \App\Models\ExperienceQuestion  $experienceQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExperienceQuestionRequest $request, ExperienceQuestion $experienceQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExperienceQuestion  $experienceQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExperienceQuestion $experienceQuestion)
    {
        //
    }
}
