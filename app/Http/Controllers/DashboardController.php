<?php

namespace App\Http\Controllers;

use App\Assessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Assessment;
use App\Team;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $assessors = Assessor::orderBy('name')->get();
        $assessors = DB::select('SELECT assessors.id, teams.name as team_name, assessors.name, assessors.username FROM assessors, teams, assessor_team where assessors.id = assessor_team.assessor_id and teams.id = assessor_team.team_id');
//        dd($assessors);
        return view('dashboard.index')->with(compact('assessors'));
    }
    public function show($id)
    {

        $assessor = Assessor::find($id);
        $teams = $assessor->teams;
//        dd($teams);
        if(count($teams) > 1 )
        {
            return view('dashboard.teams', compact('user','teams','assessments'));
        } elseif (count($teams) < 1 )
        {
            return view('dashboard.no_team');
        }
        else
            return redirect('dashboard/assessor/' . $id );




    }

    public function assessor($assessor_id)
    {
        $assessor = Assessor::find($assessor_id);
//        $teams = $assessor->teams;
        $team_id = $assessor->teams->pluck('id')[0];

        $team = Team::find($team_id);
//        dd($team);
        $saveds = Assessment::where('team_id','=', $team_id)->whereNull('submit_date')->get();
        $submitteds = Assessment::where('team_id','=', $team_id)->whereNotNull('submit_date')->get();
//        dd($saveds);
//        foreach ($saveds as $saved)
//            dd($saveds);
        return view('dashboard.assessor', compact('assessor','team','saveds','submitteds'));
    }

    public function team($user_id, $team_id)
    {
        $user = \App\User::find($user_id);
        $assessments = \App\Assessment::where('team_id','=', $team_id)->get();
        $team = \App\Team::find($team_id);
        return view('dashboard.index', compact('user','team','assessments'));
    }
}
