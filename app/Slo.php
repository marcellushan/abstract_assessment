<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slo extends Model
{
    protected $fillable = ['name','team_id','inactive'];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
