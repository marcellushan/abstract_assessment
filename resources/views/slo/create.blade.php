@extends('layouts.admin') @section('content')
    <h2>New SLO</h2>
    {{Form::open(['url' => 'slo'])}}
            <div class="row">
                <h3 class="col-md-12">
                    <input type="text" name= 'name' class="form-control">
                    </h3>
                <h3 class="col-md-6">
                    <select name="team_id">
                        <option value="">Select Team</option>
                @foreach($teams as $team)
                        <option value="{{$team->id}}">{{$team->name}}</option>
                    @endforeach
                    </select>
                </h3>
                {{--<h3 class="col-md-6">Inactive&nbsp;--}}
                    {{--Yes&nbsp; <input type="radio" name="inactive" value="1">&nbsp;--}}
                    {{--No&nbsp; <input type="radio" name="inactive" value="0" checked>--}}
                {{--</h3>--}}
            </div>
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>

        {{--{{Form::close}}--}}
@endsection