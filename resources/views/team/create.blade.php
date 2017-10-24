@extends('layouts.admin') @section('content')
<h2>Create Team</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{Form::open(['url' => 'team'])}}
<h3>Name
    <div class="row">
        <div class="col-md-6">
            <input type="text" name= 'name' class="form-control" >
        </div>
    </div>
    </h3>
<h3>
    <div class="row">
        <div class="col-md-6">
            <textarea class="form-control" name="mission" rows="5"></textarea>
        </div>
    </div>
    </h3>
    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
{{Form::close()}}

@endsection