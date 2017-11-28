@extends('layouts.app') @section('content')
    {{--<select id="selectbox" name="" onchange="location.href ='{{URL::to('/')}}'">--}}
        <select id="selectbox" name="" onchange="javascript:location.href = this.value;">
        <option>Select Team</option>
    @foreach($assessments as $assessment)
        <option value="{{URL::to('/')}}/comment/team/{{$assessment->team_id}}">{{$assessment->team_name}}</option>
    @endforeach
</select>
@endsection