@extends('layouts.app') @section('content')
    <h2>SLOs</h2>
    @foreach($records as $record)
        <div class="row">
            <div class="col-md-8">
                {{$record->name}}
            </div>
            <div class="col-md-2">
                {{$record->team->name}}
            </div>
            <div class="col-md-1">
                <a href="slo/{{$record->id}}/edit">Edit</a>
            </div>
            <div class="col-md-1">
                <a href="slo/deactivate/{{$record->id}}">Deactivate</a>
            </div>
        </div>
        <br>
    @endforeach
@endsection