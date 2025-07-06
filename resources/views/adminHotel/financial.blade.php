@extends('layouts.adminHotel')
@section('content')
    <div class="w-full h-full overflow-auto noscrollbar flex flex-col gap-7 1024max:pt-[76px] 1024max:gap-0">
        <div class="w-full items-center py-[18px] px-[25px] bg-light hidden 768max:flex">
            <h3 class=" text-base text-green-300 font-medium font-farsi-medium">
                مدیریت رزرو ها
            </h3>
        </div>
        <main class=" w-full h-full p-4.5 rounded-xl bg-neutral-50 overflow-auto flex flex-col gap-6 768max:rounded-none 768max:px-[25px]">
            <!-- بخش وارد کردن اطلاعات برای جستجو -->
            <form action="{{ route('hotel.reservation') }}" method="get" class="w-full p-4.5 bg-light rounded-xl grid gap-2 640max:grid-cols-2 768max:grid-cols-3" style="grid-template-columns: 1fr 1fr 1.1fr 1fr;">
                <!-- انتخاب -->
                {{--<div class="w-full flex flex-col gap-2">
                    <label for="" class=" text-xs text-neutral-700 font-normal">
                        انتخاب کنید
                    </label>
                    <input class=" w-full rounded-[4px] bg-neutral-50 text-neutral-700 placeholder:text-neutral-400 font-normal text-sm h-10 p-2 focus:outline-none focus:border-[1px] focus:border-neutral-400 transition-all duration-200 ease-out" type="text" placeholder="تاریخ ورود">
                </div>--}}
                <!-- تاریخ ورود -->
                <div class="w-full flex flex-col gap-2">
                    <label class=" text-xs text-neutral-700 font-normal">
                        تاریخ ورود
                    </label>
                    <div class="w-full flex items-center">
                        <input value="{{ request('entry_date') }}" name="entry_date" data-jdp class=" w-full rounded-[4px] bg-neutral-50 text-neutral-700 placeholder:text-neutral-400 font-normal text-sm h-10 p-2 focus:outline-none focus:border-[1px] focus:border-neutral-400 transition-all duration-200 ease-out" type="text" placeholder="1403/11/11" dir="rtl">
                        <svg class=" w-4.5 text-green-300 -mr-[25px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>
                </div>
                <!-- تاریخ خروج -->
                <div class="w-full flex flex-col gap-2">
                    <label class=" text-xs text-neutral-700 font-normal">
                        تاریخ خروج
                    </label>
                    <div class="w-full flex items-center">
                        <input value="{{ request('exit_date') }}" name="exit_date" data-jdp class=" w-full rounded-[4px] bg-neutral-50 text-neutral-700 placeholder:text-neutral-400 font-normal text-sm h-10 p-2 focus:outline-none focus:border-[1px] focus:border-neutral-400 transition-all duration-200 ease-out" type="text" placeholder="1403/11/11" dir="rtl">
                        <svg class=" w-4.5 text-green-300 -mr-[25px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>
                </div>
                <!-- نام مسافر ... -->
                <div class="w-full flex flex-col gap-2">
                    <label for="" class=" text-xs text-neutral-700 font-normal">
                        شناسه رزرو / نام مسافر
                    </label>
                    <input value="{{ request('reserve_id') }}" name="reserve_id" class=" w-full rounded-[4px] bg-neutral-50 text-neutral-700 placeholder:text-neutral-400 font-normal text-sm h-10 p-2 focus:outline-none focus:border-[1px] focus:border-neutral-400 transition-all duration-200 ease-out" type="text" placeholder="شناسه رزرو / نام مسافر">
                </div>
                <!-- ذکمه جستجو -->
                <button class="w-full max-w-[140px] h-10 text-sm text-light font-medium flex items-center justify-center px-4.5 rounded-md bg-green-600 transition-all duration-500 hover:bg-green-300 hover:transition-none self-end" type="submit">
                    جستجو
                </button>
            </form>
            <!-- body -->
            <div class="w-full h-full flex flex-col gap-2">
                <!-- هدر این بخش -->
                <div style="grid-template-columns: 1.3fr 1.3fr 1.3fr 1.3fr 1.3fr 1.7fr 1fr;" class="w-full p-4.5 bg-green-300 rounded-xl grid items-center 768max:hidden">
                    <!-- شناسه رزرو -->
                    <div class="w-full flex items-center justify-center">
                            <span class=" text-xs text-light font-normal">
                                شناسه رزرو
                            </span>
                    </div>
                    <!-- نام مسافر/ اتاق -->
                    <div class="w-full flex items-center">
                            <span class=" text-xs text-light font-normal">
                                نام مسافر/ اتاق
                            </span>
                    </div>
                    <!-- تاریخ ورود -->
                    <div class="w-full flex items-center justify-center">
                            <span class=" text-xs text-light font-normal">
                                تاریخ ورود
                            </span>
                    </div>
                    <!-- تاریخ خروج -->
                    <div class="w-full flex items-center justify-center">
                            <span class=" text-xs text-light font-normal">
                                تاریخ خروج
                            </span>
                    </div>
                    <!-- آخرین وضعیت -->
                    <div class="w-full flex items-center justify-center">
                            <span class=" text-xs text-light font-normal">
                                کدرزرو
                            </span>
                    </div>
                    <!-- مبلغ دریافتی -->
                    <div class="w-full flex items-center justify-center">
                            <span class=" text-xs text-light font-normal">
                                مبلغ دریافتی
                            </span>
                    </div>
                </div>
                <!-- اسکرولر و والد ایتم ها -->
                <div class="w-full flex flex-col gap-4.5 overflow-y-scroll flex-grow-[1] flex-shrink-[1] 768max:bg-light 768max:rounded-xl 768max:p-4.5 768max:overflow-hidden">
                    <!-- هدر توی طرح موبایل -->
                    <div class="w-full hidden items-center justify-between 768max:flex">
                        <h5 class=" text-base text-green-600 font-bold">
                            لیست رزرو ها
                        </h5>
                        <button class="flex items-center justify-center gap-2">
                            <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <span class=" text-sm text-neutral-700 font-normal font-farsi-regular">
                                    حذف انتخاب شده ها
                                </span>
                        </button>
                    </div>
                    <!-- items container -->
                    <div class="w-full flex flex-col gap-2 768max:max-w-[800px] 768max:overflow-y-scroll">
                        @foreach($reserves as $reserve)
                            <!-- item -->
                            <div style="grid-template-columns: 1fr 1.7fr 1.4fr 1.4fr 1.3fr 1.7fr 1fr;" class="reservation-item w-full py-4 px-6 grid items-center bg-light rounded-xl 768max:flex 768max:flex-col 768max:gap-[30px] 768max:bg-[#DBF0DD80] 768max:py-[25px] 768max:px-4.5">
                                <!-- شناسه رزرو -->
                                <div class="w-full flex flex-col justify-center items-center gap-1 768max:hidden">
                                    <span class=" text-sm font-medium text-neutral-700">
                                        {{ $reserve->id }}
                                    </span>
                                </div>
                                <!--  نام مسافر/ اتاق + تاریخ اقامت و نوع اتاق و تعداد مهمان در موبایل-->
                                <div class="w-full flex flex-col justify-center gap-1 768max:gap-[21px]">
                                    <div class="flex items-center gap-2">
                                        <div class=" hidden 768max:block">
                                            <input class=" hidden" type="checkbox" id="inputText1" name="">
                                            <label for="inputText1" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                                <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="flex flex-col">
                                            @foreach($reserve->people as $people)
                                                @if($people->people_number == 0)
                                                    <span class=" text-sm font-normal text-neutral-700 768max:font-bold">
                                                    {{ $people->firstName.' '.$people->lastName }}
                                                    <span class=" text-xs font-normal text-neutral-600 768max:font-bold">
                                                        {{ $people->room->title }}
                                                    </span>
                                                </span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="w-full hidden flex-col gap-3 768max:flex">
                                        <div class="w-full flex items-center gap-2">
                                            <span class=" text-xs text-neutral-400 font-normal">
                                                تاریخ اقامت:
                                            </span>
                                            <span class=" text-sm text-neutral-700 font-normal">
                                                {{ $reserve->entry_date.' - '.$reserve->exit_date }}
                                            </span>
                                        </div>
                                        <div class="w-full flex items-center gap-2">
                                            <span class=" text-xs text-neutral-400 font-normal">
                                                نوع اتاق:
                                            </span>
                                            <span class=" text-sm text-neutral-700 font-normal">
                                                @foreach($reserve->people as $people)
                                                    @if($people->people_number == 0)
                                                        <span class=" text-sm font-normal text-neutral-700 768max:font-bold">
                                                    {{ $people->room->title }}
                                                </span>
                                                    @endif
                                                @endforeach
                                            </span>
                                        </div>
                                        <div class="w-full flex items-center gap-2">
                                            <span class=" text-xs text-neutral-400 font-normal">
                                                تعداد نفر :
                                            </span>
                                            <span class=" text-sm text-neutral-700 font-normal">
                                                {{ count($reserve->people) }} نفر
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- تاریخ ورود -->
                                <div class="w-full flex flex-col justify-center items-center gap-1 768max:hidden">
                                    <span class=" text-sm font-normal text-neutral-700">
                                        {{ $reserve->entry_date }}
                                    </span>
                                </div>
                                <!-- تاریخ خروج -->
                                <div class="w-full flex flex-col justify-center items-center gap-1 768max:hidden">
                                    <span class=" text-sm font-normal text-neutral-700">
                                        {{ $reserve->exit_date }}
                                    </span>
                                </div>
                                <!-- آخرین وضعیت -->
                                <div class="w-full flex justify-center items-center gap-1 768max:hidden">
                                    {{ $reserve->code }}
                                </div>

                                <!-- تمبلغ دریافتی -->
                                <div class="w-full flex flex-col justify-center items-center gap-1 768max:hidden">
                                    <span class=" text-sm font-normal text-neutral-700">
                                        {{ $reserve->hotelPrice }}
                                    </span>
                                </div>

                                <!-- دکمه لغو و تایید در موبایل -->
                                <div class="w-full hidden items-center px-[26px] gap-2 768max:flex">
                                    <button class="rounded-[6px] flex items-center justify-center py-2 px-4 text-[14px] text-light font-medium font-farsi-medium bg-green-300 transition-all duration-400 ease-out hover:bg-green-100 hover:text-green-600 w-full flex-grow-[1]">
                                        لغو
                                    </button>
                                    <button class="rounded-[6px] flex items-center justify-center py-2 px-4 text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 w-full flex-grow-[1]">
                                        تایید
                                    </button>
                                </div>
                                <!-- جزئیات رزرو در موبایل -->
                                <div class="w-full hidden grid-cols-2 gap-x-3 gap-y-4.5 768max:grid">
                                    <div class="flex flex-col gap-1">
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            تاریخ رزرو:
                                        </span>
                                        <span class=" text-sm text-neutral-400 font-normal">
                                            {{ $reserve->entry_date }}
                                        </span>
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            زمان رزرو:
                                        </span>
                                        <span class=" text-sm text-neutral-400 font-normal">
                                            12:00
                                        </span>
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            وضعیت پرداخت:
                                        </span>
                                        <span class=" text-sm text-neutral-400 font-normal">
                                            {{ $reserve->paymentStatus }}
                                        </span>
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            مبلغ پرداختی:
                                        </span>
                                        <span class=" text-sm text-neutral-400 font-bold">
                                            {{ $reserve->price }} تومان
                                        </span>
                                    </div>
                                </div>
                                @if ($reserve->factorStatus == 'پرداخت شده')
                                <a href="@if($reserve->file){{ asset('storage/' . $reserve->file->address) }}@endif" class=" text-xs text-green-300 font-normal text-center disabled:text-neutral-400 768max:self-center">
                                    دانلود فاکتور
                                </a>
                                @elseif ($reserve->factorStatus == 'در حال برسی')
                                    <a class=" text-xs text-blue-300 font-normal text-center disabled:text-neutral-400 768max:self-center">
                                        در حال برسی
                                    </a>
                                @elseif ($reserve->factorStatus == 'رد شده')
                                    <a class=" text-xs text-red-300 font-normal text-center disabled:text-neutral-400 768max:self-center">
                                        رد شده
                                    </a>
                                @else
                                    <form method="post" action="{{ route('hotel.requestFactor',$reserve->id) }}">
                                        <button class=" text-xs text-green-300 font-normal text-center disabled:text-neutral-400 768max:self-center">
                                            @csrf
                                            درخواست فاکتور
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        jalaliDatepicker.startWatch();
    </script>
    <script src="{{ asset('src/scripts/reservation.js') }}"></script>
@endsection
