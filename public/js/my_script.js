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
        }, 5000)
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
switchButton?.addEventListener('click', function() {
    if(topNavItems.style.display === 'none' || !topNavItems.style.display) {
        topNavItems.style.display = 'flex'
    }else {
        topNavItems.style.display = 'none'
    }
});

/**
 *
 * Mobile Navbar Toggle
 */
const mNavbar =  document.querySelector('.m-navbar');
const threeBars = document.querySelector('.three-bars');
const crossBars = document.querySelector('.cross-bars');
const m_menu = document.querySelector('.m-menu');
const overlay = mNavbar?.querySelector('.overlay');

overlay?.addEventListener('click', function (e) {
    e.stopPropagation();
    if(e.target !== m_menu) {
        m_menu.style.right = '-100%';
        overlay.style.display = 'none'
    }
})

threeBars?.addEventListener('click', function(e) {
    e.stopPropagation()
    m_menu.style.right = '0';
    overlay.style.display = 'block'
});

crossBars?.addEventListener('click', function(e) {
    e.stopPropagation()
    m_menu.style.right = '-100%';
    overlay.style.display = 'none'
})

/*
*  Tabs
* */
const tabsList = document.querySelectorAll('.tabs li')
const tabs = document.querySelectorAll('.tabs li a')
const tabsContent = document.querySelector('.tabs-content')

tabs.forEach(tab => {
    tab.addEventListener('click', function(e) {
        const elem = e.target;
        tabsContent.childNodes.forEach(child => {
            if(child.nodeType !== child.ELEMENT_NODE) {
                return;
            }
            if(child.getAttribute('id') === elem.getAttribute('data-toggle')) {
                child.classList.add('show');
                elem.parentNode.classList.add('is-active')
                tabsList.forEach(l => {
                    if (l !== elem.parentNode) {
                        l.classList.remove('is-active')
                    }
                })
            }else {
                child.classList.remove('show')
            }
        })
    });
})


/*
*  User Register Image
* */

const userIcon = document.getElementById('user_icon')
const userImage = document.getElementById('user_image')

userIcon?.addEventListener('click', function(e) {
    const image = userImage.click();
});
userImage?.addEventListener('change',function() {
    const image = this.files[0];
    // Preview image
    const imageUrl = URL.createObjectURL(image)
    userIcon.setAttribute('src', imageUrl);
    userIcon.style.filter = 'none';
})


/**
 *  search form
 */

const navSearch = document.querySelector('.nav-search');
const searchModal = document.querySelector('.search-modal')
navSearch?.addEventListener('click', function() {
    searchModal.classList.add('is-active');
});


/**
 *
 * Collapse
 */


const dataToggle = document.querySelectorAll('[data-toggle="collapse"]')


dataToggle.forEach((element)=> {
    element.addEventListener('click', function(e) {
        const collapse = element.nextElementSibling.children[0]
        collapse.classList.toggle('collapse');
    })
})

/*
    Toggle Style
*/


const toggleStyle = document.getElementById('toggle-style')

let selectedMode = localStorage.getItem('styleMode');
document.addEventListener('DOMContentLoaded', function (e) {
    const type = localStorage.getItem('styleMode') || ''
    console.log(type)
    if(type === 'dark') {
        toggleStyle.value = 'dark';
        styleToggle(toggleStyle)
    }else {
        toggleStyle.value = 'light';
        styleToggle(toggleStyle)
    }
})
toggleStyle?.addEventListener('change', function(e) {
    styleToggle(e.target)
});

function styleToggle(elem) {
    const darkCss = document.querySelector('.dark-css')
    const lightCss = document.querySelector('.light-css')
    if(elem.value === 'dark') {
        lightCss.media = 'none'
        darkCss.media = ''
        localStorage.setItem('styleMode', 'dark')
    }else {
        darkCss.media = 'none'
        lightCss.media = ''
        localStorage.setItem('styleMode', 'light')
    }
}
