<h2>Assessor: <span class="not_bold"> {{$assessor->name}} </span></h2>
<h2>Team: {{$team->name}}</h2>

    {{--@if(count($initial_completes) > 0)--}}
            <h3> Completed Initial Assessments</h3>
            <table class="table table-condensed">
                <tr>
                    <th width="10%">Course</th>
                    <th width="70%">Student Learning Objective</th>
                    <th>Assessor</th>
                </tr>
                @forelse ($initial_completes as $initial_complete)
                    @if(is_null($initial_complete->finalAssessment))
                        <tr>
                            <td>
                                <a href="{{URL::to('/')}}/final_assessment/create/{{$initial_complete->id}}">{{ $initial_complete->course->name }}</a>
                            </td>
                            <td>
                                {{ $initial_complete->slo->name }}
                            </td>
                            <td>
                                {{$initial_complete->assessor->name}}
                            </td>
                        </tr>
                    @endif
                @empty
                    <p>No Assessments</p>
                @endforelse
                {{--@endif--}}
            </table>

<h3> Saved Final Assessments</h3>
<table class="table table-condensed">
    <tr>
        <th width="10%">Course</th>
        <th width="70%">Student Learning Objective</th>
        <th>Assessor</th>
    </tr>
    @forelse ($initial_completes as $initial_complete)
        @if($initial_complete->finalAssessment &&  ! $initial_complete->final_submitted)
            <tr>
                <td>
                    <a href="{{URL::to('/')}}/final_assessment/{{$initial_complete->finalAssessment->id}}">{{ $initial_complete->course->name }}</a>
                </td>
                <td>
                    {{ $initial_complete->slo->name }}
                </td>
                <td>
                    {{$initial_complete->assessor->name}}
                </td>
            </tr>
        @endif
    @empty
        <p>No Assessments</p>
    @endforelse
</table>
                <h3> Completed Final Assessments</h3>
                <table class="table table-condensed">
                    <tr>
                        <th width="10%">Course</th>
                        <th width="70%">Student Learning Objective</th>
                        <th>Assessor</th>
                    </tr>
                    @forelse ($initial_completes as $initial_complete)
                        @if($initial_complete->finalAssessment &&  $initial_complete->final_submitted)
                            <tr>
                                <td>
                                    <a href="{{URL::to('/')}}/final_assessment/{{$initial_complete->finalAssessment->id}}">{{ $initial_complete->course->name }}</a>
                                </td>
                                <td>
                                    {{ $initial_complete->slo->name }}
                                </td>
                                <td>
                                    {{$initial_complete->assessor->name}}
                                </td>
                            </tr>
                        @endif
                    @empty
                        <p>No Assessments</p>
                    @endforelse
                    {{--@endif--}}
                </table>
