<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta harset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('node_modules/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/scripts/Swiper/swiper-bundle.min.css') }}">
    {{--<script src="https://cdn.tailwindcss.com"></script>--}}
    <link rel="stylesheet" href="{{ asset('src/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('src/styles/leaflet.css') }}">
    <title>Main Page</title>
</head>
<body class=" bg-neutral-50 flex flex-col min-h-[100vh]">
<div class=" w-full flex justify-center h-10 gap-7 512max:flex-col 512max:items-center 512max:gap-2 512max:py-2 512max:h-auto 640max:h-8 768max:h-9" style="background: radial-gradient(50% 900.78% at 50% 50%, #245248 29.5%, #8CB398 100%);">
    <!-- icon -->
    <img class=" h-full 512max:h-auto 512max:w-[120px]" src="{{ asset('public/icons/noroozeIcon.svg') }}" alt="#">
    <!-- text -->
    <span class=" self-center text-sm text-light font-normal drop-shadow-txtLightShadow 640max:text-[10px] 768max:text-xs">
            عید امسال رو با یه سفر هیجان انگیز شروع کن!
        </span>
</div>
@if(isset($userSharedData))
    <header class="w-full bg-light py-4.5 px-12 drop-shadow-materialBlack 512max:px-[28px] 640max:py-2 1024max:px-[36px] 1280max:px-[64px]">
    <div class="w-full max-w-[1240px] mx-auto flex items-center justify-between">
        <!-- right -->
        <div class="flex items-center gap-12 128max:gap-4">
            <!-- logo -->
            <img class=" h-12 w-auto 512max:h-8" src="{{ asset('public/icons/chademon.svg') }}" alt="#">
            <!-- navbar -->
            <nav class=" flex items-center gap-[39px] 1024max:hidden 1280max:gap-6">
                <a href="#" class=" text-sm text-neutral-700 font-normal transition-all duration-500 hover:text-green-300 hover:transition-none">
                    خانه
                </a>
                <a href="#" class=" text-sm text-neutral-700 font-normal transition-all duration-500 hover:text-green-300 hover:transition-none">
                    رزرو بلیط
                </a>
                <a href="#" class=" text-sm text-neutral-700 font-normal transition-all duration-500 hover:text-green-300 hover:transition-none">
                    رزرو هتل
                </a>
                <a href="#" class=" text-sm text-neutral-700 font-normal transition-all duration-500 hover:text-green-300 hover:transition-none">
                    تور های ترکیبی
                </a>
                <a href="#" class=" text-sm text-neutral-700 font-normal transition-all duration-500 hover:text-green-300 hover:transition-none">
                    بلاگ
                </a>
                <a href="#" class=" text-sm text-neutral-700 font-normal transition-all duration-500 hover:text-green-300 hover:transition-none">
                    تماس با ما
                </a>
            </nav>
        </div>
        <!-- left -->
        <div class=" flex items-center gap-3">
            <!-- right -->
            <div class="flex items-center gap-3">
                <a href="#" class=" text-sm text-green-300 font-normal transition-all duration-500 hover:text-neutral-700 hover:transition-none 512max:hidden">
                    سوالی دارید؟
                </a>
            </div>
            <!-- left -->
            <div class="flex items-center gap-3 640max:gap-2">
                <div class="dropdown">
                    <button data-dropdown-toggle="user-profile-options-dropdown1" class=" bg-neutral-50 rounded-[6px] flex items-center justify-center gap-3 px-4.5 py-2 640max:hidden">
                        <div class="flex items-center gap-2">
                            <svg class=" text-[#3D3D3D] w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 2.08331C10.9801 2.08301 11.9345 2.39689 12.723 2.97887C13.5116 3.56085 14.0929 4.38029 14.3815 5.31691C14.6701 6.25354 14.6509 7.25801 14.3267 8.18291C14.0024 9.10781 13.3903 9.90442 12.58 10.4558C13.9864 10.9716 15.2062 11.8966 16.0824 13.1116C16.9587 14.3266 17.4512 15.776 17.4967 17.2733C17.5009 17.3564 17.4885 17.4395 17.4602 17.5178C17.4319 17.5961 17.3883 17.6679 17.3318 17.729C17.2754 17.7902 17.2073 17.8395 17.1316 17.874C17.0559 17.9085 16.974 17.9275 16.8908 17.93C16.8076 17.9324 16.7248 17.9182 16.6472 17.8882C16.5696 17.8582 16.4987 17.813 16.4388 17.7553C16.3789 17.6975 16.3311 17.6284 16.2982 17.5519C16.2654 17.4754 16.2481 17.3932 16.2475 17.31C16.1979 15.6862 15.518 14.1455 14.3518 13.0145C13.1857 11.8834 11.625 11.2509 10.0004 11.2509C8.37587 11.2509 6.81516 11.8834 5.64902 13.0145C4.48288 14.1455 3.80296 15.6862 3.75333 17.31C3.74836 17.4757 3.67774 17.6327 3.55702 17.7464C3.43629 17.8601 3.27534 17.9212 3.10958 17.9162C2.94382 17.9113 2.78683 17.8406 2.67313 17.7199C2.55944 17.5992 2.49836 17.4382 2.50333 17.2725C2.54896 15.7753 3.04158 14.3261 3.9178 13.1112C4.79402 11.8964 6.01375 10.9716 7.42 10.4558C6.60974 9.90442 5.99757 9.10781 5.67333 8.18291C5.3491 7.25801 5.32989 6.25354 5.61851 5.31691C5.90713 4.38029 6.48839 3.56085 7.27697 2.97887C8.06555 2.39689 9.01992 2.08301 10 2.08331ZM6.66667 6.66665C6.66667 7.5507 7.01786 8.39855 7.64298 9.02367C8.2681 9.64879 9.11594 9.99998 10 9.99998C10.8841 9.99998 11.7319 9.64879 12.357 9.02367C12.9821 8.39855 13.3333 7.5507 13.3333 6.66665C13.3333 5.78259 12.9821 4.93474 12.357 4.30962C11.7319 3.6845 10.8841 3.33331 10 3.33331C9.11594 3.33331 8.2681 3.6845 7.64298 4.30962C7.01786 4.93474 6.66667 5.78259 6.66667 6.66665Z" fill="currentColor"/>
                            </svg>
                            <span class=" text-xs text-neutral-700 font-normal">
                                    {{ $userSharedData->people->firstName.' '.$userSharedData->people->lastName }}
                                </span>
                        </div>
                        <svg class=" w-3 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <!-- dropdown content -->
                    <div id="user-profile-options-dropdown1" class="z-10 !mx-4 hidden min-w-[200px] rounded-[6px] overflow-hidden bg-light 512max:min-w-max">
                        <div class="w-full flex flex-col items-center rounded-[6px]">
                            <!-- head -->
                            <div class="w-full flex items-center px-4.5 py-[15px] bg-[#8CB3984D] rounded-[6px] gap-2 640max:px-4 640max:py-2">
                                <img src="{{ asset('public/images/UserProfile.svg') }}" alt="#" class=" w-10 aspect-square rounded-full object-cover 640max:w-8">
                                <div class="flex flex-col gap-[1px]">
                                        <span class=" text-xs text-green-600 font-bold 640max:text-[10px]">
                                            {{ $userSharedData->people->firstName.' '.$userSharedData->people->lastName }}
                                        </span>
                                    <span class="text-[10px] text-neutral-700 font-medium 640max:text-[8px]">
                                            {{ $userSharedData->mobile }}
                                        </span>
                                </div>
                            </div>
                            <!--  -->
                            <ul class="w-full flex flex-col gap-5 p-5 640max:p-4 640max:gap-4">
                                <!-- item -->
                                <li class=" w-full">
                                    <a href="#" class=" flex items-center gap-[6px]">
                                        <!-- icon -->
                                        <svg class=" w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                        </svg>
                                        <!-- text -->
                                        <span class=" text-xs text-black font-normal 640max:text-[10px]">
                                                اطلاعات حساب
                                            </span>
                                    </a>
                                </li>
                                <!-- item -->
                                <li class=" w-full">
                                    <a href="#" class=" flex items-center gap-[6px]">
                                        <!-- icon -->
                                        <svg class=" w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                                        </svg>
                                        <!-- text -->
                                        <span class=" text-xs text-black font-normal 640max:text-[10px]">
                                                اعلانها
                                            </span>
                                    </a>
                                </li>
                                <!-- item -->
                                <li class=" w-full">
                                    <a href="#" class=" flex items-center gap-[6px]">
                                        <!-- icon -->
                                        <svg class=" w-4 text-green-300" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.46154 10.0004V6.35908C4.47235 5.64331 4.6243 4.93671 4.90868 4.27976C5.19306 3.62282 5.60428 3.02844 6.11878 2.53069C6.63328 2.03294 7.24094 1.64159 7.90695 1.37908C8.57296 1.11657 9.28423 0.988042 10 1.00087C10.7158 0.988042 11.427 1.11657 12.093 1.37908C12.7591 1.64159 13.3667 2.03294 13.8812 2.53069C14.3957 3.02844 14.8069 3.62282 15.0913 4.27976C15.3757 4.93671 15.5276 5.64331 15.5385 6.35908V10.0004M12.7692 17.2693C13.5037 17.2693 14.208 16.9776 14.7274 16.4583C15.2467 15.939 15.5385 15.2346 15.5385 14.5002V11.385M12.7692 17.2693C12.7692 17.7283 12.5869 18.1685 12.2623 18.4931C11.9377 18.8177 11.4975 19 11.0385 19H8.96154C8.50251 19 8.06228 18.8177 7.7377 18.4931C7.41312 18.1685 7.23077 17.7283 7.23077 17.2693C7.23077 16.8103 7.41312 16.3701 7.7377 16.0455C8.06228 15.721 8.50251 15.5386 8.96154 15.5386H11.0385C11.4975 15.5386 11.9377 15.721 12.2623 16.0455C12.5869 16.3701 12.7692 16.8103 12.7692 17.2693ZM2.38462 7.92362H3.76923C3.95284 7.92362 4.12893 7.99655 4.25877 8.12638C4.3886 8.2562 4.46154 8.43229 4.46154 8.61589V12.7695C4.46154 12.9531 4.3886 13.1292 4.25877 13.259C4.12893 13.3889 3.95284 13.4618 3.76923 13.4618H2.38462C2.01739 13.4618 1.66521 13.3159 1.40554 13.0563C1.14588 12.7966 1 12.4445 1 12.0773V9.30816C1 8.94096 1.14588 8.58879 1.40554 8.32914C1.66521 8.06949 2.01739 7.92362 2.38462 7.92362ZM17.6154 13.4618H16.2308C16.0472 13.4618 15.8711 13.3889 15.7412 13.259C15.6114 13.1292 15.5385 12.9531 15.5385 12.7695V8.61589C15.5385 8.43229 15.6114 8.2562 15.7412 8.12638C15.8711 7.99655 16.0472 7.92362 16.2308 7.92362H17.6154C17.9826 7.92362 18.3348 8.06949 18.5945 8.32914C18.8541 8.58879 19 8.94096 19 9.30816V12.0773C19 12.4445 18.8541 12.7966 18.5945 13.0563C18.3348 13.3159 17.9826 13.4618 17.6154 13.4618Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <!-- text -->
                                        <span class=" text-xs text-black font-normal 640max:text-[10px]">
                                                درخواست پشتیانی
                                            </span>
                                    </a>
                                </li>
                                <!-- item -->
                                <li class=" w-full">
                                    <a href="#" class=" flex items-center gap-[6px]">
                                        <!-- icon -->
                                        <svg class=" w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                        </svg>
                                        <!-- text -->
                                        <a href="{{ route('logout') }}" class=" text-xs text-black font-normal 640max:text-[10px]">
                                                خروج از حساب
                                            </a>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="#" class="rounded-full relative flex items-center justify-center aspect-square w-10 text-light bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:w-8">
                    <svg class=" text-inherit w-5 640max:w-4" viewBox="0 0 17.5 17.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2656 12.3312C9.91137 13.4133 8.19421 13.9358 6.46681 13.7913C4.7394 13.6468 3.13289 12.8463 1.97721 11.5543C0.821527 10.2622 0.204419 8.57669 0.252626 6.84382C0.300833 5.11096 1.0107 3.46233 2.23642 2.23653C3.46214 1.01074 5.11068 0.300836 6.84344 0.252626C8.57621 0.204416 10.2617 0.82156 11.5536 1.97731C12.8456 3.13305 13.646 4.73966 13.7905 6.46717C13.935 8.19467 13.4125 9.91192 12.3305 11.2662L17.5102 16.4452C17.5842 16.5142 17.6436 16.5974 17.6848 16.6898C17.726 16.7823 17.7481 16.882 17.7499 16.9832C17.7517 17.0844 17.7331 17.1849 17.6952 17.2787C17.6573 17.3725 17.6009 17.4578 17.5293 17.5293C17.4578 17.6009 17.3725 17.6573 17.2787 17.6952C17.1849 17.7331 17.0844 17.7517 16.9833 17.7499C16.8821 17.7481 16.7823 17.726 16.6899 17.6848C16.5975 17.6436 16.5143 17.5842 16.4453 17.5102L11.2656 12.3312ZM3.30415 10.7619C2.56682 10.0244 2.06463 9.08495 1.86106 8.06215C1.65748 7.03936 1.76166 5.97916 2.16043 5.01556C2.55919 4.05196 3.23464 3.2282 4.10142 2.64839C4.96819 2.06858 5.98738 1.75874 7.03018 1.75804C8.07298 1.75734 9.09259 2.0658 9.96014 2.64444C10.8277 3.22309 11.5043 4.04594 11.9043 5.009C12.3044 5.97207 12.41 7.03212 12.2078 8.05519C12.0056 9.07826 11.5047 10.0184 10.7683 10.7569L10.7633 10.7619L10.7583 10.7659C9.76884 11.7531 8.42804 12.3072 7.03038 12.3064C5.63273 12.3057 4.29252 11.7502 3.30415 10.7619Z" fill="currentColor"/>
                    </svg>
                </a>
                <a href="#" class="rounded-full relative flex items-center justify-center aspect-square w-10 text-light bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:w-8">
                    <svg class=" text-inherit w-5 640max:w-4" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.96875 6.875V14.375C7.96875 14.4993 7.91936 14.6185 7.83146 14.7065C7.74355 14.7944 7.62432 14.8438 7.5 14.8438C7.37568 14.8438 7.25645 14.7944 7.16854 14.7065C7.08064 14.6185 7.03125 14.4993 7.03125 14.375V6.875C7.03125 6.75068 7.08064 6.63145 7.16854 6.54354C7.25645 6.45564 7.37568 6.40625 7.5 6.40625C7.62432 6.40625 7.74355 6.45564 7.83146 6.54354C7.91936 6.63145 7.96875 6.75068 7.96875 6.875ZM10 6.40625C9.87568 6.40625 9.75645 6.45564 9.66854 6.54354C9.58064 6.63145 9.53125 6.75068 9.53125 6.875V14.375C9.53125 14.4993 9.58064 14.6185 9.66854 14.7065C9.75645 14.7944 9.87568 14.8438 10 14.8438C10.1243 14.8438 10.2435 14.7944 10.3315 14.7065C10.4194 14.6185 10.4688 14.4993 10.4688 14.375V6.875C10.4688 6.75068 10.4194 6.63145 10.3315 6.54354C10.2435 6.45564 10.1243 6.40625 10 6.40625ZM12.5 6.40625C12.3757 6.40625 12.2565 6.45564 12.1685 6.54354C12.0806 6.63145 12.0312 6.75068 12.0312 6.875V14.375C12.0312 14.4993 12.0806 14.6185 12.1685 14.7065C12.2565 14.7944 12.3757 14.8438 12.5 14.8438C12.6243 14.8438 12.7435 14.7944 12.8315 14.7065C12.9194 14.6185 12.9688 14.4993 12.9688 14.375V6.875C12.9688 6.75068 12.9194 6.63145 12.8315 6.54354C12.7435 6.45564 12.6243 6.40625 12.5 6.40625ZM16.0938 5V16.25C16.0938 16.5401 15.9785 16.8183 15.7734 17.0234C15.5683 17.2285 15.2901 17.3438 15 17.3438H13.5938V18.75C13.5938 18.8743 13.5444 18.9935 13.4565 19.0815C13.3685 19.1694 13.2493 19.2188 13.125 19.2188C13.0007 19.2188 12.8815 19.1694 12.7935 19.0815C12.7056 18.9935 12.6562 18.8743 12.6562 18.75V17.3438H7.34375V18.75C7.34375 18.8743 7.29436 18.9935 7.20646 19.0815C7.11855 19.1694 6.99932 19.2188 6.875 19.2188C6.75068 19.2188 6.63145 19.1694 6.54354 19.0815C6.45564 18.9935 6.40625 18.8743 6.40625 18.75V17.3438H5C4.70992 17.3438 4.43172 17.2285 4.2266 17.0234C4.02148 16.8183 3.90625 16.5401 3.90625 16.25V5C3.90625 4.70992 4.02148 4.43172 4.2266 4.2266C4.43172 4.02148 4.70992 3.90625 5 3.90625H7.03125V1.875C7.03125 1.41916 7.21233 0.981988 7.53466 0.65966C7.85699 0.337332 8.29416 0.15625 8.75 0.15625H11.25C11.7058 0.15625 12.143 0.337332 12.4653 0.65966C12.7877 0.981988 12.9688 1.41916 12.9688 1.875V3.90625H15C15.2901 3.90625 15.5683 4.02148 15.7734 4.2266C15.9785 4.43172 16.0938 4.70992 16.0938 5ZM7.96875 3.90625H12.0312V1.875C12.0312 1.6678 11.9489 1.46909 11.8024 1.32257C11.6559 1.17606 11.4572 1.09375 11.25 1.09375H8.75C8.5428 1.09375 8.34409 1.17606 8.19757 1.32257C8.05106 1.46909 7.96875 1.6678 7.96875 1.875V3.90625ZM15.1562 5C15.1562 4.95856 15.1398 4.91882 15.1105 4.88951C15.0812 4.86021 15.0414 4.84375 15 4.84375H5C4.95856 4.84375 4.91882 4.86021 4.88951 4.88951C4.86021 4.91882 4.84375 4.95856 4.84375 5V16.25C4.84375 16.2914 4.86021 16.3312 4.88951 16.3605C4.91882 16.3898 4.95856 16.4062 5 16.4062H15C15.0414 16.4062 15.0812 16.3898 15.1105 16.3605C15.1398 16.3312 15.1562 16.2914 15.1562 16.25V5Z" fill="currentColor"/>
                    </svg>
                    <span class="rounded-[10px] flex items-center justify-center h-5 px-[6px] bg-[#F5F5F5] text-xs text-neutral-700 font-normal absolute z-[2] bottom-0 left-[70%] 640max:text-[8px] 640max:h-4 640max:bottom-[-5%]">
                            12
                        </span>
                </a>
                <div class="">
                    <button data-dropdown-toggle="user-profile-options-dropdown2" class="hidden items-center gap-1 640max:flex">
                        <img class=" w-8 aspect-square rounded-full object-cover" src="{{ asset('public/images/UserProfile.svg') }}" alt="#">
                        <svg class=" w-3 text-neutral-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <!-- dropdown content -->
                    <div id="user-profile-options-dropdown2" class="z-10 !mx-4 hidden min-w-[200px] rounded-[6px] overflow-hidden bg-light 512max:min-w-max">
                        <div class="w-full flex flex-col items-center rounded-[6px]">
                            <!-- head -->
                            <div class="w-full flex items-center px-4.5 py-[15px] bg-[#8CB3984D] rounded-[6px] gap-2 640max:px-4 640max:py-2">
                                <img src="{{ asset('public/images/UserProfile.svg') }}" alt="#" class=" w-10 aspect-square rounded-full object-cover 640max:w-8">
                                <div class="flex flex-col gap-[1px]">
                                        <span class=" text-xs text-green-600 font-bold 640max:text-[10px]">
                                            {{ $userSharedData->people->firstName.' '.$userSharedData->people->lastName }}
                                        </span>
                                    <span class="text-[10px] text-neutral-700 font-medium 640max:text-[8px]">
                                            {{ $userSharedData->mobile }}
                                        </span>
                                </div>
                            </div>
                            <!--  -->
                            <ul class="w-full flex flex-col gap-5 p-5 640max:p-4 640max:gap-4">
                                <!-- item -->
                                <li class=" w-full">
                                    <a href="#" class=" flex items-center gap-[6px]">
                                        <!-- icon -->
                                        <svg class=" w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                        </svg>
                                        <!-- text -->
                                        <span class=" text-xs text-black font-normal 640max:text-[10px]">
                                                اطلاعات حساب
                                            </span>
                                    </a>
                                </li>
                                <!-- item -->
                                <li class=" w-full">
                                    <a href="#" class=" flex items-center gap-[6px]">
                                        <!-- icon -->
                                        <svg class=" w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                                        </svg>
                                        <!-- text -->
                                        <span class=" text-xs text-black font-normal 640max:text-[10px]">
                                                اعلانها
                                            </span>
                                    </a>
                                </li>
                                <!-- item -->
                                <li class=" w-full">
                                    <a href="#" class=" flex items-center gap-[6px]">
                                        <!-- icon -->
                                        <svg class=" w-4 text-green-300" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.46154 10.0004V6.35908C4.47235 5.64331 4.6243 4.93671 4.90868 4.27976C5.19306 3.62282 5.60428 3.02844 6.11878 2.53069C6.63328 2.03294 7.24094 1.64159 7.90695 1.37908C8.57296 1.11657 9.28423 0.988042 10 1.00087C10.7158 0.988042 11.427 1.11657 12.093 1.37908C12.7591 1.64159 13.3667 2.03294 13.8812 2.53069C14.3957 3.02844 14.8069 3.62282 15.0913 4.27976C15.3757 4.93671 15.5276 5.64331 15.5385 6.35908V10.0004M12.7692 17.2693C13.5037 17.2693 14.208 16.9776 14.7274 16.4583C15.2467 15.939 15.5385 15.2346 15.5385 14.5002V11.385M12.7692 17.2693C12.7692 17.7283 12.5869 18.1685 12.2623 18.4931C11.9377 18.8177 11.4975 19 11.0385 19H8.96154C8.50251 19 8.06228 18.8177 7.7377 18.4931C7.41312 18.1685 7.23077 17.7283 7.23077 17.2693C7.23077 16.8103 7.41312 16.3701 7.7377 16.0455C8.06228 15.721 8.50251 15.5386 8.96154 15.5386H11.0385C11.4975 15.5386 11.9377 15.721 12.2623 16.0455C12.5869 16.3701 12.7692 16.8103 12.7692 17.2693ZM2.38462 7.92362H3.76923C3.95284 7.92362 4.12893 7.99655 4.25877 8.12638C4.3886 8.2562 4.46154 8.43229 4.46154 8.61589V12.7695C4.46154 12.9531 4.3886 13.1292 4.25877 13.259C4.12893 13.3889 3.95284 13.4618 3.76923 13.4618H2.38462C2.01739 13.4618 1.66521 13.3159 1.40554 13.0563C1.14588 12.7966 1 12.4445 1 12.0773V9.30816C1 8.94096 1.14588 8.58879 1.40554 8.32914C1.66521 8.06949 2.01739 7.92362 2.38462 7.92362ZM17.6154 13.4618H16.2308C16.0472 13.4618 15.8711 13.3889 15.7412 13.259C15.6114 13.1292 15.5385 12.9531 15.5385 12.7695V8.61589C15.5385 8.43229 15.6114 8.2562 15.7412 8.12638C15.8711 7.99655 16.0472 7.92362 16.2308 7.92362H17.6154C17.9826 7.92362 18.3348 8.06949 18.5945 8.32914C18.8541 8.58879 19 8.94096 19 9.30816V12.0773C19 12.4445 18.8541 12.7966 18.5945 13.0563C18.3348 13.3159 17.9826 13.4618 17.6154 13.4618Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <!-- text -->
                                        <span class=" text-xs text-black font-normal 640max:text-[10px]">
                                                درخواست پشتیانی
                                            </span>
                                    </a>
                                </li>
                                <!-- item -->
                                <li class=" w-full">
                                    <a href="#" class=" flex items-center gap-[6px]">
                                        <!-- icon -->
                                        <svg class=" w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                        </svg>
                                        <!-- text -->
                                        <a href="{{ route('logout') }}" class=" text-xs text-black font-normal 640max:text-[10px]">
                                                خروج از حساب
                                            </a>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@else
    <header class="w-full bg-light py-4.5 px-12 drop-shadow-materialBlack 512max:px-[28px] 640max:py-2 1024max:px-[36px] 1280max:px-[64px]">
        <div class="w-full max-w-[1240px] mx-auto flex items-center justify-between">
            <!-- right -->
            <div class="flex items-center gap-12 128max:gap-4">
                <!-- logo -->
                <img class=" h-12 w-auto 512max:h-8" src="{{ asset('public/icons/chademon.svg') }}" alt="#">
                <!-- navbar -->
                <nav class=" flex items-center gap-[39px] 1024max:hidden 1280max:gap-6">
                    <a href="#" class=" text-sm text-neutral-700 font-normal transition-all duration-500 hover:text-green-300 hover:transition-none">
                        خانه
                    </a>
                    <a href="#" class=" text-sm text-neutral-700 font-normal transition-all duration-500 hover:text-green-300 hover:transition-none">
                        رزرو بلیط
                    </a>
                    <a href="#" class=" text-sm text-neutral-700 font-normal transition-all duration-500 hover:text-green-300 hover:transition-none">
                        رزرو هتل
                    </a>
                    <a href="#" class=" text-sm text-neutral-700 font-normal transition-all duration-500 hover:text-green-300 hover:transition-none">
                        تور های ترکیبی
                    </a>
                    <a href="#" class=" text-sm text-neutral-700 font-normal transition-all duration-500 hover:text-green-300 hover:transition-none">
                        بلاگ
                    </a>
                    <a href="#" class=" text-sm text-neutral-700 font-normal transition-all duration-500 hover:text-green-300 hover:transition-none">
                        تماس با ما
                    </a>
                </nav>
            </div>
            <!-- left -->
            <div class=" flex items-center gap-3">
                <!-- right -->
                <div class="flex items-center gap-3">
                    <a href="#" class=" text-sm text-green-300 font-normal transition-all duration-500 hover:text-neutral-700 hover:transition-none 512max:hidden">
                        سوالی دارید؟
                    </a>
                    <a href="#" class=" flex items-center justify-center gap-[6px] py-2 px-4 bg-neutral-50 text-[#3D3D3D] rounded-[6px] transition-all duration-500 hover:bg-green-300 hover:text-light hover:transition-none 768max:hidden">
                        <svg class=" text-inherit w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 2.08331C10.9801 2.08301 11.9345 2.39689 12.723 2.97887C13.5116 3.56085 14.0929 4.38029 14.3815 5.31691C14.6701 6.25354 14.6509 7.25801 14.3267 8.18291C14.0024 9.10781 13.3903 9.90442 12.58 10.4558C13.9864 10.9716 15.2062 11.8966 16.0824 13.1116C16.9587 14.3266 17.4512 15.776 17.4967 17.2733C17.5009 17.3564 17.4885 17.4395 17.4602 17.5178C17.4319 17.5961 17.3883 17.6679 17.3318 17.729C17.2754 17.7902 17.2073 17.8395 17.1316 17.874C17.0559 17.9085 16.974 17.9275 16.8908 17.93C16.8076 17.9324 16.7248 17.9182 16.6472 17.8882C16.5696 17.8582 16.4987 17.813 16.4388 17.7553C16.3789 17.6975 16.3311 17.6284 16.2982 17.5519C16.2654 17.4754 16.2481 17.3932 16.2475 17.31C16.1979 15.6862 15.518 14.1455 14.3518 13.0145C13.1857 11.8834 11.625 11.2509 10.0004 11.2509C8.37587 11.2509 6.81516 11.8834 5.64902 13.0145C4.48288 14.1455 3.80296 15.6862 3.75333 17.31C3.74836 17.4757 3.67774 17.6327 3.55702 17.7464C3.43629 17.8601 3.27534 17.9212 3.10958 17.9162C2.94382 17.9113 2.78683 17.8406 2.67313 17.7199C2.55944 17.5992 2.49836 17.4382 2.50333 17.2725C2.54896 15.7753 3.04158 14.3261 3.9178 13.1112C4.79402 11.8964 6.01375 10.9716 7.42 10.4558C6.60974 9.90442 5.99757 9.10781 5.67333 8.18291C5.3491 7.25801 5.32989 6.25354 5.61851 5.31691C5.90713 4.38029 6.48839 3.56085 7.27697 2.97887C8.06555 2.39689 9.01992 2.08301 10 2.08331ZM6.66667 6.66665C6.66667 7.5507 7.01786 8.39855 7.64298 9.02367C8.2681 9.64879 9.11594 9.99998 10 9.99998C10.8841 9.99998 11.7319 9.64879 12.357 9.02367C12.9821 8.39855 13.3333 7.5507 13.3333 6.66665C13.3333 5.78259 12.9821 4.93474 12.357 4.30962C11.7319 3.6845 10.8841 3.33331 10 3.33331C9.11594 3.33331 8.2681 3.6845 7.64298 4.30962C7.01786 4.93474 6.66667 5.78259 6.66667 6.66665Z" fill="currentColor"/>
                        </svg>
                        <a href="{{ route('login') }}" class=" text-sm text-inherit font-normal">
                            ورود/ثبت نام
                        </a>
                    </a>
                </div>
                <!-- left -->
                <div class="flex items-center gap-3 640max:gap-2">
                    <a href="#" class="rounded-full relative hidden items-center justify-center aspect-square w-10 text-light bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:w-8 768max:flex">
                        <svg class=" text-inherit w-5 640max:w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm5.03 4.72a.75.75 0 0 1 0 1.06l-1.72 1.72h10.94a.75.75 0 0 1 0 1.5H10.81l1.72 1.72a.75.75 0 1 1-1.06 1.06l-3-3a.75.75 0 0 1 0-1.06l3-3a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="rounded-full relative flex items-center justify-center aspect-square w-10 text-light bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:w-8">
                        <svg class=" text-inherit w-5 640max:w-4" viewBox="0 0 17.5 17.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2656 12.3312C9.91137 13.4133 8.19421 13.9358 6.46681 13.7913C4.7394 13.6468 3.13289 12.8463 1.97721 11.5543C0.821527 10.2622 0.204419 8.57669 0.252626 6.84382C0.300833 5.11096 1.0107 3.46233 2.23642 2.23653C3.46214 1.01074 5.11068 0.300836 6.84344 0.252626C8.57621 0.204416 10.2617 0.82156 11.5536 1.97731C12.8456 3.13305 13.646 4.73966 13.7905 6.46717C13.935 8.19467 13.4125 9.91192 12.3305 11.2662L17.5102 16.4452C17.5842 16.5142 17.6436 16.5974 17.6848 16.6898C17.726 16.7823 17.7481 16.882 17.7499 16.9832C17.7517 17.0844 17.7331 17.1849 17.6952 17.2787C17.6573 17.3725 17.6009 17.4578 17.5293 17.5293C17.4578 17.6009 17.3725 17.6573 17.2787 17.6952C17.1849 17.7331 17.0844 17.7517 16.9833 17.7499C16.8821 17.7481 16.7823 17.726 16.6899 17.6848C16.5975 17.6436 16.5143 17.5842 16.4453 17.5102L11.2656 12.3312ZM3.30415 10.7619C2.56682 10.0244 2.06463 9.08495 1.86106 8.06215C1.65748 7.03936 1.76166 5.97916 2.16043 5.01556C2.55919 4.05196 3.23464 3.2282 4.10142 2.64839C4.96819 2.06858 5.98738 1.75874 7.03018 1.75804C8.07298 1.75734 9.09259 2.0658 9.96014 2.64444C10.8277 3.22309 11.5043 4.04594 11.9043 5.009C12.3044 5.97207 12.41 7.03212 12.2078 8.05519C12.0056 9.07826 11.5047 10.0184 10.7683 10.7569L10.7633 10.7619L10.7583 10.7659C9.76884 11.7531 8.42804 12.3072 7.03038 12.3064C5.63273 12.3057 4.29252 11.7502 3.30415 10.7619Z" fill="currentColor"/>
                        </svg>
                    </a>
                    <a href="#" class="rounded-full relative flex items-center justify-center aspect-square w-10 text-light bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:w-8">
                        <svg class=" text-inherit w-5 640max:w-4" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.96875 6.875V14.375C7.96875 14.4993 7.91936 14.6185 7.83146 14.7065C7.74355 14.7944 7.62432 14.8438 7.5 14.8438C7.37568 14.8438 7.25645 14.7944 7.16854 14.7065C7.08064 14.6185 7.03125 14.4993 7.03125 14.375V6.875C7.03125 6.75068 7.08064 6.63145 7.16854 6.54354C7.25645 6.45564 7.37568 6.40625 7.5 6.40625C7.62432 6.40625 7.74355 6.45564 7.83146 6.54354C7.91936 6.63145 7.96875 6.75068 7.96875 6.875ZM10 6.40625C9.87568 6.40625 9.75645 6.45564 9.66854 6.54354C9.58064 6.63145 9.53125 6.75068 9.53125 6.875V14.375C9.53125 14.4993 9.58064 14.6185 9.66854 14.7065C9.75645 14.7944 9.87568 14.8438 10 14.8438C10.1243 14.8438 10.2435 14.7944 10.3315 14.7065C10.4194 14.6185 10.4688 14.4993 10.4688 14.375V6.875C10.4688 6.75068 10.4194 6.63145 10.3315 6.54354C10.2435 6.45564 10.1243 6.40625 10 6.40625ZM12.5 6.40625C12.3757 6.40625 12.2565 6.45564 12.1685 6.54354C12.0806 6.63145 12.0312 6.75068 12.0312 6.875V14.375C12.0312 14.4993 12.0806 14.6185 12.1685 14.7065C12.2565 14.7944 12.3757 14.8438 12.5 14.8438C12.6243 14.8438 12.7435 14.7944 12.8315 14.7065C12.9194 14.6185 12.9688 14.4993 12.9688 14.375V6.875C12.9688 6.75068 12.9194 6.63145 12.8315 6.54354C12.7435 6.45564 12.6243 6.40625 12.5 6.40625ZM16.0938 5V16.25C16.0938 16.5401 15.9785 16.8183 15.7734 17.0234C15.5683 17.2285 15.2901 17.3438 15 17.3438H13.5938V18.75C13.5938 18.8743 13.5444 18.9935 13.4565 19.0815C13.3685 19.1694 13.2493 19.2188 13.125 19.2188C13.0007 19.2188 12.8815 19.1694 12.7935 19.0815C12.7056 18.9935 12.6562 18.8743 12.6562 18.75V17.3438H7.34375V18.75C7.34375 18.8743 7.29436 18.9935 7.20646 19.0815C7.11855 19.1694 6.99932 19.2188 6.875 19.2188C6.75068 19.2188 6.63145 19.1694 6.54354 19.0815C6.45564 18.9935 6.40625 18.8743 6.40625 18.75V17.3438H5C4.70992 17.3438 4.43172 17.2285 4.2266 17.0234C4.02148 16.8183 3.90625 16.5401 3.90625 16.25V5C3.90625 4.70992 4.02148 4.43172 4.2266 4.2266C4.43172 4.02148 4.70992 3.90625 5 3.90625H7.03125V1.875C7.03125 1.41916 7.21233 0.981988 7.53466 0.65966C7.85699 0.337332 8.29416 0.15625 8.75 0.15625H11.25C11.7058 0.15625 12.143 0.337332 12.4653 0.65966C12.7877 0.981988 12.9688 1.41916 12.9688 1.875V3.90625H15C15.2901 3.90625 15.5683 4.02148 15.7734 4.2266C15.9785 4.43172 16.0938 4.70992 16.0938 5ZM7.96875 3.90625H12.0312V1.875C12.0312 1.6678 11.9489 1.46909 11.8024 1.32257C11.6559 1.17606 11.4572 1.09375 11.25 1.09375H8.75C8.5428 1.09375 8.34409 1.17606 8.19757 1.32257C8.05106 1.46909 7.96875 1.6678 7.96875 1.875V3.90625ZM15.1562 5C15.1562 4.95856 15.1398 4.91882 15.1105 4.88951C15.0812 4.86021 15.0414 4.84375 15 4.84375H5C4.95856 4.84375 4.91882 4.86021 4.88951 4.88951C4.86021 4.91882 4.84375 4.95856 4.84375 5V16.25C4.84375 16.2914 4.86021 16.3312 4.88951 16.3605C4.91882 16.3898 4.95856 16.4062 5 16.4062H15C15.0414 16.4062 15.0812 16.3898 15.1105 16.3605C15.1398 16.3312 15.1562 16.2914 15.1562 16.25V5Z" fill="currentColor"/>
                        </svg>
                        <span class="rounded-[10px] flex items-center justify-center h-5 px-[6px] bg-[#F5F5F5] text-xs text-neutral-700 font-normal absolute z-[2] bottom-0 left-[70%] 640max:text-[8px] 640max:h-4 640max:bottom-[-5%]">
                            12
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </header>
@endif

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<script src="{{ asset('node_modules/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js') }}"></script>
<script src="{{ asset('src/scripts/Swiper/swiper-bundle.min.js') }}"></script>
<script>
    jalaliDatepicker.startWatch();
