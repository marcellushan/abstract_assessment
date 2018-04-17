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
        <br>
        <div class="mybox">
            <div class="total">Summary of Data Collected<br>(Performance Results)</div>
                <br>
            <div class="total">Campus:</div>
            <br>
            <table class="table">
                <tr>
                    <td>
                       <div class="total">Floyd</div>{{$finalAssessment->floyd}}
                    </td>
                    <td>
                        <div class="total">Cartersville</div>{{$finalAssessment->cartersville}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="total">Paulding</div>{{$finalAssessment->paulding}}
                    </td>
                    <td>
                        <div class="total">Marietta</div>{{$finalAssessment->marietta}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="total">Douglasville</div>{{$finalAssessment->douglasville}}
                    </td>
                    <td>
                        <div class="total">Heritage Hall</div>{{$finalAssessment->heritage}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="total">eLearning</div>{{$finalAssessment->elearning}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="total">Summary of Data Collected</div>{{$finalAssessment->data_summary}}
                    </td>
                </tr>
            </table>
            <table width="40%">
                <tr>
                    <td>
                        <div class="total">Summary of Assessment Results</div>
                    </td>
                    <td>
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
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Use of Results</h4>{{$finalAssessment->actions}}
                    </td>
                </tr>
            </table>


        @if( ! $finalAssessment->submitted)
            <h2><a href="{{URL::to('/')}}/final_assessment/{{$finalAssessment->id}}/edit">Modify Final Assessment</a></h2>
            {{Form::open(['url' => 'final_assessment/' . $finalAssessment->id ,'method' => 'PUT'])}}
            {{Form::hidden('submit_date', date("Y-m-d")) }}
            {{Form::hidden('submitted', '1')}}
            <button type="submit"  class="btn btn-lg btn-primary" onclick="initial_submit({{$finalAssessment->id}});" >Submit Assessment</button><p>
                {{Form::close()}}
                </div>
                 </div>
                @include('partials.dashboard_link')
                @else
                </div>
                </div>
            @include('partials.dashboard_submitted_link')
        @endif
@endsection