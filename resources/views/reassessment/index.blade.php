@extends('layouts.app') @section('content')

    <h1 align="center">Reassessments</h1>
</div>
<div class="well">
<div class="table-responsive">
<table class="table table-striped">
<tr>
    <th>Unit</th>
    <th>Course</th>
    <th>Assessor</th>
    <th>Results</th>
    <th>17-18 Assessment?</th>

</tr>
@foreach($reassessments as $reassessment)
<tr>
    <td>{{$reassessment->team->name}}</td>
    <td>{{$reassessment->course}}</td>
    <td>{{$reassessment->assessor->name}}</td>
    <td>   @if($reassessment->results == 1) Not Meeting Outcome @else Approaching Outcome @endif</td>
    <td>@if($reassessment->associated_assessment)<a href="{{URL::to('/')}}/admin/{{$reassessment->associated_assessment}}/edit">Yes</a> @else No @endif</td>
</tr>
@endforeach
</table>
</div>




@endsection