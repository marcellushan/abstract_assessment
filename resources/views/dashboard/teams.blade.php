@extends('layouts.app') @section('content')
<h2>User {{$user->name}} </h2>
<h2>Teams</h2>
@foreach($teams as $team)
    <h3><a href="{{URL::to('/')}}/dashboard/team/{{$user->id}}/{{$team->id}}">{{$team->name}}</a> </h3>
@endforeach
@endsection