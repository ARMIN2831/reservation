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
                            <h3 class="card-title"> لیست کاربر ها
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
                                        <th scope="col">نام</th>
                                        <th scope="col">نام خانوادگی</th>
                                        <th scope="col">کد ملی</th>
                                        <th scope="col">ایمیل</th>
                                        <th scope="col">موبایل</th>
                                        <th scope="col">نام کاربری</th>
                                        <th scope="col">نوع کاربری</th>
                                        <th scope="col">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ @$row->people->firstName }}</td>
                                            <td>{{ @$row->people->lastName }}</td>
                                            <td>{{ @$row->people->nationalCode  }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->mobile }}</td>
                                            <td>{{ $row->username }}</td>
                                            <td>{{ $row->type }}</td>
                                            <td style="padding: 0 !important;">

                                                <form style="display: inline" action="{{route('admin.users.destroy', $row->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a onclick="confirmDelete(this)" type="submit" class="btn btn-sm btn-danger ml-1 mt-1 float-left">
                                                        <span class="fa fa-trash fa-fw text-white" aria-hidden="true"></span>
                                                        <span class="sr-only">حذف</span>
                                                    </a>
                                                </form>

                                                <a href="{{route('admin.users.edit', $row->id)}}"
                                                   class="btn btn-sm btn-primary ml-1 mt-1 float-left">
                                                    <span class="fas fa-pencil-alt fa-fw" aria-hidden="true"></span>
                                                    <span class="sr-only">ویرایش</span>
                                                </a>

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
                                        },
                                        columnDefs: [
                                            { type: 'string', targets: [0] },
                                            { type: 'string', targets: [1] },
                                            { type: 'string', targets: [2] },
                                            { type: 'string', targets: [3] },
                                            { type: 'string', targets: [4] },
                                            { type: 'string', targets: [5] },
                                            { type: 'string', targets: [6] },
                                            { type: 'string', targets: [7] },
                                            { type: 'string', targets: [8] },
                                        ]
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
