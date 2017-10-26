@extends('layouts.app') @section('content')
        <div class="title_header"> Assessment</div>
        <div class="title_header"> Unit: {{$team->name}}</div>
        <div class="title_header">Unit Leader: {{$assessor->name}}</div>
    </div>
        {{--@include('partials.dashboard_link')--}}
    <div class="well">
        @if($assessment->submitted)
            <h2>Date Submitted : {{$assessment->submit_date}}</h2>
        @endif
        @include('partials.text', ['label' => 'College Goal','name' => 'selected_goal','field' => 'name'])
        @include('partials.text', ['label' => 'Associated Course','name' => 'selected_course','field' => 'name'])
        @include('partials.text', ['label' => 'Student Learning Outcome','name' => 'selected_slo','field' => 'name'])
        @include('partials.text', ['label' => 'Method of Outcome Assessment','name' => 'assessment','field' => 'method'])
        @include('partials.text', ['label' => 'Performance Measure','name' => 'assessment','field' => 'measure'])


        @if( ! $assessment->submitted)
            <h2><a href="{{URL::to('/')}}/assessment/{{$assessment->id}}/edit">Modify Assessment</a></h2>
        {{Form::open(['url' => 'assessment/' . $assessment->id ,'method' => 'PUT'])}}
        {{Form::hidden('submit_date', date("Y-m-d")) }}
         {{Form::hidden('submitted', '1')}}
            {{--<button type="submit" class="btn btn-lg btn-primary">Submit Assessment</button>--}}
                <button type="submit"  class="btn btn-lg btn-primary" onclick="initial_submit({{$assessment->id}});" >Submit Assessment</button><p>
        {{Form::close()}}
    </div>
        @include('partials.dashboard_link')
        @else
        </div>
        @include('partials.dashboard_submitted_link')
        @endif
@endsection