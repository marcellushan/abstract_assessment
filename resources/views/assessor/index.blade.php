@extends('layouts.admin') @section('content')
<h2 align="center">Assessors</h2>
{{--@include('partials.index', ['data_type' => 'assessor'])--}}

@foreach($records as $record)
    <div class="row">
        <div class="col-md-2 col-md-offset-4">
            {{$record->name}}
        </div>
        <div class="col-md-2">
            <a href="assessor/{{$record->id}}/edit">Edit</a>
        </div>
        <div class="col-md-2">
            {{Form::open(['action' => [ucfirst('assessor') . 'Controller@destroy', $record->id],  'method' => 'delete'])}}
            <button type="submit">Delete</button>
            {{Form::close()}}
        </div>
    </div>
    <br>
@endforeach
@endsection