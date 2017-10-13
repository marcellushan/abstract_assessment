@extends('layouts.dashboard') @section('content')
    <div class="title_header"> Create Assessment</div>
    <div class="title_header"> Unit: {{$team->name}}</div>
    <div class="title_header">Unit Leader: {{$assessor->name}}</div>
    </div>
    <div class="well">
        <h1 align="center">2016 - 2017 Assessment Results require reassessment</h1>
        <h2 align="center">Assessor: {{$reassessment->assessor->name}}</h2>
    </div>
    <div class="well">
        <div class="row">
            <div class="col-sm-10">
                <h2>College Goal</h2>
                {{$reassessment->goal->name}}
            </div>
        </div>
        @include('partials.text', ['label' => 'Associated Course','name' => 'course','field' => 'name'])
        <div class="row">
            <div class="col-sm-10">
                <h2>Student Learning Outcome</h2>
                {{$reassessment->slo->name}}
            </div>
        </div>
        {{$reassessment->outcome_assessment}}
        @include('partials.text', ['label' => 'Method of Outcome Assessment','name' => 'reassessment','field' => 'method'])
        @include('partials.text', ['label' => 'Performance Measure','name' => 'reassessment','field' => 'measure'])
        <div class="row">
            @include('partials.small_text', ['label' => 'Floyd','name' => 'reassessment','field' => 'floyd'])
            @include('partials.small_text', ['label' => 'Cartersviille','name' => 'reassessment','field' => 'cartersville'])
            @include('partials.small_text', ['label' => 'Marietta','name' => 'reassessment','field' => 'marietta'])
            @include('partials.small_text', ['label' => 'Paulding','name' => 'reassessment','field' => 'paulding'])
            @include('partials.small_text', ['label' => 'Heritage','name' => 'reassessment','field' => 'heritage'])
            @include('partials.small_text', ['label' => 'Douglasville','name' => 'reassessment','field' => 'douglasville'])
            @include('partials.small_text', ['label' => 'eLearning','name' => 'reassessment','field' => 'elearning'])
        </div>
        @include('partials.text', ['label' => 'Data Summary','name' => 'reassessment','field' => 'data_summary'])
        <div class="row">
            <div class="col-sm-10">
                <h2>Results</h2>
                @if($reassessment->results == 1)
                    Not Meeting Outcome
                @else
                    Approaching Outcome
                @endif
            </div>
        </div>
        @include('partials.text', ['label' => 'Use of Results','name' => 'reassessment','field' => 'recommended_actions'])
    {{--</div>--}}

@endsection