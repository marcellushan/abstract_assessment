@extends('layouts.admin') @section('content')
        <div class="title_header"> Assessment</div>
        <div class="title_header"> Unit: {{$team->name}}</div>
        <div class="title_header">Unit Leader: {{$assessment->assessor->name}}</div>
    </div>
    @if($finalAssessment)
        {{Form::open(['url' => 'admin/' . $assessment->id,'method' => 'PUT'])}}
        <div class="well">
            <h2><a class= "btn btn-primary btn-lg" href="{{URL::to('/')}}/reporting/print_assessment/{{$assessment->id}}" target="_blank">Print</a></h2>
            @include('partials.text', ['label' => 'College Goal','name' => 'selected_goal','field' => 'name'])
            @include('partials.text', ['label' => 'Associated Course','name' => 'selected_course','field' => 'name'])
            @include('partials.text', ['label' => 'Student Learning Outcome','name' => 'selected_slo','field' => 'name'])
            @include('partials.text', ['label' => 'Method of Outcome Assessment','name' => 'assessment','field' => 'method'])
            @include('partials.text', ['label' => 'Performance Measure','name' => 'assessment','field' => 'measure'])
            more

            <form class="mybox">
                <h2>Summary of Data Collected<br>(Performance Results)</h2>
                <br>
                <h2>Campus:</h2>
                <div class="row">
                    <div class="col-md-6">
                        @include('partials.textfield', ['label' => 'Floyd','name' => 'floyd','field' => 'floyd','record_type' => 'finalAssessment'])
                    </div>
                    <div class="col-md-6">
                        @include('partials.textfield', ['label' => 'Cartersville','name' => 'cartersville',
                        'field' => 'cartersville','record_type' => 'finalAssessment'])
                    </div>
                    <div class="col-md-6">
                        @include('partials.textfield', ['label' => 'Paulding','name' => 'paulding','field' =>
                        'paulding','record_type' => 'finalAssessment'])
                    </div>
                    <div class="col-md-6">
                        @include('partials.textfield', ['label' => 'Marietta','name' => 'marietta',
                        'field' => 'marietta','record_type' => 'finalAssessment'])
                    </div>
                    <div class="col-md-6">
                        @include('partials.textfield', ['label' => 'Douglasville','name' => 'douglasville','field' =>
                        'douglasville','record_type' => 'finalAssessment'])
                    </div>
                    <div class="col-md-6">
                        @include('partials.textfield', ['label' => 'Heritage Hall','name' => 'heritage',
                        'field' => 'heritage','record_type' => 'finalAssessment'])
                    </div>
                    <div class="col-md-6">
                    @include('partials.textfield', ['label' => 'eLearning','name' => 'elearning',
                    'field' => 'elearning','record_type' => 'finalAssessment'])
                </div>
                </div>
                @include('partials.textbox', ['label' => 'Summary of Data Collected','name' => 'data_summary',
                'field' => 'data_summary','record_type' => 'finalAssessment'])
                <h3>Summary of Assessment Results</h3>

                @foreach($results as $result)
                @if($result->id == $finalAssessment->results)
                {{Form::radio('results', $result->id, true)}} {{$result->name}}<br>
                @else
                {{Form::radio('results', $result->id, false)}} {{$result->name}}<br>
                @endif
                @endforeach
                @include('partials.textbox', ['label' => 'Use of Results','name' => 'actions',
                'field' => 'actions','record_type' => 'finalAssessment'])
                <button type="submit" class="btn btn-lg btn-primary">Save Assessment</button>
            </form>
            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}




{{--@if( ! $assessment->final_submitted)--}}
{{--<h2><a href="{{URL::to('/')}}/final_assessment/{{$finalAssessment->id}}/edit">Modify Assessment</a></h2>--}}
{{--{{Form::open(['url' => 'final_assessment/submit/' . $assessment->id ,'method' => 'PUT'])}}--}}
{{--{{Form::hidden('submit_date', date("Y-m-d")) }}--}}
{{--{{Form::hidden('submitted', '1')}}--}}
{{--<button type="submit" class="btn btn-lg btn-primary">Submit Assessment</button>--}}
{{--{{Form::close()}}--}}
{{--@endif--}}

@else
<div class="well">
{{Form::open(['url' => 'admin/' . $assessment->id,'method' => 'PUT'])}}
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
<option value="{{$course->id}}" @if($assessment->course->name == $course->name) selected @endif >{{$course->name}}</option>
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
@endif
@endsection