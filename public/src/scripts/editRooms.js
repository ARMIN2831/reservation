
let singlebedCountInput = document.getElementById('singlebedCountInput')
let doublebedCountInput = document.getElementById('doublebedCountInput')


function addOrDeleteBed(type, inputElem) {
    let value = parseInt(inputElem.value, 10);
    if (isNaN(value)) value = 0;

    switch (type) {
        case 'add':
            inputElem.value = value + 1;
            break;
        case 'delete':
            if (value > 0) {
                inputElem.value = value - 1;
            }
            break;
        default:
            break;
    }
}


function modalController (modal){
    modal.classList.toggle('active')
}



//
let addImagePopUp = document.querySelector('.roomsNewImage')




// ///////////////////////////////////////////////////// drop img scripts
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
    if (file.type === 'image/jpeg' || file.type === 'image/png') {
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
