<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assessment extends Model
{
    protected $fillable = ['assessor_id','period','slo_id','goal_id','team_id','course_id','method','measure','submitted','submit_date'];

    public function assessor()
    {
        return $this->belongsTo('App\Assessor');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    public function slo()
    {
        return $this->belongsTo('App\Slo');
    }

    public function goal()
    {
        return $this->belongsTo('App\Goal');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function finalAssessment()
    {
        return $this->hasOne('App\FinalAssessment');
    }

}
