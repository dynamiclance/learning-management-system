<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        return view('course.index');
    }

    public function create() {
        return view('course.create');
    }

    public function show($id) {

        return view('course.show', [
            'courseId' => $id,
        ]);
    }
       
}
