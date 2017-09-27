@extends('layouts.app') @section('content')
    <div class="title_header"> Create Assessment</div>
    <div class="title_header"> Unit: {{$team->name}}</div>
    <div class="title_header">Unit Leader: {{$assessor->name}}</div>
    </div>
    <div class="well">
    {{Form::open(['url' => 'assessment'])}}
    {{Form::hidden('assessor_id', $assessor->id)}}
    {{Form::hidden('period', '2017')}}
    {{Form::hidden('team_id', $team->id)}}
    @include('partials.radio_button', ['label' => 'College Goal','name' => 'goals', 'id' => 'goal_id'])
    @include('partials.textfield', ['label' => 'course','name' => 'course'])
    @include('partials.radio_button', ['label' => 'Student Learning Outcome','name' => 'slos', 'id' => 'slo_id'])
    @include('partials.textbox', ['label' => 'Method of Outcome Assessment','name' => 'method'])
    @include('partials.textbox', ['label' => 'Performance Measure','name' => 'measure'])
    {{Form::submit('Submit')}}

@endsection