<h2>Assessor {{$assessor->name}} </h2>
<h2>Team {{$team->name}}</h2>
<h3> Saved Assessments</h3>
@if(count($saveds) > 0)
    <h4 class="table-responsive">
        <table class="table table-condensed">
            <tr>
                <th width="10%">Course</th>
                <th width="70%">Student Learning Objective</th>
                <th>Assessor</th>
            </tr>
            @forelse ($saveds as $saved)
                <tr>
                    <td>
                        <a href="{{URL::to('/')}}/assessment/{{$saved->id}}/edit">{{ $saved->course }}</a>
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
    </h4>
    <h3> Submitted Assessments</h3>
    @if(count($submitteds) > 0)
        <h4 class="table-responsive">
            <table class="table table-condensed">
                <tr>
                    <th width="10%">Course</th>
                    <th width="70%">Student Learning Objective</th>
                    <th>Assessor</th>
                </tr>
                @forelse ($submitteds as $submitted)
                    <tr>
                        <td>
                            <a href="{{URL::to('/')}}/assessment/{{$submitted->id}}">{{ $submitted->course }}</a>
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
        </h4>
    <a href="{{URL::to('/')}}/assessment/create/{{$team->id}}/{{$assessor->id}}">Create New Assessment</a>