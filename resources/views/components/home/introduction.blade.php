<!DOCTYPE html>
<html lang="vi">
<head>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSchool - Giới thiệu</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background: #eef3f8;
            color: #111827;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            border: none;
            background: none;
            cursor: pointer;
            font-family: inherit;
        }

        .page-bg {
            min-height: 100vh;
            background:
                linear-gradient(
                    to bottom,
                    rgba(245, 249, 255, 0.68) 0%,
                    rgba(245, 249, 255, 0.78) 48%,
                    #eef3f8 48%,
                    #eef3f8 100%
                ),
                url("/images/nen2.jpg") center top / 100% 48% no-repeat;
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
            z-index: 100;
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
            z-index: 200;
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

        /* MAIN */
        .intro-section {
            min-height: calc(100vh - 74px);
            padding: 72px 0 90px;
        }

        .intro-container {
            width: 1180px;
            max-width: calc(100% - 40px);
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            align-items: center;
            gap: 56px;
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(226, 232, 240, 0.95);
            border-radius: 32px;
            padding: 46px;
            box-shadow: 0 18px 45px rgba(31, 65, 114, 0.14);
            backdrop-filter: blur(14px);
        }

        .intro-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            background: #d9e9ff;
            color: #075ccf;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .intro-content h1 {
            font-size: clamp(34px, 4vw, 54px);
            line-height: 1.12;
            font-weight: 900;
            letter-spacing: -1.8px;
            color: #0f172a;
            margin-bottom: 24px;
        }

        .intro-content h1 span {
            color: #075ccf;
        }

        .intro-content p {
            max-width: 680px;
            font-size: 17px;
            line-height: 1.75;
            color: #475569;
            margin-bottom: 28px;
        }

        .intro-content p strong {
            color: #111827;
            font-weight: 900;
        }

        .intro-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-top: 26px;
        }

        .stat-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 16px;
        }

        .stat-card strong {
            display: block;
            font-size: 24px;
            font-weight: 900;
            color: #075ccf;
            margin-bottom: 4px;
        }

        .stat-card span {
            font-size: 13px;
            font-weight: 700;
            color: #64748b;
        }

        .intro-image {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-card {
            width: 100%;
            max-width: 520px;
            border-radius: 30px;
            background:
                radial-gradient(circle at top left, rgba(8, 117, 255, 0.18), transparent 35%),
                linear-gradient(135deg, #ffffff, #eff6ff);
            border: 1px solid #dbeafe;
            padding: 28px;
            box-shadow: 0 18px 40px rgba(8, 117, 255, 0.13);
        }

        .image-card img {
            width: 100%;
            object-fit: contain;
            display: block;
        }

        .floating-card {
            position: absolute;
            left: 0;
            bottom: 26px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 14px 16px;
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.12);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .floating-card ion-icon {
            font-size: 24px;
            color: #0875ff;
        }

        .floating-card span {
            font-size: 13px;
            font-weight: 800;
            color: #111827;
        }

        @media (max-width: 1000px) {
            .menu {
                display: none;
            }

            .intro-container {
                grid-template-columns: 1fr;
                padding: 34px;
                gap: 36px;
            }

            .floating-card {
                left: 20px;
            }
        }

        @media (max-width: 600px) {
            .nav-inner,
            .intro-container {
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

            .intro-section {
                padding: 42px 0 60px;
            }

            .intro-container {
                padding: 24px;
                border-radius: 24px;
            }

            .intro-content h1 {
                font-size: 31px;
            }

            .intro-content p {
                font-size: 15.5px;
            }

            .intro-stats {
                grid-template-columns: 1fr;
            }

            .floating-card {
                position: static;
                margin-top: 16px;
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

    <main class="intro-section">
        <div class="intro-container">
            <div class="intro-content">
                <div class="intro-badge">
                    <ion-icon name="school-outline"></ion-icon>
                    Giới thiệu TechSchool
                </div>

                <h1>
                    Nền tảng học lập trình trực tuyến <span>dành cho mọi người</span>
                </h1>

                <p>
                    <strong>TechSchool</strong> là nền tảng học lập trình trực tuyến dành cho mọi người.
                    Sứ mệnh của chúng tôi là mang lại cơ hội học tập dễ tiếp cận, linh hoạt và hiệu quả,
                    giúp người học nâng cao kỹ năng, phát triển tư duy công nghệ và mở rộng cơ hội nghề nghiệp.
                </p>

                <div class="intro-stats">
                    <div class="stat-card">
                        <strong>Online</strong>
                        <span>Học mọi lúc</span>
                    </div>

                    <div class="stat-card">
                        <strong>Video</strong>
                        <span>Xem lại bài giảng</span>
                    </div>

                    <div class="stat-card">
                        <strong>Mentor</strong>
                        <span>Định hướng học tập</span>
                    </div>
                </div>
            </div>

            <div class="intro-image">
                <div>
                    <div class="image-card">
                        <img src="{{ asset('images/bg-gioithieu.png') }}" alt="TechSchool giới thiệu">
                    </div>

                    <div class="floating-card">
                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                        <span>Học tập linh hoạt, dễ tiếp cận</span>
                    </div>
                </div>
            </div>
        </div>
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
