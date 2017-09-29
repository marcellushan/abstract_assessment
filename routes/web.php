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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('goal', 'GoalController');
Route::get('goal/deactivate/{goal_id}', 'GoalController@deactivate');

Route::resource('course', 'CourseController');
Route::resource('assessor', 'AssessorController');
Route::resource('slo', 'SloController');
Route::resource('team', 'TeamController');

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
Route::get('admin/assessment', 'AdminController@assessment');
Route::get('admin/assessment_create/{team_id}/{assessor_id}', 'AdminController@assessmentCreate');
Route::get('admin/{assessment_id}/edit', 'AdminController@edit');
Route::put('admin/{assessment_id}', 'AdminController@update');

Route::get('access/{username}', 'AccessController@index');
Route::get('not_auth', 'AccessController@notAuth');
Route::get('no_team', 'AccessController@noTeam');




