<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IAbstractController extends Controller
{

    /**
     * @var $category
     *
     * The abstract name of the model to be used
     */
    protected $category;

    /**
     * IAbstractController constructor.
     *
     * Uses the category variable to build the Model object
     */


    public function __construct() {

        $this->model_name = 'App\\' . ucfirst($this->category);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $model_name = 'App\\' . ucfirst($this->category);
        $model = new $this->model_name;
        $records = $model->orderBy('name')->get();

        return view($this->category . '.index')->with(compact('records'));
        dd($model->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->category . '.create');
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
        return redirect( $this->category  . '/' . $model->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new $this->model_name();
        $record = $model::find($id);
//        $team = $record->team;
//        $user = $record->user;
        return view($this->category . '.show')->with(compact('record'));
        dd($record);

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
        $record = $model::find($id);
        return view($this->category . '.edit')->with(compact('record'));
        dd($record);
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
        $data = $request->except(['_token','_method']);
        $record->fill($data);
        echo $changed = $record->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->model_name;
        $record = $model::destroy($id);
        return redirect( $this->category);
    }
}
