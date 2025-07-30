@extends('layouts.userHotel')
@section('content')
    @if($reserve->paymentStatus == 'پرداخت شده')
    <main class=" w-full mt-[-80px] flex flex-col items-center gap-20 pb-8 flex-grow-[1] justify-end z-[2]">
        <div class="w-full flex-grow-[1] flex flex-col items-center g45">
            <section class="w-full max-w-[1440px] px-[100px] 768max:px-7 1024max:px-[36px] 1280max:px-[64px]">
                <div class="w-full flex flex-col gap-4.5">
                    <!-- مراحل رزرو -->
                    <div class="w-full h-max grid grid-cols-6 justify-items-center items-start gap-x-2 gap-y-4 py-11 px-4.5 rounded-xl bg-green-100 512max:grid-cols-3 640max:px-2 640max:py-4.5 640max:grid-cols-4">
                        <!-- items -->
                        <div class="w-full flex flex-col items-center gap-5 h-full justify-center pb-12 relative 640max:pb-6">
                            <div class=" w-[50px] aspect-square rounded-full bg-green-300 flex items-center justify-center 768max:w-9">
                                <svg class="w-7 text-light 768max:w-5" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.73334 14.5L13.5333 19.3333L21.2667 9.66668M14.5 28.0333C12.7228 28.0333 10.963 27.6833 9.32103 27.0032C7.67909 26.3231 6.18718 25.3262 4.9305 24.0695C3.67381 22.8128 2.67695 21.3209 1.99684 19.679C1.31672 18.0371 0.966675 16.2772 0.966675 14.5C0.966675 12.7228 1.31672 10.963 1.99684 9.32103C2.67695 7.67909 3.67381 6.18718 4.9305 4.9305C6.18718 3.67381 7.67909 2.67695 9.32103 1.99684C10.963 1.31672 12.7228 0.966675 14.5 0.966675C18.0893 0.966675 21.5315 2.3925 24.0695 4.9305C26.6075 7.46849 28.0333 10.9107 28.0333 14.5C28.0333 18.0893 26.6075 21.5315 24.0695 24.0695C21.5315 26.6075 18.0893 28.0333 14.5 28.0333Z" stroke="white" stroke-width="1.5"/>
                                </svg>
                            </div>
                            <span class=" text-xs text-green-600 text-center font-normal absolute z-[3] bottom-0 left-0 right-0 mx-auto 768max:text-[10px]">
                                انتخاب هتل
                            </span>
                        </div>
                        <div class="w-full flex flex-col items-center gap-5 h-full justify-center pb-12 relative 640max:pb-6">
                            <div class=" w-[50px] aspect-square rounded-full bg-green-300 flex items-center justify-center 768max:w-9">
                                <svg class="w-7 text-light 768max:w-5" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.73334 14.5L13.5333 19.3333L21.2667 9.66668M14.5 28.0333C12.7228 28.0333 10.963 27.6833 9.32103 27.0032C7.67909 26.3231 6.18718 25.3262 4.9305 24.0695C3.67381 22.8128 2.67695 21.3209 1.99684 19.679C1.31672 18.0371 0.966675 16.2772 0.966675 14.5C0.966675 12.7228 1.31672 10.963 1.99684 9.32103C2.67695 7.67909 3.67381 6.18718 4.9305 4.9305C6.18718 3.67381 7.67909 2.67695 9.32103 1.99684C10.963 1.31672 12.7228 0.966675 14.5 0.966675C18.0893 0.966675 21.5315 2.3925 24.0695 4.9305C26.6075 7.46849 28.0333 10.9107 28.0333 14.5C28.0333 18.0893 26.6075 21.5315 24.0695 24.0695C21.5315 26.6075 18.0893 28.0333 14.5 28.0333Z" stroke="white" stroke-width="1.5"/>
                                </svg>
                            </div>
                            <span class=" text-xs text-green-600 text-center font-normal absolute z-[3] bottom-0 left-0 right-0 mx-auto 768max:text-[10px]">
                                مشخصات مسافران
                            </span>
                        </div>
                        <div class="w-full flex flex-col items-center gap-5 h-full justify-center pb-12 relative 640max:pb-6">
                            <div class=" w-[50px] aspect-square rounded-full bg-green-300 flex items-center justify-center 768max:w-9">
                                <svg class="w-7 text-light 768max:w-5" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.73334 14.5L13.5333 19.3333L21.2667 9.66668M14.5 28.0333C12.7228 28.0333 10.963 27.6833 9.32103 27.0032C7.67909 26.3231 6.18718 25.3262 4.9305 24.0695C3.67381 22.8128 2.67695 21.3209 1.99684 19.679C1.31672 18.0371 0.966675 16.2772 0.966675 14.5C0.966675 12.7228 1.31672 10.963 1.99684 9.32103C2.67695 7.67909 3.67381 6.18718 4.9305 4.9305C6.18718 3.67381 7.67909 2.67695 9.32103 1.99684C10.963 1.31672 12.7228 0.966675 14.5 0.966675C18.0893 0.966675 21.5315 2.3925 24.0695 4.9305C26.6075 7.46849 28.0333 10.9107 28.0333 14.5C28.0333 18.0893 26.6075 21.5315 24.0695 24.0695C21.5315 26.6075 18.0893 28.0333 14.5 28.0333Z" stroke="white" stroke-width="1.5"/>
                                </svg>
                            </div>
                            <span class=" text-xs text-green-600 text-center font-normal absolute z-[3] bottom-0 left-0 right-0 mx-auto 768max:text-[10px]">
                                تایید اطلاعات
                            </span>
                        </div>
                        <div class="w-full flex flex-col items-center gap-5 h-full justify-center pb-12 relative 640max:pb-6">
                            <div class=" w-[50px] aspect-square rounded-full bg-green-300 flex items-center justify-center 768max:w-9">
                                <svg class="w-7 text-light 768max:w-5" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.73334 14.5L13.5333 19.3333L21.2667 9.66668M14.5 28.0333C12.7228 28.0333 10.963 27.6833 9.32103 27.0032C7.67909 26.3231 6.18718 25.3262 4.9305 24.0695C3.67381 22.8128 2.67695 21.3209 1.99684 19.679C1.31672 18.0371 0.966675 16.2772 0.966675 14.5C0.966675 12.7228 1.31672 10.963 1.99684 9.32103C2.67695 7.67909 3.67381 6.18718 4.9305 4.9305C6.18718 3.67381 7.67909 2.67695 9.32103 1.99684C10.963 1.31672 12.7228 0.966675 14.5 0.966675C18.0893 0.966675 21.5315 2.3925 24.0695 4.9305C26.6075 7.46849 28.0333 10.9107 28.0333 14.5C28.0333 18.0893 26.6075 21.5315 24.0695 24.0695C21.5315 26.6075 18.0893 28.0333 14.5 28.0333Z" stroke="white" stroke-width="1.5"/>
                                </svg>
                            </div>
                            <span class=" text-xs text-green-600 text-center font-normal absolute z-[3] bottom-0 left-0 right-0 mx-auto 768max:text-[10px]">
                                پرداخت
                            </span>
                        </div>
                        <div class="w-full flex flex-col items-center gap-5 h-full justify-center pb-12 relative 640max:pb-6">
                            <div class=" w-[50px] aspect-square rounded-full bg-green-300 flex items-center justify-center 768max:w-9">
                                <svg class="w-7 text-light 768max:w-5" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.73334 14.5L13.5333 19.3333L21.2667 9.66668M14.5 28.0333C12.7228 28.0333 10.963 27.6833 9.32103 27.0032C7.67909 26.3231 6.18718 25.3262 4.9305 24.0695C3.67381 22.8128 2.67695 21.3209 1.99684 19.679C1.31672 18.0371 0.966675 16.2772 0.966675 14.5C0.966675 12.7228 1.31672 10.963 1.99684 9.32103C2.67695 7.67909 3.67381 6.18718 4.9305 4.9305C6.18718 3.67381 7.67909 2.67695 9.32103 1.99684C10.963 1.31672 12.7228 0.966675 14.5 0.966675C18.0893 0.966675 21.5315 2.3925 24.0695 4.9305C26.6075 7.46849 28.0333 10.9107 28.0333 14.5C28.0333 18.0893 26.6075 21.5315 24.0695 24.0695C21.5315 26.6075 18.0893 28.0333 14.5 28.0333Z" stroke="white" stroke-width="1.5"/>
                                </svg>
                            </div>
                            <span class=" text-xs text-green-600 text-center font-normal absolute z-[3] bottom-0 left-0 right-0 mx-auto 768max:text-[10px]">
                                صدور واچر
                            </span>
                        </div>
                        <div class="w-full flex flex-col items-center gap-5 h-full justify-center pb-12 relative 640max:pb-0">
                            <svg class=" w-11 text-green-600 768max:w-8" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.1119 10.5C18.9525 10.5 18.4186 10.5047 18.2681 10.5141L15.2259 10.5938C15.2101 10.5947 15.1944 10.5913 15.1804 10.5838C15.1664 10.5764 15.1547 10.5652 15.1467 10.5516L9.07265 3.16687C9.03581 3.11811 8.98881 3.07792 8.93491 3.04911C8.88101 3.0203 8.82148 3.00354 8.76047 3H7.5L10.9219 10.5469C10.93 10.5642 10.9336 10.5833 10.9321 10.6023C10.9307 10.6214 10.9243 10.6397 10.9136 10.6555C10.9029 10.6714 10.8883 10.6842 10.8712 10.6926C10.854 10.7011 10.835 10.705 10.8159 10.7039L5.11172 10.7883C5.05236 10.7901 4.99341 10.7779 4.93966 10.7526C4.8859 10.7274 4.83886 10.6898 4.80234 10.643L3.06797 8.53359C2.92734 8.35078 2.6639 8.25234 2.43469 8.25234H1.55062C1.49015 8.25234 1.49906 8.30906 1.51547 8.36625L2.44547 11.7141C2.51577 11.8934 2.51577 12.0926 2.44547 12.2719L1.51453 15.6094C1.48687 15.7008 1.49015 15.75 1.5975 15.75H2.4375C2.81906 15.75 2.87109 15.7003 3.06609 15.4547L4.83328 13.3125C4.87012 13.266 4.91723 13.2287 4.9709 13.2035C5.02458 13.1783 5.08337 13.1659 5.14265 13.1672L10.7995 13.2938C10.8201 13.2942 10.8403 13.2997 10.8583 13.3097C10.8763 13.3198 10.8916 13.334 10.9028 13.3513C10.914 13.3686 10.9208 13.3884 10.9227 13.4089C10.9246 13.4294 10.9214 13.4501 10.9134 13.4691L7.5 21H8.74875C8.80965 20.9964 8.86905 20.9797 8.92287 20.951C8.97668 20.9223 9.02363 20.8822 9.06047 20.8336L15.1472 13.4531C15.1655 13.425 15.2409 13.4109 15.2733 13.4109L18.2686 13.4906C18.4233 13.5 18.9525 13.5047 19.1123 13.5047C21.1875 13.5047 22.5 12.9342 22.5 12C22.5 11.0658 21.1931 10.5 19.1119 10.5Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <!-- other -->
                    <div class="w-full flex flex-col gap-4.5">
                        <div class="w-full">
                            <div class=" w-full max-w-[1240px] rounded-[20px] overflow-hidden grid grid-cols-[40px_1fr] h-max 768max:flex 768max:flex-col-reverse 768max:rounded-xl">
                                <div class=" flex flex-col-reverse items-center py-4.5 px-2 bg-green-300  w-10 h-full 768max:!w-full 768max:!h-6 768max:flex-col 768max:justify-center">
                                    <span class=" text-xs text-light font-medium 768max:hidden" style="writing-mode: vertical-rl;">
                                        صدای مشتری: 0000924245-021
                                    </span>
                                    <span class=" hidden text-xs text-light font-medium 768max:inline">
                                        صدای مشتری: 0000924245-021
                                    </span>
                                </div>
                                <div class="w-full flex-grow-[1] bg-green-100 h-full grid grid-cols-[184px_1fr] gap-[1px] 1024max:grid-cols-1">
                                    <div class="w-full h-full bg-light px-3 py-4.5 flex flex-col justify-between 1024max:flex-row">
                                        <div class="w-full flex flex-col gap-4.5">
                                            <div class="flex flex-col gap-[2px]">
                                                <span class=" text-sm text-green-600 font-medium">
                                                    نام مسافر
                                                </span>
                                                <span class=" text-sm text-green-600 font-medium">
                                                    {{ $reserve->people[0]->firstName.' '.$reserve->people[0]->lastName }}
                                                </span>
                                            </div>
                                            <div class="flex flex-col gap-[2px]">
                                                <span class=" text-sm text-green-600 font-medium">
                                                    کد ملی:
                                                </span>
                                                <span class=" text-sm text-green-600 font-medium">
                                                    {{ $reserve->people[0]->nationalCode }}
                                                </span>
                                            </div>
                                            <div class="flex flex-col gap-[2px]">
                                                <span class=" text-sm text-green-600 font-medium">
                                                    شماره تماس:
                                                </span>
                                                <span class=" text-sm text-green-600 font-medium">
                                                    {{ $reserve->people[0]->mobile }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="w-full gap-4.5 flex flex-col 1024max:w-min">
                                            <button class="rounded-[6px] text-nowrap flex items-center justify-center py-2 px-4 w-full h-10 text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 1024max:w-[140px] 1024max:text-xs 1024max:h-10">
                                                ارسال به ایمیل
                                            </button>
                                            <button class="rounded-[6px] text-nowrap flex items-center justify-center py-2 px-4 w-full h-10 text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 1024max:w-[140px] 1024max:text-xs 1024max:h-10">
                                                چاپ تاییدیه رزرو
                                            </button>
                                        </div>
                                    </div>
                                    <div class="w-full h-full flex flex-col gap-[1px]">
                                        <!-- head -->
                                        <div class="w-full flex items-center justify-between py-3 px-4.5 bg-light">
                                            <div class="flex items-center gap-2">
                                                <span class=" text-sm text-neutral-400 font-medium 512max:text-[10px] 1024max:text-xs">
                                                    شماره سفارش:
                                                </span>
                                                <span class=" text-sm text-neutral-400 font-medium 512max:text-[10px] 1024max:text-xs">
                                                    {{ $reserve->code }}
                                                </span>
                                            </div>
                                            <div class="flex items-center gap-3">
                                                <div class="flex items-center gap-2">
                                                    <span class=" text-sm text-neutral-400 font-medium 512max:text-[10px] 1024max:text-xs">
                                                        تاریخ صدور:
                                                    </span>
                                                    <span class=" text-sm text-neutral-400 font-medium 512max:text-[10px] 1024max:text-xs">
                                                        {{ $reserve->date }}
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- body -->
                                        <div class="w-full h-full flex-grow-[1] grid grid-cols-[1fr_265px] gap-[1px] 640max:grid-cols-1">
                                            <!--  -->
                                            <div class="w-full h-full grid grid-cols-1 gap-[1px]">
                                                <div class="w-full h-full grid grid-cols-[1fr_260px] gap-[1px] 1024max:grid-cols-1">
                                                    <div class="w-full flex flex-col gap-2 p-4.5 bg-light content-center justify-center h-full">
                                                        <span class=" text-[20px] text-neutral-700 font-medium 1024max:text-sm">
                                                            {{ $reserve->hotel->title }}
                                                        </span>
                                                        <span class=" text-xs text-neutral-400 font-normal">
                                                            {{ $reserve->hotel->address }}
                                                        </span>
                                                    </div>
                                                    <div class="w-full grid grid-cols-2 gap-[1px]">
                                                        <div class="w-full flex flex-col gap-4 p-4.5 bg-light content-center justify-center h-full">
                                                            <span class=" text-sm text-neutral-400 font-normal text-center 1024max:gap-1">
                                                                تاریخ ورود:
                                                            </span>
                                                            <span class=" text-sm text-neutral-700 font-normal text-center 1024max:gap-1">
                                                                {{ $reserve->entry_date }}
                                                            </span>
                                                        </div>
                                                        <div class="w-full flex flex-col gap-4 p-4.5 bg-light content-center justify-center h-full">
                                                            <span class=" text-sm text-neutral-400 font-normal text-center 1024max:gap-1">
                                                                تاریخ خروج:
                                                            </span>
                                                            <span class=" text-sm text-neutral-700 font-normal text-center 1024max:gap-1">
                                                                {{ $reserve->exit_date }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @for($i = 0; $i < count($reserve->people); $i++)
                                                    @if(!isset($reserve->people[$i+1]) or $reserve->people[$i+1]->people_number == 0)
                                                        <div class="w-full h-full grid grid-cols-[auto_auto_auto_auto_auto] items-center content-center p-4.5 gap-3 bg-light 512max:grid-cols-2 640max:grid-cols-3 850max:grid-cols-2">
                                                            <div class="flex flex-col gap-[2px]">
                                                        <span class=" text-sm text-neutral-400 font-normal 640max:text-xs">
                                                            تعداد نفر:
                                                        </span>
                                                                <span class=" text-sm text-neutral-700 font-medium 640max:text-xs">
                                                            {{ $reserve->people[$i]->people_number+1 }} بزرگسال
                                                        </span>
                                                            </div>
                                                            <div class="flex flex-col gap-[2px]">
                                                        <span class=" text-sm text-neutral-400 font-normal 640max:text-xs">
                                                            نوع اتاق:
                                                        </span>
                                                                <span class=" text-sm text-neutral-700 font-medium 640max:text-xs">
                                                            {{ $reserve->people[$i]->room->title }}
                                                        </span>
                                                            </div>
                                                            <div class="flex flex-col gap-[2px]">
                                                        <span class=" text-sm text-neutral-400 font-normal 640max:text-xs">
                                                            تعداد اتاق:
                                                        </span>
                                                                <span class=" text-sm text-neutral-700 font-medium 640max:text-xs">
                                                            یک عدد
                                                        </span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endfor
                                                <div class="w-full h-full grid grid-cols-[auto_auto_auto_auto] items-center content-center p-4.5 gap-3 bg-light 512max:grid-cols-2 640max:grid-cols-3 850max:grid-cols-2">
                                                    <div class="flex flex-col gap-[2px]">
                                                        <span class=" text-xs text-neutral-700 font-medium">
                                                            قیمت پایه:
                                                        </span>
                                                        <span class=" text-xs text-neutral-700 font-bold">
                                                            {{ $reserve->bordPrice }} تومان
                                                        </span>
                                                    </div>
                                                    <div class="flex flex-col gap-[2px]">
                                                        <span class=" text-xs text-neutral-700 font-medium">
                                                            تخفیف:
                                                        </span>
                                                        <span class=" text-xs text-neutral-700 font-bold">
                                                            {{ $reserve->bordPrice - $reserve->price }} تومان
                                                        </span>
                                                    </div>
                                                    <div class="flex flex-col gap-[2px]">
                                                        <span class=" text-xs text-neutral-700 font-medium">
                                                            قیمت کل:
                                                        </span>
                                                        <span class=" text-xs text-neutral-700 font-bold">
                                                            {{ $reserve->price }} تومان
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="w-full h-full flex flex-col items-center justify-center p-4.5 gap-8 bg-light 640max:gap-2">
                                                <div class="w-full flex flex-col items-center gap-5 640max:gap-2">
                                                    <img src="{{ asset('public/images/hotelImage2.png') }}" alt="#" class="w-full max-w-[178px]">
                                                    <span class=" text-sm text-green-300 font-medium text-center">
                                                        اقامت خوشی را برای شما آرزومندیم
                                                    </span>
                                                </div>
                                                <span class=" text-base text-neutral-700 text-center font-medium">
                                                    کد پیگیری رزرو: {{ $reserve->trk }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
        <div class="filterModal modal w-[100vw] h-[100vh] fixed z-[15] top-0 left-0 bg-[#00000079] px-6 py-4  overflow-auto">
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
                                    <input id="rangeInput1-2" dir="ltr" type="range" min="0" max="100" value="10" class=" w-full appearance-none bg-transparent absolute z-[7] bottom-0 top-0 my-auto h-[0px] right-0">
                                    <input id="rangeInput2-2" dir="ltr" type="range" min="0" max="100" value="90" class=" w-full appearance-none bg-transparent absolute z-[5] bottom-0 top-0 my-auto h-[0px] right-0 mt-2">
                                </div>
                                <div id="value1-2" class=" absolute z-[2] bottom-1 text-xs text-neutral-700 font-normal text-nowrap">

                                </div>
                                <div id="value2-2" class=" absolute z-[2] bottom-1 text-xs text-neutral-700 font-normal text-nowrap">

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
    @else
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            :root {
                --primary: #ff4757;
                --secondary: #ff6b81;
                --dark: #2f3542;
                --light: #f1f2f6;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            body {
                background-color: #f8f9fa;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                color: var(--dark);
            }

            .payment-failed-container {
                background: white;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                width: 90%;
                max-width: 500px;
                padding: 40px;
                text-align: center;
                transform: scale(0.9);
                animation: scaleIn 0.5s forwards;
            }

            @keyframes scaleIn {
                to {
                    transform: scale(1);
                }
            }

            .icon-container {
                margin-bottom: 25px;
            }

            .failed-icon {
                font-size: 80px;
                color: var(--primary);
                background: linear-gradient(135deg, var(--primary), var(--secondary));
                -webkit-background-clip: text;
                background-clip: text;
                -webkit-text-fill-color: transparent;
                animation: bounce 1s;
            }

            @keyframes bounce {
                0%, 20%, 50%, 80%, 100% {
                    transform: translateY(0);
                }
                40% {
                    transform: translateY(-20px);
                }
                60% {
                    transform: translateY(-10px);
                }
            }

            h1 {
                color: var(--primary);
                margin-bottom: 15px;
                font-size: 28px;
            }

            p {
                color: #666;
                margin-bottom: 25px;
                line-height: 1.6;
            }

            .order-details {
                background: #f8f9fa;
                border-radius: 10px;
                padding: 15px;
                margin: 20px 0;
                text-align: right;
            }

            .detail-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 10px;
            }

            .detail-row:last-child {
                margin-bottom: 0;
            }

            .detail-label {
                color: #666;
                font-weight: 500;
            }

            .detail-value {
                color: var(--dark);
                font-weight: 600;
            }

            .action-buttons {
                display: flex;
                justify-content: center;
                gap: 15px;
                margin-top: 30px;
            }

            .btn {
                padding: 12px 25px;
                border-radius: 8px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                border: none;
                font-size: 16px;
            }

            .btn-retry {
                background: linear-gradient(135deg, var(--primary), var(--secondary));
                color: white;
                box-shadow: 0 4px 15px rgba(255, 71, 87, 0.3);
            }

            .btn-retry:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 20px rgba(255, 71, 87, 0.4);
            }

            .btn-back {
                background: white;
                color: var(--dark);
                border: 1px solid #ddd;
            }

            .btn-back:hover {
                background: #f1f1f1;
            }

            .support-text {
                margin-top: 25px;
                font-size: 14px;
                color: #888;
            }

            .support-text a {
                color: var(--primary);
                text-decoration: none;
                font-weight: 600;
            }
        </style>
        <div class="payment-failed-container">
            <div class="icon-container">
                <i class="fas fa-times-circle failed-icon"></i>
            </div>
            <h1>پرداخت ناموفق بود!</h1>
            <p>متأسفیم، پرداخت شما با مشکل مواجه شد. لطفاً مجدداً تلاش کنید یا از روش پرداخت دیگری استفاده نمایید.</p>

            <div class="order-details">
                <div class="detail-row">
                    <span class="detail-value">{{ $reserve->code }}</span>
                    <span class="detail-label">شماره سفارش:</span>
                </div>
                <div class="detail-row">
                    <span class="detail-value">{{ $reserve->price }} تومان</span>
                    <span class="detail-label">مبلغ:</span>
                </div>
                <div class="detail-row">
                    <span class="detail-value">{{ $reserve->date }}</span>
                    <span class="detail-label">تاریخ:</span>
                </div>
            </div>

            <div class="action-buttons">
                <a class="btn btn-retry" href="{{ route('hotelBooking.results') }}">تلاش مجدد</a>
                <a class="btn btn-back" href="{{ route('index') }}">بازگشت به صفحه اصلی</a>
            </div>
        </div>
    @endif
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
@endsection
