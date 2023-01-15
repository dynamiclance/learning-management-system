<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{ 
    public function index() {
        return view('quiz.index');
    }

    public function edit(Quiz $quiz) {
        return view('quiz.edit', [
            'quiz' => $quiz,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        Quiz::create([
            'name' => $request->name,
        ]);

        flash()->addSuccess('Quiz successfully created');
        return redirect()->route('quiz.index');
    }

    public function show(Quiz $quiz) {
       // dd($quiz);
        return view('quiz.show', [
            'quiz' => $quiz,
        ]);
    }

}