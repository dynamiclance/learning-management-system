<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuestionIndex extends Component
{

    public function render()
    {
        $questions = Question::all();
        //dd($questions);
        return view('livewire.question-index', [
            'questions' => $questions,
        ]);
    }


    public function QuestionDelete($id) {
        $question = Question::findOrFail($id);
        $question->delete();

        flash()->addSuccess('Question deleted successfully');

        return redirect()->route('question.index');
    }
}
