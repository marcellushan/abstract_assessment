@extends('layouts.admin') @section('content')
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed"  style="width:40%; margin-left: auto; margin-right: auto;">
            <tr>
                <th>Unit - Final</th>
                <th><div style="text-align: center"> Draft</div></th>
                <th><div style="text-align: center"> Complete</div></th>
            </tr>
            @foreach($finalTeams as $finalTeam)
                <tr>
                    <td>{{$finalTeam->name}}</td>
                    <td align="center"> <a href="{{URL::to('/')}}/admin/team/{{$finalTeam->id}}/3"> {{count($finalTeam->assessments->where('inactive','<>',1)->where('final_saved','=', 1)->where('final_submitted','<>', 1))}}</a></td>
                    <td align="center"> <a href="{{URL::to('/')}}/admin/team/{{$finalTeam->id}}/4"> {{count($finalTeam->assessments->where('inactive','<>',1)->where('submitted','=', 1)->where('final_submitted','=', 1))}}</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed"  style="width:40%; margin-left: auto; margin-right: auto;">
            <tr>
                <th>Unit - Initial</th>
                <th><div style="text-align: center"> Draft</div></th>
                <th><div style="text-align: center"> Complete</div></th>
            </tr>
            @foreach($initialTeams as $initialTeam)
                <tr>
                    <td>{{$initialTeam->name}}</td>
                    <td align="center"> <a href="{{URL::to('/')}}/admin/team/{{$initialTeam->id}}/1"> {{count($initialTeam->assessments->where('inactive','<>',1)->where('submitted','<>', 1))}}</a></td>
                    <td align="center"> <a href="{{URL::to('/')}}/admin/team/{{$initialTeam->id}}/2"> {{count($initialTeam->assessments->where('inactive','<>',1)->where('submitted','=', 1))}}</a></td>
                </tr>
            @endforeach
        </table>
    </div>




@endsection