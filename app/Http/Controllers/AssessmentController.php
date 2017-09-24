<?php

namespace App\Http\Controllers;

use App\Assessment;
use App\Assessor;
use App\Slo;
use App\Team;
use App\Goal;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessments = Assessment::get();
        foreach ($assessments as $assessment) {
            echo "<pre>";
//            print_r($assessment);
            echo $assessment->id;
            echo "</pre>";
        }

        $assessor = Assessor::find(1);
//        $assessor->teams()->attach(1);

//        dd($assessments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($team_id, $assessor_id)
    {
        $team = Team::find($team_id);
        $assessor = Assessor::find($assessor_id);
        $goals = Goal::get();
        $slos = Slo::where('team_id', '=', $team_id)->get();
//        dd($assessor);
        return view('assessment.create')->with(compact('team','assessor','goals','slos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $request->except('_token');

        $assessment = new Assessment($data);
        $assessment->save();
        dd($assessment);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function show(Assessment $assessment)
    {

        $team = Team::find($assessment->team_id);
        $assessor = Assessor::find($assessment->assessor_id);
        $selected_goal = Goal::find($assessment->goal_id);
        $selected_slo = Slo::find($assessment->slo_id);
//        dd($selected_goal);
        return view('assessment.show')->with(compact('assessment','team','assessor','selected_goal','selected_slo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assessment $assessment)
    {
        $team = Team::find($assessment->team_id);
        $assessor = Assessor::find($assessment->assessor_id);
        $selected_goal = Goal::find($assessment->goal_id);
        $selected_slo = Slo::find($assessment->slo_id);
        $goals = Goal::get();
        $slos = Slo::where('team_id', '=', $team->id)->get();
//        dd($assessor);
        return view('assessment.edit')->with(compact('assessment','team','assessor','selected_goal','goals','selected_slo','slos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assessment $assessment)
    {
        $data = $request->except('_token','_method');
        $assessment->update($data);
//        dd($assessment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assessment $assessment)
    {
        //
    }
}
