@extends('layouts.admin') @section('content')
<h1 align="center">Deactivate Assessments</h1>
<h2>Active</h2>
<div class="table-responsive">
<table class="table table-striped table-bordered table-condensed">
    <tr>
        <th width="13%">
            Team
        </th>
        <th width="12%">
            Assessor
        </th>
        <th width="7%">
            Course
        </th>
        <th width="60%">
            Student Learning Objective
        </th>
        <th width="7%">
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
            <a href="show/{{$assessment->id}}"> {{$assessment->course_name}}</a>
        </td>
        <td>
            {{$assessment->slo_name}}
        </td>
        {{--<td>--}}
            {{--{{$assessment->submit_date}}--}}
        {{--</td>--}}
        <td>
            <div class="col-md-2">
                <a href="deactivate/{{$assessment->id}}" class="btn btn-danger" role="button">Deactivate</a>
            </div>
        </td>

    </tr>
    @endforeach
</table>
</div>
<h2>Inactive</h2>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed">
    <tr>
        <th width="13%">
            Team
        </th>
        <th width="12%">
            Assessor
        </th>
        <th width="7%">
            Course
        </th>
        <th width="60%">
            Student Learning Objective
        </th>
        <th width="7%">
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
                <a href="show/{{$inactive->id}}"> {{$inactive->course_name}}</a>
            </td>
            <td>
                {{$inactive->slo_name}}
            </td>
            <td>
                <div class="col-md-2">
                    <a href="activate/{{$inactive->id}}" class="btn btn-success" role="button">Activate</a>
                </div>
            </td>

        </tr>
    @endforeach
</table>
</div>
@endsection