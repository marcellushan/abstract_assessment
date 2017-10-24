@extends('layouts.admin') @section('content')
@include('partials.goals', ['data_type' => 'goal'])
@include('partials.goals_inactive', ['data_type' => 'goal'])
@endsection