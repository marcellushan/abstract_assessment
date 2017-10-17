@extends('layouts.app') @section('content')
<h1 align="center"><a href="{{URL::to('/')}}/dashboard">Facilitator Login</a></h1>
</div>
<div class="well">
<div class="table-responsive">
<table class="table table-striped">
<tr>
    <th>Unit</th>
    <th>Completed</th>
</tr>
@foreach($teams as $team)
<tr>
    <td>{{$team->name}}</td>
   <td> <a href="{{URL::to('/')}}/reporting/team/{{$team->id}}"> {{count($team->assessments->where('submitted', '=', 1))}}</a></td>
</tr>
@endforeach
</table>
</div>
</div>
<div class="well">
    <h1 align="center"><a href="{{URL::to('/')}}/admin">Administrator Login</a></h1>
</div>


@endsection