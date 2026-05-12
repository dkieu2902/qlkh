<!DOCTYPE html>
<html lang="vi">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TechSchool</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
    font-family: "Inter", "Segoe UI", Arial, sans-serif;
    color: #111827;
    min-height: 100vh;
    background: #eef3f8;
}

        a {
            text-decoration: none;
            color: inherit;
        }

        .page-bg {
    min-height: 100vh;
    background:
        linear-gradient(
            to bottom,
            rgba(245, 249, 255, 0.65) 0%,
            rgba(245, 249, 255, 0.75) 52%,
            #eef3f8 52%,
            #eef3f8 100%
        ),
        url("/images/nen2.jpg") center top / 100% 52% no-repeat;
}

        .navbar {
            width: 100%;
            height: 74px;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: center;
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
            transition: 0.2s;
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
        }

        .dropdown {
            position: absolute;
            right: 0;
            top: 50px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 170px;
            display: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
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

        .hero {
            text-align: center;
            padding: 58px 20px 34px;
        }

        .hero h1 {
            font-size: 46px;
            line-height: 1.08;
            font-weight: 900;
            max-width: 780px;
            margin: 0 auto 22px;
        }

        .hero h1 span {
            color: #075ce0;
        }

        .hero p {
            font-size: 17px;
            line-height: 1.55;
            max-width: 760px;
            margin: 0 auto 26px;
            color: #111;
        }

        .hero-btn {
            display: inline-block;
            padding: 14px 34px;
            border-radius: 10px;
            background: #0875ff;
            color: #fff;
            font-weight: 800;
            font-size: 18px;
            box-shadow: 0 6px 12px rgba(0, 91, 210, 0.3);
        }

        .features-wrap {
            width: 980px;
            max-width: calc(100% - 40px);
            margin: 20px auto 70px;
            background: rgba(255, 255, 255, 0.88);
            border-radius: 24px;
            padding: 36px 40px;
            box-shadow: 0 14px 35px rgba(31, 65, 114, 0.15);
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 42px 58px;
        }

        .feature-item {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .feature-icon {
            width: 58px;
            height: 58px;
            border-radius: 14px;
            background: linear-gradient(180deg, #0875ff, #0052d9);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            box-shadow: 0 6px 12px rgba(0, 91, 210, 0.28);
        }

        .feature-icon ion-icon {
            font-size: 30px;
        }

        .feature-content h3 {
            font-size: 20px;
            font-weight: 900;
            margin-bottom: 8px;
        }

        .feature-content p {
            font-size: 14.5px;
            line-height: 1.45;
            color: #222;
        }

        .chat-float {
            position: fixed;
            right: 24px;
            bottom: 24px;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: #0875ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            box-shadow: 0 8px 18px rgba(0, 91, 210, 0.35);
            z-index: 10;
        }

        .chat-float ion-icon {
            font-size: 28px;
        }

        @media (max-width: 900px) {
            .menu {
                display: none;
            }

            .hero h1 {
                font-size: 34px;
            }

            .features {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .nav-inner {
                max-width: calc(100% - 30px);
            }

            .logo {
                font-size: 26px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .features-wrap {
                padding: 28px 24px;
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

    <section class="hero">
        <h1>
            <span>Nền tảng học lập trình trực tuyến</span><br>
            dành cho mọi người
        </h1>

        <p>
            Nền tảng học lập trình trực tuyến, luyện kỹ năng lập trình qua bài tập,
            giảng viên hướng dẫn, các bài viết chuyên sâu và tài liệu học tập dành riêng
            cho học viên
        </p>

        <a href="/courses" class="hero-btn">Bắt đầu học miễn phí</a>
    </section>

    <section class="features-wrap">
        <div class="features">

            <div class="feature-item">
                <div class="feature-icon">
                    <ion-icon name="videocam"></ion-icon>
                </div>
                <div class="feature-content">
                    <h3>Học online trực tiếp</h3>
                    <p>Học trực tiếp với giảng viên trên Google Meet, ở bất kỳ nơi đâu, giải đáp thắc mắc nhanh chóng.</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">
                    <ion-icon name="easel"></ion-icon>
                </div>
                <div class="feature-content">
                    <h3>Xem lại bài giảng</h3>
                    <p>Đăng nhập và xem lại video bài giảng thuận tiện mọi lúc trên web techschool.vn.</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">
                    <ion-icon name="code-slash"></ion-icon>
                </div>
                <div class="feature-content">
                    <h3>Làm bài tập và thực hành</h3>
                    <p>Luyện kỹ năng lập trình thông qua bài tập, giảng viên chấm điểm, đánh giá và hướng dẫn.</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">
                    <ion-icon name="book-outline"></ion-icon>
                </div>
                <div class="feature-content">
                    <h3>Access tài nguyên</h3>
                    <p>Truy cập các bài viết chuyên sâu dành riêng cho học viên, tài liệu học tập, api để thực hành...</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">
                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                </div>
                <div class="feature-content">
                    <h3>Tài nguyên được chứng thực</h3>
                    <p>Bài viết, video đã được xin phép tác giả, kiểm duyệt và chứng nhận hữu ích bởi đội ngũ TechSchool.</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">
                    <ion-icon name="globe-outline"></ion-icon>
                </div>
                <div class="feature-content">
                    <h3>Một nơi cho tất cả</h3>
                    <p>Khoá học thuộc đa dạng lĩnh vực, từ cơ bản đến nâng cao, phù hợp với mọi đối tượng.</p>
                </div>
            </div>

        </div>
    </section>

</div>

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
