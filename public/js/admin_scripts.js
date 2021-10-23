let toggle = document.querySelector('.side-toggle');
let navToggle = document.querySelector('.nav-toggle');
let sidebar = document.querySelector('.admin-sidebar');
let navBar = document.querySelector('.navbar-items');
let state = false;


document.addEventListener('DOMContentLoaded', function ()  {
    state = JSON.parse(localStorage.getItem('collapse')).state;
    if(state) {
        sidebar.classList.remove('collapse')
    }else {
        sidebar.classList.add('collapse');
    }
})

toggle.addEventListener('click',()=> {
    sidebar.classList.toggle('collapse');
    state = !state;
    localStorage.setItem('collapse', JSON.stringify({state:state}));
});
navToggle.addEventListener('click',()=> {
    navBar.classList.toggle('navbar-collapse')
})
