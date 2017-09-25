<?php

namespace App\Http\Controllers;

use App\Assessor;
use App\Team;
use Illuminate\Http\Request;

class AssessorController extends IAbstractController
{
    protected $category = 'assessor';

    /**
     * IAbstractController constructor.
     *
     * Uses the category variable to build the Model object
     */


    public function __construct() {

        $this->model_name = 'App\\' . ucfirst($this->category);

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
        $allTeams = Team::get();
        $record = $model::find($id);
//        $record->teams()->attach(1);
        $teams = $record->teams;
        return view($this->category . '.edit')->with(compact('record','teams','allTeams'));
        dd($allTeams);
    }
}
