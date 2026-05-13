<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
                'hoc_phi' => number_format($course->price) . ' ₫',
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
        $model = config('gemini.model', 'gemini-1.5-flash');

        if (empty($apiKey)) {
            Log::error('Gemini API key chưa được cấu hình.');

            return response()->json([
                'reply' => 'Mèo AI hiện chưa được cấu hình. Bạn vui lòng thử lại sau.'
            ], 200);
        }

        try {
$response = Http::timeout(30)
    ->withHeaders([
        'Content-Type' => 'application/json',
    ])
    ->post(
        "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}",
        [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => $prompt
                        ]
                    ]
                ]
            ]
        ]
    );

            if (!$response->successful()) {
                Log::error('Gemini API Error', [
                    'status' => $response->status(),
                    'error' => $response->json(),
                    'body' => $response->body(),
                    'model' => $model,
                    'api_key_exists' => !empty($apiKey),
                ]);

                return response()->json([
                    'reply' => 'Mèo AI hiện chưa phản hồi được. Bạn vui lòng thử lại sau ít phút.'
                ], 200);
            }

            $reply = $response->json('candidates.0.content.parts.0.text')
                ?? 'Xin lỗi, tôi chưa trả lời được câu hỏi này.';

            return response()->json([
                'reply' => $reply
            ], 200);

        } catch (\Exception $e) {
            Log::error('Gemini API Exception', [
                'message' => $e->getMessage(),
                'model' => $model,
                'api_key_exists' => !empty($apiKey),
            ]);

            return response()->json([
                'reply' => 'Mèo AI hiện đang gặp sự cố kết nối. Bạn vui lòng thử lại sau.'
            ], 200);
        }
    }
}
