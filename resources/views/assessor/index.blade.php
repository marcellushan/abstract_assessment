@extends('layouts.app') @section('content')
<h2 align="center">Assessors</h2>
<h3 align="center"><a  href="{{URL::to('/')}}/assessor/create"> Add New</a></h3>
<h3 align="center">Existing Assessors</h3>
@include('partials.index', ['data_type' => 'assessor'])
@endsection