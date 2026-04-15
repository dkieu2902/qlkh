<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thành viên khóa học</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #111;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            background: #fff;
            border-right: 1px solid #ddd;
            padding: 30px 20px;
        }

        .profile-box {
            text-align: center;
            margin-bottom: 30px;
        }

        .avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: #111;
            margin: 0 auto 15px;
        }

        .teacher-name {
            font-size: 20px;
            font-weight: 700;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .menu a,
        .menu .active-link {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            text-align: left;
            font-size: 15px;
            font-weight: 600;
            display: block;
        }

        .menu a {
            background: #e5e7eb;
        }

        .menu .active-link {
            background: #111;
            color: #fff;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .topbar h1 {
            font-size: 28px;
        }

        .sub-title {
            margin-bottom: 18px;
            color: #444;
        }

        .message {
            background: #dcfce7;
            color: #166534;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        .card {
            background: #fff;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.06);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #f9fafb;
        }

        .btn-delete {
            background: #dc2626;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #666;
        }

        .back-link {
            color: #2563eb;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="profile-box">
                <div class="avatar"></div>
                <div class="teacher-name">{{ auth()->user()->name }}</div>
            </div>

            <div class="menu">
                <a href="{{ route('teacher.dashboard') }}">User xin vào học</a>
                <a href="{{ route('teacher.dashboard') }}">Thống kê khóa học</a>
                <div class="active-link">Thành viên khóa học</div>
            </div>
        </aside>

        <main class="content">
            <div class="topbar">
                <h1>Thành viên khóa học</h1>
                <a href="{{ route('teacher.dashboard') }}" class="back-link">Quay lại trang teacher</a>
            </div>

            <div class="sub-title">
                <strong>Khóa học:</strong> {{ $course->title }}
            </div>

            @if(session('success'))
                <div class="message">{{ session('success') }}</div>
            @endif

            <div class="card">
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
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $member->user->name }}</td>
                                <td>{{ $member->updated_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('teacher.member.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Xóa học sinh này khỏi khóa học?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty">Khóa học này chưa có thành viên nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
