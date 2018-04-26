@extends('layouts.app') @section('content')

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
            <a href="{{URL::to('/')}}/comment/by_assessment/{{$assessment->id}}" class="btn btn-success" role="button">Add/View Comment(s)</a>
        </td>

    </tr>
    @endforeach
</table>
@endsection