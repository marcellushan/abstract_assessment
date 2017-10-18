<?php

namespace App\Http\Controllers;

use App\Assessment;
use App\Course;
use Illuminate\Http\Request;
use App\Reassessment;
use App\Assessor;
use App\Team;
use App\Goal;
use App\Slo;

class ReassessmentController extends Controller
{
    public function index()
    {
        $reassessments = Reassessment::get();
//        dd($reassessments);
        return view('reassessment.index')->with(compact('reassessments'));
    }

    public function create($team_id, $assessor_id, $reassessment_id)
    {
        $reassessment = Reassessment::find($reassessment_id);
        $team = Team::find($team_id);
        $assessor = Assessor::find($assessor_id);
        $course = Course::find($reassessment->course_id);
        return view('reassessment.create')->with(compact('reassessment','team','assessor','course'));

    }

    public function show($reassessment_id)
    {
        $reassessment = Reassessment::find($reassessment_id);
        $team = Team::find($reassessment->team_id);
        $course = Course::find($reassessment->course_id);
        $assessor = Assessor::find($reassessment->assessor_id);
        $goal = Goal::find($reassessment->goal_id);
        $slo = Slo::find($reassessment->slo_id);
//        dd($selected_goal);
        return view('reassessment.show')->with(compact('reassessment','team','assessor','goal','course','slo'));

    }

    public function store(Request $request)
    {
    $data = $request->except('_token', 'reassessment_id');
    $assessment = new Assessment($data);
    $assessment->save();
    $reassessment = Reassessment::find($request->reassessment_id);
    $reassessment->associated_assessment = $assessment->id;
    $reassessment->save();
    return redirect('dashboard/' . $assessment->assessor_id);

    }
}
