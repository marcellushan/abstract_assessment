@extends('layouts.app') @section('content')
{{--</div>--}}
    {{--<div class="well">--}}
        <h1 align="center"><a href="{{URL::to('/')}}/comment">Return to Team List</a></h1>
    </div>
    <div class="well">

<h2>{{$team->name}}</h2>
<table>
    <tr>
        <th width="12%">
            Assessor
        </th>
        <th width="10%">
            Course
        </th>
        <th width="45%">
            Student Learning Objective
        </th>
        <th width="13%">
            Date Submitted
        </th>
        <th width="10%">

        </th>
    </tr>
@foreach($assessments as $assessment)
    <tr>
        <td>
            {{$assessment->assessor_name}}
        </td>
        <td>
            {{$assessment->course_name}}
        </td>
        <td>
            {{$assessment->slo_name}}
        </td>
        <td>
            {{$assessment->submit_date}}
        </td>
        <td>
            <a href="{{URL::to('/')}}/comment/by_assessment/{{$assessment->id}}" class="btn btn-success" role="button">Add/View Comment(s)</a>
        </td>

    </tr>
    @endforeach
</table>
@endsection