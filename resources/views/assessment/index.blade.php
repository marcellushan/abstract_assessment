@extends('layouts.app') @section('content')
    <div class="title_header"> Assessment</div>
    @foreach($records as $record)
        {{$record->id}}</br>
        @endforeach

@endsection