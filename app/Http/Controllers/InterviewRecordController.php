<?php

namespace App\Http\Controllers;

use App\Models\InterviewRecord;
use App\Http\Requests\StoreInterviewRecordRequest;
use App\Http\Requests\UpdateInterviewRecordRequest;
use App\Models\Motion;
use Illuminate\Database\Eloquent\Builder;

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
        $data = $request->validated();
        $interviewRecord = InterviewRecord::create(['user_id' => auth()->id(), 'position' => $data['position']]);
        $type = $data['position']['type'];
        $path = config('app.interview_question');
        $jsonString = file_get_contents($path);
        $all_questions = json_decode($jsonString, true);
        $questions = array();
        foreach ($all_questions as $row) {
            if (in_array($row['type'], ['basic', 'start'])) {
                array_push($questions, $row['data'][array_rand($row['data'])]);
            }
            if ($row['type'] == $type) {
                foreach (array_rand($row['data'], 3) as $value) {
                    array_push($questions, $row['data'][$value]);
                }
            }
        }
        foreach ($questions as $question) {
            $question = $interviewRecord->interview_questions()->create(['question' => $question]);
        }
        return response()->json(['questions' => $interviewRecord->interview_questions, 'id' => $interviewRecord->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InterviewRecord  $interviewRecord
     * @return \Illuminate\Http\Response
     */
    public function show(InterviewRecord $interview_record)
    {
        $interview_questions = $interview_record->interview_questions;
        $is_analyze = true;
        foreach ($interview_questions as $interview_question) {
            if (!($is_analyze && $interview_question->is_analyze))
                return response()->json(['message' => '請在稍後，正在努力為您分析面試資料。'], 400);
            $is_analyze = $is_analyze && $interview_question->is_analyze;
        }

        return response()->json($interview_record);
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
