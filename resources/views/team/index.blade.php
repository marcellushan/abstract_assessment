@extends('layouts.admin') @section('content')
<h2 align="center">Teams</h2>
{{--@include('partials.index', ['data_type' => 'team'])--}}
@include('partials.index_wide', ['data_type' => 'team'])
{{$records->links()}}
@endsection