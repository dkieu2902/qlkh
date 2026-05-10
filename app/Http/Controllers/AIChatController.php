<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIChatController extends Controller
{
     public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->message;

        $courses = Course::with('teacher')->get();
        $videos = Video::with('course')->get();

        $courseData = $courses->map(function ($course) {
            return [
                'ten_khoa_hoc' => $course->title,
                'mo_ta' => $course->content,
                'gia' => $course->price,
                'giao_vien' => $course->teacher->name ?? 'Không rõ',
            ];
        })->toArray();

        $videoData = $videos->map(function ($video) {
            return [
                'ten_video' => $video->title,
                'noi_dung' => $video->content,
                'khoa_hoc' => $video->course->title ?? 'Không rõ',
            ];
        })->toArray();

        $prompt = "
Bạn là chatbot tư vấn khóa học cho website.

Chỉ trả lời dựa trên dữ liệu khóa học bên dưới.
Nếu người dùng hỏi ngoài phạm vi khóa học, hãy trả lời lịch sự rằng bạn chỉ hỗ trợ thông tin liên quan đến khóa học.

Dữ liệu khóa học:
" . json_encode($courseData, JSON_UNESCAPED_UNICODE) . "

Dữ liệu video/bài học:
" . json_encode($videoData, JSON_UNESCAPED_UNICODE) . "

Câu hỏi của người dùng:
{$userMessage}

Hãy trả lời bằng tiếng Việt, ngắn gọn, dễ hiểu.
";

        $apiKey = config('gemini.api_key');
        $model = config('gemini.model');

        $response = Http::post(
            "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}",
            [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]
        );

        if (!$response->successful()) {
    return response()->json([
        'reply' => 'Lỗi gọi Gemini API',
        'status' => $response->status(),
        'error' => $response->json(),
        'body' => $response->body(),
        'api_key_exists' => $apiKey ? true : false,
        'model' => $model,
    ], 500);
}

        $reply = $response->json('candidates.0.content.parts.0.text')
            ?? 'Xin lỗi, tôi chưa trả lời được câu hỏi này.';

        return response()->json([
            'reply' => $reply
        ]);
    }

}
