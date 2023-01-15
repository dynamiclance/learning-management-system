<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Quiz;
use Livewire\Component;

class QuizEdit extends Component
{
    public $quiz;
    public $name;
    public $question;
    public $questions;

    public function mount() {
        $this->name = $this->quiz->name;
        $addedQuestions = $this->quiz->questions->pluck('id')->toArray();
        $this->questions = Question::select(['id', 'name'])->whereNotIn('id', $addedQuestions)->get();

    }

    public function render()
    {
    //  dd($quiz);
        return view('livewire.quiz-edit');
    }

    public function UpdateQuiz() {
        

        $quiz = Quiz::findOrFail($this->quiz->id);
      //  dd($quiz);

        $quiz->name = $this->name;
        $quiz->save();

        flash()->addSuccess("Quiz has been updated");
        return redirect()->route('quiz.index');
    }


    public function addQuestion(){
        $this->validate([
            'question' => 'required',
        ]);

        $quiz = Quiz::findOrFail($this->quiz->id);
        
        $quiz->questions()->attach($this->question);

        flash()->addSuccess('Question added successfully');

        return redirect()->route('quiz.edit',$this->quiz->id);
    } 

    public function questionDelete($id) {

        $quiz = Quiz::findOrFail($this->quiz->id);
        $quiz->questions()->detach($id);

        flash()->addSuccess('Question deleted successfully');

        return redirect()->route('quiz.edit',$this->quiz->id);
    }


}
