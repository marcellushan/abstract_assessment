@extends('layouts.dashboard') @section('content')
    <div class="title_header"> Create Assessment</div>
    <div class="title_header"> Unit: {{$team->name}}</div>
    <div class="title_header">Unit Leader: {{$assessor->name}}</div>
    </div>
    <div class="well">
    <form action="{{URL::to('/')}}/assessment" method="post" id="assessment">
        {{ csrf_field() }}
    {{Form::hidden('assessor_id', $assessor->id)}}
    {{Form::hidden('period', '2018')}}
    {{Form::hidden('team_id', $team->id)}}
    @include('partials.radio_button', ['label' => 'College Goal','name' => 'goals', 'id' => 'goal_id', 'required'  => 'required'])
    <h3>Associated Course
    <select name = "course_id">
        <option value="">Select</option>
    @foreach($courses as $course)
        <option value="{{$course->id}}">{{$course->name}}</option>
        @endforeach
        </select>
    </h3>
    {{--@include('partials.textfield', ['label' => 'course','name' => 'course'])--}}
    {{--@include('partials.ajax_name')--}}
    @include('partials.radio_button', ['label' => 'Student Learning Outcome','name' => 'slos', 'id' => 'slo_id'])
    @include('partials.textbox', ['label' => 'Method of Outcome Assessment','name' => 'method'])
    @include('partials.textbox', ['label' => 'Performance Measure','name' => 'measure'])
   <button type="submit" class="btn btn-lg btn-primary">Save Assessment</button>
    </form>
@endsection