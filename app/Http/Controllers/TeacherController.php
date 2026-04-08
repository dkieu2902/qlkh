<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $teacherId = auth()->id();

        // Tab 1: các user xin vào học những khóa của teacher này
        $requests = CourseUser::with(['user', 'course'])
            ->whereHas('course', function ($query) use ($teacherId) {
                $query->where('user_id', $teacherId);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Tab 2: các khóa học của teacher và danh sách user đã đăng ký
        $courses = Course::with(['courseUsers.user'])
            ->where('user_id', $teacherId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('teacher.dashboard', compact('requests', 'courses'));
    }

    public function approve($id)
    {
        $teacherId = auth()->id();

        $courseUser = CourseUser::where('id', $id)
            ->whereHas('course', function ($query) use ($teacherId) {
                $query->where('user_id', $teacherId);
            })
            ->firstOrFail();

        $courseUser->approved = true;
        $courseUser->save();

        return redirect()->route('teacher.dashboard')->with('success', 'Đã duyệt học viên');
    }
}
