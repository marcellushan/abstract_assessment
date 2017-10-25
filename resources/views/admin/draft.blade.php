@extends('layouts.admin') @section('content')
<h2 align="center">Team</h2>
 <h3>   {{$record->name}}</h3>
    <h4>{{$record->mission}}</h4>

    <div class="table-responsive">
        @if(count($record->assessments->where('submitted','<>', 1) ))
    <table class="table table-striped table-bordered table-condensed">
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
        @forelse($record->assessments->where('inactive','<>', 1)->where('submitted','<>', 1)  as $assessment)
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