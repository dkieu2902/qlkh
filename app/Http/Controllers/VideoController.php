<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
public function store(Request $request, $courseId)
{
    $request->validate([
        'title'     => 'required|string|max:255',
        'content'   => 'required|string',
        'video_url' => 'required|string',
    ]);

    $videoUrl = $request->video_url;

    // Chuyển link youtube watch -> embed
    if (strpos($videoUrl, 'youtube.com/watch?v=') !== false) {
        parse_str(parse_url($videoUrl, PHP_URL_QUERY), $params);
        if (isset($params['v'])) {
            $videoUrl = 'https://www.youtube.com/embed/' . $params['v'];
        }
    }

    // Link dạng youtu.be
    if (strpos($videoUrl, 'youtu.be/') !== false) {
        $videoId = basename(parse_url($videoUrl, PHP_URL_PATH));
        $videoUrl = 'https://www.youtube.com/embed/' . $videoId;
    }

    Video::create([
        'course_id' => $courseId,
        'title'     => $request->title,
        'content'   => $request->content,
        'video_url' => $videoUrl,
        'is_seen'   => false,
    ]);

    return redirect()->back()->with('success', 'Thêm video thành công');
}
    public function learn($courseId)
    {
        $course = Course::with('videos')->findOrFail($courseId);
        $currentVideo = $course->videos->first();

        return view('components.courses.learn', compact('course', 'currentVideo'));
    }

    public function watch($courseId, $videoId)
    {
        $course = Course::with('videos')->findOrFail($courseId);
        $currentVideo = Video::where('course_id', $courseId)->findOrFail($videoId);

        if (!$currentVideo->is_seen) {
            $currentVideo->update([
                'is_seen' => true
            ]);
        }

        return view('components.courses.learn', compact('course', 'currentVideo'));
    }

    public function edit($id)
    {
        $video = Video::with('course')->findOrFail($id);
        return view('components.videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $request->validate([
            'title'     => 'required|string|max:255',
            'content'   => 'required|string',
            'video_url' => 'required|string',
        ]);

        $video->update([
            'title'     => $request->title,
            'content'   => $request->content,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('courses.show', $video->course_id)
            ->with('success', 'Cập nhật video thành công');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $courseId = $video->course_id;

        $video->delete();

        return redirect()->route('courses.show', $courseId)
            ->with('success', 'Xóa video thành công');
    }
}
