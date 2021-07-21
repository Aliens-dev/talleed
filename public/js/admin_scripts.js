let toggle = document.querySelector('.side-toggle');
let navToggle = document.querySelector('.nav-toggle');
let sidebar = document.querySelector('.admin-sidebar');
let navBar = document.querySelector('.navbar-items');
let state = false;
toggle.addEventListener('click',()=> {
    sidebar.classList.toggle('collapse');
    state = !state;
});
sidebar.addEventListener('mouseover',()=> {
    if(state) {
        sidebar.classList.remove('collapse');
    }
})
sidebar.addEventListener('mouseleave',()=> {
    if(state) {
        sidebar.classList.add('collapse');
    }
})
navToggle.addEventListener('click',()=> {
    navBar.classList.toggle('navbar-collapse')
})
