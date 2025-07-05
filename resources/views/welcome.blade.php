<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L-PhotoBooth - Professional Camera Experience</title>
    <meta name="description" content="Professional photo booth services for weddings, parties, corporate events, and special occasions. Create unforgettable memories with L-PhotoBooth.">
    <meta name="keywords" content="photo booth, wedding, party, corporate events, photography, instant printing">
    <meta name="author" content="L-PhotoBooth">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="L-PhotoBooth - Professional Photo Booth Services">
    <meta property="og:description" content="Create unforgettable memories with our professional photo booth services">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('orang2.jpeg') }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="L-PhotoBooth - Professional Photo Booth Services">
    <meta name="twitter:description" content="Create unforgettable memories with our professional photo booth services">
    <meta name="twitter:image" content="{{ asset('images/twitter-image.jpg') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
        <p>Loading L-gasing</p>
    </div>

    <!-- Header -->
    <header class="header" id="header">
        <nav class="nav-container">
            <a href="#" class="logo">
                <i class="fas fa-camera"></i> L-Gasing
            </a>
            <ul class="nav-menu" id="navMenu">
                <li><a href="/">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#testimonials">Reviews</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="header-actions">
                <button class="camera-btn" id="openPhotoBooth">
                    <i class="fas fa-camera"></i>
                    <span>Cobaan Cekrek</span>
                </button>
                <button class="mobile-menu-toggle" id="mobileToggle" aria-label="Toggle mobile menu">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="#booking" class="cta-button">Book Now</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content" data-aos="fade-up">
            <h1>Capture Your Perfect Moments</h1>
            <p>Professional photo booth services for weddings, parties, corporate events, and special occasions. Create unforgettable memories with our state-of-the-art equipment and instant printing technology.</p>
            <div class="hero-buttons">
                <button class="btn-primary" id="tryPhotoBoothBtn">
                    <i class="fas fa-camera"></i>
                    Cekrek dulu bang
                </button>
                <a href="#gallery" class="btn-secondary">
                    <i class="fas fa-images"></i>
                    View Gallery
                </a>
                <a href="#contact" class="btn-secondary">
                    <i class="fas fa-phone"></i>
                    Contact Us
                </a>
            </div>
        </div>
        <div class="hero-stats" data-aos="fade-up" data-aos-delay="200">
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
            <div class="section-title" data-aos="fade-up">
                <h2>Why Choose L-PhotoBooth?</h2>
                <p>We provide premium photo booth experiences with cutting-edge technology and exceptional service that creates lasting memories for you and your guests.</p>
            </div>
            <div class="features-grid">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon">
                        <i class="fas fa-camera-retro"></i>
                    </div>
                    <h3>High-Quality Photos</h3>
                    <p>Professional DSLR cameras and studio lighting ensure every photo is picture-perfect with vibrant colors and sharp details that you'll treasure forever.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon">
                        <i class="fas fa-print"></i>
                    </div>
                    <h3>Instant Printing</h3>
                    <p>Get your photos printed instantly with our high-speed printers. Take home beautiful keepsakes within seconds of capturing your moment.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>Custom Backgrounds</h3>
                    <p>Choose from hundreds of digital backgrounds or create custom ones to match your event theme perfectly and make every photo unique.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <h3>Social Media Ready</h3>
                    <p>Instantly share your photos on social media platforms or send them via email and SMS to your guests for immediate enjoyment.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-icon">
                        <i class="fas fa-magic"></i>
                    </div>
                    <h3>Fun Props & Effects</h3>
                    <p>Extensive collection of props, filters, and special effects to make your photos more entertaining and memorable for everyone.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Professional Support</h3>
                    <p>Our experienced attendants ensure smooth operation and help your guests create amazing photos throughout the event with friendly assistance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery" id="gallery">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Photo Gallery</h2>
                <p>See the magic we create at various events and celebrations. Every moment captured tells a unique story.</p>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item" data-aos="fade-up" data-aos-delay="100" data-category="wedding">
                    <img src="{{ asset('storage/image/orang1.jpeg') }}" alt="Wedding Photo Booth Experience" loading="lazy">
                    <div class="gallery-overlay">
                        <h4>Wedding Celebration</h4>
                        <p>Beautiful moments captured with elegance</p>
                    </div>
                </div>
                <div class="gallery-item" data-aos="fade-up" data-aos-delay="200" data-category="corporate">
                    <img src="{{ asset('storage/image/orang2.jpeg') }}" alt="Corporate Event Photo Booth" loading="lazy">
                    <div class="gallery-overlay">
                        <h4>Corporate Event</h4>
                        <p>Professional networking made fun</p>
                    </div>
                </div>
                <div class="gallery-item" data-aos="fade-up" data-aos-delay="300" data-category="birthday">
                    <img src="{{ asset('storage/image/orang3.jpeg') }}" alt="Birthday Party Photo Booth Fun" loading="lazy">
                    <div class="gallery-overlay">
                        <h4>Birthday Party</h4>
                        <p>Memorable birthday celebrations</p>
                    </div>
                </div>
                <div class="gallery-item" data-aos="fade-up" data-aos-delay="400" data-category="party">
                    <img src="{{ asset('storage/image/orang4.jpeg') }}" alt="Party Photo Booth Entertainment" loading="lazy">
                    <div class="gallery-overlay">
                        <h4>Party Time</h4>
                        <p>Fun and laughter captured perfectly</p>
                    </div>
                </div>
            </div>
            <div class="gallery-load-more" data-aos="fade-up">
                <button class="btn-secondary" id="loadMoreGallery">
                    <i class="fas fa-plus"></i>
                    Load More Photos
                </button>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>What Our Clients Say</h2>
                <p>Don't just take our word for it - hear from our satisfied customers who experienced the L-PhotoBooth difference.</p>
            </div>
            <div class="testimonials-slider" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-item active">
                    <div class="testimonial-content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"L-PhotoBooth made our wedding absolutely perfect! The quality of photos was amazing and our guests couldn't stop talking about how much fun they had. The attendant was professional and helped everyone create beautiful memories. Highly recommended!"</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('storage/image/orang6.jpeg') }}" alt="Sarah & Mike Johnson" loading="lazy">
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
                        <p>"Professional service and fantastic results! Our corporate event was a huge success, and the photo booth was definitely a highlight. The team was punctual, professional, and the photo quality exceeded our expectations. Will definitely book again!"</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('images/testimonials/tech-corp.jpg') }}" alt="Tech Corp Inc." loading="lazy">
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
                        <p>"The kids had an absolute blast with all the props and backgrounds! It was the perfect addition to our daughter's birthday party. The photos turned out amazing and we have wonderful memories to cherish forever. Thank you L-PhotoBooth!"</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('images/testimonials/jennifer-smith.jpg') }}" alt="Jennifer Smith" loading="lazy">
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
            <div class="section-title" data-aos="fade-up">
                <h2>Pricing Plans</h2>
                <p>Choose the perfect package for your event. All packages include professional setup, operation, and cleanup.</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="pricing-header">
                        <h3>Basic Package</h3>
                        <div class="price">$299<span>/4 hours</span></div>
                        <p>Perfect for small gatherings and intimate events</p>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i>4 hours photo booth service</li>
                        <li><i class="fas fa-check"></i>Unlimited photos</li>
                        <li><i class="fas fa-check"></i>Basic props collection</li>
                        <li><i class="fas fa-check"></i>Instant printing (2 copies per photo)</li>
                        <li><i class="fas fa-check"></i>Digital gallery access</li>
                        <li><i class="fas fa-check"></i>Professional attendant</li>
                        <li><i class="fas fa-check"></i>Setup and breakdown included</li>
                    </ul>
                    <a href="#booking" class="btn-primary">Choose Plan</a>
                </div>
                <div class="pricing-card featured" data-aos="fade-up" data-aos-delay="200">
                    <div class="pricing-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h3>Premium Package</h3>
                        <div class="price">$499<span>/6 hours</span></div>
                        <p>Great for weddings and larger celebrations</p>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i>6 hours photo booth service</li>
                        <li><i class="fas fa-check"></i>Unlimited photos</li>
                        <li><i class="fas fa-check"></i>Premium props & backdrops</li>
                        <li><i class="fas fa-check"></i>Instant printing (3 copies per photo)</li>
                        <li><i class="fas fa-check"></i>Custom photo templates</li>
                        <li><i class="fas fa-check"></i>Social media sharing station</li>
                        <li><i class="fas fa-check"></i>Digital gallery & USB drive</li>
                        <li><i class="fas fa-check"></i>Professional attendant</li>
                        <li><i class="fas fa-check"></i>Setup and breakdown included</li>
                    </ul>
                    <a href="#booking" class="btn-primary">Choose Plan</a>
                </div>
                <div class="pricing-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="pricing-header">
                        <h3>Deluxe Package</h3>
                        <div class="price">$799<span>/8 hours</span></div>
                        <p>Ultimate experience for premium events</p>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i>8 hours photo booth service</li>
                        <li><i class="fas fa-check"></i>Unlimited photos & videos</li>
                        <li><i class="fas fa-check"></i>Deluxe props & custom backdrops</li>
                        <li><i class="fas fa-check"></i>Instant printing (4 copies per photo)</li>
                        <li><i class="fas fa-check"></i>Custom branding & templates</li>
                        <li><i class="fas fa-check"></i>Social media integration</li>
                        <li><i class="fas fa-check"></i>Digital gallery & USB drive</li>
                        <li><i class="fas fa-check"></i>Guest book creation</li>
                        <li><i class="fas fa-check"></i>2 professional attendants</li>
                        <li><i class="fas fa-check"></i>Premium setup and breakdown</li>
                    </ul>
                    <a href="#booking" class="btn-primary">Choose Plan</a>
                </div>
            </div>
            <div class="pricing-note" data-aos="fade-up">
                <p><i class="fas fa-info-circle"></i> All packages include setup, breakdown, and travel within 25 miles. Additional fees may apply for locations beyond our standard service area. Custom packages available upon request.</p>
            </div>
        </div>
    </section>

    

    <!-- Photo Booth Modal -->
    <div class="photobooth-modal" id="photoBoothModal">
        <div class="photobooth-container">
            <button class="close-photobooth" id="closePhotoBooth" aria-label="Close photo booth">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="photobooth-header">
                <h2><i class="fas fa-camera"></i> L-PhotoBooth Experience</h2>
                <p>Create amazing photos with professional effects and filters</p>
            </div>

            <div class="camera-container">
                <div class="camera-frame">
                    <video id="cameraVideo" autoplay muted playsinline></video>
                    <canvas id="capturedCanvas"></canvas>
                    
                    <!-- Video Effects Overlay -->
                    <div class="video-effects" id="videoEffects"></div>
                    
                    <!-- Frame Overlay -->
                    <div class="frame-overlay" id="frameOverlay">
                        <div class="frame-border"></div>
                        <div class="frame-corners top-left"></div>
                        <div class="frame-corners top-right"></div>
                        <div class="frame-corners bottom-left"></div>
                        <div class="frame-corners bottom-right"></div>
                    </div>
                    
                    <!-- Countdown -->
                    <div class="countdown" id="countdown">3</div>
                </div>
                
                <div class="camera-status" id="cameraStatus">
                    <i class="fas fa-circle"></i> Initializing camera...
                </div>
            </div>

            <!-- Controls Section -->
            <div class="controls-section">
                <!-- Control Tabs -->
                <div class="controls-tabs">
                    <button class="tab-btn active" data-tab="effects">
                        <i class="fas fa-magic"></i> Effects
                    </button>
                    <button class="tab-btn" data-tab="frames">
                        <i class="fas fa-border-style"></i> Frames
                    </button>
                    <button class="tab-btn" data-tab="settings">
                        <i class="fas fa-cog"></i> Settings
                    </button>
                </div>

                <!-- Controls Content -->
                <div class="controls-content">
                    <!-- Effects Tab -->
                    <div class="tab-content active" id="effectsTab">
                        <div class="effects-grid">
                            <div class="effect-option active" data-effect="none">
                                <i class="fas fa-eye"></i>
                                <span>Normal</span>
                            </div>
                            <div class="effect-option" data-effect="sepia">
                                <i class="fas fa-leaf"></i>
                                <span>Sepia</span>
                            </div>
                            <div class="effect-option" data-effect="grayscale">
                                <i class="fas fa-adjust"></i>
                                <span>B&W</span>
                            </div>
                            <div class="effect-option" data-effect="vintage">
                                <i class="fas fa-camera-retro"></i>
                                <span>Vintage</span>
                            </div>
                            <div class="effect-option" data-effect="cool">
                                <i class="fas fa-snowflake"></i>
                                <span>Cool</span>
                            </div>
                            <div class="effect-option" data-effect="warm">
                                <i class="fas fa-sun"></i>
                                <span>Warm</span>
                            </div>
                            <div class="effect-option" data-effect="dramatic">
                                <i class="fas fa-bolt"></i>
                                <span>Drama</span>
                            </div>
                            <div class="effect-option" data-effect="dreamy">
                                <i class="fas fa-cloud"></i>
                                <span>Dreamy</span>
                            </div>
                            <div class="effect-option" data-effect="pop">
                                <i class="fas fa-star"></i>
                                <span>Pop</span>
                            </div>
                            <div class="effect-option" data-effect="noir">
                                <i class="fas fa-moon"></i>
                                <span>Noir</span>
                            </div>
                            <div class="effect-option" data-effect="invert">
                                <i class="fas fa-yin-yang"></i>
                                <span>Invert</span>
                            </div>
                            <div class="effect-option" data-effect="saturate">
                                <i class="fas fa-palette"></i>
                                <span>Vibrant</span>
                            </div>
                        </div>
                    </div>

                    <!-- Frames Tab -->
                    <div class="tab-content" id="framesTab">
                        <div class="frame-selector">
                            <div class="frame-option classic active" data-frame="classic" title="Classic Frame"></div>
                            <div class="frame-option vintage" data-frame="vintage" title="Vintage Frame"></div>
                            <div class="frame-option modern" data-frame="modern" title="Modern Frame"></div>
                            <div class="frame-option party" data-frame="party" title="Party Frame"></div>
                            <div class="frame-option polaroid" data-frame="polaroid" title="Polaroid Photo"></div>
                            <div class="frame-option polaroid-strip" data-frame="polaroid-strip" title="Polaroid Strip (4 Photos)"></div>
                        </div>
                    </div>

                    <!-- Settings Tab -->
                    <div class="tab-content" id="settingsTab">
                        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                            <button class="control-btn" id="switchCamera">
                                <i class="fas fa-sync-alt"></i> Switch Camera
                            </button>
                            <button class="control-btn" id="toggleFlash">
                                <i class="fas fa-flash"></i> Flash
                            </button>
                            <button class="control-btn" id="toggleGrid">
                                <i class="fas fa-th"></i> Grid
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Camera Controls -->
            <div class="camera-controls">
                <button class="capture-btn" id="capturePhoto" title="Take Photo">
                    <i class="fas fa-camera"></i>
                </button>
            </div>

            <!-- Photo Preview -->
            <div class="photo-preview" id="photoPreview">
                <h3>Your Photo</h3>
                <img id="previewImage" alt="Captured photo">
                <div class="photo-actions">
                    <button class="control-btn" id="retakePhoto">
                        <i class="fas fa-redo"></i> Retake
                    </button>
                    <button class="control-btn" id="downloadPhoto">
                        <i class="fas fa-download"></i> Download
                    </button>
                    <button class="control-btn" id="sharePhoto">
                        <i class="fas fa-share"></i> Share
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <i class="fas fa-camera"></i> L-PhotoBooth
                    </div>
                    <p>Creating unforgettable memories with professional photo booth services for all your special occasions. We bring the fun, you bring the smiles!</p>
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
                        <li><a href="/">Home</a></li>
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
                    <p>&copy; 2024 L-PhotoBooth. All rights reserved. Made with ❤️ for creating memories.</p>
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

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    </script>

    <!-- Photo Booth JavaScript -->
    <script src="{{ asset('js/main1.js') }}"></script>

    <!-- Google Analytics (replace with your tracking ID) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_TRACKING_ID');
    </script>

    
    <!-- Performance Monitoring -->
    <script src="{{ asset('js/main1.js') }}"></script>

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Testimonials Slider -->
    <script src="{{ asset('js/main1.js') }}"></script>
    
</body>
</html>
