@extends('layouts.userHotel')
@section('content')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <main class=" w-full flex flex-col items-center gap-20 pb-8 pt-4.5 flex-grow-[1]">
        <div class="w-full flex flex-col items-center gap-4.5">
            <!-- breadcrumb -->
            <section class=" w-full max-w-[1440px] px-[100px] 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
                <div class="w-full flex items-center gap-2 px-4.5 py-5 rounded-xl bg-neutral-50 overflow-auto noscrollbar text-sm font-normal text-neutral-400 text-nowrap">
                    <a href="{{ route('index') }}" class=" text-sm text-neutral-400 font-normal hover:text-green-300 text-nowrap flex-shrink-0">
                        صفحه اصلی
                    </a>
                    <span>/</span>
                    <a href="{{ route('hotelBooking.results') }}" class=" text-sm text-neutral-400 font-normal hover:text-green-300 text-nowrap flex-shrink-0">
                        رزرو هتل
                    </a>
                    @if(request('destination'))
                        <span>/</span>
                        <a href="{{ route('hotelBooking.results',['destination' => request('destination')]) }}" class=" text-sm text-neutral-400 font-normal hover:text-green-300 text-nowrap flex-shrink-0">
                            {{ request('destination') }}
                        </a>
                    @endif
                    <span>/</span>
                    <a href="{{ route('hotelBooking.results',request()->all()) }}" class=" text-sm text-neutral-400 font-normal hover:text-green-300 text-nowrap flex-shrink-0">
                        {{ $hotel->title }}
                    </a>
                </div>
            </section>
            <!-- body -->
            <section class=" w-full max-w-[1440px] px-[100px] overflow-x-hidden 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
                <div class="w-full flex flex-col gap-9">
                    <!--  -->
                    <div class="w-full flex flex-col gap-7">
                        <!-- images in desktop -->


                        <div class="relative w-full h-[396px] 768max:hidden 1024max:h-[300px]" style="margin-bottom: 100px">
                            <!-- اسلایدر اصلی -->
                            <div class="swiper hotel-gallery">
                                <div class="swiper-wrapper">
                                    @foreach($hotel->files as $file)
                                        <div class="swiper-slide">
                                            <img
                                                src="{{ asset('storage/' . $file->address) }}"
                                                alt="تصویر هتل {{ $hotel->title }}"
                                                class="w-full h-full rounded-xl object-cover"
                                                loading="lazy"
                                            >
                                        </div>
                                    @endforeach
                                </div>

                                <!-- دکمه‌های ناوبری -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>

                                <!-- پاگینیشن -->
                                <div class="swiper-pagination"></div>
                            </div>

                            <!-- نمایش تصویر اصلی در حالت بزرگ -->
                            <div class="swiper hotel-thumbs mt-3 h-[80px]">
                                <div class="swiper-wrapper">
                                    @foreach($hotel->files as $file)
                                        <div class="swiper-slide cursor-pointer">
                                            <img
                                                src="{{ asset('storage/' . $file->address) }}"
                                                alt="thumbnail"
                                                class="w-full h-full rounded-md object-cover opacity-70 transition-opacity hover:opacity-100"
                                                loading="lazy"
                                            >
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <style>
                            .hotel-gallery {
                                height: calc(100% - 90px); /* فضای thumbs */
                            }

                            .swiper-slide {
                                transition: transform 0.3s ease;
                            }

                            .swiper-button-next,
                            .swiper-button-prev {
                                color: white;
                                background: rgba(0,0,0,0.5);
                                width: 40px;
                                height: 40px;
                                border-radius: 50%;
                                transition: all 0.3s ease;
                            }

                            .swiper-button-next:hover,
                            .swiper-button-prev:hover {
                                background: rgba(0,0,0,0.8);
                            }

                            .swiper-slide-thumb-active img {
                                opacity: 1 !important;
                                border: 2px solid #3b82f6;
                            }
                        </style>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const galleryThumbs = new Swiper('.hotel-thumbs', {
                                    spaceBetween: 10,
                                    slidesPerView: 4,
                                    freeMode: true,
                                    watchSlidesProgress: true,
                                });

                                const galleryTop = new Swiper('.hotel-gallery', {
                                    spaceBetween: 10,
                                    navigation: {
                                        nextEl: '.swiper-button-next',
                                        prevEl: '.swiper-button-prev',
                                    },
                                    pagination: {
                                        el: '.swiper-pagination',
                                        clickable: true,
                                    },
                                    thumbs: {
                                        swiper: galleryThumbs,
                                    },
                                    effect: 'fade',
                                    fadeEffect: {
                                        crossFade: true
                                    },
                                    loop: true,
                                    autoplay: {
                                        delay: 5000,
                                        disableOnInteraction: false,
                                    },
                                });
                            });
                        </script>
                        <!-- images in mobile and tabets -->
                        <div class="w-full hidden py-4.5 flex-col gap-4.5 items-center 768max:flex">
                            <div class="w-full">
                                <div class="swiper xHotel1-images overflow-visible">
                                    <div class="swiper-wrapper">
                                        @foreach($hotel->files as $key => $file)
                                            <div class="swiper-slide">
                                                <div class="w-full aspect-[3/2] rounded-xl overflow-hidden">
                                                    <img src="{{ asset('storage/' . $file->address) }}" alt="#" class="w-full h-full object-cover">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex items-center justify-between">
                                <!-- slider button -->
                                <button onclick="hotelImagesSlider.slidePrev()" class=" w-10 aspect-square flex items-center justify-center rounded-full bg-green-600 512max:w-8">
                                    <svg class=" w-5 text-light 512max:w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                                <!--  -->
                                <div class="xHotel1-images-pagination !w-min flex items-center justify-center">

                                </div>
                                <!-- slider button -->
                                <button onclick="hotelImagesSlider.slideNext()" class=" w-10 aspect-square flex items-center justify-center rounded-full bg-green-600 512max:w-8">
                                    <svg class=" w-5 text-light 512max:w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <!-- content -->
                        <div class="w-full flex gap-4.5 items-center justify-between 768max:flex-col 768max:items-start 768max:justify-start">
                            <div class="flex flex-col gap-4.5 768max:gap-2">
                                <h1 class=" text-2xl text-neutral-700 font-medium 768max:text-[20px]">
                                    {{ $hotel->title }}
                                </h1>
                                <div class="flex items-center gap-2">
                                    <svg class=" w-3 text-green-600" viewBox="0 0 18.33333396911621 24.166667938232422" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2827 22.7921C11.6005 21.5565 12.8202 20.2135 13.9299 18.7761C16.2674 15.7416 17.6894 12.7497 17.7856 10.0893C17.8237 9.00807 17.6505 7.93002 17.2763 6.91953C16.9022 5.90903 16.3348 4.98683 15.608 4.208C14.8811 3.42917 14.0099 2.8097 13.0462 2.38659C12.0825 1.96348 11.0462 1.74541 9.9991 1.74541C8.95203 1.74541 7.9157 1.96348 6.95201 2.38659C5.98832 2.8097 5.11706 3.42917 4.39025 4.208C3.66345 4.98683 3.09602 5.90903 2.72187 6.91953C2.34771 7.93002 2.1745 9.00807 2.21259 10.0893C2.30999 12.7497 3.73311 15.7416 6.06947 18.7761C7.17916 20.2135 8.39882 21.5565 9.71665 22.7921C9.84346 22.9105 9.9378 22.9966 9.99967 23.0502L10.2827 22.7921ZM9.15405 24.1715C9.15405 24.1715 0.833008 16.9303 0.833008 9.80513C0.833008 7.29305 1.79878 4.88387 3.51786 3.10756C5.23695 1.33126 7.56852 0.333344 9.99967 0.333344C12.4308 0.333344 14.7624 1.33126 16.4815 3.10756C18.2006 4.88387 19.1663 7.29305 19.1663 9.80513C19.1663 16.9303 10.8453 24.1715 10.8453 24.1715C10.3824 24.6119 9.6204 24.6072 9.15405 24.1715ZM9.99967 13.1203C10.8506 13.1203 11.6666 12.771 12.2683 12.1493C12.87 11.5276 13.208 10.6844 13.208 9.80513C13.208 8.9259 12.87 8.08269 12.2683 7.46098C11.6666 6.83927 10.8506 6.49 9.99967 6.49C9.14877 6.49 8.33272 6.83927 7.73104 7.46098C7.12936 8.08269 6.79134 8.9259 6.79134 9.80513C6.79134 10.6844 7.12936 11.5276 7.73104 12.1493C8.33272 12.771 9.14877 13.1203 9.99967 13.1203ZM9.99967 14.541C8.7841 14.541 7.61831 14.0421 6.75877 13.1539C5.89923 12.2658 5.41634 11.0612 5.41634 9.80513C5.41634 8.54909 5.89923 7.3445 6.75877 6.45635C7.61831 5.56819 8.7841 5.06924 9.99967 5.06924C11.2153 5.06924 12.381 5.56819 13.2406 6.45635C14.1001 7.3445 14.583 8.54909 14.583 9.80513C14.583 11.0612 14.1001 12.2658 13.2406 13.1539C12.381 14.0421 11.2153 14.541 9.99967 14.541Z" fill="currentColor"/>
                                    </svg>
                                    <span class=" text-xs text-green-600 font-normal">
                                        {{ $hotel->address }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex gap-3 flex-shrink-[0] 768max:self-center">
                                <div class="flex flex-col items-center gap-2 p-4.5 rounded-xl bg-green-600">
                                    <span class=" text-xs font-medium text-light text-center">
                                        امتیاز هتل
                                    </span>
                                    <div class="flex items-center justify-center gap-1">
                                        <svg class=" w-4 text-green-300" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.37446 11.9555L7.5005 10.1039L10.6265 11.9798L9.80781 8.47153L12.5617 6.13267L8.93946 5.81595L7.5005 2.50258L6.06153 5.79159L2.4393 6.10831L5.19319 8.47153L4.37446 11.9555ZM2.86107 14L4.09163 8.82236L0 5.34136L5.38968 4.88334L7.5005 0L9.61131 4.88236L15 5.34039L10.9084 8.82138L12.1399 13.999L7.5005 11.2509L2.86107 14Z" fill="currentColor"/>
                                        </svg>
                                        <span class=" text-sm text-green-300 font-bold">
                                            {{ $hotel->star }} ستاره
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center gap-2 p-4.5 rounded-xl bg-green-600">
                                    <span class=" text-xs font-medium text-light text-center">
                                        امتیاز در سایت
                                    </span>
                                    <div class="flex items-center justify-center gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            {{ $hotel->comments->avg('star') ?? 0 }} از 5
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="w-full flex flex-col gap-4.5">
                        <!--  -->
                        <div class="w-full hidden 1024max:block">
                            <div class="w-full grid grid-cols-[3fr_1fr] gap-2 items-end p-4.5 rounded-xl bg-[#8CB3984D] 512max:gap-4.5 640max:grid-cols-1">
                                <!-- inputs -->
                                <div class="w-full grid grid-cols-2 gap-2 512max:grid-cols-1">
                                    <!-- تاریخ -->
                                    <div class="w-full flex flex-col gap-2">
                                        <label for="#" class=" text-sm text-black font-normal">
                                            تاریخ ورود و خروج
                                        </label>
                                        <div class="w-full flex h-[40px] rounded-xl">
                                            <input data-jdp="" type="text" placeholder="1404/01/06" class=" min-w-[70px] h-full rounded-r-xl bg-light text-sm px-2 font-normal text-neutral-700 placeholder:text-neutral-400 focus:outline-none">
                                            <div class=" px-1 h-full bg-light text-neutral-400 font-normal text-sm flex items-center justify-center">
                                                -
                                            </div>
                                            <input data-jdp="" type="text" placeholder="1403/12/28" class=" min-w-[70px] rounded-l-xl flex-grow-[1] h-full bg-light text-sm px-2 font-normal text-neutral-700 placeholder:text-neutral-400 focus:outline-none">
                                        </div>
                                    </div>
                                    <!-- تعداد مهمان -->
                                    <div class="w-full flex flex-col gap-2">
                                        <label for="#" class=" text-sm text-black font-normal">
                                            تعداد مهمان
                                        </label>
                                        <div class="w-full flex h-[40px] rounded-xl">
                                            <input id="#" name="#" placeholder="1 نفر بزرگسال، 1 کودک" type="text" class=" w-full h-full rounded-xl bg-light text-sm px-4.5 font-normal text-neutral-700 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400">
                                        </div>
                                    </div>
                                </div>
                                <!-- submit button -->
                                @php $q = request()->query(); @endphp
                                <a href="{{ route('hotelBooking.showDescription',$q) }}" class=" w-full h-[40px] flex items-center justify-center flex-grow-[1] px-4 text-light text-sm font-normal text-center rounded-xl bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none">
                                    اتاق های موجود
                                </a>
                            </div>
                        </div>
                        <!-- top -->
                        <div class="w-full flex items-center px-20 rounded-xl bg-green-300 overflow-auto noscrollbar 1024max:px-0">
                            <button onclick="tabContentManager(event, 'underBorderActivedButton', 'hotelInfoTabContent', 'hotelInfoTabContent-1')" class="underBorderActivedButton min-w-min active text-base font-normal text-center py-4 px-4 text-nowrap flex-grow-[1] flex-shrink-[0] flex items-center justify-center 768max:text-sm">
                                اتاق ها
                            </button>
                            <button onclick="tabContentManager(event, 'underBorderActivedButton', 'hotelInfoTabContent', 'hotelInfoTabContent-2')" class="underBorderActivedButton min-w-min text-base font-normal text-center px-4 text-nowrap py-4 flex-grow-[1] flex-shrink-[0] flex items-center justify-center 768max:text-sm">
                                امکانات و ویژگی ها
                            </button>
                            <button onclick="tabContentManager(event, 'underBorderActivedButton', 'hotelInfoTabContent', 'hotelInfoTabContent-3')" class="underBorderActivedButton min-w-min text-base font-normal text-center py-4 px-4 text-nowrap flex-grow-[1] flex-shrink-[0] flex items-center justify-center 768max:text-sm">
                                شرح هتل
                            </button>
                            <button onclick="tabContentManager(event, 'underBorderActivedButton', 'hotelInfoTabContent', 'hotelInfoTabContent-4')" class="underBorderActivedButton min-w-min text-base font-normal text-center py-4 px-4 text-nowrap flex-grow-[1] flex-shrink-[0] flex items-center justify-center 768max:text-sm">
                                موقعیت هتل روی نقشه
                            </button>
                            <button onclick="tabContentManager(event, 'underBorderActivedButton', 'hotelInfoTabContent', 'hotelInfoTabContent-5')" class="underBorderActivedButton min-w-min text-base font-normal text-center py-4 px-4 text-nowrap flex-grow-[1] flex-shrink-[0] flex items-center justify-center 768max:text-sm">
                                نظرات مسافران
                            </button>
                        </div>
                        <!-- body -->
                        <div class="w-full grid grid-cols-[1fr_322px] gap-4.5 content-start 1024max:grid-cols-1">
                            <!-- اطلاعات هتل -->
                            <div class="w-full flex flex-col gap-10">
                                <!-- اتاق ها -->
                                <div id="hotelInfoTabContent-1" class="hotelInfoTabContent w-full">
                                    <div class="w-full flex flex-col gap-4.5">
                                        <!-- head -->
                                        <div class="w-full flex items-center">
                                            <h4 class=" text-base text-green-600 font-normal">
                                                اتاق ها
                                            </h4>
                                        </div>
                                        <!-- body -->
                                        <div class="w-full flex flex-col gap-4">
                                            @foreach($results as $parentIndex =>  $result)
                                                <!-- item -->
                                                @php $q = request()->query(); @endphp
                                                <form method="get" action="{{ route('hotelBooking.choosePeople',$q) }}" style="background: #f6f6f6;border: 1px solid rgba(0, 0, 0, .12);border-radius: 8px;box-shadow: 0 1px 1px -1px rgba(0, 0, 0, .08);" class="w-full grid grid-cols-[1fr_1px_240px]  1150max:grid-cols-1">
                                                    @foreach($result['rooms'] as $needCount => $room)
                                                        <input type="hidden" name="rooms[{{ $needCount }}]" value="{{ $room['room_info']->id }}">
                                                        <!-- right => top in mobile -->
                                                        <div class="w-full h-full flex flex-col justify-between gap-4.5 p-4.5 pb-[30px] bg-neutral-50 rounded-xl">
                                                            <h6 class=" text-base text-black font-normal">
                                                                {{ $room['room_info']->title }}
                                                            </h6>
                                                            <!-- gallery -->
                                                            <div class="custom-gallery">
                                                                @foreach($room['room_info']->files as $file)
                                                                    <div class="custom-gallery-item">
                                                                        <img src="{{ asset('storage/' . $file->address) }}" alt="عکس اتاق" />
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <style>
                                                                .custom-gallery {
                                                                    display: flex;
                                                                    flex-wrap: wrap;
                                                                    gap: 10px;
                                                                    margin-bottom: 10px;
                                                                }

                                                                .custom-gallery-item {
                                                                    width: 80px;
                                                                    height: 80px;
                                                                    overflow: hidden;
                                                                    border-radius: 6px;
                                                                    border: 1px solid #ccc;
                                                                }

                                                                .custom-gallery-item img {
                                                                    width: 100%;
                                                                    height: 100%;
                                                                    object-fit: cover;
                                                                    display: block;
                                                                    transition: transform 0.3s ease;
                                                                }

                                                                .custom-gallery-item img:hover {
                                                                    transform: scale(1.1);
                                                                }
                                                            </style>

                                                            <div class="w-full flex flex-col gap-4.5">
                                                                {{--<div class="flex items-center gap-2">
                                                                <span class=" text-xs text-neutral-400 font-normal">
                                                                    حداکثر مهمان:
                                                                </span>
                                                                    <span class=" text-xs text-black font-normal">
                                                                    3 نفر
                                                                </span>
                                                                </div>--}}
                                                                <div class="w-full flex items-start gap-2 640max:flex-col">
                                                            <span class=" text-xs text-neutral-400 font-normal text-nowrap flex-shrink-[0] mt-2 640max:mt-0">
                                                                توضیحات:
                                                            </span>
                                                                    <div class="w-full flex items-start gap-2 flex-wrap">
                                                                        <div class=" px-4.5 h-7 rounded-[20px] bg-light flex items-center justify-center text-xs text-neutral-700 font-normal">
                                                                            {{ $room['room_info']->description }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- dashed border -->
                                                        <div class=" w-[1px] h-full py-3 1150max:w-full 1150max:h-[1px] 1150max:py-0 1150max:px-3">
                                                            <div class="w-full h-full border-l-[1px] border-dashed border-neutral-400 1150max:border-t-[1px]">

                                                            </div>
                                                        </div>
                                                        <!-- left => bottom in mobile -->
                                                        <div class="w-full h-full rounded-xl bg-neutral-50 p-[30px] flex flex-col items-center justify-between gap-4.5 1150max:flex-row 1150max:px-4.5 1150max:py-2">
                                                            <div class="w-full flex flex-col items-center gap-2  768max:items-start 1150max:w-max">
                                                                <div class="flex items-center gap-1">
                                                            <span class=" text-lg text-green-600 font-bold 512max:text-sm">
                                                                {{ $room['price_for_period'] }}
                                                            </span>
                                                                    <span class=" text-sm text-green-600 font-medium 512max:text-xs">
                                                                تومان
                                                            </span>
                                                                </div>
                                                                <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                                            قیمت {{ $numberOfDays }} شب اقامت
                                                        </span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div class="w-full h-full flex flex-col justify-center gap-4.5 p-4.5 pb-[30px] bg-neutral-50 rounded-xl">
                                                        <div class="w-full flex justify-center items-center gap-2  768max:items-start 1150max:w-max">
                                                            <div class="flex items-center gap-1">
                                                            <span class=" text-lg text-green-600 font-bold 512max:text-sm">
                                                                {{ $result['total_price'] }}
                                                            </span>
                                                                <span class=" text-sm text-green-600 font-medium 512max:text-xs">
                                                                تومان
                                                            </span>
                                                            </div>
                                                            <span class=" text-sm text-neutral-400 font-normal 512max:text-xs">
                                                            قیمت {{ $numberOfDays }} شب اقامت
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class=" w-[1px] h-full py-3 1150max:w-full 1150max:h-[1px] 1150max:py-0 1150max:px-3">
                                                        <div class="w-full h-full border-l-[1px] border-dashed border-neutral-400 1150max:border-t-[1px]">

                                                        </div>
                                                    </div>
                                                    <div class="w-full h-full rounded-xl bg-neutral-50 p-[30px] flex flex-col items-center justify-between gap-4.5 1150max:flex-row 1150max:px-4.5 1150max:py-2">
                                                        <a
                                                            onclick="handleBookRoom(this)"
                                                            class="rounded-[6px] w-full flex items-center justify-center py-2 px-4 h-10 max-w-[160px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:text-xs 512max:h-8 512max:max-w-max 512max:px-4 book-room-btn"
                                                            data-form="{{ $parentIndex }}"
                                                            @if(!\Illuminate\Support\Facades\Auth::guard('user')->user())data-require-login="true" @endif>
                                                            رزرو اتاق
                                                        </a>
                                                    </div>
                                                    @foreach(request()->except('rooms') as $key => $value)
                                                        @if(is_array($value))
                                                            @foreach($value as $arrayValue)
                                                                <input type="hidden" name="{{ $key }}[]" value="{{ $arrayValue }}">
                                                            @endforeach
                                                        @else
                                                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                                        @endif
                                                    @endforeach
                                                </form>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- امکانات و ویژگی‌ها -->
                                <div id="hotelInfoTabContent-2" class="hotelInfoTabContent hidden w-full">
                                    <div class="w-full flex flex-col gap-4.5">
                                        <!-- head -->
                                        <div class="w-full flex items-center justify-between">
                                            <h4 class=" text-base text-green-600 font-normal">
                                                امکانات و ویژگی‌ها
                                            </h4>
                                            <button class=" flex items-center gap-1 text-green-300">
                                                <span class=" text-sm font-normal">
                                                    مشاهده همه
                                                </span>
                                                <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                                </svg>
                                            </button>
                                        </div>
                                        <!-- body -->
                                        <div class="w-full py-4.5 px-2 rounded-xl bg-neutral-50 grid grid-cols-4 gap-2 items-start content-start 640max:grid-cols-2 768max:grid-cols-3">
                                            @foreach($hotel->facilities as $facility)
                                                @if($facility->type == 1 and $facility->pivot->status == 1)
                                                    <div class="w-full flex items-center gap-2">
                                                        <div class="w-10 aspect-square rounded-full bg-green-300 text-light flex items-center justify-center 768max:w-7">
                                                            @if($facility->icon)
                                                                {!! $facility->icon !!}
                                                            @else
                                                                <svg class=" text-inherit w-5 768max:w-4" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.625C3.75 5.12772 3.94754 4.65081 4.29917 4.29917C4.65081 3.94754 5.12772 3.75 5.625 3.75H14.0625C14.2283 3.75 14.3872 3.68415 14.5044 3.56694C14.6217 3.44973 14.6875 3.29076 14.6875 3.125C14.6875 2.95924 14.6217 2.80027 14.5044 2.68306C14.3872 2.56585 14.2283 2.5 14.0625 2.5H5.625C4.7962 2.5 4.00134 2.82924 3.41529 3.41529C2.82924 4.00134 2.5 4.7962 2.5 5.625V14.375C2.5 15.2038 2.82924 15.9987 3.41529 16.5847C4.00134 17.1708 4.7962 17.5 5.625 17.5H14.375C15.2038 17.5 15.9987 17.1708 16.5847 16.5847C17.1708 15.9987 17.5 15.2038 17.5 14.375V9.375C17.5 9.20924 17.4342 9.05027 17.3169 8.93306C17.1997 8.81585 17.0408 8.75 16.875 8.75C16.7092 8.75 16.5503 8.81585 16.4331 8.93306C16.3158 9.05027 16.25 9.20924 16.25 9.375V14.375C16.25 14.8723 16.0525 15.3492 15.7008 15.7008C15.3492 16.0525 14.8723 16.25 14.375 16.25H5.625C5.12772 16.25 4.65081 16.0525 4.29917 15.7008C3.94754 15.3492 3.75 14.8723 3.75 14.375V5.625ZM16.7042 6.05417C16.8139 5.93301 16.8718 5.77367 16.8655 5.61031C16.8591 5.44695 16.789 5.29259 16.6702 5.18031C16.5514 5.06803 16.3933 5.00677 16.2299 5.00968C16.0664 5.01258 15.9106 5.07941 15.7958 5.19583L9.13333 12.25L6.045 9.44833C5.98476 9.3904 5.91351 9.34514 5.83546 9.31523C5.75742 9.28532 5.67417 9.27136 5.59064 9.27419C5.50711 9.27702 5.42499 9.29657 5.34915 9.33169C5.27331 9.36681 5.20528 9.41679 5.14909 9.47866C5.09291 9.54053 5.0497 9.61305 5.02203 9.69191C4.99436 9.77078 4.98279 9.85439 4.988 9.93781C4.99321 10.0212 5.0151 10.1027 5.05238 10.1776C5.08965 10.2524 5.14155 10.3189 5.205 10.3733L8.74667 13.5875C8.86781 13.6977 9.02735 13.7559 9.19098 13.7497C9.35461 13.7434 9.50926 13.6732 9.62167 13.5542L16.7042 6.05417Z" fill="currentColor" stroke="currentColor" stroke-width="0.3"></path>
                                                                </svg>
                                                            @endif
                                                        </div>
                                                        <span class=" text-xs text-neutral-700 font-normal">
                                                            {{ $facility->title }}
                                                        </span>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- درباره هتل -->
                                <div id="hotelInfoTabContent-3" class="hotelInfoTabContent hidden w-full">
                                    <div class="w-full flex flex-col gap-4.5">
                                        <!-- head -->
                                        <div class="w-full flex items-center">
                                            <h4 class=" text-base text-green-600 font-normal">
                                                درباره هتل
                                            </h4>
                                        </div>
                                        <!-- body -->
                                        <div class="w-full p-4.5 flex flex-col gap-4.5 rounded-xl bg-neutral-50 drop-shadow-materialShadow4 512max:px-2 640max:px-3">
                                            <h6 class=" text-sm text-neutral-700 font-medium">
                                                {{ $hotel->title }}
                                            </h6>
                                            <div class="w-full">
                                                <p class=" text-sm text-neutral-700 font-normal text-justify">
                                                    {{ $hotel->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- موقعیت هتل روی نقشه -->
                                <div id="hotelInfoTabContent-4" class="hotelInfoTabContent hidden w-full">
                                    <div class="w-full flex flex-col gap-4.5">
                                        <!-- head -->
                                        <div class="w-full flex items-center">
                                            <h4 class=" text-base text-green-600 font-normal">
                                                موقعیت هتل روی نقشه
                                            </h4>
                                        </div>
                                        <!-- body -->
                                        <div class="w-full">
                                            <div id="viewMap" class="w-full h-[200px] rounded-xl">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- نظرات مشتریان -->
                                <div id="hotelInfoTabContent-5" class="hotelInfoTabContent hidden w-full">
                                    <div class="w-full flex flex-col gap-4.5">
                                        <!-- head -->
                                        <div class="w-full flex items-center">
                                            <h4 class=" text-base text-green-600 font-normal">
                                                نظرات مشتریان
                                            </h4>
                                        </div>
                                        <!-- body -->
                                        <div class="w-full flex flex-col gap-2">
                                            @foreach($hotel->comments as $comment)
                                                <!-- item -->
                                                <div class="w-full flex flex-col gap-4.5 p-4.5 pb-9 rounded-xl bg-neutral-50">
                                                    <!-- head -->
                                                    <div class="flex items-center gap-2">
                                                    <span class=" text-base text-green-600 font-medium">
                                                        {{ $comment->user->people->firstName.' '.$comment->user->people->lastName }}
                                                    </span>
                                                        <div class="flex items-center gap-1">
                                                            @for($i = 1; $i <= $comment->star; $i++)
                                                                <svg class=" w-3 text-green-300" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.0002 16.1484L14.8419 19.0767C15.7285 19.6134 16.8135 18.8201 16.5802 17.8167L15.2969 12.3101L19.5785 8.60005C20.3602 7.92339 19.9402 6.64005 18.9135 6.55839L13.2785 6.08005L11.0735 0.876719C10.6769 -0.0682812 9.32354 -0.0682812 8.92687 0.876719L6.72187 6.06839L1.08687 6.54672C0.0602069 6.62839 -0.359793 7.91172 0.421873 8.58839L4.70354 12.2984L3.42021 17.8051C3.18687 18.8084 4.27187 19.6017 5.15854 19.0651L10.0002 16.1484Z" fill="#8CB398"/>
                                                                </svg>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <!-- body -->
                                                    <p class=" w-full text-sm text-neutral-700 font-medium leading-[24px]">
                                                        {{ $comment->text }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- سرچ اتاق های موجود -->
                            @php $currentQuery = request()->query(); @endphp
                            <form method="get" action="{{ route('hotelBooking.showDescription') }}" class="w-full 1024max:hidden">
                                <div class="w-full flex flex-col gap-9 py-8 px-4.5 rounded-xl bg-[#8CB3984D]">
                                    <!-- inputs -->
                                    <div class="w-full flex flex-col gap-4.5">
                                        <!-- تاریخ -->
                                        <div class="w-full flex flex-col gap-2">
                                            <label for="#" class=" text-sm text-black font-normal">
                                                تاریخ ورود و خروج
                                            </label>
                                            <div class="w-full flex h-[50px] rounded-xl">
                                                <input
                                                    id="dateRange"
                                                    type="text"
                                                    name="dates"
                                                    value="{{ request('dates') }}"
                                                    placeholder="تاریخ ورود و خروج"
                                                    onchange="convertDateRange(this.value)"
                                                    class="w-full min-w-[70px] h-full rounded-r-xl bg-light text-sm px-2 font-normal text-neutral-700 placeholder:text-neutral-400 focus:outline-none text-right rtl"
                                                />
                                                {{--<input data-jdp="" type="text" placeholder="1404/01/06" class=" min-w-[70px] h-full rounded-r-xl bg-light text-sm px-2 font-normal text-neutral-700 placeholder:text-neutral-400 focus:outline-none">
                                                <div class=" px-1 h-full bg-light text-neutral-400 font-normal text-sm flex items-center justify-center">
                                                    -
                                                </div>
                                                <input data-jdp="" type="text" placeholder="1403/12/28" class=" min-w-[70px] flex-grow-[1] h-full bg-light text-sm px-2 font-normal text-neutral-700 placeholder:text-neutral-400 focus:outline-none">
                                                --}}<div class=" flex items-center justify-center h-full bg-light rounded-l-xl px-4.5">
                                                    <svg class=" w-6 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <style>
                                            .flatpickr-calendar.rtl {
                                                direction: rtl;
                                                text-align: right;
                                            }

                                            /* برای راستچین کردن input */
                                            .rtl {
                                                direction: rtl;
                                                text-align: right;
                                            }

                                            /* برای راستچین کردن ماه و سال در هدر تقویم */
                                            .flatpickr-current-month {
                                                text-align: right;
                                                padding-right: 10px;
                                            }

                                            /* برای راستچین کردن روزهای هفته */
                                            .flatpickr-weekdays {
                                                text-align: right;
                                                direction: rtl !important;
                                            }

                                            /* برای راستچین کردن اعداد روزها */
                                            .flatpickr-days {
                                                direction: rtl;
                                            }
                                        </style>
                                        <!-- تعداد مهمان -->
                                        <div class="w-full flex flex-col gap-2" x-data="passengerModal()">
                                            <label for="#" class=" text-sm text-black font-normal">
                                                تعداد مسافر
                                            </label>
                                            <div class="w-full flex h-[50px] rounded-xl">

                                                <input
                                                    id="passengers"
                                                    type="text"
                                                    placeholder="1 بزرگسال، 1 اتاق"
                                                    class="w-full h-full rounded-xl bg-light px-4.5 font-normal text-neutral-700 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400"
                                                    x-model="passengerText"
                                                    @click="isPassengerModalOpen = true"
                                                    readonly
                                                />
                                                <!-- Hidden Input برای ذخیره اطلاعات اتاق‌ها -->
                                                <input
                                                    type="hidden"
                                                    name="rooms_data"
                                                    id="rooms_data"
                                                    x-model="roomsJSON"
                                                />


                                                <!-- Modal -->
                                                <div x-show="isPassengerModalOpen" @click.away="isPassengerModalOpen = false" class="passenger-modal-overlay" style="display: none">
                                                    <div class="passenger-modal-container">
                                                        <div class="passenger-modal-content">
                                                            <!-- Room List -->
                                                            <template x-for="(room, index) in rooms" :key="index">
                                                                <div class="room-card">
                                                                    <div class="room-header">
                                                                        <h3 class="room-title">اتاق <span x-text="index + 1"></span></h3>
                                                                        <a @click="removeRoom(index)" class="delete-room-btn">حذف اتاق</a>
                                                                    </div>
                                                                    <div class="room-controls">
                                                                        <div class="persons-control">
                                                                            <span class="control-label">تعداد نفر:</span>
                                                                            <div class="counter">
                                                                                <a @click="decrementPersons(index)" class="counter-btn decrement">-</a>
                                                                                <span class="counter-value" x-text="room.persons"></span>
                                                                                <a @click="incrementPersons(index)" class="counter-btn increment">+</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </template>

                                                            <!-- Add Room Button -->
                                                            <a @click="addRoom" class="add-room-btn">
                                                                افزودن اتاق
                                                            </a>

                                                            <!-- Close Modal Button -->
                                                            <a @click="isPassengerModalOpen = false" class="close-modal-btn">
                                                                بستن
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <style>
                                                    /* استایل کلی مودال */
                                                    .passenger-modal-overlay {
                                                        position: fixed;
                                                        top: 0;
                                                        left: 0;
                                                        right: 0;
                                                        bottom: 0;
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        z-index: 1000;
                                                        padding: 20px;
                                                    }

                                                    .passenger-modal-container {
                                                        background-color: white;
                                                        border-radius: 12px;
                                                        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
                                                        width: 100%;
                                                        max-width: 420px;
                                                        overflow: hidden;
                                                    }

                                                    .passenger-modal-content {
                                                        padding: 24px;
                                                        display: flex;
                                                        flex-direction: column;
                                                        gap: 16px;
                                                    }

                                                    /* استایل کارت اتاق */
                                                    .room-card {
                                                        border: 1px solid #e0e0e0;
                                                        border-radius: 8px;
                                                        padding: 16px;
                                                        background-color: #f9f9f9;
                                                        transition: all 0.3s ease;
                                                    }

                                                    .room-card:hover {
                                                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                                                    }

                                                    .room-header {
                                                        display: flex;
                                                        justify-content: space-between;
                                                        align-items: center;
                                                        margin-bottom: 12px;
                                                    }

                                                    .room-title {
                                                        font-size: 16px;
                                                        font-weight: 600;
                                                        color: #333;
                                                        margin: 0;
                                                    }

                                                    .delete-room-btn {
                                                        background: none;
                                                        border: none;
                                                        color: #e74c3c;
                                                        font-size: 14px;
                                                        cursor: pointer;
                                                        padding: 4px 8px;
                                                        border-radius: 4px;
                                                        transition: all 0.2s ease;
                                                    }

                                                    .delete-room-btn:hover {
                                                        background-color: #fde8e6;
                                                    }

                                                    /* استایل کنترل تعداد نفرات */
                                                    .persons-control {
                                                        display: flex;
                                                        justify-content: space-between;
                                                        align-items: center;
                                                    }

                                                    .control-label {
                                                        font-size: 14px;
                                                        color: #555;
                                                    }

                                                    .counter {
                                                        display: flex;
                                                        align-items: center;
                                                        gap: 8px;
                                                    }

                                                    .counter-btn {
                                                        width: 28px;
                                                        height: 28px;
                                                        border-radius: 50%;
                                                        border: 1px solid #ddd;
                                                        background-color: white;
                                                        font-size: 14px;
                                                        cursor: pointer;
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        transition: all 0.2s ease;
                                                    }

                                                    .counter-btn:hover {
                                                        background-color: #f0f0f0;
                                                    }

                                                    .counter-value {
                                                        min-width: 20px;
                                                        text-align: center;
                                                        font-weight: 500;
                                                    }

                                                    /* استایل دکمه‌ها */
                                                    .add-room-btn, .close-modal-btn {
                                                        width: 100%;
                                                        padding: 12px;
                                                        border-radius: 8px;
                                                        border: none;
                                                        font-size: 14px;
                                                        font-weight: 500;
                                                        cursor: pointer;
                                                        transition: all 0.2s ease;
                                                    }

                                                    .add-room-btn {
                                                        background-color: #3498db;
                                                        color: white;
                                                    }

                                                    .add-room-btn:hover {
                                                        background-color: #2980b9;
                                                    }

                                                    .close-modal-btn {
                                                        background-color: #95a5a6;
                                                        color: white;
                                                        margin-top: 8px;
                                                    }

                                                    .close-modal-btn:hover {
                                                        background-color: #7f8c8d;
                                                    }
                                                </style>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @foreach(request()->except(['dates','rooms_data']) as $key => $value)
                                    @if(is_array($value))
                                        @foreach($value as $arrayValue)
                                            <input type="hidden" name="{{ $key }}[]" value="{{ $arrayValue }}">
                                        @endforeach
                                    @else
                                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                    @endif
                                @endforeach
                                <!-- submit button -->
                                <button class=" w-full h-[50px] flex items-center justify-center flex-grow-[1] px-4 text-light text-sm font-normal text-center rounded-xl bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:max-w-[200px] 640max:mt-4 640max:self-center 640max:self-center 768max:h-12">
                                    اتاق های موجود
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        </div>
        <!-- banner -->
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
    </main>
    <script>let coordinates = {{ $hotel->mapAddress }}</script>
    <script src="{{ asset('src/scripts/leaflet.js') }}"></script>
    <script src="{{ asset('src/scripts/Swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('src/user-part-scripts/hotelBookingPage-2.js') }}"></script>
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



    <link href="https://bgsrb.github.io/flatpickr-jalali/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://bgsrb.github.io/flatpickr-jalali/examples/jalali/jdate.min.js"></script>
    <script>window.Date=window.JDate;</script>
    <script src="https://bgsrb.github.io/flatpickr-jalali/dist/flatpickr.min.js"></script>
    <script src="https://bgsrb.github.io/flatpickr-jalali/dist/plugins/rangePlugin.js"></script>
    <script src="https://bgsrb.github.io/flatpickr-jalali/dist/l10n/fa.js"></script>


    <script>
        flatpickr("#dateRange", {
            mode: 'range',
            locale: {
                ...flatpickr.l10ns.fa,
                firstDayOfWeek: 6,
            },
            calendar: "jalali",
            dateFormat: 'Y/m/d',
        });
        @if(request('dates'))
        document.getElementById('dateRange').value = `{{ request('dates') }}`;
        @endif
        @if(request('rooms_data'))
        document.getElementById('rooms_data').value = `{{ request('rooms_data') }}`;
        @endif
        function convertDateRange(dateRange) {
            const [startDate, endDate] = dateRange.split(' to ');
            document.getElementById('dateRange').value = `${startDate} تا ${endDate}`;
        }
    </script>

    {{-- rooms filter --}}
    <script>
        const params = new URLSearchParams(window.location.search);
        let roomsData = params.get('rooms_data');
        if(!roomsData) roomsData = [{ persons: 1 }];
        roomsData = roomsData ? JSON.parse(roomsData) : [{ persons: 1 }];

        document.addEventListener('alpine:init', () => {
            Alpine.data('passengerModal', () => ({
                isPassengerModalOpen: false,
                rooms: roomsData,

                get totalPersons() {
                    return this.rooms.reduce((sum, room) => sum + room.persons, 0);
                },

                get passengerText() {
                    const personsText = this.totalPersons === 1 ? '1 نفر' : `${this.totalPersons} نفر`;
                    return `${personsText}`;
                },

                get roomsJSON() {
                    return JSON.stringify(this.rooms); // تبدیل اطلاعات اتاق‌ها به JSON
                },

                addRoom() {
                    this.rooms.push({ persons: 1});
                },

                removeRoom(index) {
                    if (this.rooms.length > 1) {
                        this.rooms.splice(index, 1);
                    }
                },

                incrementPersons(index) {
                    this.rooms[index].persons++;
                },

                decrementPersons(index) {
                    if (this.rooms[index].persons > 1) {
                        this.rooms[index].persons--;
                    }
                },
            }));
        });
    </script>
    <script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>

    <!-- Login Modal -->
    <div id="loginModal" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content" style="background-color: #fefefe; margin: 10% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px; border-radius: 8px;opacity: 1">
            <div class="modal-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 id="loginModalLabel" style="margin: 0;">ورود به حساب کاربری</h2>
                <span class="close" style="cursor: pointer; font-size: 24px;" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-body">
                <div id="loginApp">
                    <!-- Step 1: Mobile -->
                    <div id="loginStep1">
                        <label for="login-mobile" style="display: block; margin-bottom: 8px;">شماره موبایل</label>
                        <div style="position: relative; margin-bottom: 16px;">
                            <input
                                type="text"
                                id="login-mobile"
                                style="width: 100%; padding: 10px 40px 10px 10px; border: 1px solid #ddd; border-radius: 4px;"
                                placeholder="09123456789"
                            >
                            <i class="fa fa-mobile-alt" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #999;"></i>
                        </div>
                        <button
                            id="sendOtpBtn"
                            style="width: 100%; padding: 10px; background: linear-gradient(to right, #4a6bff, #8a2be2); color: white; border: none; border-radius: 4px; cursor: pointer;"
                        >
                            دریافت کد تایید
                        </button>
                    </div>

                    <!-- Step 2: OTP Verification -->
                    <div id="loginStep2" style="display: none;">
                        <p style="margin-bottom: 16px;">کد ۵ رقمی ارسال شده به شماره <span id="mobileNumber" style="font-weight: bold;"></span> را وارد کنید</p>

                        <div style="display: flex; justify-content: center; gap: 8px; margin-bottom: 20px; direction: ltr;">
                            <input type="text" maxlength="1" class="otp-input" style="width: 40px; height: 40px; text-align: center; border: 1px solid #ddd; border-radius: 4px;">
                            <input type="text" maxlength="1" class="otp-input" style="width: 40px; height: 40px; text-align: center; border: 1px solid #ddd; border-radius: 4px;">
                            <input type="text" maxlength="1" class="otp-input" style="width: 40px; height: 40px; text-align: center; border: 1px solid #ddd; border-radius: 4px;">
                            <input type="text" maxlength="1" class="otp-input" style="width: 40px; height: 40px; text-align: center; border: 1px solid #ddd; border-radius: 4px;">
                            <input type="text" maxlength="1" class="otp-input" style="width: 40px; height: 40px; text-align: center; border: 1px solid #ddd; border-radius: 4px;">
                        </div>

                        <button
                            id="verifyOtpBtn"
                            style="width: 100%; padding: 10px; background: linear-gradient(to right, #4a6bff, #8a2be2); color: white; border: none; border-radius: 4px; cursor: pointer; margin-bottom: 10px;"
                        >
                            تایید و ادامه
                        </button>
                        <button
                            onclick="showLoginStep(1)"
                            style="width: 100%; padding: 10px; background: #f1f1f1; color: #333; border: none; border-radius: 4px; cursor: pointer;"
                        >
                            بازگشت
                        </button>
                        <div class="text-center my-3">
                            <button id="resendOtpBtn" class="text-blue-500" disabled>
                                ارسال مجدد کد (<span id="timerDisplay"></span>)
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alertBox" class="alert" style="display: none;"></div>

    <style>
        .alert {
            padding: 12px;
            margin: 10px 0;
            border-radius: 4px;
            display: none;
        }
        .alert.success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert.error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .login-step {
            display: none;
        }
        #loginStep1 {
            display: block;
        }
        .otp-input {
            width: 40px;
            height: 40px;
            text-align: center;
            margin: 0 5px;
            font-size: 18px;
        }
    </style>

    <script>
        // متغیرهای全局
        let otpTimer;
        var otpCountdownDuration = 120; // مدت زمان اعتبار کد OTP (ثانیه)

        // مدیریت مودال
        function openModal() {
            document.getElementById('loginModal').style.display = 'block';
            document.body.style.overflow = 'hidden'; // جلوگیری از اسکرول صفحه
        }

        function closeModal() {
            document.getElementById('loginModal').style.display = 'none';
            document.body.style.overflow = 'auto'; // فعال کردن اسکرول صفحه
            resetLoginForm();
        }

        // مدیریت مراحل لاگین
        function showLoginStep(step) {
            if (step === 1){
                document.getElementById(`loginStep1`).style.display = 'block';
                document.getElementById(`loginStep2`).style.display = 'none';
            }
            if (step === 2){
                document.getElementById(`loginStep1`).style.display = 'none';
                document.getElementById(`loginStep2`).style.display = 'block';
            }
        }

        function resetLoginForm() {
            document.getElementById('login-mobile').value = '';
            document.querySelectorAll('.otp-input').forEach(input => {
                input.value = '';
            });
            showLoginStep(1);
            clearOTPTimer();
        }

        // مدیریت تایمر OTP
        function startOTPTimer() {
            let timeLeft = otpCountdownDuration;
            updateOTPTimerDisplay(timeLeft);

            otpTimer = setInterval(() => {
                timeLeft--;
                updateOTPTimerDisplay(timeLeft);

                if (timeLeft <= 0) {
                    clearOTPTimer();
                }
            }, 1000);
        }

        function clearOTPTimer() {
            if (otpTimer) {
                clearInterval(otpTimer);
                otpTimer = null;
            }
            document.getElementById('resendOtpBtn').disabled = false;
            document.getElementById('timerDisplay').textContent = '';
        }

        function updateOTPTimerDisplay(seconds) {
            const minutes = Math.floor(seconds / 60);
            const remainingSeconds = seconds % 60;
            document.getElementById('timerDisplay').textContent =
                `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
            document.getElementById('resendOtpBtn').disabled = true;
        }

        // مدیریت کلیک روی دکمه رزرو
        window.handleBookRoom = function(button) {
            const requiresLogin = button.getAttribute('data-require-login') === 'true';

            if (requiresLogin) {
                openModal();

                // ذخیره اطلاعات فرم
                const form = button.closest('form');
                localStorage.setItem('pendingBookingForm', form.outerHTML);
                localStorage.setItem('pendingBookingAction', form.action);
            } else {
                button.closest('form').submit();
            }
        };

        // ارسال کد OTP
        document.getElementById('sendOtpBtn').addEventListener('click', async function() {
            const mobile = document.getElementById('login-mobile').value.trim();

            if (!/^09\d{9}$/.test(mobile)) {
                showAlert('لطفاً شماره موبایل معتبر وارد کنید', 'error');
                return;
            }

            this.disabled = true;
            this.innerHTML = '<i class="fa fa-spinner fa-spin"></i> در حال ارسال...';

            try {
                const response = await fetch('{{ route("api.sendOtp") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ mobile })
                });

                const data = await response.json();

                if (data.success) {
                    clearOTPTimer();
                    showLoginStep(2);
                    document.getElementById('mobileNumber').textContent = mobile;
                    otpCountdownDuration = data.remaining_time;
                    startOTPTimer();
                    showAlert('کد تایید ارسال شد', 'success');
                } else {
                    showAlert(data.message || 'خطا در ارسال کد تایید', 'error');
                }
            } catch (error) {
                showAlert('خطا در ارتباط با سرور', 'error');
            } finally {
                this.disabled = false;
                this.innerHTML = 'دریافت کد تایید';
            }
        });

        // تأیید کد OTP
        document.getElementById('verifyOtpBtn').addEventListener('click', async function() {
            const otpCode = Array.from(document.querySelectorAll('.otp-input'))
                .map(input => input.value)
                .join('');

            if (otpCode.length !== 5) {
                showAlert('لطفاً کد ۵ رقمی را کامل وارد کنید', 'error');
                return;
            }

            this.disabled = true;
            this.innerHTML = '<i class="fa fa-spinner fa-spin"></i> در حال بررسی...';

            try {
                const mobile = document.getElementById('login-mobile').value.trim();
                const response = await fetch('{{ route("api.verifyOtp") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        mobile,
                        otp: otpCode
                    })
                });

                const data = await response.json();

                if (data.success) {
                    showAlert('ورود با موفقیت انجام شد', 'success');
                    closeModal();

                    // ارسال رویداد login-success
                    window.dispatchEvent(new CustomEvent('login-success', {
                        detail: { userId: data.user_id }
                    }));

                    // اگر نیاز به ریدایرکت مستقیم بود
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    }
                } else {
                    const errorMsg = data.error === 'expired'
                        ? 'کد تایید منقضی شده است. لطفاً کد جدید دریافت کنید'
                        : 'کد تایید نامعتبر است';

                    showAlert(errorMsg, 'error');
                }
            } catch (error) {
                showAlert('خطا در ارتباط با سرور', 'error');
            } finally {
                this.disabled = false;
                this.innerHTML = 'تایید و ادامه';
            }
        });

        // ارسال مجدد کد OTP
        document.getElementById('resendOtpBtn').addEventListener('click', function() {
            document.getElementById('sendOtpBtn').click();
        });

        // مدیریت رویداد login-success
        window.addEventListener('login-success', function() {
            const pendingForm = localStorage.getItem('pendingBookingForm');
            const pendingAction = localStorage.getItem('pendingBookingAction');

            if (pendingForm && pendingAction) {
                // ایجاد یک فرم موقت و ارسال آن
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = pendingForm;
                const form = tempDiv.firstChild;
                form.action = pendingAction;
                document.body.appendChild(form);
                form.submit();

                // پاک کردن داده‌های موقت
                localStorage.removeItem('pendingBookingForm');
                localStorage.removeItem('pendingBookingAction');
            }
        });

        // مدیریت حرکت بین فیلدهای OTP
        document.querySelectorAll('.otp-input').forEach((input, index, inputs) => {
            input.addEventListener('input', (e) => {
                if (e.target.value && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }

                // اگر آخرین فیلد پر شد، دکمه تأیید را فعال کنید
                if (index === inputs.length - 1 && e.target.value) {
                    document.getElementById('verifyOtpBtn').focus();
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });

        // بستن مودال با کلیک خارج از آن
        window.addEventListener('click', function(event) {
            if (event.target === document.getElementById('loginModal')) {
                closeModal();
            }
        });

        // نمایش پیام به کاربر
        function showAlert(message, type) {
            const alertBox = document.getElementById('alertBox');
            alertBox.textContent = message;
            alertBox.className = `alert ${type}`;
            alertBox.style.display = 'block';

            setTimeout(() => {
                alertBox.style.display = 'none';
            }, 5000);
        }

        // Alpine.js App
        function loginApp() {
            return {
                activeTab: 'login',
                loginStep: 1,
                loginMobile: '',
                otpDigits: Array(5).fill(''),
                isSendingOTP: false,
                isVerifying: false,
                resendDisabled: true,
                countdown: 120,
                message: '',
                messageSuccess: false,

                init() {
                    // بازیابی زمان باقیمانده از localStorage
                    const savedTime = localStorage.getItem('otpCountdown');
                    const savedTimestamp = localStorage.getItem('otpCountdownTimestamp');

                    if (savedTime && savedTimestamp) {
                        const elapsed = Math.floor((Date.now() - savedTimestamp) / 1000);
                        this.countdown = Math.max(0, savedTime - elapsed);

                        if (this.countdown > 0) {
                            this.startCountdown();
                        }
                    }
                },

                startCountdown() {
                    this.resendDisabled = true;
                    localStorage.setItem('otpCountdown', this.countdown);
                    localStorage.setItem('otpCountdownTimestamp', Date.now());

                    const timer = setInterval(() => {
                        this.countdown--;
                        localStorage.setItem('otpCountdown', this.countdown);
                        localStorage.setItem('otpCountdownTimestamp', Date.now());

                        if (this.countdown <= 0) {
                            clearInterval(timer);
                            this.resendDisabled = false;
                            localStorage.removeItem('otpCountdown');
                            localStorage.removeItem('otpCountdownTimestamp');
                        }
                    }, 1000);
                },

                async sendOTP() {
                    if (!this.loginMobile || !this.loginMobile.match(/^09\d{9}$/)) {
                        this.showMessage('لطفاً شماره موبایل معتبر وارد کنید', false);
                        return;
                    }

                    this.isSendingOTP = true;
                    this.message = '';

                    try {
                        const response = await fetch('{{ route('api.sendOtp') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                mobile: this.loginMobile
                            }),
                        });

                        const data = await response.json();
                        if (data.success) {
                            this.loginStep = 2;
                            this.countdown = data.remaining_time || otpCountdownDuration;
                            this.startCountdown();
                            this.showMessage('کد تایید به شماره شما ارسال شد', true);
                        } else {
                            this.showMessage(data.message || 'خطا در ارسال کد تایید', false);
                        }
                    } catch (error) {
                        this.showMessage('خطا در ارتباط با سرور', false);
                    } finally {
                        this.isSendingOTP = false;
                    }
                },

                showMessage(msg, isSuccess) {
                    this.message = msg;
                    this.messageSuccess = isSuccess;
                    setTimeout(() => { this.message = ''; }, 5000);
                }
            };
        }
    </script>
@endsection
