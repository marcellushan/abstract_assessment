@extends('layouts.dashboard') @section('content')
@if(count(@$reassessments) > 0)
<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th width="10%">Course</th>
            <th width="60%">Student Learning Objective</th>
            <th width="15%">Assessor</th>
            <th width="15%">Results</th>
        </tr>
        @if(count($reassessments) > 0)
        <h3>2016 - 17 Assessments not meeting outcomes must be assigned before creating new assessments.</h3>
        @endif
    @foreach ($reassessments as $reassessment)
        <tr>
            <td>
                <a href="{{URL::to('/')}}/reassessment/create/{{$team->id}}/{{$assessor->id}}/{{$reassessment->id}}">{{ $reassessment->course }}</a>
            </td>
            <td>
                {{ $reassessment->slo->name }}
            </td>
            <td>
                {{$reassessment->assessor->name}}
            </td>
            <td>
                @if($reassessment->results == 1) Not Meeting Outcome @else Approaching Outcome @endif
            </td>
        </tr>
@endforeach
</table>
    @include('partials.dashboard_list')
</div>
@else
    @include('partials.dashboard_list')
    <a href="{{URL::to('/')}}/assessment/create/{{$team->id}}/{{$assessor->id}}" class="btn btn-primary btn-lg" role=""button">Create New Assessment</a>
@endif
@endsection