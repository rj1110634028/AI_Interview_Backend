<?php

namespace App\Http\Controllers;

use App\Models\ExperienceQuestionAndAnswers;
use App\Http\Requests\StoreExperienceQuestionAndAnswersRequest;
use App\Http\Requests\UpdateExperienceQuestionAndAnswersRequest;

class ExperienceQuestionAndAnswersController extends Controller
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
     * @param  \App\Http\Requests\StoreExperienceQuestionAndAnswersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExperienceQuestionAndAnswersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExperienceQuestionAndAnswers  $experienceQuestionAndAnswers
     * @return \Illuminate\Http\Response
     */
    public function show(ExperienceQuestionAndAnswers $experienceQuestionAndAnswers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExperienceQuestionAndAnswersRequest  $request
     * @param  \App\Models\ExperienceQuestionAndAnswers  $experienceQuestionAndAnswers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExperienceQuestionAndAnswersRequest $request, ExperienceQuestionAndAnswers $experienceQuestionAndAnswers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExperienceQuestionAndAnswers  $experienceQuestionAndAnswers
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExperienceQuestionAndAnswers $experienceQuestionAndAnswers)
    {
        //
    }
}
