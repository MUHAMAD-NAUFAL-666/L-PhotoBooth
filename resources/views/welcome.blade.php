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
    
    <!-- Photo Booth Camera Styles -->
    <style>
        .photobooth-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(5px);
        }

        .photobooth-container {
            position: relative;
            width: 90%;
            max-width: 800px;
            margin: 2% auto;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .photobooth-header {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .photobooth-header h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .camera-container {
            position: relative;
            width: 100%;
            max-width: 640px;
            margin: 0 auto;
            background: #000;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .camera-frame {
            position: relative;
            width: 100%;
            height: 480px;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #cameraVideo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scaleX(-1); /* Mirror effect */
        }

        #capturedCanvas {
            display: none;
            width: 100%;
            height: 100%;
        }

        .frame-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 10;
        }

        .frame-border {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 4px solid #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        }

        .frame-corners {
            position: absolute;
            width: 30px;
            height: 30px;
            border: 3px solid #ffd700;
        }

        .frame-corners.top-left {
            top: 10px;
            left: 10px;
            border-right: none;
            border-bottom: none;
        }

        .frame-corners.top-right {
            top: 10px;
            right: 10px;
            border-left: none;
            border-bottom: none;
        }

        .frame-corners.bottom-left {
            bottom: 10px;
            left: 10px;
            border-right: none;
            border-top: none;
        }

        .frame-corners.bottom-right {
            bottom: 10px;
            right: 10px;
            border-left: none;
            border-top: none;
        }

        .camera-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .capture-btn {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            border: 4px solid #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .capture-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }

        .capture-btn:active {
            transform: scale(0.95);
        }

        .control-btn {
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .control-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .control-btn.active {
            background: #4CAF50;
            border-color: #4CAF50;
        }

        .close-photobooth {
            position: absolute;
            top: 15px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            font-size: 1.5rem;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close-photobooth:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }

        .photo-preview {
            display: none;
            margin-top: 20px;
            text-align: center;
        }

        .photo-preview img {
            max-width: 300px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .photo-actions {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .countdown {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 8rem;
            color: #fff;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
            z-index: 20;
            display: none;
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0% { transform: translate(-50%, -50%) scale(1); }
            50% { transform: translate(-50%, -50%) scale(1.1); }
            100% { transform: translate(-50%, -50%) scale(1); }
        }

        .camera-status {
            text-align: center;
            color: white;
            margin-top: 10px;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .frame-selector {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .frame-option {
            width: 60px;
            height: 60px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            background-size: cover;
            background-position: center;
        }

        .frame-option:hover,
        .frame-option.active {
            border-color: #ffd700;
            transform: scale(1.1);
        }

        .frame-option.classic {
            background: linear-gradient(45deg, #667eea, #764ba2);
        }

        .frame-option.vintage {
            background: linear-gradient(45deg, #8B4513, #D2691E);
        }

        .frame-option.modern {
            background: linear-gradient(45deg, #000, #333);
        }

        .frame-option.party {
            background: linear-gradient(45deg, #ff6b6b, #feca57);
        }

        @media (max-width: 768px) {
            .photobooth-container {
                width: 95%;
                margin: 1% auto;
                padding: 15px;
            }

            .photobooth-header h2 {
                font-size: 2rem;
            }

            .camera-frame {
                height: 360px;
            }

            .capture-btn {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .countdown {
                font-size: 6rem;
            }
        }
    </style>
    
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
            <div class="header-actions">
                <button class="camera-btn" id="openPhotoBooth" aria-label="Open Photo Booth">
                    <i class="fas fa-camera"></i>
                    <span>Photo Booth</span>
                </button>
                <a href="#booking" class="cta-button">Book Now</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Capture Your Perfect Moments</h1>
            <p>Professional photo booth services for weddings, parties, corporate events, and special occasions. Create unforgettable memories with our state-of-the-art equipment and instant printing.</p>
            <div class="hero-buttons">
                <button class="btn-primary" id="tryPhotoBoothBtn">
                    <i class="fas fa-camera"></i>
                    Try Photo Booth
                </button>
                <a href="#gallery" class="btn-secondary">
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
                        <div class="price">$4.00<span>/4 hours</span></div>
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
                        <div class="price">$6.00<span>/6 hours</span></div>
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
                        <div class="price">$9.00<span>/8 hours</span></div>
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

    <!-- Photo Booth Modal -->
    <div class="photobooth-modal" id="photoBoothModal">
        <div class="photobooth-container">
            <button class="close-photobooth" id="closePhotoBooth">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="photobooth-header">
                <h2><i class="fas fa-camera"></i> L-PhotoBooth Experience</h2>
                <p>Strike a pose and capture your perfect moment!</p>
            </div>

            <!-- Frame Selector -->
            <div class="frame-selector">
                <div class="frame-option classic active" data-frame="classic" title="Classic Frame"></div>
                <div class="frame-option vintage" data-frame="vintage" title="Vintage Frame"></div>
                <div class="frame-option modern" data-frame="modern" title="Modern Frame"></div>
                <div class="frame-option party" data-frame="party" title="Party Frame"></div>
            </div>

            <!-- Camera Container -->
            <div class="camera-container">
                <div class="camera-frame">
                    <video id="cameraVideo" autoplay muted playsinline></video>
                    <canvas id="capturedCanvas"></canvas>
                    
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

                <!-- Camera Status -->
                <div class="camera-status" id="cameraStatus">
                    <i class="fas fa-circle" style="color: #4CAF50;"></i>
                    Camera Ready
                </div>
            </div>

            <!-- Camera Controls -->
            <div class="camera-controls">
                <button class="control-btn" id="switchCamera" title="Switch Camera">
                    <i class="fas fa-sync-alt"></i> Switch
                </button>
                
                <button class="capture-btn" id="capturePhoto" title="Take Photo">
                    <i class="fas fa-camera"></i>
                </button>
                
                <button class="control-btn" id="toggleFlash" title="Toggle Flash">
                    <i class="fas fa-bolt"></i> Flash
                </button>
            </div>

            <!-- Photo Preview -->
            <div class="photo-preview" id="photoPreview">
                <img id="previewImage" alt="Captured Photo">
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

    <!-- Photo Booth JavaScript -->
    <script>
        class PhotoBooth {
            constructor() {
                this.video = document.getElementById('cameraVideo');
                this.canvas = document.getElementById('capturedCanvas');
                this.ctx = this.canvas.getContext('2d');
                this.stream = null;
                this.currentFrame = 'classic';
                this.facingMode = 'user'; // 'user' for front camera, 'environment' for back camera
                this.flashEnabled = false;
                
                this.initializeEventListeners();
            }

            initializeEventListeners() {
                // Open/Close Photo Booth
                document.getElementById('openPhotoBooth').addEventListener('click', () => this.openPhotoBooth());
                document.getElementById('tryPhotoBoothBtn').addEventListener('click', () => this.openPhotoBooth());
                document.getElementById('closePhotoBooth').addEventListener('click', () => this.closePhotoBooth());

                // Camera Controls
                document.getElementById('capturePhoto').addEventListener('click', () => this.capturePhoto());
                document.getElementById('switchCamera').addEventListener('click', () => this.switchCamera());
                document.getElementById('toggleFlash').addEventListener('click', () => this.toggleFlash());

                // Photo Actions
                document.getElementById('retakePhoto').addEventListener('click', () => this.retakePhoto());
                document.getElementById('downloadPhoto').addEventListener('click', () => this.downloadPhoto());
                document.getElementById('sharePhoto').addEventListener('click', () => this.sharePhoto());

                // Frame Selection
                document.querySelectorAll('.frame-option').forEach(option => {
                    option.addEventListener('click', (e) => this.selectFrame(e.target.dataset.frame));
                });

                // Close modal when clicking outside
                document.getElementById('photoBoothModal').addEventListener('click', (e) => {
                    if (e.target.id === 'photoBoothModal') {
                        this.closePhotoBooth();
                    }
                });
            }

            async openPhotoBooth() {
                const modal = document.getElementById('photoBoothModal');
                modal.style.display = 'block';
                
                try {
                    await this.startCamera();
                    this.updateCameraStatus('Camera Ready', 'success');
                } catch (error) {
                    console.error('Error accessing camera:', error);
                    this.updateCameraStatus('Camera Error: ' + error.message, 'error');
                }
            }

            closePhotoBooth() {
                const modal = document.getElementById('photoBoothModal');
                modal.style.display = 'none';
                this.stopCamera();
                this.hidePreview();
            }

            async startCamera() {
                try {
                    const constraints = {
                        video: {
                            facingMode: this.facingMode,
                            width: { ideal: 640 },
                            height: { ideal: 480 }
                        },
                        audio: false
                    };

                    this.stream = await navigator.mediaDevices.getUserMedia(constraints);
                    this.video.srcObject = this.stream;
                    this.video.style.display = 'block';
                    this.canvas.style.display = 'none';
                } catch (error) {
                    throw new Error('Unable to access camera. Please check permissions.');
                }
            }

            stopCamera() {
                if (this.stream) {
                    this.stream.getTracks().forEach(track => track.stop());
                    this.stream = null;
                }
            }

            async switchCamera() {
                this.facingMode = this.facingMode === 'user' ? 'environment' : 'user';
                this.stopCamera();
                
                try {
                    await this.startCamera();
                    this.updateCameraStatus('Camera switched', 'success');
                } catch (error) {
                    console.error('Error switching camera:', error);
                    this.updateCameraStatus('Error switching camera', 'error');
                }
            }

            toggleFlash() {
                this.flashEnabled = !this.flashEnabled;
                const flashBtn = document.getElementById('toggleFlash');
                
                if (this.flashEnabled) {
                    flashBtn.classList.add('active');
                    this.updateCameraStatus('Flash enabled', 'success');
                } else {
                    flashBtn.classList.remove('active');
                    this.updateCameraStatus('Flash disabled', 'success');
                }
            }

            selectFrame(frameType) {
                this.currentFrame = frameType;
                
                // Update active frame option
                document.querySelectorAll('.frame-option').forEach(option => {
                    option.classList.remove('active');
                });
                document.querySelector(`[data-frame="${frameType}"]`).classList.add('active');
                
                // Update frame overlay styles
                this.updateFrameOverlay(frameType);
            }

            updateFrameOverlay(frameType) {
                const overlay = document.getElementById('frameOverlay');
                const border = overlay.querySelector('.frame-border');
                const corners = overlay.querySelectorAll('.frame-corners');
                
                // Reset styles
                border.style.border = '4px solid #fff';
                corners.forEach(corner => {
                    corner.style.borderColor = '#ffd700';
                });
                
                // Apply frame-specific styles
                switch (frameType) {
                    case 'vintage':
                        border.style.border = '6px solid #8B4513';
                        border.style.borderRadius = '20px';
                        corners.forEach(corner => {
                            corner.style.borderColor = '#D2691E';
                        });
                        break;
                    case 'modern':
                        border.style.border = '2px solid #333';
                        border.style.borderRadius = '5px';
                        corners.forEach(corner => {
                            corner.style.borderColor = '#666';
                        });
                        break;
                    case 'party':
                        border.style.border = '5px solid #ff6b6b';
                        border.style.borderRadius = '15px';
                        corners.forEach(corner => {
                            corner.style.borderColor = '#feca57';
                        });
                        break;
                    default: // classic
                        // Default styles already applied
                        break;
                }
            }

            async capturePhoto() {
                if (!this.stream) return;

                // Show countdown
                await this.showCountdown();

                // Flash effect
                if (this.flashEnabled) {
                    this.flashEffect();
                }

                // Set canvas size to match video
                this.canvas.width = this.video.videoWidth;
                this.canvas.height = this.video.videoHeight;

                // Draw video frame to canvas
                this.ctx.drawImage(this.video, 0, 0, this.canvas.width, this.canvas.height);

                // Apply frame overlay to canvas
                this.applyFrameToCanvas();

                // Show preview
                this.showPreview();
            }

            async showCountdown() {
                const countdown = document.getElementById('countdown');
                countdown.style.display = 'block';

                for (let i = 3; i > 0; i--) {
                    countdown.textContent = i;
                    await this.delay(1000);
                }

                countdown.textContent = 'Smile!';
                await this.delay(500);
                countdown.style.display = 'none';
            }

            flashEffect() {
                const flash = document.createElement('div');
                flash.style.position = 'absolute';
                flash.style.top = '0';
                flash.style.left = '0';
                flash.style.width = '100%';
                flash.style.height = '100%';
                flash.style.backgroundColor = 'white';
                flash.style.opacity = '0.8';
                flash.style.zIndex = '15';
                flash.style.pointerEvents = 'none';

                document.querySelector('.camera-frame').appendChild(flash);

                setTimeout(() => {
                    flash.remove();
                }, 200);
            }

            applyFrameToCanvas() {
                const frameData = this.getFrameData(this.currentFrame);
                
                // Draw frame border
                this.ctx.strokeStyle = frameData.borderColor;
                this.ctx.lineWidth = frameData.borderWidth;
                this.ctx.strokeRect(
                    frameData.borderWidth / 2,
                    frameData.borderWidth / 2,
                    this.canvas.width - frameData.borderWidth,
                    this.canvas.height - frameData.borderWidth
                );

                // Draw corners
                this.drawFrameCorners(frameData);
            }

            getFrameData(frameType) {
                const frameData = {
                    classic: { borderColor: '#fff', borderWidth: 8, cornerColor: '#ffd700' },
                    vintage: { borderColor: '#8B4513', borderWidth: 12, cornerColor: '#D2691E' },
                    modern: { borderColor: '#333', borderWidth: 4, cornerColor: '#666' },
                    party: { borderColor: '#ff6b6b', borderWidth: 10, cornerColor: '#feca57' }
                };
                
                return frameData[frameType] || frameData.classic;
            }

            drawFrameCorners(frameData) {
                const cornerSize = 30;
                const cornerWidth = 6;
                
                this.ctx.strokeStyle = frameData.cornerColor;
                this.ctx.lineWidth = cornerWidth;
                
                // Top-left corner
                this.ctx.beginPath();
                this.ctx.moveTo(20, 20 + cornerSize);
                this.ctx.lineTo(20 + cornerSize, 20);
                this.ctx.stroke();
                
                // Top-right corner
                this.ctx.beginPath();
                this.ctx.moveTo(this.canvas.width - 20 - cornerSize, 20);
                this.ctx.lineTo(this.canvas.width - 20, 20);
                this.ctx.lineTo(this.canvas.width - 20, 20 + cornerSize);
                this.ctx.stroke();
                
                // Bottom-left corner
                this.ctx.beginPath();
                this.ctx.moveTo(20, this.canvas.height - 20 - cornerSize);
                this.ctx.lineTo(20, this.canvas.height - 20);
                this.ctx.lineTo(20 + cornerSize, this.canvas.height - 20);
                this.ctx.stroke();
                
                // Bottom-right corner
                this.ctx.beginPath();
                this.ctx.moveTo(this.canvas.width - 20 - cornerSize, this.canvas.height - 20);
                this.ctx.lineTo(this.canvas.width - 20, this.canvas.height - 20);
                this.ctx.lineTo(this.canvas.width - 20, this.canvas.height - 20 - cornerSize);
                this.ctx.stroke();
            }

            showPreview() {
                const preview = document.getElementById('photoPreview');
                const previewImage = document.getElementById('previewImage');
                
                // Convert canvas to image
                const imageDataUrl = this.canvas.toDataURL('image/png');
                previewImage.src = imageDataUrl;
                
                // Hide video, show canvas and preview
                this.video.style.display = 'none';
                this.canvas.style.display = 'block';
                preview.style.display = 'block';
                
                this.updateCameraStatus('Photo captured successfully!', 'success');
            }

            hidePreview() {
                const preview = document.getElementById('photoPreview');
                preview.style.display = 'none';
            }

            retakePhoto() {
                this.video.style.display = 'block';
                this.canvas.style.display = 'none';
                this.hidePreview();
                this.updateCameraStatus('Ready to take another photo', 'success');
            }

            downloadPhoto() {
                const imageDataUrl = this.canvas.toDataURL('image/png');
                const link = document.createElement('a');
                link.download = `L-PhotoBooth-${new Date().getTime()}.png`;
                link.href = imageDataUrl;
                link.click();
                
                this.updateCameraStatus('Photo downloaded!', 'success');
            }

            async sharePhoto() {
                try {
                    const imageDataUrl = this.canvas.toDataURL('image/png');
                    
                    // Convert data URL to blob
                    const response = await fetch(imageDataUrl);
                    const blob = await response.blob();
                    
                    if (navigator.share && navigator.canShare) {
                        const file = new File([blob], 'L-PhotoBooth-Photo.png', { type: 'image/png' });
                        
                        if (navigator.canShare({ files: [file] })) {
                            await navigator.share({
                                title: 'My L-PhotoBooth Photo',
                                text: 'Check out my photo from L-PhotoBooth!',
                                files: [file]
                            });
                            this.updateCameraStatus('Photo shared successfully!', 'success');
                        } else {
                            this.fallbackShare(imageDataUrl);
                        }
                    } else {
                        this.fallbackShare(imageDataUrl);
                    }
                } catch (error) {
                    console.error('Error sharing photo:', error);
                    this.updateCameraStatus('Error sharing photo', 'error');
                }
            }

            fallbackShare(imageDataUrl) {
                // Fallback: Copy to clipboard or show share options
                const shareModal = this.createShareModal(imageDataUrl);
                document.body.appendChild(shareModal);
            }

            createShareModal(imageDataUrl) {
                const modal = document.createElement('div');
                modal.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0,0,0,0.8);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 1001;
                `;

                modal.innerHTML = `
                    <div style="background: white; padding: 30px; border-radius: 15px; text-align: center; max-width: 400px;">
                        <h3 style="margin-bottom: 20px;">Share Your Photo</h3>
                        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                            <button onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.href)}', '_blank')" 
                                    style="padding: 10px 20px; background: #1877f2; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                <i class="fab fa-facebook-f"></i> Facebook
                            </button>
                            <button onclick="window.open('https://twitter.com/intent/tweet?text=Check out my L-PhotoBooth photo!&url=${encodeURIComponent(window.location.href)}', '_blank')" 
                                    style="padding: 10px 20px; background: #1da1f2; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                <i class="fab fa-twitter"></i> Twitter
                            </button>
                            <button onclick="window.open('https://wa.me/?text=Check out my L-PhotoBooth photo! ${encodeURIComponent(window.location.href)}', '_blank')" 
                                    style="padding: 10px 20px; background: #25d366; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </button>
                        </div>
                        <button onclick="this.parentElement.parentElement.remove()" 
                                style="margin-top: 20px; padding: 10px 20px; background: #666; color: white; border: none; border-radius: 5px; cursor: pointer;">
                            Close
                        </button>
                    </div>
                `;

                return modal;
            }

            updateCameraStatus(message, type) {
                const status = document.getElementById('cameraStatus');
                const icon = status.querySelector('i');
                
                status.innerHTML = `<i class="fas fa-circle"></i> ${message}`;
                
                switch (type) {
                    case 'success':
                        icon.style.color = '#4CAF50';
                        break;
                    case 'error':
                        icon.style.color = '#f44336';
                        break;
                    case 'warning':
                        icon.style.color = '#ff9800';
                        break;
                    default:
                        icon.style.color = '#2196F3';
                }
            }

            delay(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }
        }

        // Initialize Photo Booth when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            new PhotoBooth();
        });

        // Add camera button styles to header
        const headerStyles = `
            .header-actions {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .camera-btn {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 10px 20px;
                background: linear-gradient(45deg, #667eea, #764ba2);
                color: white;
                border: none;
                border-radius: 25px;
                cursor: pointer;
                font-size: 0.9rem;
                font-weight: 500;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            }

            .camera-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            }

            .camera-btn i {
                font-size: 1.1rem;
            }

            @media (max-width: 768px) {
                .camera-btn span {
                    display: none;
                }
                
                .camera-btn {
                    padding: 10px;
                    border-radius: 50%;
                    width: 45px;
                    height: 45px;
                    justify-content: center;
                }
            }
        `;

        // Inject styles
        const styleSheet = document.createElement('style');
        styleSheet.textContent = headerStyles;
        document.head.appendChild(styleSheet);
    </script>

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

