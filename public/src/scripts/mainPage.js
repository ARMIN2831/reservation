let pictureGallery = new Swiper(".picturesGallerySlider", {
    slidesPerView : 1.4,
    slidesPerGroup: 1,
    spaceBetween : 8,
    centeredSlides: true,
    breakpoints : {
        768 : {
            slidesPerView : 2,
        },
        900 : {
            slidesPerView : 3,
        }
    }
})




function modalController (modal){
    modal.classList.toggle('active')
}


let editHotelInfoPopUp = document.querySelector(".hotelEditInfoModal")

let editHotelInfoPopUpReturnButton = document.querySelector('.editHotelInfoPopUpReturnButton')
let editHotelInfoPopUpSaveButton = document.querySelector('.editHotelInfoPopUpSaveButton')

editHotelInfoPopUpReturnButton.addEventListener('click', event => {
    modalController(editHotelInfoPopUp)
})
editHotelInfoPopUpSaveButton.addEventListener('click', event => {
    modalController(editHotelInfoPopUp)
    // other codes


})


let editHotelAttrPopUp = document.querySelector(".hotelEditAttrModal")
let editHotelNewPhoto = document.querySelector(".roomsNewImage")




let mainPageEditButton = document.querySelector('.editButton')

mainPageEditButton.addEventListener('click', event => {
    modalController(editHotelInfoPopUp)
})





let hotelContentButton = document.querySelector("hotel-content-button")
let hotelAttrContentButton = document.querySelector("hotel-attr-content-button")
let hotelGalleryContentButton = document.querySelector("hotel-gallery-content-button")

let tabContentMainPageButtons = document.querySelectorAll(".navbar-item-child-link-mainPage")
let tabContentMainPageContent = document.querySelectorAll(".mainPageTabContents")

tabContentMainPageButtons.forEach(button => {
    button.addEventListener('click', event => {
        tabContentMainPageContent.forEach(item => {
            item.classList.add('hidden')
        })
        tabContentMainPageButtons.forEach(button => {
            button.classList.remove('active')
        })
        document.querySelector('.' + button.dataset.bsTarget).classList.remove('hidden')
        button.classList.add('active')
    })
})



// drop image scripts

let dropArea = document.querySelector('.dropArea');
let fileInput = document.getElementById('fileInput');

dropArea.addEventListener('click', event => {
    fileInput.click();
});

dropArea.addEventListener('drop', event => {
    event.preventDefault();
    dropArea.classList.remove('hover');
    const files = event.dataTransfer.files;
    handleFiles(files);
});

dropArea.addEventListener('dragover', event => {
    event.preventDefault(); // جلوگیری از رفتار پیش‌فرض
    dropArea.classList.add('hover');
});

dropArea.addEventListener('dragleave', event => {
    dropArea.classList.remove('hover');
});

fileInput.addEventListener('change', event => {
    const files = event.target.files;
    handleFiles(files);
});

function handleFiles(files) {
    // بررسی اینکه آیا فقط یک فایل انتخاب شده است
    if (files.length > 1) {
        alert('فقط یک عکس مجاز به آپلود است.');
        return;
    }

    const file = files[0]; // فقط فایل اول را در نظر می‌گیریم

    // بررسی نوع فایل
    if (file.type === 'image/jpeg') {
        // بررسی اندازه فایل (کمتر از 100 کیلوبایت)
        if (file.size <= 1000 * 1024) {
            let defaultText = dropArea.querySelectorAll('.dropAreaText')
            defaultText.forEach(item => {
                item.classList.add('hidden')
            })

            dropArea.classList.remove('hover')
            dropArea.classList.add('active')

            fileInput.files = files; // نسبت دادن فایل به input
            let filenameElem = dropArea.querySelector('.filename');
            let filesizeElem = dropArea.querySelector('.filesize');
            filenameElem.classList.remove('hidden');
            filesizeElem.classList.remove('hidden');

            filenameElem.textContent = file.name;
            filesizeElem.textContent = Math.floor(file.size / 1024) + ' KB'; // تبدیل به کیلوبایت
        } else {
            let defaultText = dropArea.querySelectorAll('.dropAreaText')
            defaultText.forEach(item => {
                item.classList.remove('hidden')
            })

            dropArea.classList.remove('active')


            let filenameElem = dropArea.querySelector('.filename');
            let filesizeElem = dropArea.querySelector('.filesize');
            filenameElem.classList.add('hidden');
            filesizeElem.classList.add('hidden');
        }
    } else {
        alert('فقط فایل‌های JPG مجاز هستند.');
    }
}


// کد های مشاهده تصویر در ابعاد بزرگتر

let showBigerImageModal = document.querySelector('.showBigerImage')
let showBigerImageElem = document.querySelector('.showBigerImageElem')


function showBigerImageModalControler (modal, src){
    modal.classList.toggle('active')
    showBigerImageElem.src = src
}

showBigerImageModal.addEventListener('click', event => {
    showBigerImageModalControler(showBigerImageModal, '#')
})
