/*
 * Bulma Button Event
 */
const bulmaDeleteBtn = document.querySelectorAll('.delete') || []

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

/*
 *    Bulma Dropdown
 */

document.addEventListener('DOMContentLoaded', function () {
    const bulmaDropdown = document.querySelectorAll('.dropdown')

    bulmaDropdown.forEach(dropdown => {
        dropdown.addEventListener('click', (ev) => {
            ev.stopPropagation()
            dropdown.classList.toggle('is-active')
        })
    })

    document.addEventListener('click', function(ev) {
        bulmaDropdown.forEach(function ($el) {
            $el.classList.remove('is-active');
        });
    })
})

