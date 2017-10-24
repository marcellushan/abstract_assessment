@extends('layouts.admin') @section('content')
@include('partials.index_wide', ['data_type' => 'goal'])
@include('partials.inactive_wide', ['data_type' => 'goal'])
@endsection