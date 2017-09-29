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

//        $assessors = Assessor::orderBy('name')->get();
        $assessors = DB::select('SELECT assessors.id, teams.name as team_name, assessors.name, assessors.username FROM assessors, teams, assessor_team where assessors.id = assessor_team.assessor_id and teams.id = assessor_team.team_id');
//        dd($assessors);
        return view('dashboard.index')->with(compact('assessors'));
    }
    public function show($assessor_id)
    {
//        dd($_SESSION['nameIdentifier']);

        $assessor = Assessor::find($assessor_id);
//        dd($assessor);
//        $request->session()->put('username', $username);
//session(['username' => $username]);
//dd(session('username'));
        $teams = $assessor->teams;
//        dd(count($teams));
        if(count($teams) > 1 )
            {
                return view('dashboard.teams', compact('assessor','teams','assessments'));
            }
        elseif (count($teams) < 1 )
        {
            return view('dashboard.no_team');
        }
        else
            return redirect('dashboard/assessor/' . $assessor_id );
    }

    public function assessor($assessor_id)
    {
//        if( session('username')) {
            $assessor = Assessor::find($assessor_id);
//        if($assessor->teams;
            $team_id = $assessor->teams->pluck('id')[0];

            $team = Team::find($team_id);
//        dd($team);
            $saveds = Assessment::where('team_id', '=', $team_id)->whereNull('submit_date')->get();
            $submitteds = Assessment::where('team_id', '=', $team_id)->whereNotNull('submit_date')->get();
//        dd($saveds);
//        foreach ($saveds as $saved)
//            dd($saveds);
            return view('dashboard.assessor', compact('assessor', 'team', 'saveds', 'submitteds'));
//        }
//        else
//        {
//            return redirect('dashboard/assessor_auth/none');
//        }
    }

    public function team( $team_id, $assessor_id)
    {
        $assessor = \App\Assessor::find($assessor_id);
//        $assessments = \App\Assessment::where('team_id','=', $team_id)->get();
        $saveds = Assessment::where('team_id','=', $team_id)->whereNull('submit_date')->get();
        $submitteds = Assessment::where('team_id','=', $team_id)->whereNotNull('submit_date')->get();
        $team = \App\Team::find($team_id);
        return view('dashboard.one_team', compact('assessor','team','saveds','submitteds'));
    }

    public function assessorAuth( $username)
    {
       if($username == 'none') {
           $destination = 'https://intranet.highlands.edu/marctest/assessment_auth.php';
       } else {
            session(['username' => $username]);
            $assessor = Assessor::where('username', '=',  $username)->first();
            if(@$assessor->teams) {
                if(count($assessor->teams) > 0) {
                    $destination = 'dashboard/assessor/' . $assessor->id;
                } else {
                    $destination = 'no_team';
                }
            } else {
                $destination = 'not_auth';
            }
        }
        return redirect($destination);
    }

    public function notAuth ()
    {
        return view('dashboard.not_auth');
    }

    public function noTeam ()
    {
        return view('dashboard.no_team');
    }

}
