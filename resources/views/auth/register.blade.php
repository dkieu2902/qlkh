<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            position: relative;
            overflow: hidden;
            background: #f3f4f6;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(rgba(255,255,255,0.35), rgba(255,255,255,0.35)),
                url('{{ asset('images/login-bg.jpg') }}') center/cover no-repeat;
            opacity: 0.8;
            z-index: -2;
        }

        body::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0,123,255,0.08), rgba(17,17,17,0.08));
            z-index: -1;
        }

        .container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        .left-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .left-side .welcome-box {
            max-width: 520px;
            color: #1f2937;
            background: rgba(255,255,255,0.45);
            backdrop-filter: blur(8px);
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .welcome-box h1 {
            font-size: 42px;
            margin-bottom: 14px;
            color: #007bff;
        }

        .welcome-box p {
            font-size: 17px;
            line-height: 1.7;
            color: #374151;
        }

        .right-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 24px;
        }

        .form-container {
            width: 100%;
            max-width: 460px;
            background: rgba(255,255,255,0.94);
            backdrop-filter: blur(10px);
            border-radius: 22px;
            padding: 32px 28px;
            box-shadow: 0 14px 40px rgba(0,0,0,0.12);
        }

        .logo-box {
            text-align: center;
            margin-bottom: 24px;
        }

        .logo-box .logo-circle {
            width: 70px;
            height: 70px;
            margin: 0 auto 12px;
            border-radius: 50%;
            background: linear-gradient(135deg, #007bff, #00c6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
            box-shadow: 0 8px 18px rgba(0,123,255,0.25);
        }

        .logo-box h2 {
            font-size: 30px;
            color: #1f2937;
            margin-bottom: 6px;
        }

        .logo-box p {
            color: #6b7280;
            font-size: 14px;
        }



        .input-group {
            position: relative;
            margin-bottom: 22px;
        }

        .input-group input {
            width: 100%;
            padding: 14px 12px;
            border: 2px solid #d1d5db;
            border-radius: 10px;
            outline: none;
            transition: 0.25s ease;
            background: #fff;
            font-size: 15px;
        }

        .input-group input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 4px rgba(0,123,255,0.08);
        }

        .input-group input.is-invalid {
            border-color: #dc2626;
        }

        .input-group label {
            position: absolute;
            left: 12px;
            top: 14px;
            background: #fff;
            color: #6b7280;
            padding: 0 6px;
            pointer-events: none;
            transition: 0.2s ease;
            font-size: 14px;
        }

        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            top: -9px;
            font-size: 12px;
            color: #007bff;
        }

        .error,
        .invalid-feedback {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
            display: block;
            line-height: 1.5;
        }

        .btn {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.25s ease;
            margin-top: 6px;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(0,123,255,0.22);
        }

        .login-link {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
            color: #4b5563;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            .left-side {
                display: none;
            }

            .right-side {
                flex: 1 1 100%;
            }

            .form-container {
                max-width: 500px;
            }
        }

        @media (max-width: 520px) {
            .form-container {
                padding: 26px 18px;
                border-radius: 18px;
            }

            .logo-box h2 {
                font-size: 26px;
            }

        }
        .brand {
    position: absolute;
    top: 24px;
    left: 32px;
    z-index: 10;
    text-decoration: none;
    font-size: 30px;
    font-weight: 800;
    color: #007bff;
    letter-spacing: 0.5px;
    text-shadow: 0 4px 12px rgba(0, 123, 255, 0.18);
    transition: 0.25s ease;
}

.brand:hover {
    color: #0056b3;
    transform: translateY(-1px);
}

@media (max-width: 520px) {
    .brand {
        top: 18px;
        left: 20px;
        font-size: 24px;
    }
}
    </style>
</head>
<body>
    <a href="" class="brand">TechSchool</a>
    <div class="container">
        <div class="left-side">
            <div class="welcome-box">
                <h1>Tạo tài khoản mới</h1>
                <p>
                    Đăng ký để bắt đầu sử dụng hệ thống, quản lý học tập và trải nghiệm
                    đầy đủ các chức năng dành cho bạn.
                </p>
            </div>
        </div>

        <div class="right-side">
            <form class="form-container" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="logo-box">
                    <div class="logo-circle">R</div>
                    <h2>Đăng ký</h2>
                    <p>Điền thông tin để tạo tài khoản mới</p>
                </div>


                <div class="input-group">
                    <input
                        class="@error('name') is-invalid @enderror"
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        placeholder=" "
                    >
                    <label for="name">Họ tên</label>
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <input
                        class="@error('email') is-invalid @enderror"
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        placeholder=" "
                    >
                    <label for="email">Email</label>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <input
                        class="@error('password') is-invalid @enderror"
                        type="password"
                        id="password"
                        name="password"
                        required
                        placeholder=" "
                    >
                    <label for="password">Mật khẩu</label>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        placeholder=" "
                    >
                    <label for="password_confirmation">Nhập lại mật khẩu</label>
                </div>

                <button type="submit" class="btn">Đăng ký</button>

                <div class="login-link">
                    Đã có tài khoản?
                    <a href="{{ route('login') }}">Đăng nhập ngay</a>
                </div>
            </form>
        </div>
    </div>


</body>
</html>
