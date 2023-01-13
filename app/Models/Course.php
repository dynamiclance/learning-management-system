<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    //fillable fields
    protected $table = 'courses';

    // protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'slug',
        'image',
       'start_date',
        'end_date',
        'user_id'
    ];

    //relationships

    public function curriculumns()
    {
        return $this->hasMany(Curriculum::class);
    }


    public function students()
        {
            return $this->belongsToMany(User::class, 'course_student', 'course_id', 'user_id');
        }
}
