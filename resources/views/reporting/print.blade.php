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
                </table>


</div>

</div>

</center>
</body>