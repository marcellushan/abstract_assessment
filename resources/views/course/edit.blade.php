@extends('layouts.admin') @section('content')
<h2>Edit Course</h2>
{{Form::open(['action' => ['CourseController@update', $record->id],  'method' => 'put'])}}
<h3>
    <div class="row">
        <div class="col-md-6">
            <input type="text" name= 'name' class="form-control" value="{{$record->name}}">
        </div>
    </div>
</h3>
    <button type="submit">Submit</button>

{{Form::close()}}

@endsection