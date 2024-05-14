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

// Header background scroll
const header = document.querySelector('header')

document.addEventListener('scroll', () => {
    if(window.scrollY > 200) {
        header.style.backgroundColor = 'var(--secondary-dark)'
    } else {
        header.style.backgroundColor = 'transparent'
    }
})
