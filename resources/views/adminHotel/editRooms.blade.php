@extends('layouts.adminHotel')
@section('content')
    <div class="w-full h-full overflow-auto noscrollbar flex flex-col gap-7 1024max:pt-[76px] 1024max:gap-0">
        <div class="w-full items-center py-[18px] px-[25px] bg-light hidden 768max:flex">
            <h3 class=" text-base text-green-300 font-medium font-farsi-medium">
                مدیریت اتاق ها
            </h3>
        </div>
        <main class=" w-full h-full p-4.5 rounded-xl bg-neutral-50 overflow-auto flex flex-col gap-4.5 768max:rounded-none 768max:px-[25px]">
            <div class="w-full">
                <div class="w-full flex flex-col gap-4.5">
                    <!-- header -->
                    <div class="w-full rounded-xl flex items-center justify-between px-4.5 py-[11px] bg-light 768max:hidden">
                        <h5 class=" text-base text-green-300 font-medium font-farsi-medium">
                            مدیریت اتاق ها
                        </h5>
                        <div class=""></div>
                    </div>
                    <!-- body -->
                    <form id="storeRoomForm" action="{{ isset($room) ? route('hotel.updateRoom', [$sharedData->id, $room->id]) : route('hotel.storeRoom', $sharedData->id) }}" method="post" enctype="multipart/form-data" class="w-full flex flex-col gap-10 ">
                        @csrf
                        @if(isset($room))
                            @method('PUT')
                        @endif
                        <div class="w-full grid grid-cols-497-1fr gap-[10px] items-start 640max:grid-cols-1 768max:grid-cols-270-1fr 1280max:grid-cols-350-1fr">
                            <!-- images -->
                            <div class="edit-room-image-container w-full grid grid-cols-2 content-start gap-x-[14px] gap-y-[12px] 768max:gap-y-2 768max:gap-x-2">
                                @if(isset($room))
                                    @foreach($room->files as $index => $file)
                                        <!-- item -->
                                        <a href="#" class="edit-room-image w-full @if($index == 0) aspect-497/335 @else aspect-241/163 @endif rounded-[14px]">
                                            <img src="{{ asset('storage/' . $file->address) }}" alt="#" class="w-full h-full object-cover rounded-[14px]">
                                        </a>
                                    @endforeach
                                @endif
                                <!-- add image button -->
                                <a onclick="modalController(addImagePopUp)" class="edit-room-image-button w-full aspect-241/163 flex items-center justify-center gap-3 bg-[#255346CC] rounded-[14px] 768max:flex-col">
                                    <svg class=" w-5 text-light" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class=" text-sm text-light font-normal font-farsi-regular 768max:text-xs">
                                        افزودن عکس دیگر
                                    </span>
                                </a>
                            </div>
                            <!-- body -->
                            <div class="w-full h-[510px] bg-light rounded-xl p-4.5 flex flex-col gap-4.5 relative overflow-hidden 640max:h-auto 768max:h-[280px] 1280max:h-[361px]">
                                <div class="w-full h-full max-h-full pb-[76px] flex flex-col flex-grow-[1] overflow-auto">
                                    <!-- room name -->
                                    <div class="w-full flex flex-col gap-[9px] mb-[21px]">
                                        <label for="" class=" text-sm text-neutral-700 font-normal font-farsi-regular">
                                            عنوان اتاق :
                                        </label>
                                        <input name="title" type="text" placeholder="عنوان اتاق" class=" bg-neutral-50 rounded-[6px] px-4.5 py-2 text-sm text-neutral-700 font-medium font-farsi-medium focus:border-neutral-400 focus:border-[1px] focus:outline-none" value="{{ isset($room) ? $room->title : '' }}">
                                    </div>
                                    <!-- room type -->
                                    <div class="w-full flex items-center gap-2 mb-4.5 1024max:flex-col 1024max:items-start">
                                        <span class="text-sm text-neutral-700 font-normal font-farsi-regular flex-shrink-[0]">
                                            نوع اتاق
                                        </span>
                                        <div class="w-full flex-grow-[1] flex items-center gap-2 flex-wrap">
                                            <label for="room-type-1" class="checkbox-item-button h-[30px] transition-all duration-200 ease-out px-5 py-[4.5] rounded-[20px] bg-neutral-50 flex-shrink-[0] flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                                <input class="hidden" type="radio" id="room-type-1" name="room-type" value="استاندارد" {{ isset($room) && $room->type == 'standard' ? 'checked' : '' }}>
                                                <span>
                                                    اتاق استاندارد
                                                </span>
                                            </label>
                                            <label for="room-type-2" class="checkbox-item-button h-[30px] transition-all duration-200 ease-out px-5 py-[4.5] rounded-[20px] bg-neutral-50 flex-shrink-[0] flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                                <input class="hidden" type="radio" id="room-type-2" name="room-type" value="خانوادگی" {{ isset($room) && $room->type == 'family' ? 'checked' : '' }}>
                                                <span>
                                                    اتاق خانوادگی
                                                </span>
                                            </label>
                                            <label for="room-type-3" class="checkbox-item-button h-[30px] transition-all duration-200 ease-out px-5 py-[4.5] rounded-[20px] bg-neutral-50 flex-shrink-[0] flex items-center justify-center text-xs text-neutral-200 font-normal font-farsi-regular">
                                                <input class="hidden" type="radio" id="room-type-3" name="room-type" value="سوئیت" {{ isset($room) && $room->type == 'suite' ? 'checked' : '' }}>
                                                <span>
                                                    سوئیت
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- bed -->
                                    <div class="w-full flex flex-col gap-[20px] mb-[30px]">
                                        <div class="w-full flex flex-col gap-[13px]">
                                            <span class="text-sm text-neutral-700 font-normal font-farsi-regular flex-shrink-[0]">تعداد تخت</span>
                                            <div class="bedItemsContainer flex flex-col gap-2">
                                                <!-- Single Bed -->
                                                <div class="w-full flex items-center gap-3">
                                                    <div class="flex">
                                                        <button type="button" onclick="addOrDeleteBed('add', singlebedCountInput)" class="flex items-center justify-center bg-neutral-50 w-[25px] h-[30px]">
                                                            <svg class="w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                        <input id="singlebedCountInput" name="single_beds" class="w-[30px] [h-30px] bg-neutral-50 text-xs text-neutral-700 font-normal font-farsi-regular text-center focus:outline-none" value="{{ isset($room) ? $room->single_beds : 1 }}" type="text" readonly>
                                                        <button type="button" onclick="addOrDeleteBed('delete', singlebedCountInput)" class="flex items-center justify-center bg-neutral-50 w-[25px] h-[30px]">
                                                            <svg class="w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                                <path fill-rule="evenodd" d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <span class="text-xs text-neutral-700 font-normal font-farsi-regular">تخت سینگل</span>
                                                </div>
                                                <!-- Double Bed -->
                                                <div class="w-full flex items-center gap-3">
                                                    <div class="flex">
                                                        <button type="button" onclick="addOrDeleteBed('add', doublebedCountInput)" class="flex items-center justify-center bg-neutral-50 w-[25px] h-[30px]">
                                                            <svg class="w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                        <input id="doublebedCountInput" name="double_beds" class="w-[30px] [h-30px] bg-neutral-50 text-xs text-neutral-700 font-normal font-farsi-regular text-center focus:outline-none" value="{{ isset($room) ? $room->double_beds : 1 }}" type="text" readonly>
                                                        <button type="button" onclick="addOrDeleteBed('delete', doublebedCountInput)" class="flex items-center justify-center bg-neutral-50 w-[25px] h-[30px]">
                                                            <svg class="w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                                <path fill-rule="evenodd" d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <span class="text-xs text-neutral-700 font-normal font-farsi-regular">تخت دبل</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- services -->
                                    <div class="w-full flex flex-wrap gap-x-4.5 gap-y-5 mb-[25px]">
                                        @foreach($sharedData->facilities as $facilities)
                                            @if($facilities->type == 3)
                                                <div class="flex items-center gap-[9px]">
                                                    <input class="hidden" type="checkbox" id="service-{{$facilities->id}}" name="service[]" value="{{$facilities->id}}" {{ isset($room) && in_array($facilities->id, $room->services) ? 'checked' : '' }}>
                                                    <label for="service-{{$facilities->id}}" class="radio-label flex items-center justify-center w-4.5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                        <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                        </div>
                                                    </label>
                                                    <label for="service-{{$facilities->id}}" class=" text-xs text-neutral-700 font-normal">
                                                        {{ $facilities->title }}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- caption -->
                                    <div class="w-full">
                                        <textarea name="description" id="" class=" w-full text-xs text-neutral-700 rounded-[6px] bg-neutral-50 font-normal min-h-[56px] h-auto placeholder:text-neutral-400 focus:border-neutral-400 focus:border-[1px] focus:outline-none px-[6px] py-1" placeholder="توضیحات">{{ isset($room) ? $room->description : '' }}</textarea>
                                    </div>
                                </div>
                                <!-- buttons -->
                                <div class="w-full flex bg-light items-center justify-end gap-4.5 p-4.5 absolute z-[2] bottom-0 left-0 512max:px-[41px]">
                                    <a href="{{ route('hotel.manageRooms') }}" class="editHotelInfoPopUpReturnButton rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-300 transition-all duration-400 ease-out hover:bg-green-100 hover:text-green-600 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                                        بازگشت
                                    </a>
                                    <button type="submit" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                                        ذخیره
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <!-- modals -->
    <!-- پاپ اپ گالری تصاویر -->
    <div class="roomsNewImage modal w-[100vw] h-[100vh] fixed z-[15] top-0 left-0 bg-[#0000002c] px-6 py-4">
        <div class="modal-content w-full h-full flex items-center justify-center">
            <form id="imageUploadForm" class="w-full max-w-[800px] p-4.5 bg-light rounded-xl flex flex-col">
                <div class="w-full flex flex-col gap-8 max-h-[500px] overflow-y-auto">
                    <!-- header -->
                    <div class="w-full py-[13px] px-4.5 rounded-xl bg-neutral-50">
                        <h6 class="text-[14px] text-green-600 font-normal font-farsi-regular">
                            افزودن عکس جدید
                        </h6>
                    </div>
                    <!-- body -->
                    <div class="w-full flex flex-col gap-4.5 px-4.5 640max:px-0">
                        <!-- input -->
                        <div class="w-full flex flex-col gap-2">
                            <label for="imageTitle" class="text-sm text-neutral-700 font-normal font-farsi-regular">
                                عنوان عکس:
                            </label>
                            <div class="w-full flex items-center gap-2 768max:flex-col 768max:items-start">
                                <input type="text" id="imageTitle" class="w-[313px] rounded-xl bg-neutral-50 text-[12px] text-black font-normal font-farsi-regular py-2 px-4.5 placeholder:text-neutral-400 focus:outline-0 focus:border-[0px] 640max:w-full">
                                <p class="text-xs text-neutral-400 font-normal font-farsi-regular">
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
                                <label class="text-green-600 underline cursor-pointer" for="fileInput">
                                    مدیریت فایل ها
                                </label>
                                بارگذاری کنید
                            </p>
                            <!-- پیش‌نمایش تصویر -->
                            <img id="imagePreview" class="hidden w-full h-full object-cover rounded-[14px]" src="#" alt="پیش‌نمایش تصویر">
                            <input class="hidden" id="fileInput" type="file" accept="image/jpg" onchange="handleFileSelect(event)">
                        </div>
                    </div>
                </div>
                <div class="w-full flex items-center justify-end gap-4.5 pt-4.5">
                    <button type="button" onclick="modalController(addImagePopUp)" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-300 transition-all duration-400 ease-out hover:bg-green-100 hover:text-green-600 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                        بازگشت
                    </button>
                    <button type="button" onclick="saveImage()" class="rounded-[6px] flex items-center justify-center py-2 px-4 min-w-[140px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:min-w-[0px] 512max:flex-grow-[1] 512max:px-2">
                        ذخیره
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // تابع برای نمایش پیش‌نمایش تصویر
        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imagePreview = document.getElementById('imagePreview');
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    document.querySelector('.dropAreaText').classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function saveImage() {
            const imagePreview = document.getElementById('imagePreview');
            const fileInput = document.getElementById('fileInput');
            const editRoomImageContainer = document.querySelector('.edit-room-image-container');
            const form = document.getElementById('storeRoomForm'); // فرم اصلی

            if (imagePreview.src !== '') {
                // ایجاد یک کپی از input فایل
                const newFileInput = fileInput.cloneNode(true);
                newFileInput.name = 'files[]';
                newFileInput.classList.add('hidden');

                // ایجاد عنصر جدید برای نمایش تصویر
                const newImageContainer = document.createElement('a');
                newImageContainer.href = '#';
                newImageContainer.classList.add('edit-room-image', 'w-full', 'aspect-241/163', 'rounded-[14px]');

                const newImage = document.createElement('img');
                newImage.src = imagePreview.src;
                newImage.classList.add('w-full', 'h-full', 'object-cover', 'rounded-[14px]');

                newImageContainer.appendChild(newImage);

                // اضافه کردن عناصر جدید به بخش edit-room-image-container
                editRoomImageContainer.insertBefore(newImageContainer, editRoomImageContainer.lastElementChild);

                // اضافه کردن input فایل به فرم اصلی
                form.appendChild(newFileInput);
            }

            // خالی کردن مقدار imagePreview و input فایل
            imagePreview.src = '';
            imagePreview.classList.add('hidden');
            fileInput.value = '';

            // نمایش دوباره متن dropAreaText
            const dropAreaText = document.querySelector('.dropAreaText');
            if (dropAreaText) {
                dropAreaText.classList.remove('hidden');
            }

            // بستن مودال
            modalController(addImagePopUp);
        }

    </script>
    <script src="{{ asset('src/scripts/editRooms.js') }}"></script>
@endsection
