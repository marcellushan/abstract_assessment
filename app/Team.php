<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function teams()
    {
        return $this->belongsToMany('App\Assessor');
    }
}
