<!DOCTYPE html>
<html lang="vi">
<head>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Học khóa học - TechSchool</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #0875ff;
            --primary-dark: #075ccf;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --bg: #eef3f8;
            --card: #ffffff;
            --shadow: 0 18px 45px rgba(31, 65, 114, 0.14);
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
        }

        .page-bg {
            min-height: 100vh;
            background:
                linear-gradient(
                    to bottom,
                    rgba(245, 249, 255, 0.68) 0%,
                    rgba(245, 249, 255, 0.78) 42%,
                    #eef3f8 42%,
                    #eef3f8 100%
                ),
                url("/images/nen2.jpg") center top / 100% 42% no-repeat;
        }

        /* HEADER GIỐNG TRANG HOME */
        .navbar {
            width: 100%;
            height: 74px;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: center;
            position: sticky;
            top: 0;
            z-index: 999999;
        }

        .nav-inner {
            width: 1180px;
            max-width: calc(100% - 80px);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 34px;
            font-weight: 800;
            color: #075ccf;
            letter-spacing: -1px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .menu a {
            font-size: 15px;
            font-weight: 700;
            padding: 12px 20px;
            border-radius: 10px;
            transition: 0.2s ease;
        }

        .menu a.active,
        .menu a:hover {
            background: #d9e9ff;
            color: #075ccf;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-menu {
            position: relative;
        }

        .avatar {
            width: 38px;
            height: 38px;
            background: #0875ff;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: 800;
            box-shadow: 0 8px 18px rgba(8, 117, 255, 0.28);
        }

        .dropdown {
            position: absolute;
            right: 0;
            top: 50px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 180px;
            display: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
            z-index: 9999999;
            overflow: hidden;
        }

        .dropdown a,
        .dropdown button {
            display: block;
            width: 100%;
            padding: 12px;
            text-align: left;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            color: #111827;
        }

        .dropdown a:hover,
        .dropdown button:hover {
            background: #f2f6ff;
        }

        .dark-mode {
            background: #06122b;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .dark-mode ion-icon {
            color: #fff;
            font-size: 18px;
        }

        /* MAIN LAYOUT */
        .learn-page {
            width: 1220px;
            max-width: calc(100% - 40px);
            margin: 0 auto;
            padding: 46px 0 70px;
            display: grid;
            grid-template-columns: 350px minmax(0, 1fr);
            gap: 26px;
            align-items: start;
        }

        .panel {
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(226, 232, 240, 0.95);
            border-radius: 30px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(14px);
        }

        .sidebar {
            padding: 20px;
            height: fit-content;
            position: sticky;
            top: 98px;
            overflow: visible;
        }

        .course-image-wrap {
            position: relative;
            overflow: hidden;
            border-radius: 24px;
            margin-bottom: 18px;
            background: #e5e7eb;
        }

        .course-image {
            width: 100%;
            height: 196px;
            object-fit: cover;
            display: block;
            transition: 0.35s ease;
        }

        .course-image-wrap:hover .course-image {
            transform: scale(1.05);
        }

        .course-badge {
            position: absolute;
            left: 14px;
            bottom: 14px;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.94);
            color: #075ccf;
            font-size: 12px;
            font-weight: 900;
            backdrop-filter: blur(10px);
        }

        .course-title {
            font-size: 23px;
            font-weight: 900;
            line-height: 1.25;
            letter-spacing: -0.5px;
            margin-bottom: 16px;
            color: #0f172a;
        }

        .course-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
            color: var(--muted);
            font-weight: 700;
            font-size: 14px;
        }

        .course-meta ion-icon {
            color: #0875ff;
            font-size: 18px;
        }

        .lesson-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 12px;
        }

        .lesson-heading span:first-child {
            font-size: 14px;
            font-weight: 900;
            color: #0f172a;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .lesson-count {
            font-size: 12px;
            font-weight: 900;
            color: #075ccf;
            background: #d9e9ff;
            padding: 6px 10px;
            border-radius: 999px;
        }

        .video-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-height: calc(100vh - 380px);
            overflow-y: auto;
            overflow-x: hidden;
            padding-right: 4px;
        }

        .video-list::-webkit-scrollbar {
            width: 6px;
        }

        .video-list::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
        }

        .video-list a {
            display: grid;
            grid-template-columns: 38px minmax(0, 1fr);
            gap: 11px;
            align-items: center;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            color: #0f172a;
            background: #ffffff;
            font-size: 14px;
            font-weight: 800;
            transition: 0.22s ease;
            line-height: 1.4;
            min-width: 0;
        }

        .video-list a:hover {
            border-color: #93c5fd;
            background: #f8fbff;
            transform: translateY(-1px);
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.08);
        }

        .video-list a.lesson-active {
            background: linear-gradient(135deg, #0875ff, #075ccf);
            border-color: transparent;
            color: #ffffff;
            box-shadow: 0 14px 28px rgba(8, 117, 255, 0.28);
        }

        .lesson-number {
            width: 38px;
            height: 38px;
            border-radius: 14px;
            background: #d9e9ff;
            color: #075ccf;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 13px;
        }

        .lesson-active .lesson-number {
            background: rgba(255, 255, 255, 0.18);
            color: #ffffff;
        }

        .lesson-info {
            min-width: 0;
        }

        .lesson-title {
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .lesson-sub {
            display: block;
            margin-top: 3px;
            font-size: 12px;
            font-weight: 700;
            color: #94a3b8;
        }

        .lesson-active .lesson-sub {
            color: rgba(255, 255, 255, 0.78);
        }

        .content {
            padding: 26px;
            overflow: hidden;
        }

        .hero {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 22px;
        }

        .page-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 13px;
            background: #d9e9ff;
            color: #075ccf;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 900;
            margin-bottom: 12px;
        }

        .page-title {
            font-size: 34px;
            font-weight: 900;
            letter-spacing: -1.2px;
            line-height: 1.15;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 15px;
            font-weight: 600;
            line-height: 1.6;
            max-width: 620px;
        }

        .price-card {
            min-width: 170px;
            padding: 14px 16px;
            border-radius: 20px;
            background: #06122b;
            color: #ffffff;
            text-align: right;
            box-shadow: 0 16px 32px rgba(15, 23, 42, 0.18);
        }

        .price-card span {
            display: block;
            font-size: 12px;
            font-weight: 800;
            color: #cbd5e1;
            margin-bottom: 5px;
        }

        .price-card strong {
            font-size: 20px;
            font-weight: 900;
        }

        .overview-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 24px;
        }

        .overview-card {
            border: 1px solid #e2e8f0;
            border-radius: 22px;
            padding: 17px;
            background: linear-gradient(180deg, #ffffff, #f8fafc);
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .overview-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            background: #d9e9ff;
            color: #075ccf;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
        }

        .overview-icon ion-icon {
            font-size: 24px;
        }

        .overview-card h3 {
            font-size: 13px;
            color: #64748b;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .overview-card p {
            font-size: 24px;
            font-weight: 900;
            color: #0f172a;
        }

        .video-section {
            border-radius: 26px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            box-shadow: 0 20px 44px rgba(15, 23, 42, 0.08);
        }

        .video-head {
            padding: 20px 20px 18px;
            border-bottom: 1px solid #e2e8f0;
        }

        .video-title {
            font-size: 24px;
            font-weight: 900;
            letter-spacing: -0.5px;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .video-desc {
            font-size: 15px;
            line-height: 1.7;
            color: #475569;
            font-weight: 600;
        }

        .video-frame-wrap {
            background: #020617;
            padding: 14px;
        }

        .video-frame {
            width: 100%;
            height: 510px;
            border: none;
            border-radius: 18px;
            overflow: hidden;
            display: block;
            background: #020617;
        }

        .empty-box {
            padding: 44px 28px;
            border-radius: 24px;
            background: #ffffff;
            border: 1px dashed #94a3b8;
            color: #475569;
            font-weight: 800;
            text-align: center;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
        }

        .empty-box ion-icon {
            display: block;
            margin: 0 auto 12px;
            font-size: 42px;
            color: #0875ff;
        }

        @media (max-width: 1050px) {
            .menu {
                display: none;
            }

            .learn-page {
                grid-template-columns: 1fr;
                max-width: calc(100% - 28px);
                padding-top: 28px;
            }

            .sidebar {
                position: static;
            }

            .video-list {
                max-height: none;
            }

            .video-frame {
                height: 390px;
            }
        }

        @media (max-width: 680px) {
            .nav-inner {
                max-width: calc(100% - 24px);
            }

            .navbar {
                height: 68px;
            }

            .logo {
                font-size: 26px;
            }

            .dark-mode {
                display: none;
            }

            .learn-page {
                max-width: calc(100% - 20px);
                padding-top: 24px;
            }

            .content,
            .sidebar {
                padding: 16px;
                border-radius: 22px;
            }

            .hero {
                flex-direction: column;
            }

            .price-card {
                width: 100%;
                text-align: left;
            }

            .overview-grid {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 27px;
            }

            .video-title {
                font-size: 21px;
            }

            .video-frame {
                height: 240px;
                border-radius: 14px;
            }
        }
        .progress-box {
    margin-bottom: 18px;
    padding: 14px;
    border-radius: 18px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
}

.progress-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 13px;
    font-weight: 900;
    color: #0f172a;
}

.progress-top strong {
    color: #075ccf;
}

.progress-track {
    width: 100%;
    height: 12px;
    background: #ffffff;
    border-radius: 999px;
    overflow: hidden;
    border: 1px solid #dbeafe;
}

.progress-fill {
    height: 100%;
    background: #0875ff;
    border-radius: 999px;
    transition: width 0.3s ease;
}

.lesson-number.lesson-done {
    background: #0875ff;
    color: #ffffff;
}

.lesson-number.lesson-done ion-icon {
    font-size: 20px;
    font-weight: 900;
}

.lesson-active .lesson-number.lesson-done {
    background: rgba(255, 255, 255, 0.22);
    color: #ffffff;
}
    </style>
</head>

<body>
<div class="page-bg">

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
                <div class="user-menu">
                    <div class="avatar" onclick="toggleMenu()">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div id="dropdownMenu" class="dropdown">
                        <a href="
                            @if(auth()->user()->role === 'user')
                                {{ route('student.dashboard') }}
                            @elseif(auth()->user()->role === 'admin')
                                {{ route('teacher.dashboard') }}
                            @else
                                #
                            @endif
                        ">
                            Thông tin cá nhân
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Đăng xuất</button>
                        </form>
                    </div>
                </div>

                <div class="dark-mode">
                    <ion-icon name="moon-outline"></ion-icon>
                </div>
            </div>
        </div>
    </header>

    <main class="learn-page">
        <aside class="sidebar panel">
            <div class="course-image-wrap">
                <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}" class="course-image">
                <div class="course-badge">Khóa học online</div>
            </div>

            <h2 class="course-title">{{ $course->title }}</h2>

            <div class="course-meta">
                <ion-icon name="play-circle-outline"></ion-icon>
                <span>{{ $course->videos->count() }} bài học</span>
            </div>
            <div class="progress-box">
    <div class="progress-top">
        <span>Tiến độ học</span>
        <strong>{{ $completedVideos ?? 0 }}/{{ $totalVideos ?? $course->videos->count() }}</strong>
    </div>

    <div class="progress-track">
        <div class="progress-fill" style="width: {{ $progressPercent ?? 0 }}%;"></div>
    </div>
