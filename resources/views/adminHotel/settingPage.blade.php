@extends('layouts.adminHotel')
@section('content')
<div class="w-full  h-full overflow-auto noscrollbar flex flex-col gap-7 1024max:pt-[76px] 1024max:gap-0">
            <div class="w-full items-center py-[18px] px-[25px] bg-light hidden 768max:flex">
                <h3 class=" text-base text-green-300 font-medium font-farsi-medium">
                    تنظیمات
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
                                        مشخصات هتل
                                    </span>
                                </div>
                                <!-- content -->
                                <div class="accordiion-content w-full flex flex-col gap-4.5 p-4.5 bg-light overflow-hidden">
                                    <!-- inputs -->
                                    <div class="w-full grid grid-cols-3 gap-4.5 512max:grid-cols-1 768max:grid-cols-2">
                                        <div class="w-full flex flex-col gap-2">
                                            <label for="" class=" text-base text-neutral-700 font-normal">
                                                نام هتل:
                                            </label>
                                            <input id="" name="" placeholder="نام هتل:" type="text" class=" w-full rounded-[6px] bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400">
                                        </div>
                                        <div class="w-full flex flex-col gap-2">
                                            <label for="" class=" text-base text-neutral-700 font-normal">
                                                شماره تماس
                                            </label>
                                            <input id="" name="" placeholder="شماره تماس" type="text" class=" w-full rounded-[6px] bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400">
                                        </div>
                                        <div class="w-full flex flex-col gap-2">
                                            <label for="" class=" text-base text-neutral-700 font-normal">
                                                امتیاز هتل
                                            </label>
                                            <input id="" name="" placeholder="امتیاز هتل" type="text" class=" w-full rounded-[6px] bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400">
                                        </div>
                                        <div class="w-full flex flex-col gap-2">
                                            <label for="" class=" text-base text-neutral-700 font-normal">
                                                ایمیل:
                                            </label>
                                            <input id="" name="" placeholder="ایمیل:" type="text" class=" w-full rounded-[6px] bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400">
                                        </div>
                                        <div class="w-full flex flex-col gap-2">
                                            <label for="" class=" text-base text-neutral-700 font-normal">
                                                وبسایت:
                                            </label>
                                            <input id="" name="" placeholder="وبسایت:" type="text" class=" w-full rounded-[6px] bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400">
                                        </div>
                                    </div>
                                    <!-- description -->
                                    <div class="w-full flex flex-col gap-2">
                                        <label for="" class=" text-base text-neutral-700 font-normal">
                                            توضیحات:
                                        </label>
                                        <textarea id="" name="" placeholder="توضیحات" type="text" class=" w-full min-h-[153px] rounded-[6px] bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400"></textarea>
                                    </div>
                                    <!-- image upload -->
                                    <div class="w-full grid grid-cols-[200px_1fr] gap-4.5 640max:grid-cols-1">
                                        <!-- profile image -->
                                        <div class="w-full flex flex-col gap-2">
                                            <input id="profile" class=" hidden" type="file">
                                            <label for="" class=" text-base text-neutral-700 font-normal">
                                                لوگو:
                                            </label>
                                            <div class="w-full aspect-square relative rounded-xl overflow-hidden group 512max:w-[180max] 640max:w-[200px]">
                                                <img id="profileImgElem" src="../../../public/public/images/image1.jpg" class=" w-full h-full object-cover absolute z-[3] top-0 left-0">
                                                <label for="profile" class=" absolute z-[2] top-0 left-0 w-full h-full bg-[#255346CC] flex flex-col gap-4.5 items-center justify-center transition-all duration-200 ease-out">
                                                    <svg class=" w-[35px] text-light" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 18C4.02353 18 0 13.9765 0 9C0 4.02353 4.02353 0 9 0C13.9765 0 18 4.02353 18 9C18 13.9765 13.9765 18 9 18ZM9 1.05882C4.60588 1.05882 1.05882 4.60588 1.05882 9C1.05882 13.3941 4.60588 16.9412 9 16.9412C13.3941 16.9412 16.9412 13.3941 16.9412 9C16.9412 4.60588 13.3941 1.05882 9 1.05882Z" fill="currentColor"/>
                                                        <path d="M4.23535 8.47046H13.7648V9.52928H4.23535V8.47046Z" fill="currentColor"/>
                                                        <path d="M8.4707 4.23523H9.52953V13.7646H8.4707V4.23523Z" fill="currentColor"/>
                                                    </svg>
                                                    <span class=" text-base text-light font-normal">
                                                        آپلود تصویر جدید
                                                    </span>
                                                </label>
                                                <label for="profile" class=" absolute z-[4] top-0 left-0 w-full h-full bg-[#255346CC] flex flex-col gap-4.5 items-center justify-center opacity-0 transition-all duration-200 ease-out group-hover:opacity-100">
                                                    <svg class=" w-[35px] text-light" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 18C4.02353 18 0 13.9765 0 9C0 4.02353 4.02353 0 9 0C13.9765 0 18 4.02353 18 9C18 13.9765 13.9765 18 9 18ZM9 1.05882C4.60588 1.05882 1.05882 4.60588 1.05882 9C1.05882 13.3941 4.60588 16.9412 9 16.9412C13.3941 16.9412 16.9412 13.3941 16.9412 9C16.9412 4.60588 13.3941 1.05882 9 1.05882Z" fill="currentColor"/>
                                                        <path d="M4.23535 8.47046H13.7648V9.52928H4.23535V8.47046Z" fill="currentColor"/>
                                                        <path d="M8.4707 4.23523H9.52953V13.7646H8.4707V4.23523Z" fill="currentColor"/>
                                                    </svg>
                                                    <span class=" text-base text-light font-normal">
                                                        آپلود تصویر جدید
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- banner image -->
                                        <div class="w-full flex flex-col gap-2">
                                            <input id="banner" class=" hidden" type="file">
                                            <label for="" class=" text-base text-neutral-700 font-normal">
                                                بنر:
                                            </label>
                                            <div class="w-full h-[200px] relative rounded-xl overflow-hidden group 512max:h-[177px]">
                                                <img id="bannerImgElem" src="../../../public/public/images/banner.png" class=" w-full h-full object-cover absolute z-[3] top-0 left-0">
                                                <label for="banner" class=" absolute z-[2] top-0 left-0 w-full h-full bg-[#255346CC] flex flex-col gap-4.5 items-center justify-center transition-all duration-200 ease-out">
                                                    <svg class=" w-[35px] text-light" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 18C4.02353 18 0 13.9765 0 9C0 4.02353 4.02353 0 9 0C13.9765 0 18 4.02353 18 9C18 13.9765 13.9765 18 9 18ZM9 1.05882C4.60588 1.05882 1.05882 4.60588 1.05882 9C1.05882 13.3941 4.60588 16.9412 9 16.9412C13.3941 16.9412 16.9412 13.3941 16.9412 9C16.9412 4.60588 13.3941 1.05882 9 1.05882Z" fill="currentColor"/>
                                                        <path d="M4.23535 8.47046H13.7648V9.52928H4.23535V8.47046Z" fill="currentColor"/>
                                                        <path d="M8.4707 4.23523H9.52953V13.7646H8.4707V4.23523Z" fill="currentColor"/>
                                                    </svg>
                                                    <span class=" text-base text-light font-normal">
                                                        آپلود تصویر جدید
                                                    </span>
                                                </label>
                                                <label for="banner" class=" absolute z-[4] top-0 left-0 w-full h-full bg-[#255346CC] flex flex-col gap-4.5 items-center justify-center opacity-0 transition-all duration-200 ease-out group-hover:opacity-100">
                                                    <svg class=" w-[35px] text-light" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 18C4.02353 18 0 13.9765 0 9C0 4.02353 4.02353 0 9 0C13.9765 0 18 4.02353 18 9C18 13.9765 13.9765 18 9 18ZM9 1.05882C4.60588 1.05882 1.05882 4.60588 1.05882 9C1.05882 13.3941 4.60588 16.9412 9 16.9412C13.3941 16.9412 16.9412 13.3941 16.9412 9C16.9412 4.60588 13.3941 1.05882 9 1.05882Z" fill="currentColor"/>
                                                        <path d="M4.23535 8.47046H13.7648V9.52928H4.23535V8.47046Z" fill="currentColor"/>
                                                        <path d="M8.4707 4.23523H9.52953V13.7646H8.4707V4.23523Z" fill="currentColor"/>
                                                    </svg>
                                                    <span class=" text-base text-light font-normal">
                                                        آپلود تصویر جدید
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- button -->
                                    <div class="w-full flex items-center justify-end gap-4.5">
                                        <button type="submit" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300">
                                            ذخیره
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="accordiion w-full flex flex-col">
                                <!-- button -->
                                <div class="accordiion-button w-full flex items-center py-3 px-4.5 bg-light gap-2">
                                    <svg class=" w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class=" text-base font-medium">
                                        تنظیمات رمز
                                    </span>
                                </div>
                                <!-- content -->
                                <div class="accordiion-content w-full flex flex-col gap-4.5 p-4.5 bg-light overflow-hidden">
                                    <div class="w-full grid grid-cols-[1fr_155px] items-end gap-4.5 768max:grid-cols-1">
                                        <!-- inputs -->
                                        <div class="w-full grid grid-cols-3 gap-4.5 512max:grid-cols-1 640max:grid-cols-2">
                                            <div class="w-full flex flex-col gap-2">
                                                <div class="w-full flex flex-col gap-2">
                                                    <label for="" class=" text-base text-neutral-700 font-normal">
                                                        رمز فعلی:
                                                    </label>
                                                    <input id="" name="" placeholder="رمز فعلی" type="text" class=" w-full h-10 rounded-[6px] rounded-l-none bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none">
                                                </div>
                                            </div>
                                            <div class="w-full flex flex-col gap-2">
                                                <div class="w-full flex flex-col gap-2">
                                                    <label for="" class=" text-base text-neutral-700 font-normal">
                                                        رمز جدید:
                                                    </label>
                                                    <div class="inputContainer rounded-[6px] w-full flex items-center">
                                                        <input id="" name="" placeholder="رمز جدید" type="password" class=" w-full h-10 rounded-[6px] rounded-l-none bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none">
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
                                            <div class="w-full flex flex-col gap-2">
                                                <div class="w-full flex flex-col gap-2">
                                                    <label for="" class=" text-base text-neutral-700 font-normal">
                                                        تکرار رمز جدید:
                                                    </label>
                                                    <div class="inputContainer rounded-[6px] w-full flex items-center">
                                                        <input id="" name="" placeholder="تکرار رمز جدید" type="password" class=" w-full h-10 rounded-[6px] rounded-l-none bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none">
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
                                        <!-- submit button -->
                                        <div class="w-full flex items-center gap-4.5 768max:justify-end">
                                            <button type="submit" class="rounded-[6px] flex items-center justify-center py-2 px-4 w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300">
                                                ذخیره
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordiion w-full flex flex-col">
                                <!-- button -->
                                <div class="accordiion-button w-full flex items-center py-3 px-4.5 bg-light gap-2">
                                    <svg class=" w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class=" text-base font-medium">
                                        مدیریت دسترسی ها
                                    </span>
                                </div>
                                <!-- content -->
                                <div class="accordiion-content w-full flex flex-col gap-4.5 p-4.5 bg-light overflow-hidden">
                                    <div class="w-full p-4.5 pb-[51px] rounded-xl bg-neutral-50 flex flex-col gap-2">
                                        <!-- header -->
                                        <div class="w-full py-3 px-4.5 rounded-xl bg-green-100 grid grid-cols-[0.7fr_0.6fr_0.7fr_0.7fr_0.8fr_150px] items-center gap-2 768max:hidden 1024max:grid-cols-[90px_110px_95px_1fr_95px_56px] 1280max:grid-cols-[0.7fr_0.6fr_0.7fr_0.7fr_0.8fr_56px]">
                                            <div class=" w-full flex items-center">
                                                <span class=" text-xs text-neutral-700 font-normal">
                                                    نام کاربری
                                                </span>
                                            </div>
                                            <div class=" w-full flex items-center justify-center">
                                                <span class=" text-xs text-neutral-700 font-normal">
                                                    نام و نام خانوادگی
                                                </span>
                                            </div>
                                            <div class=" w-full flex items-center justify-center">
                                                <span class=" text-xs text-neutral-700 font-normal">
                                                    نقش کاربر
                                                </span>
                                            </div>
                                            <div class=" w-full flex items-center justify-center">
                                                <span class=" text-xs text-neutral-700 font-normal">
                                                    ایمیل
                                                </span>
                                            </div>
                                            <div class=" w-full flex items-center justify-center">
                                                <span class=" text-xs text-neutral-700 font-normal">
                                                    آخرین بازدید
                                                </span>
                                            </div>
                                        </div>
                                        <!-- body -->
                                        <div class="w-full flex flex-col gap-2">
                                            <!-- item -->
                                            <div class="w-full bg-light rounded-xl p-4.5 flex flex-col gap-4.5 items-center 768max:bg-green-100">
                                                <div class="w-full grid grid-cols-[0.7fr_0.6fr_0.7fr_0.7fr_0.8fr_150px] gap-2 768max:grid-cols-[70px_1fr_70px] 1024max:grid-cols-[90px_110px_95px_1fr_95px_56px] 1280max:grid-cols-[0.7fr_0.6fr_0.7fr_0.7fr_0.8fr_56px]">
                                                    <div class=" w-full flex items-center">
                                                        <span class=" text-sm text-neutral-700 font-medium">
                                                            مدیر هتل
                                                        </span>
                                                    </div>
                                                    <div class=" w-full flex items-center justify-center 768max:hidden">
                                                        <span class=" text-sm text-neutral-700 font-normal text-center">
                                                            محمد حسینی
                                                        </span>
                                                    </div>
                                                    <div class=" w-full flex items-center justify-center">
                                                        <span class=" text-sm text-neutral-700 font-normal text-center">
                                                            مدیر اصلی
                                                        </span>
                                                    </div>
                                                    <div class=" w-full flex items-center justify-center 768max:hidden">
                                                        <span class=" text-xs text-neutral-400 font-normal text-center">
                                                            www.m-hoseini@gmail.com
                                                        </span>
                                                    </div>
                                                    <div class=" w-full flex items-center justify-center 768max:hidden">
                                                        <span class=" text-xs text-neutral-400 font-normal text-center">
                                                            12:30، 1403/10/20
                                                        </span>
                                                    </div>
                                                    <div class="w-full flex items-center justify-end gap-2">
                                                        <button onclick="modalController(addOReditUsers)" class="editButton flex items-center justify-center gap-2">
                                                            <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <mask id="path-1-inside-1_273_1119" fill="currentColor">
                                                                    <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                                                    </mask>
                                                                    <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_273_1119)"/>
                                                                </svg>
                                                            </div>
                                                        </button>
                                                        <button class="flex items-center justify-center gap-2">
                                                            <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                                <p class=" hidden text-xs text-neutral-400 text-center font-normal 768max:block">
                                                    آخرین بازدید: 12:30، 1403/10/20
                                                </p>
                                            </div>
                                            <!-- item -->
                                            <div class="w-full bg-light rounded-xl p-4.5 flex flex-col gap-4.5 items-center 768max:bg-green-100">
                                                <div class="w-full grid grid-cols-[0.7fr_0.6fr_0.7fr_0.7fr_0.8fr_150px] gap-2 768max:grid-cols-[70px_1fr_70px] 1024max:grid-cols-[90px_110px_95px_1fr_95px_56px] 1280max:grid-cols-[0.7fr_0.6fr_0.7fr_0.7fr_0.8fr_56px]">
                                                    <div class=" w-full flex items-center">
                                                        <span class=" text-sm text-neutral-700 font-medium">
                                                            ادمین 1
                                                        </span>
                                                    </div>
                                                    <div class=" w-full flex items-center justify-center 768max:hidden">
                                                        <span class=" text-sm text-neutral-700 font-normal text-center">
                                                            محمد حسینی
                                                        </span>
                                                    </div>
                                                    <div class=" w-full flex items-center justify-center">
                                                        <span class=" text-sm text-neutral-700 font-normal text-center">
                                                            ویرایشگر
                                                        </span>
                                                    </div>
                                                    <div class=" w-full flex items-center justify-center 768max:hidden">
                                                        <span class=" text-xs text-neutral-400 font-normal text-center">
                                                            www.m-hoseini@gmail.com
                                                        </span>
                                                    </div>
                                                    <div class=" w-full flex items-center justify-center 768max:hidden">
                                                        <span class=" text-xs text-neutral-400 font-normal text-center">
                                                            12:30، 1403/10/20
                                                        </span>
                                                    </div>
                                                    <div class="w-full flex items-center justify-end gap-2">
                                                        <button onclick="modalController(addOReditUsers)" class="editButton flex items-center justify-center gap-2">
                                                            <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <mask id="path-1-inside-1_273_1119" fill="currentColor">
                                                                    <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                                                    </mask>
                                                                    <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_273_1119)"/>
                                                                </svg>
                                                            </div>
                                                        </button>
                                                        <button class="flex items-center justify-center gap-2">
                                                            <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                                <p class=" hidden text-xs text-neutral-400 text-center font-normal 768max:block">
                                                    آخرین بازدید: 12:30، 1403/10/20
                                                </p>
                                            </div>
                                            <!-- item -->
                                            <div class="w-full bg-light rounded-xl p-4.5 flex flex-col gap-4.5 items-center 768max:bg-green-100">
                                                <div class="w-full grid grid-cols-[0.7fr_0.6fr_0.7fr_0.7fr_0.8fr_150px] gap-2 768max:grid-cols-[70px_1fr_70px] 1024max:grid-cols-[90px_110px_95px_1fr_95px_56px] 1280max:grid-cols-[0.7fr_0.6fr_0.7fr_0.7fr_0.8fr_56px]">
                                                    <div class=" w-full flex items-center">
                                                        <span class=" text-sm text-neutral-700 font-medium">
                                                            ادمین 2
                                                        </span>
                                                    </div>
                                                    <div class=" w-full flex items-center justify-center 768max:hidden">
                                                        <span class=" text-sm text-neutral-700 font-normal text-center">
                                                            محمد حسینی
                                                        </span>
                                                    </div>
                                                    <div class=" w-full flex items-center justify-center">
                                                        <span class=" text-sm text-neutral-700 font-normal text-center">
                                                            ویرایشگر
                                                        </span>
                                                    </div>
                                                    <div class=" w-full flex items-center justify-center 768max:hidden">
                                                        <span class=" text-xs text-neutral-400 font-normal text-center">
                                                            www.m-hoseini@gmail.com
                                                        </span>
                                                    </div>
                                                    <div class=" w-full flex items-center justify-center 768max:hidden">
                                                        <span class=" text-xs text-neutral-400 font-normal text-center">
                                                            12:30، 1403/10/20
                                                        </span>
                                                    </div>
                                                    <div class="w-full flex items-center justify-end gap-2">
                                                        <button onclick="modalController(addOReditUsers)" class="editButton flex items-center justify-center gap-2">
                                                            <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <mask id="path-1-inside-1_273_1119" fill="currentColor">
                                                                    <path d="M8.62836 0.596736C8.80951 0.409812 9.02603 0.260792 9.26532 0.158354C9.50462 0.0559165 9.7619 0.00210752 10.0222 6.06786e-05C10.2825 -0.00198617 10.5406 0.04777 10.7815 0.146432C11.0223 0.245094 11.2412 0.39069 11.4252 0.574742C11.6093 0.758795 11.7549 0.977625 11.8536 1.21849C11.9522 1.45936 12.002 1.71744 11.9999 1.97772C11.9979 2.23801 11.9441 2.49528 11.8416 2.73456C11.7392 2.97385 11.5902 3.19036 11.4032 3.3715L10.6347 4.14004C10.9285 4.44618 11.0907 4.85527 11.0864 5.27959C11.0821 5.7039 10.9117 6.10963 10.6117 6.40976L9.62203 7.39889C9.58776 7.43566 9.54644 7.46516 9.50052 7.48562C9.45461 7.50607 9.40504 7.51707 9.35478 7.51796C9.30453 7.51885 9.2546 7.5096 9.208 7.49078C9.16139 7.47195 9.11905 7.44393 9.0835 7.40839C9.04796 7.37285 9.01994 7.33051 9.00111 7.2839C8.98229 7.2373 8.97304 7.18738 8.97393 7.13712C8.97482 7.08687 8.98582 7.0373 9.00628 6.99139C9.02673 6.94548 9.05623 6.90415 9.09301 6.86989L10.0822 5.88026C10.2418 5.72061 10.3334 5.50535 10.3378 5.27963C10.3422 5.0539 10.259 4.83525 10.1056 4.66954L4.02387 10.7511C3.80428 10.9706 3.53128 11.1303 3.23183 11.2142L0.474925 11.9862C0.411005 12.0041 0.343492 12.0046 0.279303 11.9877C0.215114 11.9709 0.156558 11.9373 0.109632 11.8904C0.0627074 11.8434 0.0291013 11.7849 0.0122575 11.7207C-0.00458617 11.6565 -0.00406181 11.589 0.0137767 11.5251L0.785851 8.7678C0.869696 8.46837 1.0289 8.19588 1.24899 7.9763L8.62836 0.596736Z"/>
                                                                    </mask>
                                                                    <path d="M8.62836 0.596736L9.19413 1.16248L9.20286 1.15347L8.62836 0.596736ZM11.4032 3.3715L10.8465 2.7969L10.8376 2.8058L11.4032 3.3715ZM10.6347 4.14004L10.069 3.57435L9.51474 4.12857L10.0575 4.69403L10.6347 4.14004ZM10.6117 6.40976L11.1772 6.9756L11.1775 6.9753L10.6117 6.40976ZM9.62203 7.39889L9.0565 6.83305L9.04644 6.8431L9.03675 6.8535L9.62203 7.39889ZM9.09301 6.86989L9.63837 7.45519L9.64877 7.4455L9.65882 7.43544L9.09301 6.86989ZM10.0822 5.88026L9.5165 5.31456L9.51636 5.3147L10.0822 5.88026ZM10.1056 4.66954L10.6928 4.12618L10.128 3.51584L9.53996 4.10385L10.1056 4.66954ZM3.23183 11.2142L3.01614 10.4438L3.0161 10.4438L3.23183 11.2142ZM0.474925 11.9862L0.689961 12.7568L0.690657 12.7566L0.474925 11.9862ZM0.0137767 11.5251L-0.756593 11.3094L-0.756777 11.31L0.0137767 11.5251ZM0.785851 8.7678L1.55622 8.98352L0.785851 8.7678ZM1.24899 7.9763L1.81403 8.54264L1.81469 8.54198L1.24899 7.9763ZM9.20286 1.15347C9.31016 1.04275 9.43841 0.954479 9.58016 0.8938L8.95049 -0.577091C8.61365 -0.432894 8.30885 -0.223124 8.05386 0.0400053L9.20286 1.15347ZM9.58016 0.8938C9.7219 0.833122 9.8743 0.801248 10.0285 0.800036L10.0159 -0.799915C9.6495 -0.797033 9.28734 -0.721289 8.95049 -0.577091L9.58016 0.8938ZM10.0285 0.800036C10.1827 0.798824 10.3356 0.828297 10.4782 0.886738L11.0847 -0.593874C10.7456 -0.732756 10.3823 -0.802796 10.0159 -0.799915L10.0285 0.800036ZM10.4782 0.886738C10.6209 0.94518 10.7505 1.03142 10.8596 1.14044L11.9909 0.00904529C11.7318 -0.250041 11.4238 -0.454992 11.0847 -0.593874L10.4782 0.886738ZM10.8596 1.14044C10.9686 1.24946 11.0548 1.37907 11.1133 1.52174L12.5939 0.915241C12.455 0.576176 12.25 0.268132 11.9909 0.00904529L10.8596 1.14044ZM11.1133 1.52174C11.1717 1.66441 11.2012 1.81727 11.2 1.97143L12.7999 1.98402C12.8028 1.61762 12.7327 1.25431 12.5939 0.915241L11.1133 1.52174ZM11.2 1.97143C11.1988 2.1256 11.1669 2.27798 11.1062 2.41971L12.5771 3.04942C12.7213 2.71258 12.797 2.35042 12.7999 1.98402L11.2 1.97143ZM11.1062 2.41971C11.0455 2.56144 10.9573 2.68968 10.8465 2.79697L11.9599 3.94602C12.2231 3.69104 12.4329 3.38626 12.5771 3.04942L11.1062 2.41971ZM10.8376 2.8058L10.069 3.57435L11.2003 4.70574L11.9689 3.93719L10.8376 2.8058ZM10.0575 4.69403C10.2064 4.84917 10.2886 5.05648 10.2864 5.27149L11.8863 5.28768C11.8928 4.65407 11.6506 4.04319 11.2118 3.58606L10.0575 4.69403ZM10.2864 5.27149C10.2843 5.48651 10.1979 5.69211 10.0459 5.84421L11.1775 6.9753C11.6255 6.52714 11.8799 5.92128 11.8863 5.28768L10.2864 5.27149ZM10.0462 5.84392L9.0565 6.83305L10.1876 7.96473L11.1772 6.9756L10.0462 5.84392ZM9.03675 6.8535C9.07573 6.81167 9.12272 6.77813 9.17494 6.75487L9.82611 8.21636C9.97015 8.15219 10.0998 8.05965 10.2073 7.94428L9.03675 6.8535ZM9.17494 6.75487C9.22716 6.7316 9.28352 6.71909 9.34067 6.71808L9.3689 8.31783C9.52656 8.31505 9.68206 8.28055 9.82611 8.21636L9.17494 6.75487ZM9.34067 6.71808C9.39782 6.71708 9.45459 6.72759 9.5076 6.749L8.90839 8.23256C9.05461 8.29162 9.21123 8.32062 9.3689 8.31783L9.34067 6.71808ZM9.5076 6.749C9.5606 6.77041 9.60875 6.80227 9.64918 6.84269L8.51783 7.97409C8.62934 8.08559 8.76217 8.1735 8.90839 8.23256L9.5076 6.749ZM9.64918 6.84269C9.6896 6.88311 9.72147 6.93127 9.74289 6.98428L8.25934 7.58353C8.31841 7.72975 8.40632 7.86258 8.51783 7.97409L9.64918 6.84269ZM9.74289 6.98428C9.7643 7.03729 9.77481 7.09407 9.77381 7.15124L8.17406 7.12301C8.17127 7.28068 8.20028 7.43731 8.25934 7.58353L9.74289 6.98428ZM9.77381 7.15124C9.7728 7.2084 9.76029 7.26477 9.73701 7.317L8.27554 6.66578C8.21135 6.80983 8.17684 6.96534 8.17406 7.12301L9.77381 7.15124ZM9.73701 7.317C9.71375 7.36922 9.6802 7.41622 9.63837 7.45519L8.54764 6.28459C8.43226 6.39209 8.33972 6.52174 8.27554 6.66578L9.73701 7.317ZM9.65882 7.43544L10.648 6.44581L9.51636 5.3147L8.52719 6.30433L9.65882 7.43544ZM10.6479 6.44595C10.9537 6.14008 11.1293 5.72763 11.1377 5.29512L9.53797 5.26413C9.5376 5.28308 9.52991 5.30115 9.5165 5.31456L10.6479 6.44595ZM11.1377 5.29512C11.146 4.86262 10.9866 4.44368 10.6928 4.12618L9.51847 5.2129C9.53135 5.22682 9.53834 5.24518 9.53797 5.26413L11.1377 5.29512ZM9.53996 4.10385L3.4582 10.1854L4.58954 11.3168L10.6713 5.23524L9.53996 4.10385ZM3.4582 10.1854C3.33577 10.3078 3.18331 10.397 3.01614 10.4438L3.44753 11.9846C3.87925 11.8637 4.27278 11.6335 4.58954 11.3168L3.4582 10.1854ZM3.0161 10.4438L0.259193 11.2159L0.690657 12.7566L3.44756 11.9845L3.0161 10.4438ZM0.259889 11.2157C0.332576 11.1954 0.409351 11.1948 0.482348 11.2139L0.0762589 12.7615C0.277634 12.8144 0.489435 12.8127 0.689961 12.7568L0.259889 11.2157ZM0.482348 11.2139C0.555346 11.2331 0.62194 11.2713 0.675306 11.3247L-0.456041 12.4561C-0.308825 12.6033 -0.125118 12.7087 0.0762589 12.7615L0.482348 11.2139ZM0.675306 11.3247C0.728673 11.378 0.766898 11.4446 0.786058 11.5176L-0.761543 11.9238C-0.708696 12.1252 -0.603258 12.3089 -0.456041 12.4561L0.675306 11.3247ZM0.786058 11.5176C0.805217 11.5907 0.80462 11.6674 0.78433 11.7401L-0.756777 11.31C-0.812744 11.5106 -0.814389 11.7224 -0.761543 11.9238L0.786058 11.5176ZM0.784146 11.7408L1.55622 8.98352L0.0154816 8.55209L-0.756592 11.3094L0.784146 11.7408ZM1.55622 8.98352C1.60309 8.81612 1.69183 8.66456 1.81403 8.54264L0.683964 7.40996C0.365977 7.72721 0.136299 8.12062 0.0154816 8.55209L1.55622 8.98352ZM1.81469 8.54198L9.19406 1.16241L8.06267 0.0310582L0.683302 7.41062L1.81469 8.54198Z" fill="currentColor" mask="url(#path-1-inside-1_273_1119)"/>
                                                                </svg>
                                                            </div>
                                                        </button>
                                                        <button class="flex items-center justify-center gap-2">
                                                            <div class=" w-6 aspect-square rounded-[6px] bg-green-300 flex items-center justify-center text-light">
                                                                <svg class=" w-[13px] text-inherit" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.25 6.33333V10.3333M5.75 6.33333V10.3333M3.25 3.66667V11.6667C3.25 12.0203 3.3817 12.3594 3.61612 12.6095C3.85054 12.8595 4.16848 13 4.5 13H9.5C9.83152 13 10.1495 12.8595 10.3839 12.6095C10.6183 12.3594 10.75 12.0203 10.75 11.6667V3.66667M2 3.66667H12M3.875 3.66667L5.125 1H8.875L10.125 3.66667" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                                <p class=" hidden text-xs text-neutral-400 text-center font-normal 768max:block">
                                                    آخرین بازدید: 12:30، 1403/10/20
                                                </p>
                                            </div>
                                        </div>
                                        <!-- add button -->
                                        <div class="w-full">
                                            <button onclick="modalController(addOReditUsers)" class=" w-full flex items-center gap-3 py-[21px] px-4.5 bg-green-300 rounded-xl 768max:bg-[#8CB39880]">
                                                <svg class=" w-4.5 text-green-600" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 18C4.02353 18 0 13.9765 0 9C0 4.02353 4.02353 0 9 0C13.9765 0 18 4.02353 18 9C18 13.9765 13.9765 18 9 18ZM9 1.05882C4.60588 1.05882 1.05882 4.60588 1.05882 9C1.05882 13.3941 4.60588 16.9412 9 16.9412C13.3941 16.9412 16.9412 13.3941 16.9412 9C16.9412 4.60588 13.3941 1.05882 9 1.05882Z" fill="currentColor"/>
                                                    <path d="M4.23535 8.47046H13.7648V9.52928H4.23535V8.47046Z" fill="currentColor"/>
                                                    <path d="M8.4707 4.23523H9.52953V13.7646H8.4707V4.23523Z" fill="currentColor"/>
                                                </svg>
                                                <span class=" text-sm text-green-600 font-normal">
                                                    افزودن کاربر جدید
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordiion w-full flex flex-col">
                                <!-- button -->
                                <div class="accordiion-button w-full flex items-center py-3 px-4.5 bg-light gap-2">
                                    <svg class=" w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class=" text-base font-medium">
                                        اتصال به درگاه پرداخت
                                    </span>
                                </div>
                                <!-- content -->
                                <div class="accordiion-content w-full flex flex-col gap-4.5 p-4.5 bg-light overflow-hidden">
                                    <div class="w-full grid grid-cols-[1fr_593px] gap-2 768max:grid-cols-1 1280max:grid-cols-[1fr_363px]">
                                        <!-- کارت به کارت -->
                                        <div class="w-full flex flex-col gap-4.5 p-4.5 rounded-xl bg-neutral-50">
                                            <!-- header -->
                                            <div class="flex items-center gap-[9px]">
                                                <input class="hidden" type="radio" id="paymentMethod-1" name="paymentMethod" checked>
                                                <label for="paymentMethod-1" class="radio-label flex items-center justify-center w-4.5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                    <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                    </div>
                                                </label>
                                                <label for="paymentMethod-1" class=" text-xs text-neutral-700 font-normal">
                                                    پرداخت از طریق کارت به کارت
                                                </label>
                                            </div>
                                            <!-- inputs -->
                                            <div class="w-full flex flex-col gap-2">
                                                <div class="w-full flex flex-col gap-2">
                                                    <label for="" class=" text-xs text-neutral-700 font-normal">
                                                        شماره کارت:
                                                    </label>
                                                    <input id="" name="" placeholder="XXXX-XXXX-XXXX-XXXX" type="text" class="cardIDinput w-full rounded-[6px] bg-light text-[12px] text-black text-center font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400">
                                                </div>
                                                <div class="w-full flex flex-col gap-2">
                                                    <label for="" class=" text-xs text-neutral-700 font-normal">
                                                        به نام:
                                                    </label>
                                                    <input id="" name="" placeholder="" type="text" class=" w-full rounded-[6px] bg-light text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-none focus:border-[1px] focus:border-neutral-400">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- درگاه پرداخت -->
                                        <div class="w-full flex flex-col gap-4.5 p-4.5 rounded-xl bg-neutral-50">
                                            <!-- header -->
                                            <div class="flex items-center gap-[9px]">
                                                <input class="hidden" type="radio" id="paymentMethod-2" name="paymentMethod">
                                                <label for="paymentMethod-2" class="radio-label flex items-center justify-center w-4.5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                    <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                    </div>
                                                </label>
                                                <label for="paymentMethod-2" class=" text-xs text-neutral-700 font-normal">
                                                    پرداخت از طریق درگاه پرداخت
                                                </label>
                                            </div>
                                            <!-- body -->
                                            <div class="w-full grid grid-cols-minmax70.97 gap-4.5 512max:grid-cols-3 512max:gap-[11px] 640max:grid-cols-4 768max:grid-cols-5">
                                                <div class=" w-full aspect-square bg-light relative rounded-[6px] overflow-hidden">
                                                    <img class=" w-full h-full object-contain" src="../../../public/public/images/darvishiLogo.png" alt="#">
                                                    <span class=" flex items-center justify-center px-2 h-[17px] text-[10px] text-light font-normal text-center absolute z-[2] top-1 right-1 bg-green-600 rounded-[20px]">
                                                        فعال
                                                    </span>
                                                </div>
                                                <div class=" w-full aspect-square bg-light relative rounded-[6px] overflow-hidden">
                                                    <img class=" w-full h-full object-contain" src="../../../public/public/images/darvishiLogo.png" alt="#">
                                                    <span class=" flex items-center justify-center px-2 h-[17px] text-[10px] text-light font-normal text-center absolute z-[2] top-1 right-1 bg-green-600 rounded-[20px]">
                                                        فعال
                                                    </span>
                                                </div>
                                                <div class=" w-full aspect-square bg-light relative rounded-[6px] overflow-hidden">
                                                    <img class=" w-full h-full object-contain" src="../../../public/public/images/darvishiLogo.png" alt="#">
                                                    <span class=" flex items-center justify-center px-2 h-[17px] text-[10px] text-light font-normal text-center absolute z-[2] top-1 right-1 bg-green-600 rounded-[20px]">
                                                        فعال
                                                    </span>
                                                </div>
                                                <div class=" w-full aspect-square bg-light relative rounded-[6px] overflow-hidden">
                                                    <img class=" w-full h-full object-contain" src="../../../public/public/images/darvishiLogo.png" alt="#">
                                                    <span class=" flex items-center justify-center px-2 h-[17px] text-[10px] text-light font-normal text-center absolute z-[2] top-1 right-1 bg-green-600 rounded-[20px]">
                                                        فعال
                                                    </span>
                                                </div>
                                                <div class=" w-full aspect-square bg-light relative rounded-[6px] overflow-hidden">
                                                    <img class=" w-full h-full object-contain" src="../../../public/public/images/darvishiLogo.png" alt="#">
                                                    <span class=" flex items-center justify-center px-2 h-[17px] text-[10px] text-light font-normal text-center absolute z-[2] top-1 right-1 bg-green-600 rounded-[20px]">
                                                        فعال
                                                    </span>
                                                </div>
                                                <div class=" w-full aspect-square bg-light relative rounded-[6px] overflow-hidden">
                                                    <img class=" w-full h-full object-contain" src="../../../public/public/images/darvishiLogo.png" alt="#">
                                                    <span class=" flex items-center justify-center px-2 h-[17px] text-[10px] text-light font-normal text-center absolute z-[2] top-1 right-1 bg-[#ff0000] rounded-[20px]">
                                                        غیر فعال
                                                    </span>
                                                </div>
                                                <div class=" w-full aspect-square bg-light relative rounded-[6px] overflow-hidden">
                                                    <img class=" w-full h-full object-contain" src="../../../public/public/images/darvishiLogo.png" alt="#">
                                                    <span class=" flex items-center justify-center px-2 h-[17px] text-[10px] text-light font-normal text-center absolute z-[2] top-1 right-1 bg-[#ff0000] rounded-[20px]">
                                                        غیر فعال
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- buttons -->
                        <div class="w-full flex items-center gap-4.5 justify-end p-4.5 bg-light rounded-xl">
                            <button type="submit" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                                ذخیره
                            </button>
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
<div class="addOReditUsers modal w-[100vw] h-[100vh] fixed z-[15] top-0 left-0 bg-[#0000002c] px-6 py-4">
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
                        <button onclick="modalController(addOReditUsers)" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-300 transition-all duration-400 ease-out hover:bg-green-100 hover:text-green-600 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                            بازگشت
                        </button>
                        <button type="submit" onclick="modalController(addOReditUsers)" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                            ذخیره
                        </button>
                    </div>
                </form>
            </div>
        </div>
@endsection
