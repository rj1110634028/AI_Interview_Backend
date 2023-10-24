<?php

namespace App\Jobs;

use App\Models\InterviewQuestion;
use App\Models\Motion;
use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;

class InterviewVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $videoBlob;

    protected InterviewQuestion $interviewQuestion;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($videoBlob, InterviewQuestion $interviewQuestion)
    {
        $this->videoBlob = $videoBlob;
        $this->interviewQuestion = $interviewQuestion;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $blob_file_path = base_path() . "\/storage\/" . random_int(100000000, 999999999) . '.txt';
        $blob_file = fopen($blob_file_path, "w");
        fwrite($blob_file, $this->videoBlob);
        fclose($blob_file);
        $video_path = base_path() . "\/storage/" . random_int(100000000, 999999999) . '.mp4';
        $process = new Process([config('app.python_command_prefix'), base_path() . '/script/base64ToMp4/main.py', $blob_file_path, $video_path]);
        $process->run();
        $process = new Process([config('app.python_command_prefix'), base_path() . '/script/MockInterview/main.py', $video_path]);
        $process->run();
        $motion_ids = array();
        foreach (explode(',', $process->getOutput()) as $motion) {
            if (preg_match('/^\w+$/', $motion)) {
                array_push($motion_ids, Motion::firstOrCreate(['name' => $motion])->id);
            }
        }
        $this->interviewQuestion->motions()->sync($motion_ids);
        unlink($blob_file_path);
        unlink($video_path);
    }
}
