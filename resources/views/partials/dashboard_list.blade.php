<h2>Assessor: <span class="not_bold"> {{$assessor->name}} </span></h2>
<h2>Team: {{$team->name}}</h2>
@if(count($saveds) > 0)
    <h3> Draft Assessments</h3>
    {{--<div class="table-responsive">--}}
        <table class="table table-condensed">
            <tr>
                <th width="10%">Course</th>
                <th width="70%">Student Learning Objective</th>
                <th>Assessor</th>
            </tr>
            @forelse ($saveds->where('inactive','<>',1) as $saved)
                <tr>
                    <td>
                        <a href="{{URL::to('/')}}/assessment/{{$saved->id}}/edit">{{ $saved->course->name }}</a>
                    </td>
                    <td>
                        {{ $saved->slo->name }}
                    </td>
                    <td>
                        {{$saved->assessor->name}}
                    </td>
                </tr>
            @empty
                <p>No Assessments</p>
            @endforelse
            @endif
        </table>
    {{--</div>--}}
    {{--</div>--}}

    @if(count($submitteds) > 0)
        <h3> Completed Assessments</h3>
            <table class="table table-condensed">
                <tr>
                    <th width="10%">Course</th>
                    <th width="70%">Student Learning Objective</th>
                    <th>Assessor</th>
                </tr>
                @forelse ($submitteds->where('inactive','<>',1) as $submitted)
                    <tr>
                        <td>
                            <a href="{{URL::to('/')}}/assessment/{{$submitted->id}}">{{ $submitted->course->name }}</a>
                        </td>
                        <td>
                            {{ $submitted->slo->name }}
                        </td>
                        <td>
                            {{$submitted->assessor->name}}
                        </td>
                    </tr>
                @empty
                    <p>No Assessments</p>
                @endforelse
                @endif
            </table>
