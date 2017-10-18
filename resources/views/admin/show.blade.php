@extends('layouts.admin') @section('content')
        <div class="title_header"> Assessment</div>
        <div class="title_header"> Unit: {{$team->name}}</div>
        <div class="title_header">Unit Leader: {{$assessor->name}}</div>
    </div>
    {{--<div class="well">--}}
        {{--@include('partials.textbox', ['label' => 'Message to Assessor','name' => 'method'])--}}
        {{--<button type="submit" class="btn btn-primary btn-lg">Submit</button>--}}
    {{--</div>--}}
    <div class="well">
        @include('partials.text', ['label' => 'College Goal','name' => 'selected_goal','field' => 'name'])
        @include('partials.text', ['label' => 'Associated Course','name' => 'selected_course','field' => 'name'])
        @include('partials.text', ['label' => 'Student Learning Outcome','name' => 'selected_slo','field' => 'name'])
        @include('partials.text', ['label' => 'Method of Outcome Assessment','name' => 'assessment','field' => 'method'])
        @include('partials.text', ['label' => 'Performance Measure','name' => 'assessment','field' => 'measure'])


        @if( ! $assessment->submit_date)
            <h2><a href="{{URL::to('/')}}/assessment/{{$assessment->id}}/edit">Modify Assessment</a></h2>
        {{Form::open(['url' => 'assessment/' . $assessment->id ,'method' => 'PUT'])}}
        {{Form::hidden('submit_date', date("Y-m-d")) }}
         {{Form::hidden('submitted', '1')}}
            <button type="submit" class="btn btn-lg btn-primary">Submit Assessment</button>
        {{Form::close()}}
        @endif
@endsection