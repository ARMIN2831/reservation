@extends('layouts.userHotel')
@section('content')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
            <form class="w-full flex flex-col max-w-[1440px] justify-center gap-8" action="{{ route('hotelBooking.results') }}" method="get">
                @csrf
                <!-- فیلتر جستجو -->
                <section class=" z-[2] w-full flex max-w-[1440px] px-[100px] -mt-[120px] justify-center drop-shadow-materialShadow1 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
                    <div class="w-full rounded-xl bg-light relative py-[25px] px-4.5 768max:px-4.5 768max:py-[30px]">
                        <div class="travelTypeSelectionTabContents w-full h-full">
                            <div class="w-full h-full flex flex-col justify-end gap-[22px]">
                                <div class="w-full grid grid-cols-[1fr_280px_0.5fr_0.5fr_0.5fr] gap-5 items-end 1150max:grid-cols-2 1150max:content-start 640max:justify-items-center 640max:grid-cols-1 512max:gap-[14px]">
                                    <div class="w-full flex flex-col gap-[6px] relative" x-data="{ destination: '', suggestions: [], showSuggestions: false }">
                                        <label for="destination" class="text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                            مقصد:
                                        </label>
                                        <input
                                            id="destination"
                                            type="text"
                                            name="destination"
                                            value="{{ request('destination') }}"
                                            placeholder="مقصد یا نام هتل (داخلی یا خارجی)"
                                            class="h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-[6px] bg-neutral-50 focus:outline-none 768max:h-12"
                                            oninput="fetchSuggestions(this.value)"
                                            onfocusout="setTimeout(() => toggleSuggestion('none'), 200)"
                                            onfocusin="toggleSuggestion('block')"
                                        />
                                        <input value="{{ request('hotel_id') }}" id="hotel_id" type="hidden" name="hotel_id">
                                        <ul id="suggestions-list" class="suggestions-list mt-2 bg-neutral-50 text-neutral-700 text-sm w-full absolute" style="top: 90px;display: none"></ul>
                                    </div>

                                    <div class="w-full flex flex-col gap-[6px]">
                                        <label for="dateRange" class="text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                            تاریخ صفر:
                                        </label>
                                        <input
                                            id="dateRange"
                                            type="text"
                                            name="dates"
                                            value="{{ request('dates') }}"
                                            placeholder="تاریخ ورود و خروج"
                                            onchange="convertDateRange(this.value)"
                                            class="h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-[6px] bg-neutral-50 focus:outline-none 768max:h-12"
                                        />
                                    </div>

                                    <div class="w-full flex flex-col gap-[6px]" x-data="passengerModal()">
                                        <label for="passengers" class="text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                            مسافران:
                                        </label>
                                        <input
                                            id="passengers"
                                            type="text"
                                            placeholder="1 بزرگسال، 1 اتاق"
                                            class="h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-[6px] bg-neutral-50 focus:outline-none 768max:h-12"
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
                                        <div x-show="isPassengerModalOpen" @click.away="isPassengerModalOpen = false" class="passenger-modal-overlay">
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
                                    <div class=" h-[60px] text-black font-normal text-sm rounded-[6px] focus:outline-none focus:border-[1px] focus:border-neutral-400 block w-full p-2.5 768max:h-12"></div>
                                    {{--<select class="bg-neutral-50 h-[60px] text-black font-normal text-sm rounded-[6px] focus:outline-none focus:border-[1px] focus:border-neutral-400 block w-full p-2.5 768max:h-12">
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
                                    </select>--}}
                                    <button class=" w-full h-[60px] flex items-center justify-center flex-grow-[1] px-4 text-light text-[18px] font-medium text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:max-w-[200px] 640max:mt-4 640max:self-center 640max:self-center 768max:h-12">
                                        جستجو
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- نمایش مپ -->
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
                <!-- فیلتر منو بالا -->
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
                                        <input value="default" class="hidden" type="radio" id="sorting-1" name="sorting" @if(request('sorting') and request('sorting') == 'default') checked @endif>
                                        <span>
                                        پیشفرض
                                    </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="sorting-2" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal 640max:h-7">
                                        <input value="minPrice" class="hidden" type="radio" id="sorting-2" name="sorting" @if(request('sorting') and request('sorting') == 'minPrice') checked @endif>
                                        <span>
                                        کمترین قیمت
                                    </span>
                                    </label>
                                </div>
                                <div class="flex-shrink-[0]">
                                    <label for="sorting-3" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-neutral-50 flex items-center justify-center text-xs text-neutral-200 font-normal 640max:h-7">
                                        <input value="maxPrice" class="hidden" type="radio" id="sorting-3" name="sorting" @if(request('sorting') and request('sorting') == 'maxPrice') checked @endif>
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



                            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

                            <a href="#" id="showHotelsOnMap" class="flex items-center gap-2">
                                <svg class="w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                </svg>
                                <span class="text-sm text-green-600 font-medium">
        نمایش هتل ها روی نقشه
    </span>
                            </a>

                            <!-- مودال با Tailwind CSS -->
                            <div id="hotelsMapModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
                                <div class="absolute inset-0 bg-black bg-opacity-50"></div>

                                <div class="relative bg-white rounded-lg w-full max-w-4xl mx-4 max-h-[90vh] flex flex-col">
                                    <div class="p-4 border-b flex justify-between items-center">
                                        <h3 class="text-lg font-bold">نقشه هتل‌ها</h3>
                                        <a id="closeMapModal" class="text-gray-500 hover:text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>
                                    </div>

                                    <div class="p-4 flex-1 overflow-hidden">
                                        <div id="hotelsMap" style="height: 60vh" class="w-full"></div>
                                    </div>

                                    <div class="p-4 border-t flex justify-end">
                                        <a id="confirmCloseMapModal" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">
                                            بستن
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <script>
                                // مدیریت مودال با جاوااسکریپت خالص
                                const mapModal = document.getElementById('hotelsMapModal');
                                const showMapBtn = document.getElementById('showHotelsOnMap');
                                const closeMapBtn = document.getElementById('closeMapModal');
                                const confirmCloseBtn = document.getElementById('confirmCloseMapModal');

                                let map; // متغیر جهانی برای نقشه

                                function openMapModal() {
                                    mapModal.classList.remove('hidden');
                                    document.body.style.overflow = 'hidden';

                                    // ایجاد نقشه پس از نمایش مودال
                                    setTimeout(() => {
                                        initMap();
                                    }, 50);
                                }

                                function closeMapModal() {
                                    mapModal.classList.add('hidden');
                                    document.body.style.overflow = 'auto';

                                    // حذف نقشه هنگام بستن مودال
                                    if (map) {
                                        map.remove();
                                        map = null;
                                    }
                                }

                                function initMap() {
                                    // ایجاد نقشه
                                    map = L.map('hotelsMap').setView([35.6892, 51.3890], 12);

                                    // اضافه کردن لایه نقشه
                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                    }).addTo(map);

                                    // دریافت داده‌های هتل‌ها
                                    const hotelsData = @json($hotels->map(function($hotel) {
                                            return [
                                                'name' => $hotel->title,
                                                'address' => $hotel->address,
                                                'mapAddress' => json_decode($hotel->mapAddress)
                                            ];
                                        }));

                                    const markers = [];

                                    hotelsData.forEach(hotel => {
                                        if (hotel.mapAddress) {
                                            const marker = L.marker([hotel.mapAddress[0], hotel.mapAddress[1]]).addTo(map);
                                            marker.bindPopup(`<b>${hotel.name}</b><br>${hotel.address}`);
                                            markers.push(marker);
                                        }
                                    });

                                    if (markers.length > 0) {
                                        const group = new L.featureGroup(markers);
                                        map.fitBounds(group.getBounds().pad(0.1));
                                    }
                                }

                                // رویدادهای کلیک
                                showMapBtn.addEventListener('click', (e) => {
                                    e.preventDefault();
                                    openMapModal();
                                });

                                closeMapBtn.addEventListener('click', closeMapModal);
                                confirmCloseBtn.addEventListener('click', closeMapModal);

                                // بستن مودال با کلیک خارج از آن
                                mapModal.addEventListener('click', (e) => {
                                    if (e.target === mapModal) {
                                        closeMapModal();
                                    }
                                });
                            </script>




                            <div class="w-full flex flex-col items-center bg-[#ADADAD33] gap-[1px] rounded-xl overflow-hidden">
                                <!-- تعداد نتایج -->
                                <div class="w-full p-4.5 bg-neutral-50 flex flex-col gap-4.5">
                                    <div class="flex items-center gap-1">
                                    <span class=" text-sm text-neutral-700 font-normal">
                                        نتایج:
                                    </span>
                                        <span class=" text-sm text-neutral-700 font-normal">
                                        {{ count($hotels) }}
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
                                                <input value="5" class="hidden" type="checkbox" id="hotelStart-1" name="hotelStar[]"  @if(request('hotelStar') and in_array(5,request('hotelStar'))) checked @endif>
                                                <span>
                                                پنج ستاره
                                            </span>
                                            </label>
                                        </div>
                                        <div class="flex-shrink-[0]">
                                            <label for="hotelStart-2" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-light flex items-center justify-center text-xs text-neutral-400 font-normal font-farsi-regular">
                                                <input value="4" class="hidden" type="checkbox" id="hotelStart-2" name="hotelStar[]" @if(request('hotelStar') and in_array(4,request('hotelStar'))) checked @endif>
                                                <span>
                                                چهار ستاره
                                            </span>
                                            </label>
                                        </div>
                                        <div class="flex-shrink-[0]">
                                            <label for="hotelStart-3" class="checkbox-item-button h-[32px] transition-all duration-200 ease-out px-[14px] rounded-[20px] bg-light flex items-center justify-center text-xs text-neutral-400 font-normal font-farsi-regular">
                                                <input value="3" class="hidden" type="checkbox" id="hotelStart-3" name="hotelStar[]" @if(request('hotelStar') and in_array(3,request('hotelStar'))) checked @endif>
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
                                            <input name="minRange" id="rangeInput1" dir="ltr" type="range" min="0" max="100"  @if(request('minRange')) value="{{ request('minRange') }}" @else value="0" @endif class="pricingRangeInput w-full z-[4] appearance-none outline-none bg-transparent absolute bottom-0 top-0 my-auto mx-auto right-0">
                                            <input name="maxRange" id="rangeInput2" dir="ltr" type="range" min="0" max="100"  @if(request('maxRange')) value="{{ request('maxRange') }}" @else value="90" @endif class="pricingRangeInput w-full z-[4] appearance-none outline-none bg-transparent absolute bottom-0 top-0 my-auto mx-auto right-0 mt-4">
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
                                        @foreach($facilities as $facility)
                                            <div class="flex items-center gap-[9px]">
                                                <input @if(request('facilities') and in_array($facility->id,request('facilities'))) checked @endif value="{{ $facility->id }}" class=" hidden" type="checkbox" id="hotelAttributes-1-{{ $facility->id }}" name="facilities[]">
                                                <label for="hotelAttributes-1-{{ $facility->id }}" class=" w-4.5 aspect-square bg-light rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                                    <svg class=" w-[12px] text-green-300" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </label>
                                                <label for="hotelAttributes-1-1" class=" text-xs text-neutral-700 font-normal font-farsi-regular">
                                                    {{ $facility->title }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <button class=" w-full h-[60px] flex items-center justify-center flex-grow-[1] px-4 text-light text-[18px] font-medium text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:max-w-[200px] 640max:mt-4 640max:self-center 640max:self-center 768max:h-12">
                                    اعمال فیلترها
                                </button>
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
                                                <span onclick="openMapModal()">
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
                                    @php $q = request()->query();$q['hotelId'] = $hotel->id; @endphp
                                    <a href="{{ route('hotelBooking.showDescription',$q) }}" class="rounded-[6px] w-full flex items-center justify-center py-2 px-4 h-10 max-w-[160px] text-[14px] text-light font-medium font-farsi-medium bg-green-600 transition-all duration-400 ease-out hover:bg-green-300 512max:text-xs 512max:h-8 512max:max-w-max 512max:px-4">
                                        جزئیات و رزرو
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
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
    <link href="https://bgsrb.github.io/flatpickr-jalali/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://bgsrb.github.io/flatpickr-jalali/examples/jalali/jdate.min.js"></script>
    <script>window.Date=window.JDate;</script>
    <script src="https://bgsrb.github.io/flatpickr-jalali/dist/flatpickr.min.js"></script>
    <script src="https://bgsrb.github.io/flatpickr-jalali/dist/plugins/rangePlugin.js"></script>
    <script src="https://bgsrb.github.io/flatpickr-jalali/dist/l10n/fa.js"></script>

    {{-- destination filter --}}
    <style>
        .suggestions-list {
            list-style: none;
            padding: 0;
            margin: 0;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-height: 200px;
            overflow-y: auto;
        }

        .destination-item {
            display: flex;
            align-items: center;
            border: 0 solid rgba(0, 0, 0, .12);
            border-top-width: 1px;
            height: 56px;
            margin: 0 .875rem;
            font-size: .875rem;
            cursor: pointer;
        }
        .destination-item:hover {
            background-color: #f2f9ff;
        }
        .suggestions-list .destination-item:first-child {
            border-top: 0;
        }
        .suggestions-list li:hover {
            background-color: #f5f5f5;
        }

        .suggestions-list li.no-results {
            color: #757575;
            cursor: default;
        }

        .suggestions-list li.no-results:hover {
            background-color: transparent;
        }
    </style>
    <script>
        function changeDestination(value,id){
            document.getElementById('destination').value = value;
            document.getElementById('hotel_id').value = id;
        }

        function toggleSuggestion(dis) {
            const suggestionsList = document.getElementById('suggestions-list');
            suggestionsList.style.display = dis;
        }
        // تابع برای دریافت پیشنهادات از API
        function fetchSuggestions(destination) {
            const suggestionsList = document.getElementById('suggestions-list');
            suggestionsList.style.display = 'block';

            // اگر کمتر از ۲ کاراکتر وارد شده باشد، لیست را خالی کنید
            if (destination.length < 2) {
                suggestionsList.innerHTML = '';
                return;
            }

            // درخواست به API
            fetch(`/api/hotelSearchDestination/${destination}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // نمایش داده‌ها در صفحه
                    displaySuggestions(data.hotels,data.cities);
                })
                .catch(error => {
                    console.error('Error fetching suggestions:', error);
                    suggestionsList.innerHTML = '<div class="flex items-center justify-center gap-2" style="padding: 1rem;font-weight: 400;line-height: 180%; font-size: 1.2rem">خطا در دریافت داده‌ها</div>';
                });
        }

        // تابع برای نمایش پیشنهادات در صفحه
        function displaySuggestions(hotels,cities) {
            const suggestionsList = document.getElementById('suggestions-list');

            // اگر داده‌ای وجود نداشته باشد
            if (hotels.length === 0 && cities.length === 0) {
                suggestionsList.innerHTML = '<div class="flex items-center justify-center gap-2" style="padding: 1rem;font-weight: 400;line-height: 180%; font-size: 1.2rem"><svg style="margin-top: 3px" viewBox="0 0 24 24" width="16px" height="16px" fill="currentColor"><path d="M12 1.5c5.799 0 10.5 4.701 10.5 10.5S17.799 22.5 12 22.5 1.5 17.799 1.5 12 6.201 1.5 12 1.5ZM12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Zm0 6a.75.75 0 0 1 .745.663l.005.087v7.5a.75.75 0 0 1-1.495.087l-.005-.087v-7.5A.75.75 0 0 1 12 9Zm0-3a.75.75 0 0 1 .745.663l.005.087v.75a.75.75 0 0 1-1.495.087L11.25 7.5v-.75A.75.75 0 0 1 12 6Z"></path></svg> نتیجه‌ای یافت نشد </div>';
                return;
            }

            // ایجاد لیست پیشنهادات
            suggestionsList.innerHTML = cities
                .map(suggestion => `
<span class="destination-item" onclick="changeDestination('${suggestion.city}',0)">
<svg viewBox="0 0 24 24" width="24px" height="24px" fill="currentColor" class="ml-2 shrink-0"><path d="M11.28 1.534c4.437-.419 8.22 3.11 8.22 7.59 0 4.053-1.89 7.941-6.398 12.888-.593.65-1.62.651-2.212 0-4.219-4.628-6.14-8.33-6.374-12.09-.263-4.237 2.701-8.005 6.765-8.388ZM18 9.124c0-3.604-3.031-6.432-6.579-6.097C8.192 3.332 5.8 6.374 6.013 9.83c.21 3.37 1.977 6.775 5.982 11.17l.531-.59c3.803-4.306 5.402-7.66 5.471-11.054L18 9.124ZM12 5.25a3.75 3.75 0 1 1 0 7.5 3.75 3.75 0 0 1 0-7.5Zm0 1.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" fill-rule="evenodd"></path></svg>
<span>
<span class="font-medium">${suggestion.city}</span>
<span class="block text-1">${suggestion.province}</span>
</span>
</span>
`)

            // ایجاد لیست پیشنهادات
            suggestionsList.innerHTML += hotels
                .map(suggestion => `
<span class="destination-item" onclick="changeDestination('${suggestion.title}','${suggestion.id}')">
<svg viewBox="0 0 24 24" width="24px" height="24px" fill="currentColor" class="ml-2"><path d="M14.655 3.75a.675.675 0 0 1 .67.59l.005.085h2.595A2.175 2.175 0 0 1 20.1 6.6v12.067a1.425 1.425 0 0 1-1.425 1.425H5.107c-.75 0-1.357-.607-1.357-1.357v-7.966a2.228 2.228 0 0 1 2.047-2.242v-.015a.675.675 0 0 1 1.345-.085l.005.085v.007h2.738v-1.92a2.175 2.175 0 0 1 2.047-2.17v-.004a.675.675 0 0 1 1.345-.085l.006.085h.697a.674.674 0 0 1 .675-.675Zm-4.77 6.12H5.97a.877.877 0 0 0-.545.196l-.073.067a.879.879 0 0 0-.251.63v7.972c0 .003.003.007.007.007h4.778V9.87h-.001Zm2.712-4.096h-.537a.825.825 0 0 0-.825.826v12.142h2.063v-1.305a1.425 1.425 0 0 1 1.313-1.42l.111-.005h.548c.788 0 1.425.638 1.425 1.425v1.304l1.98.001a.07.07 0 0 0 .052-.022l.017-.023.006-.03V6.6a.825.825 0 0 0-.825-.825h-3.27l-.01-.001h-2.048Zm2.673 11.588h-.547a.075.075 0 0 0-.075.075v1.304h.697v-1.304a.075.075 0 0 0-.023-.052l-.023-.017-.029-.006Zm-6.758-.99a.675.675 0 0 1 .085 1.345l-.085.005h-2.04a.676.676 0 0 1-.084-1.345l.084-.005h2.04Zm0-2.76a.675.675 0 0 1 .085 1.345l-.085.005h-2.04a.676.676 0 0 1-.084-1.345l.084-.005h2.04Zm5.46-.322a.675.675 0 0 1 .085 1.345l-.085.005h-1.364a.676.676 0 0 1-.085-1.345l.085-.005h1.364Zm3.406 0a.675.675 0 0 1 .084 1.345l-.084.005h-1.366a.676.676 0 0 1-.084-1.345l.084-.005h1.366Zm-8.866-2.438a.675.675 0 0 1 .085 1.345l-.085.005h-2.04a.676.676 0 0 1-.084-1.345l.084-.005h2.04Zm5.46-.292a.675.675 0 0 1 .085 1.345l-.085.005h-1.364a.676.676 0 0 1-.085-1.345l.085-.005h1.364Zm3.406 0a.675.675 0 0 1 .084 1.345l-.084.005h-1.366a.676.676 0 0 1-.084-1.345l.084-.005h1.366Zm-3.405-2.723a.675.675 0 0 1 .084 1.345l-.085.005h-1.364a.675.675 0 0 1-.085-1.344l.085-.006h1.364Zm3.405 0a.675.675 0 0 1 .084 1.345l-.084.005h-1.366a.675.675 0 0 1-.084-1.344l.084-.006h1.366Z" fill-rule="evenodd"></path></svg>
<span>
<span class="font-medium">${suggestion.title}</span>
<span class="block text-1">${suggestion.province}</span>
</span>
</span>
`)
                .join('');
        }
    </script>

    {{-- dates filter --}}
    <script>
        flatpickr("#dateRange", {
            mode: 'range',
            locale: 'fa',
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
        let roomsData;
        try {
            const roomsDataString = params.get('rooms_data');
            roomsData = roomsDataString ? JSON.parse(roomsDataString) : [{ persons: 1 }];
        } catch (e) {
            console.error('Invalid rooms_data format:', e);
            roomsData = [{ persons: 1 }];
        }

        console.log(roomsData);
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

    <script src="{{ asset('src/scripts/leaflet.js') }}"></script>
@endsection
