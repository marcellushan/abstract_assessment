@extends('layouts.app') @section('content')
{{--<h2>Goals</h2>--}}
{{--@foreach($records as $record)--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8">--}}
            {{--{{$record->name}}--}}
        {{--</div>--}}
        {{--<div class="col-md-2">--}}
            {{--<a href="goal/{{$record->id}}/edit">Edit</a>--}}
        {{--</div>--}}
        {{--<div class="col-md-2">--}}
            {{--<a href="goal/{{$record->id}}/edit">Deactivate</a>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<br>--}}
{{--@endforeach--}}

@include('partials.index_wide', ['data_type' => 'goal'])
@endsection