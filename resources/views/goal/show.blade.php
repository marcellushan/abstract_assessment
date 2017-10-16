@extends('layouts.admin') @section('content')
<h2>Goal</h2>
    {{$record->name}}
        @if($record->inactive) - Inactive @endif
@endsection