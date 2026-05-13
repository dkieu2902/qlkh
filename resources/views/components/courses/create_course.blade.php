<!DOCTYPE html>
<html lang="vi">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($course) ? 'Sửa khóa học' : 'Tạo khóa học' }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #0875ff;
            --primary-dark: #075ccf;
            --text: #111827;
            --muted: #64748b;
            --border: #e2e8f0;
            --bg: #eef3f8;
            --danger: #dc2626;
            --shadow: 0 18px 45px rgba(31, 65, 114, 0.14);
        }

        body {
            font-family: "Inter", Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
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
                    rgba(245, 249, 255, 0.68) 0%,
                    rgba(245, 249, 255, 0.78) 44%,
                    #eef3f8 44%,
                    #eef3f8 100%
                ),
                url("/images/nen2.jpg") center top / 100% 44% no-repeat;
        }

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

        .container {
            width: 880px;
            max-width: calc(100% - 40px);
            margin: 44px auto 80px;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(226, 232, 240, 0.95);
            border-radius: 30px;
            padding: 34px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(14px);
        }

        .page-kicker {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 8px 14px;
            background: #d9e9ff;
            color: #075ccf;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        h1 {
            font-size: 40px;
            font-weight: 900;
            letter-spacing: -1.3px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 28px;
        }

        .form-grid {
            display: grid;
            gap: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 900;
            margin-bottom: 8px;
            color: #0f172a;
        }

        .form-control {
            width: 100%;
            min-height: 48px;
            border: 1px solid #dbe4ef;
            border-radius: 14px;
            padding: 12px 14px;
            outline: none;
            font-size: 15px;
            font-weight: 600;
            background: #f8fafc;
            font-family: inherit;
            transition: 0.2s ease;
        }

        .form-control:focus {
            background: #fff;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(8, 117, 255, 0.12);
        }

        textarea.form-control {
            min-height: 130px;
            resize: vertical;
            line-height: 1.6;
        }

        .upload-box {
            position: relative;
            width: 100%;
            min-height: 260px;
            border: 2px dashed #cbd5e1;
            border-radius: 24px;
            background: #f8fafc;
            cursor: pointer;
            overflow: hidden;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center;
            transition: 0.22s ease;
        }

        .upload-box:hover {
            border-color: var(--primary);
            background: #f1f7ff;
        }

        .upload-box input {
            display: none;
        }

        .upload-placeholder {
            width: 100%;
            min-height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 24px;
            color: #64748b;
        }

        .upload-placeholder ion-icon {
            display: block;
            font-size: 56px;
            color: var(--primary);
            margin-bottom: 14px;
        }

        .upload-placeholder strong {
            display: block;
            font-size: 17px;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 7px;
            text-align: center;
        }

        .upload-placeholder span {
            display: block;
            font-size: 13px;
            font-weight: 700;
            text-align: center;
        }

        .preview-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            position: absolute;
            inset: 0;
        }

        .upload-box.has-image .preview-img {
            display: block;
        }

        .upload-box.has-image .upload-placeholder {
            display: none;
        }

        .remove-image {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            background: rgba(220, 38, 38, 0.95);
            color: #fff;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 5;
        }

        .upload-box.has-image .remove-image {
            display: flex;
        }

        .remove-image ion-icon {
            font-size: 21px;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 14px 16px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 10px;
        }

        .btn-back,
        .btn-submit {
            min-height: 46px;
            padding: 0 20px;
            border-radius: 14px;
            border: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-back {
            background: #f1f5f9;
            color: #334155;
        }

        .btn-submit {
            background: linear-gradient(135deg, #0875ff, #075ccf);
            color: #fff;
            box-shadow: 0 14px 30px rgba(8, 117, 255, 0.24);
        }

        @media (max-width: 800px) {
            .menu {
                display: none;
            }

            .nav-inner {
                max-width: calc(100% - 40px);
            }

            h1 {
                font-size: 32px;
            }
        }

        @media (max-width: 560px) {
            .container,
            .nav-inner {
                max-width: calc(100% - 24px);
            }

            .navbar {
                height: 68px;
            }

            .logo {
                font-size: 26px;
            }

            .dark-mode {
                display: none;
            }

            .form-card {
                padding: 24px;
                border-radius: 24px;
            }

            .upload-box {
                min-height: 220px;
            }

            .actions {
                flex-direction: column;
            }

            .btn-back,
            .btn-submit {
                width: 100%;
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

<main class="container">
    <section class="form-card">
        <div class="page-kicker">
            <ion-icon name="school-outline"></ion-icon>
            Quản lý khóa học
        </div>

        <h1>{{ isset($course) ? 'Sửa khóa học' : 'Tạo khóa học' }}</h1>

        <p class="subtitle">
            Nhập thông tin khóa học và chọn ảnh đại diện. Sau khi chọn ảnh, hệ thống sẽ hiển thị bản xem trước.
        </p>

        @if($errors->any())
            <div class="error-box">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form
            action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="form-grid"
            onsubmit="preparePriceBeforeSubmit()"
        >
            @csrf

            @if(isset($course))
                @method('PUT')
            @endif

            <div class="form-group">
                <label>Tên khóa học</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $course->title ?? '') }}"
                    placeholder="Nhập tên khóa học"
                >
            </div>

            <div class="form-group">
                <label>Nội dung khóa học</label>
                <textarea
                    name="content"
                    class="form-control"
                    placeholder="Nhập mô tả khóa học"
                >{{ old('content', $course->content ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label>Học phí</label>

                <input
                    type="text"
                    id="priceDisplay"
                    class="form-control"
                    value="{{ old('price', isset($course->price) ? number_format($course->price, 0, ',', '.') : '') }}"
                    placeholder="Ví dụ: 100.000"
                    inputmode="numeric"
                    autocomplete="off"
                    oninput="formatPriceInput(this)"
                >

                <input
                    type="hidden"
                    name="price"
                    id="priceValue"
                    value="{{ old('price', $course->price ?? '') }}"
                >
            </div>

            <div class="form-group">
                <label>Ảnh đại diện khóa học</label>

                <label
                    class="upload-box {{ isset($course->img_url) && $course->img_url ? 'has-image' : '' }}"
                    id="imageBox"
                >
                    <input
                        type="file"
                        name="img_url"
                        accept="image/*"
                        id="imageInput"
                        onchange="previewImage(event)"
                    >

                    <img
                        id="imagePreview"
                        class="preview-img"
                        src="{{ isset($course->img_url) && $course->img_url ? asset($course->img_url) : '' }}"
                        alt="Ảnh preview"
                        style="{{ isset($course->img_url) && $course->img_url ? 'display:block;' : '' }}"
                    >

                    <span class="upload-placeholder">
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                        <strong>Chọn ảnh khóa học</strong>
                        <span>Bấm để tải ảnh lên</span>
                    </span>

                    <button
                        type="button"
                        class="remove-image"
                        onclick="removeImage(event)"
                    >
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </label>
            </div>

            <div class="actions">
                <a href="{{ route('courses.index') }}" class="btn-back">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                    Quay lại
                </a>

                <button type="submit" class="btn-submit">
                    <ion-icon name="save-outline"></ion-icon>
                    {{ isset($course) ? 'Cập nhật khóa học' : 'Lưu khóa học' }}
                </button>
            </div>
        </form>
    </section>
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

    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');
        const box = document.getElementById('imageBox');

        if (!input.files || !input.files[0]) return;

        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            box.classList.add('has-image');
        }

        reader.readAsDataURL(input.files[0]);
    }

    function removeImage(event) {
        event.preventDefault();
        event.stopPropagation();

        const input = document.getElementById('imageInput');
        const preview = document.getElementById('imagePreview');
        const box = document.getElementById('imageBox');

        input.value = '';
        preview.src = '';
        preview.style.display = 'none';
        box.classList.remove('has-image');
    }

    function onlyNumber(value) {
        return value.replace(/\D/g, '');
    }

    function formatVND(value) {
        const number = onlyNumber(value);

        if (!number) return '';

        return number.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    function formatPriceInput(input) {
        const rawValue = onlyNumber(input.value);
        const hiddenPrice = document.getElementById('priceValue');

        input.value = formatVND(rawValue);
        hiddenPrice.value = rawValue;
    }

    function preparePriceBeforeSubmit() {
        const displayPrice = document.getElementById('priceDisplay');
        const hiddenPrice = document.getElementById('priceValue');

        hiddenPrice.value = onlyNumber(displayPrice.value);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const priceDisplay = document.getElementById('priceDisplay');
        const priceValue = document.getElementById('priceValue');

        if (priceDisplay && priceValue) {
            const rawValue = onlyNumber(priceDisplay.value || priceValue.value);
            priceDisplay.value = formatVND(rawValue);
            priceValue.value = rawValue;
        }
    });
</script>

@include('components.ai-chat')
</body>
</html>
