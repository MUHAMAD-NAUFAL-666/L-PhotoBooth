<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L-PhotoBooth - Professional Photo Booth Services</title>
    <meta name="description" content="Professional photo booth services for weddings, parties, corporate events, and special occasions. Create unforgettable memories with L-PhotoBooth.">
    <meta name="keywords" content="photo booth, wedding, party, corporate events, photography, instant printing">
    <meta name="author" content="L-PhotoBooth">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="L-PhotoBooth - Professional Photo Booth Services">
    <meta property="og:description" content="Create unforgettable memories with our professional photo booth services">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="L-PhotoBooth - Professional Photo Booth Services">
    <meta name="twitter:description" content="Create unforgettable memories with our professional photo booth services">
    <meta name="twitter:image" content="{{ asset('images/twitter-image.jpg') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    
    
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
        <p>Loading L-PhotoBooth...</p>
    </div>

    <!-- Header -->
    <header class="header">
        <nav class="nav-container">
            <a href="#" class="logo">
                <i class="fas fa-camera"></i> L-PhotoBooth
            </a>
            <ul class="nav-menu" id="navMenu">
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#testimonials">Reviews</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <button class="mobile-menu-toggle" id="mobileToggle" aria-label="Toggle mobile menu">
                <i class="fas fa-bars"></i>
            </button>
            <a href="#booking" class="cta-button">Book Now</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Capture Your Perfect Moments</h1>
            <p>Professional photo booth services for weddings, parties, corporate events, and special occasions. Create unforgettable memories with our state-of-the-art equipment and instant printing.</p>
            <div class="hero-buttons">
                <a href="#gallery" class="btn-primary">
                    <i class="fas fa-images"></i>
                    View Gallery
                </a>
                <a href="#contact" class="btn-secondary">Get Quote</a>
            </div>
        </div>
        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number">500+</span>
                <span class="stat-label">Events Covered</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">10K+</span>
                <span class="stat-label">Happy Guests</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">5★</span>
                <span class="stat-label">Average Rating</span>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Why Choose L-PhotoBooth?</h2>
                <p>We provide premium photo booth experiences with cutting-edge technology and exceptional service</p>
            </div>
            <div class="features-grid">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-camera-retro"></i>
                    </div>
                    <h3>High-Quality Photos</h3>
                    <p>Professional DSLR cameras and studio lighting ensure every photo is picture-perfect with vibrant colors and sharp details.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-print"></i>
                    </div>
                    <h3>Instant Printing</h3>
                    <p>Get your photos printed instantly with our high-speed printers. Take home beautiful keepsakes within seconds.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>Custom Backgrounds</h3>
                    <p>Choose from hundreds of digital backgrounds or create custom ones to match your event theme perfectly.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <h3>Social Media Ready</h3>
                    <p>Instantly share your photos on social media platforms or send them via email and SMS to your guests.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-magic"></i>
                    </div>
                    <h3>Fun Props & Effects</h3>
                    <p>Extensive collection of props, filters, and special effects to make your photos more entertaining and memorable.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Professional Support</h3>
                    <p>Our experienced attendants ensure smooth operation and help your guests create amazing photos throughout the event.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery" id="gallery">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Photo Gallery</h2>
                <p>See the magic we create at various events and celebrations</p>
            </div>
            <div class="gallery-filter fade-in">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="wedding">Weddings</button>
                <button class="filter-btn" data-filter="corporate">Corporate</button>
                <button class="filter-btn" data-filter="birthday">Birthdays</button>
                <button class="filter-btn" data-filter="party">Parties</button>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item fade-in" data-category="wedding">
                    <img src="../storage/image/orang1.jpeg" alt="Wedding Photo Booth" loading="lazy">
                    <div class="gallery-overlay">
                        <h4>Wedding Celebration</h4>
                        <p>Beautiful moments captured</p>
                    </div>
                </div>
                <div class="gallery-item fade-in" data-category="corporate">
                    <img src="../storage/image/orang2.jpeg" alt="Corporate Event Photo Booth" loading="lazy">
                    <div class="gallery-overlay">
                        <h4>Corporate Event</h4>
                        <p>Professional networking fun</p>
                    </div>
                </div>
                <div class="gallery-item fade-in" data-category="birthday">
                    <img src="../storage/image/orang3.jpeg" alt="Birthday Party Photo Booth" loading="lazy">
                    <div class="gallery-overlay">
                        <h4>Birthday Party</h4>
                        <p>Memorable birthday moments</p>
                    </div>
                </div>
                <div class="gallery-item fade-in" data-category="party">
                    <img src="../storage/image/orang4.jpeg" alt="Party Photo Booth" loading="lazy">
                    <div class="gallery-overlay">
                        <h4>Party Time</h4>
                        <p>Fun and laughter captured</p>
                    </div>
                </div>
                
            </div>
            <div class="gallery-load-more fade-in">
                <button class="btn-secondary" id="loadMoreGallery">Load More Photos</button>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-title fade-in">
                <h2>What Our Clients Say</h2>
                <p>Don't just take our word for it - hear from our satisfied customers</p>
            </div>
            <div class="testimonials-slider fade-in">
                <div class="testimonial-item active">
                    <div class="testimonial-content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"L-PhotoBooth made our wedding absolutely perfect! The quality of photos was amazing and our guests loved it. The attendant was professional and helped everyone have a great time."</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('images/testimonials/sarah-mike.jpg') }}" alt="Sarah & Mike Johnson">
                            <div>
                                <h4>Sarah & Mike Johnson</h4>
                                <span>Wedding - June 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Professional service and fantastic results. Our corporate event was a huge success, and the photo booth was definitely a highlight. Highly recommend for business events!"</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('images/testimonials/tech-corp.jpg') }}" alt="Tech Corp Inc.">
                            <div>
                                <h4>Jennifer Martinez</h4>
                                <span>Tech Corp Inc. - Corporate Event</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"The kids had so much fun with all the props and backgrounds. It was the perfect addition to our daughter's birthday party.</p>
                                                <p>"The kids had so much fun with all the props and backgrounds. It was the perfect addition to our daughter's birthday party. The photos turned out amazing and we have wonderful memories to cherish forever!"</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('images/testimonials/jennifer-smith.jpg') }}" alt="Jennifer Smith">
                            <div>
                                <h4>Jennifer Smith</h4>
                                <span>Birthday Party - March 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-controls">
                <button class="testimonial-prev" aria-label="Previous testimonial">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="testimonial-dots">
                    <span class="dot active" data-slide="0"></span>
                    <span class="dot" data-slide="1"></span>
                    <span class="dot" data-slide="2"></span>
                </div>
                <button class="testimonial-next" aria-label="Next testimonial">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing" id="pricing">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Pricing Plans</h2>
                <p>Choose the perfect package for your event</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card fade-in">
                    <div class="pricing-header">
                        <h3>Basic Package</h3>
                        <div class="price">$299<span>/4 hours</span></div>
                        <p>Perfect for small gatherings</p>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i>4 hours photo booth service</li>
                        <li><i class="fas fa-check"></i>Unlimited photos</li>
                        <li><i class="fas fa-check"></i>Basic props collection</li>
                        <li><i class="fas fa-check"></i>Instant printing (2 copies)</li>
                        <li><i class="fas fa-check"></i>Digital gallery access</li>
                        <li><i class="fas fa-check"></i>Professional attendant</li>
                    </ul>
                    <a href="#booking" class="btn-primary">Choose Plan</a>
                </div>
                <div class="pricing-card featured fade-in">
                    <div class="pricing-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h3>Premium Package</h3>
                        <div class="price">$499<span>/6 hours</span></div>
                        <p>Great for weddings & parties</p>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i>6 hours photo booth service</li>
                        <li><i class="fas fa-check"></i>Unlimited photos</li>
                        <li><i class="fas fa-check"></i>Premium props & backdrops</li>
                        <li><i class="fas fa-check"></i>Instant printing (3 copies)</li>
                        <li><i class="fas fa-check"></i>Custom photo templates</li>
                        <li><i class="fas fa-check"></i>Social media sharing</li>
                        <li><i class="fas fa-check"></i>Digital gallery & USB drive</li>
                        <li><i class="fas fa-check"></i>Professional attendant</li>
                    </ul>
                    <a href="#booking" class="btn-primary">Choose Plan</a>
                </div>
                <div class="pricing-card fade-in">
                    <div class="pricing-header">
                        <h3>Deluxe Package</h3>
                        <div class="price">$799<span>/8 hours</span></div>
                        <p>Ultimate experience package</p>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i>8 hours photo booth service</li>
                        <li><i class="fas fa-check"></i>Unlimited photos & videos</li>
                        <li><i class="fas fa-check"></i>Deluxe props & custom backdrops</li>
                        <li><i class="fas fa-check"></i>Instant printing (4 copies)</li>
                        <li><i class="fas fa-check"></i>Custom branding & templates</li>
                        <li><i class="fas fa-check"></i>Social media integration</li>
                        <li><i class="fas fa-check"></i>Digital gallery & USB drive</li>
                        <li><i class="fas fa-check"></i>Guest book creation</li>
                        <li><i class="fas fa-check"></i>2 professional attendants</li>
                    </ul>
                    <a href="#booking" class="btn-primary">Choose Plan</a>
                </div>
            </div>
            <div class="pricing-note fade-in">
                <p><i class="fas fa-info-circle"></i> All packages include setup, breakdown, and travel within 25 miles. Additional fees may apply for locations beyond our standard service area.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <i class="fas fa-camera"></i> L-PhotoBooth
                    </div>
                    <p>Creating unforgettable memories with professional photo booth services for all your special occasions.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#testimonials">Reviews</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Services</h4>
                    <ul class="footer-links">
                        <li><a href="#booking">Wedding Photo Booth</a></li>
                        <li><a href="#booking">Corporate Events</a></li>
                        <li><a href="#booking">Birthday Parties</a></li>
                        <li><a href="#booking">Holiday Parties</a></li>
                        <li><a href="#booking">Graduation Events</a></li>
                        <li><a href="#booking">Custom Packages</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contact Info</h4>
                    <div class="footer-contact">
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+1 (555) 123-4567</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>info@lphotobooth.com</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Greater Metro Area</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <span>Mon-Fri: 9AM-6PM</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p>&copy; 2024 L-PhotoBooth. All rights reserved.</p>
                    <div class="footer-bottom-links">
                        <a href="#privacy">Privacy Policy</a>
                        <a href="#terms">Terms of Service</a>
                        <a href="#sitemap">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" aria-label="Back to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Contact Modal -->
    <div class="contact-modal" id="contactModal">
        <div class="contact-modal-content">
            <button class="contact-modal-close" id="closeModal" aria-label="Close modal">
                <i class="fas fa-times"></i>
            </button>
            <h3>Quick Contact</h3>
            <form id="quickContactForm">
                <div class="form-group">
                    <label for="quickName" class="form-label">Name *</label>
                    <input type="text" id="quickName" name="name" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="quickEmail" class="form-label">Email *</label>
                    <input type="email" id="quickEmail" name="email" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="quickMessage" class="form-label">Message *</label>
                    <textarea id="quickMessage" name="message" class="form-textarea" required placeholder="How can we help you?"></textarea>
                </div>
                <button type="submit" class="form-submit" data-original-text="Send Message">
                    <i class="fas fa-paper-plane"></i>
                    Send Message
                </button>
            </form>
        </div>
    </div>

    

    <!-- Scripts -->
    <script src="{{ asset('js/config.js') }}"></script>
    <script src="{{ asset('js/forms.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Google Analytics (replace with your tracking ID) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_TRACKING_ID');
    </script>

    <!-- Schema.org Structured Data for Events -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Service",
        "name": "Photo Booth Rental Service",
        "provider": {
            "@type": "LocalBusiness",
            "name": "L-PhotoBooth"
        },
        "description": "Professional photo booth rental services for weddings, parties, corporate events, and special occasions",
        "serviceType": "Photo Booth Rental",
        "areaServed": {
            "@type": "GeoCircle",
            "geoMidpoint": {
                "@type": "GeoCoordinates",
                "latitude": "40.7128",
                "longitude": "-74.0060"
            },
            "geoRadius": "50000"
        },
        "offers": [
            {
                "@type": "Offer",
                "name": "Basic Package",
                "price": "299",
                "priceCurrency": "USD",
                "description": "4 hours photo booth service with basic features"
            },
            {
                "@type": "Offer",
                "name": "Premium Package",
                "price": "499",
                "priceCurrency": "USD",
                "description": "6 hours photo booth service with premium features"
            },
            {
                "@type": "Offer",
                "name": "Deluxe Package",
                "price": "799",
                "priceCurrency": "USD",
                "description": "8 hours photo booth service with deluxe features"
            }
        ]
    }
    </script>

    <!-- Performance Monitoring -->
    <script>
        // Performance monitoring
        window.addEventListener('load', function() {
            // Hide loading screen
            const loading = document.getElementById('loading');
            if (loading) {
                loading.style.opacity = '0';
                setTimeout(() => {
                    loading.style.display = 'none';
                }, 500);
            }

            // Log performance metrics
            if ('performance' in window) {
                const perfData = performance.timing;
                const loadTime = perfData.loadEventEnd - perfData.navigationStart;
                console.log('Page load time:', loadTime + 'ms');
            }
        });

        // Error tracking
        window.addEventListener('error', function(e) {
            console.error('JavaScript error:', e.error);
            // You can send this to your error tracking service
        });
    </script>
    
</body>
</html>

