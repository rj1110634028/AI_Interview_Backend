<?php

namespace App\Http\Controllers;

use App\Models\InterviewRecord;
use App\Http\Requests\StoreInterviewRecordRequest;
use App\Http\Requests\UpdateInterviewRecordRequest;

class InterviewRecordController extends Controller
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
     * @param  \App\Http\Requests\StoreInterviewRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInterviewRecordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InterviewRecord  $interviewRecord
     * @return \Illuminate\Http\Response
     */
    public function show(InterviewRecord $interviewRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInterviewRecordRequest  $request
     * @param  \App\Models\InterviewRecord  $interviewRecord
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInterviewRecordRequest $request, InterviewRecord $interviewRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InterviewRecord  $interviewRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(InterviewRecord $interviewRecord)
    {
        //
    }
}
