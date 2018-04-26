@extends('layouts.app') @section('content')
    <div class="title_header"> Assessment</div>
    <div class="title_header"> Unit: {{$team->name}}</div>
    <div class="title_header">Unit Leader: {{$assessor->name}}</div>
    </div>
    <div class="well">
    <h1 align="center"><a href="{{URL::to('/')}}/comment/team/{{$team->id}}">Return to Team</a></h1>
    </div>
    <div class="well">
    @include('partials.text', ['label' => 'College Goal','name' => 'selected_goal','field' => 'name'])
    @include('partials.text', ['label' => 'Associated Course','name' => 'selected_course','field' => 'name'])
    @include('partials.text', ['label' => 'Student Learning Outcome','name' => 'selected_slo','field' => 'name'])
    @include('partials.text', ['label' => 'Method of Outcome Assessment','name' => 'assessment','field' => 'method'])
    @include('partials.text', ['label' => 'Performance Measure','name' => 'assessment','field' => 'measure'])
    @if($assessment->final_saved)
            <div class="mybox">
                <h2>Summary of Data Collected<br>(Performance Results)</h2>
                <br>
                <h2>Campus:</h2>
                <br>
                <table class="table">
                    <tr>
                        <td>
                            <h4>Floyd</h4>{{$finalAssessment->floyd}}
                        </td>
                        <td>
                            <h4>Cartersville</h4>{{$finalAssessment->cartersville}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Paulding</h4>{{$finalAssessment->paulding}}
                        </td>
                        <td>
                            <h4>Marietta</h4>{{$finalAssessment->marietta}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Douglasville</h4>{{$finalAssessment->douglasville}}
                        </td>
                        <td>
                            <h4>Heritage Hall</h4>{{$finalAssessment->heritage}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>eLearning</h4>{{$finalAssessment->elearning}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h3>Summary of Data Collected</h3>{{$finalAssessment->data_summary}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Summary of Assessment Results</h3>
                            {{--</td>--}}
                            {{--<td>--}}
                            @if($finalAssessment->results == 1)
                                Exceeded Outcome
                            @endif
                            @if($finalAssessment->results == 2)
                                Meeting Outcome
                            @endif
                            @if($finalAssessment->results == 3)
                                Approaching Outcome
                            @endif
                            @if($finalAssessment->results == 4)
                                Not Meeting Outcome
                        @endif
                        {{--</td>--}}
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h3>Use of Results</h3>{{$finalAssessment->actions}}
                        </td>
                    </tr>
                </table>
    @endif
<br>
</div>
<div class="well">
<h2>Comments</h2>
        @if(count($comments) > 0)
        <table border="1">
            <tr>
                <th width="60%">
                    Details
                </th>
                <th width="10%">
                    Commenter
                </th>
                <th width="10%">
                    Phase
                </th>
                <th width="15%">
                    Comment Date
                </th>
            </tr>
            @endif
    @forelse($comments as $comment)

                <tr>
                    <td>
                        {{$comment->name}}
                    </td>
                    <td>
                        {{$comment->user->name}}
                    </td>
                    <td>
                      @if($comment->type) Final @else Initial @endif
                    </td>
                    <td>
                        {{$comment->created_at}}
                    </td>
                </tr>


    @empty
        <h2>No existing  comments</h2>
    @endforelse
        </table>
    <form action="{{URL::to('/')}}/comment" method="post" id="comment">
    {{ csrf_field() }}
    <input type="hidden" name="assessment_id" value="{{$assessment->id}}">
    <input type="hidden" name="type" value="{{$team->final or 0}}">

    @include('partials.textbox', ['label' => 'Add Comment','name' => 'name'])
            <button type="submit" class="btn btn-lg btn-primary">Save Comment</button>
    </form>

@endsection