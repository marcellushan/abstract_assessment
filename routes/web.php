<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'AssessmentController@index');

/*
 * Assessment Controllers
 */
Route::resource('assessment', 'AssessmentController', ['except' => ['create']]);
Route::get('assessment/create/{team_id}/{assessor_id}', 'AssessmentController@create');

/*
 * Assessor Controllers
 */
Route::resource('assessor', 'AssessorController');
Route::post('assessor/remove_team', 'AssessorController@removeTeam');
Route::get('assessor/deactivate/{assessor_id}', 'AssessorController@deactivate');
Route::get('assessor/activate/{assessor_id}', 'AssessorController@activate');

/*
 * Goal Controllers
 */
Route::resource('goal', 'GoalController');
Route::get('goal/deactivate/{goal_id}', 'GoalController@deactivate');
Route::get('goal/activate/{goal_id}', 'GoalController@activate');

/*
 * Team Controllers
 */
Route::resource('team', 'TeamController');
Route::get('team/deactivate/{team_id}', 'TeamController@deactivate');
Route::get('team/activate/{team_id}', 'TeamController@activate');


/*
 * Course Controllers
 */
Route::resource('course', 'CourseController');
Route::get('course/deactivate/{course_id}', 'CourseController@deactivate');
Route::get('course/activate/{course_id}', 'CourseController@activate');

/*
 * SLO Controllers
 */
Route::resource('slo', 'SloController');

/*
 * Comment Controllers
 */
Route::resource('comment', 'CommentController');
Route::get('comment/by_assessment/{assessment_id}', 'CommentController@byAssessment');
Route::get('slo/deactivate/{slo_id}', 'SloController@deactivate');
Route::get('slo/activate/{slo_id}', 'SloController@activate');

/*
 * Reassessment Controllers
 */
Route::get('reassessment', 'ReassessmentController@index');
Route::get('reassessment/create/{team_id}/{assessor_id}/{reassessment_id}', 'ReassessmentController@create');
Route::post('reassessment', 'ReassessmentController@store');
Route::get('reassessment/{reassessment_id}', 'ReassessmentController@show');

/*
 * Dashboard Controllers
 */
Route::get('dashboard', 'DashboardController@index');
Route::get('dashboard/{username}', 'DashboardController@show');
Route::get('dashboard/assessor/{assessor_id}', 'DashboardController@assessor');
Route::get('dashboard/team/{team_id}/{assessor_id}', 'DashboardController@team');
Route::get('dashboard/assessor_auth/{username}', 'DashboardController@assessorAuth');
Route::get('dashboard/not/auth', 'DashboardController@notAuth');
//Route::get('dashboard/not_auth/', 'DashboardController@notAuth');
Route::get('dashboard/no/team', 'DashboardController@noTeam');
//Route::get('dashboard/no_team/', 'DashboardController@noTeam');

/*
 * Admin Controllers
 */
Route::get('admin', 'AdminController@index');
Route::get('admin/show/{assessment_id}', 'AdminController@show');
Route::get('admin/assessment', 'AdminController@assessment');
Route::get('admin/team/{team_id}/{status}', 'AdminController@team');
Route::get('admin/assessment_create/{team_id}/{assessor_id}', 'AdminController@assessmentCreate');
Route::get('admin/{assessment_id}/edit', 'AdminController@edit');
Route::put('admin/{assessment_id}', 'AdminController@update');
Route::get('admin/show_assessments', 'AdminController@showAssessments');
Route::get('admin/deactivate_assessment', 'AdminController@deactivateAssessment');
Route::get('admin/deactivate/{assessment_id}', 'AdminController@deactivate');
Route::get('admin/activate/{assessment_id}', 'AdminController@activate');
Route::post('admin/send_mail', 'AdminController@sendMail');

/*
 * Reporting Controllers
 */
Route::resource('reporting', 'ReportingController');
Route::get('reporting/team/{team_id}', 'ReportingController@team');
Route::get('reporting/print_assessment/{team_id}', 'ReportingController@printAssessment');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');





Route::get('access/{username}', 'AccessController@index');
Route::get('not_auth', 'AccessController@notAuth');
Route::get('no_team', 'AccessController@noTeam');





