@extends('layouts.app') @section('content')
<h1 align="center"><a href="{{URL::to('/')}}/dashboard/assessor_auth/none">Facilitator Login</a></h1>
</div>
<div class="well">
<div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed"  style="width:40%; margin-left: auto; margin-right: auto;">
<tr>
    <th>Unit</th>
    <th align="center"><div style="text-align: center"> Completed</div></th>
</tr>
@foreach($teams as $team)
<tr>
    <td>{{$team->name}}</td>
   <td align="center"> <a href="{{URL::to('/')}}/reporting/team/{{$team->id}}"> {{count($team->assessments->where('submitted', '=', 1))}}</a></td>
</tr>
@endforeach
</table>
</div>
</div>
<div class="well">
    <h1 align="center"><a href="{{URL::to('/')}}/admin">Administrator Login</a></h1>
</div>
<div class="well">
    <h1 align="center"><a href="{{URL::to('/')}}/comment">Commenter Login</a></h1>
</div>


@endsection