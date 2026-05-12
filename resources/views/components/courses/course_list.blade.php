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
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background: #eef3f8;
            color: #111827;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

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

        .container {
    width: 1180px;
    max-width: calc(100% - 40px);
    margin: 42px auto 70px;
}

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 34px;
        }

        h1 {
            font-size: 34px;
            font-weight: 900;
            letter-spacing: -1px;
            position: relative;
            padding-bottom: 16px;
        }

        h1::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 88px;
            height: 4px;
            background: #0875ff;
            border-radius: 999px;
        }

        .btn {
            display: inline-block;
            background: #0875ff;
            color: #fff;
            padding: 13px 18px;
            border-radius: 9px;
            font-weight: 700;
            border: none;
        }

        .message {
            background: #dcfce7;
            color: #166534;
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
}

        .card {
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 10px 24px rgba(15, 23, 42, 0.07);
}


        .card img {
    width: 100%;
    height: 155px;
    object-fit: cover;
    display: block;
}

.card-body {
    padding: 14px 15px 16px;
}

.card-body h3 {
    font-size: 17px;
    font-weight: 800;
    line-height: 1.3;
    margin-bottom: 9px;
    letter-spacing: -0.3px;
}

.card-body p {
    color: #111827;
    margin-bottom: 7px;
    line-height: 1.45;
    font-size: 13.5px;
}


        .card-body strong {
            font-weight: 800;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 14px;
            flex-wrap: wrap;
        }

       .btn-edit,
.btn-delete {
    padding: 9px 12px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 13px;
}

        .btn-edit {
            background: #0875ff;
            color: #fff;
        }

        .btn-delete {
            background: #dc2626;
            color: #fff;
        }

        .btn-edit:disabled {
            cursor: default;
            opacity: 1;
        }

        button.btn-edit:disabled {
            background: #16a34a;
        }

        form {
            display: inline;
        }

        @media (max-width: 900px) {
            .menu {
                display: none;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .card img {
                height: 230px;
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

<div class="container">
    <div class="top-bar">
        <h1>Danh sách khóa học</h1>

        @if(auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('courses.create') }}" class="btn">+ Tạo khóa học</a>
        @endif
    </div>

    @if(session('success'))
        <div class="message">{{ session('success') }}</div>
    @endif

    <div class="grid">
        @foreach($courses as $course)
            <div class="card">
                <a href="{{ route('courses.show', $course->id) }}">
                    <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
                </a>

                <div class="card-body">
                    <h3>
                        <a href="{{ route('courses.show', $course->id) }}">
                            {{ $course->title }}
                        </a>
                    </h3>

                    <p><strong>Nội dung:</strong> {{ $course->content }}</p>
                    <p><strong>Giá:</strong> {{ $course->price }}</p>

                    <div class="actions">
                        @if(auth()->user()->role == 'admin')
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn-edit">Sửa</a>

                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Xóa</button>
                            </form>
                        @else
                            @php
                                $courseUser = $course->courseUsers->first();
                            @endphp

                            @if(!$courseUser)
                                <form action="{{ route('courses.register', $course->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-edit">
                                        Xin vào học <ion-icon name="arrow-forward-outline"></ion-icon>
                                    </button>
                                </form>
                            @elseif($courseUser->status === 'pending')
                                <button class="btn-edit" disabled>Đang đợi duyệt</button>
                            @elseif($courseUser->status === 'approved')
                                <button class="btn-edit" disabled>
                                    Đã được duyệt <ion-icon name="checkmark-outline"></ion-icon>
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
</body>
</html>
