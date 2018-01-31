@extends('layouts.admin') @section('content')
<h2>Edit Assessor</h2>
<h3>
    {{Form::open(['action' => ['AssessorController@update', $record->id],  'method' => 'put'])}}
    <div class="row">
        <div class="col-md-6">
            <label>Name</label>
            <input type="text" name= 'name' class="form-control" value="{{$record->name}}">
        </div>
        <div class="col-md-6">
            <label>Username</label>
            <input type="text" name= 'username' class="form-control" value="{{$record->username}}">
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary btn-lg">Update Assessor</button>
    </h3>
{{Form::close()}}
    {{Form::open(['action' => ['AssessorController@removeTeam',  'method' => 'post']])}}

    <input type="hidden" name="assessor_id" value="{{$record->id}}">
    <h3>Assessor is a member of the following team(s):</h3>
    <div class="row">
    @forelse($teams as $team)
        <div class="col-md-2">
        {{$team->name}}&nbsp;<input type="checkbox" name="teams[]" value="{{$team->id}}">
        </div>
    @empty
            <div class="col-md-6">
        Assessor is not a member of any teams
        </div>
    @endforelse
    </div>
    <p></p>
    <button type="submit" class="btn btn-primary btn-lg">Remove from Team(s)</button>
    {{Form::close()}}
    {{Form::open(['action' => ['AssessorController@update', $record->id],  'method' => 'put'])}}
    <h3>Faculty Units</h3>
    <div class="row">
        @foreach($allTeams as $allTeam)
            <div class="col-md-2">
                {{$allTeam->name}} &nbsp;<input type="checkbox" name="teams[]" value="{{$allTeam->id}}">
            </div>
        @endforeach
    </div>
    <p></p>
    <button type="submit" class="btn btn-primary btn-lg">Add to team(s)</button>
</h3>
{{Form::close()}}

@endsection