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

                                        <form method="post" action="{{ route('admin.rooms.update', $room->id) }}"
                                              enctype="multipart/form-data" align="center">
                                            @csrf
                                            @method('PUT')

                                            <!-- Extended default form grid -->
                                            <!-- Grid row -->
                                            <div class="form-col" align="center">
                                                <!-- Default input -->
                                                <div class="form-group row">
                                                    <label for="title"
                                                           class="col-sm-3  col-form-label"><b>نام اتاق</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('title', $room->title) }}" type="text"
                                                               class="form-control " id="title"
                                                               placeholder="نام اتاق" name="title">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="type"
                                                           class="col-sm-3  col-form-label"><b>نوع</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('type', $room->type) }}" type="text"
                                                               class="form-control " id="email"
                                                               placeholder="نوع اتاق" name="email">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="single"
                                                           class="col-sm-3  col-form-label"><b>تخت سینگل</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('single', $room->single) }}" type="text"
                                                               class="form-control " id="single"
                                                               placeholder="تخت سینگل" name="single">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="double"
                                                           class="col-sm-3  col-form-label"><b>تخت دبل</b></label>
                                                    <div class="col-sm-8">
                                                        <input value="{{ old('double', $room->double) }}" type="text"
                                                               class="form-control " id="double"
                                                               placeholder="تخت دبل" name="double">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    @foreach($room->files as $index => $file)
                                                        <!-- item -->
                                                        <a href="#" class="edit-room-image w-full @if($index == 0) aspect-497/335 @else aspect-241/163 @endif rounded-[14px]">
                                                            <img src="{{ asset('storage/' . $file->address) }}" alt="#" class="w-full h-full object-cover rounded-[14px]">
                                                        </a>
                                                    @endforeach
                                                </div>


                                                <div class="form-group row">
                                                    <label for="status"
                                                           class="col-sm-3  col-form-label"><b>وضعیت</b></label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="status" name="status">
                                                            <option>انتخاب کنید</option>
                                                            <option @if(old('status', $room->status) and 'در انتظار تایید' == old('status', $room->status)) selected @endif value="در انتظار تایید">در انتظار تایید</option>
                                                            <option @if(old('status', $room->status) and 'تایید شده' == old('status', $room->status)) selected @endif value="تایید شده">تایید شده</option>
                                                            <option @if(old('status', $room->status) and 'رد شده' == old('status', $room->status)) selected @endif value="رد شده">رد شده</option>
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
    </div>

    <script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>

@endsection
