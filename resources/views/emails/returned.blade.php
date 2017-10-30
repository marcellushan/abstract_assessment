@extends('layouts.app') @section('content')

<h1 align="center">Assessment Reporting</h1>

<h2>Please make modifications to the following assessment:</h2>

<h3><a href="{{URL::to('/')}}/reporting/{{$assessment->id}}">Link to Assessment</a></h3>
<h3>Comments from Assessment Team</h3>
{{$return_reason}}

<h3><a href="{{URL::to('/')}}">Link to Assessment Application</a></h3>

<h2>Contact <a href="mailto:jhitzema@highlands.edu">Jason Hitzeman</a>  with any questions</h2>
@endsection