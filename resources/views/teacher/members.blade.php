<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thành viên khóa học</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.12), transparent 35%),
                linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%);
            color: #0f172a;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 300px;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(18px);
            border-right: 1px solid #e2e8f0;
            padding: 26px 22px;
            box-shadow: 8px 0 30px rgba(15, 23, 42, 0.04);
        }

        .profile-box {
            background: linear-gradient(180deg, #ffffff, #f8fafc);
            border: 1px solid #e2e8f0;
            border-radius: 30px;
            padding: 28px 20px;
            text-align: center;
            margin-bottom: 24px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.07);
        }

        .avatar {
            width: 100px;
            height: 100px;
            margin: 0 auto 18px;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid #eef2ff;
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.2);
            background: #fff;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .teacher-name {
            font-size: 22px;
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.03em;
            word-break: break-word;
        }

        .teacher-role {
            margin-top: 7px;
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .menu a,
        .menu .active-link {
            padding: 15px 18px;
            border-radius: 18px;
            font-size: 15px;
            font-weight: 800;
            transition: all 0.25s ease;
            border: 1px solid #e2e8f0;
        }

        .menu a {
            background: #fff;
            color: #334155;
        }

        .menu a:hover {
            transform: translateY(-1px);
            background: #f8fafc;
            border-color: #bfdbfe;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
        }

        .menu .active-link {
            color: #fff;
            border: none;
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            box-shadow: 0 16px 30px rgba(37, 99, 235, 0.28);
        }

        /* ================= CONTENT ================= */

        .content {
            flex: 1;
            padding: 36px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 24px;
        }

        .eyebrow {
            color: #2563eb;
            font-size: 13px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 8px;
        }

        .topbar h1 {
            font-size: 36px;
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -0.04em;
            color: #0f172a;
        }

        .topbar-desc {
            margin-top: 8px;
            color: #64748b;
            font-size: 15px;
            font-weight: 500;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 12px 18px;
            border-radius: 16px;
            background: #fff;
            border: 1px solid #dbeafe;
            color: #2563eb;
            font-size: 14px;
            font-weight: 900;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .back-link:hover {
            transform: translateY(-1px);
            background: #eff6ff;
        }

        /* ================= COURSE ================= */

        .course-box {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 22px;
            padding: 18px 20px;
            margin-bottom: 20px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.05);
        }

        .course-box strong {
            font-size: 15px;
            color: #0f172a;
            font-weight: 900;
        }

        .course-title {
            color: #2563eb;
            font-weight: 900;
            margin-left: 4px;
        }

        /* ================= ALERT ================= */

        .message {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 14px 16px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        /* ================= CARD ================= */

        .card {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #e2e8f0;
            border-radius: 30px;
            padding: 26px;
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.08);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 22px;
        }

        .card-header h2 {
            font-size: 24px;
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.03em;
        }

        .card-header p {
            margin-top: 6px;
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
        }

        .badge {
            background: #eef2ff;
            color: #3730a3;
            border: 1px solid #e0e7ff;
            padding: 9px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 900;
            white-space: nowrap;
        }

        /* ================= TABLE ================= */

        .table-wrap {
            width: 100%;
            overflow-x: auto;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            background: #fff;
        }

        table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            color: #475569;
            padding: 16px;
            text-align: left;
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 18px 16px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
        }

        tbody tr {
            transition: all 0.2s ease;
        }

        tbody tr:hover td {
            background: #f8fafc;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .index-cell {
            color: #64748b;
            font-weight: 900;
        }

        .student-name {
            font-size: 15px;
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.01em;
        }

        .date-text {
            color: #475569;
            font-weight: 700;
            white-space: nowrap;
        }

        /* ================= BUTTON ================= */

        .btn-delete {
            min-height: 40px;
            padding: 10px 16px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #dc2626, #ef4444);
            color: #fff;
            font-size: 14px;
            font-weight: 900;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 10px 20px rgba(220, 38, 38, 0.2);
        }

        .btn-delete:hover {
            transform: translateY(-1px);
            filter: brightness(0.98);
        }

        .empty {
            text-align: center;
            padding: 40px 20px;
            color: #64748b;
            font-size: 15px;
            font-weight: 700;
        }

        form {
            display: inline;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
            }

            .content {
                padding: 22px;
            }

            .topbar {
                flex-direction: column;
            }

            .topbar h1 {
                font-size: 30px;
            }

            .back-link {
                width: 100%;
            }

            .card {
                padding: 20px;
            }

            .card-header {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="layout">

        <aside class="sidebar">

            <div class="profile-box">

                <div class="avatar">
                    <img src="{{ asset('images/teacher.webp') }}" alt="Teacher Avatar">
                </div>

                <div class="teacher-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="teacher-role">
                    Tài khoản giảng viên
                </div>

            </div>

            <div class="menu">

                <a href="{{ route('teacher.dashboard') }}">
                    Yêu cầu vào học
                </a>

                <a href="{{ route('teacher.dashboard') }}">
                    Thống kê khóa học
                </a>

                <div class="active-link">
                    Thành viên khóa học
                </div>

            </div>

        </aside>

        <main class="content">

            <div class="topbar">

                <div>

                    <div class="eyebrow">
                        Course Members
                    </div>

                    <h1>
                        Thành viên khóa học
                    </h1>

                    <p class="topbar-desc">
                        Quản lý danh sách học viên đã được duyệt tham gia khóa học.
                    </p>

                </div>

                <a href="{{ route('teacher.dashboard') }}" class="back-link">
                    Quay lại trang teacher
                </a>

            </div>

            <div class="course-box">

                <strong>Khóa học:</strong>

                <span class="course-title">
                    {{ $course->title }}
                </span>

            </div>

            @if(session('success'))
                <div class="message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">

                <div class="card-header">

                    <div>

                        <h2>
                            Danh sách thành viên
                        </h2>

                        <p>
                            Theo dõi học viên đã được duyệt và ngày tham gia khóa học.
                        </p>

                    </div>

                    <div class="badge">
                        Thành viên đã duyệt
                    </div>

                </div>

                <div class="table-wrap">

                    <table>

                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên học sinh</th>
                                <th>Ngày vào học</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($members as $index => $member)

                                <tr>

                                    <td class="index-cell">
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        <div class="student-name">
                                            {{ $member->user->name }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="date-text">
                                            {{ $member->updated_at->format('d/m/Y H:i') }}
                                        </span>
                                    </td>

                                    <td>
                                        <form action="{{ route('teacher.member.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Xóa học sinh này khỏi khóa học?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-delete">
                                                Xóa
                                            </button>

                                        </form>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="4" class="empty">
                                        Khóa học này chưa có thành viên nào.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>

</body>

</html>
