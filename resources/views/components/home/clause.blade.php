<!DOCTYPE html>
<html lang="vi">
<head>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điều khoản - TechSchool</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background: #eef3f8;
            color: #ffffff;
        }

        a { text-decoration: none; color: inherit; }

        .navbar {
            width: 100%;
            height: 76px;
            background: #ffffff;
            border-bottom: 1px solid #d9dee8;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-inner {
            width: 1020px;
            max-width: calc(100% - 40px);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.8px;
            color: #111827;
        }

        .logo span { color: #075fe4; }

        .menu {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .menu a {
            font-size: 16px;
            font-weight: 700;
            padding: 14px 22px;
            border-radius: 8px;
            transition: 0.2s;
            color: #111827;
        }

        .menu a.active,
        .menu a:hover {
            background: #0875ff;
            color: #fff;
            box-shadow: 0 5px 12px rgba(8, 117, 255, 0.22);
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
            background: #0875ff;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: 800;
            font-size: 18px;
        }

        .dropdown {
            position: absolute;
            right: 0;
            top: 52px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            width: 170px;
            display: none;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.12);
            z-index: 20;
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
        }

        .dark-mode ion-icon {
            color: #fff;
            font-size: 20px;
        }

        .term-page {
            min-height: calc(100vh - 76px);
            padding: 30px 0 0;
                background: #eef3f8;

        }

        .term-wrap {
            width: 800px;
            max-width: calc(100% - 40px);
            margin: 0 auto;
        }

        .width-line {
            display: flex;
            align-items: center;
            gap: 12px;
              color: #6b7280;
            font-weight: 800;
            font-size: 14px;
            margin-bottom: 28px;
            opacity: 0.95;
        }

        .width-line::before,
        .width-line::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #6b7280;
        }

        .title-box {
            border-left: 7px solid #0875ff;
            padding-left: 13px;
            margin-bottom: 18px;
        }

        .title-box h1 {
            font-size: 30px;
            font-weight: 900;
            letter-spacing: -0.8px;
             color: #111827;
        }

        .intro-text {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 18px;
          color: #4b5563;
        }

        .term-card {
            background: #ffffff;
    color: #111827;
    box-shadow: 0 6px 18px rgba(15, 23, 42, 0.08);
            border-radius: 5px;
            padding: 14px 16px;
            margin-bottom: 8px;

        }

        .term-card h2 {
            font-size: 17px;
            font-weight: 900;
            color: #0875ff;
            margin-bottom: 8px;
        }

        .term-card p {
            font-size: 13.5px;
            line-height: 1.5;
             color: #374151;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .highlight {
            font-weight: 900;
        }

        .footer {
            margin-top: 28px;
            padding: 14px 0;
            background: #8f9ba6;
            text-align: center;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
        }

        @media (max-width: 900px) {
            .menu {
                display: none;
            }

            .term-wrap {
                max-width: calc(100% - 28px);
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

<main class="term-page">
    <div class="term-wrap">

        <div class="title-box">
            <h1>Điều khoản sử dụng</h1>
        </div>

        <p class="intro-text">
            Bằng việc tiếp tục sử dụng TechSchool, bạn đã đọc và đồng ý với các điều khoản sau:
        </p>

        <div class="term-card">
            <h2>1. Giới Thiệu</h2>
            <p>
                <span class="highlight">TechSchool</span> là nền tảng học lập trình trực tuyến dành cho mọi người.
                Sứ mệnh của chúng tôi là mang lại cơ hội học tập dễ tiếp cận, linh hoạt và hiệu quả cho mọi người,
                giúp họ nâng cao kỹ năng, phát triển sự nghiệp.
            </p>
        </div>

        <div class="term-card">
            <h2>2. Điều Khoản Chung</h2>
            <p><span class="highlight">Tài khoản người dùng:</span> Để sử dụng một số tính năng trên TechSchool, bạn cần tạo tài khoản cá nhân. Bạn có trách nhiệm duy trì bảo mật tài khoản và thông tin cá nhân.</p>
            <p><span class="highlight">Nội dung trên trang:</span> TechSchool cung cấp nội dung học tập bao gồm video, tài liệu, mã nguồn và các tài nguyên khác. Mọi tài liệu đều thuộc bản quyền của TechSchool hoặc các đối tác của chúng tôi.</p>
            <p><span class="highlight">Hành vi sử dụng:</span> Người dùng không được phép sử dụng trang web cho các hoạt động bất hợp pháp, gây hại hoặc vi phạm quyền lợi của các bên thứ ba.</p>
        </div>

        <div class="term-card">
            <h2>3. Quyền và Trách Nhiệm</h2>
            <p><span class="highlight">Quyền của TechSchool:</span> Chúng tôi có quyền thay đổi nội dung, giá cả và các dịch vụ trên trang web mà không cần thông báo trước.</p>
            <p><span class="highlight">Trách nhiệm của người dùng:</span> Bạn đồng ý rằng mọi hoạt động học tập và tương tác trên TechSchool sẽ tuân thủ luật pháp hiện hành.</p>
        </div>

        <div class="term-card">
            <h2>4. Đăng Ký Khóa Học</h2>
            <p>Khi đăng ký một khóa học tại TechSchool, bạn sẽ được truy cập nội dung học tập trực tuyến. Chi phí khóa học sẽ được nêu rõ trước khi bạn xác nhận mua.</p>
        </div>

        <div class="term-card">
            <h2>5. Quyền Sở Hữu Trí Tuệ</h2>
            <p>Toàn bộ nội dung, thương hiệu và tài sản trí tuệ trên TechSchool thuộc sở hữu của chúng tôi hoặc các bên cấp phép. Bạn không được phép sử dụng chúng mà không có sự cho phép bằng văn bản.</p>
        </div>
    </div>

    <footer class="footer">
        © 2024 TechSchool. All rights reserved.
    </footer>
</main>

<script>
    function toggleMenu() {
        const menu = document.getElementById('dropdownMenu');
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    }

    window.onclick = function(e) {
        if (!e.target.closest('.user-menu')) {
            document.getElementById('dropdownMenu').style.display = 'none';
        }
    }
</script>
@include('components.ai-chat')
</body>
</html>
