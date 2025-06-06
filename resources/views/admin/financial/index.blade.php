@extends('admin.admin')

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <style>
        .container {
            padding: 0.5%;
        }
    </style>
    <div>


        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-1">

                    <!-- Display Validation Errors -->

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> لیست فاکتور ها
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div style="overflow-x: auto" class="card-body">
                            <div class="col-lg-12">

                                {{--<div class="container">

                                    <div class="input-group mb-3">
                                        <form style="display:flex;" action="{{ route('questions.index') }}">
                                            --}}{{--<input value="{{ request('search') }}" class="form-control form-control-navbar" name="search" type="search" placeholder="جستجوی نام کاربر" aria-label="Search">--}}{{--

                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-info btn-flat"> <i class="fa fa-search"></i></button>
                                            </span>
                                        </form>
                                    </div>
                                </div>--}}



                                <table id="dataTable" class="table table-bordered" style="width: 120%">
                                    <thead>
                                    <tr>
                                        <th scope="col">شناسه</th>
                                        <th scope="col">کد</th>
                                        <th scope="col">تاریخ ورود</th>
                                        <th scope="col">تاربخ خروجی</th>
                                        <th scope="col">وضعیت پرداخت</th>
                                        <th scope="col">کد پرداخت</th>
                                        <th scope="col">مبلغ پرداختی کاربر</th>
                                        <th scope="col">مبلغ پرداختی هتلدار</th>
                                        <th scope="col">نام هتل</th>
                                        <th scope="col">وضعیت فاکتور</th>
                                        <th scope="col">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($reserves as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->code }}</td>
                                            <td>{{ $row->entry_date }}</td>
                                            <td>{{ $row->exit_date }}</td>
                                            <td>{{ $row->paymentStatus }}</td>
                                            <td>{{ $row->paymentCode }}</td>
                                            <td>{{ $row->price }}</td>
                                            <td>{{ $row->hotelPrice }}</td>
                                            <td>{{ $row->hotel->title }}</td>
                                            <td>{{ $row->factorStatus }}</td>
                                            <td style="padding: 0 !important;">
                                                <div class="d-flex align-items-center" style="gap: 5px;">
                                                    <!-- فرم رد کردن -->
                                                    <form style="display: inline" action="{{route('admin.financialChangeStatus', $row->id)}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="status" value="0">
                                                        <button type="submit" class="btn btn-sm btn-danger" title="رد کردن">
                                                            <i class="fas fa-times-circle"></i>
                                                        </button>
                                                    </form>

                                                    <!-- فرم تایید -->
                                                    <form style="display: inline" action="{{route('admin.financialChangeStatus', $row->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="status" value="1">

                                                        <!-- Input فایل که ابتدا مخفی است -->
                                                        <input type="file" name="file" id="fileInput-{{$row->id}}" style="display: none" onchange="this.form.submit()">

                                                        <button type="button" class="btn btn-sm btn-success" title="تایید" onclick="document.getElementById('fileInput-{{$row->id}}').click()">
                                                            <i class="fas fa-check-circle"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>
                                <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
                                <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                                <script>
                                    $('#dataTable').DataTable({
                                        language: {
                                            search: "جستجو:",
                                            lengthMenu: "نمایش _MENU_ رکورد در هر صفحه",
                                            zeroRecords: "موردی یافت نشد",
                                            info: "نمایش _PAGE_ از _PAGES_",
                                            infoEmpty: "رکوردی موجود نیست",
                                            infoFiltered: "(فیلتر شده از _MAX_ رکورد)",
                                            paginate: {
                                                next: "بعدی",
                                                previous: "قبلی"
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
