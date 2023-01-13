<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function show($id) {
        return view('course.class.show', [
            'classId' => $id
        ]);
    }

    public  function edit($id) {
        return view('course.class.edit', [
            'classId' => $id
        ]);
    }
}
