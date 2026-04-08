<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Teacher</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #111;
        }

        .container {
            width: 1100px;
            max-width: calc(100% - 30px);
            margin: 30px auto;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 28px;
        }

        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .tab-btn {
            padding: 10px 16px;
            border: none;
            background: #e5e7eb;
            cursor: pointer;
            border-radius: 8px;
            font-weight: 600;
        }

        .tab-btn.active {
            background: #111;
            color: white;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 18px;
            margin-bottom: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .item {
            border-top: 1px solid #eee;
            padding: 12px 0;
        }

        .item:first-child {
            border-top: none;
        }

        .status-pending {
            color: #d97706;
            font-weight: 700;
        }

        .status-approved {
            color: #16a34a;
            font-weight: 700;
        }

        .btn {
            margin-top: 8px;
            padding: 10px 14px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background: #111;
            color: white;
            font-weight: 600;
        }

        .message {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .empty {
            color: #666;
        }

        .course-title {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .meta {
            color: #555;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <h1>Trang Teacher</h1>
            <a href="{{ route('courses.index') }}">Quay lại khóa học</a>
        </div>

        @if(session('success'))
            <div class="message">{{ session('success') }}</div>
        @endif

        <div class="tabs">
            <button class="tab-btn active" onclick="showTab('tab1', this)">Yêu cầu xin vào học</button>
            <button class="tab-btn" onclick="showTab('tab2', this)">Khóa học của tôi</button>
        </div>

        <div id="tab1" class="tab-content active">
            @if($requests->count() > 0)
                @foreach($requests as $request)
                    <div class="card">
                        <h3>{{ $request->course->title }}</h3>
                        <div class="meta"><strong>Học viên:</strong> {{ $request->user->name }}</div>
                        <div class="meta"><strong>Email:</strong> {{ $request->user->email }}</div>
                        <div class="meta">
                            <strong>Trạng thái:</strong>
                            @if($request->approved)
                                <span class="status-approved">Đã duyệt</span>
                            @else
                                <span class="status-pending">Chưa duyệt</span>
                            @endif
                        </div>

                        @if(!$request->approved)
                            <form action="{{ route('teacher.approve', $request->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn">Duyệt vào học</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="card empty">Chưa có yêu cầu xin vào học nào.</div>
            @endif
        </div>

        <div id="tab2" class="tab-content">
            @if($courses->count() > 0)
                @foreach($courses as $course)
                    <div class="card">
                        <div class="course-title">{{ $course->title }}</div>
                        <div class="meta"><strong>Nội dung:</strong> {{ $course->content }}</div>
                        <div class="meta"><strong>Giá:</strong> {{ $course->price }}</div>

                        <div style="margin-top: 12px;">
                            <strong>Danh sách người đăng ký:</strong>
                        </div>

                        @if($course->courseUsers->count() > 0)
                            @foreach($course->courseUsers as $item)
                                <div class="item">
                                    <div><strong>Tên:</strong> {{ $item->user->name }}</div>
                                    <div><strong>Email:</strong> {{ $item->user->email }}</div>
                                    <div>
                                        <strong>Trạng thái:</strong>
                                        @if($item->approved)
                                            <span class="status-approved">Đã duyệt</span>
                                        @else
                                            <span class="status-pending">Chưa duyệt</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="item empty">Chưa có ai đăng ký khóa học này.</div>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="card empty">Bạn chưa tạo khóa học nào.</div>
            @endif
        </div>
    </div>

    <script>
        function showTab(tabId, btn) {
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });

            document.querySelectorAll('.tab-btn').forEach(button => {
                button.classList.remove('active');
            });

            document.getElementById(tabId).classList.add('active');
            btn.classList.add('active');
        }
    </script>
</body>
</html>
