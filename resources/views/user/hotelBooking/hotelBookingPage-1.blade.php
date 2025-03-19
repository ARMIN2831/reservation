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
                    @foreach($hotels as $hotel)
                        <!-- item -->
                        <div class="w-full grid grid-cols-[1fr_1px_240px]  1150max:grid-cols-1">
                        <!-- right => top in mobile -->
                        <div class="w-full h-full grid grid-cols-[227px_1fr] items-center gap-4.5 p-2 rounded-xl bg-neutral-50 640max:grid-cols-1">
                            <!-- img -->
                            <a href="#" class=" w-full">
                                <img src="{{ asset('storage/' . $hotel->banner) }}" alt="#" class=" w-full aspect-[227/173] object-cover rounded-xl 640max:aspect-[227/120]">
                            </a>
                            <div class="w-full flex flex-col gap-4.5 768max:gap-3">
                                <div class="flex flex-col gap-2">
                                    <a href="#" class=" text-base text-neutral-700 font-bold 768max:text-sm">
                                        {{ $hotel->title }}
                                    </a>
                                    <div class="flex items-center gap-2">
                                        <svg class=" w-[15px] text-green-600" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.37446 11.9555L7.5005 10.1039L10.6265 11.9798L9.80781 8.47153L12.5617 6.13267L8.93946 5.81595L7.5005 2.50258L6.06153 5.79159L2.4393 6.10831L5.19319 8.47153L4.37446 11.9555ZM2.86107 14L4.09163 8.82236L0 5.34136L5.38968 4.88334L7.5005 0L9.61131 4.88236L15 5.34039L10.9084 8.82138L12.1399 13.999L7.5005 11.2509L2.86107 14Z" fill="currentColor"/>
                                        </svg>
                                        <span class=" text-xs text-green-600 font-normal">
                                                {{ $hotel->star }} ستاره
                                        </span>
                                    </div>
                                </div>
                                <div class="w-full grid grid-cols-minmax55.200 gap-x-2 gap-y-1">
                                    @foreach($hotel->facilities as $facility)
                                        @if($facility->type == 1 and $facility->pivot->status == 1)
                                            <div class="w-full flex items-center gap-2">
                                                @if($facility->icon)
                                                <div class="w-5 aspect-square rounded-full bg-neutral-400 text-light flex items-center justify-center">
                                                    {!! $facility->icon !!}
                                                </div>
                                                @endif
                                                <span class=" text-xs text-neutral-400 font-normal">
                                                    {{ $facility->title }}
                                                </span>
                                            </div>
                                        @endif
                                    @endforeach
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
                                        {{ $totalPrices[$hotel->id] }}
                                    </span>
                                    <span class=" text-sm text-green-600 font-medium 512max:text-xs">
                                        تومان
                                    </span>
                                </div>
                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                    {{ $numberOfDays }} شب، {{ $personCount }} بزرگسال
                                </span>
                            </div>
                            <button class="rounded-[6px] w-full flex items-center justify-center py-2 px-4 h-10 max-w-[160px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:text-xs 512max:h-8 512max:max-w-max 512max:px-4">
                                جزئیات و رزرو
                            </button>
                        </div>
                    </div>
                    @endforeach
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
