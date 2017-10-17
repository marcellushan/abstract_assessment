@extends('layouts.app') @section('content')
    <div class="title_header"> Assessment</div>
    <div class="title_header"> Unit: {{$team->name}}</div>
    <div class="title_header">Unit Leader: {{$assessor->name}}</div>
    </div>
    <div class="well">
    <h1 align="center"><a href="{{URL::to('/')}}/comment">Return to Comments</a></h1>
    </div>
    <div class="well">
    @include('partials.text', ['label' => 'College Goal','name' => 'selected_goal','field' => 'name'])
    @include('partials.text', ['label' => 'Associated Course','name' => 'selected_course','field' => 'name'])
    @include('partials.text', ['label' => 'Student Learning Outcome','name' => 'selected_slo','field' => 'name'])
    @include('partials.text', ['label' => 'Method of Outcome Assessment','name' => 'assessment','field' => 'method'])
    @include('partials.text', ['label' => 'Performance Measure','name' => 'assessment','field' => 'measure'])
<br>
</div>
<div class="well">
<h2>Comments</h2>
        @if(count($comments) > 0)
        <table border="1">
            <tr>
                <th width="70%">
                    Details
                </th>
                <th width="10%">
                    Commenter
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

    @include('partials.textbox', ['label' => 'Add Comment','name' => 'name'])
            <button type="submit" class="btn btn-lg btn-primary">Save Comment</button>
    </form>

@endsection