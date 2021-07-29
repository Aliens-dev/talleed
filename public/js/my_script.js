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



/*
*  Top navbar Toggle ( Small )
* */

const switchButton = document.querySelector('.switch-button')
const topNavItems = document.querySelector('.nav-items');
switchButton.addEventListener('click', function() {
    console.log(topNavItems.style.display)
    if(topNavItems.style.display === 'none' || !topNavItems.style.display) {
        topNavItems.style.display = 'block'
    }else {
        topNavItems.style.display = 'none'
    }
});
