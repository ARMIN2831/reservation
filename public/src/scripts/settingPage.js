let inputContainer = document.querySelectorAll('.inputContainer')

inputContainer.forEach(item => {
    let button = item.querySelector('button')
    let buttonShowIcon = item.querySelector('button .eye-show')
    let buttonHideIcon = item.querySelector('button .eye-hide')
    let input = item.querySelector('input')

    button.addEventListener('click', event => {
        event.preventDefault();
        if(input.type === 'text'){
            input.type = 'password'
            buttonShowIcon.classList.remove('hidden')
            buttonHideIcon.classList.add('hidden')
        }else{
            input.type = 'text'
            buttonShowIcon.classList.add('hidden')
            buttonHideIcon.classList.remove('hidden')
        }
    })
})
// /////////////////////




let addOReditUsers = document.querySelector('.addOReditUsers')


function modalController (modal){
    modal.classList.toggle('active')
}

// accordions page

let accordions = document.querySelectorAll('.accordiion')
let accordionButton = document.querySelectorAll('.accordiion-button')

accordionButton.forEach(item => {
    item.addEventListener('click', event => {
        accordions.forEach(item => {
            item.classList.remove('active')
        })
        item.parentElement.classList.add('active')
    })
})


/*// برای ورودی شماره کارت
const cardNumberInput = document.querySelector('.cardIDinput')

function formatCardNumber(event) {
    const input = event.target.value.replace(/\D/g, '');

    const formatted = input.match(/.{1,4}/g);

    event.target.value = formatted ? formatted.join('-') : '';
}

cardNumberInput.addEventListener('input', formatCardNumber);*/


// برای قرار دادن عکس اپلود شده توی نگ عکس

let profile = document.getElementById('profile')
let profileImgElem = document.getElementById('profileImgElem')
let banner = document.getElementById('banner')
let bannerImgElem = document.getElementById('bannerImgElem')

profile.addEventListener('change', function() {
    const file = profile.files[0]; // دریافت فایل اول از ورودی

    if (file) {
        const reader = new FileReader(); // ایجاد یک FileReader

        // وقتی فایل خوانده شد
        reader.onload = function(event) {
            profileImgElem.src = event.target.result;
        };

        reader.readAsDataURL(file);
    }
});
banner.addEventListener('change', function() {
    const file = banner.files[0]; // دریافت فایل اول از ورودی

    if (file) {
        const reader = new FileReader(); // ایجاد یک FileReader

        // وقتی فایل خوانده شد
        console.log(bannerImgElem);
        reader.onload = function(event) {
            bannerImgElem.src = event.target.result;
        };

        reader.readAsDataURL(file);
    }
});
