<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

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
            max-width: 500px;
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
            max-width: 430px;
            background: rgba(255,255,255,0.92);
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

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 18px;
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

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
            padding-left: 2px;
        }

        .remember-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            gap: 12px;
            flex-wrap: wrap;
        }

        .remember {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #374151;
        }

        .remember input {
            margin-right: 8px;
        }

        .forgot-link {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
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
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(0,123,255,0.22);
        }

        .links {
            margin-top: 18px;
            text-align: center;
            font-size: 14px;
            color: #4b5563;
        }

        .links a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .links a:hover {
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
                max-width: 460px;
            }
        }

        @media (max-width: 480px) {
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
                <h1>Chào mừng trở lại</h1>
                <p>
                    Đăng nhập để tiếp tục học tập, quản lý khóa học và theo dõi tiến độ của bạn
                    trên hệ thống.
                </p>
            </div>
        </div>

        <div class="right-side">
            <div class="form-container">
                <div class="logo-box">
                    <div class="logo-circle">L</div>
                    <h2>Đăng nhập</h2>
                    <p>Vui lòng nhập thông tin tài khoản của bạn</p>
                </div>

                @if(session('status'))
                    <div class="success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder=" "
                        >
                        <label for="email">Email</label>
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder=" "
                        >
                        <label for="password">Mật khẩu</label>
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="remember-row">
                        <label class="remember">
                            <input type="checkbox" name="remember">
                            Ghi nhớ đăng nhập
                        </label>

                        @if (Route::has('password.request'))
                            <a class="forgot-link" href="{{ route('password.request') }}">
                                Quên mật khẩu?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="btn">Đăng nhập</button>

                    <div class="links">
                        Chưa có tài khoản?
                        <a href="{{ route('register') }}">Đăng ký ngay</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
