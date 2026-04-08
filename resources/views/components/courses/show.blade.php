<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết khóa học</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f6f6;
            margin: 0;
            padding: 30px;
        }
                a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            width: 100%;
            height: 76px;
            border-bottom: 1px solid #d8d8d8;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-inner {
            width: 1200px;
            max-width: calc(100% - 80px);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 18px;
            font-weight: 700;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .menu a {
            font-size: 16px;
            font-weight: 600;
            padding: 12px 18px;
            border-radius: 10px;
            transition: 0.2s;
        }

        .menu a.active {
            background: #eaeaea;
        }

        .menu a:hover {
            background: #eaeaea;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #8ea0aa;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
        }

        .container {
            width: 1100px;
            margin: auto;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .btn {
            display: inline-block;
            padding: 10px 16px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            border: none;
            cursor: pointer;
        }
        .btn-warning {
            background: orange;
        }
        .btn-danger {
            background: red;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .video-item {
            border-bottom: 1px solid #eee;
            padding: 12px 0;
        }
        .action {
            display: flex;
            gap: 8px;
            margin-top: 8px;
        }
        .success {
            color: green;
            margin-bottom: 12px;
        }
        .error {
            color: red;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="nav-inner">
            <div class="logo">TechSchool</div>

            <div class="menu">
                <a href="/home" class="{{ request()->is('home') ? 'active' : '' }}">Trang chủ</a>
                <a href="/courses" class="{{ request()->is('courses') ? 'active' : '' }}">Khóa học</a>
                <a href="/introduction" class="{{ request()->is('introduction') ? 'active' : '' }}">Giới thiệu</a>
                <a href="/clause" class="{{ request()->is('clause') ? 'active' : '' }}">Điều khoản</a>
            </div>

            <div class="nav-right">
                <div class="avatar">D</div>
                <button class="theme-btn" aria-label="theme button">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="4"></circle>
                        <path d="M12 2v2.2"></path>
                        <path d="M12 19.8V22"></path>
                        <path d="M4.93 4.93l1.56 1.56"></path>
                        <path d="M17.51 17.51l1.56 1.56"></path>
                        <path d="M2 12h2.2"></path>
                        <path d="M19.8 12H22"></path>
                        <path d="M4.93 19.07l1.56-1.56"></path>
                        <path d="M17.51 6.49l1.56-1.56"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>
<div class="container">
    <div class="card">
        <h1>{{ $course->title }}</h1>
        <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
        <p>{{ $course->content }}</p>
        <p><strong>Học phí:</strong> {{ $course->price }}</p>

        <a href="{{ route('videos.learn', $course->id) }}" class="btn">Vào học</a>

        <hr style="margin: 25px 0;">

        <h2>Danh sách video bài học</h2>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if($course->videos->count() > 0)
            @foreach($course->videos as $index => $video)
                <div class="video-item">
                    <strong>Bài {{ $index + 1 }}: {{ $video->title }}</strong>
                    <p>{{ $video->content }}</p>
                    <small>Link: {{ $video->video_url }}</small>

                    <div class="action">
                        <a href="{{ route('videos.watch', [$course->id, $video->id]) }}" class="btn">Xem</a>
                        <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-warning">Sửa</a>

                        <form action="{{ route('videos.destroy', $video->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa video này?')">Xóa</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>Chưa có video nào trong khóa học này.</p>
        @endif
    </div>

    <div class="card">
        <h2>Thêm video mới</h2>

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('videos.store', $course->id) }}" method="POST">
            @csrf

            <label>Tiêu đề video</label>
            <input type="text" name="title">

            <label>Nội dung video</label>
            <textarea name="content" rows="4"></textarea>

            <label>Link video</label>
            <input type="text" name="video_url" placeholder="https://www.youtube.com/embed/xxxx">

            <button type="submit" class="btn">Thêm video</button>
        </form>
    </div>
</div>

</body>
</html>
