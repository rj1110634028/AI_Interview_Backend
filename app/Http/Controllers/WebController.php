<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Experience;
use App\Models\InterviewRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statistics()
    {
        $Data = [
            'user' => User::count(),
            'discussion' => Discussion::count(),
            'experience' => Experience::count(),
            'Interview' => InterviewRecord::count(),
        ];
        return response()->json($Data);
    }
}
