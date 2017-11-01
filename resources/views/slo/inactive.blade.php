@extends('layouts.admin') @section('content')
{{--@include('partials.index_wide', ['data_type' => 'assessor'])--}}
@include('partials.inactive_wide', ['data_type' => 'slo'])
<h3><a href="{{URL::to('/')}}/slo"> Link to Active</a></h3>
{{$inactives->links()}}
@endsection