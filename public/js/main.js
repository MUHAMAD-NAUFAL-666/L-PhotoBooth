// L-PhotoBooth Main JavaScript File
class LPhotoBoothApp {
    constructor() {
        this.init();
    }

    init() {
        this.setupEventListeners();
        this.initializeAnimations();
        this.setupScrollEffects();
        this.createScrollToTopButton();
        this.setupMobileMenu();
        this.setupLoadingScreen();
        this.setupCustomCursor();
        this.setupAccessibility();
        
        console.log('L-PhotoBooth website loaded successfully! 📸✨');
    }

    // Loading Screen
    setupLoadingScreen() {
        window.addEventListener('load', () => {
            const loading = document.getElementById('loading');
            if (loading) {
                setTimeout(() => {
                    loading.classList.add('hidden');
                }, 1000);
            }
        });
    }

    // Mobile Menu
    setupMobileMenu() {
        const mobileToggle = document.getElementById('mobileToggle');
        const navMenu = document.getElementById('navMenu');

        if (mobileToggle && navMenu) {
            mobileToggle.addEventListener('click', () => {
                navMenu.classList.toggle('active');
                const icon = mobileToggle.querySelector('i');
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-times');
            });
        }
    }

    // Smooth Scrolling
    setupEventListeners() {
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                e.preventDefault();
                const target = document.querySelector(anchor.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu if open
                    this.closeMobileMenu();
                }
            });
        });

        // Button click effects
        this.setupButtonEffects();
        
        // Gallery item interactions
        this.setupGalleryEffects();
        
        // Pricing card effects
        this.setupPricingEffects();
    }

    closeMobileMenu() {
        const navMenu = document.getElementById('navMenu');
        const mobileToggle = document.getElementById('mobileToggle');
        
        if (navMenu && mobileToggle) {
            navMenu.classList.remove('active');
            const icon = mobileToggle.querySelector('i');
            icon.classList.add('fa-bars');
            icon.classList.remove('fa-times');
        }
    }

    // Scroll Effects
    setupScrollEffects() {
        // Header scroll effect
        window.addEventListener('scroll', this.debounce(() => {
            this.handleHeaderScroll();
            this.handleParallaxEffect();
            this.handleScrollToTopButton();
        }, 10));

        // Scroll animations
        this.setupScrollAnimations();
    }

    handleHeaderScroll() {
        const header = document.querySelector('.header');
        if (header) {
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.98)';
                header.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
            } else {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.boxShadow = 'none';
            }
        }
    }

    handleParallaxEffect() {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('.hero');
        if (hero) {
            const rate = scrolled * -0.5;
            hero.style.transform = `translateY(${rate}px)`;
        }
    }

    handleScrollToTopButton() {
        const scrollToTop = document.querySelector('.scroll-to-top');
        if (scrollToTop) {
            if (window.pageYOffset > 300) {
                scrollToTop.classList.add('visible');
            } else {
                scrollToTop.classList.remove('visible');
            }
        }
    }

    // Scroll Animations
    setupScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Gallery lazy loading
        this.setupGalleryLazyLoading();
        
        // Pricing animation
        this.setupPricingAnimation();
    }

    setupGalleryLazyLoading() {
        const galleryItems = document.querySelectorAll('.gallery-item');
        const galleryObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'scale(1)';
                }
            });
        });

        galleryItems.forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'scale(0.8)';
            item.style.transition = 'all 0.6s ease';
            galleryObserver.observe(item);
        });
    }

    setupPricingAnimation() {
        const pricingObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const priceElement = entry.target.querySelector('.price');
                    if (priceElement) {
                        const priceText = priceElement.textContent;
                        const priceValue = parseInt(priceText.replace('$', ''));
                        if (!isNaN(priceValue)) {
                            this.animateCounter(priceElement, priceValue);
                        }
                    }
                    pricingObserver.unobserve(entry.target);
                }
            });
        });

        document.querySelectorAll('.pricing-card').forEach(card => {
            pricingObserver.observe(card);
        });
    }

    // Initialize Animations
    initializeAnimations() {
        // Typing effect for hero title
        setTimeout(() => {
            const heroTitle = document.querySelector('.hero h1');
            if (heroTitle) {
                const originalText = heroTitle.textContent;
                this.typeWriter(heroTitle, originalText, 80);
            }
        }, 1500);

        // Stagger animations for cards
        this.setupStaggerAnimations();
    }

    setupStaggerAnimations() {
        // Feature cards
        const featureCards = document.querySelectorAll('.feature-card');
        featureCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
        });

        // Pricing cards
        const pricingCards = document.querySelectorAll('.pricing-card');
        pricingCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.2}s`;
        });
    }

    // Button Effects
    setupButtonEffects() {
        document.querySelectorAll('.btn-primary, .btn-secondary, .cta-button').forEach(button => {
            button.addEventListener('click', (e) => {
                // Track button clicks
                console.log('Button clicked:', button.textContent.trim());
                
                // Add ripple effect
                this.createRippleEffect(button, e);
            });
        });
    }

    createRippleEffect(button, event) {
        const ripple = document.createElement('span');
        ripple.style.cssText = `
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.6);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        `;
        
        const rect = button.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = (event.clientX - rect.left - size / 2) + 'px';
        ripple.style.top = (event.clientY - rect.top - size / 2) + 'px';
        
        button.appendChild(ripple);
        
        setTimeout(() => {
            ripple.remove();
        }, 600);
    }

    // Gallery Effects
    setupGalleryEffects() {
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('click', function() {
                // Add click animation
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1.05)';
                }, 100);
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);
            });
        });
    }

    // Pricing Effects
    setupPricingEffects() {
        document.querySelectorAll('.pricing-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                if (!this.classList.contains('featured')) {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                    this.style.boxShadow = '0 20px 40px rgba(0,0,0,0.15)';
                }
            });

            card.addEventListener('mouseleave', function() {
                if (!this.classList.contains('featured')) {
                    this.style.transform = 'translateY(0) scale(1)';
                    this.style.boxShadow = '0 4px 20px rgba(0,0,0,0.1)';
                }
            });
        });

        // Feature icon hover effect
        document.querySelectorAll('.feature-icon').forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                this.style.animation = 'float 2s ease-in-out infinite';
            });
            
            icon.addEventListener('mouseleave', function() {
                this.style.animation = 'none';
            });
        });
    }

    // Scroll to Top Button
    createScrollToTopButton() {
        const scrollToTop = document.createElement('button');
        scrollToTop.innerHTML = '<i class="fas fa-arrow-up"></i>';
        scrollToTop.className = 'scroll-to-top';
        scrollToTop.setAttribute('aria-label', 'Scroll to top');

        document.body.appendChild(scrollToTop);

        scrollToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        scrollToTop.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.1)';
        });

        scrollToTop.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    }

    // Custom Cursor
    setupCustomCursor() {
        if (window.innerWidth > 768) {
            const cursor = document.createElement('div');
            cursor.className = 'custom-cursor';
            document.body.appendChild(cursor);

            document.addEventListener('mousemove', (e) => {
                cursor.style.left = e.clientX - 10 + 'px';
                cursor.style.top = e.clientY - 10 + 'px';
            });
        }
    }

    // Accessibility
    setupAccessibility() {
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                this.closeMobileMenu();
            }
        });

        // Focus management
        document.querySelectorAll('a, button').forEach(element => {
            element.addEventListener('focus', function() {
                this.style.outline = '2px solid #6366f1';
                this.style.outlineOffset = '2px';
            });
            
            element.addEventListener('blur', function() {
                this.style.outline = 'none';
            });
        });
    }

    // Utility Functions
    typeWriter(element, text, speed = 100) {
        let i = 0;
        element.innerHTML = '';
        function type() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }

    animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = '$' + target;
                clearInterval(timer);
            } else {
                element.textContent = '$' + Math.floor(start);
            }
        }, 16);
    }

    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Email validation utility
    validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Testimonials data (for future use)
    getTestimonials() {
        return [
            {
                text: "L-PhotoBooth made our wedding absolutely perfect! The quality of photos was amazing and our guests loved it!",
                author: "Sarah & Mike Johnson",
                event: "Wedding"
            },
            {
                text: "Professional service and fantastic results. Highly recommend for corporate events!",
                author: "Tech Corp Inc.",
                event: "Corporate Event"
            },
            {
                text: "The kids had so much fun with all the props. Great addition to our birthday party!",
                author: "Jennifer Smith",
                event: "Birthday Party"
            }
        ];
    }

    // Contact form handler (for future implementation)
    handleContactForm(formData) {
        // This would handle form submission
        console.log('Contact form submitted:', formData);
        
        // Add form validation
        const { name, email, message } = formData;
        
        if (!name || !email || !message) {
            throw new Error('All fields are required');
        }
        
        if (!this.validateEmail(email)) {
            throw new Error('Please enter a valid email address');
        }
        
        // Here you would typically send the data to your backend
        return Promise.resolve({ success: true, message: 'Message sent successfully!' });
    }

    // Gallery image loader (for future implementation)
    loadGalleryImages(images) {
        const galleryItems = document.querySelectorAll('.gallery-item');
        
        images.forEach((image, index) => {
            if (galleryItems[index]) {
                const img = document.createElement('img');
                img.src = image.src;
                img.alt = image.alt;
                img.style.cssText = `
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    border-radius: 15px;
                `;
                
                galleryItems[index].innerHTML = '';
                galleryItems[index].appendChild(img);
            }
        });
    }

    // Booking modal (for future implementation)
    openBookingModal() {
        // This would open a booking modal
        console.log('Opening booking modal...');
    }

    // Social media sharing
    shareOnSocialMedia(platform, url, text) {
        const shareUrls = {
            facebook: `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`,
            twitter: `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`,
            linkedin: `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`,
            whatsapp: `https://wa.me/?text=${encodeURIComponent(text + ' ' + url)}`
        };

        if (shareUrls[platform]) {
            window.open(shareUrls[platform], '_blank', 'width=600,height=400');
        }
    }

    // Performance monitoring
    measurePerformance() {
        if ('performance' in window) {
            window.addEventListener('load', () => {
                setTimeout(() => {
                    const perfData = performance.getEntriesByType('navigation')[0];
                    console.log('Page load time:', perfData.loadEventEnd - perfData.loadEventStart, 'ms');
                }, 0);
            });
        }
    }

    // Error handling
    handleError(error, context = '') {
        console.error(`Error in ${context}:`, error);
        
        // You could send this to an error tracking service
        // this.sendErrorToTracking(error, context);
    }

    // Initialize everything when DOM is ready
    static init() {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                new LPhotoBoothApp();
            });
        } else {
            new LPhotoBoothApp();
        }
    }
}

// Initialize the application
LPhotoBoothApp.init();

// Export for potential module use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = LPhotoBoothApp;
}

