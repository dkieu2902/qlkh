<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSchool - Giới thiệu</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: #111111;
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

        .navbar {
            height: 56px;
            border-bottom: 1px solid #d7d7d7;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
        }

        .nav-container {
            width: 1200px;
            max-width: calc(100% - 40px);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 17px;
            font-weight: 800;
            color: #111111;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .menu a {
            font-size: 14px;
            font-weight: 600;
            padding: 10px 16px;
            border-radius: 8px;
            color: #111111;
            line-height: 1;
        }

        .menu a.active {
            background: #e7e7e7;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #90a4ae;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 600;
        }

        .icon-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid #d4d4d4;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f3f3f3;
        }

        .icon-btn svg {
            width: 16px;
            height: 16px;
            stroke: #111111;
            stroke-width: 2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .intro-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            padding-top: 52px;
        }

        .intro-content {
            width: 670px;
            max-width: calc(100% - 40px);
        }

        .intro-content h1 {
            font-size: 26px;
            font-weight: 800;
            line-height: 1.35;
            color: #111111;
            margin-bottom: 34px;
        }

        .intro-content p {
            font-size: 16px;
            line-height: 1.75;
            color: #111111;
            max-width: 660px;
        }

        .intro-content p strong {
            font-weight: 800;
        }

        @media (max-width: 768px) {
            .nav-container {
                max-width: calc(100% - 24px);
            }

            .menu {
                gap: 4px;
            }

            .menu a {
                padding: 8px 10px;
                font-size: 13px;
            }

            .intro-wrapper {
                padding-top: 36px;
            }

            .intro-content {
                max-width: calc(100% - 24px);
            }

            .intro-content h1 {
                font-size: 22px;
                margin-bottom: 24px;
            }

            .intro-content p {
                font-size: 15px;
                line-height: 1.65;
            }
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="nav-container">
            <div class="logo">TechSchool</div>

            <div class="menu">
                <a href="/home" class="{{ request()->is('home') ? 'active' : '' }}">Trang chủ</a>
                <a href="/courses" class="{{ request()->is('courses') ? 'active' : '' }}">Khóa học</a>
                <a href="/introduction" class="{{ request()->is('introduction') ? 'active' : '' }}">Giới thiệu</a>
                <a href="/clause" class="{{ request()->is('clause') ? 'active' : '' }}">Điều khoản</a>
            </div>

            <div class="nav-actions">
                <div class="avatar">D</div>
                <button class="icon-btn" aria-label="Theme">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="4"></circle>
                        <path d="M12 2v2"></path>
                        <path d="M12 20v2"></path>
                        <path d="M4.93 4.93l1.41 1.41"></path>
                        <path d="M17.66 17.66l1.41 1.41"></path>
                        <path d="M2 12h2"></path>
                        <path d="M20 12h2"></path>
                        <path d="M4.93 19.07l1.41-1.41"></path>
                        <path d="M17.66 6.34l1.41-1.41"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <main class="intro-wrapper">
        <div class="intro-content">
            <h1>Giới thiệu hệ thống học tập công nghệ TechSchool</h1>
            <p>
                <strong>TechSchool</strong> là nền tảng học lập trình trực tuyến dành cho mọi người.
                Sứ mệnh của chúng tôi là mang lại cơ hội học tập dễ tiếp cận, linh hoạt và hiệu quả
                cho mọi người, giúp họ nâng cao kỹ năng, phát triển sự nghiệp.
            </p>
        </div>
    </main>
</body>
</html>
