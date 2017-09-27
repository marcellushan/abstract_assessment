@extends('layouts.app') @section('content')
<h2><a href="{{URL::to('/')}}/assessor">Assessors</a> </h2>
<h4><a href="{{URL::to('/')}}/assessor/create">Add New</a> </h4>
<h2><a href="{{URL::to('/')}}/goal">Goals</a> </h2>
<h4><a href="{{URL::to('/')}}/goal/create">Add New</a> </h4>
<h2><a href="{{URL::to('/')}}/team">Teams</a> </h2>
<h4><a href="{{URL::to('/')}}/team/create">Add New</a> </h4>
<h2><a href="{{URL::to('/')}}/course">Courses</a> </h2>
<h4><a href="{{URL::to('/')}}/course/create">Add New</a> </h4>
<h2><a href="{{URL::to('/')}}/slo">SLOs</a> </h2>
<h4><a href="{{URL::to('/')}}/slo/create">Add New</a> </h4>
<h2><a href="{{URL::to('/')}}/assessment">Assessments</a> </h2>
<h4><a href="{{URL::to('/')}}/admin/assessment">Add New</a> </h4>
@endsection