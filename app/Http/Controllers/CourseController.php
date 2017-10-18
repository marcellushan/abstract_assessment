<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends IAbstractController
{
    protected $category = 'course';

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:courses',
//            'body' => 'required',
        ]);
        $data = $request->except('_token');
//        dd($request);
        $model = new $this->model_name($data);
        $model->save();
//        $record = $model;
        return redirect( $this->category);

    }


}
