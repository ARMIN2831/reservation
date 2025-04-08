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

                                <form method="post" action="{{ route('admin.updatePageSettings') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="question-select"><b>انتخاب هتل پیشنهادات اول</b></label>
                                        <table id="selectedHotelsOne" class="display" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>انتخاب</th>
                                                <th>نام هتل</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($hotels as $hotel)
                                                <tr>
                                                    <td data-order="{{ in_array($hotel->id, $selectedHotelsOne) ? 1 : 0 }}">
                                                        <input type="checkbox" value="{{ $hotel->id }}"
                                                            {{ in_array($hotel->id, $selectedHotelsOne) ? 'checked' : '' }}>
                                                    </td>
                                                    <td>{{ $hotel->title }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="form-group">
                                    <label for="question-select"><b>انتخاب هتل پیشنهادات دوم</b></label>
                                    <table id="selectedHotelsTwo" class="display" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>انتخاب</th>
                                            <th>نام هتل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($hotels as $hotel)
                                            <tr>
                                                <td data-order="{{ in_array($hotel->id, $selectedHotelsTwo) ? 1 : 0 }}">
                                                    <input type="checkbox" value="{{ $hotel->id }}"
                                                        {{ in_array($hotel->id, $selectedHotelsTwo) ? 'checked' : '' }}>
                                                </td>
                                                <td>{{ $hotel->title }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">ویرایش</button>
                                    </div>
                                </form>

                                <script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>
                                <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
                                <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                                <script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- اضافه کردن DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- اضافه کردن Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        let selectedHotelsOne = @json($selectedHotelsOne).map(Number);
        let selectedHotelsTwo = @json($selectedHotelsTwo).map(Number);

        $(document).ready(function() {
            $.fn.dataTable.ext.order['dom-checkbox'] = function(settings, col) {
                return this.api().column(col, {order: 'index'}).nodes().map(function(td, i) {
                    return $('input', td).prop('checked') ? 1 : 0;
                });
            };




            const table = $('#selectedHotelsOne').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Persian.json" // ترجمه به فارسی
                },
                "columnDefs": [
                    {
                        "targets": 0, // ستون اول (انتخاب)
                        "orderDataType": "dom-checkbox", // استفاده از تابع سفارشی برای مرتب‌سازی
                        "orderable": true, // فعال کردن مرتب‌سازی
                        "searchable": false // غیرفعال کردن جستجو
                    }
                ],
                "order": [[0, 'desc']]
            });
            const table2 = $('#selectedHotelsTwo').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Persian.json" // ترجمه به فارسی
                },
                "columnDefs": [
                    {
                        "targets": 0, // ستون اول (انتخاب)
                        "orderDataType": "dom-checkbox", // استفاده از تابع سفارشی برای مرتب‌سازی
                        "orderable": true, // فعال کردن مرتب‌سازی
                        "searchable": false // غیرفعال کردن جستجو
                    }
                ],
                "order": [[0, 'desc']]
            });




            // اضافه کردن event listener برای تغییرات checkbox
            $('#selectedHotelsOne tbody').on('change', 'input[type="checkbox"]', function() {
                const hotelId = Number($(this).val()); // تبدیل به عدد
                if ($(this).is(':checked')) {
                    if (!selectedHotelsOne.includes(hotelId)) {
                        selectedHotelsOne.push(hotelId);
                    }
                } else {
                    selectedHotelsOne = selectedHotelsOne.filter(id => id !== hotelId);
                }
            });
            // اضافه کردن event listener برای تغییرات checkbox
            $('#selectedHotelsTwo tbody').on('change', 'input[type="checkbox"]', function() {
                const hotelId = Number($(this).val()); // تبدیل به عدد
                if ($(this).is(':checked')) {
                    if (!selectedHotelsTwo.includes(hotelId)) {
                        selectedHotelsTwo.push(hotelId);
                    }
                } else {
                    selectedHotelsTwo = selectedHotelsTwo.filter(id => id !== hotelId);
                }
            });





            // اضافه کردن سوالات انتخاب‌شده به فرم قبل از ارسال
            $('form').on('submit', function() {
                selectedHotelsOne.forEach(hotelId => {
                    $(this).append(`<input type="hidden" name="hotels[one][]" value="${hotelId}" />`);
                });
                selectedHotelsTwo.forEach(hotelId => {
                    $(this).append(`<input type="hidden" name="hotels[two][]" value="${hotelId}" />`);
                });
            });
        });
    </script>
@endsection
