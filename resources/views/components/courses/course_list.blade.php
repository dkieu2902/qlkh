<!DOCTYPE html>
<html lang="vi">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khóa học</title>

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
            --card: #ffffff;
            --success: #16a34a;
            --warning: #f59e0b;
            --danger: #dc2626;
            --shadow: 0 18px 45px rgba(31, 65, 114, 0.14);
        }

        body {
            font-family: "Inter", "Segoe UI", Arial, sans-serif;
            color: var(--text);
            min-height: 100vh;
            background: var(--bg);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
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
            width: 1180px;
            max-width: calc(100% - 40px);
            margin: 44px auto 80px;
        }

        .hero-panel {
            background: rgba(255, 255, 255, 0.88);
            border-radius: 28px;
            padding: 34px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(226, 232, 240, 0.9);
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 28px;
            margin-bottom: 28px;
            backdrop-filter: blur(14px);
        }

        .hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            background: #d9e9ff;
            color: #075ccf;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .hero-panel h1 {
            font-size: clamp(32px, 4vw, 48px);
            font-weight: 900;
            letter-spacing: -1.5px;
            line-height: 1.05;
            margin-bottom: 12px;
        }

        .hero-panel p {
            max-width: 650px;
            font-size: 15.5px;
            line-height: 1.7;
            color: var(--muted);
        }

        .btn-create {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 20px;
            border-radius: 14px;
            background: #0875ff;
            color: #fff;
            font-weight: 800;
            font-size: 15px;
            box-shadow: 0 12px 26px rgba(8, 117, 255, 0.28);
            transition: 0.22s ease;
            white-space: nowrap;
        }

        .btn-create:hover {
            transform: translateY(-2px);
            background: #075ccf;
        }

        .search-title {
            font-size: 16px;
            font-weight: 900;
            color: #334155;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            margin: 0 0 14px 2px;
        }

        .search-panel {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 26px;
            padding: 18px;
            box-shadow: 0 18px 42px rgba(31, 65, 114, 0.12);
            margin-bottom: 26px;
            position: relative;
            z-index: 20;
        }

        .search-bar {
            height: 72px;
            background: #fff;
            border: 1px solid #dfe7f2;
            border-radius: 22px;
            display: grid;
            grid-template-columns: 270px 1fr 150px;
            align-items: center;
            overflow: visible;
        }

        .filter-wrap {
            height: 100%;
            position: relative;
            border-right: 1px solid #e2e8f0;
        }

        .filter-trigger {
            width: 100%;
            height: 100%;
            border: none;
            background: transparent;
            padding: 0 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            cursor: pointer;
        }

        .filter-grid-icon {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: #eef6ff;
            color: #0875ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            flex-shrink: 0;
        }

        .filter-label-text {
            flex: 1;
            min-width: 0;
            text-align: left;
            color: #475569;
            font-size: 15px;
            font-weight: 700;
        }

        .filter-label-text strong {
            color: #111827;
            font-weight: 900;
        }

        .filter-chevron {
            color: #64748b;
            font-size: 20px;
            transition: 0.2s ease;
            flex-shrink: 0;
        }

        .filter-wrap.is-open .filter-chevron {
            transform: rotate(180deg);
        }

        .filter-menu {
            position: absolute;
            top: calc(100% + 12px);
            left: 0;
            width: 310px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            box-shadow: 0 24px 55px rgba(15, 23, 42, 0.16);
            padding: 8px;
            display: none;
            z-index: 90;
        }

        .filter-wrap.is-open .filter-menu {
            display: block;
            animation: popIn 0.18s ease;
        }

        .filter-option {
            width: 100%;
            border: none;
            background: transparent;
            border-radius: 14px;
            padding: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 11px;
            text-align: left;
            transition: 0.18s ease;
        }

        .filter-option:hover {
            background: #f8fafc;
        }

        .filter-option.active {
            background: #eaf3ff;
        }

        .filter-option ion-icon {
            width: 34px;
            height: 34px;
            padding: 8px;
            border-radius: 12px;
            color: #0875ff;
            background: #f1f7ff;
            flex-shrink: 0;
        }

        .filter-option strong {
            display: block;
            color: #111827;
            font-size: 14px;
            font-weight: 900;
        }

        .filter-option span span {
            display: block;
            margin-top: 2px;
            color: #64748b;
            font-size: 12px;
            font-weight: 650;
        }

        .search-shell {
            height: 100%;
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input-wrap {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            padding: 0 18px;
            border-right: 1px solid #e2e8f0;
        }

        .search-input-wrap input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            color: #111827;
            font-size: 16px;
            font-weight: 650;
        }

        .search-input-wrap input::placeholder {
            color: #9aa7b8;
            font-weight: 600;
        }

        .btn-search {
            margin: 0 8px;
            height: 52px;
            border-radius: 16px;
            border: none;
            background: #0875ff;
            color: #fff;
            font-size: 15px;
            font-weight: 900;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 12px 24px rgba(8, 117, 255, 0.28);
            transition: 0.2s ease;
        }

        .btn-search:hover {
            background: #075ccf;
            transform: translateY(-1px);
        }

        .history-popover {
            position: absolute;
            top: calc(100% + 12px);
            left: 18px;
            right: 18px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            box-shadow: 0 24px 55px rgba(15, 23, 42, 0.16);
            padding: 14px;
            display: none;
            z-index: 80;
        }

        .search-shell.is-open .history-popover {
            display: block;
            animation: popIn 0.18s ease;
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: translateY(-6px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .history-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 2px 4px 10px;
            border-bottom: 1px solid #eef2f7;
            margin-bottom: 8px;
        }

        .history-title {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 13px;
            font-weight: 900;
            color: #475569;
        }

        .history-title ion-icon {
            color: #0875ff;
            font-size: 17px;
        }

        .history-empty {
            padding: 14px 6px 6px;
            color: #64748b;
            font-size: 14px;
            font-weight: 650;
        }

        .history-list {
            display: flex;
            flex-direction: column;
            gap: 6px;
            max-height: 235px;
            overflow-y: auto;
            padding-right: 4px;
        }

        .history-row {
            display: grid;
            grid-template-columns: 1fr 34px;
            gap: 8px;
            align-items: center;
            border-radius: 14px;
            transition: 0.18s ease;
        }

        .history-row:hover {
            background: #f8fafc;
        }

        .history-link {
            min-width: 0;
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 9px;
            color: #111827;
            font-size: 14px;
            font-weight: 750;
        }

        .history-link ion-icon {
            color: #94a3b8;
            font-size: 17px;
            flex-shrink: 0;
        }

        .history-keyword {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .history-type {
            margin-left: auto;
            flex-shrink: 0;
            font-size: 11px;
            font-weight: 900;
            color: #075ccf;
            background: #eaf3ff;
            border-radius: 999px;
            padding: 5px 8px;
        }

        .history-delete {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 10px;
            background: #fee2e2;
            color: #b91c1c;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: 0.18s ease;
        }

        .history-delete:hover {
            background: #fecaca;
        }

        .history-delete ion-icon {
            font-size: 17px;
        }

        .message {
            background: #dcfce7;
            color: #166534;
            padding: 15px 18px;
            border-radius: 16px;
            margin-bottom: 22px;
            font-weight: 700;
            border: 1px solid #bbf7d0;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 24px;
            align-items: stretch;
        }

        .course-card {
            background: rgba(255, 255, 255, 0.94);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 14px 35px rgba(31, 65, 114, 0.12);
            border: 1px solid rgba(226, 232, 240, 0.95);
            transition: 0.25s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            min-height: 492px;
        }

        .course-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 24px 50px rgba(31, 65, 114, 0.18);
            border-color: rgba(8, 117, 255, 0.32);
        }

        .course-thumb {
            height: 172px;
            display: block;
            overflow: hidden;
            position: relative;
            background: #dbeafe;
            flex-shrink: 0;
        }

        .course-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: 0.35s ease;
        }

        .course-card:hover .course-thumb img {
            transform: scale(1.07);
        }

        .course-body {
            padding: 18px;
            display: flex;
            flex-direction: column;
            flex: 1;
            min-height: 0;
        }

        .course-title {
            font-size: 18px;
            font-weight: 900;
            line-height: 1.35;
            letter-spacing: -0.45px;
            margin-bottom: 10px;
            min-height: 48px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .course-title a:hover {
            color: var(--primary);
        }

        .course-desc {
            font-size: 14px;
            line-height: 1.6;
            color: #475569;
            margin-bottom: 14px;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .price-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px;
            border-radius: 16px;
            background: #f8fafc;
            border: 1px solid #edf2f7;
            margin-bottom: 14px;
            margin-top: auto;
        }

        .price-label {
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
        }

        .price-value {
            color: #111827;
            font-size: 15px;
            font-weight: 900;
            text-align: right;
            white-space: nowrap;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            min-height: 40px;
            align-items: center;
        }

        .btn-edit,
        .btn-delete,
        .btn-status {
            min-height: 40px;
            padding: 10px 13px;
            border-radius: 13px;
            border: none;
            cursor: pointer;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            font-size: 13px;
            line-height: 1;
        }

        .btn-edit {
            background: #0875ff;
            color: #fff;
        }

        .btn-delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-status {
            background: #0875ff;
            color: #fff;
        }

        .btn-status.pending {
            background: #f59e0b;
        }

        .btn-status.approved {
            background: #0875ff;
        }

        .btn-status:disabled {
            cursor: default;
        }

        form {
            display: inline;
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            background: rgba(255, 255, 255, 0.88);
            border: 1px dashed #cbd5e1;
            border-radius: 24px;
            padding: 52px 24px;
            color: #64748b;
            font-weight: 800;
            box-shadow: var(--shadow);
        }

        .custom-pagination {
            margin-top: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .page-btn,
        .page-dots {
            min-width: 42px;
            height: 42px;
            padding: 0 14px;
            border-radius: 13px;
            background: #fff;
            border: 1px solid #e2e8f0;
            color: #111827;
            font-size: 14px;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .page-btn:hover {
            background: #d9e9ff;
            color: #075ccf;
        }

        .page-btn.active {
            background: #0875ff;
            color: #fff;
            border-color: #0875ff;
        }

        .page-btn.disabled {
            opacity: 0.45;
            cursor: not-allowed;
        }

        .page-dots {
            border: none;
            background: transparent;
            color: #64748b;
        }

        @media (max-width: 1100px) {
            .course-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .search-bar {
                grid-template-columns: 240px 1fr 140px;
            }
        }

        @media (max-width: 900px) {
            .menu {
                display: none;
            }

            .nav-inner {
                max-width: calc(100% - 40px);
            }

            .hero-panel {
                flex-direction: column;
                align-items: flex-start;
            }

            .course-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .course-thumb {
                height: 190px;
            }

            .search-bar {
                height: auto;
                grid-template-columns: 1fr;
                overflow: visible;
                padding: 10px;
                gap: 8px;
            }

            .filter-wrap,
            .search-input-wrap {
                height: 58px;
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
            }

            .btn-search {
                width: 100%;
                margin: 0;
            }

            .filter-menu,
            .history-popover {
                position: relative;
                top: 8px;
                left: 0;
                right: 0;
                width: 100%;
            }
        }

        @media (max-width: 620px) {
            .nav-inner,
            .container {
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

            .hero-panel {
                padding: 24px;
                border-radius: 22px;
            }

            .hero-panel h1 {
                font-size: 32px;
            }

            .btn-create {
                width: 100%;
            }

            .course-grid {
                grid-template-columns: 1fr;
            }

            .course-card {
                min-height: 480px;
            }

            .course-thumb {
                height: 230px;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .actions a,
            .actions form,
            .actions button {
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

    <section class="hero-panel">
        <div>
            <div class="hero-kicker">
                <ion-icon name="school-outline"></ion-icon>
                Nền tảng học tập trực tuyến
            </div>

            <h1>Danh sách khóa học</h1>

            <p>
                Khám phá các khóa học hiện có, theo dõi trạng thái đăng ký và tiếp tục học khi tài khoản của bạn đã được duyệt.
            </p>
        </div>

        @if(auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('courses.create') }}" class="btn-create">
                <ion-icon name="add-outline"></ion-icon>
                Tạo khóa học
            </a>
        @endif
    </section>

    @php
        $currentFilter = request('filter', 'all');

        $filterLabels = [
            'all' => 'Tất cả',
            'title' => 'Tên khóa học',
            'content' => 'Nội dung',
            'price' => 'Học phí',
        ];

        $filterDescriptions = [
            'all' => 'Tìm trong toàn bộ khóa học',
            'title' => 'Tìm theo tên khóa học',
            'content' => 'Tìm theo nội dung mô tả',
            'price' => 'Tìm theo học phí',
        ];

        $filterIcons = [
            'all' => 'apps-outline',
            'title' => 'book-outline',
            'content' => 'document-text-outline',
            'price' => 'cash-outline',
        ];
    @endphp

    <div class="search-title">
        Tìm khóa học
    </div>

    <section class="search-panel">
        <form action="{{ route('courses.index') }}" method="GET">
            <div class="search-bar">

                <div class="filter-wrap" id="filterWrap">
                    <input type="hidden" name="filter" id="filterInput" value="{{ $currentFilter }}">

                    <button type="button" class="filter-trigger" onclick="toggleFilterMenu(event)">
                        <span class="filter-grid-icon">
                            <ion-icon id="filterCurrentIcon" name="{{ $filterIcons[$currentFilter] ?? 'apps-outline' }}"></ion-icon>
                        </span>

                        <span class="filter-label-text">
                            Lọc theo:
                            <strong id="filterCurrentText">
                                {{ $filterLabels[$currentFilter] ?? 'Tất cả' }}
                            </strong>
                        </span>

                        <ion-icon name="chevron-down-outline" class="filter-chevron"></ion-icon>
                    </button>

                    <div class="filter-menu" id="filterMenu">
                        @foreach($filterLabels as $value => $label)
                            <button
                                type="button"
                                class="filter-option {{ $currentFilter === $value ? 'active' : '' }}"
                                data-value="{{ $value }}"
                                data-label="{{ $label }}"
                                data-icon="{{ $filterIcons[$value] }}"
                                onclick="chooseFilter(this)"
                            >
                                <ion-icon name="{{ $filterIcons[$value] }}"></ion-icon>

                                <span>
                                    <strong>{{ $label }}</strong>
                                    <span>{{ $filterDescriptions[$value] }}</span>
                                </span>
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="search-shell" id="searchShell">
                    <div class="search-input-wrap" onclick="openSearchHistory(event)">
                        <input
                            type="text"
                            name="keyword"
                            id="searchInput"
                            value="{{ request('keyword') }}"
                            placeholder="Tìm khóa học theo tên, nội dung hoặc học phí..."
                            autocomplete="off"
                            onfocus="openSearchHistory(event)"
                        >
                    </div>

                    <div class="history-popover" id="historyPopover" onclick="event.stopPropagation()">
                        <div class="history-head">
                            <div class="history-title">
                                <ion-icon name="time-outline"></ion-icon>
                                Lịch sử tìm kiếm
                            </div>
                        </div>

                        @if(isset($searchHistories) && $searchHistories->count() > 0)
                            <div class="history-list" id="historyList">
                                @foreach($searchHistories as $history)
                                    @php
                                        $historyType = $history->type ?: 'all';
                                    @endphp

                                    <div class="history-row">
                                        <a
                                            href="{{ route('courses.index', [
                                                'keyword' => $history->keyword,
                                                'filter' => $historyType,
                                                'show_history' => 1
                                            ]) }}"
                                            class="history-link"
                                        >
                                            <ion-icon name="search-outline"></ion-icon>

                                            <span class="history-keyword">
                                                {{ $history->keyword }}
                                            </span>

                                            <span class="history-type">
                                                {{ $filterLabels[$historyType] ?? 'Tất cả' }}
                                            </span>
                                        </a>

                                        <button
                                            type="button"
                                            class="history-delete"
                                            title="Xóa lịch sử này"
                                            onclick="deleteSearchHistory(event, '{{ route('search-histories.destroy', $history->id) }}', this)"
                                        >
                                            <ion-icon name="close-outline"></ion-icon>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="history-empty" id="historyEmpty">
                                Chưa có lịch sử tìm kiếm.
                            </div>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn-search">
                    <ion-icon name="search-outline"></ion-icon>
                    Tìm kiếm
                </button>

            </div>
        </form>
    </section>

    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    <section class="course-grid">
        @forelse($courses as $course)
            <article class="course-card">

                <a href="{{ route('courses.show', $course->id) }}" class="course-thumb">
                    <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
                </a>

                <div class="course-body">
                    <h3 class="course-title">
                        <a href="{{ route('courses.show', $course->id) }}">
                            {{ $course->title }}
                        </a>
                    </h3>

                    <p class="course-desc">
                        {{ $course->content }}
                    </p>

                    <div class="price-box">
                        <span class="price-label">Học phí</span>

                        <span class="price-value">
                            {{ number_format($course->price, 0, ',', '.') }} ₫
                        </span>
                    </div>

                    <div class="actions">
                        @if(auth()->user()->role == 'admin')
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn-edit">
                                Sửa
                            </a>

                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('Bạn có chắc muốn xóa khóa học này?')"
                                >
                                    Xóa
                                </button>
                            </form>
                        @else
                            @php
                                $courseUser = $course->courseUsers->first();
                            @endphp

                            @if(!$courseUser)
                                <form action="{{ route('courses.register', $course->id) }}" method="POST">
                                    @csrf

                                    <button type="submit" class="btn-status">
                                        Xin vào học
                                    </button>
                                </form>
                            @elseif($courseUser->status === 'pending')
                                <button class="btn-status pending" disabled>
                                    Đang đợi duyệt
                                </button>
                            @elseif($courseUser->status === 'approved')
                                <button class="btn-status approved" disabled>
                                    Đã được duyệt
                                </button>
                            @endif
                        @endif
                    </div>
                </div>

            </article>
        @empty
            <div class="empty-state">
                Chưa có khóa học nào được tạo.
            </div>
        @endforelse
    </section>

    @if($courses->hasPages())
        <div class="custom-pagination">

            @if($courses->onFirstPage())
                <span class="page-btn disabled">Trước</span>
            @else
                <a href="{{ $courses->previousPageUrl() }}" class="page-btn">Trước</a>
            @endif

            @php
                $current = $courses->currentPage();
                $last = $courses->lastPage();

                $start = max($current - 3, 1);
                $end = min($current + 3, $last);
            @endphp

            @if($start > 1)
                <a href="{{ $courses->url(1) }}" class="page-btn">1</a>

                @if($start > 2)
                    <span class="page-dots">...</span>
                @endif
            @endif

            @for($page = $start; $page <= $end; $page++)
                @if($page == $current)
                    <span class="page-btn active">{{ $page }}</span>
                @else
                    <a href="{{ $courses->url($page) }}" class="page-btn">
                        {{ $page }}
                    </a>
                @endif
            @endfor

            @if($end < $last)
                @if($end < $last - 1)
                    <span class="page-dots">...</span>
                @endif

                <a href="{{ $courses->url($last) }}" class="page-btn">
                    {{ $last }}
                </a>
            @endif

            @if($courses->hasMorePages())
                <a href="{{ $courses->nextPageUrl() }}" class="page-btn">Sau</a>
            @else
                <span class="page-btn disabled">Sau</span>
            @endif

        </div>
    @endif

</main>

</div>

<script>
    function toggleMenu() {
        const menu = document.getElementById('dropdownMenu');

        if (menu) {
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }
    }

    function openSearchHistory(event) {
        if (event) {
            event.stopPropagation();
        }

        const searchShell = document.getElementById('searchShell');
        const filterWrap = document.getElementById('filterWrap');

        if (searchShell) {
            searchShell.classList.add('is-open');
        }

        if (filterWrap) {
            filterWrap.classList.remove('is-open');
        }
    }

    function toggleFilterMenu(event) {
        if (event) {
            event.stopPropagation();
        }

        const filterWrap = document.getElementById('filterWrap');
        const searchShell = document.getElementById('searchShell');

        if (filterWrap) {
            filterWrap.classList.toggle('is-open');
        }

        if (searchShell) {
            searchShell.classList.remove('is-open');
        }
    }

    function chooseFilter(button) {
        const value = button.dataset.value;
        const label = button.dataset.label;
        const icon = button.dataset.icon;

        const filterInput = document.getElementById('filterInput');
        const filterCurrentText = document.getElementById('filterCurrentText');
        const filterCurrentIcon = document.getElementById('filterCurrentIcon');
        const filterWrap = document.getElementById('filterWrap');

        if (filterInput) {
            filterInput.value = value;
        }

        if (filterCurrentText) {
            filterCurrentText.textContent = label;
        }

        if (filterCurrentIcon) {
            filterCurrentIcon.setAttribute('name', icon);
        }

        document.querySelectorAll('.filter-option').forEach(function(item) {
            item.classList.remove('active');
        });

        button.classList.add('active');

        if (filterWrap) {
            filterWrap.classList.remove('is-open');
        }
    }

    async function deleteSearchHistory(event, url, button) {
        event.preventDefault();
        event.stopPropagation();

        const csrfMeta = document.querySelector('meta[name="csrf-token"]');

        if (!csrfMeta) {
            alert('Thiếu CSRF token.');
            return;
        }

        try {
            const response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfMeta.getAttribute('content'),
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) {
                alert('Xóa lịch sử thất bại.');
                openSearchHistory(event);
                return;
            }

            const row = button.closest('.history-row');
            const list = document.getElementById('historyList');

            if (row) {
                row.remove();
            }

            if (list && list.querySelectorAll('.history-row').length === 0) {
                list.outerHTML = `
                    <div class="history-empty" id="historyEmpty">
                        Chưa có lịch sử tìm kiếm.
                    </div>
                `;
            }

            const searchShell = document.getElementById('searchShell');

            if (searchShell) {
                searchShell.classList.add('is-open');
            }

        } catch (error) {
            alert('Có lỗi khi xóa lịch sử.');
            openSearchHistory(event);
        }
    }

    document.addEventListener('click', function(e) {
        const userMenu = e.target.closest('.user-menu');
        const dropdown = document.getElementById('dropdownMenu');

        if (!userMenu && dropdown) {
            dropdown.style.display = 'none';
        }

        const searchShell = document.getElementById('searchShell');
        const filterWrap = document.getElementById('filterWrap');

        if (
            searchShell &&
            !e.target.closest('#searchShell') &&
            !e.target.closest('.history-delete')
        ) {
            searchShell.classList.remove('is-open');
        }

        if (filterWrap && !e.target.closest('#filterWrap')) {
            filterWrap.classList.remove('is-open');
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const shouldOpenHistory = "{{ request('show_history') || session('open_history') ? '1' : '0' }}";

        if (shouldOpenHistory === '1') {
            openSearchHistory();
        }
    });
</script>

@include('components.ai-chat')

</body>
</html>
