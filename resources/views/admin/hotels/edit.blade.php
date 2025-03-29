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
                        <h3 class="card-title">ویرایش مراقب
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

                                        <form method="post" action="{{ route('admin.hotels.update', $hotel->id) }}"
                                              enctype="multipart/form-data" align="center">
                                            @csrf
                                            @method('PUT')

                                            <!-- Extended default form grid -->
                                            <!-- Grid row -->
                                            <div class="form-col" align="center">
                                                <!-- Default input -->
                                                <div class="form-group row">
                                                    <label for="title"
                                                           class="col-sm-3  col-form-label"><b>نام هتل</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('title', $hotel->title) }}" type="text"
                                                               class="form-control " id="title"
                                                               placeholder="نام هتل" name="title">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="mobile"
                                                           class="col-sm-3  col-form-label"><b>موبایل</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('mobile', $hotel->mobile) }}" type="text"
                                                               class="form-control " id="mobile"
                                                               placeholder="موبایل" name="mobile">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="star"
                                                           class="col-sm-3  col-form-label"><b>ستاره</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('star', $hotel->star) }}" type="text"
                                                               class="form-control " id="star"
                                                               placeholder="ستاره" name="star">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="email"
                                                           class="col-sm-3  col-form-label"><b>ایمیل</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('email', $hotel->email) }}" type="text"
                                                               class="form-control " id="email"
                                                               placeholder="ایمیل هتل" name="email">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="website"
                                                           class="col-sm-3  col-form-label"><b>وبسایت</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('website', $hotel->website) }}" type="text"
                                                               class="form-control " id="website"
                                                               placeholder="وبسایت هتل" name="website">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="address"
                                                           class="col-sm-3  col-form-label"><b>ادرس</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('address', $hotel->address) }}" type="text"
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
                                                                <option @if(old('user_id', $selectedUser) and $user->id == old('user_id', $selectedUser)) selected @endif value="{{ $user->id }}">{{ @$user->people->firstName.' '.@$user->people->lastName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="profit"
                                                           class="col-sm-3  col-form-label"><b>درصد سود</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('profit', $hotel->profit) }}" type="number"
                                                               class="form-control " id="profit"
                                                               placeholder="درصد سود" name="profit">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-sm-9">
                                                        <a href="{{ route('admin.hotels.index') }}" class="btn btn-warning">لغو</a>
                                                        <button type="submit" name="add"
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
                                    <th scope="col">نوع</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($hotel->rooms as $row)
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

    <script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>

@endsection
