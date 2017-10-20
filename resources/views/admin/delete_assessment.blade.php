@extends('layouts.admin') @section('content')
<h1 align="center">Delete Assessments</h1>
<table>
    <tr>
        <th width="10%">
            Team
        </th>
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
            {{$assessment->team_name}}
        </td>
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
            {{Form::open(['action' => ['AssessmentController@destroy', $assessment->id],  'method' => 'delete'])}}
            <button type="submit" class="btn btn-danger">Delete</button>
            {{Form::close()}}
        </td>

    </tr>
    @endforeach
</table>
@endsection