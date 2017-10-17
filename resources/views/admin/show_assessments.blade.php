@extends('layouts.admin') @section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Unit</th>
                <th>Draft</th>
                <th>Complete</th>
            </tr>
            @foreach($teams as $team)
                <tr>
                    <td>{{$team->name}}</td>
                    <td> <a href="{{URL::to('/')}}/admin/team/{{$team->id}}/1"> {{count($team->assessments->where('submitted','<>', 1))}}</a></td>
                    <td> <a href="{{URL::to('/')}}/admin/team/{{$team->id}}/2"> {{count($team->assessments->where('submitted','=', 1))}}</a></td>
                </tr>
            @endforeach
        </table>
    </div>




@endsection