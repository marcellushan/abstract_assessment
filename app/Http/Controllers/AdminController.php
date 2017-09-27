<?php

namespace App\Http\Controllers;

use App\Assessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Team;

class AdminController extends Controller
{
   public function index()
   {
       return view('admin.index');
   }

    public function assessment()
    {
        $assessors = DB::select('SELECT assessors.id, teams.id as team_id, teams.name as team_name, assessors.name, assessors.username FROM assessors, teams, assessor_team where assessors.id = assessor_team.assessor_id and teams.id = assessor_team.team_id');
        return view('admin.assessment')->with(compact('assessors'));
    }

    public function assessmentCreate ($team_id, $assessor_id)
    {
            $team = Team::find($team_id);
            $assessor = Assessor::find($assessor_id);
            $goals = Goal::get();
            $slos = Slo::where('team_id', '=', $team_id)->get();
//        dd($assessor);
            return view('assessment.create')->with(compact('team','assessor','goals','slos'));

    }
}
