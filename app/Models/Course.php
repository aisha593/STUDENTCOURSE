<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_name',
        'description',
        'status',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }
    
    // search functionality
    public static function searchByName($searchTerm)
{
    return self::where('course_name', 'like', '%' . $searchTerm . '%')->get();
}
}
