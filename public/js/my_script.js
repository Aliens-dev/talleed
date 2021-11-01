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
        ev.preventDefault();
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
const toggleSwitch = document.getElementById('toggle-switch');
let selectedMode = localStorage.getItem('styleMode');

document.addEventListener('DOMContentLoaded', function (e) {
    const type = localStorage.getItem('styleMode') || ''
    if(toggleSwitch) {
        if(type === 'dark') {
            toggleStyle.value = 'dark';
            styleToggle(toggleStyle)
            toggleSwitch.checked = true;
        }else {
            toggleStyle.value = 'light';
            styleToggle(toggleStyle)
            toggleSwitch.checked = false;
        }
    }
})
toggleStyle?.addEventListener('change', function(e) {
    styleToggle(e.target)
});

toggleSwitch?.addEventListener('change', function() {
    if(toggleSwitch == null) {
        if(toggleSwitch.checked) {
            toggleStyle.value = 'dark';
            styleToggle(toggleStyle)
        }else {
            toggleStyle.value = 'light';
            styleToggle(toggleStyle)
        }
    }
})


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


/*
    t-search-label
 */

const searchLabel = document.getElementById('t-search-label');
const tSearch = document.getElementById('t-search');
searchLabel?.addEventListener('click', function(){
    const searchInput = searchLabel.nextElementSibling;
    const labelImg = searchLabel.querySelector('img');
    if(searchInput.style.display !== 'block') {
        labelImg.style.filter = 'invert(21%) sepia(67%) saturate(2935%) hue-rotate(244deg) brightness(84%) contrast(99%)';
        searchInput.style.display = 'block';
        tSearch.style.backgroundColor = '#FFF';
    }else {
        labelImg.style.filter = 'invert(99%) sepia(1%) saturate(366%) hue-rotate(14deg) brightness(119%) contrast(100%)';
        searchInput.style.display = 'none';
        tSearch.style.backgroundColor = '#4C31BC';
    }
});

