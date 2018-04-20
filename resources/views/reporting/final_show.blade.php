@extends('layouts.app') @section('content')
        <div class="title_header"> Assessment</div>
        <div class="title_header"> Unit: {{$team->name}}</div>
        <div class="title_header">Unit Leader: {{$assessor->name}}</div>
    </div>
    <div class="well">
        <h2><a class= "btn btn-primary btn-lg" href="{{URL::to('/')}}/reporting/print_assessment/{{$assessment->id}}" target="_blank">Print</a></h2>
        @include('partials.text', ['label' => 'College Goal','name' => 'selected_goal','field' => 'name'])
        @include('partials.text', ['label' => 'Associated Course','name' => 'selected_course','field' => 'name'])
        @include('partials.text', ['label' => 'Student Learning Outcome','name' => 'selected_slo','field' => 'name'])
        @include('partials.text', ['label' => 'Method of Outcome Assessment','name' => 'assessment','field' => 'method'])
        @include('partials.text', ['label' => 'Performance Measure','name' => 'assessment','field' => 'measure'])
        more

        <div class="mybox">
            <h2>Summary of Data Collected<br>(Performance Results)</h2>
            <br>
            <h2>Campus:</h2>
            <br>
            <table class="table">
                <tr>
                    <td>
                        <h4>Floyd</h4>{{$finalAssessment->floyd}}
                    </td>
                    <td>
                        <h4>Cartersville</h4>{{$finalAssessment->cartersville}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Paulding</h4>{{$finalAssessment->paulding}}
                    </td>
                    <td>
                        <h4>Marietta</h4>{{$finalAssessment->marietta}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Douglasville</h4>{{$finalAssessment->douglasville}}
                    </td>
                    <td>
                        <h4>Heritage Hall</h4>{{$finalAssessment->heritage}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>eLearning</h4>{{$finalAssessment->elearning}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h3>Summary of Data Collected</h3>{{$finalAssessment->data_summary}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Summary of Assessment Results</h3>
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
                    <td colspan="2">
                        <h3>Use of Results</h3>{{$finalAssessment->actions}}
                    </td>
                </tr>
            </table>


        @if( ! $assessment->submit_date)
            <h2><a href="{{URL::to('/')}}/assessment/{{$assessment->id}}/edit">Modify Assessment</a></h2>
        {{Form::open(['url' => 'assessment/' . $assessment->id ,'method' => 'PUT'])}}
        {{Form::hidden('submit_date', date("Y-m-d")) }}
         {{Form::hidden('submitted', '1')}}
            <button type="submit" class="btn btn-lg btn-primary">Submit Assessment</button>
        {{Form::close()}}
        @endif


@endsection