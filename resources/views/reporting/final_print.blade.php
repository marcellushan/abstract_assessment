<script language="Javascript1.2">
    <!--
    function printpage() {
        window.print();
    }
    //-->
</script>


<body onload="printpage()">
<table width="1020" cellpadding="5" cellspacing="0" border="0"><td align="left" style="font-size: 20px; font-weight: bold;">Office of Strategic Planning, Assessment, &amp; Accreditation</td></tr></table>
<div style="padding: 20px; width: 990px; text-align: left;">

    <table width="980" cellpadding="5" cellspacing="0" border="0">
        <tr>

            <!-- td valign="top" width="200" align="center"><img src="https://www.highlands.edu/images/shield_logo_ds.png" /></td -->

            <td valign="top">
                <table width="950" cellpadding="5" cellspacing="0" border="0">

                    <tr><td width="220"><b>Unit/Team</b></td><td>{{$team->name}}</td></tr>
                    <tr><td><b>Unit Leader</b></td><td>{{$assessor->name}}</td></tr>

                    <tr><td><b>Assessment Period</b></td><td>{{$assessment->period}}</td></tr>

                    <tr><td><b>College Goal</b></td><td>{{$assessment->goal->name}}</td></tr>

                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Unit/Team Mission Statement</b></td><td style="border-bottom: 1px #111111 solid;">
                            {{$team->mission}}

                        </td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Associated Course</b></td><td style="border-bottom: 1px #111111 solid;">{{$assessment->course->name}}</td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Student Learning Outcome</b></td><td style="border-bottom: 1px #111111 solid;">{{$assessment->slo->name}}</td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Method of Outcome Assessment</b></td><td style="border-bottom: 1px #111111 solid;">{{$assessment->method}}</td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Performance Measure</b></td><td style="border-bottom: 1px #111111 solid;">{{$assessment->measure}}</td></tr>
                    <tr><td colspan="2"><b>&nbsp;</b></td></tr>
                    <tr><td colspan="2"><b>Summary of Data Collected (Performance Results)</b></td></tr>
                    <tr><td colspan="2"><b>&nbsp;</b></td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;" colspan="2"><b>Campus</b></td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Floyd</b></td><td style="border-bottom: 1px #111111 solid;">{{$finalAssessment->floyd}}</td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Cartersville</b></td><td style="border-bottom: 1px #111111 solid;">{{$finalAssessment->cartersville}}</td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Paulding</b></td><td style="border-bottom: 1px #111111 solid;">{{$finalAssessment->paulding}}</td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Marieta</b></td><td style="border-bottom: 1px #111111 solid;">{{$finalAssessment->marietta}}</td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Douglasville</b></td><td style="border-bottom: 1px #111111 solid;">{{$finalAssessment->douglasville}}</td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Heritage Hall</b></td><td style="border-bottom: 1px #111111 solid;">{{$finalAssessment->heritage}}</td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>eLearning</b></td><td style="border-bottom: 1px #111111 solid;">{{$finalAssessment->elearning}}</td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Summary of Data Collected</b></td><td style="border-bottom: 1px #111111 solid;">{{$finalAssessment->data_summary}}</td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Summary of Assessment Results</b></td><td style="border-bottom: 1px #111111 solid;">
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
                        </td></tr>
                    <tr><td style="border-bottom: 1px #111111 solid;"><b>Use of Results</b></td><td style="border-bottom: 1px #111111 solid;">{{$finalAssessment->actions}}</td></tr>
                </table>


</div>

</div>

</center>
</body>