@extends('layouts.app') @section('content')
<h2>Edit SLO</h2>
{{Form::open(['action' => ['SloController@update', $record->id],  'method' => 'put'])}}
<h3>
    <div class="row">
        <div class="col-md-6">
            <input type="text" name= 'name' class="form-control" value="{{$record->name}}">
        </div>
        <div class="col-md-6">
            <input type="text" name= 'team_id' class="form-control" value="{{$record->team_id}}">
        </div>
    </div>
    <button type="submit">Submit</button>
</h3>
{{Form::close()}}

@endsection