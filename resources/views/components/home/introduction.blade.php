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
    background: #f7f8fb;
    color: #111827;
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

/* ================= HEADER ================= */

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

.logo span {
    color: #075fe4;
}

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

/* ================= INTRO ================= */

.intro-section {
    min-height: calc(100vh - 76px);
    background: #F0F0F0;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    padding: 100px 0 70px;
}

.intro-container {
    width: 1200px;
    max-width: calc(100% - 60px);
    display: grid;
    grid-template-columns: 1.05fr 0.95fr;
    align-items: center;
    gap: 60px;
}

.intro-content h1 {
    font-size: 48px;
    line-height: 1.28;
    font-weight: 900;
    letter-spacing: -1.7px;
    color: #050505;
    max-width: 690px;
    margin-bottom: 34px;
    position: relative;
    padding-bottom: 30px;
}

.intro-content h1::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 230px;
    height: 5px;
    background: #0b8cff;
    border-radius: 999px;
}

.intro-content p {
    max-width: 670px;
    font-size: 21px;
    line-height: 1.7;
    color: #111111;
    font-weight: 400;
}

.intro-content p strong {
    font-weight: 900;
}

.intro-image {
    display: flex;
    justify-content: center;
    align-items: center;
}

.intro-image img {
    width: 100%;
    max-width: 560px;
    object-fit: contain;
    display: block;
}

/* ================= RESPONSIVE ================= */

@media (max-width: 1000px) {

    .menu {
        display: none;
    }

    .intro-container {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .intro-content h1 {
        font-size: 36px;
    }

    .intro-content p {
        font-size: 17px;
    }

    .intro-image img {
        max-width: 420px;
    }
}

@media (max-width: 600px) {

    .nav-inner,
    .intro-container {
        max-width: calc(100% - 24px);
    }

    .intro-section {
        padding-top: 60px;
    }

    .intro-content h1 {
        font-size: 30px;
        line-height: 1.4;
    }

    .intro-content p {
        font-size: 16px;
        line-height: 1.7;
    }

    .intro-image img {
        max-width: 320px;
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

<main class="intro-section">
    <div class="intro-container">
        <div class="intro-content">
            <h1>Giới thiệu hệ thống học tập công nghệ TechSchool</h1>

            <p>
                <strong>TechSchool</strong> là nền tảng học lập trình trực tuyến dành cho mọi người.
                Sứ mệnh của chúng tôi là mang lại cơ hội học tập dễ tiếp cận, linh hoạt và hiệu quả
                cho mọi người, giúp họ nâng cao kỹ năng, phát triển sự nghiệp.
            </p>
        </div>

        <div class="intro-image">
            <img src="{{ asset('images/bg-gioithieu.png') }}" alt="TechSchool giới thiệu">
        </div>
    </div>
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
</body>
</html>
