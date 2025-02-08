@extends('layouts.adminHotel')
@section('content')
    <div class="w-full  h-full overflow-auto noscrollbar flex flex-col gap-7 768max:max-h-minContent 1024max:pt-[76px] 1024max:gap-0">
            <div class="w-full items-center py-[18px] px-[25px] bg-light hidden 768max:flex">
                <h3 class=" text-base text-green-300 font-medium font-farsi-medium">
                    مدیریت اتاق ها
                </h3>
            </div>
            <main class=" w-full h-full p-4.5 rounded-xl bg-neutral-50 overflow-auto flex flex-col gap-4.5 768max:rounded-none 768max:px-[25px]">
                <div class="w-full h-full py-5 flex flex-col gap-4.5 768max:py-0">
                    <!-- header  -->
                    <div class="w-full flex items-center justify-between px-4.5 py-[11px] bg-light 768max:hidden">
                        <h5 class=" text-base text-green-300 font-medium font-farsi-medium">
                            مدیریت اتاق ها
                        </h5>
                        <div class=" flex items-center justify-end gap-4.5">
                            <a href="editRooms.blade.php" class="editButton flex items-center justify-center gap-2">
                                <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                    <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <mask id="path-1-inside-1_273_1119" fill="currentColor">
                                        <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                        </mask>
                                        <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_273_1119)"/>
                                    </svg>
                                </div>
                                <span class=" text-base text-neutral-700 font-normal font-farsi-regular">
                                    ویرایش
                                </span>
                            </a>
                            <button class="flex items-center justify-center gap-2">
                                <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                    <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <span class=" text-base text-neutral-700 font-normal font-farsi-regular">
                                    حذف اتاق
                                </span>
                            </button>
                        </div>
                    </div>
                    <!-- add room button -->
                    <a href="editRooms.blade.php" class="w-full flex items-center justify-center px-4.5 py-3 rounded-xl bg-green-600 transition-all duration-500 hover:bg-green-300 hover:transition-none">
                        <span class=" text-sm text-light text-center fnt-bold font-farsi-bold">
                            افزودن اتاق
                        </span>
                    </a>
                    <div class="w-full p-4.5 rounded-xl bg-green-300 grid grid-cols-[201px_1.5fr_1fr_1fr_1.3fr_140px] gap-5 768max:hidden">
                        <div class=""></div>
                        <div class="flex items-center">
                            <span class=" text-sm text-light font-normal font-farsi-regular">
                                مشخصات اتاق
                            </span>
                        </div>
                        <div class="flex items-center">
                            <span class=" text-sm text-light font-normal font-farsi-regular">
                                نوع اتاق
                            </span>
                        </div>
                        <div class="flex items-center">
                            <span class=" text-sm text-light font-normal font-farsi-regular">
                                نوع تخت
                            </span>
                        </div>
                        <div class="flex items-center justify-center">
                            <span class=" text-sm text-light font-normal font-farsi-regular">
                                خدمات
                            </span>
                        </div>
                        <div class="flex items-center justify-center">
                            <span class=" text-sm text-light font-normal font-farsi-regular">
                                وضعیت
                            </span>
                        </div>
                    </div>
                    <!-- body -->
                    <div class="noscrollbar w-full h-full flex flex-col gap-4.5 overflow-auto flex-grow-[1] flex-shrink-[1] 768max:overflow-visible">
                        <!-- item -->
                        <div class="manage-room-item w-full grid grid-cols-[201px_1.5fr_1fr_1fr_1.3fr_140px] gap-5 items-center py-2 px-4.5 rounded-xl bg-light 512max:px-2 512max:pt-2 512max:pb-4.5  768max:grid-cols-1 768max:gap-2 768max:py-4.5 1280max:grid-cols-[201px_1.5fr_1fr_1fr_1.3fr_120px] 1280max:gap-3">
                            <!-- image and checkbox -->
                            <div class="w-full flex items-center gap-4.5">
                                <input class=" hidden" type="checkbox" id="sallam" name="name">
                                <label for="sallam" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center 768max:hidden" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                    <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </label>
                                <img src="../../../public/public/images/image1.jpg" alt="#" class=" w-full flex-grow-[1] aspect-165/104 rounded-[6px] object-cover 768max:aspect-364/206">
                            </div>
                            <!-- title -->
                            <div class="w-full flex flex-col gap-2 768max:my-[10px]">
                                <span class=" text-sm text-green-600 font-normal font-farsi-regular text 768max:hidden">
                                    شماره 321
                                </span>
                                <span class=" text-sm text-neutral-700 font-bold font-farsi-bold text 768max:text-base">
                                    اتاق سینگل اکونومی
                                </span>
                            </div>
                            <!-- type -->
                            <div class="items-center gap-1 768max:flex">
                                <span class="hidden text-xs text-neutral-400 font-normal font-farsi-regular text 768max:inline 768max:text-sm">
                                    نوع اتاق :
                                </span>
                                <span class=" text-xs text-neutral-700 font-normal font-farsi-regular text 768max:text-sm 768max:font-medium 768max:font-farsi-medium">
                                    استاندارد
                                </span>
                            </div>
                            <!-- bed type -->
                            <div class="items-center gap-1 768max:flex">
                                <span class="hidden text-xs text-neutral-400 font-normal font-farsi-regular text 768max:inline 768max:text-sm">
                                    نوع تخت :
                                </span>
                                <span class=" text-xs text-neutral-700 font-normal font-farsi-regular text 768max:text-sm 768max:font-medium 768max:font-farsi-medium">
                                    1 سینگل
                                </span>
                            </div>
                            <!-- services -->
                            <div class=" flex-col gap-2 768max:flex 768max:w-full">
                                <span class=" text-xs text-neutral-700 font-normal font-farsi-regular text 768max:hidden">
                                    تلویزیون، اینترنت وای فای، حمام خصوصی، مینی بار
                                </span>
                                <span class="hidden text-xs text-neutral-400 font-normal font-farsi-regular text 768max:inline 768max:text-sm">
                                    خدمات :
                                </span>
                                <div class="hidden w-full items-center flex-wrap gap-x-4 gap-y-2 768max:flex">
                                    <span class=" flex-grow-[0] flex-shrink-[0] inline-flex items-center justify-center gap-1 py-1 px-4 rounded-[20px] bg-green-100 text-neutral-700 text-xs font-medium font-farsi-medium">
                                        صبحانه
                                    </span>
                                    <span class=" flex-grow-[0] flex-shrink-[0] inline-flex items-center justify-center gap-1 py-1 px-4 rounded-[20px] bg-green-100 text-neutral-700 text-xs font-medium font-farsi-medium">
                                        ناهار
                                    </span>
                                    <span class=" flex-grow-[0] flex-shrink-[0] inline-flex items-center justify-center gap-1 py-1 px-4 rounded-[20px] bg-green-100 text-neutral-700 text-xs font-medium font-farsi-medium">
                                        شام
                                    </span>
                                </div>
                            </div>
                            <!-- button -->
                            <div class="w-full 768max:hidden">
                                <button id="roomDropdownButton1" data-dropdown-toggle="roomDropdownContent1" class=" roomItemButton w-full bg-neutral-50 rounded-[36px] flex items-center justify-between py-2 px-3">
                                    <span class=" text-inherit text-sm font-medium font-farsi-medium">
                                        موجود
                                    </span>
                                    <svg class=" w-[16px] text-[#d9d9d9]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                      </svg>
                                </button>
                                <div id="roomDropdownContent1" class="z-10 hidden bg-light divide-y divide-gray-100 rounded-xl shadow-sm w-44">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="roomDropdownButton1">
                                      <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-xs text-neutral-700 font-medium transition-all duration-500 ease-out hover:transition-none">
                                            موجود
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-xs text-neutral-700 font-medium transition-all duration-500 ease-out hover:transition-none">
                                            رزرو شد
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-xs text-neutral-700 font-medium transition-all duration-500 ease-out hover:transition-none">
                                            غیر قابل رزرو
                                        </a>
                                      </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- item -->
                        <div class="manage-room-item active w-full grid grid-cols-[201px_1.5fr_1fr_1fr_1.3fr_140px] gap-5 items-center py-2 px-4.5 rounded-xl bg-light 512max:px-2 512max:pt-2 512max:pb-4.5  768max:grid-cols-1 768max:gap-2 768max:py-4.5 1280max:grid-cols-[201px_1.5fr_1fr_1fr_1.3fr_120px] 1280max:gap-3">
                            <!-- image and checkbox -->
                            <div class="w-full flex items-center gap-4.5">
                                <input class=" hidden" type="checkbox" id="sallam2" name="name">
                                <label for="sallam2" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center 768max:hidden" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                    <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </label>
                                <img src="../../../public/public/images/image1.jpg" alt="#" class=" w-full flex-grow-[1] aspect-165/104 rounded-[6px] object-cover 768max:aspect-364/206">
                            </div>
                            <!-- title -->
                            <div class="w-full flex flex-col gap-2 768max:my-[10px]">
                                <span class=" text-sm text-green-600 font-normal font-farsi-regular text 768max:hidden">
                                    شماره 321
                                </span>
                                <span class=" text-sm text-neutral-700 font-bold font-farsi-bold text 768max:text-base">
                                    اتاق سینگل اکونومی
                                </span>
                            </div>
                            <!-- type -->
                            <div class="items-center gap-1 768max:flex">
                                <span class="hidden text-xs text-neutral-400 font-normal font-farsi-regular text 768max:inline 768max:text-sm">
                                    نوع اتاق :
                                </span>
                                <span class=" text-xs text-neutral-700 font-normal font-farsi-regular text 768max:text-sm 768max:font-medium 768max:font-farsi-medium">
                                    استاندارد
                                </span>
                            </div>
                            <!-- bed type -->
                            <div class="items-center gap-1 768max:flex">
                                <span class="hidden text-xs text-neutral-400 font-normal font-farsi-regular text 768max:inline 768max:text-sm">
                                    نوع تخت :
                                </span>
                                <span class=" text-xs text-neutral-700 font-normal font-farsi-regular text 768max:text-sm 768max:font-medium 768max:font-farsi-medium">
                                    1 سینگل
                                </span>
                            </div>
                            <!-- services -->
                            <div class=" flex-col gap-2 768max:flex 768max:w-full">
                                <span class=" text-xs text-neutral-700 font-normal font-farsi-regular text 768max:hidden">
                                    تلویزیون، اینترنت وای فای، حمام خصوصی، مینی بار
                                </span>
                                <span class="hidden text-xs text-neutral-400 font-normal font-farsi-regular text 768max:inline 768max:text-sm">
                                    خدمات :
                                </span>
                                <div class="hidden w-full items-center flex-wrap gap-x-4 gap-y-2 768max:flex">
                                    <span class=" flex-grow-[0] flex-shrink-[0] inline-flex items-center justify-center gap-1 py-1 px-4 rounded-[20px] bg-green-100 text-neutral-700 text-xs font-medium font-farsi-medium">
                                        صبحانه
                                    </span>
                                    <span class=" flex-grow-[0] flex-shrink-[0] inline-flex items-center justify-center gap-1 py-1 px-4 rounded-[20px] bg-green-100 text-neutral-700 text-xs font-medium font-farsi-medium">
                                        ناهار
                                    </span>
                                    <span class=" flex-grow-[0] flex-shrink-[0] inline-flex items-center justify-center gap-1 py-1 px-4 rounded-[20px] bg-green-100 text-neutral-700 text-xs font-medium font-farsi-medium">
                                        شام
                                    </span>
                                </div>
                            </div>
                            <!-- button -->
                            <div class="w-full 768max:hidden">
                                <button id="roomDropdownButton2" data-dropdown-toggle="roomDropdownContent2" class=" roomItemButton active w-full bg-neutral-50 rounded-[36px] flex items-center justify-between py-2 px-3">
                                    <span class=" text-inherit text-sm font-medium font-farsi-medium">
                                        تایید شد
                                    </span>
                                    <svg class=" w-[16px] text-[#d9d9d9]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                      </svg>
                                </button>
                                <div id="roomDropdownContent2" class="z-10 hidden bg-light divide-y divide-gray-100 rounded-xl shadow-sm w-44">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="roomDropdownButton2">
                                      <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-xs text-neutral-700 font-medium transition-all duration-500 ease-out hover:transition-none">
                                            موجود
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-xs text-neutral-700 font-medium transition-all duration-500 ease-out hover:transition-none">
                                            رزرو شد
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-xs text-neutral-700 font-medium transition-all duration-500 ease-out hover:transition-none">
                                            غیر قابل رزرو
                                        </a>
                                      </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- item -->
                        <div class="manage-room-item disabled w-full grid grid-cols-[201px_1.5fr_1fr_1fr_1.3fr_140px] gap-5 items-center py-2 px-4.5 rounded-xl bg-light 512max:px-2 512max:pt-2 512max:pb-4.5  768max:grid-cols-1 768max:gap-2 768max:py-4.5 1280max:grid-cols-[201px_1.5fr_1fr_1fr_1.3fr_120px] 1280max:gap-3">
                            <!-- image and checkbox -->
                            <div class="w-full flex items-center gap-4.5">
                                <input class=" hidden" type="checkbox" id="sallam3" name="name">
                                <label for="sallam3" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center 768max:hidden" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                    <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </label>
                                <img src="../../../public/public/images/image1.jpg" alt="#" class=" w-full flex-grow-[1] aspect-165/104 rounded-[6px] object-cover 768max:aspect-364/206">
                            </div>
                            <!-- title -->
                            <div class="w-full flex flex-col gap-2 768max:my-[10px]">
                                <span class=" text-sm text-green-600 font-normal font-farsi-regular text 768max:hidden">
                                    شماره 321
                                </span>
                                <span class=" text-sm text-neutral-700 font-bold font-farsi-bold text 768max:text-base">
                                    اتاق سینگل اکونومی
                                </span>
                            </div>
                            <!-- type -->
                            <div class="items-center gap-1 768max:flex">
                                <span class="hidden text-xs text-neutral-400 font-normal font-farsi-regular text 768max:inline 768max:text-sm">
                                    نوع اتاق :
                                </span>
                                <span class=" text-xs text-neutral-700 font-normal font-farsi-regular text 768max:text-sm 768max:font-medium 768max:font-farsi-medium">
                                    استاندارد
                                </span>
                            </div>
                            <!-- bed type -->
                            <div class="items-center gap-1 768max:flex">
                                <span class="hidden text-xs text-neutral-400 font-normal font-farsi-regular text 768max:inline 768max:text-sm">
                                    نوع تخت :
                                </span>
                                <span class=" text-xs text-neutral-700 font-normal font-farsi-regular text 768max:text-sm 768max:font-medium 768max:font-farsi-medium">
                                    1 سینگل
                                </span>
                            </div>
                            <!-- services -->
                            <div class=" flex-col gap-2 768max:flex 768max:w-full">
                                <span class=" text-xs text-neutral-700 font-normal font-farsi-regular text 768max:hidden">
                                    تلویزیون، اینترنت وای فای، حمام خصوصی، مینی بار
                                </span>
                                <span class="hidden text-xs text-neutral-400 font-normal font-farsi-regular text 768max:inline 768max:text-sm">
                                    خدمات :
                                </span>
                                <div class="hidden w-full items-center flex-wrap gap-x-4 gap-y-2 768max:flex">
                                    <span class=" flex-grow-[0] flex-shrink-[0] inline-flex items-center justify-center gap-1 py-1 px-4 rounded-[20px] bg-green-100 text-neutral-700 text-xs font-medium font-farsi-medium">
                                        صبحانه
                                    </span>
                                    <span class=" flex-grow-[0] flex-shrink-[0] inline-flex items-center justify-center gap-1 py-1 px-4 rounded-[20px] bg-green-100 text-neutral-700 text-xs font-medium font-farsi-medium">
                                        ناهار
                                    </span>
                                    <span class=" flex-grow-[0] flex-shrink-[0] inline-flex items-center justify-center gap-1 py-1 px-4 rounded-[20px] bg-green-100 text-neutral-700 text-xs font-medium font-farsi-medium">
                                        شام
                                    </span>
                                </div>
                            </div>
                            <!-- button -->
                            <div class="w-full 768max:hidden">
                                <button id="roomDropdownButton3" data-dropdown-toggle="roomDropdownContent3" class=" roomItemButton disabled w-full bg-neutral-50 rounded-[36px] flex items-center justify-between py-2 px-3">
                                    <span class=" text-inherit text-sm font-medium font-farsi-medium">
                                        غیر قابل رزرو
                                    </span>
                                    <svg class=" w-[16px] text-[#d9d9d9]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                      </svg>
                                </button>
                                <div id="roomDropdownContent2" class="z-10 hidden bg-light divide-y divide-gray-100 rounded-xl shadow-sm w-44">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="roomDropdownButton2">
                                      <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-xs text-neutral-700 font-medium transition-all duration-500 ease-out hover:transition-none">
                                            موجود
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-xs text-neutral-700 font-medium transition-all duration-500 ease-out hover:transition-none">
                                            رزرو شد
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-xs text-neutral-700 font-medium transition-all duration-500 ease-out hover:transition-none">
                                            غیر قابل رزرو
                                        </a>
                                      </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
@endsection
