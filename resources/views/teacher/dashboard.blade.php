<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Teacher</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(59, 130, 246, 0.14), transparent 34%),
                linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%);
            color: #0f172a;
            line-height: 1.6;
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

        .sidebar {
            width: 290px;
            height: 100vh;
            position: sticky;
            top: 0;
            padding: 26px 22px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(18px);
            border-right: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: 8px 0 30px rgba(15, 23, 42, 0.04);
        }

        .profile-box {
            padding: 24px 18px;
            margin-bottom: 24px;
            text-align: center;
            border-radius: 28px;
            background: linear-gradient(180deg, #ffffff, #f8fafc);
            border: 1px solid #e2e8f0;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.07);
        }

        .avatar {
            width: 94px;
            height: 94px;
            margin: 0 auto 16px;
            border-radius: 50%;
            overflow: hidden;
            background: #ffffff;
            border: 5px solid #eef2ff;
            box-shadow: 0 14px 28px rgba(37, 99, 235, 0.2);
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .teacher-name {
            font-size: 20px;
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.03em;
            word-break: break-word;
        }

        .teacher-role {
            margin-top: 6px;
            font-size: 13px;
            font-weight: 700;
            color: #64748b;
            letter-spacing: 0.02em;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .menu button,
        .menu .disabled-link {
            width: 100%;
            padding: 14px 16px;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #334155;
            font-size: 15px;
            font-weight: 800;
            text-align: left;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .menu button:hover {
            transform: translateY(-1px);
            border-color: #bfdbfe;
            background: #f8fafc;
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.08);
        }

        .menu button.active {
            color: #ffffff;
            border-color: transparent;
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            box-shadow: 0 16px 32px rgba(37, 99, 235, 0.28);
        }

        .menu .disabled-link {
            color: #94a3b8;
            background: #f1f5f9;
            cursor: not-allowed;
        }

        .content {
            flex: 1;
            padding: 36px;
            overflow: hidden;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 24px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            margin-bottom: 6px;
            color: #2563eb;
            font-size: 13px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .topbar h1 {
            font-size: 34px;
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.045em;
            line-height: 1.15;
        }

        .topbar-desc {
            margin-top: 6px;
            font-size: 15px;
            color: #64748b;
            font-weight: 500;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            padding: 12px 18px;
            border-radius: 16px;
            background: #ffffff;
            color: #2563eb;
            border: 1px solid #dbeafe;
            font-size: 14px;
            font-weight: 900;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .back-link:hover {
            transform: translateY(-1px);
            background: #eff6ff;
            box-shadow: 0 14px 28px rgba(37, 99, 235, 0.12);
        }

        .message {
            margin-bottom: 20px;
            padding: 14px 16px;
            border-radius: 16px;
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            font-weight: 800;
        }

        .tab-panel {
            display: none;
        }

        .tab-panel.active {
            display: block;
        }

        .card {
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(226, 232, 240, 0.95);
            border-radius: 28px;
            padding: 24px;
            box-shadow: 0 22px 55px rgba(15, 23, 42, 0.08);
        }

        .card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 20px;
        }

        .card-header h2 {
            font-size: 22px;
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.035em;
        }

        .card-header p {
            margin-top: 5px;
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
        }

        .badge {
            padding: 8px 13px;
            border-radius: 999px;
            background: #eef2ff;
            color: #3730a3;
            font-size: 13px;
            font-weight: 900;
            white-space: nowrap;
            border: 1px solid #e0e7ff;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
            border-radius: 22px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
        }

        table {
            width: 100%;
            min-width: 820px;
            border-collapse: collapse;
            background: #ffffff;
        }

        th {
            padding: 15px 16px;
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            font-weight: 900;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.055em;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        td {
            padding: 16px;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr {
            transition: background 0.22s ease;
        }

        tbody tr:hover td {
            background: #f8fafc;
        }

        .index-cell {
            color: #64748b;
            font-weight: 900;
        }

        .course-title,
        .user-name {
            max-width: 280px;
            color: #0f172a;
            font-weight: 850;
            letter-spacing: -0.01em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-name {
            color: #1e293b;
        }

        .status-pending,
        .status-approved {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 32px;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 900;
            white-space: nowrap;
        }

        .status-pending {
            color: #92400e;
            background: #fef3c7;
            border: 1px solid #fde68a;
        }

        .status-approved {
            color: #166534;
            background: #dcfce7;
            border: 1px solid #bbf7d0;
        }

        .approved-text {
            display: inline-flex;
            align-items: center;
            min-height: 34px;
            color: #16a34a;
            font-size: 14px;
            font-weight: 900;
            white-space: nowrap;
        }

        .btn,
        .btn-view {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 38px;
            padding: 9px 14px;
            border: none;
            border-radius: 13px;
            color: #ffffff;
            font-size: 14px;
            font-weight: 900;
            cursor: pointer;
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .btn:hover,
        .btn-view:hover {
            transform: translateY(-1px);
            filter: brightness(0.98);
        }

        .btn-approve {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            box-shadow: 0 9px 18px rgba(22, 163, 74, 0.22);
        }

        .btn-delete {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            box-shadow: 0 9px 18px rgba(220, 38, 38, 0.18);
        }

        .btn-view {
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            box-shadow: 0 9px 18px rgba(37, 99, 235, 0.22);
        }

        .empty {
            padding: 36px 18px;
            text-align: center;
            color: #64748b;
            font-size: 15px;
            font-weight: 700;
        }

        form {
            display: inline;
        }

        @media (max-width: 900px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 20px;
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
            }

            .profile-box {
                margin-bottom: 18px;
            }

            .content {
                padding: 22px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .topbar h1 {
                font-size: 28px;
            }

            .back-link {
                width: 100%;
            }

            .card {
                padding: 18px;
                border-radius: 24px;
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
                    <img src="{{ asset('images/teacher.webp') }}" alt="avatar">
                </div>

                <div class="teacher-name">{{ auth()->user()->name }}</div>
                <div class="teacher-role">Tài khoản giảng viên</div>
            </div>

            <div class="menu">
                <button class="tab-btn active" onclick="showTab('tab1', this)">
                    Yêu cầu vào học
                </button>

                <button class="tab-btn" onclick="showTab('tab2', this)">
                    Thống kê khóa học
                </button>

                <div class="disabled-link">
                    Thành viên khóa học
                </div>
            </div>
        </aside>

        <main class="content">
            <div class="topbar">
                <div>
                    <div class="eyebrow">Teacher Dashboard</div>
                    <h1>Quản lý giảng viên</h1>
                    <p class="topbar-desc">
                        Theo dõi yêu cầu vào học, trạng thái duyệt và số lượng thành viên trong từng khóa học.
                    </p>
                </div>

                <a href="{{ route('courses.index') }}" class="back-link">
                    Quay lại khóa học
                </a>
            </div>

            @if(session('success'))
                <div class="message">
                    {{ session('success') }}
                </div>
            @endif

            <div id="tab1" class="tab-panel active">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h2>Yêu cầu xin vào học</h2>
                            <p>Danh sách học viên đang chờ giảng viên xét duyệt vào khóa học.</p>
                        </div>

                        <div class="badge">
                            Quản lý yêu cầu
                        </div>
                    </div>

                    <div class="table-wrap">
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
                                        <td class="index-cell">
                                            {{ $index + 1 }}
                                        </td>

                                        <td>
                                            <div class="course-title" title="{{ $request->course->title }}">
                                                {{ $request->course->title }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="user-name" title="{{ $request->user->name }}">
                                                {{ $request->user->name }}
                                            </div>
                                        </td>

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
                                                    <button type="submit" class="btn btn-approve">
                                                        Duyệt
                                                    </button>
                                                </form>
                                            @else
                                                <span class="approved-text">Đã duyệt</span>
                                            @endif
                                        </td>

                                        <td>
                                            <form action="{{ route('teacher.request.destroy', $request->id) }}" method="POST" onsubmit="return confirm('Xóa yêu cầu này?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-delete">
                                                    Xóa
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="empty">
                                            Chưa có yêu cầu xin vào học nào.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="tab2" class="tab-panel">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h2>Thống kê khóa học</h2>
                            <p>Kiểm tra số lượng thành viên đã được duyệt trong từng khóa học.</p>
                        </div>

                        <div class="badge">
                            Thống kê
                        </div>
                    </div>

                    <div class="table-wrap">
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
                                        <td class="index-cell">
                                            {{ $index + 1 }}
                                        </td>

                                        <td>
                                            <div class="course-title" title="{{ $course->title }}">
                                                {{ $course->title }}
                                            </div>
                                        </td>

                                        <td>
                                            <span class="status-approved">
                                                {{ $course->approved_members_count }} thành viên
                                            </span>
                                        </td>

                                        <td>
                                            <a href="{{ route('teacher.members', $course->id) }}" class="btn-view">
                                                Xem thành viên
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="empty">
                                            Bạn chưa có khóa học nào.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
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
