<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo khóa học</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #f3f3f3;
            color: #111;
        }
        
        .container {
            width: 700px;
            max-width: calc(100% - 30px);
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        }
        h1 {
            margin-bottom: 24px;
            font-size: 28px;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        input, textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d6d6d6;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
        }
        input[type="file"] {
            padding: 10px;
            background: #fafafa;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 6px;
        }
        .btn {
            background: #111;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .top-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #111;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <a class="top-link" href="{{ route('courses.index') }}">← Quay lại danh sách khóa học</a>

        <h1>Tạo khóa học</h1>

        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Tên khóa học</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Nội dung</label>
                <input type="text" name="content" id="content" value="{{ old('content') }}">
                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Giá</label>
                <input type="text" name="price" id="price" value="{{ old('price') }}">
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="img_url">Ảnh khóa học</label>
                <input type="file" name="img_url" id="img_url" accept="image/*">
                @error('img_url')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Lưu khóa học</button>
        </form>
    </div>
</body>
</html>
