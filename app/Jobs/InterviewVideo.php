<?php

namespace App\Jobs;

use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Process\Process;

class InterviewVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $videoBlob;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($videoBlob)
    {
        $this->videoBlob = $videoBlob;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $blob_file_path = base_path() . '/storage/interview/' . random_int(100000000, 999999999) . '.txt';
        $blob_file = fopen($blob_file_path, "w");
        fwrite($blob_file, $this->videoBlob);
        fclose($blob_file);
        $video_path = base_path() . '/storage/interview/' . random_int(100000000, 999999999) . '.mp4';
        $process = new Process(['python3', base_path() . '/script/base64ToMp4/main.py', $blob_file_path, $video_path]);
        $result = $process->run();
        if ($result === 0) {
            $process = new Process(['python3', base_path() . '/script/MockInterview/main.py', $video_path]);
            $result = $process->run();
            $result_file = fopen(base_path() . '/storage/interview/result.txt', "w");
            fwrite($result_file, $result);
            fclose($result_file);
        }
    }
}
