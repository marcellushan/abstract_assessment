<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assessment;
use App\Team;
use App\Goal;
use App\Assessor;
use App\Course;
use App\Slo;
use App\FinalAssessment;

class ReportingController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($assessment_id)
    {
        $assessment = Assessment::find($assessment_id);
        $team = Team::find($assessment->team_id);
        $assessor = Assessor::find($assessment->assessor_id);
        $selected_goal = Goal::find($assessment->goal_id);
        $selected_course= Course::find($assessment->course_id);
        $selected_slo = Slo::find($assessment->slo_id);
        $finalAssessment = $assessment->finalAssessment;

//        dd($finalAssessment);
//        if($assessment->final_submitted)
//            return view('reporting.final_show')->with(compact('assessment','team',
//            'assessor','selected_goal','selected_slo','selected_course','finalAssessment'));
        return view('reporting.show')->with(compact('assessment','team',
        'assessor','selected_goal','selected_slo','selected_course','finalAssessment'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function team($id)
    {
        $model = new Team;
        $record = $model::find($id);
//        $team = $record->team;
//        $user = $record->user;
        return view('reporting.team')->with(compact('record'));
//        dd($record);

    }

    public function printAssessment($assessment_id)
    {
        $assessment = Assessment::find($assessment_id);
        $team = Team::find($assessment->team_id);
        $assessor = Assessor::find($assessment->assessor_id);
        $selected_goal = Goal::find($assessment->goal_id);
        $selected_course = Course::find($assessment->course_id);
        $selected_slo = Slo::find($assessment->slo_id);
        if($assessment->finalAssessment) {
            $finalAssessment = $assessment->finalAssessment;
            return view('reporting.final_print')->with(compact('assessment', 'team', 'assessor', 'selected_goal', 'selected_slo', 'selected_course','finalAssessment'));
        }
        return view('reporting.print')->with(compact('assessment', 'team', 'assessor', 'selected_goal', 'selected_slo', 'selected_course'));
    }
}
