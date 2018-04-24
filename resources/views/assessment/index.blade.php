@extends('layouts.app') @section('content')
<h1 align="center"><a href="{{URL::to('/')}}/dashboard/assessor_auth/none">Facilitator Login</a></h1>
</div>
<div class="well">
    <h1 align="center"><a href="{{URL::to('/')}}/comment">IE Reviewer Login</a></h1>
</div>
<div class="well">
<div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed"  style="width:40%; margin-left: auto; margin-right: auto;">
<tr>
    <th>Unit Final</th>
    <th align="center"><div style="text-align: center"> Assessments</div></th>
    {{--<th align="center"><div style="text-align: center"> Final</div></th>--}}
</tr>
@foreach($finalTeams as $finalTeam)
<tr>
    <td>{{$finalTeam->name}}</td>
   <td align="center"> <a href="{{URL::to('/')}}/reporting/team/{{$finalTeam->id}}"> {{count($finalTeam->assessments->where('final_submitted', '=', 1))}}</a></td>
</tr>
@endforeach
</table>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed"  style="width:40%; margin-left: auto; margin-right: auto;">
                <tr>
                    <th>Unit Initial</th>
                    <th align="center"><div style="text-align: center"> Assessments</div></th>
                    {{--<th align="center"><div style="text-align: center"> Final</div></th>--}}
                </tr>
                @foreach($initialTeams as $initialTeam)
                    <tr>
                        <td>{{$initialTeam->name}}</td>
                        <td align="center"> <a href="{{URL::to('/')}}/reporting/team/{{$initialTeam->id}}"> {{count($initialTeam->assessments->where('inactive','<>',1)->where('submitted', '=', 1))}}</a></td>
                        {{--<td align="center"> <a href="{{URL::to('/')}}/reporting/team/{{$team->id}}"> {{count($team->assessments->where('final_submitted', '=', 1))}}</a></td>--}}
                    </tr>
                @endforeach
            </table>
        </div>
</div>
</div>
<div class="well">
    <h1 align="center"><a href="{{URL::to('/')}}/admin">Administrator Login</a></h1>
</div>


@endsection