</div>
            <div class="lesson-heading">
                <span>Danh sách bài học</span>
                <span class="lesson-count">{{ $course->videos->count() }}</span>
            </div>

            <div class="video-list">
                @foreach($course->videos as $index => $video)
                    <a href="{{ route('videos.watch', [$course->id, $video->id]) }}"
                       class="{{ $currentVideo && $currentVideo->id == $video->id ? 'lesson-active' : '' }}">
                        <span class="lesson-number {{ in_array($video->id, $completedVideoIds ?? []) ? 'lesson-done' : '' }}">
    @if(in_array($video->id, $completedVideoIds ?? []))
        <ion-icon name="checkmark-outline"></ion-icon>
    @else
        {{ $index + 1 }}
    @endif
</span>

                        <span class="lesson-info">
                            <span class="lesson-title">{{ $video->title }}</span>
                            <span class="lesson-sub">Bài học {{ $index + 1 }}</span>
                        </span>
                    </a>
                @endforeach
            </div>
        </aside>

        <section class="content panel">
            <div class="hero">
                <div>
                    <div class="page-kicker">
                        <ion-icon name="school-outline"></ion-icon>
                        Không gian học tập
                    </div>

                    <h1 class="page-title">Học khóa học</h1>

                    <p class="page-subtitle">
                        Theo dõi nội dung bài học, xem video và chuyển nhanh giữa các bài trong khóa học.
                    </p>
                </div>

                <div class="price-card">
                    <span>Học phí</span>
                    <strong>{{ number_format($course->price, 0, ',', '.') }}đ</strong>
                </div>
            </div>

            <div class="overview-grid">
                <div class="overview-card">
                    <div class="overview-icon">
                        <ion-icon name="albums-outline"></ion-icon>
                    </div>

                    <div>
                        <h3>Tổng số bài học</h3>
                        <p>{{ $course->videos->count() }}</p>
                    </div>
                </div>

                <div class="overview-card">
                    <div class="overview-icon">
                        <ion-icon name="school-outline"></ion-icon>
                    </div>

                    <div>
                        <h3>Trạng thái khóa học</h3>
                        <p>Đang học</p>
                    </div>
                </div>
            </div>

            @if($currentVideo)
                <div class="video-section">
                    <div class="video-head">
                        <h2 class="video-title">{{ $currentVideo->title }}</h2>

                        <div class="video-desc">
                            {{ $currentVideo->content }}
                        </div>
                    </div>

                    <div class="video-frame-wrap">
                        <iframe
                            class="video-frame"
                            src="{{ $currentVideo->video_url }}"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            @else
                <div class="empty-box">
                    <ion-icon name="videocam-outline"></ion-icon>
                    Khóa học chưa có video nào.
                </div>
            @endif
        </section>
    </main>

</div>

<script>
    function toggleMenu() {
        const menu = document.getElementById('dropdownMenu');

        if (menu) {
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }
    }

    window.onclick = function(e) {
        if (!e.target.closest('.user-menu')) {
            const dropdown = document.getElementById('dropdownMenu');

            if (dropdown) {
                dropdown.style.display = 'none';
            }
        }
    }
</script>

@include('components.ai-chat')
</body>
</html>
