<?php

namespace App\Http\Controllers;

use App\Models\ResumesSkill;
use App\Http\Requests\StoreResumesSkillRequest;
use App\Http\Requests\UpdateResumesSkillRequest;

class ResumesSkillController extends Controller
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
     * @param  \App\Http\Requests\StoreResumesSkillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResumesSkillRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResumesSkill  $resumesSkill
     * @return \Illuminate\Http\Response
     */
    public function show(ResumesSkill $resumesSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResumesSkillRequest  $request
     * @param  \App\Models\ResumesSkill  $resumesSkill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResumesSkillRequest $request, ResumesSkill $resumesSkill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResumesSkill  $resumesSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResumesSkill $resumesSkill)
    {
        //
    }
}
