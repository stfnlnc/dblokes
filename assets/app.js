import './styles/app.css';

// Menu mobile
const iconHeader = document.querySelector('.header__icon')
const menuHeader = document.querySelector('.header__menu')
const closeHeader = document.querySelector('.header__close')

iconHeader.addEventListener('click', () => {
    menuHeader.style.transform = 'translate(0,0)'
})

closeHeader.addEventListener('click', () => {
    menuHeader.style.transform = 'translate(-120%,0)'
})
