@extends('layouts.admin') @section('content')
<h2 align="center">Assessors</h2>
{{--@include('partials.index_wide', ['data_type' => 'assessor'])--}}
@include('partials.inactive_wide', ['data_type' => 'assessor'])
<h3><a href="{{URL::to('/')}}/assessor"> Link to Active</a></h3>
{{$inactives->links()}}
@endsection