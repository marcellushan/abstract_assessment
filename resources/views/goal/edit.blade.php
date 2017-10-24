@extends('layouts.admin') @section('content')
    {{Form::open(['action' => ['GoalController@update', $record->id],  'method' => 'put'])}}
    <h2>Edit Goal</h2>
    <h3>
        <div class="row">
            <div class="col-md-6">
                <input type="text" name= 'name' class="form-control" value="{{$record->name}}">
            </div>
        </div>
    </h3>
        <button type="submit" class="btn btn-lg btn-primary">Submit</button>

    {{Form::close()}}
@endsection