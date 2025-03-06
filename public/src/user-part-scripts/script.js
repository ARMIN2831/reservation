const bestSuggestSlider = new Swiper('.bestSuggestSlider', {
    slidesPerView : 2,
    spaceBetween : 8,
    breakpoints : {
        1250 : {
            slidesPerView : 3,
        },
        1150 : {
            slidesPerView : 2.5,
        },
        1024 : {
            slidesPerView : 2.2,
        },
        950 : {
            slidesPerView : 2.8,
        },
        900 : {
            slidesPerView : 2.5,
        },
    }
})
const readyToursSlider = new Swiper('.readyToursSlider', {
    slidesPerView : 1,
    spaceBetween : 14,
    breakpoints : {
        640 : {
            slidesPerView : 2,
        },
        800 : {
            slidesPerView : 2.3,
        },
        900 : {
            slidesPerView : 2.5,
        },
        1024 : {
            slidesPerView : 3,

        },
        1200 : {
            slidesPerView : 3.5,

        },
    }
})
const userCommentsSlider = new Swiper('.userCommentsSlider', {
    slidesPerView : 1.4,
    centeredSlides: true,
    spaceBetween : 18,
    breakpoints : {
        640 : {
            slidesPerView : 1.8,
        },
        768 : {
            slidesPerView : 2,
        },
        900 : {
            slidesPerView : 3,
        },
        1024 : {
            slidesPerView : 2.5,
            centeredSlides: false,
        },
    }

})


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


window.addEventListener('resize', responsivAccordion())




let travelTypeSelectionTabContents = document.querySelectorAll('.travelTypeSelectionTabContents')

function tabContentControler (event, TargetId){
    travelTypeSelectionTabContents.forEach(item => {
        item.classList.add('hidden')
    })
    document.getElementById(TargetId).classList.remove('hidden')
}


let travelTypeSelectionTabContentAirplanePartButton = document.querySelectorAll('.travelTypeSelectionTabContentAirplanePartButton')
let travelTypeSelectionTabContentAirplaneParts = document.querySelectorAll('.travelTypeSelectionTabContentAirplanePart')

function airplaneParttabContentControler (event, TargetId){
    travelTypeSelectionTabContentAirplaneParts.forEach(item => {
        item.classList.add('hidden')
    })
    document.getElementById(TargetId).classList.remove('hidden')
    travelTypeSelectionTabContentAirplanePartButton.forEach(item => {
        item.classList.remove('active')
    })
    event.currentTarget.classList.add('active')
}



function changePassengerCount(inputId, change) {
    const inputElement = document.getElementById(inputId);
    // استخراج تعداد مسافر از ورودی و حذف کلمه "مسافر"
    let currentCount = parseInt(inputElement.value) || 0;

    // محاسبه تعداد جدید
    const newCount = currentCount + change;

    // اطمینان از اینکه تعداد مسافران کمتر از صفر نشود
    if (newCount >= 0) {
        inputElement.value = newCount + ' مسافر';
    }
}