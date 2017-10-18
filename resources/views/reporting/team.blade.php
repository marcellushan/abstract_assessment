@extends('layouts.app') @section('content')
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
        @forelse($record->assessments->where('submitted', '=', 1) as $assessment)
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
    </table>
    </div>
@endsection