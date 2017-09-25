@extends('layouts.app') @section('content')
    <h2>User {{$user->name}} </h2>
<h2>Team {{$team->name}}</h2>
<h3>
@forelse ($assessments as $assessment)
    <a href="{{URL::to('/')}}/assessment/{{$assessment->id}}/edit">{{ $assessment->slo->name }}</a><br>
@empty
    <p>No Assessments</p>
@endforelse
</h3>
    <a href="{{URL::to('/')}}/assessment/create/{{$user->id}}/{{$team->id}}">Create New Assessment</a>

@endsection