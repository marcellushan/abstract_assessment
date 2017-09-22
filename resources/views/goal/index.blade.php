@extends('layouts.app') @section('content')
@foreach($records as $record)
        {{$record->name}}
@endforeach
@endsection