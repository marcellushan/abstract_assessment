@extends('layouts.app') @section('content')
    <select id="selectbox" name="" onchange="javascript:location.href = this.value;">
        <option>Select</option>
        @forelse($assessors as $assessor)
            <option value="{{URL::to('/')}}/dashboard/{{$assessor->id}}"> {{$assessor->name}} - {{$assessor->team_name}}</option>
        @empty
            No Assessors have been assigned to teams
            <option value="">No Assessors have been assigned to teams</option>
        @endforelse
    </select>
@endsection