<!DOCTYPE html>
<html lang="vi">
<head>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo khóa học</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #f3f3f3;
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

        .container {
            width: 700px;
            max-width: calc(100% - 30px);
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        }
        h1 {
            margin-bottom: 24px;
            font-size: 28px;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        input, textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d6d6d6;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
        }
        input[type="file"] {
            padding: 10px;
            background: #fafafa;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 6px;
        }
        .btn {
            background: #111;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .top-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #111;
            text-decoration: none;
            font-weight: 600;
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
        <a class="top-link" href="{{ route('courses.index') }}">← Quay lại danh sách khóa học</a>

        <h1>Tạo khóa học</h1>

        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Tên khóa học</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Nội dung</label>
                <input type="text" name="content" id="content" value="{{ old('content') }}">
                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Giá</label>
                <input type="text" name="price" id="price" value="{{ old('price') }}">
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="img_url">Ảnh khóa học</label>
                <input type="file" name="img_url" id="img_url" accept="image/*">
                @error('img_url')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Lưu khóa học</button>
        </form>
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
