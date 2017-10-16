@extends('layouts.admin') @section('content')
<h2>Edit Team</h2>
{{Form::open(['action' => ['TeamController@update', $record->id],  'method' => 'put'])}}
<h3>Name
    <div class="row">
        <div class="col-md-6">
            <input type="text" name= 'name' class="form-control" value="{{$record->name}}">
        </div>
    </div>
    </h3>
<h3>
    <div class="row">
        <div class="col-md-6">
            <textarea class="form-control" name="mission" rows="5">{{$record->mission}}</textarea>
        </div>
    </div>
    </h3>
    <button type="submit">Submit</button>
{{Form::close()}}

@endsection