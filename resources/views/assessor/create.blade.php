@extends('layouts.admin') @section('content')
<h2>Create Assessor</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{Form::open(['url' => 'assessor'])}}
<h3>
    <div class="row">
        <div class="col-md-6">
            <label>Name</label>
            <input type="text" name= 'name' class="form-control" >
        </div>
        <div class="col-md-6">
            <label>Username</label>
            <input type="text" name= 'username' class="form-control" >
        </div>
    </div>
</h3>
    <button type="submit">Submit</button>

{{Form::close()}}

@endsection