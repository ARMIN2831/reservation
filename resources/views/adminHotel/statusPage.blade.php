@extends('layouts.adminHotel')
@section('content')
        <div class="w-full h-full overflow-auto noscrollbar flex flex-col gap-7 1024max:pt-[76px] 1024max:gap-0">
            <div class="w-full items-center py-[18px] px-[25px] bg-light hidden 768max:flex">
                <h3 class=" text-base text-green-300 font-medium font-farsi-medium">
                    گزارشات و آمار
                </h3>
            </div>
            <main class=" w-full h-full p-4.5 rounded-xl bg-neutral-50 overflow-auto flex flex-col gap-4.5 768max:rounded-none 768max:px-[25px]">
                <div class="w-full">
                    <form action="#" class="w-full flex flex-col gap-4.5">
                        <!-- body -->
                        <div class="w-full flex flex-col gap-2">
                            <div class="accordiion active w-full flex flex-col">
                                <!-- button -->
                                <div class="accordiion-button w-full flex items-center py-3 px-4.5 bg-light gap-2">
                                    <svg class=" w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class=" text-base font-medium">
                                        گزارشات مالی
                                    </span>
                                </div>
                                <!-- content -->
                                <div class="accordiion-content w-full flex flex-col gap-4.5 p-4.5 bg-light overflow-hidden">
                                    <div class="w-full grid grid-cols-4 gap-[22px] 512max:grid-cols-1 512max:gap-4.5 768max:grid-cols-2 1280max:gap-3">
                                        <!-- item -->
                                        <div class="w-full flex flex-col gap-4.5 p-4.5 pb-[21px] rounded-xl bg-green-300 512max:pb-4.5">
                                            <span class=" text-base text-light font-normal 512max:self-center">
                                                درآمد روزانه
                                            </span>
                                            <div class=" flex items-center gap-1 self-center justify-center flex-wrap">
                                                <span class=" text-[20px] text-light font-bold">
                                                    {{ $incomes['daily'] }}
                                                </span>
                                                <span class=" text-sm text-light font-normal">
                                                    تومان
                                                </span>
                                            </div>
                                        </div>
                                        <!-- item -->
                                        <div class="w-full flex flex-col gap-4.5 p-4.5 pb-[21px] rounded-xl bg-green-300 512max:pb-4.5">
                                            <span class=" text-base text-light font-normal 512max:self-center">
                                                درآمد ماهانه
                                            </span>
                                            <div class=" flex items-center gap-1 self-center justify-center flex-wrap">
                                                <span class=" text-[20px] text-light font-bold">
                                                    {{ $incomes['monthly'] }}
                                                </span>
                                                <span class=" text-sm text-light font-normal">
                                                    تومان
                                                </span>
                                            </div>
                                        </div>
                                        <!-- item -->
                                        <div class="w-full flex flex-col gap-4.5 p-4.5 pb-[21px] rounded-xl bg-green-300 512max:pb-4.5">
                                            <span class=" text-base text-light font-normal 512max:self-center">
                                                درآمد سالانه
                                            </span>
                                            <div class=" flex items-center gap-1 self-center justify-center flex-wrap">
                                                <span class=" text-[20px] text-light font-bold">
                                                    {{ $incomes['yearly'] }}
                                                </span>
                                                <span class=" text-sm text-light font-normal">
                                                    تومان
                                                </span>
                                            </div>
                                        </div>
                                        {{--<!-- item -->
                                        <div class="w-full flex flex-col gap-4.5 p-4.5 pb-[21px] rounded-xl bg-green-300 512max:pb-4.5">
                                            <span class=" text-base text-light font-normal 512max:self-center">
                                                هزینه های اضافی
                                            </span>
                                            <div class=" flex items-center gap-1 self-center justify-center flex-wrap">
                                                <span class=" text-[20px] text-light font-bold">
                                                    21,364,346,346
                                                </span>
                                                <span class=" text-sm text-light font-normal">
                                                    تومان
                                                </span>
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            {{--<div class="accordiion active w-full flex flex-col">
                                <!-- button -->
                                <div class="accordiion-button w-full flex items-center py-3 px-4.5 bg-light gap-2">
                                    <svg class=" w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class=" text-base font-medium">
                                        میزان اشغال اتاق ها
                                    </span>
                                </div>
                                <!-- content -->
                                <div class="accordiion-content w-full flex flex-col gap-4.5 p-4.5 bg-light overflow-hidden">
                                    <canvas id="myChart" class=" min-h-[300px]"></canvas>
                                </div>
                            </div>--}}
                            {{--<div class="accordiion w-full flex flex-col">
                                <!-- button -->
                                <div class="accordiion-button w-full flex items-center py-3 px-4.5 bg-light gap-2">
                                    <svg class=" w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class=" text-base font-medium">
                                        مشتریان برتر
                                    </span>
                                </div>
                                <!-- content -->
                                <div class="accordiion-content w-full flex flex-col gap-4.5 p-4.5 bg-light overflow-hidden">
                                    <div class="w-full">
                                        <div class="w-full grid grid-cols-2 gap-4.5 content-start 768max:grid-cols-1">
                                            <div class="w-full flex flex-col gap-4.5 rounded-xl bg-neutral-50 p-2">
                                                <!-- header -->
                                                <div class="w-full flex items-center gap-2 rounded-xl bg-green-300 p-4.5 pt-[14px]">
                                                    <span class=" text-base text-light font-normal">
                                                        برترین مشتریان
                                                    </span>
                                                </div>
                                                <!-- body -->
                                                <div class="w-full flex flex-col gap-2">
                                                    <div class=" w-full flex justify-between items-center px-4.5 py-[10px] rounded-xl bg-[#DBF0DD80]">
                                                        <span class=" text-xs text-neutral-700 font-normal">
                                                            نام مشتری
                                                        </span>
                                                        <span class=" text-xs text-neutral-700 font-normal 768max:hidden">
                                                            کد ملی
                                                        </span>
                                                        <span class=" text-xs text-neutral-700 font-normal">
                                                            تعداد رزرو
                                                        </span>
                                                    </div>
                                                    <ul class="best-persons-list-container max-h-[500px] overflow-auto noscrollbar w-full flex flex-col gap-2">
                                                        <!-- item -->
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <img src="../icons/rank1.svg" alt="#" class="w-[14px]">
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <!-- item -->
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <img src="../icons/rank2.svg" alt="#" class="w-[14px]">
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <!-- item -->
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <img src="../icons/rank3.svg" alt="#" class="w-[14px]">
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="w-full flex flex-col gap-4.5 rounded-xl bg-neutral-50 p-2">
                                                <!-- header -->
                                                <div class="w-full flex items-center gap-2 rounded-xl bg-green-300 p-4.5 pt-[14px]">
                                                    <span class=" text-base text-light font-normal">
                                                        برترین مشتریان سال 1403
                                                    </span>
                                                </div>
                                                <!-- body -->
                                                <div class="w-full flex flex-col gap-2">
                                                    <div class=" w-full flex justify-between items-center px-4.5 py-[10px] rounded-xl bg-[#DBF0DD80]">
                                                        <span class=" text-xs text-neutral-700 font-normal">
                                                            نام مشتری
                                                        </span>
                                                        <span class=" text-xs text-neutral-700 font-normal">
                                                            کد ملی
                                                        </span>
                                                        <span class=" text-xs text-neutral-700 font-normal">
                                                            تعداد رزرو
                                                        </span>
                                                    </div>
                                                    <ul class="best-persons-list-container  max-h-[500px] overflow-auto noscrollbar w-full flex flex-col gap-2">
                                                        <!-- item -->
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <img src="../icons/rank1.svg" alt="#" class="w-[14px]">
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <!-- item -->
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <img src="../icons/rank2.svg" alt="#" class="w-[14px]">
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <!-- item -->
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <img src="../icons/rank3.svg" alt="#" class="w-[14px]">
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li class="best-persons-list w-full flex items-center justify-between p-4.5 rounded-xl bg-light">
                                                            <!-- name -->
                                                            <div class="flex items-center gap-2">
                                                                <span class="list-number-elem hidden text-sm text-neutral-700 font-normal">

                                                                </span>
                                                                <span class=" text-sm text-neutral-700 font-normal">
                                                                    رضا پورتقی
                                                                </span>
                                                            </div>
                                                            <!-- national code -->
                                                            <div class="flex items-center 512max:hidden">
                                                                <span class=" text-sm text-neutral-400 font-normal">
                                                                    571756348
                                                                </span>
                                                            </div>
                                                            <!-- reserve number -->
                                                            <div class="flex items-center">
                                                                <span class=" text-sm text-green-300 font-bold">
                                                                    32 رزرو
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="accordiion w-full flex flex-col">
                                <!-- button -->
                                <div class="accordiion-button w-full flex items-center py-3 px-4.5 bg-light gap-2">
                                    <svg class=" w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class=" text-base font-medium">
                                        نظرات اخیر
                                    </span>
                                </div>
                                <!-- content -->
                                <div class="accordiion-content w-full flex flex-col gap-4.5 p-4.5 bg-light overflow-hidden">
                                    <div class="w-full grid grid-cols-[1fr_246px] 768max:grid-cols-1 1280max:grid-cols-[1fr_200px] gap-[21px]">
                                        <!-- comments -->
                                        <div class="w-full flex flex-col gap-4.5 rounded-xl p-4.5 bg-neutral-50">
                                            <!-- header -->
                                            <div class="w-full flex items-center justify-between">
                                                <div class="flex items-center gap-2">
                                                    <h5 class=" text-base text-neutral-400 font-medium">
                                                        نظرات
                                                    </h5>
                                                    <span class="hidden text-xs text-neutral-400 font-normal 768max:inline">
                                                        (0 نظر)
                                                    </span>
                                                </div>
                                                <div class="hidden items-center gap-2 768max:flex">
                                                    <!-- star icon -->
                                                    <svg class=" w-[15px] text-green-300" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.37446 11.9555L7.5005 10.1039L10.6265 11.9798L9.80781 8.47153L12.5617 6.13267L8.93946 5.81595L7.5005 2.50258L6.06153 5.79159L2.4393 6.10831L5.19319 8.47153L4.37446 11.9555ZM2.86107 14L4.09163 8.82236L0 5.34136L5.38968 4.88334L7.5005 0L9.61131 4.88236L15 5.34039L10.9084 8.82138L12.1399 13.999L7.5005 11.2509L2.86107 14Z" fill="currentColor"/>
                                                    </svg>
                                                    <!-- text -->
                                                     <span class=" text-base text-green-300 font-bold">
                                                        امتیاز 0 از 5
                                                     </span>
                                                </div>
                                            </div>
                                            <!-- items -->
                                            {{--
                                            <ul class="w-full flex flex-col max-h-[537px] overflow-auto noscrollbar">
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                                <li class=" w-full flex flex-col py-4.5 gap-2 border-t-[1px] border-neutral-200">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                        <span class=" text-base text-green-600 font-medium">
                                                            رامین راستاد
                                                        </span>
                                                        <div class="flex items-center  gap-[6px]">
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                            <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" text-xs text-neutral-700 leading-[21px] font-normal">
                                                        تجربه من با خدمات رزرو هتل چمدون فوق‌العاده بود. تنوع گزینه‌ها، اطلاعات دقیق هتل‌ها و قیمت‌های رقابتی باعث شد بهترین انتخاب رو داشته باشم. فرآیند رزرو هم سریع و بی‌دردسر انجام شد. از پشتیبانی عالی‌شون هم بسیار راضی‌ام!
                                                    </p>
                                                </li>
                                            </ul>
                                            --}}
                                        </div>
                                        <!-- info -->
                                        <ul class="w-full flex flex-col gap-[21px] 768max:hidden">
                                            <li class=" h-[191px] rounded-xl bg-green-300 flex flex-col items-center justify-center gap-4.5">
                                                <span class=" text-base text-light font-bold">
                                                    امتیاز فعلی
                                                </span>
                                                <span class=" text-[24px] text-light font-bold">
                                                    0 از 5
                                                </span>
                                            </li>
                                            <li class=" h-[191px] rounded-xl bg-green-300 flex flex-col items-center justify-center gap-4.5">
                                                <span class=" text-base text-light font-bold">
                                                    تعداد کامنت ثبت شده
                                                </span>
                                                <span class=" text-[24px] text-light font-bold">
                                                    0
                                                </span>
                                            </li>
                                            <li class=" h-[191px] rounded-xl bg-green-300 flex flex-col items-center justify-center gap-4.5">
                                                <span class=" text-base text-light font-bold">
                                                    تعداد امتیاز ثبت شده
                                                </span>
                                                <span class=" text-[24px] text-light font-bold">
                                                    0
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>


        <!-- modals -->
        <!-- پاپ اپ افزودن تصویر -->
        <div class="roomsNewImage modal w-[100vw] h-[100vh] fixed z-[15] top-0 left-0 bg-[#0000002c] px-6 py-4">
            <div class=" modal-content w-full h-full flex items-center justify-center">
                <form action="#" class="w-full max-w-[800px] p-4.5 bg-light rounded-xl flex flex-col">
                    <div class="w-full flex flex-col gap-8 max-h-[500px] overflow-y-auto">
                        <!-- header -->
                        <div class="w-full py-[13px] px-4.5 rounded-xl bg-neutral-50">
                            <h6 class=" text-[14px] text-green-600 font-normal font-farsi-regular">
                                افزودن عکس جدید
                            </h6>
                        </div>
                        <!-- body -->
                        <div class="w-full flex flex-col gap-4.5 px-4.5 640max:px-0">
                            <!-- input -->
                            <div class="w-full flex flex-col gap-2">
                                <label for="" class=" text-sm text-neutral-700 font-normal font-farsi-regular">
                                    عنوان عکس:
                                </label>
                                <div class="w-full flex items-center gap-2 768max:flex-col 768max:items-start">
                                    <input type="text" class=" w-[313px] rounded-xl bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-0 focus:border-[0px] 640max:w-full">
                                    <p class=" text-xs text-neutral-400 font-normal font-farsi-regular">
                                        حجم فایل باید کمتر از 100 کیلوبایت و با فرمت jpg. باشد.
                                    </p>
                                </div>
                            </div>
                            <!-- drop box -->
                            <div class="dropArea w-full p-4.5 flex flex-col items-center justify-center gap-2 rounded-xl bg-neutral-50 border-dashed border-green-300 border-[1px] h-[203px]">
                                <p class="dropAreaText text-sm text-neutral-400 font-normal font-farsi-regular 640max:text-xs">
                                    عکس جدید را بارگذاری کنید
                                </p>
                                <p class="dropAreaText text-sm text-neutral-400 font-normal font-farsi-regular text-center 640max:text-xs">
                                    عکس جدید را میتوانید با کشیدن و قرار دادن در این بخش یا با انتخاب از
                                    <label class=" text-green-600 underline cursor-pointer" for="fileInput">
                                        مدیریت فایل ها
                                    </label>
                                     بارگذاری کنید
                                </p>
                                <!-- المان ها وقتی فایلی انتخاب شده -->
                                <p class="filename hidden text-xl text-light font-bold 640max:text-base">

                                </p>
                                <p class="filesize hidden text-base text-light font-normal text-center 640max:text-sm">

                                </p>
                                <input class="hidden" id="fileInput" type="file" accept="image/jpg">
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex items-center justify-end gap-4.5 pt-4.5">
                        <button onclick="modalController(addImagePopUp)" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-300 transition-all duration-400 ease-out hover:bg-green-100 hover:text-green-600 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                            بازگشت
                        </button>
                        <button onclick="modalController(addImagePopUp)" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                            ذخیره
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- پاپ اپ افزودن کاربر جدید -->
        <div class="roomsNewImage modal w-[100vw] h-[100vh] fixed z-[15] top-0 left-0 bg-[#0000002c] px-6 py-4">
            <div class=" modal-content w-full h-full flex items-center justify-center">
                <form action="#" class="w-full max-w-[800px] min-h-[580px] p-4.5 bg-light rounded-xl flex flex-col">
                    <div class="w-full flex-grow-[1] flex flex-col gap-8 max-h-[500px] overflow-y-auto">
                        <!-- header -->
                        <div class="w-full py-[13px] px-4.5 rounded-xl bg-neutral-50">
                            <h6 class=" text-[14px] text-green-600 font-normal font-farsi-regular">
                                افزودن کاربر جدید
                            </h6>
                        </div>
                        <!-- body -->
                        <div class="w-full grid grid-cols-2 gap-4.5 512max:grid-cols-1">
                            <div class="w-full flex flex-col gap-2">
                                <label for="" class=" text-sm text-neutral-700 font-normal">
                                    نام کاربری :
                                </label>
                                <input id="" name="" placeholder="نام کاربری" type="text" class=" w-full rounded-[6px] bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400">
                            </div>
                            <div class="w-full flex flex-col gap-2">
                                <label for="" class=" text-sm text-neutral-700 font-normal">
                                    ایمیل :
                                </label>
                                <input id="" name="" placeholder="ایمیل" type="text" class=" w-full rounded-[6px] bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400">
                            </div>
                            <div class="w-full flex flex-col gap-2">
                                <label for="" class=" text-sm text-neutral-700 font-normal">
                                    نام :
                                </label>
                                <input id="" name="" placeholder="نام" type="text" class=" w-full rounded-[6px] bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400">
                            </div>
                            <div class="w-full flex flex-col gap-2">
                                <label for="" class=" text-sm text-neutral-700 font-normal">
                                    نام خانوادگی :
                                </label>
                                <input id="" name="" placeholder="نام خانوادگی" type="text" class=" w-full rounded-[6px] bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400">
                            </div>
                            <div class="w-full flex flex-col gap-2">
                                <label for="" class=" text-sm text-neutral-700 font-normal">
                                    نقش کاربر:
                                </label>
                                <select id="countries" class="bg-neutral-50 text-black font-normal text-xs rounded-[6px] focus:outline-none focus:border-[1px] focus:border-neutral-400 block w-full p-2.5">
                                    <option class="text-neutral-700 !font-farsi-regular font-normal text-xs transition-all duration-500 hover:bg-neutral-200 hover:transition-none aria-selected:bg-neutral-200">
                                        مدیر اصلی
                                    </option>
                                    <option class="text-neutral-700 !font-farsi-regular font-normal text-xs transition-all duration-500 hover:bg-neutral-200 hover:transition-none aria-selected:bg-neutral-200">
                                        ویرایشگر
                                    </option>
                                    <option class="text-neutral-700 !font-farsi-regular font-normal text-xs transition-all duration-500 hover:bg-neutral-200 hover:transition-none aria-selected:bg-neutral-200">
                                        ادمین
                                    </option>
                                    <option class="text-neutral-700 !font-farsi-regular font-normal text-xs transition-all duration-500 hover:bg-neutral-200 hover:transition-none aria-selected:bg-neutral-200">
                                        مالک
                                    </option>
                                </select>
                            </div>
                            <div class="w-full flex flex-col gap-2">
                                <label for="" class=" text-sm text-neutral-700 font-normal">
                                    رمز عبور:
                                </label>
                                <div class="inputContainer rounded-[6px] w-full flex items-center">
                                    <input id="" name="" placeholder="رمز عبور" type="password" class=" w-full h-10 rounded-[6px] rounded-l-none bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none">
                                    <button class="showHideButton w-10 h-10 flex items-center justify-center rounded-[6px] rounded-r-none bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular p-2">
                                        <svg class="eye-show w-4 text-neutral-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        <svg class="eye-hide hidden w-4 text-neutral-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex items-center justify-end gap-4.5 pt-4.5">
                        <button onclick="modalController(addImagePopUp)" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-300 transition-all duration-400 ease-out hover:bg-green-100 hover:text-green-600 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                            بازگشت
                        </button>
                        <button onclick="modalController(addImagePopUp)" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                            ذخیره
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('src/scripts/mainScipts.js') }}"></script>
    <script src="{{ asset('src/scripts/settingPage.js') }}"></script>
    <!-- chart scripts -->
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['سینگل', 'دبل', 'سینگل اکونومی', 'دبل اکونومی','سینگل', 'دبل', 'سینگل اکونومی', 'دبل اکونومی'],
            datasets: [
                {
                    label: 'اتاق‌های آزاد',
                    data: [9, 7, 6, 5, 4, 3, 2, 8],
                    backgroundColor: 'rgba(219, 240, 221, 0.5)',
                    borderWidth: 1,
                    borderRadius : 24
                },
                {
                    label: 'اتاق‌های اشغال‌شده',
                    data: [7, 4, 5, 6, 7, 8, 9, 8],
                    backgroundColor: 'rgba(140, 179, 152, 1)',
                    borderWidth: 0.1,
                    borderRadius : 24
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio : false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
            legend: {
                position: 'top',
                labels: {
                    font: {
                        size: 14,
                        family : 'yekan-regular'
                    }
                }
            }
            }
        }
        });
        // function adjustChartLayout() {
        //     const screenWidth = window.innerWidth;

        //     if (screenWidth <= 512) {
        //         // تغییر جهت نمودار به افقی (horizontal)
        //         myChart.options.indexAxis = 'y';  // برای حالت افقی
        //         myChart.update();  // برای اعمال تغییرات
        //     } else {
        //         // بازگشت به حالت عمودی
        //         myChart.options.indexAxis = 'x';
        //         myChart.update();
        //     }
        // }

        // window.addEventListener('load', adjustChartLayout);
        // window.addEventListener('resize', adjustChartLayout);

    </script>
@endsection
