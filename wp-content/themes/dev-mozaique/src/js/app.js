import Swiper from "swiper/bundle";
import { Pagination, Navigation, Autoplay, EffectCards, Mousewheel, EffectCreative } from "swiper/modules";
import AOS from 'aos';
import 'aos/dist/aos.css';

// Navigation toggle
window.addEventListener('load', function () {

    // animate on scroll
    AOS.init({
    duration: 600,
    once: true,
    offset: -100,  // Negative value triggers even earlier
    anchorPlacement: 'top-bottom'
    });

    const mainNavigation = document.querySelector(".site-nav");
    const menuToggle = document.querySelector("#primary-menu-toggle");
    const header = document.querySelector("#site-header");
    
    // Toggle menu - only if elements exist
    if (menuToggle && mainNavigation && header) {
        menuToggle.addEventListener("click", function (e) {
            e.preventDefault();
            mainNavigation.classList.toggle("active");
            header.classList.toggle("menu-open");
            document.body.style.overflow = mainNavigation.classList.contains("active") ? 'hidden' : '';
        });
        
        // Close on escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mainNavigation.classList.contains('active')) {
                mainNavigation.classList.remove('active');
                header.classList.remove('menu-open');
                document.body.style.overflow = '';
            }
        });
        
        // Reset menu state on resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                mainNavigation.classList.remove('active');
                header.classList.remove('menu-open');
                document.body.style.overflow = '';
                
                document.querySelectorAll('.menu-item-has-children.open').forEach(function(item) {
                    item.classList.remove('open');
                });
            }
        });
    }

    // Toggle submenus on mobile
    const menuItemsWithChildren = document.querySelectorAll('.menu-item-has-children > a');
    
    menuItemsWithChildren.forEach(function(item) {
        item.addEventListener('click', function(e) {
            if (window.innerWidth < 1024) {
                e.preventDefault();
                this.parentElement.classList.toggle('open');
            }
        });
    });

    // contact dialog popup
    const popup_contact_triggers = document.querySelectorAll('a[href="#popup-contact-trigger"]');
    const contact_dialog = document.querySelector(".contact-dialog");

    if (contact_dialog) {
        const popup_closeButton = contact_dialog.querySelector(".dialog-close");
        
        function openDialog(e) {
            if (e) e.preventDefault();
            contact_dialog.showModal();
        }
        function closeDialog() {
            contact_dialog.close();
        }
        
        if (popup_contact_triggers.length) {
            popup_contact_triggers.forEach((popup_trigger) => {
                popup_trigger.addEventListener("click", openDialog);
            });
        }
        
        popup_closeButton.addEventListener("click", closeDialog);
        contact_dialog.addEventListener("click", (event) => {
            if (event.target === contact_dialog) {
                closeDialog();
            }
        });

        // Check for custom URL parameter on page load
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('book-a-demo')) {
            openDialog();
        }
    }

    // Start the petal animation - only if elements exist
    const petalElements = document.querySelectorAll('#theN g');
    if (petalElements.length > 0) {
        cycle('#theN g', 'active', 1000, 0);
    }

    // stacked products front page
    const stackedProducts = document.querySelector('.stacked-products');

    if (stackedProducts) {
        const cursor = document.querySelector('.custom-cursor');
        
        if (cursor) {
            const cursorLink = cursor.querySelector('a');
            let mouseX = 0;
            let mouseY = 0;

            function updateCursorState() {
                const rect = stackedProducts.getBoundingClientRect();
                const isOver = (
                    mouseX >= rect.left &&
                    mouseX <= rect.right &&
                    mouseY >= rect.top &&
                    mouseY <= rect.bottom
                );
                
                if (isOver) {
                    cursor.classList.add('active');
                    stackedProducts.style.cursor = 'none';
                } else {
                    cursor.classList.remove('active');
                    stackedProducts.style.cursor = 'auto';
                }
            }

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
                cursor.style.left = mouseX + 'px';
                cursor.style.top = mouseY + 'px';
                updateCursorState();
            });

            window.addEventListener('scroll', () => {
                updateCursorState();
            });

            const cards = stackedProducts.querySelectorAll('.product-card a');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    const link = card.getAttribute('data-product-link');
                    if (link && cursorLink) {
                        cursorLink.href = link;
                    }
                });
            });
        }
    }

    /**
     * SWIPERS - Only initialize if element exists
     */

    // Client Reviews slider
    const reviewsSlider = document.querySelector(".reviews-slider");
    if (reviewsSlider) {
        new Swiper(reviewsSlider, {
            modules: [Pagination, Autoplay, EffectCards],
            autoplay: {
                delay: 12000,
                enabled: true,
                disableOnInteraction: false,
            },
            speed: 1500,
            slidesPerView: 1,
            watchSlidesProgress: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: false,
            },
            effect: "cards",
            grabCursor: true,
            cardsEffect: {
                perSlideOffset: 9,
                perSlideRotate: 0,
                slideShadows: false,
                rotate: false,
            },
        });
    }

    // Client Logos
    const clientLogos = document.querySelector('.swiper-client-logos');
    if (clientLogos) {
        new Swiper(clientLogos, {
            loop: true,
            modules: [Autoplay, Pagination],
            slidesPerView: 2,
            spaceBetween: 30,
            autoplay: {
                delay: 0,
            },
            speed: 4000,
            breakpoints: {
                600: { slidesPerView: 4, spaceBetween: 20 },
                960: { slidesPerView: 5, spaceBetween: 20 },
                1280: { slidesPerView: 6, spaceBetween: 30 },
                1600: { slidesPerView: 7, spaceBetween: 30 }
            },
        });
    }

    // About Gallery - Row 1 (scrolls left/default direction)
    const aboutGalleryRow1 = document.querySelector('.swiper-about-gallery-row1');
    if (aboutGalleryRow1) {
        new Swiper(aboutGalleryRow1, {
            loop: true,
            slidesPerView: 'auto',
            spaceBetween: 24,
            speed: 5000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            preloadImages: true,
            watchSlidesProgress: true,
        });
    }

    // About Gallery - Row 2 (scrolls right/reverse direction)
    const aboutGalleryRow2 = document.querySelector('.swiper-about-gallery-row2');
    if (aboutGalleryRow2) {
        new Swiper(aboutGalleryRow2, {
            loop: true,
            slidesPerView: 'auto',
            spaceBetween: 24,
            speed: 5000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                reverseDirection: true,  // This makes it scroll the opposite way
            },
            preloadImages: true,
            watchSlidesProgress: true,
        });
    }

    // Front page case studies
    const frontPageCS = document.querySelector('.swiper-front-page-cs');
    if (frontPageCS) {
        new Swiper(frontPageCS, {
            loop: true,
            slidesPerView: 1,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            centeredSlides: true,
            modules: [Pagination],
            spaceBetween: 40,
            speed: 2000,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                960: { slidesPerView: 1.6 },
            },
        });
    }

    // Case studies
    const caseStudies = document.querySelector('.swiper-cs');
    if (caseStudies) {
        new Swiper(caseStudies, {
            loop: true,
            slidesPerView: 1,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            centeredSlides: true,
            modules: [Pagination],
            spaceBetween: 40,
            speed: 2000,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                782: { slidesPerView: 1 },
                960: { slidesPerView: 3 },
            },
        });
    }

    // Latest news
    const latestNews = document.querySelector('.swiper-latest-news');
    if (latestNews) {
        new Swiper(latestNews, {
            loop: true,
            slidesPerView: 1,
            autoplay: true,
            centeredSlides: false,
            modules: [Pagination, Navigation],
            spaceBetween: 24,
            speed: 800,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: '.news-next',
                prevEl: '.news-prev',
            },
            breakpoints: {
                782: { slidesPerView: 2, spaceBetween: 30 },
                960: { slidesPerView: 2.2, spaceBetween: 40 },
            },
        });
    }

    // Product guide
    const productGuide = document.querySelector('.swiper-product-guide');
    if (productGuide) {
        new Swiper(productGuide, {
            loop: false,
            slidesPerView: 1,
            modules: [Navigation, Pagination],
            spaceBetween: 20,
            speed: 2000,
            breakpoints: {
                960: { slidesPerView: 2, spaceBetween: 80 },
            },
            navigation: {
                nextEl: '.guide-next',
                prevEl: '.guide-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

}); // ends window load

// Product cards stacking
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.product-card');
    if (!cards.length) return;
    
    let lastScrollY = window.scrollY;
    let currentIndex = 0;

    // Add transition styles to all cards
    cards.forEach(card => {
        card.style.transition = 'top 0.6s cubic-bezier(0.25, 0.1, 0.25, 1), opacity 0.6s ease, transform 0.6s ease';
    });

    function updateStack(index) {
        if (index < 3) {
            cards.forEach(card => {
                card.style.position = '';
                card.style.top = '';
                card.style.opacity = '';
                card.style.transform = '';
            });
            return;
        }

        cards.forEach((card, i) => {
            if (i < index - 2) {
                // Cards that have scrolled out - fade and slide up
                card.style.position = 'relative';
                card.style.top = 'auto';
                card.style.opacity = '0';
                card.style.transform = 'translateY(-50px) scale(0.95)';
            } else if (i <= index) {
                // Visible stacked cards
                const stackPosition = i - (index - 2);
                card.style.position = 'sticky';
                card.style.top = (stackPosition * 8) + 'rem';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0) scale(1)';
            } else {
                // Cards waiting below
                card.style.position = 'sticky';
                card.style.top = '24rem';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0) scale(1)';
            }
        });
    }

    function initializeStackOnLoad() {
        // Temporarily disable transitions for initial setup
        cards.forEach(card => {
            card.style.transition = 'none';
        });

        let firstVisible = 0;

        for (let i = 0; i < cards.length; i++) {
            const rect = cards[i].getBoundingClientRect();

            if (rect.top >= 0 && rect.bottom > 0) {
                firstVisible = i;
                break;
            }
        }

        currentIndex = firstVisible;
        updateStack(currentIndex);

        // Re-enable transitions after initial setup
        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                cards.forEach(card => {
                    card.style.transition = 'top 0.6s cubic-bezier(0.25, 0.1, 0.25, 1), opacity 0.6s ease, transform 0.6s ease';
                });
            });
        });
    }

    initializeStackOnLoad();

    const observer = new IntersectionObserver((entries) => {
        const scrollingDown = window.scrollY > lastScrollY;
        lastScrollY = window.scrollY;

        entries.forEach(entry => {
            const entryIndex = Array.from(cards).indexOf(entry.target);

            if (scrollingDown && entry.isIntersecting) {
                currentIndex = Math.max(currentIndex, entryIndex);
                updateStack(currentIndex);
            } else if (!scrollingDown && !entry.isIntersecting && entry.boundingClientRect.top > 0) {
                currentIndex = Math.max(0, entryIndex - 1);
                updateStack(currentIndex);
            }
        });
    }, { threshold: 0.1, rootMargin: '-10% 0px -10% 0px' });

    cards.forEach(card => observer.observe(card));

    window.addEventListener('load', initializeStackOnLoad);
    setTimeout(initializeStackOnLoad, 50);
    setTimeout(initializeStackOnLoad, 200);
});

// Cycle function
async function cycle(selector, className = "active", ms = 1000, pause = 0) {
    const nodes = document.querySelectorAll(selector);
    const origins = [
        'center bottom',
        'center top',
        'left center',
        'right center',
        'top left',
        'top right',
        'bottom left',
        'bottom right'
    ];
    
    while (true) {
        for (const el of nodes) {
            const randomOrigin = origins[Math.floor(Math.random() * origins.length)];
            el.style.transformOrigin = randomOrigin;
            
            el.classList.add(className);
            await new Promise((r) => setTimeout(r, ms));
            el.classList.remove(className);
            if (pause) await new Promise((r) => setTimeout(r, pause));
        }
    }
}