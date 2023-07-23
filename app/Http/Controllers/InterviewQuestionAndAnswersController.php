<?php

namespace App\Http\Controllers;

use App\Models\InterviewQuestionAndAnswers;
use App\Http\Requests\StoreInterviewQuestionAndAnswersRequest;
use App\Http\Requests\UpdateInterviewQuestionAndAnswersRequest;

class InterviewQuestionAndAnswersController extends Controller
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
     * @param  \App\Http\Requests\StoreInterviewQuestionAndAnswersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInterviewQuestionAndAnswersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InterviewQuestionAndAnswers  $interviewQuestionAndAnswers
     * @return \Illuminate\Http\Response
     */
    public function show(InterviewQuestionAndAnswers $interviewQuestionAndAnswers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInterviewQuestionAndAnswersRequest  $request
     * @param  \App\Models\InterviewQuestionAndAnswers  $interviewQuestionAndAnswers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInterviewQuestionAndAnswersRequest $request, InterviewQuestionAndAnswers $interviewQuestionAndAnswers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InterviewQuestionAndAnswers  $interviewQuestionAndAnswers
     * @return \Illuminate\Http\Response
     */
    public function destroy(InterviewQuestionAndAnswers $interviewQuestionAndAnswers)
    {
        //
    }
}
