<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    protected $courseService;

    public function __construct(CourseService $courseService) {
        $this->courseService = $courseService;
    }

    public function getAllCourses()
    {
        $result = $this->courseService->getAllCourse();
        return response()->json($result);
    }

    public function getCourseDetail(Request $request)
    {
        $id = $request->input('id');
        $result = $this->courseService->getCourse($id);
        return response()->json($result);
    }
}

