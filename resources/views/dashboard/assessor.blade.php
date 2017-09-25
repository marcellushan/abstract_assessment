@extends('layouts.app') @section('content')
    <h2>Assessor {{$assessor->name}} </h2>
<h2>Team {{$team->name}}</h2>
    <h3> Saved Assessments</h3>
<h4>
    <table>
        <tr>
            <th width="10%">Course</th>
            <th width="70%">Student Learning Objective</th>
            <th>Assessor</th>
        </tr>
@forelse ($saveds as $saved)
            <tr>
                <td>
                    <a href="{{URL::to('/')}}/assessment/{{$saved->id}}/edit">{{ $saved->course }}</a>
                </td>
                <td>
                    {{ $saved->slo->name }}
                </td>
                <td>
                    {{$saved->assessor->name}}
                </td>
        </tr>
@empty
    <p>No Assessments</p>
@endforelse
    </table>
</h4>
    @if(count($submitteds) > 0)
    <h3> Submitted Assessments</h3>
    <h4>
        <table>
            <tr>
                <th>Student Learning Objective</th>
                <th>Username</th>
            </tr>
            @forelse ($submitteds as $submitted)
                <tr>
                    <td>
                        <a href="{{URL::to('/')}}/assessment/{{$submitted->id}}">{{ $submitted->slo->name }}</a>
                    </td>
                    <td>
                        {{--{{$submitted->assessors->name}}--}}
                    </td>
                </tr>
            @empty
                <p>No Submitted Assessments</p>
            @endforelse
        </table>
    </h4>
    @endif
    <a href="{{URL::to('/')}}/assessment/create/{{$team->id}}/{{$assessor->id}}">Create New Assessment</a>

@endsection