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

        /* TERMS PAGE */
        .term-page {
            min-height: calc(100vh - 74px);
            padding: 56px 0 0;
        }

        .term-wrap {
            width: 980px;
            max-width: calc(100% - 40px);
            margin: 0 auto;
        }

        .term-hero {
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(226, 232, 240, 0.95);
            border-radius: 30px;
            padding: 34px;
            margin-bottom: 24px;
            box-shadow: 0 18px 45px rgba(31, 65, 114, 0.14);
            backdrop-filter: blur(14px);
        }

        .term-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            background: #d9e9ff;
            color: #075ccf;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .term-hero h1 {
            font-size: clamp(34px, 4vw, 48px);
            font-weight: 900;
            letter-spacing: -1.4px;
            line-height: 1.08;
            color: #0f172a;
            margin-bottom: 14px;
        }

        .term-hero p {
            font-size: 15.5px;
            line-height: 1.7;
            color: #475569;
            max-width: 760px;
        }

        .terms-grid {
            display: grid;
            gap: 16px;
            margin-bottom: 40px;
        }

        .term-card {
            background: rgba(255, 255, 255, 0.94);
            color: #111827;
            border: 1px solid rgba(226, 232, 240, 0.95);
            box-shadow: 0 12px 30px rgba(31, 65, 114, 0.10);
            border-radius: 22px;
            padding: 22px 24px;
            transition: 0.22s ease;
        }

        .term-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 40px rgba(31, 65, 114, 0.15);
            border-color: rgba(8, 117, 255, 0.28);
        }

        .term-card h2 {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 18px;
            font-weight: 900;
            color: #075ccf;
            margin-bottom: 10px;
        }

        .term-card h2 ion-icon {
            font-size: 22px;
        }

        .term-card p {
            font-size: 14.2px;
            line-height: 1.65;
            color: #374151;
            margin-bottom: 7px;
            font-weight: 500;
        }

        .highlight {
            font-weight: 900;
            color: #111827;
        }

        .footer {
            margin-top: 28px;
            padding: 20px 0;
            background: rgba(6, 18, 43, 0.92);
            text-align: center;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
        }

        @media (max-width: 900px) {
            .menu {
                display: none;
            }

            .nav-inner {
                max-width: calc(100% - 40px);
            }

            .term-wrap {
                max-width: calc(100% - 28px);
            }
        }

        @media (max-width: 600px) {
            .navbar {
                height: 68px;
            }

            .logo {
                font-size: 26px;
            }

            .dark-mode {
                display: none;
            }

            .term-page {
                padding-top: 36px;
            }

            .term-hero {
                padding: 24px;
                border-radius: 24px;
            }

            .term-card {
                padding: 20px;
                border-radius: 20px;
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

    <main class="term-page">
        <div class="term-wrap">

            <section class="term-hero">
                <div class="term-badge">
                    <ion-icon name="document-text-outline"></ion-icon>
                    Chính sách sử dụng nền tảng
                </div>

                <h1>Điều khoản sử dụng</h1>

                <p>
                    Bằng việc tiếp tục sử dụng TechSchool, bạn xác nhận đã đọc, hiểu và đồng ý với các điều khoản dưới đây.
                </p>
            </section>

            <section class="terms-grid">
                <div class="term-card">
                    <h2>
                        <ion-icon name="information-circle-outline"></ion-icon>
                        1. Giới Thiệu
                    </h2>
                    <p>
                        <span class="highlight">TechSchool</span> là nền tảng học lập trình trực tuyến dành cho mọi người.
                        Sứ mệnh của chúng tôi là mang lại cơ hội học tập dễ tiếp cận, linh hoạt và hiệu quả cho mọi người,
                        giúp họ nâng cao kỹ năng, phát triển sự nghiệp.
                    </p>
                </div>

                <div class="term-card">
                    <h2>
                        <ion-icon name="reader-outline"></ion-icon>
                        2. Điều Khoản Chung
                    </h2>
                    <p><span class="highlight">Tài khoản người dùng:</span> Để sử dụng một số tính năng trên TechSchool, bạn cần tạo tài khoản cá nhân. Bạn có trách nhiệm duy trì bảo mật tài khoản và thông tin cá nhân.</p>
                    <p><span class="highlight">Nội dung trên trang:</span> TechSchool cung cấp nội dung học tập bao gồm video, tài liệu, mã nguồn và các tài nguyên khác. Mọi tài liệu đều thuộc bản quyền của TechSchool hoặc các đối tác của chúng tôi.</p>
                    <p><span class="highlight">Hành vi sử dụng:</span> Người dùng không được phép sử dụng trang web cho các hoạt động bất hợp pháp, gây hại hoặc vi phạm quyền lợi của các bên thứ ba.</p>
                </div>

                <div class="term-card">
                    <h2>
                        <ion-icon name="shield-checkmark-outline"></ion-icon>
                        3. Quyền và Trách Nhiệm
                    </h2>
                    <p><span class="highlight">Quyền của TechSchool:</span> Chúng tôi có quyền thay đổi nội dung, giá cả và các dịch vụ trên trang web mà không cần thông báo trước.</p>
                    <p><span class="highlight">Trách nhiệm của người dùng:</span> Bạn đồng ý rằng mọi hoạt động học tập và tương tác trên TechSchool sẽ tuân thủ luật pháp hiện hành.</p>
                </div>

                <div class="term-card">
                    <h2>
                        <ion-icon name="school-outline"></ion-icon>
                        4. Đăng Ký Khóa Học
                    </h2>
                    <p>
                        Khi đăng ký một khóa học tại TechSchool, bạn sẽ được truy cập nội dung học tập trực tuyến.
                        Chi phí khóa học sẽ được nêu rõ trước khi bạn xác nhận mua.
                    </p>
                </div>

                <div class="term-card">
                    <h2>
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        5. Quyền Sở Hữu Trí Tuệ
                    </h2>
                    <p>
                        Toàn bộ nội dung, thương hiệu và tài sản trí tuệ trên TechSchool thuộc sở hữu của chúng tôi hoặc các bên cấp phép.
                        Bạn không được phép sử dụng chúng mà không có sự cho phép bằng văn bản.
                    </p>
                </div>
            </section>
        </div>

        <footer class="footer">
            © 2026 TechSchool. All rights reserved.
        </footer>
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
