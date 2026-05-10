<!DOCTYPE html>
<html lang="vi">
<head>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <meta charset="UTF-8">
    <title>Chi tiết khóa học</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        .user-menu {
    position: relative;
}
.user-menu .dropdown {
    position: absolute;
    top: 120%;
    right: 0;
}
.hidden {
    display: none;
}
        #gioi-thieu{
            padding: 1.5rem;
        }
        #gioi-thieu p{
            margin-bottom: 2rem;
            line-height: 2rem;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f6f6f6;
            margin: 0;
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
            padding: 40px;
            margin: auto;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .card-0{
            background: white;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }
        .card-1{
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .card h1{
            padding-left: 3rem;
            font-size: 2rem;
            font-weight: 600;
        }
        #id-img{
            margin: auto;
              width: 50rem;
  height: 25rem;
  overflow: hidden;
        }
        #id-img img {
              width: 100%;
  height: 100%;
  object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .btn {
            width: 15rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            padding: 10px 16px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            border: none;
            cursor: pointer;
        }
        .btn-disabled {
    background: #9ca3af;
    color: #e5e7eb;
    cursor: not-allowed;
    opacity: 0.6;
    pointer-events: none;
}
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .success {
            color: green;
            margin-bottom: 12px;
        }
        .error {
            color: red;
            margin-bottom: 12px;
        }
        .menu-btn {
    background: none;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}
        .video-table th:first-child,
