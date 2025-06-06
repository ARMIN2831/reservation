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

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ساخت کاربر جدید
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
                                    <div class="col-md-8">

                                        <form method="post" action="{{ route('admin.users.store') }}"
                                              enctype="multipart/form-data" align="center">

                                            @csrf

                                            <!-- Extended default form grid -->
                                            <!-- Grid row -->
                                            <div class="form-col" align="center">
                                                <!-- Default input -->


                                                <div class="form-group row">
                                                    <label for="firstName"
                                                           class="col-sm-3  col-form-label"><b>نام</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('firstName') }}" type="text"
                                                               class="form-control " id="firstName"
                                                               placeholder="نام" name="firstName">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="lastName"
                                                           class="col-sm-3  col-form-label"><b>نام خانوادگی</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('lastName') }}" type="text"
                                                               class="form-control " id="lastName"
                                                               placeholder="نام خانوادگی" name="lastName">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="nationalCode"
                                                           class="col-sm-3  col-form-label"><b>کد ملی</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('nationalCode') }}" type="text"
                                                               class="form-control " id="nationalCode"
                                                               placeholder="کد ملی" name="nationalCode">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="mobile"
                                                           class="col-sm-3  col-form-label"><b>موبایل</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('mobile') }}" type="text"
                                                               class="form-control " id="mobile"
                                                               placeholder="موبایل" name="mobile">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="email"
                                                           class="col-sm-3  col-form-label"><b>ایمیل</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('email') }}" type="text"
                                                               class="form-control " id="email"
                                                               placeholder="ایمیل" name="email">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="username"
                                                           class="col-sm-3  col-form-label"><b>نام کاربری</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('username') }}" type="text"
                                                               class="form-control " id="username"
                                                               placeholder="نام کاربری" name="username">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="password"
                                                           class="col-sm-3  col-form-label"><b>پسورد</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('password') }}" type="text"
                                                               class="form-control " id="password"
                                                               placeholder="پسورد هتل" name="password">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="type"
                                                           class="col-sm-3  col-form-label"><b>نوع کاربر</b></label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="type" name="type">
                                                            <option>انتخاب کنید</option>
                                                            <option @if(old('type') and 'admin' == old('type')) selected @endif value="admin">admin</option>
                                                            <option @if(old('type') and 'hotel' == old('type')) selected @endif value="hotel">hotel</option>
                                                            <option @if(old('type') and 'user' == old('type')) selected @endif value="user">user</option>
                                                            <option @if(old('type') and 'agency' == old('type')) selected @endif value="agency">agency</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="agencyType"
                                                           class="col-sm-3  col-form-label"><b>نوع کاربر آژانس</b></label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="agencyType" name="agencyType">
                                                            <option>انتخاب کنید</option>
                                                            <option @if(old('type') and 'بلاگر' == old('type')) selected @endif value="بلاگر">بلاگر</option>
                                                            <option @if(old('type') and 'شهری' == old('type')) selected @endif value="شهری">شهری</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="discount"
                                                           class="col-sm-3  col-form-label"><b>درصد تخفیف</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('discount') }}" type="text"
                                                               class="form-control " id="discount"
                                                               placeholder="درصد تخفیف" name="discount">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-sm-9">
                                                        <a href="{{ route('admin.users.index') }}" class="btn btn-warning">لغو</a>
                                                        <button type="submit" name="add"
                                                                class="btn btn-primary input-lg">افزودن
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

@endsection
