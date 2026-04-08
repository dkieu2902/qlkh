<!DOCTYPE html>
<html lang="vi">
<head>
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
            font-family: Arial, Helvetica, sans-serif;
            background: #ffffff;
            color: #111;
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

        .theme-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 1px solid #d0d0d0;
            background: #f3f3f3;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .theme-btn svg {
            width: 20px;
            height: 20px;
            stroke: #111;
        }

        .hero {
            width: 100%;
            padding-top: 110px;
            padding-bottom: 140px;
        }

        .hero-inner {
            width: 1200px;
            max-width: calc(100% - 80px);
            margin: 0 auto;
            display: flex;
            justify-content: center;
        }

        .hero-content {
            max-width: 700px;
            text-align: left;
        }

        .hero h1 {
            font-size: 50px;
            line-height: 1.04;
            font-weight: 400;
            letter-spacing: -1.5px;
            margin-bottom: 24px;
        }



        .hero p {
            font-size: 19px;
            line-height: 1.55;
            color: #1f1f1f;
            max-width: 760px;
        }

        .features {
            width: 1200px;
            max-width: calc(100% - 80px);
            margin: 0 auto 60px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            column-gap: 80px;
            row-gap: 54px;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 22px;
        }

        .feature-icon {
            width: 42px;
            min-width: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 4px;
        }

        .feature-icon svg {
            width: 34px;
            height: 34px;
            stroke: #111;
            stroke-width: 1.8;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .feature-content h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .feature-content p {
            font-size: 15px;
            line-height: 1.55;
            color: #6d7280;
        }

        @media (max-width: 1200px) {
            .hero h1 {
                font-size: 56px;
            }

            .features {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-inner {
                max-width: calc(100% - 30px);
                gap: 16px;
            }

            .menu {
                display: none;
            }

            .hero {
                padding-top: 70px;
                padding-bottom: 90px;
            }

            .hero-inner,
            .features {
                max-width: calc(100% - 30px);
            }

            .hero h1 {
                font-size: 38px;
                line-height: 1.15;
                letter-spacing: -0.5px;
            }

            .hero p {
                font-size: 16px;
            }

            .features {
                grid-template-columns: 1fr;
                gap: 36px;
            }
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

    <section class="hero">
        <div class="hero-inner">
            <div class="hero-content">
                <h1>
                    Nền tảng học lập trình trực tuyến dành cho
                    <strong>mọi người</strong>
                </h1>
                <p>
                    Nền tảng học lập trình trực tuyến, luyện kỹ năng lập trình qua bài tập,
                    giảng viên hướng dẫn, các bài viết chuyên sâu và tài liệu học tập dành riêng
                    cho học viên
                </p>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="feature-item">
            <div class="feature-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M2 17a9 9 0 0 1 9 9"></path>
                    <path d="M2 11a15 15 0 0 1 15 15"></path>
                    <path d="M3 21h.01"></path>
                    <rect x="14" y="3" width="7" height="18" rx="1.5"></rect>
                </svg>
            </div>
            <div class="feature-content">
                <h3>Học online trực tiếp</h3>
                <p>
                    Học trực tiếp với giảng viên trên Google Meet, ở bất kỳ nơi đâu,
                    giải đáp thắc mắc nhanh chóng
                </p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="12" rx="2"></rect>
                    <path d="M10 8l5 2.5L10 13z"></path>
                    <path d="M8 20h8"></path>
                    <path d="M12 16v4"></path>
                </svg>
            </div>
            <div class="feature-content">
                <h3>Xem lại bài giảng</h3>
                <p>
                    Đăng nhập và xem lại video bài giảng thuận tiện mọi lúc trên web techschool.vn
                </p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M8 8l-4 4 4 4"></path>
                    <path d="M16 8l4 4-4 4"></path>
                </svg>
            </div>
            <div class="feature-content">
                <h3>Làm bài tập và thực hành</h3>
                <p>
                    Luyện kỹ năng lập trình thông qua bài tập, giảng viên chấm điểm,
                    đánh giá và hướng dẫn
                </p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7z"></path>
                    <path d="M14 2v5h5"></path>
                    <path d="M10 13l2 2"></path>
                    <path d="M10 17h4"></path>
                    <path d="M10 9h1"></path>
                </svg>
            </div>
            <div class="feature-content">
                <h3>Access tài nguyên</h3>
                <p>
                    Truy cập các bài viết chuyên sâu dành riêng cho học viên, tài liệu học tập,
                    api để thực hành...
                </p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">
                <svg viewBox="0 0 24 24">
                    <rect x="4" y="3" width="16" height="18" rx="2"></rect>
                    <path d="M9 12l2 2 4-4"></path>
                </svg>
            </div>
            <div class="feature-content">
                <h3>Tài nguyên được chứng thực</h3>
                <p>
                    Bài viết, video đã được xin phép tác giả, kiểm duyệt và chứng nhận hữu ích
                    bởi đội ngũ TechSchool, tránh nội dung rác
                </p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M7 10v11"></path>
                    <path d="M12 10v11"></path>
                    <path d="M17 10v11"></path>
                    <path d="M2 21h20"></path>
                    <path d="M7 10c0-2.2 1.8-4 4-4h2c2.8 0 5 2.2 5 5 0 1.6-.8 3-2 3.9"></path>
                    <path d="M7 10H5a3 3 0 0 1 0-6c1 0 1.8.3 2.4.9"></path>
                </svg>
            </div>
            <div class="feature-content">
                <h3>Một nơi cho tất cả</h3>
                <p>
                    Khoá học thuộc đa dạng lĩnh vực, từ cơ bản đến nâng cao, phù hợp với mọi đối tượng
                </p>
            </div>
        </div>
    </section>
</body>
</html>
