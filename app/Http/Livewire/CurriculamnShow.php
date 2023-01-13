<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use App\Models\Note;
use Livewire\Component;

class CurriculamnShow extends Component
{

    public $classId;
    public $note;
    
    public function render()
    {
     
         $classDetails = Curriculum::findOrFail($this->classId);
      //  dd($classDetails->notes);
        return view('livewire.curriculamn-show', [
            'classDetails' => $classDetails,
            'notes' => $classDetails->notes
        ]);
    }


    public function addNote(){
        $this->validate([
            'note' =>'required'
        ]);

         $curriculum = Curriculum::findOrFail($this->classId);
         $note = new Note();
         $note->description = $this->note;
         $note->save();

         $curriculum->notes()->attach($note->id);

         $this->note = '';

         flash()->addSuccess('Note added successfully!');
   }
}
