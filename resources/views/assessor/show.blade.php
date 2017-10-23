@extends('layouts.admin') @section('content')
<h2>Assessor</h2>
    {{$record->name}}
        @if($record->inactive) - Inactive @endif
@endsection