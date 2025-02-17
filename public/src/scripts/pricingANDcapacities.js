
let tabContentMainPageButtons = document.querySelectorAll(".navbar-item-child-link-pricingPage")
let tabContentMainPageContent = document.querySelectorAll(".pricingPageTabContents")

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



let examInput1 = document.getElementById('examInput1')
let examInput2 = document.getElementById('examInput2')
let examInput3 = document.getElementById('examInput3')