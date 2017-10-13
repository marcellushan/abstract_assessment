<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reassessment extends Model
{
    public function assessor()
    {
        return $this->belongsTo('App\Assessor');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function goal()
    {
        return $this->belongsTo('App\Goal');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function slo()
    {
        return $this->belongsTo('App\Slo');
    }
}
