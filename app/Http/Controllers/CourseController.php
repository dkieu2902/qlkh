<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\CourseUser;

class CourseController extends Controller
{
    public function index()
{
    $courses = Course::with(['courseUsers' => function ($query) {
        $query->where('user_id', auth()->id());
    }])->latest()->get();

    return view('components.courses.course_list', compact('courses'));
}

    public function create()
    {
        return view('components.courses.create_course');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'price'   => 'required|string',
            'img_url' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'title.required'   => 'Vui lòng nhập tên khóa học.',
            'content.required' => 'Vui lòng nhập nội dung khóa học.',
            'price.required'   => 'Vui lòng nhập giá khóa học.',
            'img_url.required' => 'Vui lòng chọn ảnh.',
            'img_url.image'    => 'File phải là ảnh.',
        ]);

        $imageName = null;

        if ($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/courses'), $imageName);
        }

        Course::create([
            'title'   => $request->title,
            'content' => $request->content,
            'price'   => $request->price,
            'img_url' => 'uploads/courses/' . $imageName,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('courses.index')->with('success', 'Tạo khóa học thành công.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('components.courses.edit_course', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'price'   => 'required|string',
            'img_url' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $course->img_url;

        if ($request->hasFile('img_url')) {
            if ($course->img_url && File::exists(public_path($course->img_url))) {
                File::delete(public_path($course->img_url));
            }

            $image = $request->file('img_url');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/courses'), $imageName);

            $imagePath = 'uploads/courses/' . $imageName;
        }

        $course->update([
            'title'   => $request->title,
            'content' => $request->content,
            'price'   => $request->price,
            'img_url' => $imagePath,
        ]);

        return redirect()->route('courses.index')->with('success', 'Cập nhật khóa học thành công.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        if ($course->img_url && File::exists(public_path($course->img_url))) {
            File::delete(public_path($course->img_url));
        }

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Xóa khóa học thành công.');
    }



    public function show($id)
    {
        $course = Course::with('videos')->findOrFail($id);
        return view('components.courses.show', compact('course'));
    }

public function register($id)
{
    $exists = CourseUser::where('user_id', auth()->id())
        ->where('course_id', $id)
        ->first();

    if ($exists) {
        if ($exists->status === 'pending') {
            return back()->with('success', 'Bạn đang đợi duyệt khóa học này.');
        }

        if ($exists->status === 'approved') {
            return back()->with('success', 'Bạn đã được duyệt vào khóa học này.');
        }
    }

    CourseUser::create([
        'user_id' => auth()->id(),
        'course_id' => $id,
        'status' => 'pending'
    ]);

    return back()->with('success', 'Đã gửi yêu cầu, chờ admin duyệt');
}

}
