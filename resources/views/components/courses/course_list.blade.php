<!DOCTYPE html>
<html lang="vi">
<head>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khóa học</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #0875ff;
            --primary-dark: #075fe4;
            --success: #16a34a;
            --danger: #dc2626;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --card: #ffffff;
            --bg: #f5f8fc;
            --shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(8, 117, 255, 0.10), transparent 34%),
                linear-gradient(180deg, #f8fbff 0%, #eef3f8 100%);
            color: var(--text);
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        /* GIỮ HEADER */
        .navbar {
            width: 100%;
            height: 76px;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid #d9dee8;
            display: flex;
            align-items: center;
            justify-content: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-inner {
            width: 1180px;
            max-width: calc(100% - 40px);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 24px;
            font-weight: 900;
            letter-spacing: -0.8px;
            color: #111827;
        }

        .logo span {
            color: #075fe4;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .menu a {
            font-size: 15px;
            font-weight: 700;
            padding: 12px 18px;
            border-radius: 999px;
            transition: 0.22s ease;
            color: #334155;
        }

        .menu a.active,
        .menu a:hover {
            background: #0875ff;
            color: #fff;
            box-shadow: 0 10px 22px rgba(8, 117, 255, 0.22);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-menu {
            position: relative;
            display: inline-block;
        }

        .avatar {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, #0875ff, #6d5dfc);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: 900;
            font-size: 18px;
            box-shadow: 0 10px 22px rgba(8, 117, 255, 0.25);
        }

        .dropdown {
            position: absolute;
            right: 0;
            top: 54px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            width: 190px;
            display: none;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.14);
            z-index: 200;
            overflow: hidden;
        }

        .dropdown a,
        .dropdown button {
            display: block;
            width: 100%;
            padding: 13px 14px;
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
            background: #f3f6fb;
        }

        .dark-mode {
            background: #111827;
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.18);
        }

        .dark-mode ion-icon {
            color: #fff;
            font-size: 20px;
        }

        /* CONTENT */
        .container {
            width: 1180px;
            max-width: calc(100% - 40px);
            margin: 44px auto 80px;
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 24px;
            margin-bottom: 28px;
            padding: 28px;
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 28px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(16px);
        }

        .hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            background: rgba(8, 117, 255, 0.08);
            color: var(--primary-dark);
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .hero h1 {
            font-size: clamp(30px, 4vw, 48px);
            font-weight: 900;
            letter-spacing: -1.5px;
            line-height: 1.05;
            margin-bottom: 12px;
        }

        .hero p {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.7;
            max-width: 620px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #0875ff, #075fe4);
            color: #fff;
            padding: 14px 18px;
            border-radius: 14px;
            font-weight: 800;
            border: none;
            box-shadow: 0 14px 28px rgba(8, 117, 255, 0.24);
            transition: 0.22s ease;
            white-space: nowrap;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 36px rgba(8, 117, 255, 0.30);
        }

        .message {
            background: #dcfce7;
            color: #166534;
            padding: 15px 18px;
            border-radius: 16px;
            margin-bottom: 22px;
            font-weight: 700;
            border: 1px solid #bbf7d0;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 22px;
        }

        .card {
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(226, 232, 240, 0.95);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.07);
            transition: 0.25s ease;
            position: relative;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 50px rgba(15, 23, 42, 0.13);
            border-color: rgba(8, 117, 255, 0.28);
        }

        .thumb {
            display: block;
            position: relative;
            height: 170px;
            overflow: hidden;
            background: #e2e8f0;
        }

        .thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: 0.35s ease;
        }

        .card:hover .thumb img {
            transform: scale(1.06);
        }

        .thumb::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 45%, rgba(15, 23, 42, 0.42));
        }

        .course-badge {
            position: absolute;
            left: 14px;
            bottom: 14px;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.94);
            color: #075fe4;
            padding: 7px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 900;
        }

        .card-body {
            padding: 18px;
        }

        .card-body h3 {
            font-size: 18px;
            font-weight: 900;
            line-height: 1.35;
            letter-spacing: -0.45px;
            margin-bottom: 10px;
        }

        .card-body h3 a:hover {
            color: var(--primary);
        }

        .desc {
            color: #475569;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 14px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .price-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px;
            background: #f8fafc;
            border: 1px solid #edf2f7;
            border-radius: 16px;
            margin-bottom: 14px;
        }

        .price-label {
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
        }

        .price-value {
            color: #0f172a;
            font-size: 15px;
            font-weight: 900;
            text-align: right;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-edit,
        .btn-delete {
            min-height: 40px;
            padding: 10px 13px;
            border-radius: 13px;
            font-weight: 800;
            font-size: 13px;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            transition: 0.2s ease;
        }

        .btn-edit {
            background: #0875ff;
            color: #fff;
            box-shadow: 0 10px 20px rgba(8, 117, 255, 0.18);
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            background: #075fe4;
        }

        .btn-delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-delete:hover {
            background: #dc2626;
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-edit:disabled,
        button.btn-edit:disabled {
            cursor: default;
            transform: none;
            box-shadow: none;
        }

        button.btn-edit:disabled {
            background: #16a34a;
        }

        button.btn-edit.pending:disabled {
            background: #f59e0b;
            color: #fff;
        }

        form {
            display: inline;
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            background: #fff;
            border: 1px dashed #cbd5e1;
            border-radius: 24px;
            padding: 50px 24px;
            color: #64748b;
            font-weight: 700;
        }

        @media (max-width: 1100px) {
            .grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 900px) {
            .menu {
                display: none;
            }

            .hero {
                align-items: flex-start;
                flex-direction: column;
            }

            .grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .thumb {
                height: 190px;
            }
        }

        @media (max-width: 620px) {
            .nav-inner,
            .container {
                max-width: calc(100% - 24px);
            }

            .navbar {
                height: 68px;
            }

            .logo {
                font-size: 21px;
            }

            .dark-mode {
                display: none;
            }

            .hero {
                padding: 22px;
                border-radius: 22px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .thumb {
                height: 230px;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .actions {
                flex-direction: column;
            }

            .actions a,
            .actions form,
            .actions button {
                width: 100%;
            }
        }
    </style>
</head>

<body>
<header class="navbar">
    <div class="nav-inner">
        <div class="logo">Tech<span>School</span></div>

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

<main class="container">
    <section class="hero">
        <div>
            <div class="hero-kicker">
                <ion-icon name="school-outline"></ion-icon>
                Nền tảng học tập trực tuyến
            </div>

            <h1>Danh sách khóa học</h1>

            <p>
                Khám phá các khóa học hiện có, theo dõi trạng thái đăng ký và tiếp tục học khi tài khoản của bạn đã được duyệt.
            </p>
        </div>

        @if(auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('courses.create') }}" class="btn">
                <ion-icon name="add-outline"></ion-icon>
                Tạo khóa học
            </a>
        @endif
    </section>

    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    <section class="grid">
        @forelse($courses as $course)
            <article class="card">
                <a href="{{ route('courses.show', $course->id) }}" class="thumb">
                    <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">

                    <span class="course-badge">
                        <ion-icon name="play-circle-outline"></ion-icon>
                        Khóa học
                    </span>
                </a>

                <div class="card-body">
                    <h3>
                        <a href="{{ route('courses.show', $course->id) }}">
                            {{ $course->title }}
                        </a>
                    </h3>

                    <p class="desc">
                        {{ $course->content }}
                    </p>

                    <div class="price-row">
                        <span class="price-label">Học phí</span>
                        <span class="price-value">{{ $course->price }}</span>
                    </div>

                    <div class="actions">
                        @if(auth()->user()->role == 'admin')
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn-edit">
                                <ion-icon name="create-outline"></ion-icon>
                                Sửa
                            </a>

                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xóa khóa học này?')">
                                    <ion-icon name="trash-outline"></ion-icon>
                                    Xóa
                                </button>
                            </form>
                        @else
                            @php
                                $courseUser = $course->courseUsers->first();
                            @endphp

                            @if(!$courseUser)
                                <form action="{{ route('courses.register', $course->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-edit">
                                        Xin vào học
                                        <ion-icon name="arrow-forward-outline"></ion-icon>
                                    </button>
                                </form>
                            @elseif($courseUser->status === 'pending')
                                <button class="btn-edit pending" disabled>
                                    <ion-icon name="time-outline"></ion-icon>
                                    Đang đợi duyệt
                                </button>
                            @elseif($courseUser->status === 'approved')
                                <button class="btn-edit" disabled>
                                    Đã được duyệt
                                    <ion-icon name="checkmark-outline"></ion-icon>
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
            </article>
        @empty
            <div class="empty-state">
                Chưa có khóa học nào được tạo.
            </div>
        @endforelse
    </section>
</main>

<script>
    function toggleMenu() {
        const menu = document.getElementById('dropdownMenu');
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
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
