@extends('layouts.app') @section('content')

    {{--<div class="well">--}}
        <h1 align="center"><a href="{{URL::to('/')}}">Return Home</a></h1>
    </div>
    <div class="well">
<h2 align="center">Team</h2>
 <h3>   {{$record->name}}</h3>
    <h4>{{$record->mission}}</h4>

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
        </tr>
        @endif
        @if($record->final)
        @forelse($record->assessments->where('inactive','<>',1)->where('final_submitted', '=', 1) as $assessment)
            <tr>
                <td>
                    <a href="{{URL::to('/')}}/reporting/{{$assessment->id}}"> {{$assessment->course->name}}</a>
                </td>
                <td>
                        {{$assessment->slo->name}}
                </td>
                <td>
                    {{$assessment->assessor->name}}
                </td>
            </tr>
        @empty
            No Assessments for this team
        @endforelse
        @else
        @forelse($record->assessments->where('inactive','<>',1)->where('submitted', '=', 1) as $assessment)
            <tr>
                <td>
                    <a href="{{URL::to('/')}}/reporting/{{$assessment->id}}"> {{$assessment->course->name}}</a>
                </td>
                <td>
                    {{$assessment->slo->name}}
                </td>
                <td>
                    {{$assessment->assessor->name}}
                </td>
            </tr>
        @empty
            No Assessments for this team
        @endforelse
        @endif
    </table>
    </div>
@endsection