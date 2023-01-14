<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table  = 'curricula';

    protected $fillable = [
        'name',
        'week_day',
        'class_time',
        'end_date',
        'course_id'
    ];

    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);

    }
    
    public function notes() {
        return $this->belongsToMany(Note::class, 'curriculum_note');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function presentStudent() {
        return Attendance::where('curriculum_id', $this->id)->count();
    }


}
