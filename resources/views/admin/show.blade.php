@extends('layouts.admin') @section('content')
        <div class="title_header"> Assessment</div>
        <div class="title_header"> Unit: {{$team->name}}</div>
        <div class="title_header">Unit Leader: {{$assessor->name}}</div>
    </div>
    <div class="well">
        <form action="../send_mail" method="post">
        <input type="hidden" name="assessment_id" value="{{$assessment->id}}">
            {{ csrf_field() }}
        @include('partials.textbox', ['label' => 'Message to Assessor','name' => 'return_reason'])
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </form>
    </div>
    <div class="well">
        @include('partials.text', ['label' => 'College Goal','name' => 'selected_goal','field' => 'name'])
        @include('partials.text', ['label' => 'Associated Course','name' => 'selected_course','field' => 'name'])
        @include('partials.text', ['label' => 'Student Learning Outcome','name' => 'selected_slo','field' => 'name'])
        @include('partials.text', ['label' => 'Method of Outcome Assessment','name' => 'assessment','field' => 'method'])
        @include('partials.text', ['label' => 'Performance Measure','name' => 'assessment','field' => 'measure'])
    @if($finalAssessment)
            <h1>Summary of Data Collected
                (Performance Results)</h1>
    <h2>Campus</h2>
    <div class="row">
        <div class="col-md-6">
             @include('partials.text', ['label' => 'Floyd','name' => 'finalAssessment','field' => 'floyd'])
        </div>
        <div class="col-md-6">
            @include('partials.text', ['label' => 'Cartersville','name' => 'finalAssessment','field' => 'cartersville'])
        </div>
        <div class="col-md-6">
            @include('partials.text', ['label' => 'Paulding','name' => 'finalAssessment','field' => 'paulding'])
        </div>
        <div class="col-md-6">
            @include('partials.text', ['label' => 'Marietta','name' => 'finalAssessment','field' => 'marietta'])
        </div>
        <div class="col-md-6">
            @include('partials.text', ['label' => 'Douglasville','name' => 'finalAssessment','field' => 'douglasville'])
        </div>
        <div class="col-md-6">
            @include('partials.text', ['label' => 'Heritage Hall','name' => 'finalAssessment','field' => 'heritage'])
        </div>
        <div class="col-md-6">
            @include('partials.text', ['label' => 'eLearning','name' => 'finalAssessment','field' => 'elearning'])
        </div>
    </div>
        @include('partials.text', ['label' => 'Summary of Data Collected','name' => 'finalAssessment',
        'field' => 'data_summary'])
        <h3>Summary of Assessment Results</h3>
            @if($finalAssessment->results == 1)
                Exceeded Outcome
            @endif
            @if($finalAssessment->results == 2)
                Meeting Outcome
            @endif
            @if($finalAssessment->results == 3)
                Approaching Outcome
            @endif
            @if($finalAssessment->results == 4)
                Not Meeting Outcome
        @endif
        @include('partials.text', ['label' => 'Use of Results','name' => 'finalAssessment','field' => 'actions'])


@endif

@endsection