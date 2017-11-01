@extends('layouts.admin') @section('content')
<h2 align="center">Assessors</h2>
@include('partials.index_wide', ['data_type' => 'assessor'])
{{--@include('partials.inactive_wide', ['data_type' => 'assessor'])--}}
<h3><a href="assessor/list/inactive"> Link to Inactive</a></h3>
{{$records->links()}}
@endsection