@extends('layouts.admin') @section('content')
<h1 align="center">Deactivate Assessments</h1>
<h2>Inactive</h2>
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
            <div class="col-md-2">
                <a href="deactivate/{{$assessment->id}}" class="btn btn-danger" role="button">Deactivate</a>
            </div>
        </td>

    </tr>
    @endforeach
</table>
<h2>Inactive</h2>
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
    @foreach($inactives as $inactive)
        <tr>
            <td>
                {{$inactive->team_name}}
            </td>
            <td>
                {{$inactive->assessor_name}}
            </td>
            <td>
                {{$inactive->course_name}}
            </td>
            <td>
                {{$inactive->slo_name}}
            </td>
            <td>
                {{$inactive->submit_date}}
            </td>
            <td>
                <div class="col-md-2">
                    <a href="activate/{{$inactive->id}}" class="btn btn-success" role="button">Activate</a>
                </div>
            </td>

        </tr>
    @endforeach
</table>
@endsection