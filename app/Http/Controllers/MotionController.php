<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMotionRequest;
use App\Http\Requests\UpdateMotionRequest;
use App\Models\Motion;

class MotionController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMotionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMotionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motion  $motion
     * @return \Illuminate\Http\Response
     */
    public function show(Motion $motion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Motion  $motion
     * @return \Illuminate\Http\Response
     */
    public function edit(Motion $motion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMotionRequest  $request
     * @param  \App\Models\Motion  $motion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMotionRequest $request, Motion $motion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Motion  $motion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motion $motion)
    {
        //
    }
}
