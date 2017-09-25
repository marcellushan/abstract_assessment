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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
//        dd($request);
        $model = new $this->model_name($data);
        $model->save();
//        $record = $model;
        return redirect( $this->category  . '/' . $model->id . '/edit');

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
        $allTeams = Team::orderBy('name')->get();
        $record = $model::find($id);
//        $record->teams()->attach(1);
        $teams = $record->teams;
        return view($this->category . '.edit')->with(compact('record','teams','allTeams'));
        dd($allTeams);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = $this->model_name;
        $record = $model::find($id);
        $data = $request->except(['_token','_method','teams']);
        $record->fill($data);
        $teams = $request->teams;
        if(count($teams) > 0) {
            foreach ($teams as $team)
                $record->teams()->attach($team);
        }
//        dd($team);
        $record->save();
        return redirect('assessor/' . $id . '/edit'  );
    }
}
