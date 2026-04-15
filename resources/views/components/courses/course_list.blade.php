<!DOCTYPE html>
<html lang="vi">
<head>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khóa học</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
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

        .container {
            width: 1200px;
            max-width: calc(100% - 30px);
            margin: 40px auto;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        h1 {
            font-size: 30px;
        }
        .btn {
            display: inline-block;
            background: #111;
            color: #fff;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }
        .message {
            background: #dff6dd;
            color: #166534;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }
        .card {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(0,0,0,0.08);
        }
        .card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }
        .card-body {
            padding: 16px;
        }
        .card-body h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .card-body p {
            color: #555;
            margin-bottom: 8px;
            line-height: 1.6;
        }
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 12px;
        }
        .btn-edit, .btn-delete {
            border: none;
            padding: 10px 14px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }
        .btn-edit {
            background: #e5e7eb;
            color: #111;
            text-decoration: none;
        }
        .btn-delete {
            background: #dc2626;
            color: #fff;
        }
        form {
            display: inline;
        }
                        .user-menu {
    position: relative;
    display: inline-block;
}

.avatar {
    width: 40px;
    height: 40px;
    background: #3498db;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-weight: bold;
}

.dropdown {
    position: absolute;
    right: 0;
    top: 50px;
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    width: 160px;
    display: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.dropdown a,
.dropdown button {
    display: block;
    width: 100%;
    padding: 10px;
    text-align: left;
    border: none;
    background: none;
    cursor: pointer;
    font-size: 1rem;
}

.dropdown a:hover,
.dropdown button:hover {
    background: #f2f2f2;
}
.dark-mode{
            background: rgb(247, 240, 240);
            width: 2.7rem;
            height: 2.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;

        }
        .dark-mode ion-icon{
            color: #111;
            font-size: 18px;
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
                            <a href="{{ route('courses.show', $course->id) }}" style="text-decoration:none; color:black;">
                                {{ $course->title }}
                            </a></h3>
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
        <button type="submit" class="btn-edit">Xin vào học</button>
    </form>
@elseif($courseUser->status === 'pending')
    <button class="btn-edit" disabled>Đang đợi duyệt</button>
@elseif($courseUser->status === 'approved')
    <button class="btn-edit" disabled>Đã được duyệt</button>
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

// click ra ngoài thì ẩn menu
window.onclick = function(e) {
    if (!e.target.closest('.user-menu')) {
        document.getElementById('dropdownMenu').style.display = 'none';
    }
}
</script>
</body>
</html>
