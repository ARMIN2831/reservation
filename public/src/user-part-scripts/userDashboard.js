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


let userDahsboardTabContents = document.querySelectorAll('.userDashboardAccordion')
let userDahsboardTabButton = document.querySelectorAll('.userDashboardSidbarButton')


function userDashboardTabContentController (event, targetId){
    userDahsboardTabContents.forEach(item => item.classList.remove('active'))
    userDahsboardTabButton.forEach(item => item.classList.remove('active'))

    event.currentTarget.classList.add('active')
    document.getElementById(targetId).classList.add('active')
}


function toggleModal (event) {
    event.currentTarget.classList.toggle('active')
}

function shoppingDetailsModalToggle(event, target){
    document.querySelector(target).classList.toggle('active')
    childElem2.style.height = parentElem2.clientHeight + 'px'
}







const amountInput = document.getElementById('addWalletAmountInput');


function formatNumberWithCommas(input) {
    // تبدیل ورودی به عدد
    const num = Number(input);
    
    // اطمینان از اینکه ورودی عددی معتبر است
    if (isNaN(num)) {
        return null; // یا می‌توانید یک پیام خطا برگردانید
    }
    
    // فرمت کردن عدد با استفاده از toLocaleString
    return num.toLocaleString('en-US');
}

// فقط اعداد را اجازه می‌دهد
amountInput.addEventListener('input', function() {
    // حذف هر چیزی که عدد نیست
    const rawValue = +(this.value.replace(/[^0-9]/g, ''));
    this.value = formatNumberWithCommas(rawValue); // فرمت کردن عدد با کاما
});

// تخصیص مقدار به ورودی از المان‌های پیشنهادی
const suggestions = document.querySelectorAll('.suggest-price-value-elem');
suggestions.forEach(suggestion => {
    suggestion.addEventListener('click', function() {
        const price = this.getAttribute('data-price');
        // قرار دادن مقدار جدید در ورودی با فرمت صحیح
        amountInput.value = formatNumberWithCommas(price);
    });
});