<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllCourse() {
        //select * from Course
        return Course::all();
    }
}
