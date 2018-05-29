<?php

namespace App\Http\Controllers;

use App\Assessment;
use App\Assessor;
use App\Comment;
use App\Course;
use App\Goal;
use App\Slo;
use App\Team;
use App\FinalAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//      $assessments = DB::
//      $assessments = DB::select('SELECT assessments.id, teams.name as team_name, assessors.name as assessor_name, course_id, courses.name as course_name, slos.name as slo_name, submit_date
//                                FROM assessments, assessors, teams, slos, courses where assessments.assessor_id = assessors.id
//                                and assessments.team_id = teams.id and assessments.slo_id = slos.id and assessments.course_id = courses.id and assessments.submitted = 1');
        $assessments = DB::select('SELECT DISTINCT teams.name as team_name,  teams.id as team_id
                                FROM assessments, assessors, teams, slos, courses where assessments.assessor_id = assessors.id 
                                and assessments.team_id = teams.id and assessments.slo_id = slos.id and assessments.course_id = courses.id and assessments.submitted = 1 order by team_name');
//        dd($assessments);
        return view ('comment.show')->with(compact('assessments'));

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
        $data = $request->except('_token');
//        dd($request);
        $comment = new Comment($data);
        $comment->user_id = Auth::id();
        $comment->save();
//        $record = $model;
        return redirect( 'comment/by_assessment/' . $request->assessment_id);
//     dd($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function byAssessment ($assessment_id)
    {
        $assessment = Assessment::find($assessment_id);
//        $finalAssessment = FinalAssessment::find($assessment_id);
        $finalAssessment = $assessment->finalAssessment;

        $assessor = Assessor::find($assessment->assessor_id);
        $team = Team::find($assessment->team_id);
        $selected_slo = Slo::find($assessment->slo_id);
        $selected_course= Course::find($assessment->course_id);
        $selected_goal = Goal::find($assessment->goal_id);
        $comments = Comment::where('assessment_id' ,'=', $assessment_id)->orderBy('created_at', 'desc')->get();
//        dd($comments);
        return view ('comment.list')->with(compact('assessment','assessor','team','selected_course','selected_slo','selected_goal','comments','finalAssessment'));

    }

    public function team( $team_id)
    {
//            echo $team_id;
$team = Team::find($team_id);
if ($team->final)
    $team_assessments = 'SELECT assessments.id, assessments.final_saved, teams.name as team_name, assessors.name as assessor_name, course_id, courses.name as course_name, slos.name as slo_name, submit_date
                                    FROM assessments, assessors, teams, slos, courses where assessments.assessor_id = assessors.id and assessments.team_id = teams.id 
                                    and assessments.slo_id = slos.id and assessments.course_id = courses.id and assessments.submitted = 1 and assessments.final_saved = 1 and assessments.inactive <> 1 and teams.id = ' . $team_id;
    else {
        $team_assessments = 'SELECT assessments.id, teams.name as team_name, assessors.name as assessor_name, course_id, courses.name as course_name, slos.name as slo_name, submit_date
                                    FROM assessments, assessors, teams, slos, courses where assessments.assessor_id = assessors.id and assessments.team_id = teams.id
                                    and assessments.slo_id = slos.id and assessments.course_id = courses.id and assessments.submitted = 1  and assessments.inactive <> 1 and teams.id = ' . $team_id;
   }

        $assessments = DB::select($team_assessments);
//        dd($assessments);
        return view ('comment.index')->with(compact('assessments','team'));
    }
}
