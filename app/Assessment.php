<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = ['assessor_id','period','slo_id','goal_id','team_id','course','method','measure','submit_date'];

    public function assessor()
    {
        return $this->belongsTo('App\Assessor');
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
}
