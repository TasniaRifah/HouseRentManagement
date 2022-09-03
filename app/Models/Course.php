<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{

    use HasFactory,SoftDeletes;
    // protected $table='Categories';//j table data insert korte hobe oi table er name bole dite hobe
 
    protected $fillable=['title','batch_no','class_start_date','class_end_date','instructor_name','baner','is_active','course_type'];
}
