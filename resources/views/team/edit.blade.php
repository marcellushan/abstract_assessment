@extends('layouts.app') @section('content')
<h2>Edit Team</h2>
{{Form::open(['action' => ['TeamController@update', $record->id],  'method' => 'put'])}}
<h3>Name
    <div class="row">
        <div class="col-md-6">
            <input type="text" name= 'name' class="form-control" value="{{$record->name}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <textarea class="form-control" name="mission_statement" rows="5">{{$record->mission_statement}}</textarea>
        </div>
    </div>
    <button type="submit">Submit</button>
</h3>
{{Form::close()}}

@endsection