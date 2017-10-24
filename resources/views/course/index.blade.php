@extends('layouts.admin') @section('content')
    {{--<h2 align="center">Courses</h2>--}}
    {{--@include('partials.index', ['data_type' => 'course'])--}}
    @include('partials.index_wide', ['data_type' => 'course'])
    @include('partials.inactive_wide', ['data_type' => 'course'])
    {{$records->links()}}
@endsection