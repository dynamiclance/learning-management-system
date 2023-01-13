<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use Livewire\Component;

class CurriculamnEdit extends Component
{
    public $classId;
    public $name;
    public $date;
    public $time;


    public function mount() {

        $curriculum = Curriculum::findOrFail($this->classId);

        $this->name = $curriculum->name;
        $this->date = date('Y-m-d', strtotime($curriculum->created_at));
        $this->time = $curriculum->class_time;
    }
    

    public function render()
    {
        return view('livewire.curriculamn-edit');
    }

    public function updateCurriculum () {
        $this->validate([
            'name' => 'required|min:3',
            'date' => 'required|date',
            'time' => '',
        ]);

        $curriculum = Curriculum::findOrFail($this->classId);
        $curriculum->name = $this->name;
        $curriculum->created_at = $this->date;
        $curriculum->class_time = $this->time;
        $curriculum->save();

        flash()->addSuccess('Curriculum updated successfully');
        
        return redirect()->route('course.show', $curriculum->course->id);
    }
}
