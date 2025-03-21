<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>
      {{ env('APP_NAME') }}
  </title>
  {{-- <script type="text/javascript" src="{{ asset("dist/js/bower_components/jquery/jquery.min.js") }}"></script>--}}
  {{-- <script type="text/javascript" src="{{ asset("dist/js/bower_components/moment/min/moment.min.js") }}"></script>--}}
  {{-- <script type="text/javascript" src="{{ asset("dist/js/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>--}}
  {{-- <script type="text/javascript" src="{{ asset("dist/js/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js") }}"></script>--}}
  {{-- <link rel="stylesheet" href="{{ asset("dist/css/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" />--}}
  {{-- <link rel="stylesheet" href="{{ asset("dist/css/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css") }}" />--}}
  <link rel="stylesheet" href="{{ asset("plugins/bootstrap-datepicker/datepicker.min.css") }}" />
  <link rel="stylesheet" href="{{ asset("plugins/clockpicker/bootstrap-clockpicker.min.css") }}" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset("plugins/font-awesome/css/font-awesome.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("dist/css/adminlte.min.css") }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdpersiandatetimepicker@7.2.0/dist/jquery.md.bootstrap.datetimepicker.style.css"/>

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{ asset("dist/css/bootstrap-rtl.min.css") }}">
  <!-- template rtl version -->
  <link rel="stylesheet" href="{{ asset("dist/css/custom-style.css") }}">
  <link rel="icon" href="{{ asset("/dist/img/logo.png") }}" sizes="32x32" />
  <link rel="icon" href="{{ asset("/dist/img/logo.png") }}" sizes="192x192" />
  <link rel="apple-touch-icon" href="{{ asset("/dist/img/logo.png") }}" />
  <meta name="msapplication-TileImage" content="{{ asset("/dist/img/logo.png") }} " />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    @include('admin.nav')
    <!-- /.navbar -->


    @include('admin.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Wrapper. Contains page content -->
        <link href="https://bgsrb.github.io/flatpickr-jalali/dist/flatpickr.min.css" rel="stylesheet">
        <script src="https://bgsrb.github.io/flatpickr-jalali/examples/jalali/jdate.min.js"></script>
        <script>window.Date=window.JDate;</script>
        <script src="https://bgsrb.github.io/flatpickr-jalali/dist/flatpickr.min.js"></script>
        <script src="https://bgsrb.github.io/flatpickr-jalali/dist/plugins/rangePlugin.js"></script>
        <script src="https://bgsrb.github.io/flatpickr-jalali/dist/l10n/fa.js"></script>
      @yield('content')
      <!-- /.content-wrapper -->
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('admin.footer')
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


  <script>
      if (typeof jQuery === 'undefined') {
          document.write('<script src="{{ asset("plugins/jquery/jquery.min.js") }}"><\/script>');
      }

      function confirmDelete(button){
          var form = $(button).closest('form');
          Swal.fire({
              title: 'آیا مطمئن هستید؟',
              text: "آیا از حذف این آیتم مطمئن هستید؟ این عمل برگشت‌پذیر نیست!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'بله، حذف کن!',
              cancelButtonText: 'لغو'
          }).then((result) => {
              if (result.isConfirmed) {
                  console.log(form);
                  form.submit();
              }
          });
      }
  </script>
  <script src="{{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{ asset("dist/js/adminlte.js") }}"></script>
  <script src="{{ asset("dist/js/demo.js") }}"></script>
  <script src="{{ asset("plugins/sparkline/jquery.sparkline.min.js") }}"></script>
  <script src="{{ asset("plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
  <script src="{{ asset("dist/js/persian-date.min.js") }}"></script>
  <script src="{{ asset("plugins/bootstrap-datepicker/datepicker.min.js") }}"></script>
  <script src="{{ asset("plugins/clockpicker/bootstrap-clockpicker.min.js") }}"></script>
  <script src="{{ asset("dist/js/pages/dashboard2.js") }}"></script>
</body>

</html>
