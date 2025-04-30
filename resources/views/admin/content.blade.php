@extends('admin.admin')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ env('APP_NAME') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>داشبرد</h3>
                </div>
            </div>

            @if(auth()->user()->type == 'admin')
            <div class="row" style="padding-top: 1rem;position:relative;">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div style="overflow-x: auto;" class="card-header d-flex justify-content-between align-items-center">

                        </div>

                        <div style="overflow-x: auto;" class="card-body">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $data['users'] }}</h3>

                                        <p>تعداد کاربر</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer"></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $data['priceReserve'] }}</h3>

                                        <p>درامد دریافتی</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer"></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $data['countReserve'] }}</h3>

                                        <p>تعداد رزرو هتل</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(auth()->user()->type == 'agency')
                <div class="row" style="padding-top: 1rem;position:relative;">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div style="overflow-x: auto;" class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">لینک معرفی شما</h3>
                            </div>
                            <div style="overflow-x: auto;" class="card-body">
                                <div class="form-group">
                                    <label>لینک معرفی:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="shareLink" class="form-control" value="{{ url('/login?code=' . urlencode(Crypt::encrypt(\Illuminate\Support\Facades\Auth::guard('admin')->user()->id))) }}" readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" onclick="copyShareLink()">کپی</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{ $data['agencyUsers']->count() }}</h3>

                                            <p>تعداد کاربر ثبت نام کرده</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="#" class="small-box-footer"></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{ $data['agencyReserves'] }}</h3>

                                            <p>تعداد رزرو های انجام شده</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="#" class="small-box-footer"></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{ $data['agencyPrices'] }}</h3>

                                            <p>سود کل دریافتی</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="#" class="small-box-footer"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function copyShareLink() {
                        var copyText = document.getElementById("shareLink");
                        copyText.select();
                        copyText.setSelectionRange(0, 99999);
                        document.execCommand("copy");
                        alert("لینک کپی شد: " + copyText.value);
                    }
                </script>


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
                                                        <th scope="col">نام و نام خانوادگی</th>
                                                        <th scope="col">مبلغ سود</th>
                                                        <th scope="col">وضعیت رزرو</th>
                                                        <th scope="col">وضعیت فاکتور</th>
                                                        <th scope="col">عملیات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($data['agencyUsers'] as $row)
                                                        <tr>
                                                            <td>{{ $row->id }}</td>
                                                            <td>{{ $row->user->people->firstName." ".$row->user->people->lastName }}</td>
                                                            <td>{{ @$row->reserve->agencyPrice }}</td>
                                                            <td>@if($row->reserve_id) رزرو شده @endif</td>
                                                            <td>{{ $row->status }}</td>
                                                            <td style="padding: 0 !important;">
                                                                <div class="d-flex align-items-center" style="gap: 5px;">
                                                                    <!-- فرم رد کردن -->
                                                                    <form style="display: inline" action="{{route('admin.financialChangeStatus', $row->id)}}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="status" value="0">
                                                                        <button type="submit" class="btn btn-sm btn-primary" title="رد کردن">
                                                                            درخواست فاکتور
                                                                        </button>
                                                                    </form>
{{--
                                                                    <!-- فرم تایید -->
                                                                    <form style="display: inline" action="{{route('admin.financialChangeStatus', $row->id)}}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="status" value="1">

                                                                        <!-- Input فایل که ابتدا مخفی است -->
                                                                        <input type="file" name="file" id="fileInput-{{$row->id}}" style="display: none" onchange="this.form.submit()">

                                                                        <button type="button" class="btn btn-sm btn-success" title="تایید" onclick="document.getElementById('fileInput-{{$row->id}}').click()">
                                                                            <i class="fas fa-check-circle"></i>
                                                                        </button>
                                                                    </form>--}}
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
            @endif



        </div>
    </section>
@endsection
