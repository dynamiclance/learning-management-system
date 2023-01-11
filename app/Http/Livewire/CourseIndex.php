<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseIndex extends Component
{
    public function render()
    {
        $courses = Course::paginate(5);
        //dd($courses);

        return view('livewire.course-index', [
            'courses' => $courses,
        ]);
    }


    public function deleteCourse($id) {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('course.index');
    }
}
