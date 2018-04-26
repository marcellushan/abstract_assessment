<?php

namespace App\Http\Controllers;

use App\Assessor;
use App\Reassessment;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Assessment;
use App\Team;
use App\Goal;
use App\Course;
use App\Slo;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

//    public function __construct(Session $session)
//    {
//        $this->session = $session;
//       if(! $this->session('username'))
//       return redirect('assessor');
//    }


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
        $teams = $assessor->teams;
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
        if(session('username') ||  app('env')  == 'local')
//        if(1 == 1)
//            dd(session('username'));
        {
            $assessor = Assessor::find($assessor_id);
            $team_id = $assessor->teams->pluck('id')[0];
//            dd(session('username'));
            $team = Team::find($team_id);
            $reassessments = Reassessment::where('team_id', '=', $team->id)
                ->where(function ($reassessments) {
                    $reassessments->where('associated_assessment', '=', 0)
                    ->orWhereNull('associated_assessment');})
              ->get();
            $saveds = Assessment::where('team_id', '=', $team_id)
                ->where(function ($saveds) {
                    $saveds->where('submitted', '=', 0)
                        ->orWhereNull('submitted');})
                ->get();

            $submitteds = Assessment::where('team_id', '=', $team_id)->where('submitted', '=', 1)->get();
            $initial_completes =  Assessment::where('team_id','=', $team_id)->whereNotNull('submit_date')->get();
//dd($saveds);
            if($team->final)
                {
                    return view('dashboard.final', compact('assessor','team','initial_completes'));
                }
            else {
                return view('dashboard.assessor', compact('assessor', 'team', 'saveds', 'submitteds', 'reassessments'));
                }
        }
        else
        {
            return redirect('dashboard/assessor_auth/none');
        }
    }

    public function team( $team_id, $assessor_id)
    {
        $assessor = \App\Assessor::find($assessor_id);
        $team = Team::find($team_id);
        $reassessments = Reassessment::where('team_id', '=', $team->id)->whereNull('associated_assessment')->get();
        $saveds = Assessment::where('team_id','=', $team_id)->whereNull('submit_date')->get();
        $submitteds = Assessment::where('team_id','=', $team_id)->whereNotNull('submit_date')->get();
        $initial_completes =  Assessment::where('team_id','=', $team_id)->whereNotNull('submit_date')->get();

foreach ($initial_completes as $initial_complete)
//    dd($initial_complete->finalAssessment);
        if($team->final)
            return view('dashboard.final', compact('assessor','team','initial_completes'));
        return view('dashboard.one_team', compact('assessor','team','saveds','submitteds','reassessments'));
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
                    $destination = 'dashboard/' . $assessor->id;
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

    public function reassessment($team_id, $assessor_id, $reassessment_id)
    {
        $reassessment = Reassessment::find($reassessment_id);
        $team = Team::find($team_id);
        $assessor = Assessor::find($assessor_id);
        $goals = Goal::get();
        $courses = Course::get();
        $slos = Slo::where('team_id', '=', $team_id)->get();
//        dd($assessor);
        return view('dashboard.reassessment')->with(compact('reassessment','team','assessor','goals','courses','slos'));

    }

}
