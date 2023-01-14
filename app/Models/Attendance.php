<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    
    //fillable attributes
    protected $table = 'attendances';

    protected $fillable = [
        'user_id',
        'curriculum_id',
    ];
      
}
