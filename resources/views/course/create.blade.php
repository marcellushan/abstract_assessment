@extends('layouts.app') @section('content')
    <h2>New Course</h2>
    {{Form::open(['url' => 'course'])}}
        <h3>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name= 'name' class="form-control">
                </div>
            </div>
        </h3>
                <button type="submit">Submit</button>

        {{--{{Form::close}}--}}
@endsection