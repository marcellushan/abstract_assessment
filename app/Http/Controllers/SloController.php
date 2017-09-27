<?php

namespace App\Http\Controllers;

use App\Slo;
use App\Team;
use Illuminate\Http\Request;

class SloController extends IAbstractController
{
    protected $category = 'slo';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::get();
//        dd($teams);
        return view($this->category . '.create')->with(compact('teams'));
    }

    /** `
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = new $this->model_name();
        $teams = Team::get();
        $record = $model::find($id);
        return view($this->category . '.edit')->with(compact('record','teams'));
        dd($record);
    }
}
