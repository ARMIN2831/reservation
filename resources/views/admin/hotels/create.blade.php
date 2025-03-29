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
                        <h3 class="card-title">ساخت هتل جدید
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

                                        <form method="post" action="{{ route('admin.hotels.store') }}"
                                              enctype="multipart/form-data" align="center">

                                            @csrf

                                            <!-- Extended default form grid -->
                                            <!-- Grid row -->
                                            <div class="form-col" align="center">
                                                <!-- Default input -->


                                                <div class="form-group row">
                                                    <label for="title"
                                                           class="col-sm-3  col-form-label"><b>نام هتل</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('title') }}" type="text"
                                                               class="form-control " id="title"
                                                               placeholder="نام هتل" name="title">
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
                                                    <label for="star"
                                                           class="col-sm-3  col-form-label"><b>ستاره</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('star') }}" type="text"
                                                               class="form-control " id="star"
                                                               placeholder="ستاره" name="star">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="email"
                                                           class="col-sm-3  col-form-label"><b>ایمیل</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('email') }}" type="text"
                                                               class="form-control " id="email"
                                                               placeholder="ایمیل هتل" name="email">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="website"
                                                           class="col-sm-3  col-form-label"><b>وبسایت</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('website') }}" type="text"
                                                               class="form-control " id="website"
                                                               placeholder="وبسایت هتل" name="website">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="address"
                                                           class="col-sm-3  col-form-label"><b>ادرس</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('address') }}" type="text"
                                                               class="form-control " id="address"
                                                               placeholder="ادرس هتل" name="address">
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
                                                    <label for="user_id"
                                                           class="col-sm-3  col-form-label"><b>مدیر هتل</b></label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="user_id" name="user_id">
                                                            <option>انتخاب کنید</option>
                                                            @foreach($users as $user)
                                                                <option @if(old('user_id') and $user->id == old('user_id')) selected @endif value="{{ $user->id }}">{{ @$user->people->firstName.' '.@$user->people->lastName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="profit"
                                                           class="col-sm-3  col-form-label"><b>درصد سود</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('profit') }}" type="number"
                                                               class="form-control " id="profit"
                                                               placeholder="درصد سود" name="profit">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-sm-9">
                                                        <a href="{{ route('admin.hotels.index') }}" class="btn btn-warning">لغو</a>
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
