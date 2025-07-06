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
            <form action="{{ route('hotel.reservation') }}" method="get" class="w-full p-4.5 bg-light rounded-xl grid grid-cols-[1.1fr_1fr_1fr_1.1fr_1fr] gap-2 640max:grid-cols-2 768max:grid-cols-3">
                <!-- انتخاب -->
                <div class="w-full flex flex-col gap-2">
                    <label for="" class=" text-xs text-neutral-700 font-normal">
                        انتخاب کنید
                    </label>
                    <input class=" w-full rounded-[4px] bg-neutral-50 text-neutral-700 placeholder:text-neutral-400 font-normal text-sm h-10 p-2 focus:outline-none focus:border-[1px] focus:border-neutral-400 transition-all duration-200 ease-out" type="text" placeholder="تاریخ ورود">
                </div>
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
                <div style="grid-template-columns: 1.3fr 2.3fr 1.3fr 1.3fr 1.7fr 1fr 1fr;" class="w-full p-4.5 bg-green-300 rounded-xl grid items-center 768max:hidden">
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
                    <!-- تاریخ ویرایش -->
                    <div class="w-full flex items-center justify-center">
                            <span class=" text-xs text-light font-normal">
                                تاریخ ویرایش
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
                            <div style="    grid-template-columns: 1.3fr 2.3fr 1.3fr 1.3fr 1.7fr 1fr 1fr;" class="reservation-item w-full py-4 px-6 grid items-center bg-light rounded-xl 768max:flex 768max:flex-col 768max:gap-[30px] 768max:bg-[#DBF0DD80] 768max:py-[25px] 768max:px-4.5">
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
                                <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
                                <!-- آخرین وضعیت -->
                                <div class="w-full flex justify-center items-center gap-1 768max:hidden">
                                    <input
                                        x-data="{ value: '{{ $reserve->code }}', loading: false }"
                                        x-model="value"
                                        x-on:change.debounce.500ms="
            loading = true;
            fetch('{{ route('hotel.reservation.editCode') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    reserve_id: {{ $reserve->id }},
                    new_code: value
                })
            })
            .then(response => {
                if (!response.ok) throw new Error('خطا در بروزرسانی');
                return response.json();
            })
            .catch(error => {
                console.error(error);
                // برگرداندن مقدار قبلی در صورت خطا
                value = '{{ $reserve->code }}';
            })
            .finally(() => loading = false);
        "
                                        :disabled="loading"
                                        class="border rounded px-2 py-1 text-center"
                                        type="text"
                                    >
                                </div>


                                <div class="w-full flex justify-center items-center gap-1 768max:hidden">
                                    {{ $reserve->editDate }}
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
                                <!-- دکمه جزئیات بیشتر -->
                                <a onclick="openEditPopUp(roomReservationProperties, {{ json_encode($reserve) }})" class=" text-xs text-green-300 font-normal text-center disabled:text-neutral-400 768max:self-center">
                                    جزئیات بیشتر
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full grid grid-cols-[1fr_1fr_1fr_1.5fr] gap-4.5 512max:grid-cols-1 512max:gap-4.5 768max:grid-cols-2 1024max:grid-cols-3 1280max:gap-3 1280max:grid-cols-4">
                    <div class="w-full flex flex-col items-center justify-center gap-[21px] p-4.5 rounded-xl bg-green-600 h-[117px]">
                            <span class=" text-sm text-light font-normal text-center">
                                تعداد رزرو های امروز
                            </span>
                        <span class=" text-[18px] text-light font-medium text-center">
                                {{ $todayReserves }} رزرو
                            </span>
                    </div>
                    <div class="w-full flex flex-col items-center justify-center gap-[21px] p-4.5 rounded-xl bg-green-600 h-[117px]">
                            <span class=" text-sm text-light font-normal text-center">
                                تعداد رزرو های هفته
                            </span>
                        <span class=" text-[18px] text-light font-medium text-center">
                                {{ $weeklyReserves }} رزرو
                            </span>
                    </div>
                    <div class="w-full flex flex-col items-center justify-center gap-[21px] p-4.5 rounded-xl bg-green-600 h-[117px]">
                            <span class=" text-sm text-light font-normal text-center">
                                تعداد رزرو های سال
                            </span>
                        <span class=" text-[18px] text-light font-medium text-center">
                                {{ $yearlyReserves }} رزرو
                            </span>
                    </div>
                    <div class="w-full flex flex-col items-center justify-center gap-[21px] p-4.5 rounded-xl bg-green-600 h-[117px]">
                            <span class=" text-sm text-light font-normal text-center">
                                درآمد نهایی سال
                            </span>
                        <span class=" text-[20px] text-light font-bold text-center 1280max:text-[18px]">
                                {{ $yearlyIncome }} تومان
                            </span>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- پاپ جزئیات رزرو اتاق -->
    <div class="roomReservationProperties modal w-[100vw] h-[100vh] fixed z-[15] top-0 left-0 bg-[#0000002c] px-6 py-4">
        <div class=" modal-content w-full h-full flex items-center justify-center">
            <div class="w-full max-w-[800px] p-4.5 bg-light rounded-xl flex flex-col gap-[68px]">
                <!-- body -->
                <div id="modalOptions" class="w-full flex flex-col gap-2">
                    <!--  -->
                    <div class="w-full py-[13px] px-4.5 rounded-xl bg-neutral-50">
                        <h6 class=" text-sm text-green-600 font-normal">
                            جزئیات رزرو اتاق
                        </h6>
                    </div>
                    <!--  -->
                    <div class="w-full rounded-xl bg-neutral-50 p-4.5 min-h-[200px] grid grid-cols-3 gap-x-2 gap-y-4.5 items-start 512max:grid-cols-1 content-start 768max:grid-cols-2">
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    نام مسافر:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    رضا پورتقی
                                </span>
                        </div>
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    اتاق:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    1403/11/20
                                </span>
                        </div>
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    تاریخ ورود:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    1 اتاق سینگل اکونومی
                                </span>
                        </div>
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    تاریخ خروج:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    1403/11/20
                                </span>
                        </div>
                        <!-- item -->
                        {{--<div class="w-full flex items-center gap-1">
                            <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                شماره اتاق:
                            </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                321
                            </span>
                        </div>--}}
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    شناسه رزرو:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    841128695
                                </span>
                        </div>
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    تعداد مهمان:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    1 نفر
                                </span>
                        </div>
                        <!-- item -->
                        {{--<div class="w-full flex items-center gap-1">
                            <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                شماره تماس:
                            </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                09197563483
                            </span>
                        </div>--}}
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    کد ملی مسافر:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    571756348
                                </span>
                        </div>
                    </div>
                    <!--  -->
                    <div class="w-full rounded-xl bg-green-100 p-4.5 grid grid-cols-3 gap-x-2 gap-y-4.5 items-start content-start 512max:grid-cols-1 768max:grid-cols-2">
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    زمان رزرو:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    12:30
                                </span>
                        </div>
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    شناسه پرداخت:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    843621790
                                </span>
                        </div>
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    مبلغ پرداختی:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    6,336,500 تومان
                                </span>
                        </div>
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    وضعیت پرداخت:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    پرداخت شد
                                </span>
                        </div>
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    تاریخ رزرو:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    1403/12/24
                                </span>
                        </div>
                    </div>
                </div>
                <!-- buttons -->
                <div class="w-full flex items-center gap-4.5 justify-end 640max:gap-2">
                    {{--<button class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 640max:min-w-[0px] 640max:flex-grow-[1] 640max:px-2 640max:text-xs">
                        لغو رزرو
                    </button>
                    <a href="#" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 640max:min-w-[0px] 640max:flex-grow-[1] 640max:px-2 640max:text-xs">
                        ارسال پیام
                    </a>--}}
                    <button onclick="modalController(roomReservationProperties)" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-300 transition-all duration-400 ease-out hover:bg-green-100 hover:text-green-600 640max:min-w-[0px] 640max:flex-grow-[1] 640max:px-2 640max:text-xs">
                        بازگشت
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        jalaliDatepicker.startWatch();
    </script>
    <script src="{{ asset('src/scripts/reservation.js') }}"></script>
    <script>
        function openEditPopUp(modal, reserve) {
            modal.classList.toggle('active');
            var tag  = `<!--  -->
                    <div class="w-full py-[13px] px-4.5 rounded-xl bg-neutral-50">
                        <h6 class=" text-sm text-green-600 font-normal">
                            جزئیات رزرو اتاق
                        </h6>
                    </div>
                    <!--  -->
                    <div class="w-full rounded-xl bg-neutral-50 p-4.5 min-h-[200px] grid grid-cols-3 gap-x-2 gap-y-4.5 items-start 512max:grid-cols-1 content-start 768max:grid-cols-2">
                        `;
            reserve.people.forEach(item => {
                if (item.people_number == 0){
                    tag += `<!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    نام مسافر:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    ${item.firstName+' '+item.lastName}
                                </span>
                        </div>
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    اتاق:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    ${item.room.title}
                                </span>
                        </div>
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    کد ملی مسافر:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    ${item.nationalCode}
                                </span>
                        </div>`;
                }
            });
            tag += `<!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    تاریخ ورود:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    ${ reserve.entry_date }
                                </span>
                        </div>
                        <!-- item -->
                        <div class="w-full flex items-center gap-1">
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    تاریخ خروج:
                                </span>
                            <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                                    ${ reserve.exit_date }
                                </span>
                        </div>
            <!-- item -->
            <div class="w-full flex items-center gap-1">
                    <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                        شناسه رزرو:
                    </span>
                <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                        ${ reserve.id }
                    </span>
            </div>
            <!-- item -->
            <div class="w-full flex items-center gap-1">
                    <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                        تعداد نفر:
                    </span>
                <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                        ${ reserve.people.length } نفر
                    </span>
            </div>
        </div>
        <!--  -->
        <div class="w-full rounded-xl bg-green-100 p-4.5 grid grid-cols-3 gap-x-2 gap-y-4.5 items-start content-start 512max:grid-cols-1 768max:grid-cols-2">
            <!-- item -->
            <div class="w-full flex items-center gap-1">
                    <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                        زمان رزرو:
                    </span>
                <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                        12:30
                    </span>
            </div>
            <!-- item -->
            <div class="w-full flex items-center gap-1">
                    <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                        شناسه پرداخت:
                    </span>
                <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                        ${ reserve.paymentCode }
                    </span>
            </div>
            <!-- item -->
            <div class="w-full flex items-center gap-1">
                    <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                        مبلغ پرداختی:
                    </span>
                <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                        ${ reserve.price } تومان
                    </span>
            </div>
            <!-- item -->
            <div class="w-full flex items-center gap-1">
                    <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                        وضعیت پرداخت:
                    </span>
                <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                        ${ reserve.paymentStatus }
                    </span>
            </div>
            <!-- item -->
            <div class="w-full flex items-center gap-1">
                    <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                        تاریخ رزرو:
                    </span>
                <span class=" text-sm text-neutral-700 font-normal 512max:text-xs">
                        ${ reserve.created_at }
                    </span>
            </div>
        </div>`;
            document.getElementById('modalOptions').innerHTML = tag;
        }
    </script>
@endsection
