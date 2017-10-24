@extends('layouts.admin') @section('content')
    <h1>SLOs</h1>
    <h2>Active</h2>
    <div class="row">
        <h3 class="col-md-7">
            Summary
        </h3>
        <h3 class="col-md-2">
          Team
        </h3>
    </div>
    @foreach($records as $record)
        <div class="row">
            <div class="col-md-7">
                {{$record->name}}
            </div>
            <div class="col-md-2">
                {{$record->team->name}}
            </div>
            <div class="col-md-1">
                <a href="slo/{{$record->id}}/edit" class="btn btn-warning" role="button">Edit</a>
            </div>
            <div class="col-md-1">
                <a href="slo/deactivate/{{$record->id}}"  class="btn btn-danger" role="button">Deactivate</a>
            </div>
        </div>
        <br>
    @endforeach
    <h2>Inactive</h2>
    @foreach($inactives as $inactive)
        <div class="row">
            <div class="col-md-7">
                {{$inactive->name}}
            </div>
            <div class="col-md-2">
                {{$inactive->team->name}}
            </div>
            <div class="col-md-1">
                <a href="slo/{{$inactive->id}}/edit" class="btn btn-warning" role="button">Edit</a>
            </div>
            <div class="col-md-1">
                <a href="slo/activate/{{$inactive->id}}"  class="btn btn-danger" role="button">Activate</a>
            </div>
        </div>
        <br>
    @endforeach
    {{$records->links()}}
@endsection