@extends('layouts.admin') @section('content')
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed"  style="width:40%; margin-left: auto; margin-right: auto;">
            <tr>
                <th>Unit</th>
                <th><div style="text-align: center"> Draft</div></th>
                <th><div style="text-align: center"> Complete</div></th>
            </tr>
            @foreach($teams as $team)
                <tr>
                    <td>{{$team->name}}</td>
                    <td align="center"> <a href="{{URL::to('/')}}/admin/team/{{$team->id}}/1"> {{count($team->assessments->where('submitted','<>', 1))}}</a></td>
                    <td align="center"> <a href="{{URL::to('/')}}/admin/team/{{$team->id}}/2"> {{count($team->assessments->where('submitted','=', 1))}}</a></td>
                </tr>
            @endforeach
        </table>
    </div>




@endsection