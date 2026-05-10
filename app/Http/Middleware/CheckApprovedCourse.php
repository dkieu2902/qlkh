<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckApprovedCourse
{
    public function handle(Request $request, Closure $next)
    {
        $courseId = $request->route('courseId');

        $isApproved = DB::table('course_user')
            ->where('user_id', Auth::id())
            ->where('course_id', $courseId)
            ->where('status', 'approved')
            ->exists();

        if (!$isApproved) {
            return redirect()->back()->with('error', 'Bạn chưa được duyệt để vào học khóa này.');
        }

        return $next($request);
    }
}
