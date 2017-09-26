@extends('layouts.app') @section('content')
<h2 align="center">Team</h2>
 <h3>   {{$record->name}}</h3>
    <h4>{{$record->mission}}</h4>
    <div class="table-responsive">
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
        @foreach($record->assessments as $assessment)
            <tr>
                <td>
                    <a href="{{URL::to('/')}}/assessment/{{$assessment->id}}"> {{$assessment->course}}</a>
                </td>
                <td>
                        {{$assessment->slo->name}}
                </td>
                <td>
                    {{$assessment->assessor->name}}
                </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection