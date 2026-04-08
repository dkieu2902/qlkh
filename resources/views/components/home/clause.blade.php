<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điều khoản - TechSchool</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: #111;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* HEADER */
        .navbar {
            height: 60px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ffffff;
        }

        .nav-container {
            width: 1200px;
            max-width: calc(100% - 40px);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: 800;
            font-size: 18px;
        }

        .menu {
            display: flex;
            gap: 10px;
        }

        .menu a {
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .menu a.active {
            background: #e7e7e7;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 32px;
            height: 32px;
            background: #8ea0aa;
            border-radius: 50%;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .theme-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* CONTENT */
        .container {
            width: 800px;
            max-width: calc(100% - 40px);
            margin: 60px auto;
        }

        .container h1 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 25px;
        }

        .container h2 {
            font-size: 20px;
            font-weight: 700;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        .container p {
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 10px;
            color: #222;
        }

        .container ul {
            padding-left: 20px;
            margin-bottom: 10px;
        }

        .container li {
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .highlight {
            font-weight: 700;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="navbar">
        <div class="nav-container">
            <div class="logo">TechSchool</div>

            <div class="menu">
                <a href="/home" class="{{ request()->is('home') ? 'active' : '' }}">Trang chủ</a>
                <a href="/courses" class="{{ request()->is('courses') ? 'active' : '' }}">Khóa học</a>
                <a href="/introduction" class="{{ request()->is('introduction') ? 'active' : '' }}">Giới thiệu</a>
                <a href="/clause" class="{{ request()->is('clause') ? 'active' : '' }}">Điều khoản</a>
            </div>

            <div class="nav-right">
                <div class="avatar">D</div>
                <div class="theme-btn">☀</div>
            </div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <h1>Điều khoản sử dụng</h1>
        <p>
            Bằng việc tiếp tục sử dụng TechSchool, bạn đã đọc và đồng ý với các điều khoản sau:
        </p>

        <h2>1. Giới Thiệu</h2>
        <p>
            <span class="highlight">TechSchool</span> là nền tảng học lập trình trực tuyến dành cho mọi người.
            Sứ mệnh của chúng tôi là mang lại cơ hội học tập dễ tiếp cận, linh hoạt và hiệu quả cho mọi người,
            giúp họ nâng cao kỹ năng, phát triển sự nghiệp.
        </p>

        <h2>2. Điều Khoản Chung</h2>
        <p><span class="highlight">Tài khoản người dùng:</span> Để sử dụng một số tính năng trên TechSchool, bạn cần tạo tài khoản cá nhân. Bạn có trách nhiệm duy trì bảo mật tài khoản và thông tin cá nhân.</p>
        <p><span class="highlight">Nội dung trên trang:</span> TechSchool cung cấp nội dung học tập bao gồm video, tài liệu, mã nguồn và các tài nguyên khác. Mọi tài liệu đều thuộc bản quyền của TechSchool hoặc các đối tác của chúng tôi. Bạn không được sao chép, chia sẻ hoặc sử dụng cho mục đích thương mại mà không có sự cho phép.</p>
        <p><span class="highlight">Hành vi sử dụng:</span> Người dùng không được phép sử dụng trang web cho các hoạt động bất hợp pháp, gây hại hoặc vi phạm quyền lợi của các bên thứ ba. Chúng tôi có quyền xóa tài khoản của bất kỳ người dùng nào có hành vi vi phạm.</p>

        <h2>3. Quyền và Trách Nhiệm</h2>
        <p><span class="highlight">Quyền của TechSchool:</span> Chúng tôi có quyền thay đổi nội dung, giá cả và các dịch vụ trên trang web mà không cần thông báo trước. TechSchool không chịu trách nhiệm về các gián đoạn hoặc lỗi dịch vụ ngoài tầm kiểm soát.</p>
        <p><span class="highlight">Trách nhiệm của người dùng:</span> Bạn đồng ý rằng mọi hoạt động học tập và tương tác trên TechSchool sẽ tuân thủ luật pháp hiện hành và các quy định của trang web.</p>

        <h2>4. Đăng Ký Khóa Học</h2>
        <p>
            Khi đăng ký một khóa học tại TechSchool, bạn sẽ được truy cập nội dung học tập trực tuyến.
            Chi phí khóa học sẽ được nêu rõ trước khi bạn xác nhận mua.
        </p>

        <h2>5. Quyền Sở Hữu Trí Tuệ</h2>
        <p>
            Mọi nội dung bao gồm văn bản, hình ảnh, video, mã nguồn và các tài liệu khác trên TechSchool
            đều thuộc quyền sở hữu trí tuệ của TechSchool hoặc các bên cung cấp.
        </p>

        <h2>6. Thay Đổi Điều Khoản Sử Dụng</h2>
        <p>
            TechSchool có quyền thay đổi các điều khoản sử dụng này vào bất kỳ thời điểm nào.
            Việc tiếp tục sử dụng dịch vụ sau khi có thay đổi đồng nghĩa với việc bạn chấp nhận các điều khoản mới.
        </p>

        <h2>7. Liên Hệ</h2>
        <p>
            Nếu có bất kỳ câu hỏi nào, vui lòng liên hệ:
            <span class="highlight">support@techschool.com</span>
        </p>
    </div>

</body>
</html>
