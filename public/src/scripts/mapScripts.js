// مختصات پیش‌فرض (تهران)
/*let coordinates = [35.6892, 51.3890];*/

// ایجاد نقشه برای نمایش (viewMap)
var viewMap = L.map('viewMap').setView(coordinates, 13);

// اضافه کردن لایه نقشه از OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(viewMap);

// ایجاد مارکر برای نمایش
let customMarker = L.icon({
    iconUrl: '../../public/icons/marker.svg', // آدرس آیکون دلخواه
    iconSize: [50, 50], // اندازه آیکون
    iconAnchor: [25, 50], // نقطه اتصال آیکون به مختصات
    popupAnchor: [0, -50] // موقعیت پاپ‌آپ نسبت به آیکون
});

// اضافه کردن مارکر روی نقشه نمایش
L.marker(coordinates, { icon: customMarker }).addTo(viewMap);

// ایجاد نقشه برای انتخاب مختصات (mapMarker)
var map = L.map('mapMarker').setView(coordinates, 13);

// اضافه کردن لایه نقشه از OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// انتخاب فیلد مخفی برای ذخیره مختصات
let mapCoordinateInput = document.getElementById('mapMarkerCordinate');

// ذخیره مارکر فعلی
var currentMarker = null;

// هندل کردن کلیک روی نقشه
map.on('click', function (e) {
    // ذخیره مختصات به صورت [lat, lng]
    mapCoordinateInput.value = JSON.stringify([e.latlng.lat, e.latlng.lng]);

    // حذف مارکر قبلی (اگر وجود دارد)
    if (currentMarker) {
        map.removeLayer(currentMarker);
    }

    // ایجاد مارکر جدید
    currentMarker = L.marker(e.latlng, {
        icon: L.icon({
            iconUrl: '../../public/icons/marker.svg', // آدرس آیکون دلخواه
            iconSize: [40, 40] // اندازه آیکون
        })
    }).addTo(map);
});

// مقداردهی اولیه مختصات (اگر قبلاً ذخیره شده است)
if (mapCoordinateInput.value) {
    const initialCoordinates = JSON.parse(mapCoordinateInput.value);
    currentMarker = L.marker(initialCoordinates, {
        icon: L.icon({
            iconUrl: '../../public/icons/marker.svg',
            iconSize: [40, 40]
        })
    }).addTo(map);
    map.setView(initialCoordinates, 13);
}
