<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Student</title>
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

        a {
            text-decoration: none;
            color: inherit;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            background: #fff;
            border-right: 1px solid #ddd;
            padding: 30px 20px;
        }

        .profile-box {
            text-align: center;
            margin-bottom: 30px;
        }

        .avatar {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    margin: 0 auto 15px;
    overflow: hidden;
    border: 2px solid #e5e7eb;
    background: #fff;
}

.avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

        .student-name {
            font-size: 20px;
            font-weight: 700;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .menu .active-link {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            text-align: left;
            font-size: 15px;
            font-weight: 600;
            background: #111;
            color: #fff;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .topbar h1 {
            font-size: 28px;
        }

        .back-link {
            color: #2563eb;
            font-weight: 600;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .card {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(0,0,0,0.08);
        }

        .card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }

        .card-body {
            padding: 16px;
        }

        .card-body h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .card-body p {
            color: #555;
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .price {
            font-weight: 700;
            color: #111;
            margin-top: 10px;
        }

        .empty {
            background: #fff;
            padding: 30px;
            border-radius: 14px;
            text-align: center;
            color: #666;
            box-shadow: 0 4px 14px rgba(0,0,0,0.06);
        }

        @media (max-width: 1024px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #ddd;
            }

            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="profile-box">
                <div class="avatar">
                    <img src="{{ asset('images/student.png') }}" alt="avatar">
                </div>
                <div class="student-name">{{ auth()->user()->name }}</div>
            </div>

            <div class="menu">
                <div class="active-link">Khóa học của tôi</div>
            </div>
        </aside>

        <main class="content">
            <div class="topbar">
                <h1>Khóa học của tôi</h1>
                <a href="{{ route('courses.index') }}" class="back-link">Quay lại khóa học</a>
            </div>

            @if($courses->count() > 0)
                <div class="grid">
                    @foreach($courses as $item)
                        <div class="card">
    <a href="{{ route('courses.show', $item->course->id) }}">
        <img src="{{ asset($item->course->img_url) }}" alt="{{ $item->course->title }}">
    </a>

    <div class="card-body">
        <h3>
            <a href="{{ route('courses.show', $item->course->id) }}">
                {{ $item->course->title }}
            </a>
        </h3>
        <p><strong>Nội dung:</strong> {{ $item->course->content }}</p>
        <p class="price"><strong>Giá:</strong> {{ $item->course->price }}</p>
    </div>
</div>
                    @endforeach
                </div>
            @else
                <div class="empty">
                    Bạn chưa có khóa học nào đã được duyệt.
                </div>
            @endif
        </main>
    </div>
</body>
</html>
