<?php

namespace App\Http\Controllers;

use App\Models\InterviewQuestion;
use App\Http\Requests\StoreInterviewQuestionRequest;
use App\Http\Requests\UpdateInterviewQuestionRequest;

class InterviewQuestionController extends Controller
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
     * @param  \App\Http\Requests\StoreInterviewQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInterviewQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InterviewQuestion  $interviewQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(InterviewQuestion $interviewQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInterviewQuestionRequest  $request
     * @param  \App\Models\InterviewQuestion  $interviewQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInterviewQuestionRequest $request, InterviewQuestion $interviewQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InterviewQuestion  $interviewQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(InterviewQuestion $interviewQuestion)
    {
        //
    }
}
