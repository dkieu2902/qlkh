<?php

namespace App\Http\Controllers;

use App\Models\CourseUser;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        $studentId = auth()->id();

        $courses = CourseUser::with('course')
            ->where('user_id', $studentId)
            ->where('status', 'approved')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('student.dashboard', compact('courses'));
    }
}
