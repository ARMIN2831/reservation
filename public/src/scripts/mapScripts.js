
let coordinates = [35.6892, 51.3890]
var map = L.map('viewMap').setView(coordinates, 13);


// اضافه کردن لایه نقشه از OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

let customMarker = L.icon({
    iconUrl: '../../public/icons/marker.svg',
    iconSize : [50,50],
    iconAnchor : coordinates,
    popupAnchor : [0, -50]
});
// اضافه کردن مارکر روی نقشه
L.marker(coordinates, {icon : customMarker}).addTo(map)




// ساخت نقشه
var map = L.map('mapMarker').setView(coordinates, 13);
let mapCoordinateInput = document.getElementById('mapMarkerCordinate')


// اضافه کردن نقشه از Map.ir یا OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// ذخیره مارکر قبلی
var currentMarker = null;

// هندل کردن کلیک روی نقشه
map.on('click', function (e) {
    mapCoordinateInput.value = `[${e.latlng.lat, e.latlng.lng}]`
    if (currentMarker) {
        map.removeLayer(currentMarker); // حذف مارکر قبلی
    }

    // ایجاد مارکر جدید
    currentMarker = L.marker(e.latlng, {
        icon: L.icon({
            iconUrl: '../../public/icons/marker.svg',  // آدرس آیکون دلخواهت
            iconSize: [40, 40] // اندازه آیکون
        })
    }).addTo(map);

});
