@extends('layouts.app') @section('content')
        <div class="title_header"> Assessment</div>
        <div class="title_header"> Unit: {{$team->name}}</div>
        <div class="title_header">Unit Leader: {{$assessor->name}}</div>
    </div>
    <div class="well">
        @include('partials.text', ['label' => 'College Goal','name' => 'selected_goal','field' => 'name'])
        @include('partials.text', ['label' => 'Associated Course','name' => 'assessment','field' => 'course'])
        @include('partials.text', ['label' => 'Student Learning Outcome','name' => 'selected_slo','field' => 'name'])
        @include('partials.text', ['label' => 'Method of Outcome Assessment','name' => 'assessment','field' => 'method'])
        @include('partials.text', ['label' => 'Performance Measure','name' => 'assessment','field' => 'measure'])

        {{--<a href="{{URL::to('/')}}/assessment/{{$assessment->id}}/edit">edit</a>--}}

        {{--{{Form::open(['url' => 'assessment/' . $assessment->id ,'method' => 'PUT'])}}--}}
        {{--{{Form::hidden('submit_date', date("Y-m-d")) }}--}}
        {{--{{Form::submit('Submit Assessment')}}--}}
        {{--{{Form::close()}}--}}
@endsection