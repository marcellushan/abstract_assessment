<?php

namespace App\Http\Controllers;

use App\FinalAssessment;
use App\Assessment;
use App\Assessor;
use App\Course;
use App\Slo;
use App\Team;
use App\Goal;
use App\Result;
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
    public function create($assessment_id)
    {
        //
        $assessment = Assessment::find($assessment_id);
        $team = Team::find($assessment->team_id);
        $assessor = Assessor::find($assessment->assessor_id);
        $selected_goal = Goal::find($assessment->goal_id);
        $selected_course= Course::find($assessment->course_id);
        $selected_slo = Slo::find($assessment->slo_id);
//        dd($assessment);
        return view('final_assessment.create')->with(compact('assessment','team','assessor',
        'selected_goal','selected_course','selected_slo'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $data = $request->except('_token');
        $final_assessment = new FinalAssessment($data);
        $final_assessment->save();
        $assessment = Assessment::find($final_assessment->assessment_id);
        $assessment->final_saved = 1;
//        $assessment->final_submit_date = date("Y-m-d");
        $assessment->update();
        return redirect('final_assessment/' . $final_assessment->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FinalAssessment  $finalAssessment
     * @return \Illuminate\Http\Response
     */
    public function show(FinalAssessment $finalAssessment)
    {
        $assessment = Assessment::find($finalAssessment->assessment_id);
//        dd($assessment);
        $team = Team::find($assessment->team_id);
        $assessor = Assessor::find($assessment->assessor_id);
        $selected_goal = Goal::find($assessment->goal_id);
        $selected_course= Course::find($assessment->course_id);
        $selected_slo = Slo::find($assessment->slo_id);

//        dd($finalAssessment);
        return view('final_assessment.show')->with(compact('finalAssessment','assessment','team','assessor','selected_goal','selected_slo'
            ,'selected_course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FinalAssessment  $finalAssessment
     * @return \Illuminate\Http\Response
     */
    public function edit(FinalAssessment $finalAssessment)
    {
        $results = Result::get();
//        dd($results);
        $assessment = Assessment::find($finalAssessment->assessment_id);
//        dd($assessment);
        $team = Team::find($assessment->team_id);
        $assessor = Assessor::find($assessment->assessor_id);
        $selected_goal = Goal::find($assessment->goal_id);
        $selected_course= Course::find($assessment->course_id);
        $selected_slo = Slo::find($assessment->slo_id);
//        dd($assessment);
        return view('final_assessment.edit')->with(compact('finalAssessment','assessment','team','assessor'
            ,'selected_goal','selected_course','selected_slo','results'));


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
        $data = $request->except('_token','_method','submitted','submit_date');
        $finalAssessment->update($data);
//        dd($finalAssessment);
        return redirect('final_assessment/' . $finalAssessment->id);
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

    public function submit(Request $request, $assessment_id)
    {
//        $data = $request->except('_token','_method','submitted','submit_date');
        $assessment = Assessment::find($assessment_id);
        $finalAssessment = $assessment->finalAssessment;
        $assessment->final_submitted = 1;
        $assessment->final_submit_date = date("Y-m-d");
        $assessment->update();
        return redirect('final_assessment/' . $finalAssessment->id);
    }


}
