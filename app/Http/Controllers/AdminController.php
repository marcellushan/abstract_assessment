<?php

namespace App\Http\Controllers;

use App\Assessment;
use App\Assessor;
use App\FinalAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Team;
use App\Goal;
use App\Course;
use App\Slo;
use App\Result;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

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

    public function edit($assessment_id)
    {
        $assessment = Assessment::find($assessment_id);
        $team = Team::find($assessment->team_id);
        $assessor = Assessor::find($assessment->assessor_id);
        $selected_goal = Goal::find($assessment->goal_id);
        $selected_course = Course::find($assessment->course_id);

        $courses = Course::get();
        $selected_slo = Slo::find($assessment->slo_id);
        $goals = Goal::get();
        $slos = Slo::where('team_id', '=', $team->id)->get();
        $finalAssessment = $assessment->finalAssessment;
        $results = Result::get();
//        dd($team);
        return view('admin.edit')->with(compact('assessment','team','assessor','selected_goal','goals','selected_course',
        'courses','selected_slo','slos','finalAssessment','results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $assessment_id)
    {
        $assessment = Assessment::find($assessment_id);
        $finalAssessment =$assessment->finalAssessment;
        $data = $request->except('_token','_method');
        ($finalAssessment ? $finalAssessment->update($data) : $assessment->update($data));
//        dd($finalAssessment);
        return redirect('admin/show_assessments');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function showAssessments()
    {
//        $teams = Team::orderBy('name')->get();
        $initialTeams = Team::whereNull('final')->orWhere('final', '=', 0)->orderBy('name')->get();
        $finalTeams = Team::where('final', '=', 1)->orderBy('name')->get();


//        dd($finalTeams);
        return view('admin.show_assessments')->with(compact('initialTeams','finalTeams'));
    }

    public function deactivateAssessment()
    {
        $assessments = DB::select('SELECT assessments.id, teams.name as team_name, assessors.name as assessor_name, course_id, courses.name as course_name, slos.name as slo_name, submit_date 
                                FROM assessments, assessors, teams, slos, courses where assessments.assessor_id = assessors.id 
                                and assessments.team_id = teams.id and assessments.slo_id = slos.id and assessments.course_id = courses.id and assessments.inactive = 0 order by team_name');
        $inactives = DB::select('SELECT assessments.id, teams.name as team_name, assessors.name as assessor_name, course_id, courses.name as course_name, slos.name as slo_name, submit_date 
                                FROM assessments, assessors, teams, slos, courses where assessments.assessor_id = assessors.id 
                                and assessments.team_id = teams.id and assessments.slo_id = slos.id and assessments.course_id = courses.id and assessments.inactive = 1');
//        dd($assessments);

        return view('admin.deactivate_assessment')->with(compact('assessments','inactives'));
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

//        dd($selected_goal);
        return view('admin.show')->with(compact('assessment','team','assessor','selected_goal','selected_slo','selected_course','finalAssessment'));
    }

        public function team($id, $status)
    {
        $model = new Team;
        $record = $model::find($id);

        switch ($status) {
            case 1:
                $assessment_status = 'draft';
                break;
            case 2:
                $assessment_status = 'complete';
                break;
            case 3:
                $assessment_status = 'final_draft';
                break;
            case 4:
                $assessment_status = 'final_complete';
                break;
        }

//        ($status== 1 ? $assessment_status = 'draft' : $assessment_status = 'complete');
//        dd($assessment_status);
        return view('admin.' . $assessment_status)->with(compact('record'));
//        dd($record->assessments);

    }

    public function activate($id)
    {
        $model = new Assessment;
        $record = $model::find($id);
//        $data = $request->except(['_token','_method']);
        $record->inactive = 0;
        $record->save();
        return redirect('admin/deactivate_assessment');
    }

    public function deactivate($id)
    {
        $model = new Assessment;
        $record = $model::find($id);
//        $data = $request->except(['_token','_method']);
        $record->inactive = 1;
        $record->save();
        return redirect('admin/deactivate_assessment');
    }

    public function sendMail(Request $request)
    {
//        Mail::to($request->user())->send(new OrderShipped($order));
$assessment = Assessment::find($request->assessment_id);
//$mine = $request->mine;
//dd($request);
        Mail::to($assessment->assessor->username . '@highlands.edu')->send(new SendMail($request->return_reason, $request->assessment_id));
        ($assessment->final_submitted ? $assessment->final_submitted = 0 : $assessment->submitted = 0);
        $assessment->save();
        return redirect('admin/show_assessments');
    }
}
