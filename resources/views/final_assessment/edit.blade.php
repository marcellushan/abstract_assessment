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
            <form action="{{URL::to('/')}}/final_assessment/{{$finalAssessment->id}}" method="post" id="assessment">
                {{ csrf_field() }}
                {{Form::hidden('_method', 'PUT')}}

                <div class="mybox">
            <h2>Summary of Data Collected<br>(Performance Results)</h2></div>
                <br>
            <h3>Campus:</h3>
            <br>
            <table class="table">
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="usr">Floyd:</label>
                            <input type="text" class="form-control" id="floyd" name="floyd" value="{{$finalAssessment->floyd}}" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?> required >
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="usr">Cartersville:</label>
                            <input type="text" class="form-control" id="cartersville" name="cartersville" value="{{$finalAssessment->cartersville}}" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?>required >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="usr">Paulding:</label>
                            <input type="text" class="form-control" id="paulding" name="paulding" value="{{$finalAssessment->paulding}}" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?> required >
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="usr">Marietta:</label>
                            <input type="text" class="form-control" id="marietta" name="marietta" value="{{$finalAssessment->marietta}}" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?>required >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="usr">Douglasville:</label>
                            <input type="text" class="form-control" id="douglasville" name="douglasville" value="{{$finalAssessment->douglasville}}" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?> required >
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="usr">Heritage Hall:</label>
                            <input type="text" class="form-control" id="heritage" name="heritage" value="{{$finalAssessment->heritage}}" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?>required >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="usr">eLearning:</label>
                            <input type="text" class="form-control" id="elearning" name="elearning" value="{{$finalAssessment->elearning}}" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?> required >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label for="total"><h3>Summary of Data Collected</h3></label>
                            <textarea class="form-control" id="total" rows="3" name="data_summary"  required <? echo (@$_POST['save'] ? 'readonly' :'') ?>>{{$finalAssessment->data_summary}}</textarea>
                        </div>
                    </td>
                </tr>
            </table>
            <table width="60%">
                <tr>
                    <td>
                        <h3>Summary of Assessment Results</h3>
                    </td>
                    <td>
                        @foreach($results as $result)
                        @if($result->id == $finalAssessment->results)
                        {{Form::radio('results', $result->id, true)}} {{$result->name}}</br>
                        @else
                        {{Form::radio('results', $result->id, false)}} {{$result->name}}</br>
                        @endif
                        @endforeach
                    </td>
                </tr>
            </table>
            <div class="form-group">

                <h3>Use of Results</h3>
                <textarea class="form-control" rows="5" name="actions" id="use" required <? echo (@$_POST['save'] ? 'readonly' :'') ?>>{{$finalAssessment->actions}}</textarea>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Update Assessment</button>
        {{--</div>--}}
            </form>
    </div>

        @include('partials.dashboard_link')
@endsection