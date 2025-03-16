<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | صفحه ورود</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8fafc;
        }
        .login-box {
            max-width: 400px;
            margin: 0 auto;
            padding-top: 10%;
        }
        .login-logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-logo a {
            font-size: 2rem;
            font-weight: bold;
            color: #4a5568;
        }
        .login-card {
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
        }
        .login-card-body {
            padding: 1.5rem;
        }
        .input-group {
            margin-bottom: 1rem;
        }
        .input-group-text {
            background-color: #edf2f7;
            border: 1px solid #e2e8f0;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
        }
        .form-control {
            width: 100%;
            padding: 0.5rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            background-color: #ffffff;
        }
        .btn-primary {
            background-color: #4299e1;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #3182ce;
        }
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }
        .alert-danger {
            background-color: #fed7d7;
            color: #e53e3e;
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="login-box">
    <div class="login-logo">
        <a href="">ورود به پنل ادمین هتل</a>
    </div>
    <div class="login-card">
        <div class="login-card-body">
            <p class="text-center text-gray-700 mb-6">فرم زیر را تکمیل کنید و ورود بزنید</p>

            <form action="{{ route('hotel.doLogin') }}" method="post">
                @csrf
                @if(session('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                @endif
                <div class="input-group" style="display: flex">
                    <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <input name="username" type="text" class="form-control" placeholder="نام کاربری">
                </div>
                <div class="input-group" style="display: flex">
                    <div class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input name="password" type="password" class="form-control" placeholder="رمز عبور">
                </div>
                <div class="flex justify-center mt-6">
                    <button type="submit" class="btn-primary">ورود</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
