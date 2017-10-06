<?php

namespace App\Http\Controllers;

use App\Assessment;
use Illuminate\Http\Request;
use App\Reassessment;
use App\Assessor;
use App\Team;

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
        return view('reassessment.create')->with(compact('reassessment','team','assessor'));

    }

    public function store(Request $request)
    {
    $data = $request->except('_token', 'reassessment_id');
    $assessment = new Assessment($data);
    $assessment->save();
    $reassessment = Reassessment::find($request->reassessment_id);
    $reassessment->associated_assessment = $assessment->id;
    $reassessment->save();
    return redirect('dashboard/assessor/' . $assessment->assessor_id);

    }
}
