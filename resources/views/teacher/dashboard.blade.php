<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Teacher</title>
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
    margin: 0 auto 15px;
    overflow: hidden;
    border: 2px solid #e5e7eb;
    background: #fff;
}

.avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
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

        .menu button,
        .menu a,
        .menu .disabled-link {
            width: 100%;
            padding: 12px 14px;
            border: none;
            background: #e5e7eb;
            border-radius: 10px;
            text-align: left;
            font-size: 15px;
            cursor: pointer;
            font-weight: 600;
        }

        .menu button.active {
            background: #111;
            color: #fff;
        }

        .menu .disabled-link {
            background: #f1f5f9;
            color: #888;
            cursor: not-allowed;
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

        .back-link {
            color: #2563eb;
            font-weight: 600;
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

        .tab-panel {
            display: none;
        }

        .tab-panel.active {
            display: block;
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
            font-size: 14px;
        }

        .status-pending {
            color: #d97706;
            font-weight: 700;
        }

        .status-approved {
            color: #16a34a;
            font-weight: 700;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-approve {
            background: #111;
            color: #fff;
        }

        .btn-delete {
            background: #dc2626;
            color: #fff;
        }

        .btn-view {
            display: inline-block;
            background: #2563eb;
            color: #fff;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 600;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #666;
        }

        .action-group {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="profile-box">
                <div class="avatar">
                    <img src="{{ asset('images/teacher.webp') }}" alt="avatar">
                </div>
                <div class="teacher-name">{{ auth()->user()->name }}</div>
            </div>

            <div class="menu">
                <button class="tab-btn active" onclick="showTab('tab1', this)">Yêu cầu vào học</button>
                <button class="tab-btn" onclick="showTab('tab2', this)">Thống kê khóa học</button>
                <div class="disabled-link">Thành viên khóa học</div>
            </div>
        </aside>

        <main class="content">
            <div class="topbar">
                <h1>Quản lý giảng viên</h1>
                <a href="{{ route('courses.index') }}" class="back-link">Quay lại khóa học</a>
            </div>

            @if(session('success'))
                <div class="message">{{ session('success') }}</div>
            @endif

            <div id="tab1" class="tab-panel active">
                <div class="card">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khóa học</th>
                                <th>Tên người xin vào</th>
                                <th>Trạng thái</th>
                                <th>Duyệt</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requests as $index => $request)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $request->course->title }}</td>
                                    <td>{{ $request->user->name }}</td>
                                    <td>
                                        @if($request->status === 'approved')
                                            <span class="status-approved">Đã duyệt</span>
                                        @else
                                            <span class="status-pending">Chưa duyệt</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($request->status === 'pending')
                                            <form action="{{ route('teacher.approve', $request->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-approve">Duyệt</button>
                                            </form>
                                        @else
                                            <span>Đã duyệt</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('teacher.request.destroy', $request->id) }}" method="POST" onsubmit="return confirm('Xóa yêu cầu này?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty">Chưa có yêu cầu xin vào học nào.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="tab2" class="tab-panel">
                <div class="card">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khóa học</th>
                                <th>Số thành viên</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($courses as $index => $course)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->approved_members_count }}</td>
                                    <td>
                                        <a href="{{ route('teacher.members', $course->id) }}" class="btn-view">Xem thành viên</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="empty">Bạn chưa có khóa học nào.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        function showTab(tabId, btn) {
            document.querySelectorAll('.tab-panel').forEach(tab => {
                tab.classList.remove('active');
            });

            document.querySelectorAll('.tab-btn').forEach(button => {
                button.classList.remove('active');
            });

            document.getElementById(tabId).classList.add('active');
            btn.classList.add('active');
        }
    </script>
</body>
</html>
