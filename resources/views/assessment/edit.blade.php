@extends('layouts.app') @section('content')
        <div class="title_header"> Assessment</div>
        <div class="title_header"> Unit: {{$team->name}}</div>
        <div class="title_header">Unit Leader: {{$assessor->name}}</div>
    </div>
    <div class="well">
        {{--{{Form::open(['url' => 'assessment/' . $assessment->id,'method' => 'PUT'])}}--}}
        <form action="{{URL::to('/')}}/assessment/{{$assessment->id}}" method="post" id="assessment">
            {{ csrf_field() }}
            {{Form::hidden('_method', 'PUT')}}
        {{--@include('partials.selected_radio_button', ['label' => 'College Goal','name' => 'goals', 'list_type' => 'goal_id','assessment' => 'record','selection' => 'goal_id'])--}}
        <h2>Goals</h2>
        @foreach($goals as $goal)
            @if($goal->id == $selected_goal->id)
                {{Form::radio('goal_id', $goal->id, true)}} {{$goal->name}}</br>
            @else
                {{Form::radio('goal_id', $goal->id, false)}} {{$goal->name}}</br>
            @endif
        @endforeach
        {{--@include('partials.textfield', ['label' => 'Associated Course','name' => 'course','field' => 'course','record_type' => 'assessment'])--}}
        <h3>Associated Course
            <select name = "course_id">
                <option value="">Select</option>
                @foreach($courses as $course)
                    <option value="{{$course->id}}" @if($assessment->course_id == $course->id) selected @endif >{{$course->name}}</option>
                @endforeach
            </select>
        </h3>
        {{--@include('partials.selected_radio_button', ['label' => 'Student Learning Outcome','name' => 'slos', 'list_type' => 'slo_id','assessment' => 'assessment','selection' => 'slo_id'])--}}
        <h2>Student Learning Outcome</h2>
        @foreach($slos as $slo)
            @if($slo->id == $selected_slo->id)
                {{Form::radio('slo_id', $slo->id, true)}} {{$slo->name}}</br>
            @else
                {{Form::radio('slo_id', $slo->id, false)}} {{$slo->name}}</br>
            @endif
        @endforeach
        {{--@include('partials.radio_button', ['label' => 'Student Learning Outcome','name' => 'slos', 'id' => 'slo_id'])--}}
        @include('partials.textbox', ['label' => 'Method of Outcome Assessment','name' => 'method','field' => 'method','record_type' => 'assessment'])
        @include('partials.textbox', ['label' => 'Performance Measure','name' => 'measure','field' => 'measure','record_type' => 'assessment'])
        <button type="submit" class="btn btn-lg btn-primary">Save Assessment</button>
        </form>
@endsection