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
                <div class="card collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">ویرایش هتل
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

                                        <div class="w-full grid grid-cols-[200px_1fr] gap-4.5 640max:grid-cols-1 p-4">
                                            <!-- profile image -->
                                            <div class="w-full flex flex-col gap-2 ml-2">
                                                <label for="" class=" text-base text-neutral-700 font-normal">
                                                    لوگو:
                                                </label>
                                                <div class="w-full aspect-square relative rounded-xl overflow-hidden group 512max:w-[180max] 640max:w-[200px]">
                                                    <img id="profileImgElem" src="{{ asset('storage/' . $hotel->logo) }}" class=" w-full h-full object-cover absolute z-[3] top-0 left-0">
                                                </div>
                                            </div>
                                            <!-- banner image -->
                                            <div class="w-full flex flex-col gap-2 mr-2">
                                                <label for="" class=" text-base text-neutral-700 font-normal">
                                                    بنر:
                                                </label>
                                                <div class="w-full h-[200px] relative rounded-xl overflow-hidden group 512max:h-[177px]">
                                                    <img id="bannerImgElem" src="{{ asset('storage/' . $hotel->banner) }}" class=" w-full h-full object-cover absolute z-[3] top-0 left-0">
                                                </div>
                                            </div>
                                        </div>

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
                                                    <label for="status"
                                                           class="col-sm-3  col-form-label"><b>وضعیت</b></label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="status" name="status">
                                                            <option>انتخاب کنید</option>
                                                            <option @if(old('status', $hotel->status) and 'در انتظار تایید' == old('status', $hotel->status)) selected @endif value="در انتظار تایید">در انتظار تایید</option>
                                                            <option @if(old('status', $hotel->status) and 'تایید شده' == old('status', $hotel->status)) selected @endif value="تایید شده">تایید شده</option>
                                                            <option @if(old('status', $hotel->status) and 'رد شده' == old('status', $hotel->status)) selected @endif value="رد شده">رد شده</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="changeStatus"
                                                           class="col-sm-3  col-form-label"><b>توضیحات تغییر وضعیت</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('changeStatus') }}" type="text"
                                                               class="form-control " id="changeStatus"
                                                               placeholder="توضیحات" name="changeStatus">
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





                    </div>
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="card collapsed-card">
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
                    <div style="overflow-x: auto" class="card-body">
                        <div class="col-lg-12">

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">



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
            </div>
        </div>




        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">لیست رزرو ها و فاکتور ها
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

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">



                                        <table id="dataTable2" class="table table-bordered" style="width: 120%">
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

                                            @foreach($hotel->reserves as $row)
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

                                                            <a href="{{route('admin.reserve.edit', $row->id)}}"
                                                               class="btn btn-sm btn-primary ml-1 mt-1 float-left">
                                                                <span class="fas fa-pencil-alt fa-fw" aria-hidden="true"></span>
                                                                <span class="sr-only">ویرایش</span>
                                                            </a>
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
    </div>

    <script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>

@endsection
