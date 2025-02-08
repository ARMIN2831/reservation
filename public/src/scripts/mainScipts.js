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
