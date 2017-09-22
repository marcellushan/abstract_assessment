@extends('layouts.app') @section('content')
    {{--<h2 align="center">Courses</h2>--}}
    {{--@foreach($records as $record)--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-2 col-md-offset-4">--}}
                {{--{{$record->name}}--}}
            {{--</div>--}}
            {{--<div class="col-md-2">--}}
                {{--<a href="course/{{$record->id}}/edit">Edit</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-2">--}}
                {{--{{Form::open(['action' => ['CourseController@destroy', $record->id],  'method' => 'delete'])}}--}}
                {{--<a href="course/{{$record->id}}/edit">Delete</a>--}}
                {{--<button type="submit">Delete</button>--}}
                {{--{{Form::close()}}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<br>--}}
    {{--@endforeach--}}
    @include('partials.index', ['data_type' => 'course'])
@endsection