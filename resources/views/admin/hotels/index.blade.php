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
                            <h3 class="card-title"> لیست هتل ها
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
                                        <th scope="col">ایمیل</th>
                                        <th scope="col">موبایل</th>
                                        <th scope="col">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($hotels as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td>{{$row->title }}</td>
                                            <td>{{$row->email }}</td>
                                            <td>{{$row->mobile }}</td>
                                            <td style="padding: 0 !important;">

                                                <form style="display: inline" action="{{route('admin.hotels.destroy', $row->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a onclick="confirmDelete(this)" type="submit" class="btn btn-sm btn-danger ml-1 mt-1 float-left">
                                                        <span class="fa fa-trash fa-fw text-white" aria-hidden="true"></span>
                                                        <span class="sr-only">حذف</span>
                                                    </a>
                                                </form>

                                                <a href="{{route('admin.hotels.edit', $row->id)}}"
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
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12 col-md-offset-1">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست اتاق ها
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
                        <div class="card-body">
                            <div class="col-lg-12">

                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">



                                            <table id="dataTable2" class="table table-bordered" style="width: 120%">
                                                <thead>
                                                <tr>
                                                    <th scope="col">شناسه</th>
                                                    <th scope="col">نام</th>
                                                    <th scope="col">نوع</th>
                                                    <th scope="col">وضعیت</th>
                                                    <th scope="col">عملیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($rooms as $row)
                                                    <tr>
                                                        <td>{{$row->id}}</td>
                                                        <td>{{$row->title }}</td>
                                                        <td>{{$row->type }}</td>
                                                        <td>{{$row->status }}</td>
                                                        <td style="padding: 0 !important;">

                                                            <form style="display: inline" action="{{route('admin.rooms.destroy', $row->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a onclick="confirmDelete(this)" type="submit" class="btn btn-sm btn-danger ml-1 mt-1 float-left">
                                                                    <span class="fa fa-trash fa-fw text-white" aria-hidden="true"></span>
                                                                    <span class="sr-only">حذف</span>
                                                                </a>
                                                            </form>

                                                            <a href="{{route('admin.rooms.edit', $row->id)}}"
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
                                                $('#dataTable2').DataTable({
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
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">لیست امکانات تفریحی و رفاهی</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#addFacilityModal">
                                    <i class="fas fa-plus"></i> افزودن امکان جدید
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="facilitiesTable" class="table table-bordered table-striped table-hover" style="width:100%">
                                    <thead class="bg-lightblue">
                                    <tr>
                                        <th width="5%">شناسه</th>
                                        <th width="25%">نام</th>
                                        <th width="20%">نوع</th>
                                        <th width="15%">آیکون</th>
                                        <th width="20%">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($facilities as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->title }}</td>
                                            <td>
                                    <span class="badge {{ $row->type == 1 ? 'bg-success' : 'bg-info' }}">
                                        {{ $row->type == 1 ? "خدمات کلی هتل" : "امکانات ورزشی" }}
                                    </span>
                                            </td>
                                            <td class="text-center">{!! $row->icon !!}</td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-info edit-btn ml-2"
                                                            data-id="{{ $row->id }}"
                                                            data-title="{{ $row->title }}"
                                                            data-type="{{ $row->type }}"
                                                            data-icon="{{ $row->icon }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <form method="POST" action="{{ route('admin.facilitiesDestroy', $row->id) }}" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger delete-btn">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal برای افزودن امکان جدید -->
            <div class="modal fade" id="addFacilityModal" tabindex="-1" role="dialog" aria-labelledby="addFacilityModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title" id="addFacilityModalLabel">افزودن امکان جدید</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="addFacilityForm" action="{{ route('admin.facilitiesStore') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">نام امکان</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>

                                <div class="form-group">
                                    <label for="type">نوع امکان</label>
                                    <select class="form-control" id="type" name="type" required>
                                        <option value="1">خدمات و امکانات کلی هتل</option>
                                        <option value="2">استخر و امکانات ورزشی</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="icon">آیکون (کد Font Awesome)</label>
                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="مثال: fas fa-swimming-pool">
                                    <small class="text-muted">می‌توانید آیکون‌ها را از <a href="https://fontawesome.com/icons" target="_blank">اینجا</a> انتخاب کنید</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                                <button type="submit" class="btn btn-primary">ذخیره</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal برای ویرایش امکان -->
            <div class="modal fade" id="editFacilityModal" tabindex="-1" role="dialog" aria-labelledby="editFacilityModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h4 class="modal-title" id="editFacilityModalLabel">ویرایش امکان</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editFacilityForm" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="edit_title">نام امکان</label>
                                    <input type="text" class="form-control" id="edit_title" name="title" required>
                                </div>

                                <div class="form-group">
                                    <label for="edit_type">نوع امکان</label>
                                    <select class="form-control" id="edit_type" name="type" required>
                                        <option value="1">خدمات و امکانات کلی هتل</option>
                                        <option value="2">استخر و امکانات ورزشی</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="edit_icon">آیکون (کد Font Awesome)</label>
                                    <input type="text" class="form-control" id="edit_icon" name="icon">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                                <button type="submit" class="btn btn-info">ذخیره تغییرات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- JavaScript -->
            <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
            <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

            <script>
                $(document).ready(function() {
                    // Initialize DataTable
                    $('#facilitiesTable').DataTable({
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Persian.json"
                        },
                        "responsive": true,
                        "autoWidth": false,
                    });

                    // Handle edit button click
                    $('.edit-btn').click(function() {
                        var id = $(this).data('id');
                        var title = $(this).data('title');
                        var type = $(this).data('type');
                        var icon = $(this).data('icon');

                        $('#edit_title').val(title);
                        $('#edit_type').val(type);
                        $('#edit_icon').val(icon);

                        // Set form action
                        $('#editFacilityForm').attr('action', '/admin/dashboard/facilitiesUpdate/' + id);

                        // Show modal
                        $('#editFacilityModal').modal('show');
                    });

                    // Handle delete button click
                    $('.delete-btn').click(function() {
                        var form = $(this).closest('form');

                        Swal.fire({
                            title: 'آیا مطمئن هستید؟',
                            text: "این امکان حذف خواهد شد!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'بله، حذف کن!',
                            cancelButtonText: 'انصراف'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });

                    // Handle status toggle button click
                    $('.status-btn').click(function() {
                        var id = $(this).data('id');
                        var currentStatus = $(this).data('status');
                        var newStatus = currentStatus ? 0 : 1;
                        var button = $(this);

                        $.ajax({
                            url: '/admin/facilities/' + id + '/toggle-status',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                status: newStatus
                            },
                            success: function(response) {
                                if (response.success) {
                                    // Update button icon and data-status
                                    if (newStatus) {
                                        button.html('<i class="fas fa-eye-slash"></i>');
                                        button.closest('tr').find('.badge.bg-danger')
                                            .removeClass('bg-danger')
                                            .addClass('bg-success')
                                            .text('فعال');
                                    } else {
                                        button.html('<i class="fas fa-eye"></i>');
                                        button.closest('tr').find('.badge.bg-success')
                                            .removeClass('bg-success')
                                            .addClass('bg-danger')
                                            .text('غیرفعال');
                                    }
                                    button.data('status', newStatus);

                                    Swal.fire(
                                        'موفق!',
                                        'وضعیت امکان با موفقیت تغییر کرد.',
                                        'success'
                                    );
                                }
                            },
                            error: function() {
                                Swal.fire(
                                    'خطا!',
                                    'مشکلی در تغییر وضعیت پیش آمد.',
                                    'error'
                                );
                            }
                        });
                    });
                });
            </script>

            @section('styles')
                <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
                <style>
                    .badge {
                        font-size: 0.9rem;
                        font-weight: normal;
                    }
                    .btn-group {
                        white-space: nowrap;
                    }
                    .btn-group .btn {
                        margin-left: 2px;
                        margin-right: 2px;
                    }
                    .table th {
                        background-color: #3c8dbc;
                        color: white;
                    }
                </style>
            @endsection



        </div>
    </div>
@endsection
