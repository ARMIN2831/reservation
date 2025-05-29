@extends('layouts.adminHotel')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @php $size = 300 * count($sharedData->rooms); $size2 = 165 * count($sharedData->rooms); @endphp
    <div class="w-full h-full overflow-auto noscrollbar flex flex-col gap-7 1024max:pt-[76px] 1024max:gap-0">
        <div class="w-full items-center py-[18px] px-[25px] bg-light hidden 768max:flex">
            <h3 class=" text-base text-green-300 font-medium font-farsi-medium">
                قیمت گذاری و ظرفیت ها
            </h3>
        </div>
        <main class=" w-full h-full p-4.5 rounded-xl bg-neutral-50 overflow-auto flex flex-col gap-4.5 768max:rounded-none 768max:px-[25px]">
            <div class="pricingPageContent pricingPageTabContents w-full h-auto 1024max:!block">
                <div class="w-full flex flex-col items-center gap-5 1024max:hidden">
                    <!-- header  -->
                    <div class="w-full flex items-center justify-between px-4.5 py-[11px] bg-light rounded-xl 768max:hidden">
                        <h5 class=" text-base text-green-300 font-medium font-farsi-medium">
                            قیمت گذاری
                        </h5>
                        <div class=" flex items-center justify-end gap-4.5">
                            <button onclick="modalController(document.querySelector('.rateDeterminationModal'))" class="editButton flex items-center justify-center gap-2">
                                <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                    <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <mask id="path-1-inside-1_273_1119" fill="currentColor">
                                            <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                        </mask>
                                        <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_273_1119)"/>
                                    </svg>
                                </div>
                                <span class=" text-base text-neutral-700 font-normal font-farsi-regular">
                                        تعیین نرخ
                                    </span>
                            </button>
                            <form action="{{ route('hotel.removePricing') }}" method="post">
                                @csrf
                                <input type="hidden" class="selectedOption" name="selected_option">
                                <input type="hidden" class="selectedRoom" name="selected_room">
                                <button class="flex items-center justify-center gap-2">
                                    <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                        <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <span class=" text-base text-neutral-700 font-normal font-farsi-regular">
                                        حذف
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- body -->
                    <div class="w-full flex flex-col gap-4.5">
                        <!-- navigation -->
                        <div class="w-full flex items-center justify-between">
                            <!-- prev month button -->
                            <button class="flex items-center gap-2 prevDay">
                                <svg class=" w-4 text-[#D9D9D9]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                                <span class=" text-sm text-green-600 font-normal">
                                        ماه قبل
                                    </span>
                            </button>
                            <!-- label -->
                            <div class="flex items-center justify-center gap-1 text-sm text-green-600 font-medium">
                                @php
                                    try {
                                        $time = Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($currentDate))->format('Y F');
                                    }catch (Exception $e){
                                        $time = $currentDate;
                                    }
                                @endphp
                                <span>{{ $time }}</span>
                            </div>
                            <input id="selectedDate" type="hidden" value="{{ $currentDate }}">
                            <!-- next month button -->
                            <button class="flex items-center gap-2 nextDay">
                                    <span class=" text-sm text-green-600 font-normal">
                                        ماه بعد
                                    </span>
                                <svg class=" w-4 text-[#D9D9D9]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                        </div>
                        <!-- body -->
                        <div style="overflow-x: scroll;transform: rotate(180deg);display: flex;flex-direction: row-reverse;" class="grid items-center gap-2">
                            <div style="transform: rotate(180deg);">
                                <!-- head -->
                                <div style="grid-template-columns: 246px {{ $size }}px 1fr;" class="grid gap-4 items-center p-4.5 rounded-xl bg-green-300">
                                    <div class="w-full grid grid-cols-2 justify-items-center items-center gap-2">
                                        <span class=" text-xs text-light font-normal text-center">
                                            تاریخ
                                        </span>
                                        <span class=" text-xs text-light font-normal text-center">
                                            نوع
                                        </span>
                                    </div>
                                    <div class="w-full flex justify-items-center gap-16 1280max:gap-4 overflow-hidden">
                                        @foreach($sharedData->rooms as $room)
                                            <div class="w-full flex items-center justify-center gap-2">
                                                <label for="room{{ $room->id }}" class=" text-xs text-light font-normal">
                                                    {{ "{$room->title}({$room->type})" }}
                                                </label>
                                                <input value="{{ $room->id }}" id="room{{ $room->id }}" name="room[]" type="checkbox" class=" hidden">
                                                <label for="room{{ $room->id }}" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                                    <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- body -->
                                <div class="w-full flex flex-col items-center">
                                    <!-- head -->
                                    <div style="grid-template-columns: 246px {{ $size }}px 1fr;" class="grid gap-4 items-center py-2 px-4.5 rounded-xl bg-[#8CB39880]">
                                        <div class="w-full"></div>
                                        <div class="w-full flex justify-items-center items-center gap-16 1280max:gap-4">
                                            @foreach($sharedData->rooms as $room)
                                                <div class="w-full grid grid-cols-2 justify-items-center items-center gap-6 1280max:gap-2">
                                                    <div class="w-full flex items-center justify-center">
                                                        <span class=" text-xs text-green-600 font-normal text-center">
                                                            برد
                                                        </span>
                                                    </div>
                                                    <div class="w-full flex items-center justify-center">
                                                        <span class=" text-xs text-green-600 font-normal text-center">
                                                            آژانس
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- items -->
                                    <div class="flex flex-col gap-2">
                                        @foreach($options as $option)
                                            <!-- item -->
                                            <div style="grid-template-columns: 246px {{ $size }}px 1fr;" class="p-4.5 rounded-xl even:bg-[#DBF0DD80] odd:bg-light grid gap-4 items-center relative">
                                                <!-- checkbox -->
                                                <div class=" absolute z-[2] right-4.5 top-0 bottom-0 my-auto flex items-center justify-center 1280max:bottom-auto 1280max:top-4.5">
                                                    <input id="examplaeId{{ $option['option']->id }}" value="{{ $option['option']->date }}" name="option[]" type="checkbox" class=" hidden">
                                                    <label for="examplaeId{{ $option['option']->id }}" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                                        <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </label>
                                                </div>
                                                <div class="w-full grid grid-cols-2 justify-items-center items-center gap-6">
                                                    <div class="w-full flex flex-col items-center">
                                                    <span class=" text-sm text-neutral-700 font-normal text-center">
                                                         {{ $option['option']->date }}
                                                    </span>
                                                    </div>
                                                    <div class="w-full flex flex-col items-center gap-[30px]">
                                                    <span class=" text-xs text-neutral-400 font-normal text-center">
                                                        پایه
                                                    </span>
                                                        {{--<span class=" text-xs text-neutral-400 font-normal text-center">
                                                            نفر اضاقه
                                                        </span>
                                                        <span class=" text-xs text-neutral-400 font-normal text-center">
                                                            کودک
                                                        </span>--}}
                                                    </div>
                                                </div>
                                                <div class="w-full flex justify-items-center items-center gap-16 1280max:gap-4">
                                                    @foreach($option['rooms'] as $room)
                                                        <div class="w-full grid grid-cols-2 justify-items-center items-center gap-6 1280max:gap-2">
                                                            <div class="w-full flex flex-col items-center gap-[30px]">
                                                                @if(isset($room->bord))
                                                                    <div class="w-full flex items-center justify-center gap-1 text-sm text-neutral-700 text-center font-normal relative 1280max:flex-col">
                                                            <span>
                                                                {{ @$room->bord }}
                                                            </span>
                                                                        <span>
                                                                تومان
                                                            </span>
                                                                        <!-- badge -->
                                                                        {{--<div class="flex items-center justify-center rounded-full bg-green-600 p-1 absolute z-[2] right-[-20px] top-0 bottom-0 my-auto text-xs text-light font-normal text-center aspect-square min-w-7 max-h-7">
                                                                            10%
                                                                        </div>--}}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="w-full flex flex-col items-center gap-[30px]">
                                                                @if(isset($room->bord))
                                                                    <div class="w-full flex items-center justify-center gap-1 text-sm text-neutral-700 text-center font-normal relative 1280max:flex-col">
                                                            <span>
                                                                {{ @$room->ajax }}
                                                            </span>
                                                                        <span>
                                                                تومان
                                                            </span>
                                                                        <!-- badge -->
                                                                        {{-- <div class="flex items-center justify-center rounded-full bg-green-600 p-1 absolute z-[2] right-[-20px] top-0 bottom-0 my-auto text-xs text-light font-normal text-center aspect-square min-w-7 max-h-7">
                                                                             10%
                                                                         </div>--}}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- all parts in mobile -->
                <div class="w-full hidden flex-col items-center gap-4.5 1024max:flex">
                    <!-- قیمت پایه اتاق ها -->
                    <div class="w-full flex flex-col items-center gap-4.5 px-4.5 py-3 rounded-xl bg-light">
                        <!-- header -->
                        <div class="w-full flex items-center justify-between">
                            <h6 class=" text-base text-green-600 font-bold">
                                قیمت پایه اتاق ها
                            </h6>
                            <div class="flex items-center gap-2">
                                <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                    <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <mask id="path-1-inside-1_273_1119" fill="currentColor">
                                            <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                        </mask>
                                        <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_273_1119)"/>
                                    </svg>
                                </button>
                                <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                    <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <!-- body -->
                        <div class="w-full flex flex-col items-center gap-2">
                            <!-- items -->
                            <div class="w-full flex flex-col items-center gap-2">
                                <!-- item -->
                                <div class="w-full flex flex-col items-center gap-3 p-4.5 rounded-xl bg-green-600">
                                    <div class="w-full flex flex-col items-center gap-2">
                                            <span class=" text-sm text-light font-normal text-center">
                                                قیمت پایه اتاق سینگل اکونومی
                                            </span>
                                        <div class="flex items-center justify-center gap-1">
                                            <svg class=" w-[9px] text-light" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.31767 1C3.48517 1.0911 2.73031 1.91385 2.73031 2.9792C2.73031 3.56628 2.97155 4.08552 3.32513 4.4445L3.74697 4.87264L3.09792 4.97542C2.63831 5.04821 2.30134 5.25278 2.01328 5.58586C1.72522 5.91896 1.505 6.38306 1.35066 6.91788C1.07122 7.88685 1.00976 9.06992 1 10.1128H2.52733L2.94671 14.8507C4.0118 15.0532 5.14896 15.0461 6.17474 14.8514L6.54578 10.1129H8C7.99904 9.05717 7.98301 7.85776 7.72979 6.88147C7.5902 6.34314 7.37857 5.87973 7.08705 5.55041C6.79543 5.22112 6.44289 5.01775 5.92688 4.95039L5.26447 4.86394L5.6826 4.42256C6.0209 4.06544 6.25024 3.55214 6.25024 2.97926C6.25024 1.84346 5.40744 1.00279 4.49022 1.00279L4.31767 1Z" stroke="currentColor" stroke-width="0.8"/>
                                            </svg>
                                            <span class=" text-xs text-light font-bold">
                                                    1 نفر
                                                </span>
                                            <span class=" text-xs text-light font-normal">
                                                    ظرفیت استاندارد
                                                </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center gap-1">
                                            <span class=" text-base text-light font-bold">
                                                28,218,500
                                            </span>
                                        <span class=" text-xs text-light font-bold">
                                                تومان
                                            </span>
                                    </div>
                                </div>
                                <!-- item -->
                                <div class="w-full flex flex-col items-center gap-3 p-4.5 rounded-xl bg-green-600">
                                    <div class="w-full flex flex-col items-center gap-2">
                                            <span class=" text-sm text-light font-normal text-center">
                                                قیمت پایه اتاق سینگل اکونومی
                                            </span>
                                        <div class="flex items-center justify-center gap-1">
                                            <svg class=" w-[9px] text-light" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.31767 1C3.48517 1.0911 2.73031 1.91385 2.73031 2.9792C2.73031 3.56628 2.97155 4.08552 3.32513 4.4445L3.74697 4.87264L3.09792 4.97542C2.63831 5.04821 2.30134 5.25278 2.01328 5.58586C1.72522 5.91896 1.505 6.38306 1.35066 6.91788C1.07122 7.88685 1.00976 9.06992 1 10.1128H2.52733L2.94671 14.8507C4.0118 15.0532 5.14896 15.0461 6.17474 14.8514L6.54578 10.1129H8C7.99904 9.05717 7.98301 7.85776 7.72979 6.88147C7.5902 6.34314 7.37857 5.87973 7.08705 5.55041C6.79543 5.22112 6.44289 5.01775 5.92688 4.95039L5.26447 4.86394L5.6826 4.42256C6.0209 4.06544 6.25024 3.55214 6.25024 2.97926C6.25024 1.84346 5.40744 1.00279 4.49022 1.00279L4.31767 1Z" stroke="currentColor" stroke-width="0.8"/>
                                            </svg>
                                            <span class=" text-xs text-light font-bold">
                                                    1 نفر
                                                </span>
                                            <span class=" text-xs text-light font-normal">
                                                    ظرفیت استاندارد
                                                </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center gap-1">
                                            <span class=" text-base text-light font-bold">
                                                28,218,500
                                            </span>
                                        <span class=" text-xs text-light font-bold">
                                                تومان
                                            </span>
                                    </div>
                                </div>
                                <!-- item -->
                                <div class="w-full flex flex-col items-center gap-3 p-4.5 rounded-xl bg-green-600">
                                    <div class="w-full flex flex-col items-center gap-2">
                                            <span class=" text-sm text-light font-normal text-center">
                                                قیمت پایه اتاق سینگل اکونومی
                                            </span>
                                        <div class="flex items-center justify-center gap-1">
                                            <svg class=" w-[9px] text-light" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.31767 1C3.48517 1.0911 2.73031 1.91385 2.73031 2.9792C2.73031 3.56628 2.97155 4.08552 3.32513 4.4445L3.74697 4.87264L3.09792 4.97542C2.63831 5.04821 2.30134 5.25278 2.01328 5.58586C1.72522 5.91896 1.505 6.38306 1.35066 6.91788C1.07122 7.88685 1.00976 9.06992 1 10.1128H2.52733L2.94671 14.8507C4.0118 15.0532 5.14896 15.0461 6.17474 14.8514L6.54578 10.1129H8C7.99904 9.05717 7.98301 7.85776 7.72979 6.88147C7.5902 6.34314 7.37857 5.87973 7.08705 5.55041C6.79543 5.22112 6.44289 5.01775 5.92688 4.95039L5.26447 4.86394L5.6826 4.42256C6.0209 4.06544 6.25024 3.55214 6.25024 2.97926C6.25024 1.84346 5.40744 1.00279 4.49022 1.00279L4.31767 1Z" stroke="currentColor" stroke-width="0.8"/>
                                            </svg>
                                            <span class=" text-xs text-light font-bold">
                                                    1 نفر
                                                </span>
                                            <span class=" text-xs text-light font-normal">
                                                    ظرفیت استاندارد
                                                </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center gap-1">
                                            <span class=" text-base text-light font-bold">
                                                28,218,500
                                            </span>
                                        <span class=" text-xs text-light font-bold">
                                                تومان
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <!-- add button -->
                            <button class="w-full flex items-center justify-center gap-2 h-[130px] rounded-xl bg-[#8CB3984D]">
                                <svg class=" text-green-600 w-4.5" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18C4.02353 18 0 13.9765 0 9C0 4.02353 4.02353 0 9 0C13.9765 0 18 4.02353 18 9C18 13.9765 13.9765 18 9 18ZM9 1.05882C4.60588 1.05882 1.05882 4.60588 1.05882 9C1.05882 13.3941 4.60588 16.9412 9 16.9412C13.3941 16.9412 16.9412 13.3941 16.9412 9C16.9412 4.60588 13.3941 1.05882 9 1.05882Z" fill="currentColor"/>
                                    <path d="M4.23535 8.47046H13.7648V9.52928H4.23535V8.47046Z" fill="currentColor"/>
                                    <path d="M8.4707 4.23523H9.52953V13.7646H8.4707V4.23523Z" fill="currentColor"/>
                                </svg>
                                <span class=" text-sm text-green-600 font-normal">
                                        افزودن اتاق جدید
                                    </span>
                            </button>
                        </div>
                    </div>
                    <!-- قیمت در فصل های مختلف -->
                    <div class="w-full flex flex-col items-center gap-9 px-4.5 py-3 rounded-xl bg-light">
                        <!-- header -->
                        <div class="w-full flex items-center justify-between">
                            <h6 class=" text-base text-green-600 font-bold">
                                قیمت پایه اتاق ها
                            </h6>
                            <div class="flex items-center gap-2">
                                <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                    <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <mask id="path-1-inside-1_273_1119" fill="currentColor">
                                            <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                        </mask>
                                        <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_273_1119)"/>
                                    </svg>
                                </button>
                                <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                    <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <!-- body -->
                        <div class="w-full flex flex-col items-center gap-2 overflow-auto noscrollbar max-h-[324px]">
                            <!-- item -->
                            <div class="w-full flex items-center justify-between p-4.5 rounded-xl bg-neutral-50">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        فروردین
                                    </span>
                                <div class="flex items-center justify-end gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            17,318,600
                                        </span>
                                    <span class=" text-[10px] text-green-300 font-bold">
                                            تومان
                                        </span>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="w-full flex items-center justify-between p-4.5 rounded-xl bg-neutral-50">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        اردیبهشت
                                    </span>
                                <div class="flex items-center justify-end gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            17,318,600
                                        </span>
                                    <span class=" text-[10px] text-green-300 font-bold">
                                            تومان
                                        </span>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="w-full flex items-center justify-between p-4.5 rounded-xl bg-neutral-50">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        خرداد
                                    </span>
                                <div class="flex items-center justify-end gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            17,318,600
                                        </span>
                                    <span class=" text-[10px] text-green-300 font-bold">
                                            تومان
                                        </span>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="w-full flex items-center justify-between p-4.5 rounded-xl bg-neutral-50">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        تیر
                                    </span>
                                <div class="flex items-center justify-end gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            17,318,600
                                        </span>
                                    <span class=" text-[10px] text-green-300 font-bold">
                                            تومان
                                        </span>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="w-full flex items-center justify-between p-4.5 rounded-xl bg-neutral-50">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        مرداد
                                    </span>
                                <div class="flex items-center justify-end gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            17,318,600
                                        </span>
                                    <span class=" text-[10px] text-green-300 font-bold">
                                            تومان
                                        </span>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="w-full flex items-center justify-between p-4.5 rounded-xl bg-neutral-50">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        شهریور
                                    </span>
                                <div class="flex items-center justify-end gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            17,318,600
                                        </span>
                                    <span class=" text-[10px] text-green-300 font-bold">
                                            تومان
                                        </span>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="w-full flex items-center justify-between p-4.5 rounded-xl bg-neutral-50">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        مهر
                                    </span>
                                <div class="flex items-center justify-end gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            17,318,600
                                        </span>
                                    <span class=" text-[10px] text-green-300 font-bold">
                                            تومان
                                        </span>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="w-full flex items-center justify-between p-4.5 rounded-xl bg-neutral-50">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        آبان
                                    </span>
                                <div class="flex items-center justify-end gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            17,318,600
                                        </span>
                                    <span class=" text-[10px] text-green-300 font-bold">
                                            تومان
                                        </span>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="w-full flex items-center justify-between p-4.5 rounded-xl bg-neutral-50">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        آذر
                                    </span>
                                <div class="flex items-center justify-end gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            17,318,600
                                        </span>
                                    <span class=" text-[10px] text-green-300 font-bold">
                                            تومان
                                        </span>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="w-full flex items-center justify-between p-4.5 rounded-xl bg-neutral-50">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        دی
                                    </span>
                                <div class="flex items-center justify-end gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            17,318,600
                                        </span>
                                    <span class=" text-[10px] text-green-300 font-bold">
                                            تومان
                                        </span>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="w-full flex items-center justify-between p-4.5 rounded-xl bg-neutral-50">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        بهمن
                                    </span>
                                <div class="flex items-center justify-end gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            17,318,600
                                        </span>
                                    <span class=" text-[10px] text-green-300 font-bold">
                                            تومان
                                        </span>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="w-full flex items-center justify-between p-4.5 rounded-xl bg-neutral-50">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        اسفند
                                    </span>
                                <div class="flex items-center justify-end gap-1">
                                        <span class=" text-sm text-green-300 font-bold">
                                            17,318,600
                                        </span>
                                    <span class=" text-[10px] text-green-300 font-bold">
                                            تومان
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- تخفیف ها و پیشنهادات ویژه -->
                    <div class="w-full flex flex-col items-center gap-9 px-4.5 py-3 rounded-xl bg-light">
                        <!-- header -->
                        <div class="w-full flex items-center">
                            <h6 class=" text-base text-green-600 font-bold">
                                تخفیف ها و پیشنهادات ویژه
                            </h6>
                        </div>
                        <!-- body -->
                        <div class="w-full flex flex-col items-center gap-2">
                            <!-- items -->
                            <div class="w-full flex flex-col items-center gap-2">
                                <!-- item -->
                                <div class="w-full flex flex-col gap-4.5 p-4.5 rounded-xl bg-neutral-50">
                                    <!-- head -->
                                    <div class="w-full flex items-center justify-between">
                                        <h6 class=" text-base text-neutral-700 font-normal">
                                            تخفیف عید
                                        </h6>
                                        <div class="flex items-center gap-2">
                                            <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="path-1-inside-1_97_2589" fill="currentColor">
                                                        <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                                    </mask>
                                                    <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_97_2589)"/>
                                                </svg>
                                            </button>
                                            <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- body -->
                                    <div class="w-full flex flex-col items-center gap-4.5">
                                        <!-- top -->
                                        <div class="flex flex-col items-center gap-2">
                                                <span class=" text-sm text-neutral-400 font-normal text-center">
                                                    1404/01/01 - 1404/01/12
                                                </span>
                                            <span class=" text-sm text-neutral-700 font-normal text-center">
                                                    اتاق های سینگل اکونومی
                                                </span>
                                        </div>
                                        <!-- bottom -->
                                        <div class="flex flex-col items-center">
                                            <del class=" text-xs text-neutral-400 font-medium text-center">
                                                17,318,600 تومان
                                            </del>
                                            <span class=" font-bold text-green-300">
                                                    <span class=" text-base">
                                                        17,318,600
                                                    </span>
                                                    <span class=" text-xs">
                                                        تومان
                                                    </span>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- item -->
                                <div class="w-full flex flex-col gap-4.5 p-4.5 rounded-xl bg-neutral-50">
                                    <!-- head -->
                                    <div class="w-full flex items-center justify-between">
                                        <h6 class=" text-base text-neutral-700 font-normal">
                                            تخفیف عید
                                        </h6>
                                        <div class="flex items-center gap-2">
                                            <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="path-1-inside-1_97_2589" fill="currentColor">
                                                        <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                                    </mask>
                                                    <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_97_2589)"/>
                                                </svg>
                                            </button>
                                            <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- body -->
                                    <div class="w-full flex flex-col items-center gap-4.5">
                                        <!-- top -->
                                        <div class="flex flex-col items-center gap-2">
                                                <span class=" text-sm text-neutral-400 font-normal text-center">
                                                    1404/01/01 - 1404/01/12
                                                </span>
                                            <span class=" text-sm text-neutral-700 font-normal text-center">
                                                    اتاق های سینگل اکونومی
                                                </span>
                                        </div>
                                        <!-- bottom -->
                                        <div class="flex flex-col items-center">
                                            <del class=" text-xs text-neutral-400 font-medium text-center">
                                                17,318,600 تومان
                                            </del>
                                            <span class=" font-bold text-green-300">
                                                    <span class=" text-base">
                                                        17,318,600
                                                    </span>
                                                    <span class=" text-xs">
                                                        تومان
                                                    </span>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- item -->
                                <div class="w-full flex flex-col gap-4.5 p-4.5 rounded-xl bg-neutral-50">
                                    <!-- head -->
                                    <div class="w-full flex items-center justify-between">
                                        <h6 class=" text-base text-neutral-700 font-normal">
                                            تخفیف عید
                                        </h6>
                                        <div class="flex items-center gap-2">
                                            <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="path-1-inside-1_97_2589" fill="currentColor">
                                                        <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                                    </mask>
                                                    <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_97_2589)"/>
                                                </svg>
                                            </button>
                                            <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- body -->
                                    <div class="w-full flex flex-col items-center gap-4.5">
                                        <!-- top -->
                                        <div class="flex flex-col items-center gap-2">
                                                <span class=" text-sm text-neutral-400 font-normal text-center">
                                                    1404/01/01 - 1404/01/12
                                                </span>
                                            <span class=" text-sm text-neutral-700 font-normal text-center">
                                                    اتاق های سینگل اکونومی
                                                </span>
                                        </div>
                                        <!-- bottom -->
                                        <div class="flex flex-col items-center">
                                            <del class=" text-xs text-neutral-400 font-medium text-center">
                                                17,318,600 تومان
                                            </del>
                                            <span class=" font-bold text-green-300">
                                                    <span class=" text-base">
                                                        17,318,600
                                                    </span>
                                                    <span class=" text-xs">
                                                        تومان
                                                    </span>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- item -->
                                <div class="w-full flex flex-col gap-4.5 p-4.5 rounded-xl bg-neutral-50">
                                    <!-- head -->
                                    <div class="w-full flex items-center justify-between">
                                        <h6 class=" text-base text-neutral-700 font-normal">
                                            تخفیف عید
                                        </h6>
                                        <div class="flex items-center gap-2">
                                            <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="path-1-inside-1_97_2589" fill="currentColor">
                                                        <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                                    </mask>
                                                    <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_97_2589)"/>
                                                </svg>
                                            </button>
                                            <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- body -->
                                    <div class="w-full flex flex-col items-center gap-4.5">
                                        <!-- top -->
                                        <div class="flex flex-col items-center gap-2">
                                                <span class=" text-sm text-neutral-400 font-normal text-center">
                                                    1404/01/01 - 1404/01/12
                                                </span>
                                            <span class=" text-sm text-neutral-700 font-normal text-center">
                                                    اتاق های سینگل اکونومی
                                                </span>
                                        </div>
                                        <!-- bottom -->
                                        <div class="flex flex-col items-center">
                                            <del class=" text-xs text-neutral-400 font-medium text-center">
                                                17,318,600 تومان
                                            </del>
                                            <span class=" font-bold text-green-300">
                                                    <span class=" text-base">
                                                        17,318,600
                                                    </span>
                                                    <span class=" text-xs">
                                                        تومان
                                                    </span>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- item -->
                                <div class="w-full flex flex-col gap-4.5 p-4.5 rounded-xl bg-neutral-50">
                                    <!-- head -->
                                    <div class="w-full flex items-center justify-between">
                                        <h6 class=" text-base text-neutral-700 font-normal">
                                            تخفیف عید
                                        </h6>
                                        <div class="flex items-center gap-2">
                                            <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="path-1-inside-1_97_2589" fill="currentColor">
                                                        <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                                    </mask>
                                                    <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_97_2589)"/>
                                                </svg>
                                            </button>
                                            <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- body -->
                                    <div class="w-full flex flex-col items-center gap-4.5">
                                        <!-- top -->
                                        <div class="flex flex-col items-center gap-2">
                                                <span class=" text-sm text-neutral-400 font-normal text-center">
                                                    1404/01/01 - 1404/01/12
                                                </span>
                                            <span class=" text-sm text-neutral-700 font-normal text-center">
                                                    اتاق های سینگل اکونومی
                                                </span>
                                        </div>
                                        <!-- bottom -->
                                        <div class="flex flex-col items-center">
                                            <del class=" text-xs text-neutral-400 font-medium text-center">
                                                17,318,600 تومان
                                            </del>
                                            <span class=" font-bold text-green-300">
                                                    <span class=" text-base">
                                                        17,318,600
                                                    </span>
                                                    <span class=" text-xs">
                                                        تومان
                                                    </span>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- add button -->
                            <button class="w-full flex items-center justify-center gap-2 h-[130px] rounded-xl bg-[#8CB3984D]">
                                <svg class=" text-green-600 w-4.5" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18C4.02353 18 0 13.9765 0 9C0 4.02353 4.02353 0 9 0C13.9765 0 18 4.02353 18 9C18 13.9765 13.9765 18 9 18ZM9 1.05882C4.60588 1.05882 1.05882 4.60588 1.05882 9C1.05882 13.3941 4.60588 16.9412 9 16.9412C13.3941 16.9412 16.9412 13.3941 16.9412 9C16.9412 4.60588 13.3941 1.05882 9 1.05882Z" fill="currentColor"/>
                                    <path d="M4.23535 8.47046H13.7648V9.52928H4.23535V8.47046Z" fill="currentColor"/>
                                    <path d="M8.4707 4.23523H9.52953V13.7646H8.4707V4.23523Z" fill="currentColor"/>
                                </svg>
                                <span class=" text-sm text-green-600 font-normal">
                                        افزودن تخفیف یا پیشنهادات جدید
                                    </span>
                            </button>
                        </div>
                    </div>
                    <!-- تنظیمات ظرفیت -->
                    <div class="w-full flex flex-col gap-5 px-4.5 py-3 bg-light rounded-xl">
                        <!-- head -->
                        <div class="w-full flex items-center justify-between">
                            <h6 class=" text-base text-green-600 font-bold">
                                تنظیمات ظرفیت
                            </h6>
                            <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="path-1-inside-1_97_2589" fill="currentColor">
                                        <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"></path>
                                    </mask>
                                    <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_97_2589)"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- body -->
                        <div class="w-full flex flex-col gap-4.5">
                            <div class="w-full flex flex-col gap-4.5">
                                <!-- title -->
                                <span class=" text-base text-neutral-700 font-bold">
                                        محدودت اقامت:
                                    </span>
                                <!-- body -->
                                <div class="w-full flex items-center justify-between px-4.5 max-w-[400px]">
                                    <div class="flex items-center gap-2">
                                            <span class=" text-base text-neutral-700 font-normal">
                                                حداقل
                                            </span>
                                        <div class=" flex items-center justify-center h-10 px-5 rounded-[20px] bg-[#DBF0DD] text-sm text-neutral-700 font-bold text-center">
                                            2 شب
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                            <span class=" text-base text-neutral-700 font-normal">
                                                حداقل
                                            </span>
                                        <div class=" flex items-center justify-center h-10 px-5 rounded-[20px] bg-[#DBF0DD] text-sm text-neutral-700 font-bold text-center">
                                            2 شب
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- محدودیت های خاص -->
                    <div class="w-full flex flex-col gap-5 p-4.5 bg-light rounded-xl">
                        <!-- head -->
                        <div class="w-full flex items-center justify-between">
                            <h6 class=" text-base text-green-600 font-bold">
                                تنظیمات ظرفیت
                            </h6>
                            <button class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="path-1-inside-1_97_2589" fill="currentColor">
                                        <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"></path>
                                    </mask>
                                    <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_97_2589)"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- body -->
                        <div class="w-full flex flex-col gap-4.5">
                            <!-- items -->
                            <div class="w-full flex flex-col gap-3">

                            </div>
                            <!-- add button -->
                            <button class=" flex items-center gap-2">
                                <svg class=" w-4.5 text-green-600" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18C4.02353 18 0 13.9765 0 9C0 4.02353 4.02353 0 9 0C13.9765 0 18 4.02353 18 9C18 13.9765 13.9765 18 9 18ZM9 1.05882C4.60588 1.05882 1.05882 4.60588 1.05882 9C1.05882 13.3941 4.60588 16.9412 9 16.9412C13.3941 16.9412 16.9412 13.3941 16.9412 9C16.9412 4.60588 13.3941 1.05882 9 1.05882Z" fill="currentColor"/>
                                    <path d="M4.23535 8.47046H13.7648V9.52928H4.23535V8.47046Z" fill="currentColor"/>
                                    <path d="M8.4707 4.23523H9.52953V13.7646H8.4707V4.23523Z" fill="currentColor"/>
                                </svg>
                                <span class=" text-sm text-green-600 font-normal">
                                        افزودن محدودیت جدید
                                    </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>






            <div class="capacitiesPageContent pricingPageTabContents hidden 1024max:!block w-full h-auto">
                <div class="w-full flex flex-col items-center gap-5 1024max:hidden">
                    <!-- header  -->
                    <div class="w-full flex items-center justify-between px-4.5 py-[11px] bg-light rounded-xl 768max:hidden">
                        <h5 class=" text-base text-green-300 font-medium font-farsi-medium">
                            ظرفیت و محدودیت اتاق ها
                        </h5>
                        <div class=" flex items-center justify-end gap-4.5">
                            <button onclick="modalController(document.querySelector('.determinationOfCapacityModal'))" class="editButton flex items-center justify-center gap-2">
                                <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                    <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <mask id="path-1-inside-1_273_1119" fill="currentColor">
                                            <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                        </mask>
                                        <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_273_1119)"/>
                                    </svg>
                                </div>
                                <span class=" text-base text-neutral-700 font-normal font-farsi-regular">
                                        تعیین ظرفیت اتاق
                                    </span>
                                </a>
                                <button onclick="modalController(document.querySelector('.determiningRoomRestrictionsModal'))" class="editButton flex items-center justify-center gap-2">
                                    <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                        <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <mask id="path-1-inside-1_273_1119" fill="currentColor">
                                                <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                            </mask>
                                            <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_273_1119)"/>
                                        </svg>
                                    </div>
                                    <span class=" text-base text-neutral-700 font-normal font-farsi-regular">
                                        تعیین محدودیت اتاق
                                    </span>
                                </button>
                                <form action="{{ route('hotel.removeCapacity') }}" method="post">
                                    @csrf
                                    <input type="hidden" class="selectedOptionB" name="selected_option">
                                    <input type="hidden" class="selectedRoomB" name="selected_room">
                                    <button class="flex items-center justify-center gap-2">
                                        <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                            <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <span class=" text-base text-neutral-700 font-normal font-farsi-regular">
                                        حذف محدودیت اتاق
                                    </span>
                                    </button>
                                </form>
                        </div>
                    </div>
                    <!-- body -->
                    <div class="w-full flex flex-col gap-4.5">
                        <!-- navigation -->
                        <div class="w-full flex items-center justify-between">
                            <!-- prev month button -->
                            <button class="flex items-center gap-2 prevDay">
                                <svg class=" w-4 text-[#D9D9D9]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                                <span class=" text-sm text-green-600 font-normal">
                                        ماه قبل
                                    </span>
                            </button>
                            <!-- label -->
                            <div class="flex items-center justify-center gap-1 text-sm text-green-600 font-medium">
                                <span>{{ $time }}</span>
                            </div>
                            <!-- next month button -->
                            <button class="flex items-center gap-2 nextDay">
                                    <span class=" text-sm text-green-600 font-normal">
                                        ماه بعد
                                    </span>
                                <svg class=" w-4 text-[#D9D9D9]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                        </div>
                        <!-- body -->
                        <div style="overflow-x: scroll;transform: rotate(180deg);display: flex;flex-direction: row-reverse;" class="grid items-center gap-2">
                            <div style="transform: rotate(180deg);">
                                <!-- header -->
                                <div style="grid-template-columns: 246px {{ $size2 }}px 1fr;" class="grid gap-4 items-center p-4.5 rounded-xl bg-green-300">
                                    <div class="w-full grid grid-cols-2 justify-items-center items-center gap-2">
                                        <span class=" text-xs text-light font-normal text-center">
                                            تاریخ
                                        </span>
                                        <span class=" text-xs text-light font-normal text-center">

                                        </span>
                                    </div>
                                    <div class="w-full flex justify-items-center gap-16 1280max:gap-4 overflow-hidden">
                                        @foreach($sharedData->rooms as $room)
                                            <div class="w-full flex items-center justify-center gap-2">
                                                <label for="roomB{{ $room->id }}" class=" text-xs text-light font-normal">
                                                    {{ "{$room->title}({$room->type})" }}
                                                </label>
                                                <input value="{{ $room->id }}" id="roomB{{ $room->id }}" name="roomB[]" type="checkbox" class=" hidden">
                                                <label for="roomB{{ $room->id }}" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                                    <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- items -> body -->
                                <div class="w-full flex flex-col gap-2">
                                    <!-- item -->
                                    @foreach($options as $option)
                                        <!-- item -->
                                        <div style="grid-template-columns: 246px {{ $size2 }}px 1fr;" class="p-4.5 rounded-xl even:bg-[#DBF0DD80] odd:bg-light grid gap-4 items-center relative">
                                            <!-- checkbox -->
                                            <div class=" absolute z-[2] right-4.5 top-0 bottom-0 my-auto flex items-center justify-center 1280max:bottom-auto 1280max:top-4.5">
                                                <input value="{{ $option['option']->date }}" id="option2{{ $option['option']->id }}" name="option2[]" type="checkbox" class=" hidden">
                                                <label for="option2{{ $option['option']->id }}" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                                    <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </label>
                                            </div>
                                            <div class="w-full grid grid-cols-2 justify-items-center items-center gap-6">
                                            <span class=" text-sm text-neutral-700 font-normal text-center">
                                                {{ $option['option']->date }}
                                            </span>
                                            </div>
                                            <div class="w-full flex justify-items-center items-center gap-16 1280max:gap-4">
                                                @foreach($option['rooms'] as $room)
                                                    <div class="w-full flex flex-col max-w-[110px]">
                                                        @if(isset($room->capacity))
                                                            <div class="flex items-center gap-2 self-start">
                                                                <div class=" w-full flex items-center">
                                                                    <input id="sallamm2{{ @$room->id }}" name="" type="checkbox" class=" hidden">
                                                                    <label for="sallamm2{{ @$room->id }}" class=" w-3 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                                                        <svg class=" w-[8px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        </svg>
                                                                    </label>
                                                                </div>
                                                                <span class=" text-xs text-neutral-400 font-normal text-nowrap">
                                                        رزرو : {{ $room->capacity }}
                                                    </span>
                                                            </div>
                                                            <div class="flex items-center gap-2 self-end">
                                                                <span class=" text-sm font-normal text-neutral-700">
                                                                    @php
                                                                        $jDate = Morilog\Jalali\Jalalian::fromFormat('Y/m/d', $option['option']->date);
                                                                        $formattedDate = $jDate->format('j F');
                                                                        echo $formattedDate;
                                                                    @endphp
                                                                </span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach



                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- modals -->

    <!-- پاپ اپ تعیین نرخ -->
    <div class="rateDeterminationModal modal w-[100vw] h-[100vh] fixed z-[15] top-0 left-0 bg-[#0000002c] px-6 py-4">
        <div class=" modal-content w-full h-full flex items-center justify-center">
            <form method="post" action="{{ route('hotel.setPrice') }}" class="w-full max-w-[800px] p-4.5 bg-light rounded-xl flex flex-col">
                @csrf
                <div class="w-full flex flex-col gap-8 max-h-[500px] overflow-y-auto">
                    <!-- header -->
                    <div class="w-full py-[13px] px-4.5 rounded-xl bg-neutral-50">
                        <h6 class=" text-[14px] text-green-600 font-normal font-farsi-regular">
                            ویرایش اطلاعات هتل
                        </h6>
                    </div>
                    <!-- body -->
                    <div class="w-full flex flex-col gap-4.5 px-4.5 py-1 640max:px-0">
                        <!-- انتخاب تاریخ -->
                        <div class="w-full flex flex-col gap-4.5">
                            <div class="w-full grid grid-cols-2 gap-4.5 items-center 512max:grid-cols-1">

                                <input type="hidden" class="selectedOption" name="selected_option">
                                <input type="hidden" class="selectedRoom" name="selected_room">

                                <div class="w-full flex flex-col gap-2">
                                    <label for="" class=" text-sm text-neutral-700 font-normal">
                                        تاریخ ورود
                                    </label>
                                    <div class="w-full flex items-center">
                                        <input name="entry" data-jdp="" class=" w-full rounded-[4px] bg-neutral-50 text-neutral-700 placeholder:text-neutral-400 font-normal text-sm h-10 p-2 focus:outline-none focus:border-[1px] focus:border-neutral-400 transition-all duration-200 ease-out" type="text" placeholder="1403/11/11" dir="rtl">
                                        <svg class=" w-4.5 text-green-300 -mr-[25px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-full flex flex-col gap-2">
                                    <label for="" class=" text-sm text-neutral-700 font-normal">
                                        تاریخ خروج
                                    </label>
                                    <div class="w-full flex items-center">
                                        <input name="exit" data-jdp="" class=" w-full rounded-[4px] bg-neutral-50 text-neutral-700 placeholder:text-neutral-400 font-normal text-sm h-10 p-2 focus:outline-none focus:border-[1px] focus:border-neutral-400 transition-all duration-200 ease-out" type="text" placeholder="1403/11/11" dir="rtl">
                                        <svg class=" w-4.5 text-green-300 -mr-[25px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex items-center content-start gap-x-2 gap-y-3 flex-wrap">
                                <div class="flex-shrink-[0]">
                                    <label for="fffff1" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff1" name="zero">
                                        <span>
                                                شنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffff2" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff2" name="one">
                                        <span>
                                                یکشنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffff3" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff3" name="two">
                                        <span>
                                                دوشنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffff4" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff4" name="three">
                                        <span>
                                                سه شنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffff5" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff5" name="four">
                                        <span>
                                                چهارشنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffff6" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff6" name="five">
                                        <span>
                                                پنج شنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffff7" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff7" name="six">
                                        <span>
                                                جمعه
                                            </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <div class="w-full grid grid-cols-2 items-center gap-4.5 512max:grid-cols-1">
                            <div class="w-full flex flex-col gap-2">
                                <label for="" class=" text-sm text-neutral-700 font-normal">
                                    اتاق
                                </label>
                                <select name="room_id" id="countries" class="bg-neutral-50 text-black font-normal text-xs rounded-[6px] focus:outline-none focus:border-[1px] focus:border-neutral-400 block w-full p-2.5">
                                    @foreach($sharedData->rooms as $room)
                                        <option value="{{ $room->id }}" class="text-neutral-700 !font-farsi-regular font-normal text-xs transition-all duration-500 hover:bg-neutral-200 hover:transition-none aria-selected:bg-neutral-200">
                                            {{ "{$room->title}({$room->type})" }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--  -->
                        <div class="w-full flex flex-col gap-2">
                            <div class="w-full">
                                    <span class=" text-xs text-neutral-700 font-normal">
                                        نرخ اتاق ها:
                                    </span>
                            </div>
                            <div class="w-full flex flex-col rounded-[6px] overflow-hidden">
                                <div class="w-full grid grid-cols-3 justify-items-center items-center py-2 px-4.5 bg-green-300">
                                        <span class=" text-sm text-light font-normal">
                                            نرخ
                                        </span>
                                    <span class=" text-sm text-light font-normal">
                                            برد
                                        </span>
                                    <span class=" text-sm text-light font-normal">
                                            آژانس
                                        </span>
                                </div>
                                <div class="w-full grid grid-cols-3 justify-items-center items-center py-2 px-4.5 odd:bg-neutral-50 even:bg-[#DBF0DD80]">
                                        <span class=" text-xs text-neutral-400 font-normal">
                                            پایه
                                        </span>
                                    <span class=" text-xs text-neutral-700 font-normal">
                                            <input type="number" name="bord">
                                        تومان
                                        </span>
                                    <span class=" text-xs text-neutral-700 font-normal">
                                            <input type="number" name="ajax">
                                        تومان
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex items-center justify-end gap-4.5 pt-4.5">
                    <a onclick="modalController(document.querySelector('.rateDeterminationModal'))" class=" rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-300 transition-all duration-400 ease-out hover:bg-green-100 hover:text-green-600 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                        بازگشت
                    </a>
                    <button type="submit" class=" rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                        ذخیره
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- پاپ اپ تعیین محدودیت اتاق -->
    <div class="determiningRoomRestrictionsModal modal w-[100vw] h-[100vh] fixed z-[15] top-0 left-0 bg-[#0000002c] px-6 py-4">
        <div class=" modal-content w-full h-full flex items-center justify-center">
            <form method="post" action="{{ route('hotel.setLimit') }}" class="w-full max-w-[800px] p-4.5 bg-light rounded-xl flex flex-col">
                @csrf
                <div class="w-full flex flex-col gap-8 max-h-[500px] overflow-y-auto">
                    <!-- header -->
                    <div class="w-full py-[13px] px-4.5 rounded-xl bg-neutral-50">
                        <h6 class=" text-[14px] text-green-600 font-normal font-farsi-regular">
                            تعیین محدودیت اتاق
                        </h6>
                    </div>
                    <!-- body -->
                    <div class="w-full flex flex-col gap-4.5 px-4.5 py-1 640max:px-0">
                        <!-- انتخاب تاریخ -->
                        <div class="w-full flex flex-col gap-4.5">
                            <div class="w-full grid grid-cols-2 gap-4.5 items-center 512max:grid-cols-1">
                                <div class="w-full flex flex-col gap-2">
                                    <label for="" class=" text-sm text-neutral-700 font-normal">
                                        تاریخ ورود
                                    </label>
                                    <div class="w-full flex items-center">
                                        <input name="entry" data-jdp="" class=" w-full rounded-[4px] bg-neutral-50 text-neutral-700 placeholder:text-neutral-400 font-normal text-sm h-10 p-2 focus:outline-none focus:border-[1px] focus:border-neutral-400 transition-all duration-200 ease-out" type="text" placeholder="1403/11/11" dir="rtl">
                                        <svg class=" w-4.5 text-green-300 -mr-[25px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-full flex flex-col gap-2">
                                    <label for="" class=" text-sm text-neutral-700 font-normal">
                                        تاریخ خروج
                                    </label>
                                    <div class="w-full flex items-center">
                                        <input name="exit" data-jdp="" class=" w-full rounded-[4px] bg-neutral-50 text-neutral-700 placeholder:text-neutral-400 font-normal text-sm h-10 p-2 focus:outline-none focus:border-[1px] focus:border-neutral-400 transition-all duration-200 ease-out" type="text" placeholder="1403/11/11" dir="rtl">
                                        <svg class=" w-4.5 text-green-300 -mr-[25px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex items-center content-start gap-x-2 gap-y-3 flex-wrap">
                                <div class="flex-shrink-[0]">
                                    <label for="fffff1-2" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff1-2" name="zero">
                                        <span>
                                                شنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffff2-2" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff2-2" name="one">
                                        <span>
                                                یکشنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffff3-2" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff3-2" name="two">
                                        <span>
                                                دوشنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffff4-2" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff4-2" name="three">
                                        <span>
                                                سه شنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffff5-2" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff5-2" name="four">
                                        <span>
                                                چهارشنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffff6-2" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff6-2" name="five">
                                        <span>
                                                پنج شنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffff7-2" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffff7-2" name="six">
                                        <span>
                                                جمعه
                                            </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- تنظیم محدودیت اتاق ها -->
                        <div class="w-full flex flex-col gap-2">
                            <!-- title -->
                            <div class="w-full">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        محدودیت اتاق ها:
                                    </span>
                            </div>
                            <!-- body -->
                            <div class="w-full overflow-x-auto noscrollbar">
                                <div class="w-full flex flex-col rounded-[6px] overflow-hidden min-w-[680px]">
                                    <!-- header -->
                                    <div class="w-full grid grid-cols-[2fr_1fr_1fr_1fr_1fr_1fr] gap-2 items-center justify-items-center bg-green-300 p-2">
                                            <span class=" text-xs text-light font-normal">
                                                اتاق
                                            </span>
                                        <span class=" text-xs text-light font-normal">
                                                حداقل اقامت
                                            </span>
                                        <span class=" text-xs text-light font-normal">
                                                حداکثر اقامت
                                            </span>
                                        <span class=" text-xs text-light font-normal">
                                                محدودیت ورود
                                            </span>
                                        <span class=" text-xs text-light font-normal">
                                                محدودیت خروج
                                            </span>
                                        <span class=" text-xs text-light font-normal">
                                                وضعیت
                                            </span>
                                    </div>
                                    <!-- items -->
                                    <div class="w-full flex flex-col">
                                        <!-- item -->
                                        <div class="w-full px-2 h-10 grid grid-cols-[2fr_1fr_1fr_1fr_1fr_1fr] gap-2 items-center odd:bg-light even:bg-[#DBF0DD80]">
                                            <div class="w-full flex items-center justify-center">
                                                    <span class=" text-xs text-neutral-400 font-normal text-center">
                                                        همه اتاق ها
                                                    </span>
                                            </div>
                                            <div class="w-full flex items-center justify-center h-full">
                                                <a data-input-counter-increment="quantity-input1" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                    <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </a>
                                                <input id="quantity-input1" value="1" data-input-counter data-input-counter-min="0" data-input-counter-max="50" type="text" class=" w-full flex-grow-[1] h-full text-xs text-neutral-700 text-center font-normal focus:outline-none bg-transparent">
                                                <a data-input-counter-decrement="quantity-input1" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                    <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="w-full flex items-center justify-center h-full">
                                                <a data-input-counter-increment="quantity-input2" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                    <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </a>
                                                <input id="quantity-input2" value="1" data-input-counter data-input-counter-min="0" data-input-counter-max="50" type="text" class=" w-full flex-grow-[1] h-full text-xs text-neutral-700 text-center font-normal focus:outline-none bg-transparent">
                                                <a data-input-counter-decrement="quantity-input2" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                    <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="w-full flex items-center justify-center h-full">
                                                <select aria-placeholder="بدون وضعیت" class="w-full h-full text-neutral-700 text-xs font-normal focus:outline-none text-ellipsis text-nowrap bg-transparent">
                                                    <option selected>بدون وضعیت</option>
                                                    <option >استعلام</option>
                                                    <option >باز</option>
                                                    <option >بسته</option>
                                                </select>
                                            </div>
                                            <div class="w-full flex items-center justify-center h-full">
                                                <select aria-placeholder="بدون وضعیت" class="w-full h-full text-neutral-700 text-xs font-normal focus:outline-none text-ellipsis text-nowrap bg-transparent">
                                                    <option selected>بدون وضعیت</option>
                                                    <option >استعلام</option>
                                                    <option >باز</option>
                                                    <option >بسته</option>
                                                </select>
                                            </div>
                                            <div class="w-full flex items-center justify-center h-full">
                                                <select aria-placeholder="بدون وضعیت" class="w-full h-full text-neutral-700 text-xs font-normal focus:outline-none text-ellipsis text-nowrap bg-transparent">
                                                    <option selected>بدون وضعیت</option>
                                                    <option >استعلام</option>
                                                    <option >باز</option>
                                                    <option >بسته</option>
                                                </select>
                                            </div>
                                        </div>
                                        @foreach($sharedData->rooms as $room)

                                            <!-- item -->
                                            <div class="w-full px-2 h-10 grid grid-cols-[2fr_1fr_1fr_1fr_1fr_1fr] gap-2 items-center odd:bg-light even:bg-[#DBF0DD80]">
                                                <div class="w-full flex items-center justify-center">
                                                    <span class=" text-xs text-neutral-400 font-normal text-center">
                                                        {{ "{$room->title}({$room->type})" }}
                                                    </span>
                                                </div>
                                                <div class="w-full flex items-center justify-center h-full">
                                                    <a data-input-counter-increment="quantity-input1-{{ $room->id }}" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                        <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                        </svg>
                                                    </a>
                                                    <input name="room[{{ $room->id }}][min]" id="quantity-input1-{{ $room->id }}" value="1" data-input-counter data-input-counter-min="0" data-input-counter-max="50" type="text" class=" w-full flex-grow-[1] h-full text-xs text-neutral-700 text-center font-normal focus:outline-none bg-transparent">
                                                    <a data-input-counter-decrement="quantity-input1-{{ $room->id }}" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                        <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="w-full flex items-center justify-center h-full">
                                                    <a data-input-counter-increment="quantity-input2-{{ $room->id }}" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                        <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                        </svg>
                                                    </a>
                                                    <input name="room[{{ $room->id }}][max]" id="quantity-input2-{{ $room->id }}" value="1" data-input-counter data-input-counter-min="0" data-input-counter-max="50" type="text" class=" w-full flex-grow-[1] h-full text-xs text-neutral-700 text-center font-normal focus:outline-none bg-transparent">
                                                    <a data-input-counter-decrement="quantity-input2-2" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                        <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="w-full flex items-center justify-center h-full">
                                                    <select name="room[{{ $room->id }}][entry]" aria-placeholder="بدون وضعیت" class="w-full h-full text-neutral-700 text-xs font-normal focus:outline-none text-ellipsis text-nowrap bg-transparent">
                                                        <option value="بدون وضعیت" selected>بدون وضعیت</option>
                                                        <option value="استعلام" >استعلام</option>
                                                        <option value="باز" >باز</option>
                                                        <option value="بسته" >بسته</option>
                                                    </select>
                                                </div>
                                                <div class="w-full flex items-center justify-center h-full">
                                                    <select name="room[{{ $room->id }}][exit]" aria-placeholder="بدون وضعیت" class="w-full h-full text-neutral-700 text-xs font-normal focus:outline-none text-ellipsis text-nowrap bg-transparent">
                                                        <option value="بدون وضعیت" selected>بدون وضعیت</option>
                                                        <option value="استعلام" >استعلام</option>
                                                        <option value="باز" >باز</option>
                                                        <option value="بسته" >بسته</option>
                                                    </select>
                                                </div>
                                                <div class="w-full flex items-center justify-center h-full">
                                                    <select name="room[{{ $room->id }}][status]" aria-placeholder="بدون وضعیت" class="w-full h-full text-neutral-700 text-xs font-normal focus:outline-none text-ellipsis text-nowrap bg-transparent">
                                                        <option value="بدون وضعیت" selected>بدون وضعیت</option>
                                                        <option value="استعلام" >استعلام</option>
                                                        <option value="باز" >باز</option>
                                                        <option value="بسته" >بسته</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex items-center justify-end gap-4.5 pt-4.5">
                    <a onclick="modalController(document.querySelector('.determiningRoomRestrictionsModal'))" class=" rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-300 transition-all duration-400 ease-out hover:bg-green-100 hover:text-green-600 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                        بازگشت
                    </a>
                    <button type="submit" class=" rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                        ذخیره
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- پاپ اپ تعیین ظرفیت اتاق -->
    <div class="determinationOfCapacityModal modal w-[100vw] h-[100vh] fixed z-[15] top-0 left-0 bg-[#0000002c] px-6 py-4">
        <div class=" modal-content w-full h-full flex items-center justify-center">
            <form method="post" action="{{ route('hotel.setCapacity') }}" class="w-full max-w-[800px] p-4.5 bg-light rounded-xl flex flex-col">
                @csrf
                <input type="hidden" class="selectedOption2" name="selected_option">
                <input type="hidden" class="selectedRoom2" name="selected_room">
                <div class="w-full flex flex-col gap-8 max-h-[500px] overflow-y-auto">
                    <!-- header -->
                    <div class="w-full py-[13px] px-4.5 rounded-xl bg-neutral-50">
                        <h6 class=" text-[14px] text-green-600 font-normal font-farsi-regular">
                            تعیین ظرفیت اتاق
                        </h6>
                    </div>
                    <!-- body -->
                    <div class="w-full flex flex-col gap-10 px-4.5 py-1 640max:px-0">
                        <!--  -->
                        <div class="w-full grid grid-cols-1 items-center gap-4.5">
                            <div class="w-full flex flex-col gap-2">
                                <label for="" class=" text-sm text-neutral-700 font-normal">
                                    عنوان اتاق:
                                </label>
                                <select name="room_id" id="countries" class="bg-neutral-50 text-black font-normal text-xs rounded-[6px] focus:outline-none focus:border-[1px] focus:border-neutral-400 block w-full p-2.5">
                                    @foreach($sharedData->rooms as $room)
                                        <option value="{{ $room->id }}" class="text-neutral-700 !font-farsi-regular font-normal text-xs transition-all duration-500 hover:bg-neutral-200 hover:transition-none aria-selected:bg-neutral-200">
                                            {{ "{$room->title}({$room->type})" }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--  -->
                        <div class="w-full grid grid-cols-3 items-center gap-2 512max:grid-cols-1 850max:grid-cols-2">
                            <div class="flex items-center gap-4.5 512max:w-full justify-between">
                                    <span class=" text-sm text-black font-normal">
                                        ظرفیت پایه:
                                    </span>
                                <div class="flex">
                                    <a onclick="addOrDescreseInputValue('add', examInput1)" class=" flex items-center justify-center bg-neutral-50 w-[25px] h-[30px]">
                                        <svg class=" w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <input name="capacity" id="examInput1" class=" w-[30px] [h-30px] bg-neutral-50 text-xs text-neutral-700 font-normal font-farsi-regular text-center focus:outline-none" value="1" type="text" readonly>
                                    <a onclick="addOrDescreseInputValue('delete', examInput1)" class=" flex items-center justify-center bg-neutral-50 w-[25px] h-[30px]">
                                        <svg class=" w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- انتخاب تاریخ -->
                        <div class="w-full flex flex-col gap-4.5">
                            <div class="w-full grid grid-cols-2 gap-4.5 items-center 512max:grid-cols-1">
                                <div class="w-full flex flex-col gap-2">
                                    <label for="" class=" text-sm text-neutral-700 font-normal">
                                        تاریخ ورود
                                    </label>
                                    <div class="w-full flex items-center">
                                        <input name="entry" data-jdp="" class=" w-full rounded-[4px] bg-neutral-50 text-neutral-700 placeholder:text-neutral-400 font-normal text-sm h-10 p-2 focus:outline-none focus:border-[1px] focus:border-neutral-400 transition-all duration-200 ease-out" type="text" placeholder="1403/11/11" dir="rtl">
                                        <svg class=" w-4.5 text-green-300 -mr-[25px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-full flex flex-col gap-2">
                                    <label for="" class=" text-sm text-neutral-700 font-normal">
                                        تاریخ خروج
                                    </label>
                                    <div class="w-full flex items-center">
                                        <input name="exit" data-jdp="" class=" w-full rounded-[4px] bg-neutral-50 text-neutral-700 placeholder:text-neutral-400 font-normal text-sm h-10 p-2 focus:outline-none focus:border-[1px] focus:border-neutral-400 transition-all duration-200 ease-out" type="text" placeholder="1403/11/11" dir="rtl">
                                        <svg class=" w-4.5 text-green-300 -mr-[25px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex items-center content-start gap-x-2 gap-y-3 flex-wrap">
                                <div class="flex-shrink-[0]">
                                    <label for="fffffa1" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffffa1" name="zero">
                                        <span>
                                                شنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffffa2" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffffa2" name="one">
                                        <span>
                                                یکشنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffffa3" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffffa3" name="two">
                                        <span>
                                                دوشنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffffa4" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffffa4" name="three">
                                        <span>
                                                سه شنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffffa5" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffffa5" name="four">
                                        <span>
                                                چهارشنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffffa6" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffffa6" name="five">
                                        <span>
                                                پنج شنبه
                                            </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="fffffa7" class="checkbox-item-button h-[40px] transition-all duration-200 ease-out px-6 px-[26px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                        <input class="hidden" type="checkbox" id="fffffa7" name="six">
                                        <span>
                                                جمعه
                                            </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex items-center justify-end gap-4.5 pt-4.5">
                    <a onclick="modalController(document.querySelector('.determinationOfCapacityModal'))" class=" rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-300 transition-all duration-400 ease-out hover:bg-green-100 hover:text-green-600 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                        بازگشت
                    </a>
                    <button type="submit" class=" rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                        ذخیره
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('src/scripts/pricingANDcapacities.js') }}"></script>


    <style>
        .loading-button {
            position: relative;
            pointer-events: none;
        }

        .loading-button::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .form-disabled {
            pointer-events: none;
        }
    </style>

    <script>
        // تابع برای فعال کردن حالت لودینگ
        function enableLoading(form) {
            const submitButton = form.querySelector('button[type="submit"]');

            // فعال کردن حالت لودینگ
            submitButton.classList.add('loading-button');
            submitButton.innerHTML = '<span style="opacity: 0;">ذخیره</span>';

            // غیرفعال کردن سایر عناصر فرم
            form.classList.add('form-disabled');
        }

        // اضافه کردن event listener برای همه فرم‌ها
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                // جلوگیری از ارسال چندباره فرم
                e.preventDefault();

                // فعال کردن لودینگ
                enableLoading(this);

                // ارسال واقعی فرم پس از نمایش لودینگ
                setTimeout(() => {
                    this.submit();
                }, 100);
            });
        });
    </script>


    <script>
        jalaliDatepicker.startWatch();

        var selectedOption = [];
        document.querySelectorAll('input[name="option[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    selectedOption.push(this.value);
                }else {
                    selectedOption = selectedOption.filter(item => item !== this.value);
                }
                $('.selectedOption').val(selectedOption.join(','));
            });
        });


        var selectedRoom = [];
        document.querySelectorAll('input[name="room[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    selectedRoom.push(this.value);
                }else {
                    selectedRoom = selectedRoom.filter(item => item !== this.value);
                }
                $('.selectedRoom').val(selectedRoom.join(','));
            });
        });

        var selectedOption2 = [];
        document.querySelectorAll('input[name="option2[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    selectedOption2.push(this.value);
                }else {
                    selectedOption2 = selectedOption2.filter(item => item !== this.value);
                }
                $('.selectedOption2').val(selectedOption2.join(','));
            });
        });


        var selectedRoomB = [];
        document.querySelectorAll('input[name="roomB[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    selectedRoomB.push(this.value);
                }else {
                    selectedRoomB = selectedRoomB.filter(item => item !== this.value);
                }
                $('.selectedRoomB').val(selectedRoomB.join(','));
            });
        });

        let selectPageCapacities = document.querySelector(".capacitiesPageContent");
        let selectPagePricing = document.querySelector(".pricingPageContent");

        let selectButtonCapacities = document.querySelector(".buttonCapacities");
        let selectButtonPricing = document.querySelector(".buttonPricing");


        $('.prevDay').on('click', function () {
            var currentDate = new Date($('#selectedDate').val());
            var formattedDate;
            try {
                formattedDate = currentDate.toISOString().split('T')[0].slice(0, 7);  // Format as YYYY-MM
            }catch (e) {
                formattedDate = currentDate;
            }
            setSessionPage(formattedDate);
            //window.location.href = '{{ route('hotel.pricingANDcapacities') }}?date=' + formattedDate;
        });

        // Handle next month button
        $('.nextDay').on('click', function () {
            var currentDate = new Date($('#selectedDate').val());
            currentDate.setMonth(currentDate.getMonth() + 2);  // Move to next month
            var formattedDate;
            try {
                formattedDate = currentDate.toISOString().split('T')[0].slice(0, 7);  // Format as YYYY-MM
            }catch (e) {
                formattedDate = currentDate;
            }
            setSessionPage(formattedDate)
            //window.location.href = '{{ route('hotel.pricingANDcapacities') }}?date=' + formattedDate;
        });

        function setSessionPage(formattedDate) {
            const page = !selectPageCapacities.classList.contains('hidden') ? 2 : 1;
            sessionStorage.setItem('page', page.toString());

            fetch('{{ route('api.updateSession') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ page: page, date: formattedDate })
            })
                .then(response => response.json())
                .then(data => {
                    window.location.href = data.redirect;
                });
        }



        var el = document.getElementById("myel");

        // To set the scroll
        el.scrollTop = 0;
        el.scrollLeft = 0;

        // To increment the scroll
        el.scrollTop += 100;
        el.scrollLeft += 100;
    </script>
    <script>
        @if(session('page') and session('page') == 1)
        selectPagePricing.classList.remove('hidden');
        selectPageCapacities.classList.add('hidden');

        selectButtonPricing.classList.add('active');
        selectButtonCapacities.classList.remove('active');
        @endif

        @if(session('page') and session('page') == 2)
        selectPagePricing.classList.add('hidden');
        selectPageCapacities.classList.remove('hidden');

        selectButtonPricing.classList.remove('active');
        selectButtonCapacities.classList.add('active');
        @endif
    </script>
@endsection
