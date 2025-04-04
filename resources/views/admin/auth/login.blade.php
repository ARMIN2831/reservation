<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | صفحه ورود</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("dist/css/adminlte.min.css") }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset("plugins/iCheck/square/blue.css") }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset("dist/css/bootstrap-rtl.min.css") }}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset("dist/css/custom-style.css") }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>ورود به سایت</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">فرم زیر را تکمیل کنید و ورود بزنید</p>

            <form action="{{ route('admin.doLogin') }}" method="post">
                @csrf
                @if(session('failed'))
                    <div style="margin-top: 0;margin-bottom: 10px;padding: .5rem 0.75rem;" class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                @endif
                <div class="input-group mb-3">
                    <input name="username" type="text" class="form-control" placeholder="نام کاربری">
                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control" placeholder="رمز عبور">
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                </div>
                <div class="row">



                    .
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->
            {{--<p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">ثبت نام</a>
            </p>--}}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
<script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
</body>
</html>