.video-table td:first-child,
.video-table th:last-child,
.video-table td:last-child {
    text-align: center;
    vertical-align: middle;
}
.video-table {
    width: 100%;
    border-collapse: collapse;
    overflow: visible;
}
.video-table thead {
    background: #93a9d9;
    color: white;
}
.video-table th {
    font-weight: 600;
}
.video-table tr {
    transition: 0.2s;
}
.video-table tbody tr:hover {
    background: #f3f4f6;
}
.video-table th, .video-table td {
    border: 1px solid #ddd;
    padding: 8px;
    max-width: 200px;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.text {
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
}

.edit-input {
    width: 100%;
    height: 100%;
    border: none;
    outline: none;
    background: transparent;
    padding: 0;
    margin: 0;
    font-size: inherit;
}

textarea.edit-input {
    resize: none;
}

.hidden {
    display: none;
}

.action-menu {
    position: relative;
    display: flex;
    justify-content: center;
}
.dropdown {
    position: absolute;
    right: 0;
    top: 110%;
    background: white;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
    z-index: 9999;
    min-width: 140px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    overflow: hidden;
}
.dropdown ion-icon {
    font-size: 16px;
}
.dropdown .view { color: #2563eb; }
.dropdown .edit { color: #f59e0b; }
.dropdown .delete { color: #ef4444; }
td {
    position: relative;
}

.dropdown a,
.dropdown button {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px;
    width: 100%;
    border: none;
    background: none;
    cursor: pointer;
    font-size: 14px;
}

.dropdown a:hover,
.dropdown button:hover {
    background: #f3f4f6;
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
        .save-cancel-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.icon-action-wrap {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-action-btn {
    width: 38px;
    height: 38px;
    border: none;
    border-radius: 10px;
    background: #f3f4f6;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.2s;
}

.icon-action-btn ion-icon {
    font-size: 24px;
}

.icon-action-btn.save {
    color: #16a34a;
}

.icon-action-btn.cancel {
    color: #dc2626;
}

.icon-action-btn:hover {
    background: #e5e7eb;
    transform: translateY(-1px);
}

.action-tooltip {
    position: absolute;
    top: 115%;
    left: 50%;
    transform: translateX(-50%);
    background: #111827;
    color: white;
    font-size: 13px;
    padding: 6px 10px;
    border-radius: 6px;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    z-index: 99999;
    box-shadow: 0 6px 16px rgba(0,0,0,0.18);
}

.icon-action-wrap:hover .action-tooltip {
    opacity: 1;
    visibility: visible;
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
    <div class="avatar" onclick="toggleUserMenu(event)">
        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
    </div>

    <div id="dropdownMenu" class="dropdown hidden">
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
    @php
    $isApproved = auth()->check() && \Illuminate\Support\Facades\DB::table('course_user')
        ->where('user_id', auth()->id())
        ->where('course_id', $course->id)
        ->where('status', 'approved')
        ->exists();
@endphp
<div class="container">
    <div class="card">
        <h1>{{ $course->title }}</h1>
        <div id="id-img">
            <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
        </div>



        <hr style="margin: 25px 0;">
        @if(auth()->check() && auth()->user()->role === 'admin')
        <h2>Danh sách video bài học</h2>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if($course->videos->count() > 0)
            <table class="video-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Đường dẫn</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($course->videos as $index => $video)
                        <tr id="row-{{ $video->id }}">
                            <td>{{ $index + 1 }}</td>

                            {{-- TITLE --}}
                            <td>
                                <span class="text" id="title-text-{{ $video->id }}">{{ $video->title }}</span>
                                <input class="edit-input hidden" id="title-input-{{ $video->id }}" value="{{ $video->title }}">
                            </td>

                            {{-- CONTENT --}}
                            <td>
                                <span class="text" id="content-text-{{ $video->id }}">{{ $video->content }}</span>
                                <textarea class="edit-input hidden" id="content-input-{{ $video->id }}">{{ $video->content }}</textarea>
                            </td>

                            {{-- URL --}}
                            <td>
                                <span class="text" id="url-text-{{ $video->id }}">{{ $video->video_url }}</span>
                                <input class="edit-input hidden" id="url-input-{{ $video->id }}" value="{{ $video->video_url }}">
                            </td>

                            {{-- ACTION --}}
                            <td>
                                <div class="action-menu"  id="action-{{ $video->id }}">
                                    <button onclick="toggleMenu({{ $video->id }})" class="menu-btn" id="btn-{{ $video->id }}">
                                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </button>

                                    <div class="dropdown hidden" id="menu-{{ $video->id }}">
                                        <a href="{{ route('videos.watch', [$course->id, $video->id]) }}" class="view">
                                            <ion-icon name="eye-outline"></ion-icon> Xem
                                        </a>

                                        <button onclick="editVideo({{ $video->id }})" class="edit">
                                            <ion-icon name="construct-outline"></ion-icon> Sửa
                                        </button>

                                        <form action="{{ route('videos.destroy', $video->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete">
                                                <ion-icon name="trash-outline"></ion-icon> Xóa
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Chưa có video nào trong khóa học này.</p>
        @endif
        @endif

        @if(auth()->check() && auth()->user()->role === 'user')
        <div id="gioi-thieu">
            <p>
                Nếu học viên đã học sơ qua về lập trình web, khóa học này là cơ hội để hệ thống hóa kiến thức, học lại một cách bài bản, bù các kiến thức bị thiếu. Bởi vì chỉ cần "một cuốn sách, một người thầy" là đủ.
            </p>
            <p>
                Khóa học cung cấp các kiến thức căn bản để học viên có thể đi làm được ở vị trí fullstack web developer. Học viên học được cách làm việc nhóm, giải quyết vấn đề, hiểu được quy trình, công cụ làm việc như trong thực tế.
            </p>
            <p>
                Khóa học dành cho các học viên có kiến thức lập trình căn bản, quyết tâm học để đi làm.
            </p>
            <p>
                Học viên có một người mentor bên cạnh, như một người bạn, sẵn sàng chia sẻ định hướng để phát triển bản thân trong ngành lập trình.
            </p>
            <h3>Phương thức học:</h3>
            <p>
                Học trực tuyến yêu cầu học viên phải kết nối và xem live stream bài giảng, trao đổi trực tiếp với giảng viên. Sau khi học live stream, các học viên có video để xem lại bất kỳ lúc nào. Học viên phải làm bài tập được giao một cách đầy đủ.
            </p>
            <h3>Thời gian học:</h3>
            <p>
                Mỗi tuần 3 buổi vào các tối thứ 2, thứ 4 và thứ 6, mỗi buổi khoảng 2 tiếng.
            </p>
            <p>
                Với lượng kiến thức cần truyền tải là rất lớn, tổng thời gian khóa học dự kiến là 11 tháng, thời gian này có thể bị kéo dài ra nếu học viên vẫn chưa tiếp thu đủ kiến thức.
            </p>
        </div>
        @endif
    </div>
    <div>
        <div class="card-0">
            <p>Giáo viên: Lã Dương Kiêu</p>
            <p><strong>Học phí:</strong> {{ number_format($course->price, 0, ',', '.') }}đ</p>
            <div class="card-1">
                <ion-icon name="checkmark-outline"></ion-icon>
                <p>Đăng ký một lần, học trọn đời</p>
            </div>
            <div class="card-1">
                <ion-icon name="checkmark-outline"></ion-icon>
                <p>Nộp và xem đánh giá bài tập của giáo viên</p>
            </div>
            <div class="card-1">
                <ion-icon name="checkmark-outline"></ion-icon>
                <p>Truy cập bài viết dành cho học viên</p>
            </div>
            <div class="card-1">
                <ion-icon name="checkmark-outline"></ion-icon>
                <p>Nhận hỏi đáp và hỗ trợ</p>
            </div>

@if(auth()->check() && auth()->user()->role === 'admin')
    <a href="{{ route('videos.learn', $course->id) }}" class="btn">Vào học</a>

@elseif(auth()->check() && auth()->user()->role === 'user')
    @if($isApproved)
        <a href="{{ route('videos.learn', $course->id) }}" class="btn">Vào học</a>
    @else
        <span class="btn btn-disabled">Vào học</span>
    @endif
@endif
        </div>
        <div>
            @if(auth()->check() && auth()->user()->role === 'admin')
            <div class="card">
                <h2>Thêm video mới</h2>

                @if($errors->any())
                    <div class="error">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('videos.store', $course->id) }}" method="POST">
                    @csrf

                    <label>Tiêu đề video</label>
                    <input type="text" name="title">

                    <label>Nội dung video</label>
                    <textarea name="content" rows="4"></textarea>

                    <label>Link video</label>
                    <input type="text" name="video_url" placeholder="https://www.youtube.com/embed/xxxx">

                    <button type="submit" class="btn">Thêm video</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
<script>
function toggleMenu(id) {
    document.getElementById('menu-' + id).classList.toggle('hidden');
}

function editVideo(id) {
    // ẩn text
    document.getElementById('title-text-' + id).classList.add('hidden');
    document.getElementById('content-text-' + id).classList.add('hidden');
    document.getElementById('url-text-' + id).classList.add('hidden');

    // hiện input
    document.getElementById('title-input-' + id).classList.remove('hidden');
    document.getElementById('content-input-' + id).classList.remove('hidden');
    document.getElementById('url-input-' + id).classList.remove('hidden');

    // đổi action thành LƯU + HỦY
    document.getElementById('action-' + id).innerHTML = `
    <div class="save-cancel-actions">
        <div class="icon-action-wrap">
            <button onclick="saveVideo(${id})" class="icon-action-btn save">
                <ion-icon name="save-outline"></ion-icon>
            </button>
            <div class="action-tooltip">Lưu</div>
        </div>

        <div class="icon-action-wrap">
            <button onclick="cancelEdit(${id})" class="icon-action-btn cancel">
                <ion-icon name="close-circle-outline"></ion-icon>
            </button>
            <div class="action-tooltip">Hủy</div>
        </div>
    </div>
`;
}
function cancelEdit(id) {
    location.reload();
}
let isSaving = false;

function saveVideo(id) {
    if (isSaving) return;
    isSaving = true;

    fetch(`/videos/${id}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            _method: 'PUT',
            title: document.getElementById('title-input-' + id).value,
            content: document.getElementById('content-input-' + id).value,
            video_url: document.getElementById('url-input-' + id).value
        })
    })
    .then(res => {
        console.log("STATUS:", res.status);
        location.reload();
    })
    .catch(err => {
        console.error(err);
        isSaving = false;
    });
}
document.addEventListener('click', function (e) {
    // lấy tất cả menu đang mở
    const menus = document.querySelectorAll('.dropdown');

    menus.forEach(menu => {
        // nếu click KHÔNG nằm trong action-menu
        if (!menu.parentElement.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
});
function toggleMenu2(e) {
    e.stopPropagation(); // 🧠 chặn không cho event nổi bọt lên
    const menu = document.getElementById('dropdownMenu');
    menu.classList.toggle('hidden');
}
function toggleUserMenu(e) {
    e.stopPropagation();

    const menu = document.getElementById('dropdownMenu');
    menu.classList.toggle('hidden');
}

</script>

</body>
</html>
