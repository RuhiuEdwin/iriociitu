const menu = document.querySelector('#mobile-menu')
const menuLinks = document.querySelector('.navbar_menu')
const navLog = document.querySelector('#navbar_logo')
const body = document.querySelector('body')

//display mobile menu
const mobileMenu = () => {
    menu.classList.toggle('is-active')
    menuLinks.classList.toggle('active')
    body.classList.toggle('active')
}

menu.addEventListener('click', mobileMenu)

//animations
gsap.registerPlugin(ScrollTrigger);

gsap.from('.animate-hero',{
    duration: 0.6,
    opacity: 0,
    y: -150,
    stagger: 0.3
});

gsap.from('.animate-about',{
    scrollTrigger: '.animate-about',
    duration: 0.5,
    opacity: 1,
    x: -150,
    stagger: 0.12
});

gsap.from('.animate-cta',{
    scrollTrigger: '.animate-cta',
    duration: 1.2,
    opacity: 1,
    x: -250
});
gsap.from('.animate-menu',{
    scrollTrigger: '.animate-menu',
    duration: 1,
    opacity: 0,
    y: -150,
    stagger: 0.3,
    delay: 0.5
});
gsap.from('.animate-testimonials',{
    scrollTrigger: '.animate-testimonials',
    duration: 1,
    opacity: 0,
    y: -150,
    stagger: 0.1,
    delay: 0.2
});
gsap.from('.animate-reservations',{
    scrollTrigger: '.animate-reservations',
    duration: 1,
    opacity: 0,
    y: -150,
    stagger: 0.3,
    delay: 0.2
});
gsap.from('.animate-footer',{
    scrollTrigger: '.animate-footer',
    duration: 0.8,
    opacity: 0,
    y: -150,
    stagger: 0.25,
    delay: 0.6
});
gsap.from('.animate-order',{
    scrollTrigger: '.animate-order',
    duration: 0.8,
    opacity: 0,
    y: -150,
    stagger: 0.25,
    delay: 0.6
});

