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

        // Tab 1: tất cả yêu cầu xin vào học của các khóa do teacher tạo
        $requests = CourseUser::with(['user', 'course'])
            ->whereHas('course', function ($query) use ($teacherId) {
                $query->where('user_id', $teacherId);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Tab 2: thống kê khóa học + số thành viên đã được duyệt
        $courses = Course::withCount([
            'courseUsers as approved_members_count' => function ($query) {
                $query->where('status', 'approved');
            }
        ])
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

        $courseUser->status = 'approved';
        $courseUser->save();

        return redirect()->route('teacher.dashboard')->with('success', 'Đã duyệt học viên');
    }

    public function destroyRequest($id)
    {
        $teacherId = auth()->id();

        $courseUser = CourseUser::where('id', $id)
            ->whereHas('course', function ($query) use ($teacherId) {
                $query->where('user_id', $teacherId);
            })
            ->firstOrFail();

        $courseUser->delete();

        return redirect()->route('teacher.dashboard')->with('success', 'Đã xóa yêu cầu xin vào học');
    }

    public function members($courseId)
    {
        $teacherId = auth()->id();

        $course = Course::where('id', $courseId)
            ->where('user_id', $teacherId)
            ->firstOrFail();

        $members = CourseUser::with('user')
            ->where('course_id', $courseId)
            ->where('status', 'approved')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('teacher.members', compact('course', 'members'));
    }

    public function removeMember($id)
    {
        $teacherId = auth()->id();

        $courseUser = CourseUser::where('id', $id)
            ->where('status', 'approved')
            ->whereHas('course', function ($query) use ($teacherId) {
                $query->where('user_id', $teacherId);
            })
            ->firstOrFail();

        $courseId = $courseUser->course_id;
        $courseUser->delete();

        return redirect()->route('teacher.members', $courseId)->with('success', 'Đã xóa học viên khỏi khóa học');
    }
}
