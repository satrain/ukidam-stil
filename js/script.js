"use strict";

// Loader
(() => {
    const loadAnimation = document.querySelector('.loader');

    window.addEventListener('load', () => {
        setTimeout(() => {
            loadAnimation.classList.add('off');
        }, 300)
    });
})();

// Navigation
(() => {
    const navParent = document.querySelector('.nav__wrap');
    const burger = document.querySelector('.nav__burger');
    const nav = document.querySelector('.nav__list');
    const navLinks = document.querySelectorAll('.nav__item')

    burger.addEventListener('click', () => {
        // Toggle Nav
        nav.classList.toggle('active');

        // Animate Links
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
            }
        });

        // Burger Animation
        burger.classList.toggle('toggle');
    });

    // Shrink navigation when scrolled
    document.addEventListener('scroll', () => {
        if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
            navParent.classList.add('small');
        } else {
            navParent.classList.remove('small');
        }
    });
})();