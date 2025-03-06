@extends('layouts.userHotel')
@section('content')
    <main class=" w-full flex flex-col items-center gap-20 pb-8 flex-grow-[1] justify-end">
        <div class="w-full flex-grow-[1] flex flex-col items-center gap-11 512max:gap-6">
            <section class="  w-full h-[240px] relative">
                <img src="{{ asset('public/images/BannerBackground2.png') }}" alt="#" class=" object-cover w-full h-full">
                <div class=" absolute z-[2] top-0 ring-0 w-full h-full flex flex-col items-center justify-center gap-2">
                    <div class="flex flex-col items-center gap-2 pb-8 512max:pb-16">
                        <h2 class=" text-[32px] text-green-600 font-medium text-center">
                            رزرو هتل
                        </h2>
                        <span class=" text-sm text-center text-green-300 font-normal">
                            صفحه اصلی/ رزرو هتل
                        </span>
                    </div>
                </div>
            </section>
            <!-- فیلتر جستجو -->
            <section class=" z-[2] w-full flex max-w-[1440px] px-[100px] -mt-[120px] justify-center drop-shadow-materialShadow1 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
                <div class="w-full rounded-xl bg-light relative py-[25px] px-4.5 768max:px-4.5 768max:py-[30px]">
                    <div class="travelTypeSelectionTabContents w-full h-full">
                        <div class="w-full h-full flex flex-col justify-end gap-[22px]">
                            <div class="w-full grid grid-cols-[1fr_280px_0.5fr_0.5fr_0.5fr] gap-5 items-end 1150max:grid-cols-2 1150max:content-start 640max:justify-items-center 640max:grid-cols-1 512max:gap-[14px]">
                                <div class="w-full flex flex-col gap-[6px]">
                                    <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                        مقصد:
                                    </label>
                                    <input type="text" placeholder="مقصد یا نام هتل (داخلی یا خارجی)" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                </div>
                                <div class="w-full flex flex-col gap-[6px]">
                                    <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                        تاریخ صفر:
                                    </label>
                                    <div class="w-full grid grid-cols-2">
                                        <input data-jdp="" placeholder="تاریخ ورود" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-r-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                        <input data-jdp="" placeholder="تاریخ خروج" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-l-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                    </div>
                                </div>
                                <div class="w-full flex flex-col gap-[6px]">
                                    <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                        مسافران:
                                    </label>
                                    <input type="text" placeholder="1 بزرگسال، 1 اتاق" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                </div>
                                <select class="bg-neutral-50 h-[60px] text-black font-normal text-sm rounded-[6px] focus:outline-none focus:border-[1px] focus:border-neutral-400 block w-full p-2.5 768max:h-12">
                                    <option class="text-neutral-700 !font-farsi-regular font-normal text-xs transition-all duration-500 hover:bg-neutral-200 hover:transition-none aria-selected:bg-neutral-200">
                                        تک تخته
                                    </option>
                                    <option class="text-neutral-700 !font-farsi-regular font-normal text-xs transition-all duration-500 hover:bg-neutral-200 hover:transition-none aria-selected:bg-neutral-200">
                                        دو تخته
                                    </option>
                                    <option class="text-neutral-700 !font-farsi-regular font-normal text-xs transition-all duration-500 hover:bg-neutral-200 hover:transition-none aria-selected:bg-neutral-200">
                                        سه تخته
                                    </option>
                                    <option class="text-neutral-700 !font-farsi-regular font-normal text-xs transition-all duration-500 hover:bg-neutral-200 hover:transition-none aria-selected:bg-neutral-200">
                                        چهار تخته
                                    </option>
                                </select>
                                <button class=" w-full h-[60px] flex items-center justify-center flex-grow-[1] px-4 text-light text-[18px] font-medium text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:max-w-[200px] 640max:mt-4 640max:self-center 640max:self-center 768max:h-12">
                                    جستجو
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- .... -->
            <section class=" w-full max-w-[1440px] px-[100px] 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
                <div class="w-full hidden items-center justify-between 1024max:flex">
                    <!-- دکمه نمایش هتل ها بروی نقشه -->
                    <a href="#" class="flex items-center gap-2">
                        <svg class=" w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                        </svg>
                        <span class=" text-sm text-green-600 font-medium">
                            نمایش هتل ها روی نقشه
                        </span>
                    </a>
                    <!-- دکمه فیلتر -->
                    <button onclick="modalController(document.querySelector('.filterModal'))" class="flex items-center gap-2">
                        <svg class=" w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                          </svg>
                        <span class=" text-sm text-green-600 font-medium">
                            فیلتر
                        </span>
                    </button>
                </div>
            </section>
            <!-- .... -->
            <section class=" w-full max-w-[1440px] px-[100px] 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
                <div class="w-full flex items-center justify-between 512max:justify-start">
                    <div class="flex items-center gap-2 512max:hidden">
                        <span class=" text-sm text-neutral-700 font-normal 1024max:hidden">
                            نتایج جستجو بر اساس:
                        </span>
                    </div>
                    <div class="flex items-center gap-2 512max:flex-col 512max:items-start">
                        <span class=" text-sm text-neutral-700 font-normal">
                            مرتب سازی:
                        </span>
                        <div class="flex items-center gap-2">
                            <div class="flex-shrink-[0]">
                                <label for="sorting-1" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal 640max:h-7">
                                    <input class="hidden" type="radio" id="sorting-1" name="sorting" checked>
                                    <span>
                                        پیشفرض
                                    </span>
                                </label>
                            </div>
                            <div class="flex-shrink-[0]">
                                <label for="sorting-2" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal 640max:h-7">
                                    <input class="hidden" type="radio" id="sorting-2" name="sorting">
                                    <span>
                                        کمترین قیمت
                                    </span>
                                </label>
                            </div>
                            <div class="flex-shrink-[0]">
                                <label for="sorting-3" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal 640max:h-7">
                                    <input class="hidden" type="radio" id="sorting-3" name="sorting">
                                    <span>
                                        بیشترین قیمت
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- body -->
            <div class="w-full max-w-[1440px] mx-auto px-[100px] h-max grid grid-cols-[305px_1fr] gap-4.5 items-start 1024max:grid-cols-1 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
                <!-- sidbar -->
                <div class="w-full 1024max:hidden">
                    <div class="w-full flex flex-col items-center gap-2">
                        <!-- view hotels in map -->
                        <a href="#" target="_blank" class="w-full h-[200px] rounded-xl relative">

                            <!--  -->
                            <div class="w-full h-full rounded-xl bg-[#255346B2] flex flex-col items-center justify-center gap-2">
                                <svg class=" w-10 text-light" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.8147 17.7777H18.8597M18.8597 17.7777H23.9047M18.8597 17.7777V12.7777M18.8597 17.7777V22.7777M28.9498 27.7777L35.6765 34.4443M5.40625 17.7777C5.40625 21.3139 6.82366 24.7053 9.34668 27.2058C11.8697 29.7062 15.2916 31.111 18.8597 31.111C22.4278 31.111 25.8497 29.7062 28.3727 27.2058C30.8957 24.7053 32.3132 21.3139 32.3132 17.7777C32.3132 14.2415 30.8957 10.8501 28.3727 8.34958C25.8497 5.84909 22.4278 4.44434 18.8597 4.44434C15.2916 4.44434 11.8697 5.84909 9.34668 8.34958C6.82366 10.8501 5.40625 14.2415 5.40625 17.7777Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span class=" text-xs text-light font-normal text-center">
                                    مشاهده هتل ها بر روی نقشه
                                </span>
                            </div>
                        </a>
                        <div class="w-full flex flex-col items-center bg-[#ADADAD33] gap-[1px] rounded-xl overflow-hidden">
                            <!-- تعداد نتایج -->
                            <div class="w-full p-4.5 bg-neutral-50 flex flex-col gap-4.5">
                                <div class="flex items-center gap-1">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        نتایج:
                                    </span>
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        231
                                    </span>
                                </div>
                            </div>
                            <!-- ستاره هتل -->
                            <div class="w-full p-4.5 bg-neutral-50 flex flex-col gap-4.5">
                                <span class=" text-sm text-neutral-700 font-normal">
                                    ستاره هتل
                                </span>
                                <!--  -->
                                <div class="w-full flex items-center gap-x-2 gap-y-3 flex-wrap">
                                    <div class="flex-shrink-[0]">
                                        <label for="hotelStart-1" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-light flex items-center justify-center text-xs text-neutral-400 font-normal font-farsi-regular">
                                            <input class="hidden" type="checkbox" id="hotelStart-1" name="hotelStart" checked="">
                                            <span>
                                                پنج ستاره
                                            </span>
                                        </label>
                                    </div>
                                    <div class="flex-shrink-[0]">
                                        <label for="hotelStart-2" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-light flex items-center justify-center text-xs text-neutral-400 font-normal font-farsi-regular">
                                            <input class="hidden" type="checkbox" id="hotelStart-2" name="hotelStart">
                                            <span>
                                                چهار ستاره
                                            </span>
                                        </label>
                                    </div>
                                    <div class="flex-shrink-[0]">
                                        <label for="hotelStart-3" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-light flex items-center justify-center text-xs text-neutral-400 font-normal font-farsi-regular">
                                            <input class="hidden" type="checkbox" id="hotelStart-3" name="hotelStart">
                                            <span>
                                                سه تاره یا کمتر
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- تعیین رنج قیمت -->
                            <div class="w-full p-4.5 bg-neutral-50 flex flex-col gap-4.5">
                                <span class=" text-sm text-neutral-700 font-normal">
                                    تعیین رنج قیمت
                                </span>
                                <!-- double range input -->
                                <div class="w-full px-4.5 py-8 flex items-center justify-center relative">
                                    <div class="w-full relative">
                                        <div class="w-full h-4 flex items-center relative">
                                            <div class="w-full h-0.5 bg-[#ADADAD80]">

                                            </div>
                                            <div id="gradient-fill" class="w-full absolute z-[1] left-0 h-1 top-0 bottom-0 my-auto">

                                            </div>
                                        </div>
                                        <input id="rangeInput1" dir="ltr" type="range" min="0" max="100" value="10" class="pricingRangeInput w-full z-[4] appearance-none outline-none bg-transparent absolute bottom-0 top-0 my-auto mx-auto right-0">
                                        <input id="rangeInput2" dir="ltr" type="range" min="0" max="100" value="90" class="pricingRangeInput w-full z-[4] appearance-none outline-none bg-transparent absolute bottom-0 top-0 my-auto mx-auto right-0 mt-4">
                                    </div>
                                    <div id="value1" class=" absolute z-[2] bottom-1 text-xs text-neutral-700 font-normal text-nowrap" style="left: 4%;">

                                    </div>
                                    <div id="value2" class=" absolute z-[2] bottom-1 text-xs text-neutral-700 font-normal text-nowrap" style="left: 90%;">

                                    </div>
                                </div>
                            </div>
                            <!-- امکانات تفریحی رفاهی -->
                            <div class="w-full p-4.5 bg-neutral-50 flex flex-col gap-4.5">
                                <span class=" text-sm text-neutral-700 font-normal">
                                    امکانات تفریحی رفاهی
                                </span>
                                <div class="w-full flex flex-col gap-4.5">
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-1-1" name="">
                                        <label for="hotelAttributes-1-1" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-1-1" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            اینترنت رایگان
                                        </label>
                                    </div>
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-1-2" name="">
                                        <label for="hotelAttributes-1-2" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-1-2" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            پارکینگ
                                        </label>
                                    </div>
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-1-3" name="">
                                        <label for="hotelAttributes-1-3" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-1-3" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            استخر
                                        </label>
                                    </div>
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-1-4" name="">
                                        <label for="hotelAttributes-1-4" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-1-4" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            سالن بدنسازی
                                        </label>
                                    </div>
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-1-5" name="">
                                        <label for="hotelAttributes-1-5" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-1-5" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            رستوران
                                        </label>
                                    </div>
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-1-6" name="">
                                        <label for="hotelAttributes-1-6" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-1-6" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            خدمات خشک شویی
                                        </label>
                                    </div>
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-1-7" name="">
                                        <label for="hotelAttributes-1-7" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-1-7" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            اتاق سیگار
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- نزدیکی به مراکز مهم -->
                            <div class="w-full p-4.5 bg-neutral-50 flex flex-col gap-4.5">
                                <span class=" text-sm text-neutral-700 font-normal">
                                    نزدیکی به مراکز مهم
                                </span>
                                <div class="w-full flex flex-col gap-4.5">
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-2-1" name="">
                                        <label for="hotelAttributes-2-1" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-2-1" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            مراکز دیدنی
                                        </label>
                                    </div>
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-2-2" name="">
                                        <label for="hotelAttributes-2-2" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-2-2" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            مراکز خرید
                                        </label>
                                    </div>
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-2-3" name="">
                                        <label for="hotelAttributes-2-3" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-2-3" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            ایستگاه مترو
                                        </label>
                                    </div>
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-2-4" name="">
                                        <label for="hotelAttributes-2-4" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-2-4" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            ایستگاه قطار
                                        </label>
                                    </div>
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-2-5" name="">
                                        <label for="hotelAttributes-2-5" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-2-5" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            فرودگاه
                                        </label>
                                    </div>
                                    <!-- item -->
                                    <div class="flex items-center gap-[9px]">
                                        <input class=" hidden" type="checkbox" id="hotelAttributes-2-6" name="">
                                        <label for="hotelAttributes-2-6" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                            <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </label>
                                        <label for="hotelAttributes-2-6" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                            مسجد
                                        </label>
                                    </div>
                                    <!-- item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main body -->
                <div class="w-full flex flex-col items-center gap-4.5">
                    <!-- item -->
                    <div class="w-full grid grid-cols-[1fr_1px_240px]  1150max:grid-cols-1">
                        <!-- right => top in mobile -->
                        <div class="w-full h-full grid grid-cols-[227px_1fr] items-center gap-4.5 p-2 rounded-xl bg-neutral-50 640max:grid-cols-1">
                            <!-- img -->
                            <a href="#" class=" w-full">
                                <img src="{{ asset('public/images/image2.png') }}" alt="#" class=" w-full aspect-[227/173] object-cover rounded-xl 640max:aspect-[227/120]">
                            </a>
                            <div class="w-full flex flex-col gap-4.5 768max:gap-3">
                                <div class="flex flex-col gap-2">
                                    <a href="#" class=" text-base text-neutral-700 font-bold 768max:text-sm">
                                        هتل الماس 2 مشهد
                                    </a>
                                    <div class="flex items-center gap-2">
                                        <svg class=" w-[15px] text-green-600" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.37446 11.9555L7.5005 10.1039L10.6265 11.9798L9.80781 8.47153L12.5617 6.13267L8.93946 5.81595L7.5005 2.50258L6.06153 5.79159L2.4393 6.10831L5.19319 8.47153L4.37446 11.9555ZM2.86107 14L4.09163 8.82236L0 5.34136L5.38968 4.88334L7.5005 0L9.61131 4.88236L15 5.34039L10.9084 8.82138L12.1399 13.999L7.5005 11.2509L2.86107 14Z" fill="currentColor"/>
                                        </svg>
                                        <span class=" text-xs text-green-600 font-normal">
                                                5 ستاره
                                        </span>
                                    </div>
                                </div>
                                <div class="w-full grid grid-cols-minmax55.200 gap-x-2 gap-y-1">
                                    <div class="w-full flex items-center gap-2">
                                        <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                            <svg class=" text-inherit w-[10px]" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.88333 15.625H7.5V14.955L8.10583 14.42C8.2695 14.2833 8.4301 14.143 8.5875 13.9992C8.65926 13.9359 8.72357 13.8646 8.77917 13.7867C8.83539 13.7103 8.86628 13.6182 8.8675 13.5233C8.8675 13.4117 8.83167 13.3375 8.75917 13.3017C8.68667 13.2658 8.565 13.2475 8.39583 13.2475C8.27167 13.2475 8.14917 13.2533 8.02833 13.265C7.91167 13.2742 7.795 13.2883 7.68167 13.3067L7.5625 13.3292L7.51 12.6583C7.69239 12.6077 7.87774 12.5685 8.065 12.5408C8.25543 12.5134 8.4476 12.4997 8.64 12.5C8.80917 12.5 8.9675 12.5167 9.11583 12.55C9.26833 12.58 9.39917 12.6317 9.51 12.7042C9.62107 12.7707 9.71363 12.8642 9.77917 12.9758C9.84826 13.0984 9.88228 13.2377 9.8775 13.3783C9.8775 13.52 9.8625 13.6458 9.83083 13.7542C9.80362 13.8596 9.75822 13.9594 9.69667 14.0492C9.63417 14.1392 9.55667 14.2242 9.46333 14.3025C9.35755 14.3902 9.24681 14.4717 9.13167 14.5467L8.62333 14.9233H9.8825L9.88333 15.625ZM11.9083 15.625V15.195H10.4V14.565L11.0008 12.5633H12.1617L11.39 14.4658H11.9183L12.0017 13.8358L12.9125 13.8133V14.4658H13.125V15.195H12.9125V15.625H11.9083Z" fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.6875 4.375C4.6875 3.87772 4.88504 3.40081 5.23667 3.04917C5.58831 2.69754 6.06522 2.5 6.5625 2.5C7.05978 2.5 7.53669 2.69754 7.88832 3.04917C8.23996 3.40081 8.4375 3.87772 8.4375 4.375C8.4375 4.87228 8.23996 5.34919 7.88832 5.70082C7.53669 6.05246 7.05978 6.25 6.5625 6.25C6.06522 6.25 5.58831 6.05246 5.23667 5.70082C4.88504 5.34919 4.6875 4.87228 4.6875 4.375ZM6.5625 3.75C6.39674 3.75 6.23777 3.81585 6.12056 3.93306C6.00335 4.05027 5.9375 4.20924 5.9375 4.375C5.9375 4.54076 6.00335 4.69973 6.12056 4.81694C6.23777 4.93415 6.39674 5 6.5625 5C6.72826 5 6.88723 4.93415 7.00444 4.81694C7.12165 4.69973 7.1875 4.54076 7.1875 4.375C7.1875 4.20924 7.12165 4.05027 7.00444 3.93306C6.88723 3.81585 6.72826 3.75 6.5625 3.75ZM10 10.625H16.875C17.0408 10.625 17.1997 10.6908 17.3169 10.8081C17.4342 10.9253 17.5 11.0842 17.5 11.25C17.5 11.4158 17.4342 11.5747 17.3169 11.6919C17.1997 11.8092 17.0408 11.875 16.875 11.875V15.625C16.875 16.1223 16.6775 16.5992 16.3258 16.9508C15.9742 17.3025 15.4973 17.5 15 17.5H5C4.50272 17.5 4.02581 17.3025 3.67417 16.9508C3.32254 16.5992 3.125 16.1223 3.125 15.625V11.875C2.95924 11.875 2.80027 11.8092 2.68306 11.6919C2.56585 11.5747 2.5 11.4158 2.5 11.25C2.5 11.0842 2.56585 10.9253 2.68306 10.8081C2.80027 10.6908 2.95924 10.625 3.125 10.625V9.375C3.125 8.8525 3.29167 8.23833 3.80417 7.82667C4.58699 7.202 5.56103 6.86594 6.5625 6.875C7.56398 6.86588 8.53804 7.20194 9.32083 7.82667C9.83417 8.23833 10 8.8525 10 9.375V10.625ZM6.5625 8.125C5.6125 8.125 4.95667 8.50417 4.58667 8.80083C4.46667 8.8975 4.375 9.08583 4.375 9.375V10.625H8.75V9.375C8.75 9.08583 8.65833 8.8975 8.53833 8.80083C7.9773 8.35457 7.27932 8.11582 6.5625 8.125ZM4.375 11.875V15.625C4.375 15.97 4.655 16.25 5 16.25H15C15.1658 16.25 15.3247 16.1842 15.4419 16.0669C15.5592 15.9497 15.625 15.7908 15.625 15.625V11.875H4.375Z" fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.875 9.37497C11.875 9.20921 11.9408 9.05024 12.0581 8.93303C12.1753 8.81582 12.3342 8.74997 12.5 8.74997C12.5 7.93081 13.0258 7.23331 13.7583 6.97831C13.7436 6.88883 13.7485 6.79722 13.7727 6.70983C13.7969 6.62243 13.8398 6.54135 13.8984 6.47221C13.9571 6.40306 14.0301 6.34751 14.1124 6.30942C14.1947 6.27132 14.2843 6.25159 14.375 6.25159C14.4657 6.25159 14.5553 6.27132 14.6376 6.30942C14.7199 6.34751 14.7929 6.40306 14.8516 6.47221C14.9102 6.54135 14.9531 6.62243 14.9773 6.70983C15.0015 6.79722 15.0064 6.88883 14.9917 6.97831C15.3594 7.10638 15.6782 7.34578 15.9037 7.66326C16.1292 7.98075 16.2502 8.36056 16.25 8.74997C16.4158 8.74997 16.5747 8.81582 16.6919 8.93303C16.8092 9.05024 16.875 9.20921 16.875 9.37497C16.875 9.54074 16.8092 9.69971 16.6919 9.81692C16.5747 9.93413 16.4158 9.99997 16.25 9.99997H12.5C12.3342 9.99997 12.1753 9.93413 12.0581 9.81692C11.9408 9.69971 11.875 9.54074 11.875 9.37497ZM14.375 8.12497C14.2092 8.12497 14.0503 8.19082 13.9331 8.30803C13.8158 8.42524 13.75 8.58421 13.75 8.74997H15C15 8.58421 14.9342 8.42524 14.8169 8.30803C14.6997 8.19082 14.5408 8.12497 14.375 8.12497Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            ارائه خدمات به صورت شبانه‌روزی
                                        </span>
                                    </div>
                                    <div class="w-full flex items-center gap-2">
                                        <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                            <svg class=" text-inherit w-[10px]" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.2448 4.5C12.7197 4.50574 13.1858 4.65554 13.5996 4.93545C14.0134 5.21537 14.3614 5.61632 14.6114 6.101L16.5889 9.75H16.8948C17.4004 9.76999 17.8794 10.027 18.2289 10.466L18.3131 10.579C18.6664 11.085 18.8223 11.748 18.7448 12.391L18.6714 13.045C18.5624 13.7845 18.2747 14.4693 17.8442 15.0143C17.4137 15.5594 16.8593 15.9407 16.2498 16.111V18C16.2498 18.3978 16.1181 18.7794 15.8836 19.0607C15.6492 19.342 15.3313 19.5 14.9998 19.5H14.3748C14.0432 19.5 13.7253 19.342 13.4909 19.0607C13.2564 18.7794 13.1248 18.3978 13.1248 18V16.411C11.0431 16.527 8.95808 16.527 6.87475 16.411V18C6.87475 18.3978 6.74305 18.7794 6.50863 19.0607C6.27421 19.342 5.95627 19.5 5.62475 19.5H4.99975C4.66823 19.5 4.35029 19.342 4.11587 19.0607C3.88145 18.7794 3.74975 18.3978 3.74975 18V16.11C3.14104 15.9359 2.58824 15.5514 2.15975 15.0041C1.73125 14.4569 1.44587 13.7709 1.33892 13.031L1.25558 12.401C1.21608 12.0761 1.23457 11.7448 1.30984 11.4291C1.38511 11.1134 1.51543 10.8205 1.69217 10.5699C1.86891 10.3192 2.08803 10.1165 2.33501 9.97513C2.58199 9.83379 2.85118 9.75705 3.12475 9.75H3.40808L5.43475 5.97C5.68026 5.54143 6.00465 5.18639 6.38281 4.93235C6.76098 4.67831 7.18278 4.53209 7.61558 4.505L7.76225 4.5H12.2448ZM5.62475 16.5H4.99975V18H5.62475V16.5ZM14.9998 16.5H14.3748V18H14.9998V16.5ZM3.73808 11.25H3.14475C3.0496 11.2539 2.95619 11.2816 2.87052 11.3315C2.78486 11.3813 2.70884 11.4521 2.64737 11.5394C2.5859 11.6266 2.54034 11.7283 2.51362 11.838C2.48691 11.9476 2.47963 12.0628 2.49225 12.176L2.57142 12.785C2.64486 13.2875 2.85373 13.7472 3.16596 14.0935C3.47818 14.4399 3.8765 14.6536 4.29975 14.702L5.06225 14.776C8.60225 15.095 12.1581 15.07 15.6798 14.705L15.7923 14.69C16.6264 14.552 17.2939 13.783 17.4364 12.817L17.5064 12.184C17.5202 12.0702 17.5138 11.9542 17.4876 11.8436C17.4615 11.733 17.4162 11.6302 17.3547 11.5421C17.2932 11.4539 17.2168 11.3823 17.1307 11.332C17.0445 11.2817 16.9505 11.2537 16.8548 11.25H3.73808ZM11.2498 12C11.4094 11.9996 11.5631 12.0725 11.6793 12.2038C11.7956 12.335 11.8656 12.5147 11.875 12.7059C11.8843 12.8971 11.8324 13.0854 11.7298 13.2322C11.6272 13.3789 11.4816 13.4729 11.3231 13.495L11.2498 13.5H8.74975C8.59012 13.5004 8.43642 13.4275 8.32017 13.2962C8.20391 13.165 8.13391 12.9853 8.12453 12.7941C8.11515 12.6029 8.1671 12.4146 8.26972 12.2678C8.37234 12.1211 8.51785 12.0271 8.67642 12.005L8.74975 12H11.2498ZM6.24975 12C6.4093 11.9999 6.56286 12.073 6.67895 12.2043C6.79504 12.3356 6.86488 12.5153 6.87415 12.7064C6.88342 12.8976 6.83142 13.0857 6.72881 13.2323C6.62619 13.379 6.48074 13.4729 6.32225 13.495L6.24975 13.5H4.99975C4.8402 13.5001 4.68664 13.427 4.57055 13.2957C4.45446 13.1644 4.38462 12.9847 4.37535 12.7936C4.36608 12.6024 4.41808 12.4143 4.52069 12.2677C4.62331 12.121 4.76876 12.0271 4.92725 12.005L4.99975 12H6.24975ZM14.9998 12C15.1593 11.9999 15.3129 12.073 15.429 12.2043C15.545 12.3356 15.6149 12.5153 15.6241 12.7064C15.6334 12.8976 15.5814 13.0857 15.4788 13.2323C15.3762 13.379 15.2307 13.4729 15.0723 13.495L14.9998 13.5H13.7498C13.5902 13.5001 13.4366 13.427 13.3206 13.2957C13.2045 13.1644 13.1346 12.9847 13.1254 12.7936C13.1161 12.6024 13.1681 12.4143 13.2707 12.2677C13.3733 12.121 13.5188 12.0271 13.6773 12.005L13.7498 12H14.9998ZM12.2373 6H7.76225L7.65392 6.005C7.4014 6.02652 7.15687 6.12039 6.94082 6.27872C6.72478 6.43706 6.54352 6.65525 6.41225 6.915L4.89475 9.75H15.0981L13.5556 6.902C13.4272 6.65042 13.2515 6.43843 13.0425 6.28301C12.8335 6.12759 12.5971 6.03306 12.3523 6.007L12.2373 6Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            صرافی
                                        </span>
                                    </div>
                                    <div class="w-full flex items-center gap-2">
                                        <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                            <svg class=" text-inherit w-[10px]" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.625C3.75 5.12772 3.94754 4.65081 4.29917 4.29917C4.65081 3.94754 5.12772 3.75 5.625 3.75H14.0625C14.2283 3.75 14.3872 3.68415 14.5044 3.56694C14.6217 3.44973 14.6875 3.29076 14.6875 3.125C14.6875 2.95924 14.6217 2.80027 14.5044 2.68306C14.3872 2.56585 14.2283 2.5 14.0625 2.5H5.625C4.7962 2.5 4.00134 2.82924 3.41529 3.41529C2.82924 4.00134 2.5 4.7962 2.5 5.625V14.375C2.5 15.2038 2.82924 15.9987 3.41529 16.5847C4.00134 17.1708 4.7962 17.5 5.625 17.5H14.375C15.2038 17.5 15.9987 17.1708 16.5847 16.5847C17.1708 15.9987 17.5 15.2038 17.5 14.375V9.375C17.5 9.20924 17.4342 9.05027 17.3169 8.93306C17.1997 8.81585 17.0408 8.75 16.875 8.75C16.7092 8.75 16.5503 8.81585 16.4331 8.93306C16.3158 9.05027 16.25 9.20924 16.25 9.375V14.375C16.25 14.8723 16.0525 15.3492 15.7008 15.7008C15.3492 16.0525 14.8723 16.25 14.375 16.25H5.625C5.12772 16.25 4.65081 16.0525 4.29917 15.7008C3.94754 15.3492 3.75 14.8723 3.75 14.375V5.625ZM16.7042 6.05417C16.8139 5.93301 16.8718 5.77367 16.8655 5.61031C16.8591 5.44695 16.789 5.29259 16.6702 5.18031C16.5514 5.06803 16.3933 5.00677 16.2299 5.00968C16.0664 5.01258 15.9106 5.07941 15.7958 5.19583L9.13333 12.25L6.045 9.44833C5.98476 9.3904 5.91351 9.34514 5.83546 9.31523C5.75742 9.28532 5.67417 9.27136 5.59064 9.27419C5.50711 9.27702 5.42499 9.29657 5.34915 9.33169C5.27331 9.36681 5.20528 9.41679 5.14909 9.47866C5.09291 9.54053 5.0497 9.61305 5.02203 9.69191C4.99436 9.77078 4.98279 9.85439 4.988 9.93781C4.99321 10.0212 5.0151 10.1027 5.05238 10.1776C5.08965 10.2524 5.14155 10.3189 5.205 10.3733L8.74667 13.5875C8.86781 13.6977 9.02735 13.7559 9.19098 13.7497C9.35461 13.7434 9.50926 13.6732 9.62167 13.5542L16.7042 6.05417Z" fill="currentColor" stroke="currentColor" stroke-width="0.3"></path>
                                            </svg>
                                        </div>
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            اتاق ویژه‌ی سیگار
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 640max:w-full 640max:justify-center 640max:py-4">
                                    <a href="#" class=" flex items-center gap-2 text-sm text-green-600 font-medium 640max:px-4 640max:py-2 640max:bg-green-100 640max:rounded-xl 768max:text-sm">
                                        <svg class=" w-6 text-green-600 hidden 640max:flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                        </svg>
                                        <span>
                                            نمایش هتل روی نقشه
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- dashed border -->
                        <div class=" w-[1px] h-full py-3 1150max:w-full 1150max:h-[1px] 1150max:py-0 1150max:px-3">
                            <div class="w-full h-full border-l-[1px] border-dashed border-neutral-400 1150max:border-t-[1px]">

                            </div>
                        </div>
                        <!-- left => bottom in mobile -->
                        <div class="w-full h-full rounded-xl bg-neutral-50 p-[25px] flex flex-col items-center justify-between gap-4.5 1150max:flex-row 1150max:px-4.5 1150max:py-2">
                            <div class="w-full flex flex-col items-center gap-2 1150max:w-max">
                                <div class="flex items-center gap-1">
                                    <span class=" text-lg text-green-600 font-bold 512max:text-sm">
                                        10,391,200
                                    </span>
                                    <span class=" text-sm text-green-600 font-medium 512max:text-xs">
                                        تومان
                                    </span>
                                </div>
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    1 شب، 1 بزرگسال
                                </span>
                            </div>
                            <button class="rounded-[6px] w-full flex items-center justify-center py-2 px-4 h-10 max-w-[160px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:text-xs 512max:h-8 512max:max-w-max 512max:px-4">
                                جزئیات و رزرو
                            </button>
                        </div>
                    </div>
                    <!-- item -->
                    <div class="w-full grid grid-cols-[1fr_1px_240px]  1150max:grid-cols-1">
                        <!-- right => top in mobile -->
                        <div class="w-full h-full grid grid-cols-[227px_1fr] items-center gap-4.5 p-2 rounded-xl bg-neutral-50 640max:grid-cols-1">
                            <!-- img -->
                            <a href="#" class=" w-full">
                                <img src="{{ asset('public/images/image2.png') }}" alt="#" class=" w-full aspect-[227/173] object-cover rounded-xl 640max:aspect-[227/120]">
                            </a>
                            <div class="w-full flex flex-col gap-4.5 768max:gap-3">
                                <div class="flex flex-col gap-2">
                                    <a href="#" class=" text-base text-neutral-700 font-bold 768max:text-sm">
                                        هتل الماس 2 مشهد
                                    </a>
                                    <div class="flex items-center gap-2">
                                        <svg class=" w-[15px] text-green-600" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.37446 11.9555L7.5005 10.1039L10.6265 11.9798L9.80781 8.47153L12.5617 6.13267L8.93946 5.81595L7.5005 2.50258L6.06153 5.79159L2.4393 6.10831L5.19319 8.47153L4.37446 11.9555ZM2.86107 14L4.09163 8.82236L0 5.34136L5.38968 4.88334L7.5005 0L9.61131 4.88236L15 5.34039L10.9084 8.82138L12.1399 13.999L7.5005 11.2509L2.86107 14Z" fill="currentColor"/>
                                        </svg>
                                        <span class=" text-xs text-green-600 font-normal">
                                                5 ستاره
                                        </span>
                                    </div>
                                </div>
                                <div class="w-full grid grid-cols-minmax55.200 gap-x-2 gap-y-1">
                                    <div class="w-full flex items-center gap-2">
                                        <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                            <svg class=" text-inherit w-[10px]" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.88333 15.625H7.5V14.955L8.10583 14.42C8.2695 14.2833 8.4301 14.143 8.5875 13.9992C8.65926 13.9359 8.72357 13.8646 8.77917 13.7867C8.83539 13.7103 8.86628 13.6182 8.8675 13.5233C8.8675 13.4117 8.83167 13.3375 8.75917 13.3017C8.68667 13.2658 8.565 13.2475 8.39583 13.2475C8.27167 13.2475 8.14917 13.2533 8.02833 13.265C7.91167 13.2742 7.795 13.2883 7.68167 13.3067L7.5625 13.3292L7.51 12.6583C7.69239 12.6077 7.87774 12.5685 8.065 12.5408C8.25543 12.5134 8.4476 12.4997 8.64 12.5C8.80917 12.5 8.9675 12.5167 9.11583 12.55C9.26833 12.58 9.39917 12.6317 9.51 12.7042C9.62107 12.7707 9.71363 12.8642 9.77917 12.9758C9.84826 13.0984 9.88228 13.2377 9.8775 13.3783C9.8775 13.52 9.8625 13.6458 9.83083 13.7542C9.80362 13.8596 9.75822 13.9594 9.69667 14.0492C9.63417 14.1392 9.55667 14.2242 9.46333 14.3025C9.35755 14.3902 9.24681 14.4717 9.13167 14.5467L8.62333 14.9233H9.8825L9.88333 15.625ZM11.9083 15.625V15.195H10.4V14.565L11.0008 12.5633H12.1617L11.39 14.4658H11.9183L12.0017 13.8358L12.9125 13.8133V14.4658H13.125V15.195H12.9125V15.625H11.9083Z" fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.6875 4.375C4.6875 3.87772 4.88504 3.40081 5.23667 3.04917C5.58831 2.69754 6.06522 2.5 6.5625 2.5C7.05978 2.5 7.53669 2.69754 7.88832 3.04917C8.23996 3.40081 8.4375 3.87772 8.4375 4.375C8.4375 4.87228 8.23996 5.34919 7.88832 5.70082C7.53669 6.05246 7.05978 6.25 6.5625 6.25C6.06522 6.25 5.58831 6.05246 5.23667 5.70082C4.88504 5.34919 4.6875 4.87228 4.6875 4.375ZM6.5625 3.75C6.39674 3.75 6.23777 3.81585 6.12056 3.93306C6.00335 4.05027 5.9375 4.20924 5.9375 4.375C5.9375 4.54076 6.00335 4.69973 6.12056 4.81694C6.23777 4.93415 6.39674 5 6.5625 5C6.72826 5 6.88723 4.93415 7.00444 4.81694C7.12165 4.69973 7.1875 4.54076 7.1875 4.375C7.1875 4.20924 7.12165 4.05027 7.00444 3.93306C6.88723 3.81585 6.72826 3.75 6.5625 3.75ZM10 10.625H16.875C17.0408 10.625 17.1997 10.6908 17.3169 10.8081C17.4342 10.9253 17.5 11.0842 17.5 11.25C17.5 11.4158 17.4342 11.5747 17.3169 11.6919C17.1997 11.8092 17.0408 11.875 16.875 11.875V15.625C16.875 16.1223 16.6775 16.5992 16.3258 16.9508C15.9742 17.3025 15.4973 17.5 15 17.5H5C4.50272 17.5 4.02581 17.3025 3.67417 16.9508C3.32254 16.5992 3.125 16.1223 3.125 15.625V11.875C2.95924 11.875 2.80027 11.8092 2.68306 11.6919C2.56585 11.5747 2.5 11.4158 2.5 11.25C2.5 11.0842 2.56585 10.9253 2.68306 10.8081C2.80027 10.6908 2.95924 10.625 3.125 10.625V9.375C3.125 8.8525 3.29167 8.23833 3.80417 7.82667C4.58699 7.202 5.56103 6.86594 6.5625 6.875C7.56398 6.86588 8.53804 7.20194 9.32083 7.82667C9.83417 8.23833 10 8.8525 10 9.375V10.625ZM6.5625 8.125C5.6125 8.125 4.95667 8.50417 4.58667 8.80083C4.46667 8.8975 4.375 9.08583 4.375 9.375V10.625H8.75V9.375C8.75 9.08583 8.65833 8.8975 8.53833 8.80083C7.9773 8.35457 7.27932 8.11582 6.5625 8.125ZM4.375 11.875V15.625C4.375 15.97 4.655 16.25 5 16.25H15C15.1658 16.25 15.3247 16.1842 15.4419 16.0669C15.5592 15.9497 15.625 15.7908 15.625 15.625V11.875H4.375Z" fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.875 9.37497C11.875 9.20921 11.9408 9.05024 12.0581 8.93303C12.1753 8.81582 12.3342 8.74997 12.5 8.74997C12.5 7.93081 13.0258 7.23331 13.7583 6.97831C13.7436 6.88883 13.7485 6.79722 13.7727 6.70983C13.7969 6.62243 13.8398 6.54135 13.8984 6.47221C13.9571 6.40306 14.0301 6.34751 14.1124 6.30942C14.1947 6.27132 14.2843 6.25159 14.375 6.25159C14.4657 6.25159 14.5553 6.27132 14.6376 6.30942C14.7199 6.34751 14.7929 6.40306 14.8516 6.47221C14.9102 6.54135 14.9531 6.62243 14.9773 6.70983C15.0015 6.79722 15.0064 6.88883 14.9917 6.97831C15.3594 7.10638 15.6782 7.34578 15.9037 7.66326C16.1292 7.98075 16.2502 8.36056 16.25 8.74997C16.4158 8.74997 16.5747 8.81582 16.6919 8.93303C16.8092 9.05024 16.875 9.20921 16.875 9.37497C16.875 9.54074 16.8092 9.69971 16.6919 9.81692C16.5747 9.93413 16.4158 9.99997 16.25 9.99997H12.5C12.3342 9.99997 12.1753 9.93413 12.0581 9.81692C11.9408 9.69971 11.875 9.54074 11.875 9.37497ZM14.375 8.12497C14.2092 8.12497 14.0503 8.19082 13.9331 8.30803C13.8158 8.42524 13.75 8.58421 13.75 8.74997H15C15 8.58421 14.9342 8.42524 14.8169 8.30803C14.6997 8.19082 14.5408 8.12497 14.375 8.12497Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            ارائه خدمات به صورت شبانه‌روزی
                                        </span>
                                    </div>
                                    <div class="w-full flex items-center gap-2">
                                        <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                            <svg class=" text-inherit w-[10px]" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.2448 4.5C12.7197 4.50574 13.1858 4.65554 13.5996 4.93545C14.0134 5.21537 14.3614 5.61632 14.6114 6.101L16.5889 9.75H16.8948C17.4004 9.76999 17.8794 10.027 18.2289 10.466L18.3131 10.579C18.6664 11.085 18.8223 11.748 18.7448 12.391L18.6714 13.045C18.5624 13.7845 18.2747 14.4693 17.8442 15.0143C17.4137 15.5594 16.8593 15.9407 16.2498 16.111V18C16.2498 18.3978 16.1181 18.7794 15.8836 19.0607C15.6492 19.342 15.3313 19.5 14.9998 19.5H14.3748C14.0432 19.5 13.7253 19.342 13.4909 19.0607C13.2564 18.7794 13.1248 18.3978 13.1248 18V16.411C11.0431 16.527 8.95808 16.527 6.87475 16.411V18C6.87475 18.3978 6.74305 18.7794 6.50863 19.0607C6.27421 19.342 5.95627 19.5 5.62475 19.5H4.99975C4.66823 19.5 4.35029 19.342 4.11587 19.0607C3.88145 18.7794 3.74975 18.3978 3.74975 18V16.11C3.14104 15.9359 2.58824 15.5514 2.15975 15.0041C1.73125 14.4569 1.44587 13.7709 1.33892 13.031L1.25558 12.401C1.21608 12.0761 1.23457 11.7448 1.30984 11.4291C1.38511 11.1134 1.51543 10.8205 1.69217 10.5699C1.86891 10.3192 2.08803 10.1165 2.33501 9.97513C2.58199 9.83379 2.85118 9.75705 3.12475 9.75H3.40808L5.43475 5.97C5.68026 5.54143 6.00465 5.18639 6.38281 4.93235C6.76098 4.67831 7.18278 4.53209 7.61558 4.505L7.76225 4.5H12.2448ZM5.62475 16.5H4.99975V18H5.62475V16.5ZM14.9998 16.5H14.3748V18H14.9998V16.5ZM3.73808 11.25H3.14475C3.0496 11.2539 2.95619 11.2816 2.87052 11.3315C2.78486 11.3813 2.70884 11.4521 2.64737 11.5394C2.5859 11.6266 2.54034 11.7283 2.51362 11.838C2.48691 11.9476 2.47963 12.0628 2.49225 12.176L2.57142 12.785C2.64486 13.2875 2.85373 13.7472 3.16596 14.0935C3.47818 14.4399 3.8765 14.6536 4.29975 14.702L5.06225 14.776C8.60225 15.095 12.1581 15.07 15.6798 14.705L15.7923 14.69C16.6264 14.552 17.2939 13.783 17.4364 12.817L17.5064 12.184C17.5202 12.0702 17.5138 11.9542 17.4876 11.8436C17.4615 11.733 17.4162 11.6302 17.3547 11.5421C17.2932 11.4539 17.2168 11.3823 17.1307 11.332C17.0445 11.2817 16.9505 11.2537 16.8548 11.25H3.73808ZM11.2498 12C11.4094 11.9996 11.5631 12.0725 11.6793 12.2038C11.7956 12.335 11.8656 12.5147 11.875 12.7059C11.8843 12.8971 11.8324 13.0854 11.7298 13.2322C11.6272 13.3789 11.4816 13.4729 11.3231 13.495L11.2498 13.5H8.74975C8.59012 13.5004 8.43642 13.4275 8.32017 13.2962C8.20391 13.165 8.13391 12.9853 8.12453 12.7941C8.11515 12.6029 8.1671 12.4146 8.26972 12.2678C8.37234 12.1211 8.51785 12.0271 8.67642 12.005L8.74975 12H11.2498ZM6.24975 12C6.4093 11.9999 6.56286 12.073 6.67895 12.2043C6.79504 12.3356 6.86488 12.5153 6.87415 12.7064C6.88342 12.8976 6.83142 13.0857 6.72881 13.2323C6.62619 13.379 6.48074 13.4729 6.32225 13.495L6.24975 13.5H4.99975C4.8402 13.5001 4.68664 13.427 4.57055 13.2957C4.45446 13.1644 4.38462 12.9847 4.37535 12.7936C4.36608 12.6024 4.41808 12.4143 4.52069 12.2677C4.62331 12.121 4.76876 12.0271 4.92725 12.005L4.99975 12H6.24975ZM14.9998 12C15.1593 11.9999 15.3129 12.073 15.429 12.2043C15.545 12.3356 15.6149 12.5153 15.6241 12.7064C15.6334 12.8976 15.5814 13.0857 15.4788 13.2323C15.3762 13.379 15.2307 13.4729 15.0723 13.495L14.9998 13.5H13.7498C13.5902 13.5001 13.4366 13.427 13.3206 13.2957C13.2045 13.1644 13.1346 12.9847 13.1254 12.7936C13.1161 12.6024 13.1681 12.4143 13.2707 12.2677C13.3733 12.121 13.5188 12.0271 13.6773 12.005L13.7498 12H14.9998ZM12.2373 6H7.76225L7.65392 6.005C7.4014 6.02652 7.15687 6.12039 6.94082 6.27872C6.72478 6.43706 6.54352 6.65525 6.41225 6.915L4.89475 9.75H15.0981L13.5556 6.902C13.4272 6.65042 13.2515 6.43843 13.0425 6.28301C12.8335 6.12759 12.5971 6.03306 12.3523 6.007L12.2373 6Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            صرافی
                                        </span>
                                    </div>
                                    <div class="w-full flex items-center gap-2">
                                        <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                            <svg class=" text-inherit w-[10px]" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.625C3.75 5.12772 3.94754 4.65081 4.29917 4.29917C4.65081 3.94754 5.12772 3.75 5.625 3.75H14.0625C14.2283 3.75 14.3872 3.68415 14.5044 3.56694C14.6217 3.44973 14.6875 3.29076 14.6875 3.125C14.6875 2.95924 14.6217 2.80027 14.5044 2.68306C14.3872 2.56585 14.2283 2.5 14.0625 2.5H5.625C4.7962 2.5 4.00134 2.82924 3.41529 3.41529C2.82924 4.00134 2.5 4.7962 2.5 5.625V14.375C2.5 15.2038 2.82924 15.9987 3.41529 16.5847C4.00134 17.1708 4.7962 17.5 5.625 17.5H14.375C15.2038 17.5 15.9987 17.1708 16.5847 16.5847C17.1708 15.9987 17.5 15.2038 17.5 14.375V9.375C17.5 9.20924 17.4342 9.05027 17.3169 8.93306C17.1997 8.81585 17.0408 8.75 16.875 8.75C16.7092 8.75 16.5503 8.81585 16.4331 8.93306C16.3158 9.05027 16.25 9.20924 16.25 9.375V14.375C16.25 14.8723 16.0525 15.3492 15.7008 15.7008C15.3492 16.0525 14.8723 16.25 14.375 16.25H5.625C5.12772 16.25 4.65081 16.0525 4.29917 15.7008C3.94754 15.3492 3.75 14.8723 3.75 14.375V5.625ZM16.7042 6.05417C16.8139 5.93301 16.8718 5.77367 16.8655 5.61031C16.8591 5.44695 16.789 5.29259 16.6702 5.18031C16.5514 5.06803 16.3933 5.00677 16.2299 5.00968C16.0664 5.01258 15.9106 5.07941 15.7958 5.19583L9.13333 12.25L6.045 9.44833C5.98476 9.3904 5.91351 9.34514 5.83546 9.31523C5.75742 9.28532 5.67417 9.27136 5.59064 9.27419C5.50711 9.27702 5.42499 9.29657 5.34915 9.33169C5.27331 9.36681 5.20528 9.41679 5.14909 9.47866C5.09291 9.54053 5.0497 9.61305 5.02203 9.69191C4.99436 9.77078 4.98279 9.85439 4.988 9.93781C4.99321 10.0212 5.0151 10.1027 5.05238 10.1776C5.08965 10.2524 5.14155 10.3189 5.205 10.3733L8.74667 13.5875C8.86781 13.6977 9.02735 13.7559 9.19098 13.7497C9.35461 13.7434 9.50926 13.6732 9.62167 13.5542L16.7042 6.05417Z" fill="currentColor" stroke="currentColor" stroke-width="0.3"></path>
                                            </svg>
                                        </div>
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            اتاق ویژه‌ی سیگار
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 640max:w-full 640max:justify-center 640max:py-4">
                                    <a href="#" class=" flex items-center gap-2 text-sm text-green-600 font-medium 640max:px-4 640max:py-2 640max:bg-green-100 640max:rounded-xl 768max:text-sm">
                                        <svg class=" w-6 text-green-600 hidden 640max:flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                        </svg>
                                        <span>
                                            نمایش هتل روی نقشه
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- dashed border -->
                        <div class=" w-[1px] h-full py-3 1150max:w-full 1150max:h-[1px] 1150max:py-0 1150max:px-3">
                            <div class="w-full h-full border-l-[1px] border-dashed border-neutral-400 1150max:border-t-[1px]">

                            </div>
                        </div>
                        <!-- left => bottom in mobile -->
                        <div class="w-full h-full rounded-xl bg-neutral-50 p-[25px] flex flex-col items-center justify-between gap-4.5 1150max:flex-row 1150max:px-4.5 1150max:py-2">
                            <div class="w-full flex flex-col items-center gap-2 1150max:w-max">
                                <div class="flex items-center gap-1">
                                    <span class=" text-lg text-green-600 font-bold 512max:text-sm">
                                        10,391,200
                                    </span>
                                    <span class=" text-sm text-green-600 font-medium 512max:text-xs">
                                        تومان
                                    </span>
                                </div>
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    1 شب، 1 بزرگسال
                                </span>
                            </div>
                            <button class="rounded-[6px] w-full flex items-center justify-center py-2 px-4 h-10 max-w-[160px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:text-xs 512max:h-8 512max:max-w-max 512max:px-4">
                                جزئیات و رزرو
                            </button>
                        </div>
                    </div>
                    <!-- item -->
                    <div class="w-full grid grid-cols-[1fr_1px_240px]  1150max:grid-cols-1">
                        <!-- right => top in mobile -->
                        <div class="w-full h-full grid grid-cols-[227px_1fr] items-center gap-4.5 p-2 rounded-xl bg-neutral-50 640max:grid-cols-1">
                            <!-- img -->
                            <a href="#" class=" w-full">
                                <img src="{{ asset('public/images/image2.png') }}" alt="#" class=" w-full aspect-[227/173] object-cover rounded-xl 640max:aspect-[227/120]">
                            </a>
                            <div class="w-full flex flex-col gap-4.5 768max:gap-3">
                                <div class="flex flex-col gap-2">
                                    <a href="#" class=" text-base text-neutral-700 font-bold 768max:text-sm">
                                        هتل الماس 2 مشهد
                                    </a>
                                    <div class="flex items-center gap-2">
                                        <svg class=" w-[15px] text-green-600" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.37446 11.9555L7.5005 10.1039L10.6265 11.9798L9.80781 8.47153L12.5617 6.13267L8.93946 5.81595L7.5005 2.50258L6.06153 5.79159L2.4393 6.10831L5.19319 8.47153L4.37446 11.9555ZM2.86107 14L4.09163 8.82236L0 5.34136L5.38968 4.88334L7.5005 0L9.61131 4.88236L15 5.34039L10.9084 8.82138L12.1399 13.999L7.5005 11.2509L2.86107 14Z" fill="currentColor"/>
                                        </svg>
                                        <span class=" text-xs text-green-600 font-normal">
                                                5 ستاره
                                        </span>
                                    </div>
                                </div>
                                <div class="w-full grid grid-cols-minmax55.200 gap-x-2 gap-y-1">
                                    <div class="w-full flex items-center gap-2">
                                        <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                            <svg class=" text-inherit w-[10px]" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.88333 15.625H7.5V14.955L8.10583 14.42C8.2695 14.2833 8.4301 14.143 8.5875 13.9992C8.65926 13.9359 8.72357 13.8646 8.77917 13.7867C8.83539 13.7103 8.86628 13.6182 8.8675 13.5233C8.8675 13.4117 8.83167 13.3375 8.75917 13.3017C8.68667 13.2658 8.565 13.2475 8.39583 13.2475C8.27167 13.2475 8.14917 13.2533 8.02833 13.265C7.91167 13.2742 7.795 13.2883 7.68167 13.3067L7.5625 13.3292L7.51 12.6583C7.69239 12.6077 7.87774 12.5685 8.065 12.5408C8.25543 12.5134 8.4476 12.4997 8.64 12.5C8.80917 12.5 8.9675 12.5167 9.11583 12.55C9.26833 12.58 9.39917 12.6317 9.51 12.7042C9.62107 12.7707 9.71363 12.8642 9.77917 12.9758C9.84826 13.0984 9.88228 13.2377 9.8775 13.3783C9.8775 13.52 9.8625 13.6458 9.83083 13.7542C9.80362 13.8596 9.75822 13.9594 9.69667 14.0492C9.63417 14.1392 9.55667 14.2242 9.46333 14.3025C9.35755 14.3902 9.24681 14.4717 9.13167 14.5467L8.62333 14.9233H9.8825L9.88333 15.625ZM11.9083 15.625V15.195H10.4V14.565L11.0008 12.5633H12.1617L11.39 14.4658H11.9183L12.0017 13.8358L12.9125 13.8133V14.4658H13.125V15.195H12.9125V15.625H11.9083Z" fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.6875 4.375C4.6875 3.87772 4.88504 3.40081 5.23667 3.04917C5.58831 2.69754 6.06522 2.5 6.5625 2.5C7.05978 2.5 7.53669 2.69754 7.88832 3.04917C8.23996 3.40081 8.4375 3.87772 8.4375 4.375C8.4375 4.87228 8.23996 5.34919 7.88832 5.70082C7.53669 6.05246 7.05978 6.25 6.5625 6.25C6.06522 6.25 5.58831 6.05246 5.23667 5.70082C4.88504 5.34919 4.6875 4.87228 4.6875 4.375ZM6.5625 3.75C6.39674 3.75 6.23777 3.81585 6.12056 3.93306C6.00335 4.05027 5.9375 4.20924 5.9375 4.375C5.9375 4.54076 6.00335 4.69973 6.12056 4.81694C6.23777 4.93415 6.39674 5 6.5625 5C6.72826 5 6.88723 4.93415 7.00444 4.81694C7.12165 4.69973 7.1875 4.54076 7.1875 4.375C7.1875 4.20924 7.12165 4.05027 7.00444 3.93306C6.88723 3.81585 6.72826 3.75 6.5625 3.75ZM10 10.625H16.875C17.0408 10.625 17.1997 10.6908 17.3169 10.8081C17.4342 10.9253 17.5 11.0842 17.5 11.25C17.5 11.4158 17.4342 11.5747 17.3169 11.6919C17.1997 11.8092 17.0408 11.875 16.875 11.875V15.625C16.875 16.1223 16.6775 16.5992 16.3258 16.9508C15.9742 17.3025 15.4973 17.5 15 17.5H5C4.50272 17.5 4.02581 17.3025 3.67417 16.9508C3.32254 16.5992 3.125 16.1223 3.125 15.625V11.875C2.95924 11.875 2.80027 11.8092 2.68306 11.6919C2.56585 11.5747 2.5 11.4158 2.5 11.25C2.5 11.0842 2.56585 10.9253 2.68306 10.8081C2.80027 10.6908 2.95924 10.625 3.125 10.625V9.375C3.125 8.8525 3.29167 8.23833 3.80417 7.82667C4.58699 7.202 5.56103 6.86594 6.5625 6.875C7.56398 6.86588 8.53804 7.20194 9.32083 7.82667C9.83417 8.23833 10 8.8525 10 9.375V10.625ZM6.5625 8.125C5.6125 8.125 4.95667 8.50417 4.58667 8.80083C4.46667 8.8975 4.375 9.08583 4.375 9.375V10.625H8.75V9.375C8.75 9.08583 8.65833 8.8975 8.53833 8.80083C7.9773 8.35457 7.27932 8.11582 6.5625 8.125ZM4.375 11.875V15.625C4.375 15.97 4.655 16.25 5 16.25H15C15.1658 16.25 15.3247 16.1842 15.4419 16.0669C15.5592 15.9497 15.625 15.7908 15.625 15.625V11.875H4.375Z" fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.875 9.37497C11.875 9.20921 11.9408 9.05024 12.0581 8.93303C12.1753 8.81582 12.3342 8.74997 12.5 8.74997C12.5 7.93081 13.0258 7.23331 13.7583 6.97831C13.7436 6.88883 13.7485 6.79722 13.7727 6.70983C13.7969 6.62243 13.8398 6.54135 13.8984 6.47221C13.9571 6.40306 14.0301 6.34751 14.1124 6.30942C14.1947 6.27132 14.2843 6.25159 14.375 6.25159C14.4657 6.25159 14.5553 6.27132 14.6376 6.30942C14.7199 6.34751 14.7929 6.40306 14.8516 6.47221C14.9102 6.54135 14.9531 6.62243 14.9773 6.70983C15.0015 6.79722 15.0064 6.88883 14.9917 6.97831C15.3594 7.10638 15.6782 7.34578 15.9037 7.66326C16.1292 7.98075 16.2502 8.36056 16.25 8.74997C16.4158 8.74997 16.5747 8.81582 16.6919 8.93303C16.8092 9.05024 16.875 9.20921 16.875 9.37497C16.875 9.54074 16.8092 9.69971 16.6919 9.81692C16.5747 9.93413 16.4158 9.99997 16.25 9.99997H12.5C12.3342 9.99997 12.1753 9.93413 12.0581 9.81692C11.9408 9.69971 11.875 9.54074 11.875 9.37497ZM14.375 8.12497C14.2092 8.12497 14.0503 8.19082 13.9331 8.30803C13.8158 8.42524 13.75 8.58421 13.75 8.74997H15C15 8.58421 14.9342 8.42524 14.8169 8.30803C14.6997 8.19082 14.5408 8.12497 14.375 8.12497Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            ارائه خدمات به صورت شبانه‌روزی
                                        </span>
                                    </div>
                                    <div class="w-full flex items-center gap-2">
                                        <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                            <svg class=" text-inherit w-[10px]" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.2448 4.5C12.7197 4.50574 13.1858 4.65554 13.5996 4.93545C14.0134 5.21537 14.3614 5.61632 14.6114 6.101L16.5889 9.75H16.8948C17.4004 9.76999 17.8794 10.027 18.2289 10.466L18.3131 10.579C18.6664 11.085 18.8223 11.748 18.7448 12.391L18.6714 13.045C18.5624 13.7845 18.2747 14.4693 17.8442 15.0143C17.4137 15.5594 16.8593 15.9407 16.2498 16.111V18C16.2498 18.3978 16.1181 18.7794 15.8836 19.0607C15.6492 19.342 15.3313 19.5 14.9998 19.5H14.3748C14.0432 19.5 13.7253 19.342 13.4909 19.0607C13.2564 18.7794 13.1248 18.3978 13.1248 18V16.411C11.0431 16.527 8.95808 16.527 6.87475 16.411V18C6.87475 18.3978 6.74305 18.7794 6.50863 19.0607C6.27421 19.342 5.95627 19.5 5.62475 19.5H4.99975C4.66823 19.5 4.35029 19.342 4.11587 19.0607C3.88145 18.7794 3.74975 18.3978 3.74975 18V16.11C3.14104 15.9359 2.58824 15.5514 2.15975 15.0041C1.73125 14.4569 1.44587 13.7709 1.33892 13.031L1.25558 12.401C1.21608 12.0761 1.23457 11.7448 1.30984 11.4291C1.38511 11.1134 1.51543 10.8205 1.69217 10.5699C1.86891 10.3192 2.08803 10.1165 2.33501 9.97513C2.58199 9.83379 2.85118 9.75705 3.12475 9.75H3.40808L5.43475 5.97C5.68026 5.54143 6.00465 5.18639 6.38281 4.93235C6.76098 4.67831 7.18278 4.53209 7.61558 4.505L7.76225 4.5H12.2448ZM5.62475 16.5H4.99975V18H5.62475V16.5ZM14.9998 16.5H14.3748V18H14.9998V16.5ZM3.73808 11.25H3.14475C3.0496 11.2539 2.95619 11.2816 2.87052 11.3315C2.78486 11.3813 2.70884 11.4521 2.64737 11.5394C2.5859 11.6266 2.54034 11.7283 2.51362 11.838C2.48691 11.9476 2.47963 12.0628 2.49225 12.176L2.57142 12.785C2.64486 13.2875 2.85373 13.7472 3.16596 14.0935C3.47818 14.4399 3.8765 14.6536 4.29975 14.702L5.06225 14.776C8.60225 15.095 12.1581 15.07 15.6798 14.705L15.7923 14.69C16.6264 14.552 17.2939 13.783 17.4364 12.817L17.5064 12.184C17.5202 12.0702 17.5138 11.9542 17.4876 11.8436C17.4615 11.733 17.4162 11.6302 17.3547 11.5421C17.2932 11.4539 17.2168 11.3823 17.1307 11.332C17.0445 11.2817 16.9505 11.2537 16.8548 11.25H3.73808ZM11.2498 12C11.4094 11.9996 11.5631 12.0725 11.6793 12.2038C11.7956 12.335 11.8656 12.5147 11.875 12.7059C11.8843 12.8971 11.8324 13.0854 11.7298 13.2322C11.6272 13.3789 11.4816 13.4729 11.3231 13.495L11.2498 13.5H8.74975C8.59012 13.5004 8.43642 13.4275 8.32017 13.2962C8.20391 13.165 8.13391 12.9853 8.12453 12.7941C8.11515 12.6029 8.1671 12.4146 8.26972 12.2678C8.37234 12.1211 8.51785 12.0271 8.67642 12.005L8.74975 12H11.2498ZM6.24975 12C6.4093 11.9999 6.56286 12.073 6.67895 12.2043C6.79504 12.3356 6.86488 12.5153 6.87415 12.7064C6.88342 12.8976 6.83142 13.0857 6.72881 13.2323C6.62619 13.379 6.48074 13.4729 6.32225 13.495L6.24975 13.5H4.99975C4.8402 13.5001 4.68664 13.427 4.57055 13.2957C4.45446 13.1644 4.38462 12.9847 4.37535 12.7936C4.36608 12.6024 4.41808 12.4143 4.52069 12.2677C4.62331 12.121 4.76876 12.0271 4.92725 12.005L4.99975 12H6.24975ZM14.9998 12C15.1593 11.9999 15.3129 12.073 15.429 12.2043C15.545 12.3356 15.6149 12.5153 15.6241 12.7064C15.6334 12.8976 15.5814 13.0857 15.4788 13.2323C15.3762 13.379 15.2307 13.4729 15.0723 13.495L14.9998 13.5H13.7498C13.5902 13.5001 13.4366 13.427 13.3206 13.2957C13.2045 13.1644 13.1346 12.9847 13.1254 12.7936C13.1161 12.6024 13.1681 12.4143 13.2707 12.2677C13.3733 12.121 13.5188 12.0271 13.6773 12.005L13.7498 12H14.9998ZM12.2373 6H7.76225L7.65392 6.005C7.4014 6.02652 7.15687 6.12039 6.94082 6.27872C6.72478 6.43706 6.54352 6.65525 6.41225 6.915L4.89475 9.75H15.0981L13.5556 6.902C13.4272 6.65042 13.2515 6.43843 13.0425 6.28301C12.8335 6.12759 12.5971 6.03306 12.3523 6.007L12.2373 6Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            صرافی
                                        </span>
                                    </div>
                                    <div class="w-full flex items-center gap-2">
                                        <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                            <svg class=" text-inherit w-[10px]" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.625C3.75 5.12772 3.94754 4.65081 4.29917 4.29917C4.65081 3.94754 5.12772 3.75 5.625 3.75H14.0625C14.2283 3.75 14.3872 3.68415 14.5044 3.56694C14.6217 3.44973 14.6875 3.29076 14.6875 3.125C14.6875 2.95924 14.6217 2.80027 14.5044 2.68306C14.3872 2.56585 14.2283 2.5 14.0625 2.5H5.625C4.7962 2.5 4.00134 2.82924 3.41529 3.41529C2.82924 4.00134 2.5 4.7962 2.5 5.625V14.375C2.5 15.2038 2.82924 15.9987 3.41529 16.5847C4.00134 17.1708 4.7962 17.5 5.625 17.5H14.375C15.2038 17.5 15.9987 17.1708 16.5847 16.5847C17.1708 15.9987 17.5 15.2038 17.5 14.375V9.375C17.5 9.20924 17.4342 9.05027 17.3169 8.93306C17.1997 8.81585 17.0408 8.75 16.875 8.75C16.7092 8.75 16.5503 8.81585 16.4331 8.93306C16.3158 9.05027 16.25 9.20924 16.25 9.375V14.375C16.25 14.8723 16.0525 15.3492 15.7008 15.7008C15.3492 16.0525 14.8723 16.25 14.375 16.25H5.625C5.12772 16.25 4.65081 16.0525 4.29917 15.7008C3.94754 15.3492 3.75 14.8723 3.75 14.375V5.625ZM16.7042 6.05417C16.8139 5.93301 16.8718 5.77367 16.8655 5.61031C16.8591 5.44695 16.789 5.29259 16.6702 5.18031C16.5514 5.06803 16.3933 5.00677 16.2299 5.00968C16.0664 5.01258 15.9106 5.07941 15.7958 5.19583L9.13333 12.25L6.045 9.44833C5.98476 9.3904 5.91351 9.34514 5.83546 9.31523C5.75742 9.28532 5.67417 9.27136 5.59064 9.27419C5.50711 9.27702 5.42499 9.29657 5.34915 9.33169C5.27331 9.36681 5.20528 9.41679 5.14909 9.47866C5.09291 9.54053 5.0497 9.61305 5.02203 9.69191C4.99436 9.77078 4.98279 9.85439 4.988 9.93781C4.99321 10.0212 5.0151 10.1027 5.05238 10.1776C5.08965 10.2524 5.14155 10.3189 5.205 10.3733L8.74667 13.5875C8.86781 13.6977 9.02735 13.7559 9.19098 13.7497C9.35461 13.7434 9.50926 13.6732 9.62167 13.5542L16.7042 6.05417Z" fill="currentColor" stroke="currentColor" stroke-width="0.3"></path>
                                            </svg>
                                        </div>
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            اتاق ویژه‌ی سیگار
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 640max:w-full 640max:justify-center 640max:py-4">
                                    <a href="#" class=" flex items-center gap-2 text-sm text-green-600 font-medium 640max:px-4 640max:py-2 640max:bg-green-100 640max:rounded-xl 768max:text-sm">
                                        <svg class=" w-6 text-green-600 hidden 640max:flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                        </svg>
                                        <span>
                                            نمایش هتل روی نقشه
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- dashed border -->
                        <div class=" w-[1px] h-full py-3 1150max:w-full 1150max:h-[1px] 1150max:py-0 1150max:px-3">
                            <div class="w-full h-full border-l-[1px] border-dashed border-neutral-400 1150max:border-t-[1px]">

                            </div>
                        </div>
                        <!-- left => bottom in mobile -->
                        <div class="w-full h-full rounded-xl bg-neutral-50 p-[25px] flex flex-col items-center justify-between gap-4.5 1150max:flex-row 1150max:px-4.5 1150max:py-2">
                            <div class="w-full flex flex-col items-center gap-2 1150max:w-max">
                                <div class="flex items-center gap-1">
                                    <span class=" text-lg text-green-600 font-bold 512max:text-sm">
                                        10,391,200
                                    </span>
                                    <span class=" text-sm text-green-600 font-medium 512max:text-xs">
                                        تومان
                                    </span>
                                </div>
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    1 شب، 1 بزرگسال
                                </span>
                            </div>
                            <button class="rounded-[6px] w-full flex items-center justify-center py-2 px-4 h-10 max-w-[160px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:text-xs 512max:h-8 512max:max-w-max 512max:px-4">
                                جزئیات و رزرو
                            </button>
                        </div>
                    </div>
                    <!-- item -->
                    <div class="w-full grid grid-cols-[1fr_1px_240px]  1150max:grid-cols-1">
                        <!-- right => top in mobile -->
                        <div class="w-full h-full grid grid-cols-[227px_1fr] items-center gap-4.5 p-2 rounded-xl bg-neutral-50 640max:grid-cols-1">
                            <!-- img -->
                            <a href="#" class=" w-full">
                                <img src="{{ asset('public/images/banner.png') }}" alt="#" class=" w-full aspect-[227/173] object-cover rounded-xl 640max:aspect-[227/120]">
                            </a>
                            <div class="w-full flex flex-col gap-4.5 768max:gap-3">
                                <div class="flex flex-col gap-2">
                                    <a href="#" class=" text-base text-neutral-700 font-bold 768max:text-sm">
                                        هتل الماس 2 مشهد
                                    </a>
                                    <div class="flex items-center gap-2">
                                        <svg class=" w-[15px] text-green-600" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.37446 11.9555L7.5005 10.1039L10.6265 11.9798L9.80781 8.47153L12.5617 6.13267L8.93946 5.81595L7.5005 2.50258L6.06153 5.79159L2.4393 6.10831L5.19319 8.47153L4.37446 11.9555ZM2.86107 14L4.09163 8.82236L0 5.34136L5.38968 4.88334L7.5005 0L9.61131 4.88236L15 5.34039L10.9084 8.82138L12.1399 13.999L7.5005 11.2509L2.86107 14Z" fill="currentColor"/>
                                        </svg>
                                        <span class=" text-xs text-green-600 font-normal">
                                                5 ستاره
                                        </span>
                                    </div>
                                </div>
                                <div class="w-full grid grid-cols-minmax55.200 gap-x-2 gap-y-1">
                                    <div class="w-full flex items-center gap-2">
                                        <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                            <svg class=" text-inherit w-[10px]" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.88333 15.625H7.5V14.955L8.10583 14.42C8.2695 14.2833 8.4301 14.143 8.5875 13.9992C8.65926 13.9359 8.72357 13.8646 8.77917 13.7867C8.83539 13.7103 8.86628 13.6182 8.8675 13.5233C8.8675 13.4117 8.83167 13.3375 8.75917 13.3017C8.68667 13.2658 8.565 13.2475 8.39583 13.2475C8.27167 13.2475 8.14917 13.2533 8.02833 13.265C7.91167 13.2742 7.795 13.2883 7.68167 13.3067L7.5625 13.3292L7.51 12.6583C7.69239 12.6077 7.87774 12.5685 8.065 12.5408C8.25543 12.5134 8.4476 12.4997 8.64 12.5C8.80917 12.5 8.9675 12.5167 9.11583 12.55C9.26833 12.58 9.39917 12.6317 9.51 12.7042C9.62107 12.7707 9.71363 12.8642 9.77917 12.9758C9.84826 13.0984 9.88228 13.2377 9.8775 13.3783C9.8775 13.52 9.8625 13.6458 9.83083 13.7542C9.80362 13.8596 9.75822 13.9594 9.69667 14.0492C9.63417 14.1392 9.55667 14.2242 9.46333 14.3025C9.35755 14.3902 9.24681 14.4717 9.13167 14.5467L8.62333 14.9233H9.8825L9.88333 15.625ZM11.9083 15.625V15.195H10.4V14.565L11.0008 12.5633H12.1617L11.39 14.4658H11.9183L12.0017 13.8358L12.9125 13.8133V14.4658H13.125V15.195H12.9125V15.625H11.9083Z" fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.6875 4.375C4.6875 3.87772 4.88504 3.40081 5.23667 3.04917C5.58831 2.69754 6.06522 2.5 6.5625 2.5C7.05978 2.5 7.53669 2.69754 7.88832 3.04917C8.23996 3.40081 8.4375 3.87772 8.4375 4.375C8.4375 4.87228 8.23996 5.34919 7.88832 5.70082C7.53669 6.05246 7.05978 6.25 6.5625 6.25C6.06522 6.25 5.58831 6.05246 5.23667 5.70082C4.88504 5.34919 4.6875 4.87228 4.6875 4.375ZM6.5625 3.75C6.39674 3.75 6.23777 3.81585 6.12056 3.93306C6.00335 4.05027 5.9375 4.20924 5.9375 4.375C5.9375 4.54076 6.00335 4.69973 6.12056 4.81694C6.23777 4.93415 6.39674 5 6.5625 5C6.72826 5 6.88723 4.93415 7.00444 4.81694C7.12165 4.69973 7.1875 4.54076 7.1875 4.375C7.1875 4.20924 7.12165 4.05027 7.00444 3.93306C6.88723 3.81585 6.72826 3.75 6.5625 3.75ZM10 10.625H16.875C17.0408 10.625 17.1997 10.6908 17.3169 10.8081C17.4342 10.9253 17.5 11.0842 17.5 11.25C17.5 11.4158 17.4342 11.5747 17.3169 11.6919C17.1997 11.8092 17.0408 11.875 16.875 11.875V15.625C16.875 16.1223 16.6775 16.5992 16.3258 16.9508C15.9742 17.3025 15.4973 17.5 15 17.5H5C4.50272 17.5 4.02581 17.3025 3.67417 16.9508C3.32254 16.5992 3.125 16.1223 3.125 15.625V11.875C2.95924 11.875 2.80027 11.8092 2.68306 11.6919C2.56585 11.5747 2.5 11.4158 2.5 11.25C2.5 11.0842 2.56585 10.9253 2.68306 10.8081C2.80027 10.6908 2.95924 10.625 3.125 10.625V9.375C3.125 8.8525 3.29167 8.23833 3.80417 7.82667C4.58699 7.202 5.56103 6.86594 6.5625 6.875C7.56398 6.86588 8.53804 7.20194 9.32083 7.82667C9.83417 8.23833 10 8.8525 10 9.375V10.625ZM6.5625 8.125C5.6125 8.125 4.95667 8.50417 4.58667 8.80083C4.46667 8.8975 4.375 9.08583 4.375 9.375V10.625H8.75V9.375C8.75 9.08583 8.65833 8.8975 8.53833 8.80083C7.9773 8.35457 7.27932 8.11582 6.5625 8.125ZM4.375 11.875V15.625C4.375 15.97 4.655 16.25 5 16.25H15C15.1658 16.25 15.3247 16.1842 15.4419 16.0669C15.5592 15.9497 15.625 15.7908 15.625 15.625V11.875H4.375Z" fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.875 9.37497C11.875 9.20921 11.9408 9.05024 12.0581 8.93303C12.1753 8.81582 12.3342 8.74997 12.5 8.74997C12.5 7.93081 13.0258 7.23331 13.7583 6.97831C13.7436 6.88883 13.7485 6.79722 13.7727 6.70983C13.7969 6.62243 13.8398 6.54135 13.8984 6.47221C13.9571 6.40306 14.0301 6.34751 14.1124 6.30942C14.1947 6.27132 14.2843 6.25159 14.375 6.25159C14.4657 6.25159 14.5553 6.27132 14.6376 6.30942C14.7199 6.34751 14.7929 6.40306 14.8516 6.47221C14.9102 6.54135 14.9531 6.62243 14.9773 6.70983C15.0015 6.79722 15.0064 6.88883 14.9917 6.97831C15.3594 7.10638 15.6782 7.34578 15.9037 7.66326C16.1292 7.98075 16.2502 8.36056 16.25 8.74997C16.4158 8.74997 16.5747 8.81582 16.6919 8.93303C16.8092 9.05024 16.875 9.20921 16.875 9.37497C16.875 9.54074 16.8092 9.69971 16.6919 9.81692C16.5747 9.93413 16.4158 9.99997 16.25 9.99997H12.5C12.3342 9.99997 12.1753 9.93413 12.0581 9.81692C11.9408 9.69971 11.875 9.54074 11.875 9.37497ZM14.375 8.12497C14.2092 8.12497 14.0503 8.19082 13.9331 8.30803C13.8158 8.42524 13.75 8.58421 13.75 8.74997H15C15 8.58421 14.9342 8.42524 14.8169 8.30803C14.6997 8.19082 14.5408 8.12497 14.375 8.12497Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            ارائه خدمات به صورت شبانه‌روزی
                                        </span>
                                    </div>
                                    <div class="w-full flex items-center gap-2">
                                        <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                            <svg class=" text-inherit w-[10px]" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.2448 4.5C12.7197 4.50574 13.1858 4.65554 13.5996 4.93545C14.0134 5.21537 14.3614 5.61632 14.6114 6.101L16.5889 9.75H16.8948C17.4004 9.76999 17.8794 10.027 18.2289 10.466L18.3131 10.579C18.6664 11.085 18.8223 11.748 18.7448 12.391L18.6714 13.045C18.5624 13.7845 18.2747 14.4693 17.8442 15.0143C17.4137 15.5594 16.8593 15.9407 16.2498 16.111V18C16.2498 18.3978 16.1181 18.7794 15.8836 19.0607C15.6492 19.342 15.3313 19.5 14.9998 19.5H14.3748C14.0432 19.5 13.7253 19.342 13.4909 19.0607C13.2564 18.7794 13.1248 18.3978 13.1248 18V16.411C11.0431 16.527 8.95808 16.527 6.87475 16.411V18C6.87475 18.3978 6.74305 18.7794 6.50863 19.0607C6.27421 19.342 5.95627 19.5 5.62475 19.5H4.99975C4.66823 19.5 4.35029 19.342 4.11587 19.0607C3.88145 18.7794 3.74975 18.3978 3.74975 18V16.11C3.14104 15.9359 2.58824 15.5514 2.15975 15.0041C1.73125 14.4569 1.44587 13.7709 1.33892 13.031L1.25558 12.401C1.21608 12.0761 1.23457 11.7448 1.30984 11.4291C1.38511 11.1134 1.51543 10.8205 1.69217 10.5699C1.86891 10.3192 2.08803 10.1165 2.33501 9.97513C2.58199 9.83379 2.85118 9.75705 3.12475 9.75H3.40808L5.43475 5.97C5.68026 5.54143 6.00465 5.18639 6.38281 4.93235C6.76098 4.67831 7.18278 4.53209 7.61558 4.505L7.76225 4.5H12.2448ZM5.62475 16.5H4.99975V18H5.62475V16.5ZM14.9998 16.5H14.3748V18H14.9998V16.5ZM3.73808 11.25H3.14475C3.0496 11.2539 2.95619 11.2816 2.87052 11.3315C2.78486 11.3813 2.70884 11.4521 2.64737 11.5394C2.5859 11.6266 2.54034 11.7283 2.51362 11.838C2.48691 11.9476 2.47963 12.0628 2.49225 12.176L2.57142 12.785C2.64486 13.2875 2.85373 13.7472 3.16596 14.0935C3.47818 14.4399 3.8765 14.6536 4.29975 14.702L5.06225 14.776C8.60225 15.095 12.1581 15.07 15.6798 14.705L15.7923 14.69C16.6264 14.552 17.2939 13.783 17.4364 12.817L17.5064 12.184C17.5202 12.0702 17.5138 11.9542 17.4876 11.8436C17.4615 11.733 17.4162 11.6302 17.3547 11.5421C17.2932 11.4539 17.2168 11.3823 17.1307 11.332C17.0445 11.2817 16.9505 11.2537 16.8548 11.25H3.73808ZM11.2498 12C11.4094 11.9996 11.5631 12.0725 11.6793 12.2038C11.7956 12.335 11.8656 12.5147 11.875 12.7059C11.8843 12.8971 11.8324 13.0854 11.7298 13.2322C11.6272 13.3789 11.4816 13.4729 11.3231 13.495L11.2498 13.5H8.74975C8.59012 13.5004 8.43642 13.4275 8.32017 13.2962C8.20391 13.165 8.13391 12.9853 8.12453 12.7941C8.11515 12.6029 8.1671 12.4146 8.26972 12.2678C8.37234 12.1211 8.51785 12.0271 8.67642 12.005L8.74975 12H11.2498ZM6.24975 12C6.4093 11.9999 6.56286 12.073 6.67895 12.2043C6.79504 12.3356 6.86488 12.5153 6.87415 12.7064C6.88342 12.8976 6.83142 13.0857 6.72881 13.2323C6.62619 13.379 6.48074 13.4729 6.32225 13.495L6.24975 13.5H4.99975C4.8402 13.5001 4.68664 13.427 4.57055 13.2957C4.45446 13.1644 4.38462 12.9847 4.37535 12.7936C4.36608 12.6024 4.41808 12.4143 4.52069 12.2677C4.62331 12.121 4.76876 12.0271 4.92725 12.005L4.99975 12H6.24975ZM14.9998 12C15.1593 11.9999 15.3129 12.073 15.429 12.2043C15.545 12.3356 15.6149 12.5153 15.6241 12.7064C15.6334 12.8976 15.5814 13.0857 15.4788 13.2323C15.3762 13.379 15.2307 13.4729 15.0723 13.495L14.9998 13.5H13.7498C13.5902 13.5001 13.4366 13.427 13.3206 13.2957C13.2045 13.1644 13.1346 12.9847 13.1254 12.7936C13.1161 12.6024 13.1681 12.4143 13.2707 12.2677C13.3733 12.121 13.5188 12.0271 13.6773 12.005L13.7498 12H14.9998ZM12.2373 6H7.76225L7.65392 6.005C7.4014 6.02652 7.15687 6.12039 6.94082 6.27872C6.72478 6.43706 6.54352 6.65525 6.41225 6.915L4.89475 9.75H15.0981L13.5556 6.902C13.4272 6.65042 13.2515 6.43843 13.0425 6.28301C12.8335 6.12759 12.5971 6.03306 12.3523 6.007L12.2373 6Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            صرافی
                                        </span>
                                    </div>
                                    <div class="w-full flex items-center gap-2">
                                        <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                            <svg class=" text-inherit w-[10px]" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.625C3.75 5.12772 3.94754 4.65081 4.29917 4.29917C4.65081 3.94754 5.12772 3.75 5.625 3.75H14.0625C14.2283 3.75 14.3872 3.68415 14.5044 3.56694C14.6217 3.44973 14.6875 3.29076 14.6875 3.125C14.6875 2.95924 14.6217 2.80027 14.5044 2.68306C14.3872 2.56585 14.2283 2.5 14.0625 2.5H5.625C4.7962 2.5 4.00134 2.82924 3.41529 3.41529C2.82924 4.00134 2.5 4.7962 2.5 5.625V14.375C2.5 15.2038 2.82924 15.9987 3.41529 16.5847C4.00134 17.1708 4.7962 17.5 5.625 17.5H14.375C15.2038 17.5 15.9987 17.1708 16.5847 16.5847C17.1708 15.9987 17.5 15.2038 17.5 14.375V9.375C17.5 9.20924 17.4342 9.05027 17.3169 8.93306C17.1997 8.81585 17.0408 8.75 16.875 8.75C16.7092 8.75 16.5503 8.81585 16.4331 8.93306C16.3158 9.05027 16.25 9.20924 16.25 9.375V14.375C16.25 14.8723 16.0525 15.3492 15.7008 15.7008C15.3492 16.0525 14.8723 16.25 14.375 16.25H5.625C5.12772 16.25 4.65081 16.0525 4.29917 15.7008C3.94754 15.3492 3.75 14.8723 3.75 14.375V5.625ZM16.7042 6.05417C16.8139 5.93301 16.8718 5.77367 16.8655 5.61031C16.8591 5.44695 16.789 5.29259 16.6702 5.18031C16.5514 5.06803 16.3933 5.00677 16.2299 5.00968C16.0664 5.01258 15.9106 5.07941 15.7958 5.19583L9.13333 12.25L6.045 9.44833C5.98476 9.3904 5.91351 9.34514 5.83546 9.31523C5.75742 9.28532 5.67417 9.27136 5.59064 9.27419C5.50711 9.27702 5.42499 9.29657 5.34915 9.33169C5.27331 9.36681 5.20528 9.41679 5.14909 9.47866C5.09291 9.54053 5.0497 9.61305 5.02203 9.69191C4.99436 9.77078 4.98279 9.85439 4.988 9.93781C4.99321 10.0212 5.0151 10.1027 5.05238 10.1776C5.08965 10.2524 5.14155 10.3189 5.205 10.3733L8.74667 13.5875C8.86781 13.6977 9.02735 13.7559 9.19098 13.7497C9.35461 13.7434 9.50926 13.6732 9.62167 13.5542L16.7042 6.05417Z" fill="currentColor" stroke="currentColor" stroke-width="0.3"></path>
                                            </svg>
                                        </div>
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            اتاق ویژه‌ی سیگار
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 640max:w-full 640max:justify-center 640max:py-4">
                                    <a href="#" class=" flex items-center gap-2 text-sm text-green-600 font-medium 640max:px-4 640max:py-2 640max:bg-green-100 640max:rounded-xl 768max:text-sm">
                                        <svg class=" w-6 text-green-600 hidden 640max:flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                        </svg>
                                        <span>
                                            نمایش هتل روی نقشه
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- dashed border -->
                        <div class=" w-[1px] h-full py-3 1150max:w-full 1150max:h-[1px] 1150max:py-0 1150max:px-3">
                            <div class="w-full h-full border-l-[1px] border-dashed border-neutral-400 1150max:border-t-[1px]">

                            </div>
                        </div>
                        <!-- left => bottom in mobile -->
                        <div class="w-full h-full rounded-xl bg-neutral-50 p-[25px] flex flex-col items-center justify-between gap-4.5 1150max:flex-row 1150max:px-4.5 1150max:py-2">
                            <div class="w-full flex flex-col items-center gap-2 1150max:w-max">
                                <div class="flex items-center gap-1">
                                    <span class=" text-lg text-green-600 font-bold 512max:text-sm">
                                        10,391,200
                                    </span>
                                    <span class=" text-sm text-green-600 font-medium 512max:text-xs">
                                        تومان
                                    </span>
                                </div>
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    1 شب، 1 بزرگسال
                                </span>
                            </div>
                            <button class="rounded-[6px] w-full flex items-center justify-center py-2 px-4 h-10 max-w-[160px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:text-xs 512max:h-8 512max:max-w-max 512max:px-4">
                                جزئیات و رزرو
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class=" w-full max-w-[1440px] px-[100px] 768max:px-[0px] 1024max:px-[36px] 1280max:px-[64px]">
            <div class="w-full overflow-hidden flex flex-col h-[200px] bg-green-600 rounded-xl relative 768max:h-[370px]">
                <!-- content -->
                <div class=" absolute z-[3] top-0 left-0 w-full h-full px-[60px] py-[63px] flex flex-col justify-center 768max:items-center 768max:justify-start 768max:py-10 768max:px-[51px]">
                    <p class=" text-xl text-light font-normal leading-[42px] drop-shadow-txtLightShadow max-w-[528px] 768max:text-center 768max:flex 768max:flex-col 768max:items-center 768max:gap-5">
                        <span class=" text-[24px] text-light font-extrabold font-farsi-extraBold 640max:text-[20px] 768max:text-center 768max:block">
                            سفر راحت و بی‌دغدغه با چمدون!
                        </span>
                        <span class=" 768max:block 640max:text-base">
                            بهترین قیمت‌ها برای هتل، بلیط هواپیما و قطار در سایت ما منتظر شماست.
                        </span>
                    </p>
                </div>
                <!-- cover -->
                <img class=" absolute z-[2] left-3 top-0 bottom-0 w-[654px] my-auto object-cover 768max:w-[120%] 768max:right-0 768max:left-auto 768max:top-[50%] 768max:bottom-auto" src="{{ asset('public/images/sectionCover.png') }}" alt="#">
            </div>
        </section>
        <!-- modals -->
        <div class="filterModal modal w-[100vw] h-[100vh] fixed z-[200] top-0 left-0 bg-[#00000079] px-6 py-4  overflow-auto">
            <div class=" modal-content w-full flex items-center justify-center">
                <div class="w-full flex flex-col items-center gap-2 pb-16">
                    <div class="w-full flex flex-col items-center bg-[#fff] gap-[1px] rounded-xl overflow-hidden">
                        <!-- تعداد نتایج -->
                        <div class="w-full p-4.5 bg-neutral-50 flex flex-col gap-4.5">
                            <div class="flex items-center gap-1">
                                <span class=" text-sm text-neutral-700 font-normal">
                                    نتایج:
                                </span>
                                <span class=" text-sm text-neutral-700 font-normal">
                                    231
                                </span>
                            </div>
                        </div>
                        <!-- ستاره هتل -->
                        <div class="w-full p-4.5 bg-neutral-50 flex flex-col gap-4.5">
                            <span class=" text-sm text-neutral-700 font-normal">
                                ستاره هتل
                            </span>
                            <!--  -->
                            <div class="w-full flex items-center gap-x-2 gap-y-3 flex-wrap">
                                <div class="flex-shrink-[0]">
                                    <label for="hotelStart2-1" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-light flex items-center justify-center text-xs text-neutral-400 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="hotelStart2-1" name="hotelStart2" checked="">
                                        <span>
                                            پنج ستاره
                                        </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="hotelStart2-2" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-light flex items-center justify-center text-xs text-neutral-400 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="hotelStart2-2" name="hotelStart2">
                                        <span>
                                            چهار ستاره
                                        </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="hotelStart2-3" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-light flex items-center justify-center text-xs text-neutral-400 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="hotelStart2-3" name="hotelStart2">
                                        <span>
                                            سه تاره یا کمتر
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- تعیین رنج قیمت -->
                        <div class="w-full p-4.5 bg-neutral-50 flex flex-col gap-4.5">
                            <span class=" text-sm text-neutral-700 font-normal">
                                تعیین رنج قیمت
                            </span>
                            <!-- double range input -->
                            <div class="w-full px-4.5 py-8 flex items-center justify-center relative">
                                <div class="w-full relative">
                                    <div class="w-full h-4 flex items-center relative">
                                        <div class="w-full h-0.5 bg-[#ADADAD80]">

                                        </div>
                                        <div id="gradient-fill2" class="w-full absolute z-[2] left-0 h-1 top-0 bottom-0 my-auto">

                                        </div>
                                    </div>
                                    <input id="rangeInput1-2" dir="ltr" type="range" min="1" max="100" value="10" class="pricingRangeInput w-full z-[4] appearance-none outline-none bg-transparent absolute bottom-0 top-0 my-auto mx-auto right-0">
                                    <input id="rangeInput2-2" dir="ltr" type="range" min="1" max="100" value="90" class="pricingRangeInput w-full z-[4] appearance-none outline-none bg-transparent absolute bottom-0 top-0 my-auto mx-auto right-0 mt-4">
                                </div>
                                <div id="value1-2" class=" absolute z-[2] bottom-1 text-xs text-neutral-700 font-normal text-nowrap" style="left: 5%;">
                                    0 میلیون
                                </div>
                                <div id="value2-2" class=" absolute z-[2] bottom-1 text-xs text-neutral-700 font-normal text-nowrap" style="left: 90%;">
                                    100 میلیون
                                </div>
                            </div>
                        </div>
                        <!-- امکانات تفریحی رفاهی -->
                        <div class="w-full p-4.5 bg-neutral-50 flex flex-col gap-4.5">
                            <span class=" text-sm text-neutral-700 font-normal">
                                امکانات تفریحی رفاهی
                            </span>
                            <div class="w-full flex flex-col gap-4.5">
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-1-1" name="">
                                    <label for="hotelAttributes2-1-1" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-1-1" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        اینترنت رایگان
                                    </label>
                                </div>
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-1-2" name="">
                                    <label for="hotelAttributes2-1-2" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-1-2" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        پارکینگ
                                    </label>
                                </div>
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-1-3" name="">
                                    <label for="hotelAttributes2-1-3" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-1-3" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        استخر
                                    </label>
                                </div>
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-1-4" name="">
                                    <label for="hotelAttributes2-1-4" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-1-4" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        سالن بدنسازی
                                    </label>
                                </div>
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-1-5" name="">
                                    <label for="hotelAttributes2-1-5" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-1-5" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        رستوران
                                    </label>
                                </div>
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-1-6" name="">
                                    <label for="hotelAttributes2-1-6" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-1-6" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        خدمات خشک شویی
                                    </label>
                                </div>
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-1-7" name="">
                                    <label for="hotelAttributes2-1-7" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-1-7" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        اتاق سیگار
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- نزدیکی به مراکز مهم -->
                        <div class="w-full p-4.5 bg-neutral-50 flex flex-col gap-4.5">
                            <span class=" text-sm text-neutral-700 font-normal">
                                نزدیکی به مراکز مهم
                            </span>
                            <div class="w-full flex flex-col gap-4.5">
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-2-1" name="">
                                    <label for="hotelAttributes2-2-1" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-2-1" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        مراکز دیدنی
                                    </label>
                                </div>
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-2-2" name="">
                                    <label for="hotelAttributes2-2-2" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-2-2" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        مراکز خرید
                                    </label>
                                </div>
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-2-3" name="">
                                    <label for="hotelAttributes2-2-3" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-2-3" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        ایستگاه مترو
                                    </label>
                                </div>
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-2-4" name="">
                                    <label for="hotelAttributes2-2-4" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-2-4" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        ایستگاه قطار
                                    </label>
                                </div>
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-2-5" name="">
                                    <label for="hotelAttributes2-2-5" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-2-5" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        فرودگاه
                                    </label>
                                </div>
                                <!-- item -->
                                <div class="flex items-center gap-[9px]">
                                    <input class=" hidden" type="checkbox" id="hotelAttributes2-2-6" name="">
                                    <label for="hotelAttributes2-2-6" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>
                                    <label for="hotelAttributes2-2-6" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                        مسجد
                                    </label>
                                </div>
                                <!-- item -->
                            </div>
                        </div>
                    </div>
                    <!-- submit button -->
                    <button onclick="modalController(document.querySelector('.filterModal'))" class=" fixed z-[2] bottom-6 left-0 right-0 mx-auto w-full h-[60px] flex items-center justify-center flex-grow-[1] px-4 text-light text-[18px] font-medium text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 512max:h-10 512max:text-sm hover:transition-none 640max:max-w-[160px] 768max:h-12">
                        فیلتر
                    </button>
                </div>
            </div>
        </div>
    </main>
    <script>
        function accordionFunc (event, targetId){
            if (event.currentTarget.classList.contains('active')){
                event.currentTarget.classList.remove('active')
                document.getElementById(targetId).classList.add('hidden')
            }else{
                event.currentTarget.classList.add('active')
                document.getElementById(targetId).classList.remove('hidden')
            }
        }

        let accordionButtons = document.querySelectorAll('.footer-accordion-button')
        let accordionContents = document.querySelectorAll('.footer-accordion-content')


        function responsivAccordion (){
            if(window.innerWidth > 640){
                console.log('sallam');

                accordionButtons.forEach(item => {
                    item.classList.add('hidden')
                    item.classList.add('active')
                })
                accordionContents.forEach(item => {
                    item.classList.remove('hidden')
                })
            }
        }
    </script>
    <!-- برای اینپوت رنج قیمت در دسکتاپ -->
    <script>
        const range1 = document.getElementById('rangeInput1');
        const range2 = document.getElementById('rangeInput2');
        const value1 = document.getElementById('value1');
        const value2 = document.getElementById('value2');
        const gradientFill = document.getElementById('gradient-fill');

        function updateLabels() {
            const minValue = 0; // مقدار حداقل
            const maxValue = 100; // مقدار حداکثر

            // جلوگیری از تداخل thumb ها
            if (parseInt(range1.value) >= parseInt(range2.value)) {
                range1.value = range2.value - 1;
            }

            // به روز رسانی مقادیر
            value1.innerText = `${range1.value} میلیون`;
            value2.innerText = `${range2.value} میلیون`;


            // به روز رسانی gradient
            const range1Percentage = (range1.value / maxValue) * 100;
            const range2Percentage = (range2.value / maxValue) * 100;

            // value1.style.left = `${(Math.floor((+(range1.maxValue) / 100) / (range1.value)))}px`
            value1.style.left = `${((range1.clientWidth / 100) * range1Percentage) - (value1.clientWidth / 8)}px`
            value2.style.left = `${((range2.clientWidth / 100) * range2Percentage) - (value2.clientWidth / 8)}px`

            gradientFill.style.background = `linear-gradient(to right, #00000000 ${range1Percentage}%, #8CB398 ${range1Percentage}%, #8CB398 ${range2Percentage}%, #00000000 ${range2Percentage}%)`;
        }

        // اضافه کردن event listener
        range1.addEventListener('input', updateLabels);
        range2.addEventListener('input', updateLabels);
        window.addEventListener('load', event => {
            updateLabels();
            value1.style.left = `4%`
            value2.style.left = `80%`
        })
    </script>
    <!-- برای اینپوت رنج قیمت در موبایل -->
    <script>
        const range1_2 = document.getElementById('rangeInput1-2');
        const range2_2 = document.getElementById('rangeInput2-2');
        const value1_2 = document.getElementById('value1-2');
        const value2_2 = document.getElementById('value2-2');
        const gradientFill_2 = document.getElementById('gradient-fill2');

        function updateLabels1() {
            const minValue = 0; // مقدار حداقل
            const maxValue = 100; // مقدار حداکثر

            // جلوگیری از تداخل thumb ها
            if (parseInt(range1_2.value) >= parseInt(range2_2.value)) {
                range1_2.value = range2_2.value - 1;
            }

            // به روز رسانی مقادیر
            value1_2.innerText = `${range1_2.value} میلیون`;
            value2_2.innerText = `${range2_2.value} میلیون`;

            // به روز رسانی gradient
            const range1Percentage = (range1_2.value / maxValue) * 100;
            const range2Percentage = (range2_2.value / maxValue) * 100;

            value1_2.style.left = `${((range1_2.clientWidth / 100) * range1Percentage) - (value1_2.clientWidth / 2)}px`;
            value2_2.style.left = `${((range2_2.clientWidth / 100) * range2Percentage) - (value2_2.clientWidth / 2)}px`;

            gradientFill_2.style.background = `linear-gradient(to right, #00000000 ${range1Percentage}%, #8CB398 ${range1Percentage}%, #8CB398 ${range2Percentage}%, #00000000 ${range2Percentage}%)`;
        }

        // اضافه کردن event listener
        range1_2.addEventListener('input', updateLabels1);
        range2_2.addEventListener('input', updateLabels1);
        window.addEventListener('load', event => {
            updateLabels1();
            value1_2.style.left = `4%`;
            value2_2.style.left = `80%`;
        })
    </script>
    <script>
        function modalController (modal){
            if(modal.classList.contains('active')){
                modal.classList.remove('active')
                document.querySelector('body').classList.remove('overflow-hidden')
            }else{
                modal.classList.add('active')
                document.querySelector('body').classList.add('overflow-hidden')
            }
        }
    </script>
@endsection
