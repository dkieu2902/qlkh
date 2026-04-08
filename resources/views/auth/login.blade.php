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
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
        }

        .container {
            width: 100%;
            max-width: 420px;
            margin: 60px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            margin-bottom: 24px;
            font-size: 28px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 10px 12px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
        }

        input[type="checkbox"] {
            margin-right: 6px;
        }

        .remember {
            margin-bottom: 16px;
            font-size: 14px;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 6px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #111;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .links {
            margin-top: 16px;
            text-align: center;
            font-size: 14px;
        }

        .links a {
            color: #111;
            text-decoration: none;
            display: block;
            margin-top: 8px;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Đăng nhập</h2>

        @if(session('status'))
            <div class="success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                >
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember">
                <label>
                    <input type="checkbox" name="remember">
                    Ghi nhớ đăng nhập
                </label>
            </div>

            <button type="submit" class="btn">Đăng nhập</button>

            <div class="links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                @endif

                <a href="{{ route('register') }}">Chưa có tài khoản? Đăng ký</a>
            </div>
        </form>
    </div>
</body>
</html>
