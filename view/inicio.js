const menu_squared = document.getElementById('menu-squared');
const header__list = document.getElementById('header__list');
menu_squared.addEventListener('click',()=>{
    header__list.classList.toggle('header__list-active');
});
