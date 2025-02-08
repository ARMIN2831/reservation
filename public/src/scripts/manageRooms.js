let roomItems = document.querySelectorAll('.manage-room-item')


window.addEventListener('DOMContentLoaded', event => {
    roomItems.forEach(item => {
        if(item.classList.contains('disabled')){
            let input = item.querySelector('input')
            input.disabled = true
        }
    })
})