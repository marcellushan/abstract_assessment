@extends('layouts.app') @section('content')
<div class="row">
    <div class="col-md-3">
        <h2><a href="{{URL::to('/')}}/assessor">Assessors</a> </h2>
        <h4><a href="{{URL::to('/')}}/assessor/create">Add New</a> </h4>
    </div>
    <div class="col-md-3">
        <h2><a href="{{URL::to('/')}}/goal">Goals</a> </h2>
        <h4><a href="{{URL::to('/')}}/goal/create">Add New</a> </h4>
    </div>
    <div class="col-md-3">
        <h2><a href="{{URL::to('/')}}/team">Teams</a> </h2>
        <h4><a href="{{URL::to('/')}}/team/create">Add New</a> </h4>
    </div>
    <div class="col-md-3">
        <h2><a href="{{URL::to('/')}}/course">Courses</a> </h2>
        <h4><a href="{{URL::to('/')}}/course/create">Add New</a> </h4>
    </div>
    <div class="col-md-3">
        <h2><a href="{{URL::to('/')}}/slo">SLOs</a> </h2>
        <h4><a href="{{URL::to('/')}}/slo/create">Add New</a> </h4>
    </div>
    <div class="col-md-3">
        <h2><a href="{{URL::to('/')}}/admin/show_assessments">Assessments</a> </h2>
        <h4><a href="{{URL::to('/')}}/admin/assessment">Add New</a> </h4>
        <h4><a href="{{URL::to('/')}}/admin/deactivate_assessment">Deactivate</a> </h4>
    </div>
    <div class="col-md-3">
        <h2><a href="{{URL::to('/')}}/comment">Add Comments</a> </h2>
    </div>
    <div class="col-md-3">
        <h2><a href="{{URL::to('/')}}/reassessment">Reassessments</a> </h2>
    </div>
</div>
@endsection