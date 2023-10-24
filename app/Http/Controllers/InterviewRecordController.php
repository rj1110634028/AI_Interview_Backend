<?php

namespace App\Http\Controllers;

use App\Models\InterviewRecord;
use App\Http\Requests\StoreInterviewRecordRequest;
use App\Http\Requests\UpdateInterviewRecordRequest;
use App\Jobs\InterviewVideo;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

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
        $interviewRecord = InterviewRecord::create(['user_id' => auth()->id(), 'position' => json_encode($data['position'])]);
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
        return response()->json(['questions' => $questions, 'id' => $interviewRecord->id]);
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

    public function analyzeInterviewVideo(Request $request)
    {
        InterviewVideo::dispatch($request['video']);
        return response()->noContent();
    }
}
