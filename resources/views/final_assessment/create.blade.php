@extends('layouts.app') @section('content')
        <div class="title_header"> Assessment</div>
        <div class="title_header"> Unit: {{$team->name}}</div>
        <div class="title_header">Unit Leader: {{$assessor->name}}</div>
    </div>
        {{--@include('partials.dashboard_link')--}}
    <div class="well">
        @if($assessment->submitted)
            <h2>Date Submitted : {{$assessment->submit_date}}</h2>
        @endif
        @include('partials.text', ['label' => 'College Goal','name' => 'selected_goal','field' => 'name'])
        @include('partials.text', ['label' => 'Associated Course','name' => 'selected_course','field' => 'name'])
        @include('partials.text', ['label' => 'Student Learning Outcome','name' => 'selected_slo','field' => 'name'])
        @include('partials.text', ['label' => 'Method of Outcome Assessment','name' => 'assessment','field' => 'method'])
        @include('partials.text', ['label' => 'Performance Measure','name' => 'assessment','field' => 'measure'])
        <br>
            <form action="{{URL::to('/')}}/final_assessment" method="post" id="assessment">
                {{ csrf_field() }}
                <input type="hidden" name="assessment_id" value="{{$assessment->id}}" >
        <div class="mybox">
            <h2>Summary of Data Collected<br>(Performance Results)</h2></div>
                <br>
                <h3>Campus:</h3>
            <br>
            <table class="table">
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="usr">Floyd:</label>
                            <input type="text" class="form-control" id="floyd" name="floyd" value="<? echo $assessment->floyd ?>" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?> required >
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="usr">Cartersville:</label>
                            <input type="text" class="form-control" id="cartersville" name="cartersville" value="<? echo $assessment->cartersville ?>" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?>required >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="usr">Paulding:</label>
                            <input type="text" class="form-control" id="paulding" name="paulding" value="<? echo $assessment->floyd ?>" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?> required >
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="usr">Marietta:</label>
                            <input type="text" class="form-control" id="marietta" name="marietta" value="<? echo $assessment->cartersville ?>" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?>required >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="usr">Douglasville:</label>
                            <input type="text" class="form-control" id="douglasville" name="douglasville" value="<? echo $assessment->floyd ?>" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?> required >
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="usr">Heritage Hall:</label>
                            <input type="text" class="form-control" id="heritage" name="heritage" value="<? echo $assessment->cartersville ?>" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?>required >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="usr">eLearning:</label>
                            <input type="text" class="form-control" id="elearning" name="elearning" value="<? echo $assessment->floyd ?>" placeholder="Enter campus results, if applicable"  <? echo (@$_POST['save'] ? 'readonly' :'') ?> required >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label for="total"><div class="total">Summary of Data Collected</div></label>
                            <textarea class="form-control" id="total" rows="3" name="data_summary"  required <? echo (@$_POST['save'] ? 'readonly' :'') ?>><? echo $assessment->data_summary ?></textarea>
                        </div>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td  style="width:35%">
                        <h3>Summary of Assessment Results</h3>
                    </td>
                    <td style="width:65%">
                        <div class="col-md-7">
                            <div class="radio">
                                <label><input type="radio" name="results" value="1" <? if(@$_POST['save']){if(@$_POST['results']==1) echo 'checked';} else {if($assessment->results==4) echo 'checked';} ?> required >Exceeded Outcome</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="results" value="2" <? if(@$_POST['save']){if(@$_POST['results']==2) echo 'checked';} else {if($assessment->results==3) echo 'checked';} ?>  required >Meeting Outcome</label>
                            </div><div class="radio">
                                <label><input type="radio" name="results" value="3" <? if(@$_POST['save']){if(@$_POST['results']==3) echo 'checked';} else {if($assessment->results==2) echo 'checked';} ?> required >Approaching Outcome</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="results" value="4" <? if(@$_POST['save']){if(@$_POST['results']==4) echo 'checked';} else {if($assessment->results==1) echo 'checked';} ?> required >Not Meeting Outcome</label>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="form-group">

                <h3>Use of Results</h3>
                <textarea class="form-control" rows="5" name="actions" id="use" required <? echo (@$_POST['save'] ? 'readonly' :'') ?>><? echo $assessment->recommended_actions ?></textarea>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Save Assessment</button>
        {{--</div>--}}
            </form>
    </div>
        @include('partials.dashboard_link')
@endsection