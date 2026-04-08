<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Học khóa học</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
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


        .wrapper {
            width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 20px;
        }
        .sidebar, .content {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 20px;
        }
        .course-image {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .video-list a {
            display: block;
            padding: 10px;
            margin-bottom: 8px;
            text-decoration: none;
            color: #222;
            border: 1px solid #eee;
            border-radius: 8px;
        }
        .video-list a:hover {
            background: #f3f4f6;
        }
        .active {
            background: #e0f2fe !important;
            border-color: #38bdf8 !important;
        }
        iframe {
            width: 100%;
            height: 500px;
            border-radius: 10px;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        .stat-box {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 15px;
        }
        .stat-box h3 {
            margin: 0;
            font-size: 16px;
            color: #666;
        }
        .stat-box p {
            margin: 10px 0 0;
            font-size: 28px;
            font-weight: bold;
        }
        .seen {
            color: green;
            font-weight: bold;
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
<div class="wrapper">
    <div class="sidebar">
        <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}" class="course-image">
        <h2>{{ $course->title }}</h2>

        <div class="video-list">
            @foreach($course->videos as $index => $video)
                <a href="{{ route('videos.watch', [$course->id, $video->id]) }}"
                   class="{{ $currentVideo && $currentVideo->id == $video->id ? 'active' : '' }}">
                    Bài {{ $index + 1 }}: {{ $video->title }}
                    @if($video->is_seen)
                        <span class="seen">✓</span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>

    <div class="content">
        <h1>Tổng quan khóa học</h1>

        <div class="stats">
            <div class="stat-box">
                <h3>Tổng số bài học</h3>
                <p>{{ $course->videos->count() }}</p>
            </div>
            <div class="stat-box">
                <h3>Số bài đã học</h3>
                <p>{{ $course->videos->where('is_seen', true)->count() }}</p>
            </div>
            <div class="stat-box">
                <h3>Số bài chưa học</h3>
                <p>{{ $course->videos->where('is_seen', false)->count() }}</p>
            </div>
            <div class="stat-box">
                <h3>Học phí</h3>
                <p style="font-size:20px;">{{ $course->price }}</p>
            </div>
        </div>

        @if($currentVideo)
            <h2>{{ $currentVideo->title }}</h2>
            <p>{{ $currentVideo->content }}</p>
            <iframe
                src="{{ $currentVideo->video_url }}"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        @else
            <p>Khóa học chưa có video nào.</p>
        @endif
    </div>
</div>

</body>
</html>
