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

Route::resource('goal', 'GoalController');
Route::resource('reporting', 'ReportingController');
Route::get('reporting/team/{team_id}', 'ReportingController@team');
Route::get('reporting/print_assessment/{team_id}', 'ReportingController@printAssessment');

Route::get('goal/deactivate/{goal_id}', 'GoalController@deactivate');

Route::resource('course', 'CourseController');
Route::resource('assessor', 'AssessorController');
Route::post('assessor/remove_team', 'AssessorController@removeTeam');
Route::resource('slo', 'SloController');
Route::resource('team', 'TeamController');
Route::resource('comment', 'CommentController');
Route::get('comment/by_assessment/{assessment_id}', 'CommentController@byAssessment');

//Assessment
Route::resource('assessment', 'AssessmentController', ['except' => ['create']]);
Route::get('assessment/create/{team_id}/{assessor_id}', 'AssessmentController@create');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', 'DashboardController@index');
Route::get('dashboard/{username}', 'DashboardController@show');
Route::get('dashboard/assessor/{assessor_id}', 'DashboardController@assessor');
Route::get('dashboard/team/{team_id}/{assessor_id}', 'DashboardController@team');
Route::get('dashboard/assessor_auth/{username}', 'DashboardController@assessorAuth');
Route::get('not_auth/', 'DashboardController@notAuth');
//Route::get('dashboard/not_auth/', 'DashboardController@notAuth');
Route::get('no_team/', 'DashboardController@noTeam');
//Route::get('dashboard/no_team/', 'DashboardController@noTeam');

Route::get('admin', 'AdminController@index');
Route::get('admin/show/{assessment_id}', 'AdminController@show');
Route::get('admin/assessment', 'AdminController@assessment');
Route::get('admin/team/{team_id}/{status}', 'AdminController@team');
Route::get('admin/assessment_create/{team_id}/{assessor_id}', 'AdminController@assessmentCreate');
Route::get('admin/{assessment_id}/edit', 'AdminController@edit');
Route::put('admin/{assessment_id}', 'AdminController@update');
Route::get('admin/show_assessments', 'AdminController@showAssessments');

Route::get('access/{username}', 'AccessController@index');
Route::get('not_auth', 'AccessController@notAuth');
Route::get('no_team', 'AccessController@noTeam');

//Route::get('dashboard/reassessment/{team_id}/{assessor_id}/{reassessment_id}', 'DashboardController@reassessment');
Route::get('reassessment', 'ReassessmentController@index');
Route::get('reassessment/create/{team_id}/{assessor_id}/{reassessment_id}', 'ReassessmentController@create');
Route::post('reassessment', 'ReassessmentController@store');
Route::get('reassessment/{reassessment_id}', 'ReassessmentController@show');





