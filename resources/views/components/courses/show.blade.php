<!DOCTYPE html>
<html lang="vi">
<head>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết khóa học - TechSchool</title>

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
            --success: #16a34a;
            --danger: #dc2626;
            --warning: #f59e0b;
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

        .hidden {
            display: none !important;
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

        .user-dropdown {
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

        .user-dropdown a,
        .user-dropdown button {
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

        .user-dropdown a:hover,
        .user-dropdown button:hover {
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

        /* LAYOUT */
        .container {
            width: 1220px;
            max-width: calc(100% - 40px);
            margin: 46px auto 80px;
            display: grid;
            grid-template-columns: minmax(0, 2fr) 380px;
            gap: 26px;
            align-items: start;
            position: relative;
            z-index: 1;
        }

        .main-card,
        .side-card {
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(226, 232, 240, 0.95);
            border-radius: 30px;
            box-shadow: var(--shadow);
            overflow: visible;
            backdrop-filter: blur(14px);
            position: relative;
        }

        .main-card {
            z-index: 50;
        }

        .side-card {
            padding: 24px;
            z-index: 2;
        }

        .course-hero {
            padding: 30px;
        }

        .course-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            background: #d9e9ff;
            color: var(--primary-dark);
            border-radius: 999px;
            font-size: 13px;
            font-weight: 900;
            margin-bottom: 16px;
        }

        .course-title {
            font-size: clamp(31px, 4vw, 48px);
            font-weight: 900;
            line-height: 1.06;
            letter-spacing: -1.4px;
            margin-bottom: 22px;
            color: #0f172a;
        }

        #id-img {
            width: 100%;
            height: 420px;
            overflow: hidden;
            border-radius: 24px;
            background: #e2e8f0;
            position: relative;
        }

        #id-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .content-section {
            padding: 0 30px 32px;
            overflow: visible;
            position: relative;
            z-index: 100;
        }

        .divider {
            height: 1px;
            background: var(--border);
            margin: 30px 0;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            font-weight: 900;
            letter-spacing: -0.5px;
            margin-bottom: 18px;
            color: #0f172a;
        }

        .section-title ion-icon {
            color: var(--primary);
            font-size: 24px;
        }

        .success,
        .error {
            padding: 13px 15px;
            border-radius: 14px;
            margin-bottom: 16px;
            font-weight: 800;
        }

        .success {
            color: #166534;
            background: #dcfce7;
            border: 1px solid #bbf7d0;
        }

        .error {
            color: #991b1b;
            background: #fee2e2;
            border: 1px solid #fecaca;
        }

        /* TABLE */
        .table-wrap {
            width: 100%;
            overflow: visible;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: #ffffff;
            position: relative;
            z-index: 200;
        }

        .video-table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            background: #ffffff;
            overflow: visible;
        }

        .video-table thead {
            background: #f8fafc;
        }

        .video-table th {
            color: #475569;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            font-weight: 900;
        }

        .video-table th,
        .video-table td {
            padding: 14px;
            border-bottom: 1px solid var(--border);
            white-space: normal;
            word-break: break-word;
            overflow-wrap: anywhere;
            vertical-align: top;
            overflow: visible;
        }

        .video-table th:nth-child(1),
        .video-table td:nth-child(1) {
            width: 60px;
            text-align: center;
        }

        .video-table th:nth-child(2),
        .video-table td:nth-child(2) {
            width: 22%;
        }

        .video-table th:nth-child(3),
        .video-table td:nth-child(3) {
            width: 30%;
        }

        .video-table th:nth-child(4),
        .video-table td:nth-child(4) {
            width: 32%;
        }

        .video-table th:nth-child(5),
        .video-table td:nth-child(5) {
            width: 90px;
            text-align: center;
            vertical-align: middle;
        }

        .video-table tbody tr {
            transition: 0.18s ease;
            position: relative;
            z-index: 1;
        }

        .video-table tbody tr:hover {
            background: #f8fafc;
        }

        .video-table tbody tr.is-open {
            z-index: 999999;
        }

        .video-table tbody tr:last-child td {
            border-bottom: none;
        }

        .text {
            display: block;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.55;
            white-space: normal;
            word-break: break-word;
            overflow-wrap: anywhere;
        }

        .edit-input {
            width: 100%;
            border: 1px solid #dbe4ef;
            outline: none;
            background: #f8fafc;
            border-radius: 10px;
            padding: 9px 10px;
            margin: 0;
            font-size: 14px;
            font-family: inherit;
        }

        textarea.edit-input {
            resize: vertical;
            min-height: 58px;
        }

        .action-menu {
            position: relative;
            display: flex;
            justify-content: center;
            z-index: 999999;
        }

        .menu-btn {
            width: 38px;
            height: 38px;
            background: #f1f5f9;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0f172a;
            font-size: 20px;
            transition: 0.2s;
            position: relative;
            z-index: 1;
        }

        .menu-btn:hover {
            background: #e2e8f0;
        }

        .action-dropdown {
            position: absolute;
            right: 0;
            bottom: calc(100% + 10px);
            top: auto;
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            z-index: 9999999;
            min-width: 160px;
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.22);
            overflow: hidden;
        }

        .action-dropdown::after {
            content: "";
            position: absolute;
            right: 17px;
            bottom: -6px;
            width: 12px;
            height: 12px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
            transform: rotate(45deg);
        }

        .action-dropdown a,
        .action-dropdown button {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 12px;
            width: 100%;
            border: none;
            background: #ffffff;
            cursor: pointer;
            font-size: 14px;
            font-weight: 700;
            font-family: inherit;
            text-align: left;
            white-space: nowrap;
            position: relative;
            z-index: 2;
        }

        .action-dropdown a:hover,
        .action-dropdown button:hover {
            background: #f8fafc;
        }

        .action-dropdown .view {
            color: #2563eb;
        }

        .action-dropdown .edit {
            color: #d97706;
        }

        .action-dropdown .delete {
            color: #dc2626;
        }

        .save-cancel-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .icon-action-wrap {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-action-btn {
            width: 38px;
            height: 38px;
            border: none;
            border-radius: 12px;
            background: #f1f5f9;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s;
        }

        .icon-action-btn ion-icon {
            font-size: 23px;
        }

        .icon-action-btn.save {
            color: var(--success);
        }

        .icon-action-btn.cancel {
            color: var(--danger);
        }

        .icon-action-btn:hover {
            background: #e2e8f0;
            transform: translateY(-1px);
        }

        .action-tooltip {
            position: absolute;
            top: 115%;
            left: 50%;
            transform: translateX(-50%);
            background: #111827;
            color: #ffffff;
            font-size: 12px;
            padding: 6px 9px;
            border-radius: 8px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            z-index: 9999999;
            box-shadow: 0 6px 16px rgba(0,0,0,0.18);
        }

        .icon-action-wrap:hover .action-tooltip {
            opacity: 1;
            visibility: visible;
        }

        .empty-box {
            padding: 26px;
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 18px;
            color: #64748b;
            font-weight: 700;
            text-align: center;
        }

        /* USER INTRO */
        #gioi-thieu {
            display: grid;
            gap: 16px;
        }

        #gioi-thieu p {
            line-height: 1.85;
            color: #334155;
            font-size: 15px;
            font-weight: 500;
        }

        #gioi-thieu h3 {
            margin-top: 10px;
            color: var(--primary-dark);
            font-size: 18px;
            font-weight: 900;
        }

        /* SIDEBAR */
        .sidebar {
            position: sticky;
            top: 98px;
            display: grid;
            gap: 20px;
            z-index: 1;
        }

        .teacher-box {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 18px;
        }

        .teacher-avatar {
            width: 54px;
            height: 54px;
            border-radius: 18px;
            background: linear-gradient(135deg, #0875ff, #6d5dfc);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 900;
            box-shadow: 0 12px 24px rgba(8, 117, 255, 0.22);
        }

        .teacher-info span {
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
        }

        .teacher-info strong {
            display: block;
            color: #0f172a;
            font-size: 16px;
            font-weight: 900;
            margin-top: 3px;
        }

        .price-card {
            padding: 16px;
            border-radius: 18px;
            background: #f8fafc;
            border: 1px solid #edf2f7;
            margin-bottom: 18px;
        }

        .price-card span {
            display: block;
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .price-card strong {
            color: #0f172a;
            font-size: 26px;
            font-weight: 900;
            letter-spacing: -0.8px;
        }

        .feature-list {
            display: grid;
            gap: 12px;
            margin: 18px 0;
        }

        .card-1 {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .card-1 ion-icon {
            color: var(--success);
            font-size: 20px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .card-1 p {
            color: #334155;
            font-size: 14px;
            font-weight: 700;
            line-height: 1.45;
        }

        .btn {
            width: 100%;
            min-height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            margin-top: 18px;
            padding: 12px 16px;
            background: linear-gradient(135deg, #0875ff, #075ccf);
            color: #ffffff;
            border-radius: 15px;
            border: none;
            cursor: pointer;
            font-weight: 900;
            font-size: 15px;
            transition: 0.22s ease;
            box-shadow: 0 14px 30px rgba(8, 117, 255, 0.24);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 38px rgba(8, 117, 255, 0.30);
        }

        .btn-disabled {
            background: #94a3b8;
            color: #e2e8f0;
            cursor: not-allowed;
            opacity: 0.8;
            pointer-events: none;
            box-shadow: none;
        }

        label {
            display: block;
            font-weight: 900;
            font-size: 14px;
            color: #0f172a;
            margin-bottom: 7px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 13px;
            margin-bottom: 14px;
            border: 1px solid #dbe4ef;
            border-radius: 14px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            background: #f8fafc;
            transition: 0.18s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #0875ff;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(8, 117, 255, 0.12);
        }

        textarea {
            resize: vertical;
        }

        @media (max-width: 1000px) {
            .container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }
        }

        @media (max-width: 900px) {
            .menu {
                display: none;
            }

            .nav-inner {
                max-width: calc(100% - 40px);
            }

            .container {
                max-width: calc(100% - 28px);
                margin-top: 28px;
            }

            #id-img {
                height: 280px;
            }
        }

        @media (max-width: 640px) {
            .video-table th,
            .video-table td {
                padding: 10px;
                font-size: 12px;
            }

            .video-table th:nth-child(1),
            .video-table td:nth-child(1) {
                width: 44px;
            }

            .video-table th:nth-child(5),
            .video-table td:nth-child(5) {
                width: 66px;
            }

            .action-dropdown {
                right: -8px;
                min-width: 145px;
            }
        }

        @media (max-width: 560px) {
            .navbar {
                height: 68px;
            }

            .logo {
                font-size: 26px;
            }

            .dark-mode {
                display: none;
            }

            .course-hero,
            .content-section,
            .side-card {
                padding: 20px;
            }

            .main-card,
            .side-card {
                border-radius: 22px;
            }

            #id-img {
                height: 230px;
                border-radius: 18px;
            }

            .course-title {
                font-size: 28px;
            }
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
                    <div class="avatar" onclick="toggleUserMenu(event)">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div id="dropdownMenu" class="user-dropdown">
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

    @php
        $isApproved = auth()->check() && \Illuminate\Support\Facades\DB::table('course_user')
            ->where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->where('status', 'approved')
            ->exists();
    @endphp

    <main class="container">
        <section class="main-card">
            <div class="course-hero">
                <div class="course-badge">
                    <ion-icon name="school-outline"></ion-icon>
                    Chi tiết khóa học
                </div>

                <h1 class="course-title">{{ $course->title }}</h1>

                <div id="id-img">
                    <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
                </div>
            </div>

            <div class="content-section">
                <div class="divider"></div>

                @if(auth()->check() && auth()->user()->role === 'admin')
                    <h2 class="section-title">
                        <ion-icon name="videocam-outline"></ion-icon>
                        Danh sách video bài học
                    </h2>

                    @if(session('success'))
                        <div class="success">{{ session('success') }}</div>
                    @endif

                    @if($course->videos->count() > 0)
                        <div class="table-wrap">
                            <table class="video-table">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th>Đường dẫn</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($course->videos as $index => $video)
                                    <tr id="row-{{ $video->id }}">
                                        <td>{{ $index + 1 }}</td>

                                        <td>
                                            <span class="text" id="title-text-{{ $video->id }}">{{ $video->title }}</span>
                                            <input class="edit-input hidden" id="title-input-{{ $video->id }}" value="{{ $video->title }}">
                                        </td>

                                        <td>
                                            <span class="text" id="content-text-{{ $video->id }}">{{ $video->content }}</span>
                                            <textarea class="edit-input hidden" id="content-input-{{ $video->id }}">{{ $video->content }}</textarea>
                                        </td>

                                        <td>
                                            <span class="text" id="url-text-{{ $video->id }}">{{ $video->video_url }}</span>
                                            <input class="edit-input hidden" id="url-input-{{ $video->id }}" value="{{ $video->video_url }}">
                                        </td>

                                        <td>
                                            <div class="action-menu" id="action-{{ $video->id }}">
                                                <button onclick="toggleVideoMenu({{ $video->id }}, event)" class="menu-btn" id="btn-{{ $video->id }}">
                                                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                                </button>

                                                <div class="action-dropdown hidden" id="menu-{{ $video->id }}">
                                                    <a href="{{ route('videos.watch', [$course->id, $video->id]) }}" class="view">
                                                        <ion-icon name="eye-outline"></ion-icon> Xem
                                                    </a>

                                                    <button onclick="editVideo({{ $video->id }})" class="edit">
                                                        <ion-icon name="construct-outline"></ion-icon> Sửa
                                                    </button>

                                                    <form action="{{ route('videos.destroy', $video->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="delete">
                                                            <ion-icon name="trash-outline"></ion-icon> Xóa
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-box">
                            Chưa có video nào trong khóa học này.
                        </div>
                    @endif
                @endif

                @if(auth()->check() && auth()->user()->role === 'user')
                    <h2 class="section-title">
                        <ion-icon name="document-text-outline"></ion-icon>
                        Giới thiệu khóa học
                    </h2>

                    <div id="gioi-thieu">
                        <p>
                            Khóa học cung cấp kiến thức nền tảng và kỹ năng thực tế trong lĩnh vực IT, giúp học viên xây dựng tư duy công nghệ bài bản.
                        </p>
                        <p>
                            Học viên được làm quen với quy trình làm việc, công cụ chuyên ngành và phương pháp giải quyết vấn đề trong thực tế.
                        </p>
                        <p>
                           Nội dung học kết hợp giữa lý thuyết và thực hành dự án, giúp nâng cao kỹ năng và khả năng ứng dụng sau khóa học.
                        </p>
                        <p>
                           Khóa học phù hợp cho người mới bắt đầu, sinh viên hoặc người muốn nâng cao kiến thức để phát triển trong ngành công nghệ thông tin.
                        </p>

                        <h3>Phương thức học:</h3>
                        <p>
                            Học trực tuyến yêu cầu học viên phải kết nối và xem live stream bài giảng, trao đổi trực tiếp với giảng viên. Sau khi học live stream, các học viên có video để xem lại bất kỳ lúc nào. Học viên phải làm bài tập được giao một cách đầy đủ.
                        </p>

                        <h3>Thời gian học:</h3>
                        <p>
                            Mỗi tuần 3 buổi vào các tối thứ 2, thứ 4 và thứ 6, mỗi buổi khoảng 2 tiếng.
                        </p>
                        <p>
                            Với lượng kiến thức cần truyền tải là rất lớn, tổng thời gian khóa học dự kiến là 11 tháng, thời gian này có thể bị kéo dài ra nếu học viên vẫn chưa tiếp thu đủ kiến thức.
                        </p>
                    </div>
                @endif
            </div>
        </section>

        <aside class="sidebar">
            <div class="side-card">
                <div class="teacher-box">
                    <div class="teacher-avatar">M</div>

                    <div class="teacher-info">
                        <span>Giáo viên</span>
                        <strong>Lã Dương Kiêu</strong>
                    </div>
                </div>

                <div class="price-card">
                    <span>Học phí</span>
                    <strong>{{ number_format($course->price, 0, ',', '.') }}đ</strong>
                </div>

                <div class="feature-list">
                    <div class="card-1">
                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                        <p>Đăng ký một lần, học trọn đời</p>
                    </div>

                    <div class="card-1">
                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                        <p>Nộp và xem đánh giá bài tập của giáo viên</p>
                    </div>

                    <div class="card-1">
                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                        <p>Truy cập bài viết dành cho học viên</p>
                    </div>

                    <div class="card-1">
                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                        <p>Nhận hỏi đáp và hỗ trợ</p>
                    </div>
                </div>

                @if(auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('videos.learn', $course->id) }}" class="btn">
                        <ion-icon name="play-circle-outline"></ion-icon>
                        Vào học
                    </a>
                @elseif(auth()->check() && auth()->user()->role === 'user')
                    @if($isApproved)
                        <a href="{{ route('videos.learn', $course->id) }}" class="btn">
                            <ion-icon name="play-circle-outline"></ion-icon>
                            Vào học
                        </a>
                    @else
                        <span class="btn btn-disabled">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            Vào học
                        </span>
                    @endif
                @endif
            </div>

            @if(auth()->check() && auth()->user()->role === 'admin')
                <div class="side-card">
                    <h2 class="section-title">
                        <ion-icon name="add-circle-outline"></ion-icon>
                        Thêm video mới
                    </h2>

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
                        <input type="text" name="title" placeholder="Nhập tiêu đề video">

                        <label>Nội dung video</label>
                        <textarea name="content" rows="4" placeholder="Nhập mô tả nội dung video"></textarea>

                        <label>Link video</label>
                        <input type="text" name="video_url" placeholder="https://www.youtube.com/embed/xxxx">

                        <button type="submit" class="btn">
                            <ion-icon name="cloud-upload-outline"></ion-icon>
                            Thêm video
                        </button>
                    </form>
                </div>
            @endif
        </aside>
    </main>

</div>

<script>
    function toggleUserMenu(e) {
        e.stopPropagation();

        const menu = document.getElementById('dropdownMenu');

        if (menu) {
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }
    }

    function toggleVideoMenu(id, e) {
        e.stopPropagation();

        document.querySelectorAll('.action-dropdown').forEach(menu => {
            if (menu.id !== 'menu-' + id) {
                menu.classList.add('hidden');
            }
        });

        document.querySelectorAll('.video-table tbody tr').forEach(row => {
            row.classList.remove('is-open');
        });

        const currentMenu = document.getElementById('menu-' + id);
        const currentRow = document.getElementById('row-' + id);

        if (!currentMenu || !currentRow) return;

        currentMenu.classList.toggle('hidden');

        if (!currentMenu.classList.contains('hidden')) {
            currentRow.classList.add('is-open');
        }
    }

    function editVideo(id) {
        document.getElementById('title-text-' + id).classList.add('hidden');
        document.getElementById('content-text-' + id).classList.add('hidden');
        document.getElementById('url-text-' + id).classList.add('hidden');

        document.getElementById('title-input-' + id).classList.remove('hidden');
        document.getElementById('content-input-' + id).classList.remove('hidden');
        document.getElementById('url-input-' + id).classList.remove('hidden');

        document.getElementById('action-' + id).innerHTML = `
            <div class="save-cancel-actions">
                <div class="icon-action-wrap">
                    <button onclick="saveVideo(${id})" class="icon-action-btn save">
                        <ion-icon name="save-outline"></ion-icon>
                    </button>
                    <div class="action-tooltip">Lưu</div>
                </div>

                <div class="icon-action-wrap">
                    <button onclick="cancelEdit(${id})" class="icon-action-btn cancel">
                        <ion-icon name="close-circle-outline"></ion-icon>
                    </button>
                    <div class="action-tooltip">Hủy</div>
                </div>
            </div>
        `;
    }

    function cancelEdit(id) {
        location.reload();
    }

    let isSaving = false;

    function saveVideo(id) {
        if (isSaving) return;
        isSaving = true;

        fetch(`/videos/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                _method: 'PUT',
                title: document.getElementById('title-input-' + id).value,
                content: document.getElementById('content-input-' + id).value,
                video_url: document.getElementById('url-input-' + id).value
            })
        })
        .then(res => {
            console.log("STATUS:", res.status);
            location.reload();
        })
        .catch(err => {
            console.error(err);
            isSaving = false;
        });
    }

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.user-menu')) {
            const dropdownMenu = document.getElementById('dropdownMenu');

            if (dropdownMenu) {
                dropdownMenu.style.display = 'none';
            }
        }

        if (!e.target.closest('.action-menu')) {
            document.querySelectorAll('.action-dropdown').forEach(menu => {
                menu.classList.add('hidden');
            });

            document.querySelectorAll('.video-table tbody tr').forEach(row => {
                row.classList.remove('is-open');
            });
        }
    });
</script>

@include('components.ai-chat')
</body>
</html>