</script>
@yield('content')


<footer class=" w-full bg-light">
    <div class="w-full max-w-[1440px] mx-auto px-[100px] pt-8 pb-5 flex flex-col gap-5 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
        <!-- top -->
        <div class="w-full flex items-start justify-between 640max:grid-cols-1 1024max:grid-cols-2 1024max:grid 1024max:justify-start 1024max:items-start 1024max:gap-y-5 1024max:gap-x-2">
            <!-- right -->
            <div class="w-full flex flex-col gap-4 max-w-[300px] 640max:max-w-full 640max:items-center">
                <!-- img -->
                <img src="{{ asset('public/images/chamedonLogo2.svg') }}" alt="#" class="w-[248px]">
                <!-- body -->
                <p class="w-full text-xs text-[#b6b7b7] font-normal leading-[24px] 640max:text-center">
                    چمدان، همراه مطمئن شما در سفر! با ارائه خدمات خرید بلیط هواپیما و قطار، رزرو هتل و تورهای متنوع، تجربه‌ای آسان را برای برنامه‌ریزی سفرهای شما فراهم می‌کند.
                </p>
                <!-- links -->
                <div class="w-full flex items-center gap-[9px] 640max:justify-center">
                    <a href="#" class="w-8 aspect-square flex items-center justify-center">
                        <svg class=" w-7 text-green-600" viewBox="0 0 22.017194747924805 17.905532836914062" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.0311 0.584286L1.52807 7.87709C0.197067 8.39549 0.204767 9.11549 1.28387 9.43655L6.29107 10.9512L17.8763 3.86322C18.4241 3.54002 18.9246 3.71389 18.5132 4.06802L9.12687 12.2824H9.12467L9.12687 12.2835L8.78147 17.2883C9.28747 17.2883 9.51077 17.0632 9.79457 16.7976L12.2267 14.5043L17.2856 18.1278C18.2184 18.6259 18.8883 18.3699 19.1204 17.2904L22.4413 2.11389C22.7812 0.792286 21.921 0.193886 21.0311 0.584286Z" fill="currentColor"/>
                        </svg>
                    </a>
                    <a href="#" class="w-8 aspect-square flex items-center justify-center">
                        <svg class=" w-7 text-green-600" viewBox="0 0 23.834558486938477 23.111650466918945" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5424 0.266602C14.883 0.270068 15.5635 0.277002 16.151 0.293179L16.3822 0.301268C16.6491 0.310513 16.9124 0.322068 17.2306 0.335935C18.4986 0.393713 19.3637 0.587846 20.1228 0.873268C20.9093 1.16678 21.5719 1.56429 22.2344 2.20562C22.8404 2.78328 23.3093 3.48204 23.6084 4.25327C23.9028 4.98936 24.103 5.82829 24.1625 7.05896C24.1769 7.36633 24.1888 7.62171 24.1983 7.88171L24.2055 8.10589C24.2233 8.67442 24.2305 9.33425 24.2329 10.6342L24.2341 11.4963V13.0101C24.237 13.8529 24.2278 14.6958 24.2066 15.5384L24.1995 15.7626C24.19 16.0226 24.178 16.278 24.1637 16.5854C24.1042 17.816 23.9016 18.6538 23.6084 19.391C23.3101 20.1627 22.8411 20.8616 22.2344 21.4387C21.6386 22.0261 20.918 22.4807 20.1228 22.771C19.3637 23.0565 18.4986 23.2506 17.2306 23.3084C16.9479 23.3213 16.665 23.3328 16.3822 23.343L16.151 23.35C15.5635 23.3662 14.883 23.3742 13.5424 23.3766L12.6534 23.3777H11.0935C10.2239 23.3806 9.35433 23.3718 8.48498 23.3511L8.2538 23.3442C7.97091 23.3338 7.68808 23.3219 7.40533 23.3084C6.1374 23.2506 5.27225 23.0565 4.51196 22.771C3.71673 22.4814 2.99642 22.0267 2.40152 21.4387C1.79502 20.8612 1.32571 20.1624 1.02634 19.391C0.731995 18.655 0.531795 17.816 0.472212 16.5854C0.458935 16.3112 0.447019 16.0369 0.436462 15.7626L0.430504 15.5384C0.408544 14.6958 0.398612 13.8529 0.400712 13.0101V10.6342C0.397386 9.79138 0.406126 8.94852 0.426929 8.10589L0.43527 7.88171C0.444804 7.62171 0.45672 7.36633 0.47102 7.05896C0.530604 5.82829 0.730804 4.99051 1.02515 4.25327C1.32439 3.48125 1.79463 2.78227 2.40271 2.20562C2.99746 1.61799 3.71729 1.1633 4.51196 0.873268C5.27225 0.587846 6.1362 0.393713 7.40533 0.335935C7.72231 0.322068 7.98686 0.310513 8.2538 0.301268L8.48498 0.294335C9.35393 0.273804 10.2231 0.264944 11.0923 0.267757L13.5424 0.266602ZM12.3174 6.04438C10.7371 6.04438 9.22161 6.65311 8.1042 7.73665C6.9868 8.82019 6.35905 10.2898 6.35905 11.8222C6.35905 13.3545 6.9868 14.8241 8.1042 15.9077C9.22161 16.9912 10.7371 17.5999 12.3174 17.5999C13.8976 17.5999 15.4132 16.9912 16.5306 15.9077C17.648 14.8241 18.2757 13.3545 18.2757 11.8222C18.2757 10.2898 17.648 8.82019 16.5306 7.73665C15.4132 6.65311 13.8976 6.04438 12.3174 6.04438ZM12.3174 8.35549C12.7869 8.35541 13.2517 8.44501 13.6855 8.61915C14.1193 8.7933 14.5134 9.04859 14.8455 9.37045C15.1775 9.6923 15.4409 10.0744 15.6206 10.495C15.8004 10.9156 15.8929 11.3663 15.893 11.8216C15.8931 12.2768 15.8007 12.7276 15.6211 13.1483C15.4415 13.5689 15.1782 13.9511 14.8463 14.2731C14.5144 14.595 14.1203 14.8504 13.6866 15.0247C13.2529 15.199 12.788 15.2887 12.3186 15.2888C11.3704 15.2888 10.4611 14.9236 9.79066 14.2735C9.12022 13.6233 8.74357 12.7416 8.74357 11.8222C8.74357 10.9027 9.12022 10.021 9.79066 9.37085C10.4611 8.72073 11.3704 8.35549 12.3186 8.35549M18.5748 4.31105C18.1798 4.31105 17.8009 4.46323 17.5215 4.73411C17.2422 5.005 17.0852 5.3724 17.0852 5.75549C17.0852 6.13858 17.2422 6.50598 17.5215 6.77687C17.8009 7.04775 18.1798 7.19993 18.5748 7.19993C18.9699 7.19993 19.3488 7.04775 19.6281 6.77687C19.9075 6.50598 20.0644 6.13858 20.0644 5.75549C20.0644 5.3724 19.9075 5.005 19.6281 4.73411C19.3488 4.46323 18.9699 4.31105 18.5748 4.31105Z" fill="currentColor"/>
                        </svg>
                    </a>
                    <a href="#" class="w-8 aspect-square flex items-center justify-center">
                        <svg class=" w-7 text-green-600" viewBox="0 0 22.000001907348633 21.33333396911621" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.64286 0.333252C2.80932 0.333252 2.00992 0.65434 1.42052 1.22588C0.831122 1.79742 0.5 2.57259 0.5 3.38087V18.619C0.5 19.4272 0.831122 20.2024 1.42052 20.774C2.00992 21.3455 2.80932 21.6666 3.64286 21.6666H19.3571C20.1907 21.6666 20.9901 21.3455 21.5795 20.774C22.1689 20.2024 22.5 19.4272 22.5 18.619V3.38087C22.5 2.57259 22.1689 1.79742 21.5795 1.22588C20.9901 0.65434 20.1907 0.333252 19.3571 0.333252H3.64286ZM5.37457 6.88106C5.87261 6.88106 6.35025 6.68921 6.70242 6.34772C7.05458 6.00622 7.25243 5.54306 7.25243 5.06011C7.25243 4.57716 7.05458 4.114 6.70242 3.7725C6.35025 3.43101 5.87261 3.23916 5.37457 3.23916C4.87653 3.23916 4.39889 3.43101 4.04673 3.7725C3.69456 4.114 3.49671 4.57716 3.49671 5.06011C3.49671 5.54306 3.69456 6.00622 4.04673 6.34772C4.39889 6.68921 4.87653 6.88106 5.37457 6.88106ZM6.946 18.334V8.30887H3.80314V18.334H6.946ZM9.03286 8.30887H12.1757V9.65135C12.6393 8.94735 13.6576 7.99954 15.5511 7.99954C17.8109 7.99954 19.0381 9.45173 19.0381 12.2144C19.0381 12.347 19.0507 12.9519 19.0507 12.9519V18.3325H15.9079V12.9534C15.9079 12.2144 15.7476 10.7622 14.0536 10.7622C12.358 10.7622 12.215 12.5877 12.1757 13.7824V18.3325H9.03286V8.30887Z" fill="currentColor"/>
                        </svg>
                    </a>
                    <a href="#" class="w-8 aspect-square flex items-center justify-center">
                        <svg class=" w-7 text-green-600" viewBox="0 0 23.111135482788086 23.111125946044922" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.8222 0.266602C18.2044 0.266602 23.3778 5.44002 23.3778 11.8222C23.3778 18.2043 18.2044 23.3777 11.8222 23.3777C9.78012 23.381 7.77393 22.8406 6.00979 21.8119L0.271301 23.3777L1.83361 17.6369C0.80412 15.8722 0.263267 13.8652 0.266679 11.8222C0.266679 5.44002 5.4401 0.266602 11.8222 0.266602ZM7.8841 6.39105L7.65299 6.40029C7.50337 6.4094 7.35715 6.44871 7.22313 6.51585C7.09777 6.58683 6.98334 6.67557 6.88339 6.77931C6.74473 6.90989 6.66615 7.02313 6.58179 7.13291C6.15438 7.68862 5.92425 8.37087 5.92775 9.07193C5.93006 9.63816 6.07797 10.1894 6.30908 10.7047C6.7817 11.747 7.55939 12.8506 8.58553 13.8733C8.83282 14.1194 9.07548 14.3667 9.33664 14.5966C10.6117 15.7192 12.1311 16.5288 13.774 16.9609L14.4303 17.0614C14.6441 17.073 14.8579 17.0568 15.0728 17.0464C15.4094 17.0291 15.738 16.9379 16.0354 16.7795C16.1867 16.7015 16.3344 16.6167 16.478 16.5253C16.478 16.5253 16.5277 16.4929 16.6224 16.4213C16.7784 16.3057 16.8743 16.2237 17.0038 16.0885C17.0997 15.9891 17.1829 15.8724 17.2464 15.7395C17.3366 15.5511 17.4267 15.1918 17.4637 14.8925C17.4914 14.6637 17.4833 14.5389 17.4798 14.4614C17.4752 14.3378 17.3724 14.2095 17.2603 14.1552L16.5878 13.8536C16.5878 13.8536 15.5824 13.4157 14.9677 13.136C14.9033 13.1079 14.8344 13.0919 14.7643 13.0886C14.6852 13.0805 14.6053 13.0894 14.53 13.1147C14.4547 13.14 14.3856 13.1812 14.3275 13.2354C14.3217 13.2331 14.2443 13.299 13.4088 14.3112C13.3609 14.3757 13.2948 14.4244 13.2191 14.4511C13.1433 14.4779 13.0614 14.4815 12.9836 14.4614C12.9083 14.4413 12.8345 14.4158 12.7629 14.3852C12.6196 14.3251 12.5699 14.302 12.4717 14.2604C11.8084 13.971 11.1944 13.5799 10.6517 13.1014C10.5061 12.9742 10.3709 12.8356 10.2322 12.7015C9.77758 12.2662 9.38138 11.7736 9.05353 11.2363L8.98535 11.1265C8.93638 11.0527 8.89679 10.9732 8.86748 10.8896C8.82357 10.7198 8.93797 10.5834 8.93797 10.5834C8.93797 10.5834 9.21877 10.276 9.34935 10.1096C9.47646 9.94785 9.58393 9.79069 9.65326 9.6786C9.78961 9.45905 9.83237 9.23371 9.76073 9.05922C9.43717 8.26882 9.10206 7.48189 8.7577 6.70073C8.68953 6.54589 8.4873 6.43496 8.30357 6.413C8.24117 6.40607 8.17877 6.39913 8.11637 6.39451C7.96119 6.3868 7.80568 6.38835 7.65068 6.39913L7.8841 6.39105Z" fill="currentColor"/>
                        </svg>
                    </a>
                    <a href="#" class="w-8 aspect-square flex items-center justify-center">
                        <svg class=" w-7 text-green-600" viewBox="0 0 24.200014114379883 17.066665649414062" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.08 12.657L16.3599 8.99989L10.08 5.34274V12.657ZM24.0676 3.11189C24.2249 3.68484 24.3338 4.45284 24.4064 5.42808C24.4911 6.40331 24.5274 7.24446 24.5274 7.97589L24.6 8.99989C24.6 11.6696 24.4064 13.6323 24.0676 14.8879C23.7651 15.985 23.0633 16.6921 21.9743 16.9968C21.4056 17.1553 20.365 17.265 18.7678 17.3382C17.1948 17.4235 15.7549 17.4601 14.4239 17.4601L12.5 17.5332C7.4301 17.5332 4.272 17.3382 3.0257 16.9968C1.93669 16.6921 1.23489 15.985 0.932394 14.8879C0.775094 14.3149 0.666194 13.5469 0.593594 12.5717C0.508894 11.5965 0.472594 10.7553 0.472594 10.0239L0.399994 8.99989C0.399994 6.33017 0.593594 4.3675 0.932394 3.11189C1.23489 2.01474 1.93669 1.3077 3.0257 1.00293C3.5944 0.844458 4.635 0.734743 6.2322 0.6616C7.8052 0.576267 9.2451 0.539696 10.5761 0.539696L12.5 0.466553C17.5699 0.466553 20.728 0.6616 21.9743 1.00293C23.0633 1.3077 23.7651 2.01474 24.0676 3.11189Z" fill="currentColor"/>
                        </svg>
                    </a>
                </div>
            </div>
            <!-- important links -->
            <div class="footer-accordion max-w-[200px] flex flex-col 640max:max-w-full 640max:border-y-[1px] 640max:border-y-green-100">
                <!-- button -->
                <button onclick="accordionFunc(event, 'footer-accordion-content1')" class="footer-accordion-button active w-full py-[10px] hidden justify-between items-center text-base text-black font-normal 640max:flex">
                        <span>
                            لینک مهم
                        </span>
                    <svg class=" w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- content -->
                <div id="footer-accordion-content1" class="w-full footer-accordion-content">
                    <div class="w-full footer-accordion-content flex flex-col gap-5 640max:py-3">
                        <!-- title -->
                        <h6 class=" text-sm text-black font-medium 640max:hidden">
                            لینک های مهم
                        </h6>
                        <!-- body -->
                        <div class="w-full flex flex-col gap-[2px]">
                            <a href="#" class="w-full text-sm text-neutral-400 font-normal leading-[28px]">
                                خانه
                            </a>
                            <a href="#" class="w-full text-sm text-neutral-400 font-normal leading-[28px]">
                                درباره ما
                            </a>
                            <a href="#" class="w-full text-sm text-neutral-400 font-normal leading-[28px]">
                                تماس با ما
                            </a>
                            <a href="#" class="w-full text-sm text-neutral-400 font-normal leading-[28px]">
                                شرایط و ضوابط
                            </a>
                            <a href="#" class="w-full text-sm text-neutral-400 font-normal leading-[28px]">
                                سیاست حفظ حریم خصوصی
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contact ways -->
            <div class="footer-accordion max-w-[200px] flex flex-col 640max:max-w-full 640max:border-y-[1px] 640max:border-y-green-100">
                <!-- button -->
                <button onclick="accordionFunc(event, 'footer-accordion-content2')" class="footer-accordion-button active w-full py-[10px] hidden justify-between items-center text-base text-black font-normal 640max:flex">
                        <span>
                            راه های ارتباطی با چمدان
                        </span>
                    <svg class=" w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="footer-accordion-content2" class="w-full footer-accordion-content">
                    <!-- content -->
                    <div class="w-full footer-accordion-content flex flex-col gap-5 640max:py-3">
                        <!-- title -->
                        <h6 class=" text-sm text-black font-medium 640max:hidden">
                            راه های ارتباطی با چمدان
                        </h6>
                        <!-- body -->
                        <div class="w-full flex flex-col gap-[2px]">
                            <p class="w-full text-sm text-neutral-400 font-normal leading-[28px]">
                                آدرس:
                                تهران، خیابان ولیعصر، بالاتر از میدان ونک، پلاک 123، طبقه 2
                            </p>
                            <p class="w-full text-sm text-neutral-400 font-normal leading-[28px]">
                            <p class=" text-inherit font-normal text-neutral-400">شماره تماس:</p>
                            <p class=" text-inherit font-normal text-neutral-400">012-12345678</p>
                            <p class=" text-inherit font-normal text-neutral-400">012-12345678</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left -->
            <div class="w-[300px] flex flex-col gap-[23px] 512max:w-full">
                <!--  -->
                <div class="w-full flex flex-col gap-5">
                        <span class=" text-sm text-neutral-700 font-bold">
                            از جدیدترین تورها با خبر شوید!
                        </span>
                    <!-- input -->
                    <div class="w-full flex items-center">
                        <input type="text" class="w-full h-10 bg-neutral-50 rounded-xl rounded-l-none px-5 py-[8px] text-xs text-neutral-700 placeholder:text-neutral-400 font-normal focus:outline-none">
                        <div class="w-10 h-10 rounded-l-xl bg-neutral-50 flex items-center">
                            <button class=" flex items-center justify-center w-[20px] aspect-square rounded-full text-light bg-green-600 transition-all duration-500 ease-out hover:bg-green-100 hover:text-green-600 hover:transition-none">
                                <svg class=" w-2 text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="w-full flex flex-col gap-5">
                        <span class=" text-sm text-neutral-700 font-bold">
                            از جدیدترین تورها با خبر شوید!
                        </span>
                    <!-- body -->
                    <div class="w-full flex items-center justify-end py-[5px] px-[13px] gap-[9px] rounded-xl bg-neutral-50">
                        <a href="#" class=" w-[58px] aspect-square">
                            <img src="{{ asset('public/images/zarinPal.png') }}" alt="#" class="w-full h-full object-contain">
                        </a>
                        <a href="#" class=" w-[58px] aspect-square">
                            <img src="{{ asset('public/images/enamad.png') }}" alt="#" class="w-full h-full object-contain">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- divider line -->
        <div class="w-full h-[2px] bg-[#EEEEEE]">
        </div>
        <!-- bottom -->
        <div class="w-full">
                <span class=" text-xs text-neutral-400 font-normal 512max:text-[10px]">
                    این وبسایت متعلق به سایت چمدان میباشد و تمامی حقوق آن محفوظ میباشد.
                </span>
        </div>
    </div>
</footer>

</body>
</html>
