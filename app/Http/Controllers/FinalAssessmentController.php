<?php

namespace App\Http\Controllers;

use App\FinalAssessment;
use Illuminate\Http\Request;

class FinalAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessment = new FinalAssessment();
        $assessment->save();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FinalAssessment  $finalAssessment
     * @return \Illuminate\Http\Response
     */
    public function show(FinalAssessment $finalAssessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FinalAssessment  $finalAssessment
     * @return \Illuminate\Http\Response
     */
    public function edit(FinalAssessment $finalAssessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FinalAssessment  $finalAssessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinalAssessment $finalAssessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FinalAssessment  $finalAssessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinalAssessment $finalAssessment)
    {
        //
    }
}
