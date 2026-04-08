<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa khóa học</title>
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
        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d6d6d6;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
        }
        .preview {
            width: 180px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
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
        .top-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #111;
            text-decoration: none;
            font-weight: 600;
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
    <div class="container">
        <a class="top-link" href="{{ route('courses.index') }}">← Quay lại danh sách khóa học</a>

        <h1>Sửa khóa học</h1>

        <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Tên khóa học</label>
                <input type="text" name="title" id="title" value="{{ old('title', $course->title) }}">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Nội dung</label>
                <input type="text" name="content" id="content" value="{{ old('content', $course->content) }}">
                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Giá</label>
                <input type="text" name="price" id="price" value="{{ old('price', $course->price) }}">
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="img_url">Ảnh mới</label>
                <input type="file" name="img_url" id="img_url" accept="image/*">
                <img class="preview" src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
                @error('img_url')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Cập nhật khóa học</button>
        </form>
    </div>
</body>

</html>
