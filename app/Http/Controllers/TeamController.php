<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends IAbstractController
{
    protected $category = 'team';

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:teams',
        ]);
        $data = $request->except('_token');
//        dd($request);
        $model = new $this->model_name($data);
        $model->save();
//        $record = $model;
        return redirect( 'team');

    }

    public function changeInitial($team_id)
    {

        $team = Team::find($team_id);
//        dd($team);
        $team->final = 0;
        $team->save();
        return redirect( 'team');
    }

    public function changeFinal($team_id)
    {

        $team = Team::find($team_id);
//        dd($team);
        $team->final = 1;
        $team->save();
        return redirect( 'team');
    }



}
