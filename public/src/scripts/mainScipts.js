let offCanvasButton = document.getElementById('offCanvasButton')
let offCanvasSidbar = document.getElementById('offCanvasSidbar')
let offCanvasBlur = document.getElementById('offCanvasBlur')

let isOffcanvasActive = false

function offCanvasManager (){
    if(isOffcanvasActive){
        isOffcanvasActive = false
        offCanvasSidbar.style.right = '-260px'
        offCanvasBlur.style.display = 'none'
        document.querySelector('body').style.overflow = 'auto'
    }else{
        isOffcanvasActive = true
        offCanvasSidbar.style.right = '0px'
        offCanvasBlur.style.display = 'block'
        document.querySelector('body').style.overflow = 'hidden'
    }
}

document.querySelector

offCanvasButton.addEventListener('click', event => {
    offCanvasManager()
})
offCanvasBlur.addEventListener('click', event => {
    offCanvasManager()
})

let allButtons = document.querySelectorAll('button')
allButtons.forEach(button => {
    button.addEventListener('click', event => {
        if(button.type != "submit"){
            event.preventDefault()
        }
    })
})


function modalController (modal){
    modal.classList.toggle('active')
}

function addOrDescreseInputValue (type, inputElem){
    switch (type) {
        case 'add':
            inputElem.value = +(inputElem.value) + 1
            break;
        case 'delete':
            if(+(inputElem.value) > 0){
                inputElem.value = +(inputElem.value) - 1
            }else{
                return
            }
            break;
        default:
            break;
    }
}

function openFullscreen() {
    const elem = document.documentElement;
    if (elem.requestFullscreen) {
        elem.requestFullscreen();
    } else if (elem.mozRequestFullScreen) { // Firefox
        elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) { // Chrome, Safari and Opera
        elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { // IE/Edge
        elem.msRequestFullscreen();
    }
}

window.addEventListener('load', openFullscreen())
