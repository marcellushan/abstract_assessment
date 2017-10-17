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
        return redirect( $this->category  . '/' . $model->id . '/edit');

    }

//    public function status($id, $status= 0)
//    {
//        $model = new $this->model_name();
//        $record = $model::find($id);
////        $team = $record->team;
////        $user = $record->user;
//        return view($this->category . '.show')->with(compact('record', 'status'));
////        dd($record);
//
//    }
}
