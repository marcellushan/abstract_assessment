@extends('layouts.app') @section('content')
<h2 align="center">Assessors</h2>
@include('partials.index', ['data_type' => 'assessor'])
@endsection