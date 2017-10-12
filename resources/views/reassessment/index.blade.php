@extends('layouts.app') @section('content')

    <h1 align="center">Reassessments</h1>
</div>
<div class="well">
    <div class="row">
        <div class="col-md-5">
           <h3> Pending</h3>
            <div class="table-responsive">
                    <table class="table table-striped">
                    <tr>
                        <th>Unit</th>
                        <th>Course</th>
                        {{--<th>Assessor</th>--}}
                        <th>Results</th>
                        {{--<th>17-18 Assessment?</th>--}}

                    </tr>
                    @foreach($reassessments as $reassessment)
                            @if(! $reassessment->associated_assessment)
                                <tr>
                                    <td>{{$reassessment->team->name}}</td>
                                    <td><a href="{{URL::to('/')}}/reassessment/{{$reassessment->id}}">{{$reassessment->course}}</a></td>
                                    {{--<td>{{$reassessment->assessor->name}}</td>--}}
                                    <td>   @if($reassessment->results == 1) Not Meeting Outcome @else Approaching Outcome @endif</td>
                                    {{--<td>@if($reassessment->associated_assessment)<a href="{{URL::to('/')}}/admin/{{$reassessment->associated_assessment}}/edit">Yes</a> @else No @endif</td>--}}
                                </tr>
                                @endif
                    @endforeach
                    </table>
                </div>

        </div>
        <div class="col-md-7">
            <h3> Resolved</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Unit</th>
                        <th>Course</th>
                        {{--<th>Assessor</th>--}}
                        <th>Results</th>
                        {{--<th>17-18 Assessment?</th>--}}
                        <th></th>
                    </tr>
                    @foreach($reassessments as $reassessment)
                        @if($reassessment->associated_assessment)
                            <tr>
                                <td>{{$reassessment->team->name}}</td>
                                <td><a href="{{URL::to('/')}}/reassessment/{{$reassessment->id}}">{{$reassessment->course}}</a></td>
                                {{--<td>{{$reassessment->assessor->name}}</td>--}}
                                <td>   @if($reassessment->results == 1) Not Meeting Outcome @else Approaching Outcome @endif</td>
                                <td><a href="{{URL::to('/')}}/assessment/{{$reassessment->associated_assessment}}">New Assessment</a></td>
                                {{--<td>@if($reassessment->associated_assessment)<a href="{{URL::to('/')}}/admin/{{$reassessment->associated_assessment}}/edit">Yes</a> @else No @endif</td>--}}
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
</div>






@endsection