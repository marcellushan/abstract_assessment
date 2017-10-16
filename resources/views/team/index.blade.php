@extends('layouts.admin') @section('content')
<h2 align="center">Teams</h2>
@include('partials.index', ['data_type' => 'team'])
@endsection