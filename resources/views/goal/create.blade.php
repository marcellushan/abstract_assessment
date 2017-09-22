@extends('layouts.app') @section('content')
    <h2>New Goal</h2>
    {{Form::open(['url' => 'goal'])}}
        <h3>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name= 'name' class="form-control">
                </div>
                <div class="col-md-6">Inactive&nbsp;
                    Yes&nbsp; <input type="radio" name="inactive" value="1">&nbsp;
                    No&nbsp; <input type="radio" name="inactive" value="0" checked>
                </div>
            </div>
                <button type="submit">Submit</button>
        </h3>
        {{Form::close}}
@endsection