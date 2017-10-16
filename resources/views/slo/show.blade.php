@extends('layouts.admin') @section('content')
<h2 align="center">SLO</h2>
 <h3>   {{$record->name}}</h3>
    <h4>Team {{$record->team->name}}</h4>
@endsection