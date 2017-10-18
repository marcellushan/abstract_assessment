@extends('layouts.admin') @section('content')
<h2 align="center">{{$record->name}}</h2>

    <h4 align="center">{{$record->mission}}</h4>
    <h3 align="center">Team Members</h3>
    @forelse($record->assessors as $assessor)
            <div  align="center">{{$assessor->name}}</div>
        @empty
        <div  align="center">No one is assigned to this team</div>
            @endforelse
<h3>Assessments</h3>
    <div class="table-responsive">
        @if(count($record->assessments))
    <table class="table table-striped">
        <tr>
            <th>
                Course
            </th>
            <th>
                SLO
            </th>
            <th>
                Assessor
            </th>
            <th>

            </th>
            <th>

            </th>
        </tr>
        @endif
        @forelse($record->assessments as $assessment)
            <tr>
                <td>
                    {{$assessment->course->name}}
                </td>
                <td>
                        {{$assessment->slo->name}}
                </td>
                <td>
                    {{$assessment->assessor->name}}
                </td>
                <td>
                    <a href="{{URL::to('/')}}/admin/{{$assessment->id}}/edit"> Edit</a>
                </td>
                <td>
                    <a href="{{URL::to('/')}}/admin/show/{{$assessment->id}}"> View</a>
                </td>
            </tr>
        @empty
            No Assessments for this team
        @endforelse
    </table>
    </div>
@endsection