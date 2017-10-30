@extends('layouts.admin') @section('content')
{{--@include('partials.index', ['data_type' => 'team'])--}}
@include('partials.team_wide', ['data_type' => 'team'])
@include('partials.inactive_wide', ['data_type' => 'team'])
{{$records->links()}}
@endsection