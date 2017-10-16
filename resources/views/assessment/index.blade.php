@extends('layouts.app') @section('content')
<div class="table-responsive">
<table class="table table-striped">
<tr>
    <th>Unit</th>
    <th>Completed</th>
</tr>
@foreach($teams as $team)
<tr>
    <td>{{$team->name}}</td>
   <td> <a href="{{URL::to('/')}}/reporting/team/{{$team->id}}"> {{count($team->assessments)}}</a></td>
</tr>
@endforeach
</table>
</div>




@endsection