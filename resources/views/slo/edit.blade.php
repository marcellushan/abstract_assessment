@extends('layouts.admin') @section('content')
<h2>Edit SLO</h2>
{{Form::open(['action' => ['SloController@update', $record->id],  'method' => 'put'])}}
<h3>
    <div class="row">
        <div class="col-md-6">
            <input type="text" name= 'name' class="form-control" value="{{$record->name}}">
        </div>
        <div class="col-md-6">
           <select name="team_id">
                @foreach($teams as $team)
                    <option value="{{$team->id}}" @if($team->id == $record->team_id) selected @endif>
                        {{$team->name}}
                    </option>
               @endforeach
           </select>
        </div>
    </div>
    <button type="submit">Submit</button>
</h3>
{{Form::close()}}

@endsection