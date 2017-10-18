@extends('layouts.admin') @section('content')
<h2>Edit SLO</h2>
{{Form::open(['action' => ['SloController@update', $record->id],  'method' => 'put'])}}
<h3>
    <div class="row">
        <div class="col-md-12">
            <input type="text" name= 'name' class="form-control" value="{{$record->name}}">
        </div>
        <div class="col-md-4">
           <select name="team_id">
                @foreach($teams as $team)
                    <option value="{{$team->id}}" @if($team->id == $record->team_id) selected @endif>
                        {{$team->name}}
                    </option>
               @endforeach
           </select>
        </div>
    </div>
    <p></p>
    <button type="submit" class="btn btn-primary btn-lg">Update</button>
</h3>
{{Form::close()}}

@endsection