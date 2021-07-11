/*
 * Bulma Button Event
 */
const bulmaDeleteBtn = document.querySelectorAll('.notification > .delete') || []

bulmaDeleteBtn.forEach(btn =>  {
    const parentNode = btn.parentNode
    btn.addEventListener('click', function() {
        parentNode.parentNode.removeChild(parentNode)
    })
})

/*
 * Bulma Modal
 */

const bulmaModal = document.querySelectorAll('.modal');
bulmaModal.forEach(modal => {
    const modalBackground = modal.querySelector(".modal-background")
    const modalClose = modal.querySelector(".modal-close")
    modal.addEventListener('click', (ev) => {
        if(ev.target === modalBackground || ev.target === modalClose) {
            modal.classList.remove('is-active')
        }
    })
    if(modal.classList.contains('timer')){
        setTimeout(() => {
            modal.classList.remove('is-active')
        }, 3000)
    }
})
