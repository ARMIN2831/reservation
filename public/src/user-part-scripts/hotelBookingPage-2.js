
let coordinates = [35.6892, 51.3890]
var map = L.map('viewMap').setView(coordinates, 13);


// اضافه کردن لایه نقشه از OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

let customMarker = L.icon({
    iconUrl: '../../public/icons/marker.svg',
    iconSize: [50, 50],
    iconAnchor: coordinates,
    popupAnchor: [0, -50]
});
// اضافه کردن مارکر روی نقشه
L.marker(coordinates, { icon: customMarker }).addTo(map)


const hotelImagesSlider = new Swiper('.xHotel1-images', {
    slidesPerView : 1.1,
    centeredSlides : true,
    spaceBetween : 24,
    breakpoints : {
        512 : {
            slidesPerView : 1.3
        },
        640 : {
            slidesPerView : 1.6
        },
    },
    pagination: {
        el: '.xHotel1-images-pagination'
    }
})


function tabContentManager (event, buttons, contents, targetConentId){
    let contentss = document.querySelectorAll(`.${contents}`)
    let buttonss = document.querySelectorAll(`.${buttons}`)

    contentss.forEach (item => {
        item.classList.add('hidden')
    })
    buttonss.forEach (item => {
        item.classList.remove('active')
    })

    event.currentTarget.classList.add('active')
    document.getElementById(targetConentId).classList.remove('hidden')

}
