@extends('layouts.app') @section('content')
<h2>Edit Assessor</h2>
{{Form::open(['action' => ['AssessorController@update', $record->id],  'method' => 'put'])}}
<h3>
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
    <h3>Assessor is a member of the following team(s):</h3>
    @forelse($teams as $team)

        {{$team->name}}<br>
    @empty
        Assessor is not a member of any teams
    @endforelse
    <h3>Faculty Units</h3>
    <div class="row">
        @foreach($allTeams as $allTeam)
            <div class="col-md-2">
                {{$allTeam->name}} <input type="checkbox" name="teams[]" value="{{$allTeam->id}}">
            </div>
        @endforeach
    </div>
    <button type="submit">Submit</button>
</h3>
{{Form::close()}}

@endsection