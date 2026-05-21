
import './bootstrap';
import './bootstrap';

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', () => {
    gsap.set([
        '.navbar-premium',
        '.hero-badge',
        '.hero-title',
        '.hero-text',
        '.hero-actions',
        '.hero-card',
        '.section-reveal',
        '.premium-card'
    ], {
        opacity: 0,
    });

    gsap.to('.navbar-premium', {
        y: 0,
        opacity: 1,
        duration: 1,
        ease: 'power3.out',
    });

    gsap.fromTo('.hero-badge',
        { y: 30, opacity: 0 },
        { y: 0, opacity: 1, duration: .8, delay: .2, ease: 'power3.out' }
    );

    gsap.fromTo('.hero-title',
        { y: 70, opacity: 0 },
        { y: 0, opacity: 1, duration: 1, delay: .35, ease: 'power4.out' }
    );

    gsap.fromTo('.hero-text',
        { y: 45, opacity: 0 },
        { y: 0, opacity: 1, duration: 1, delay: .55, ease: 'power3.out' }
    );

    gsap.fromTo('.hero-actions',
        { y: 35, opacity: 0 },
        { y: 0, opacity: 1, duration: 1, delay: .75, ease: 'power3.out' }
    );

    gsap.fromTo('.hero-card',
        { x: 90, opacity: 0, scale: .92 },
        { x: 0, opacity: 1, scale: 1, duration: 1.2, delay: .45, ease: 'power4.out' }
    );

    gsap.to('.hero-card', {
        y: -18,
        duration: 3,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut',
        delay: 1.8,
    });

    gsap.to('.hero-glow', {
        scale: 1.15,
        opacity: .35,
        duration: 3,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut',
    });

    gsap.utils.toArray('.section-reveal').forEach((section) => {
        gsap.fromTo(section,
            { y: 80, opacity: 0 },
            {
                scrollTrigger: {
                    trigger: section,
                    start: 'top 82%',
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out',
            }
        );
    });

    gsap.utils.toArray('.premium-card').forEach((card, index) => {
        gsap.fromTo(card,
            { y: 65, opacity: 0, scale: .94 },
            {
                scrollTrigger: {
                    trigger: card,
                    start: 'top 88%',
                },
                y: 0,
                opacity: 1,
                scale: 1,
                duration: .85,
                delay: (index % 3) * .12,
                ease: 'power3.out',
            }
        );
    });

    gsap.utils.toArray('.parallax-soft').forEach((item) => {
        gsap.to(item, {
            scrollTrigger: {
                trigger: item,
                start: 'top bottom',
                end: 'bottom top',
                scrub: true,
            },
            y: -80,
            ease: 'none',
        });
    });

    if (document.querySelector('.auth-page')) {
    gsap.from('.auth-card', {
        y: 80,
        opacity: 0,
        scale: 0.92,
        duration: 1.1,
        ease: 'power4.out',
    });

    gsap.from('.auth-logo', {
        y: -30,
        opacity: 0,
        scale: 0.7,
        rotation: -8,
        duration: 1,
        delay: 0.25,
        ease: 'back.out(1.7)',
    });

    gsap.from('.auth-title', {
        y: 30,
        opacity: 0,
        duration: 0.8,
        delay: 0.45,
        ease: 'power3.out',
    });

    gsap.from('.auth-subtitle', {
        y: 25,
        opacity: 0,
        duration: 0.8,
        delay: 0.6,
        ease: 'power3.out',
    });

    gsap.from('.auth-input', {
        y: 35,
        opacity: 0,
        duration: 0.8,
        stagger: 0.12,
        delay: 0.75,
        ease: 'power3.out',
    });

    gsap.from('.auth-button', {
        y: 35,
        opacity: 0,
        scale: 0.95,
        duration: 0.8,
        delay: 1.05,
        ease: 'power3.out',
    });

    gsap.to('.hero-glow', {
        scale: 1.18,
        opacity: 0.35,
        duration: 3,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut',
    });

    gsap.to('.parallax-soft', {
        y: -25,
        duration: 4,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut',
    });
}
});
const adminMenuButton = document.getElementById('adminMenuButton');
const adminMobileMenu = document.getElementById('adminMobileMenu');

if (adminMenuButton && adminMobileMenu) {
    adminMenuButton.addEventListener('click', () => {
        adminMobileMenu.classList.toggle('hidden');
    });
}

gsap.from('.admin-navbar', {
    y: -80,
    opacity: 0,
    duration: 1,
    ease: 'power3.out',
});

gsap.from('.dashboard-hero', {
    y: 60,
    opacity: 0,
    scale: .96,
    duration: 1,
    ease: 'power4.out',
});

gsap.from('.dashboard-badge', {
    y: 25,
    opacity: 0,
    duration: .8,
    delay: .2,
});

gsap.from('.dashboard-title', {
    y: 50,
    opacity: 0,
    duration: 1,
    delay: .35,
    ease: 'power4.out',
});

gsap.from('.dashboard-text', {
    y: 35,
    opacity: 0,
    duration: 1,
    delay: .55,
});

gsap.from('.admin-card', {
    y: 60,
    opacity: 0,
    scale: .94,
    duration: .9,
    stagger: .12,
    delay: .65,
    ease: 'power3.out',
});