@extends('layouts.dashboard') @section('content')
@if(count($reassessments) > 0)
    <table class="table table-condensed">
        <tr>
            <th width="10%">Course</th>
            <th width="70%">Student Learning Objective</th>
            <th>Assessor</th>
        </tr>
    @foreach ($reassessments as $reassessment)
        <tr>
            <td>
                <a href="{{URL::to('/')}}/dashboard/reassessment/{{$team->id}}/{{$assessor->id}}/{{$reassessment->id}}">{{ $reassessment->course }}</a>
            </td>
            <td>
                {{ $reassessment->slo }}
            </td>
            <td>
                {{$reassessment->assessor_username}}
            </td>
        </tr>
@endforeach
</table>
@else
@include('partials.dashboard_list')
@endif
@endsection