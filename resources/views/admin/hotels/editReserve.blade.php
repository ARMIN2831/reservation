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
        .room-section {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .person-section {
            border: 1px solid #eee;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ویرایش رزور
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
                                    <div class="col-md-10">

                                        <form id="reserveForm" method="post" action="{{ route('admin.reserve.update', $reserve->id) }}"
                                              enctype="multipart/form-data" align="center">
                                            @csrf

                                            <!-- Extended default form grid -->
                                            <!-- Grid row -->
                                            <div class="form-col" align="center">
                                                <!-- Default input -->
                                                <div class="form-group row">
                                                    <label for="code"
                                                           class="col-sm-3  col-form-label"><b>کد رزرو</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ $reserve->code }}" type="text"
                                                               class="form-control " id="code" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="paymentCode"
                                                           class="col-sm-3  col-form-label"><b>کد پرداخت</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ $reserve->paymentCode }}" type="text"
                                                               class="form-control " id="paymentCode" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="paymentCode"
                                                           class="col-sm-3  col-form-label"><b>نام و نام خانوادگی</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ $reserve->user->people->firstName." ".$reserve->user->people->lastName }}" type="text"
                                                               class="form-control " id="paymentCode" disabled>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="entry_date"
                                                           class="col-sm-3  col-form-label"><b>تاریخ ورود</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('entry_date', $reserve->entry_date) }}" type="text"
                                                               class="form-control " id="entry_date" name="entry_date" placeholder="تاریخ ورود">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exit_date"
                                                           class="col-sm-3  col-form-label"><b>تاریخ خروج</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('exit_date', $reserve->exit_date) }}" type="text"
                                                               class="form-control " id="exit_date" name="exit_date" placeholder="تاریخ خروج">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="paymentStatus"
                                                           class="col-sm-3  col-form-label"><b>وضعیت پرداخت</b></label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="paymentStatus" name="paymentStatus">
                                                            <option>انتخاب کنید</option>
                                                            <option @if(old('paymentStatus', $reserve->paymentStatus) == 'درحال انجام') selected @endif  value="درحال انجام" >درحال انجام</option>
                                                            <option @if(old('paymentStatus', $reserve->paymentStatus) == 'پرداخت شده') selected @endif  value="پرداخت شده" >پرداخت شده</option>
                                                            <option @if(old('paymentStatus', $reserve->paymentStatus) == 'ناموفق') selected @endif  value="ناموفق" >ناموفق</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="price"
                                                           class="col-sm-3  col-form-label"><b>مبلع پرداختی کاربر</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('price', $reserve->price) }}" type="text"
                                                               class="form-control " id="price" name="price" placeholder="مبلع پرداختی کاربر">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="agencyPrice"
                                                           class="col-sm-3  col-form-label"><b>مبلع دریافتی بلاگر</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('agencyPrice', $reserve->agencyPrice) }}" type="text"
                                                               class="form-control " id="agencyPrice" name="agencyPrice" placeholder="مبلع دریافتی بلاگر">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="bordPrice"
                                                           class="col-sm-3  col-form-label"><b>هزینه برد</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('bordPrice', $reserve->bordPrice) }}" type="text"
                                                               class="form-control " id="bordPrice" name="bordPrice" placeholder="هزینه برد">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="hotelPrice"
                                                           class="col-sm-3  col-form-label"><b>مبلغ دریافتی هتلدار</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('hotelPrice', $reserve->hotelPrice) }}" type="text"
                                                               class="form-control " id="hotelPrice" name="hotelPrice" placeholder="مبلغ دریافتی هتلدار">
                                                    </div>
                                                </div>

                                                <!-- Rooms Section -->
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <h4>اتاق‌ها و مسافران</h4>

                                                        @php
                                                            $rooms = $reserve->people->groupBy('model_number');
                                                        @endphp

                                                        @foreach($rooms as $roomNumber => $people)
                                                            <div class="room-section">
                                                                <div class="row">
                                                                    <div class="col-sm-10">
                                                                        <h5>اتاق شماره {{ $roomNumber + 1 }}</h5>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <button type="button" class="btn btn-danger btn-sm remove-room" data-room="{{ $roomNumber }}">حذف اتاق</button>
                                                                    </div>
                                                                </div>

                                                                @foreach($people as $index => $person)
                                                                    <div class="person-section">
                                                                        <div class="row">
                                                                            <div class="col-sm-11">
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label">نام</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" name="rooms[{{ $roomNumber }}][people][{{ $index }}][firstName]" value="{{ $person->firstName }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label">نام خانوادگی</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" name="rooms[{{ $roomNumber }}][people][{{ $index }}][lastName]" value="{{ $person->lastName }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label">کد ملی</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" name="rooms[{{ $roomNumber }}][people][{{ $index }}][nationalCode]" value="{{ $person->nationalCode }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label">موبایل</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" name="rooms[{{ $roomNumber }}][people][{{ $index }}][mobile]" value="{{ $person->mobile }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label">جنسیت</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select class="form-control" name="rooms[{{ $roomNumber }}][people][{{ $index }}][sex]">
                                                                                            <option value="مرد" @if($person->sex == 'مرد') selected @endif>مرد</option>
                                                                                            <option value="زن" @if($person->sex == 'زن') selected @endif>زن</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-1">
                                                                                <button type="button" class="btn btn-danger btn-sm remove-person">حذف</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                                <button type="button" class="btn btn-success btn-sm add-person" data-room="{{ $roomNumber }}">افزودن شخص جدید</button>
                                                            </div>
                                                        @endforeach

                                                        <button type="button" class="btn btn-primary" id="add-room">افزودن اتاق جدید</button>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-9">
                                                        <a href="{{ route('admin.hotels.index') }}" class="btn btn-warning">لغو</a>
                                                        <button id="submitBtn" type="submit" name="add"
                                                                class="btn btn-primary input-lg">ذخیره تغییرات
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- Extended default form grid -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>
    <script>
        $('#submitBtn').click(function() {
            // ابتدا بررسی کنیم که فیلدهای ضروری پر شده‌اند
            let isValid = true;
            $('[required]').each(function() {
                if (!$(this).val()) {
                    alert(`لطفا فیلد ${$(this).attr('name')} را پر کنید`);
                    isValid = false;
                    return false; // break the loop
                }
            });

            if (!isValid) return;

            // جمع‌آوری داده‌های فرم
            let formData = new FormData($('#reserveForm')[0]);

            // افزودن داده‌های اضافی
            formData.append('pmo', '1');
            formData.append('_token', '{{ csrf_token() }}');

            // نمایش لودینگ
            $(this).prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> در حال پردازش...');

            // ارسال درخواست AJAX
            $.ajax({
                url: $('#reserveForm').attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.success) {
                        let paymentHtml = `
                    <div class="alert alert-success mt-3">
                        <h4>رزرو با موفقیت ویرایش شد</h4>
                        <p>کد رزرو: ${response.reserve_code}</p>
                        <p>لطفا برای پرداخت روی لینک زیر کلیک کنید:</p>
                        <p>${response.payment_url}</p>
                    </div>
                `;
                        $('#reserveForm').after(paymentHtml);
                    } else {
                        alert('خطا: ' + response.message);
                    }
                },
                error: function(xhr) {
                    let errorMessages = 'خطا در ارسال اطلاعات:\n';
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errors = xhr.responseJSON.errors;
                        for(let field in errors) {
                            errorMessages += errors[field][0] + '\n';
                        }
                    } else {
                        errorMessages += xhr.responseJSON?.message || 'خطای ناشناخته رخ داده است';
                    }
                    alert(errorMessages);
                },
                complete: function() {
                    $('#submitBtn').prop('disabled', false).text('ذخیره تغییرات');
                }
            });
        });





        $(document).ready(function() {
            // Add new room
            $('#add-room').click(function() {
                const roomCount = $('.room-section').length;
                const newRoomNumber = roomCount;

                const newRoomHtml = `
                <div class="room-section">
                    <div class="row">
                        <div class="col-sm-10">
                            <h5>اتاق شماره ${newRoomNumber + 1}</h5>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-danger btn-sm remove-room" data-room="${newRoomNumber}">حذف اتاق</button>
                        </div>
                    </div>

                    <div class="person-section">
                        <div class="row">
                            <div class="col-sm-11">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">نام</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="rooms[${newRoomNumber}][people][0][firstName]" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">نام خانوادگی</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="rooms[${newRoomNumber}][people][0][lastName]" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">کد ملی</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="rooms[${newRoomNumber}][people][0][nationalCode]" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">موبایل</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="rooms[${newRoomNumber}][people][0][mobile]" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">جنسیت</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="rooms[${newRoomNumber}][people][0][sex]" required>
                                            <option value="مرد">مرد</option>
                                            <option value="زن">زن</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-danger btn-sm remove-person">حذف</button>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success btn-sm add-person" data-room="${newRoomNumber}">افزودن شخص جدید</button>
                </div>
                `;

                $(this).before(newRoomHtml);
            });

            // Add new person to room
            $(document).on('click', '.add-person', function() {
                const roomNumber = $(this).data('room');
                const personCount = $(this).siblings('.person-section').length;

                const newPersonHtml = `
                <div class="person-section">
                    <div class="row">
                        <div class="col-sm-11">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">نام</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rooms[${roomNumber}][people][${personCount}][firstName]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">نام خانوادگی</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rooms[${roomNumber}][people][${personCount}][lastName]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">کد ملی</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rooms[${roomNumber}][people][${personCount}][nationalCode]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">موبایل</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rooms[${roomNumber}][people][${personCount}][mobile]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">جنسیت</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="rooms[${roomNumber}][people][${personCount}][sex]" required>
                                        <option value="مرد">مرد</option>
                                        <option value="زن">زن</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button type="button" class="btn btn-danger btn-sm remove-person">حذف</button>
                        </div>
                    </div>
                </div>
                `;

                $(this).before(newPersonHtml);
            });

            // Remove person
            $(document).on('click', '.remove-person', function() {
                if ($(this).closest('.room-section').find('.person-section').length > 1) {
                    $(this).closest('.person-section').remove();
                } else {
                    alert('حداقل باید یک شخص در اتاق وجود داشته باشد');
                }
            });

            // Remove room
            $(document).on('click', '.remove-room', function() {
                if ($('.room-section').length > 1) {
                    $(this).closest('.room-section').remove();
                    // Update room numbers
                    $('.room-section').each(function(index) {
                        $(this).find('h5').text('اتاق شماره ' + (index + 1));
                    });
                } else {
                    alert('حداقل باید یک اتاق وجود داشته باشد');
                }
            });
        });
    </script>
@endsection
