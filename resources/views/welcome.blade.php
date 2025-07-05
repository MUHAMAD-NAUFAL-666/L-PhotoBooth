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
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            --gold-gradient: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);
            
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #4facfe;
            --text-dark: #2c3e50;
            --text-light: #7f8c8d;
            --white: #ffffff;
            --light-bg: #f8f9fa;
            --shadow-light: 0 5px 15px rgba(0,0,0,0.08);
            --shadow-medium: 0 10px 30px rgba(0,0,0,0.12);
            --shadow-heavy: 0 20px 40px rgba(0,0,0,0.15);
            
            --border-radius: 12px;
            --border-radius-lg: 20px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
            background: var(--white);
        }

        /* Enhanced Loading Screen */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: var(--transition-slow);
        }

        .loading .spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255,255,255,0.3);
            border-top: 4px solid var(--white);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        .loading p {
            color: var(--white);
            font-size: 1.2rem;
            font-weight: 500;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        /* Enhanced Header */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            z-index: 1000;
            transition: var(--transition);
            box-shadow: var(--shadow-light);
        }

        .header.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: var(--shadow-medium);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo i {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            position: relative;
            transition: var(--transition);
            padding: 10px 0;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-gradient);
            transition: var(--transition);
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .nav-menu a:hover {
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .camera-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: var(--primary-gradient);
            color: var(--white);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: var(--shadow-light);
            position: relative;
            overflow: hidden;
        }

        .camera-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: var(--transition);
        }

        .camera-btn:hover::before {
            left: 100%;
        }

        .camera-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
        }

        .cta-button {
            padding: 12px 24px;
            background: var(--secondary-gradient);
            color: var(--white);
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: var(--shadow-light);
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: var(--transition);
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
        }

        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-dark);
            cursor: pointer;
            transition: var(--transition);
        }

        .mobile-menu-toggle:hover {
            color: var(--primary-color);
            transform: scale(1.1);
        }

        /* Enhanced Hero Section */
        .hero {
            min-height: 100vh;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 100px 20px 50px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%" r="50%"><stop offset="0%" stop-color="rgba(255,255,255,0.1)"/><stop offset="100%" stop-color="rgba(255,255,255,0)"/></radialGradient></defs><circle cx="200" cy="200" r="100" fill="url(%23a)"/><circle cx="800" cy="300" r="150" fill="url(%23a)"/><circle cx="400" cy="700" r="120" fill="url(%23a)"/><circle cx="900" cy="800" r="80" fill="url(%23a)"/></svg>');
            animation: float-bg 20s ease-in-out infinite;
        }

        @keyframes float-bg {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        .hero-content {
            max-width: 800px;
            text-align: center;
            color: var(--white);
            z-index: 2;
            position: relative;
        }

        .hero-content h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            margin-bottom: 20px;
            line-height: 1.2;
            animation: slideInUp 1s ease-out;
        }

        .hero-content p {
            font-size: clamp(1.1rem, 2vw, 1.3rem);
            margin-bottom: 40px;
            opacity: 0.9;
            line-height: 1.6;
            animation: slideInUp 1s ease-out 0.2s both;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            animation: slideInUp 1s ease-out 0.4s both;
        }

        .btn-primary, .btn-secondary {
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: var(--white);
            color: var(--primary-color);
            box-shadow: var(--shadow-medium);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .btn-primary::before, .btn-secondary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: var(--transition);
        }

        .btn-primary:hover::before, .btn-secondary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-heavy);
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 60px;
            margin-top: 80px;
            animation: slideInUp 1s ease-out 0.6s both;
        }

        .stat-item {
            text-align: center;
            color: var(--white);
        }

        .stat-number {
            display: block;
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 5px;
            background: var(--gold-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
            font-weight: 500;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Enhanced Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Enhanced Section Styling */
        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 20px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: var(--accent-gradient);
            border-radius: 2px;
        }

        .section-title p {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Enhanced Features Section */
        .features {
            padding: 100px 0;
            background: var(--light-bg);
            position: relative;
        }

        .features::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="rgba(102,126,234,0.05)"/><stop offset="100%" stop-color="rgba(118,75,162,0.05)"/></linearGradient></defs><polygon points="0,0 1000,200 1000,1000 0,800" fill="url(%23grad)"/></svg>');
            pointer-events: none;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            position: relative;
            z-index: 2;
        }

        .feature-card {
            background: var(--white);
            padding: 40px 30px;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-light);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transition: var(--transition);
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-heavy);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
        }

        .feature-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--secondary-gradient);
            opacity: 0;
            transition: var(--transition);
        }

        .feature-card:hover .feature-icon::before {
            opacity: 1;
        }

        .feature-icon i {
            font-size: 2rem;
            color: var(--white);
            z-index: 2;
            position: relative;
            transition: var(--transition);
        }

        .feature-card:hover .feature-icon i {
            transform: scale(1.1) rotate(5deg);
        }

        .feature-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--text-dark);
        }

        .feature-card p {
            color: var(--text-light);
            line-height: 1.6;
        }

        /* Enhanced Gallery Section */
        .gallery {
            padding: 100px 0;
            background: var(--white);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .gallery-item {
            position: relative;
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-light);
            transition: var(--transition);
            aspect-ratio: 4/3;
        }

        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            opacity: 0;
            transition: var(--transition);
            z-index: 2;
        }

        .gallery-item:hover::before {
            opacity: 0.8;
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-heavy);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            color: var(--white);
            padding: 30px 20px 20px;
            transform: translateY(100%);
            transition: var(--transition);
            z-index: 3;
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        .gallery-overlay h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .gallery-overlay p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .gallery-load-more {
            text-align: center;
        }

        /* Enhanced Testimonials Section */
        .testimonials {
            padding: 100px 0;
            background: var(--light-bg);
            position: relative;
        }

        .testimonials::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="b" cx="50%" cy="50%" r="50%"><stop offset="0%" stop-color="rgba(118,75,162,0.1)"/><stop offset="100%" stop-color="rgba(118,75,162,0)"/></radialGradient></defs><circle cx="100" cy="100" r="200" fill="url(%23b)"/><circle cx="900" cy="900" r="300" fill="url(%23b)"/></svg>');
            pointer-events: none;
        }

        .testimonials-slider {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            z-index: 2;
        }

        .testimonial-item {
            display: none;
            opacity: 0;
            transform: translateX(50px);
            transition: var(--transition-slow);
        }

        .testimonial-item.active {
            display: block;
            opacity: 1;
            transform: translateX(0);
        }

        .testimonial-content {
            background: var(--white);
            padding: 50px 40px;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-medium);
            text-align: center;
            position: relative;
        }

        .testimonial-content::before {
            content: '"';
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 6rem;
            color: var(--primary-color);
            opacity: 0.1;
            font-family: serif;
        }

        .stars {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-bottom: 25px;
        }

        .stars i {
            color: #ffd700;
            font-size: 1.2rem;
            animation: twinkle 2s ease-in-out infinite;
        }

        .stars i:nth-child(2) { animation-delay: 0.2s; }
        .stars i:nth-child(3) { animation-delay: 0.4s; }
        .stars i:nth-child(4) { animation-delay: 0.6s; }
        .stars i:nth-child(5) { animation-delay: 0.8s; }

        @keyframes twinkle {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.1); }
        }

        .testimonial-content p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-dark);
            margin-bottom: 30px;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .testimonial-author img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
        }

        .testimonial-author h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .testimonial-author span {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .testimonial-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 40px;
        }

        .testimonial-prev, .testimonial-next {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-gradient);
            color: var(--white);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            box-shadow: var(--shadow-light);
        }

        .testimonial-prev:hover, .testimonial-next:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-medium);
        }

        .testimonial-dots {
            display: flex;
            gap: 10px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(102, 126, 234, 0.3);
            cursor: pointer;
            transition: var(--transition);
        }

        .dot.active {
            background: var(--primary-color);
            transform: scale(1.2);
        }

        /* Enhanced Pricing Section */
        .pricing {
            padding: 100px 0;
            background: var(--white);
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .pricing-card {
            background: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 40px 30px;
            box-shadow: var(--shadow-light);
            transition: var(--transition);
            position: relative;
            border: 2px solid transparent;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-heavy);
            border-color: var(--primary-color);
        }

        .pricing-card.featured {
            background: var(--primary-gradient);
            color: var(--white);
            transform: scale(1.05);
            border-color: var(--gold-gradient);
        }

        .pricing-card.featured:hover {
            transform: scale(1.08) translateY(-10px);
        }

        .pricing-badge {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--gold-gradient);
            color: var(--white);
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: var(--shadow-medium);
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateX(-50%) translateY(0); }
            50% { transform: translateX(-50%) translateY(-5px); }
        }

        .pricing-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .pricing-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .pricing-card.featured .pricing-header h3 {
            color: var(--white);
        }

        .price {
            font-size: 3rem;
            font-weight: 900;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .pricing-card.featured .price {
            color: var(--white);
        }

        .price span {
            font-size: 1rem;
            font-weight: 400;
            color: var(--text-light);
        }

        .pricing-card.featured .price span {
            color: rgba(255, 255, 255, 0.8);
        }

        .pricing-features {
            list-style: none;
            margin-bottom: 30px;
        }

        .pricing-features li {
            padding: 10px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .pricing-card.featured .pricing-features li {
            border-bottom-color: rgba(255, 255, 255, 0.2);
        }

        .pricing-features i {
            color: #4CAF50;
            font-size: 1.1rem;
        }

        .pricing-card.featured .pricing-features i {
            color: var(--white);
        }

        .pricing-note {
            text-align: center;
            color: var(--text-light);
            font-size: 0.9rem;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: var(--light-bg);
            border-radius: var(--border-radius);
            border-left: 4px solid var(--primary-color);
        }

        /* Enhanced Photo Booth Modal */
        .photobooth-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(10px);
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .photobooth-container {
            position: relative;
            width: 95%;
            max-width: 1000px;
            margin: 2% auto;
            background: var(--primary-gradient);
            border-radius: var(--border-radius-lg);
            padding: 30px;
            box-shadow: var(--shadow-heavy);
            max-height: 95vh;
            overflow-y: auto;
            animation: slideInScale 0.5s ease-out;
        }

        @keyframes slideInScale {
            from {
                opacity: 0;
                transform: scale(0.8) translateY(50px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .photobooth-header {
            text-align: center;
            color: var(--white);
            margin-bottom: 30px;
        }

        .photobooth-header h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            font-weight: 800;
        }

        .photobooth-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .camera-container {
            position: relative;
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            background: #000;
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-heavy);
        }

        .camera-frame {
            position: relative;
            width: 100%;
            height: 500px;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        #cameraVideo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scaleX(-1);
            transition: var(--transition);
        }

        #capturedCanvas {
            display: none;
            width: 100%;
            height: 100%;
        }

        /* Enhanced Video Effects */
        .video-effects {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 5;
            transition: var(--transition);
        }

        .video-effects.effect-sepia { filter: sepia(100%) contrast(110%); }
        .video-effects.effect-grayscale { filter: grayscale(100%) contrast(120%); }
        .video-effects.effect-vintage { filter: sepia(80%) contrast(120%) brightness(90%) saturate(120%); }
        .video-effects.effect-cool { filter: hue-rotate(180deg) saturate(120%) brightness(105%); }
        .video-effects.effect-warm { filter: hue-rotate(30deg) saturate(130%) brightness(110%); }
        .video-effects.effect-dramatic { filter: contrast(200%) brightness(80%) saturate(150%); }
        .video-effects.effect-dreamy { filter: blur(1px) brightness(110%) saturate(80%) contrast(90%); }
        .video-effects.effect-pop { filter: saturate(200%) contrast(120%) brightness(105%); }
        .video-effects.effect-noir { filter: grayscale(100%) contrast(150%) brightness(70%); }
        .video-effects.effect-invert { filter: invert(100%); }
        .video-effects.effect-saturate { filter: saturate(180%) contrast(110%); }

        /* Apply effects directly to video element as fallback */
        #cameraVideo.effect-sepia { filter: sepia(100%) contrast(110%); }
        #cameraVideo.effect-grayscale { filter: grayscale(100%) contrast(120%); }
        #cameraVideo.effect-vintage { filter: sepia(80%) contrast(120%) brightness(90%) saturate(120%); }
        #cameraVideo.effect-cool { filter: hue-rotate(180deg) saturate(120%) brightness(105%); }
        #cameraVideo.effect-warm { filter: hue-rotate(30deg) saturate(130%) brightness(110%); }
        #cameraVideo.effect-dramatic { filter: contrast(200%) brightness(80%) saturate(150%); }
        #cameraVideo.effect-dreamy { filter: blur(1px) brightness(110%) saturate(80%) contrast(90%); }
        #cameraVideo.effect-pop { filter: saturate(200%) contrast(120%) brightness(105%); }
        #cameraVideo.effect-noir { filter: grayscale(100%) contrast(150%) brightness(70%); }
        #cameraVideo.effect-invert { filter: invert(100%); }
        #cameraVideo.effect-saturate { filter: saturate(180%) contrast(110%); }

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
            border-radius: var(--border-radius);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
            transition: var(--transition);
        }

        .frame-corners {
            position: absolute;
            width: 30px;
            height: 30px;
            border: 3px solid #ffd700;
            transition: var(--transition);
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

        .controls-section {
            margin-top: 30px;
        }

        .controls-tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition);
            border: 2px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .tab-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .tab-btn.active {
            background: rgba(255, 255, 255, 0.3);
            border-color: var(--gold-gradient);
            box-shadow: var(--shadow-light);
        }

        .controls-content {
            min-height: 100px;
        }

        .tab-content {
            display: none;
            animation: fadeInUp 0.3s ease-out;
        }

        .tab-content.active {
            display: block;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .effects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(90px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .effect-option {
            width: 90px;
            height: 70px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 0.75rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .effect-option::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gold-gradient);
            opacity: 0;
            transition: var(--transition);
        }

        .effect-option:hover::before {
            left: 0;
            opacity: 0.2;
        }

        .effect-option:hover,
        .effect-option.active {
            border-color: #ffd700;
            transform: scale(1.05);
            background: rgba(255, 215, 0, 0.2);
            box-shadow: var(--shadow-light);
        }

        .effect-option i {
            font-size: 1.4rem;
            margin-bottom: 6px;
            z-index: 2;
            position: relative;
        }

        .effect-option span {
            z-index: 2;
            position: relative;
            font-weight: 500;
        }

        .frame-selector {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .frame-option {
            width: 70px;
            height: 70px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }

        .frame-option::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            opacity: 0;
            transition: var(--transition);
        }

        .frame-option:hover::before {
            opacity: 1;
        }

        .frame-option:hover,
        .frame-option.active {
            border-color: #ffd700;
            transform: scale(1.1);
            box-shadow: var(--shadow-light);
        }

        .frame-option.classic {
            background: var(--primary-gradient);
        }

        .frame-option.vintage {
            background: linear-gradient(45deg, #8B4513, #D2691E);
        }

        .frame-option.modern {
            background: var(--dark-gradient);
        }

        .frame-option.party {
            background: var(--secondary-gradient);
        }

              .frame-option.polaroid {
            background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
            border: 2px solid #ddd;
            position: relative;
        }

        .frame-option.polaroid::before {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            right: 2px;
            bottom: 8px;
            background: #fff;
            border: 1px solid #ccc;
        }

        .frame-option.polaroid::after {
            content: '📷';
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 8px;
        }

        .frame-option.polaroid-strip {
            background: linear-gradient(90deg, #f0f0f0 0%, #e0e0e0 50%, #f0f0f0 100%);
            border: 2px solid #ccc;
            position: relative;
            overflow: hidden;
        }

        .frame-option.polaroid-strip::before {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            right: 2px;
            bottom: 2px;
            background: repeating-linear-gradient(
                0deg,
                #fff 0px,
                #fff 8px,
                #f5f5f5 8px,
                #f5f5f5 10px
            );
        }

        .frame-option.polaroid-strip::after {
            content: '📸📸📸📸';
            position: absolute;
            bottom: 1px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 4px;
            letter-spacing: 2px;
        }

        .camera-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .capture-btn {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: var(--secondary-gradient);
            border: 6px solid var(--white);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--white);
            transition: var(--transition);
            box-shadow: var(--shadow-heavy);
            position: relative;
            overflow: hidden;
        }

        .capture-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gold-gradient);
            opacity: 0;
            transition: var(--transition);
        }

        .capture-btn:hover::before {
            opacity: 1;
        }

        .capture-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        }

        .capture-btn:active {
            transform: scale(0.95);
        }

        .capture-btn i {
            z-index: 2;
            position: relative;
        }

        .control-btn {
            padding: 15px 25px;
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: var(--transition);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .control-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
            box-shadow: var(--shadow-light);
        }

        .control-btn.active {
            background: var(--accent-gradient);
            border-color: var(--accent-color);
        }

        .close-photobooth {
            position: absolute;
            top: 20px;
            right: 25px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: var(--white);
            font-size: 1.8rem;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            backdrop-filter: blur(10px);
        }

        .close-photobooth:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg) scale(1.1);
        }

        .photo-preview {
            display: none;
            margin-top: 30px;
            text-align: center;
            animation: fadeInUp 0.5s ease-out;
        }

        .photo-preview h3 {
            color: var(--white);
            font-size: 1.5rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .photo-preview img {
            max-width: 400px;
            width: 100%;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-heavy);
            border: 4px solid var(--white);
        }

        .photo-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .countdown {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 10rem;
            color: var(--white);
            text-shadow: 0 0 30px rgba(255, 255, 255, 0.8);
            z-index: 20;
            display: none;
            animation: countdownPulse 1s infinite;
            font-weight: 900;
        }

        @keyframes countdownPulse {
            0% { 
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }
            50% { 
                transform: translate(-50%, -50%) scale(1.2);
                opacity: 0.8;
            }
            100% { 
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }
        }

        .camera-status {
            text-align: center;
            color: var(--white);
            margin-top: 15px;
            font-size: 1rem;
            opacity: 0.9;
            font-weight: 500;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            display: inline-block;
        }

        /* Enhanced Footer */
        .footer {
            background: var(--dark-gradient);
            color: var(--white);
            padding: 80px 0 30px;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><linearGradient id="footerGrad" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="rgba(102,126,234,0.1)"/><stop offset="100%" stop-color="rgba(118,75,162,0.1)"/></linearGradient></defs><polygon points="0,0 1000,0 1000,300 0,500" fill="url(%23footerGrad)"/></svg>');
            pointer-events: none;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
            position: relative;
            z-index: 2;
        }

        .footer-section h4 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--white);
        }

        .footer-logo {
            font-size: 2rem;
            font-weight: 800;
            background: var(--gold-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-section p {
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            text-decoration: none;
            transition: var(--transition);
            backdrop-filter: blur(10px);
        }

        .social-links a:hover {
            background: var(--primary-gradient);
            transform: translateY(-3px);
            box-shadow: var(--shadow-light);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-links a:hover {
            color: var(--white);
            transform: translateX(5px);
        }

        .footer-contact .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
            color: rgba(255, 255, 255, 0.9);
        }

        .footer-contact i {
            width: 20px;
            color: var(--primary-color);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            position: relative;
            z-index: 2;
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-bottom-links {
            display: flex;
            gap: 20px;
        }

        .footer-bottom-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-bottom-links a:hover {
            color: var(--white);
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: var(--primary-gradient);
            color: var(--white);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: var(--transition);
            box-shadow: var(--shadow-medium);
            z-index: 999;
        }

        .back-to-top:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-heavy);
        }

        .back-to-top.show {
            display: flex;
            animation: slideInUp 0.3s ease-out;
        }

        /* Contact Modal */
        .contact-modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }

        .contact-modal-content {
            position: relative;
            background: var(--white);
            margin: 5% auto;
            padding: 40px;
            width: 90%;
            max-width: 500px;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-heavy);
            animation: slideInScale 0.3s ease-out;
        }

        .contact-modal-close {
            position: absolute;
            top: 15px;
            right: 20px;
            background: none;
            border: none;
            font-size: 2rem;
            color: var(--text-light);
            cursor: pointer;
            transition: var(--transition);
        }

        .contact-modal-close:hover {
            color: var(--text-dark);
            transform: rotate(90deg);
        }

        .contact-modal h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--text-dark);
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .form-input, .form-textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
            background: var(--white);
        }

        .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

           .form-submit {
            width: 100%;
            padding: 15px;
            background: var(--primary-gradient);
            color: var(--white);
            border: none;
            border-radius: var(--border-radius);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .form-submit:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        .form-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .nav-menu {
                gap: 20px;
            }
            
            .hero-stats {
                gap: 40px;
            }
            
            .features-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .nav-menu {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 80px);
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                flex-direction: column;
                justify-content: flex-start;
                padding-top: 50px;
                transition: var(--transition);
                z-index: 999;
            }

            .nav-menu.active {
                left: 0;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .header-actions {
                gap: 10px;
            }

            .camera-btn span {
                display: none;
            }
            
            .camera-btn {
                padding: 12px;
                border-radius: 50%;
                width: 50px;
                height: 50px;
                justify-content: center;
            }

            .hero {
                padding: 120px 20px 60px;
                text-align: center;
            }

            .hero-stats {
                flex-direction: column;
                gap: 30px;
                align-items: center;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }

            .features-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .feature-card {
                padding: 30px 20px;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
            }

            .pricing-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .pricing-card.featured {
                transform: none;
            }

            .pricing-card.featured:hover {
                transform: translateY(-10px);
            }

            .photobooth-container {
                width: 98%;
                margin: 1% auto;
                padding: 20px;
            }

            .camera-frame {
                height: 350px;
            }

            .photobooth-header h2 {
                font-size: 2rem;
            }

            .effects-grid {
                grid-template-columns: repeat(auto-fit, minmax(70px, 1fr));
                gap: 10px;
            }

            .effect-option {
                width: 70px;
                height: 55px;
                font-size: 0.7rem;
            }

            .effect-option i {
                font-size: 1.2rem;
            }

            .frame-selector {
                gap: 10px;
            }

            .frame-option {
                width: 60px;
                height: 60px;
            }

            .countdown {
                font-size: 6rem;
            }

            .capture-btn {
                width: 80px;
                height: 80px;
                font-size: 2rem;
            }

            .camera-controls {
                gap: 20px;
            }

            .controls-tabs {
                gap: 10px;
            }

            .tab-btn {
                padding: 10px 15px;
                font-size: 0.8rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 30px;
                text-align: center;
            }

            .footer-bottom-content {
                flex-direction: column;
                text-align: center;
            }

            .social-links {
                justify-content: center;
            }

            .back-to-top {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
            }
        }

        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 2.2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .feature-card {
                padding: 25px 15px;
            }

            .feature-icon {
                width: 60px;
                height: 60px;
            }

            .feature-icon i {
                font-size: 1.5rem;
            }

            .testimonial-content {
                padding: 30px 20px;
            }

            .pricing-card {
                padding: 30px 20px;
            }

            .price {
                font-size: 2.5rem;
            }

            .photobooth-container {
                padding: 15px;
            }

            .camera-frame {
                height: 280px;
            }

            .effects-grid {
                grid-template-columns: repeat(auto-fit, minmax(60px, 1fr));
            }

            .effect-option {
                width: 60px;
                height: 50px;
            }

            .countdown {
                font-size: 4rem;
            }

            .capture-btn {
                width: 70px;
                height: 70px;
                font-size: 1.8rem;
            }

            .contact-modal-content {
                margin: 10% auto;
                padding: 30px 20px;
            }
        }

        /* Animation Classes */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: var(--transition-slow);
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .slide-in-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: var(--transition-slow);
        }

        .slide-in-left.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .slide-in-right {
            opacity: 0;
            transform: translateX(50px);
            transition: var(--transition-slow);
        }

        .slide-in-right.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .scale-in {
            opacity: 0;
            transform: scale(0.8);
            transition: var(--transition-slow);
        }

        .scale-in.visible {
            opacity: 1;
            transform: scale(1);
        }

        /* Utility Classes */
        .text-gradient {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .bg-gradient-primary {
            background: var(--primary-gradient);
        }

        .bg-gradient-secondary {
            background: var(--secondary-gradient);
        }

        .bg-gradient-accent {
            background: var(--accent-gradient);
        }

        .shadow-light {
            box-shadow: var(--shadow-light);
        }

        .shadow-medium {
            box-shadow: var(--shadow-medium);
        }

        .shadow-heavy {
            box-shadow: var(--shadow-heavy);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-gradient);
        }

        /* Selection Color */
        ::selection {
            background: var(--primary-color);
            color: var(--white);
        }

        ::-moz-selection {
            background: var(--primary-color);
            color: var(--white);
        }

        /* Focus Styles */
        button:focus,
        input:focus,
        textarea:focus,
        select:focus {
            outline: 2px solid var(--primary-color);
            outline-offset: 2px;
        }

        /* Print Styles */
        @media print {
            .header,
            .photobooth-modal,
            .back-to-top,
            .contact-modal {
                display: none !important;
            }
        }
    </style>
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
                <i class="fas fa-camera"></i> L-gasing
            </a>
            <ul class="nav-menu" id="navMenu">
                <li><a href="#home">Home</a></li>
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
                 <div class="gallery-item" data-aos="fade-up" data-aos-delay="400" data-category="party">
                    <img src="{{ asset('storage/image/orang5.jpeg') }}" alt="Party Photo Booth Entertainment" loading="lazy">
                    <div class="gallery-overlay">
                        <h4>Party Time</h4>
                        <p>Fun and laughter captured perfectly</p>
                    </div>
                </div>
                 <div class="gallery-item" data-aos="fade-up" data-aos-delay="400" data-category="party">
                    <img src="{{ asset('storage/image/orang6.jpeg') }}" alt="Party Photo Booth Entertainment" loading="lazy">
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
                            <img src="{{ asset('images/testimonials/sarah-mike.jpg') }}" alt="Sarah & Mike Johnson" loading="lazy">
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

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Get In Touch</h2>
                <p>Ready to make your event unforgettable? Contact us today for a free consultation and quote.</p>
            </div>
            <div class="contact-content">
                <div class="contact-info" data-aos="fade-right">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Phone</h4>
                            <p>+1 (555) 123-4567</p>
                            <span>Mon-Fri: 9AM-6PM</span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p>info@lphotobooth.com</p>
                            <span>We reply within 24 hours</span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Service Area</h4>
                            <p>Greater Metro Area</p>
                            <span>25 mile radius included</span>
                        </div>
                    </div>
                </div>
                <div class="contact-form" data-aos="fade-left">
                    <form id="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" id="name" name="name" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" id="email" name="email" class="form-input" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="event-date" class="form-label">Event Date</label>
                                <input type="date" id="event-date" name="event_date" class="form-input">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="event-type" class="form-label">Event Type</label>
                            <select id="event-type" name="event_type" class="form-input">
                                <option value="">Select Event Type</option>
                                <option value="wedding">Wedding</option>
                                <option value="birthday">Birthday Party</option>
                                <option value="corporate">Corporate Event</option>
                                <option value="graduation">Graduation</option>
                                <option value="anniversary">Anniversary</option>
                                <option value="holiday">Holiday Party</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message" class="form-label">Message *</label>
                            <textarea id="message" name="message" class="form-textarea" required placeholder="Tell us about your event, guest count, venue, and any special requirements..."></textarea>
                        </div>
                        <button type="submit" class="form-submit" data-original-text="Send Message">
                            <i class="fas fa-paper-plane"></i>
                            Send Message
                        </button>
                    </form>
                </div>
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
    <script>
        class PhotoBooth {
            constructor() {
                this.video = document.getElementById('cameraVideo');
                this.canvas = document.getElementById('capturedCanvas');
                this.ctx = this.canvas.getContext('2d');
                this.stream = null;
                this.currentFrame = 'classic';
                this.currentEffect = 'none';
                this.facingMode = 'user';
                this.flashEnabled = false;
                this.gridEnabled = false;
                
                this.initializeEventListeners();
                this.initializeTabs();
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
                document.getElementById('toggleGrid').addEventListener('click', () => this.toggleGrid());

                // Photo Actions
                document.getElementById('retakePhoto').addEventListener('click', () => this.retakePhoto());
                document.getElementById('downloadPhoto').addEventListener('click', () => this.downloadPhoto());
                document.getElementById('sharePhoto').addEventListener('click', () => this.sharePhoto());

                // Effect Selection
                document.querySelectorAll('.effect-option').forEach(option => {
                    option.addEventListener('click', (e) => this.selectEffect(e.target.closest('.effect-option')));
                });

                // Frame Selection
                document.querySelectorAll('.frame-option').forEach(option => {
                    option.addEventListener('click', (e) => this.selectFrame(e.target.closest('.frame-option')));
                });

                // Close modal when clicking outside
                document.getElementById('photoBoothModal').addEventListener('click', (e) => {
                    if (e.target.id === 'photoBoothModal') {
                        this.closePhotoBooth();
                    }
                });

                // Keyboard shortcuts
                document.addEventListener('keydown', (e) => {
                    if (document.getElementById('photoBoothModal').style.display === 'block') {
                        switch(e.key) {
                            case ' ':
                            case 'Enter':
                                e.preventDefault();
                                this.capturePhoto();
                                break;
                            case 'Escape':
                                this.closePhotoBooth();
                                break;
                            case 'r':
                            case 'R':
                                if (document.getElementById('photoPreview').style.display === 'block') {
                                    this.retakePhoto();
                                }
                                break;
                        }
                    }
                });
            }

            initializeTabs() {
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const tabName = e.target.dataset.tab;
                        this.switchTab(tabName);
                    });
                });
            }

            switchTab(tabName) {
                // Remove active class from all tabs and content
                document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

                // Add active class to selected tab and content
                document.querySelector(`[data-tab="${tabName}"]`).classList.add('active');
                document.getElementById(`${tabName}Tab`).classList.add('active');
            }

            async openPhotoBooth() {
                document.getElementById('photoBoothModal').style.display = 'block';
                document.body.style.overflow = 'hidden';
                
                try {
                    await this.initializeCamera();
                } catch (error) {
                    console.error('Error initializing camera:', error);
                    this.updateCameraStatus('Camera access denied or not available', 'error');
                }
            }

            closePhotoBooth() {
                document.getElementById('photoBoothModal').style.display = 'none';
                document.body.style.overflow = 'auto';
                
                if (this.stream) {
                    this.stream.getTracks().forEach(track => track.stop());
                    this.stream = null;
                }
                
                this.hidePreview();
            }

            async initializeCamera() {
                try {
                    this.updateCameraStatus('Requesting camera access...', 'warning');
                    
                    const constraints = {
                        video: {
                            facingMode: this.facingMode,
                            width: { ideal: 1280 },
                            height: { ideal: 720 }
                        },
                        audio: false
                    };

                    this.stream = await navigator.mediaDevices.getUserMedia(constraints);
                    this.video.srcObject = this.stream;
                    
                    this.video.onloadedmetadata = () => {
                        this.updateCameraStatus('Camera ready - Strike a pose!', 'success');
                    };

                } catch (error) {
                    console.error('Camera initialization error:', error);
                    this.updateCameraStatus('Unable to access camera. Please check permissions.', 'error');
                    throw error;
                }
            }

            selectEffect(option) {
                // Remove active class from all effects
                document.querySelectorAll('.effect-option').forEach(opt => opt.classList.remove('active'));
                
                // Add active class to selected effect
                option.classList.add('active');
                
                // Get effect name
                this.currentEffect = option.dataset.effect;
                
                // Apply effect to video
                this.applyVideoEffect();
            }

            applyVideoEffect() {
                const videoEffects = document.getElementById('videoEffects');
                const video = document.getElementById('cameraVideo');
                
                // Remove all effect classes from overlay
                videoEffects.className = 'video-effects';
                
                // Remove all effect classes from video
                video.className = '';
                
                // Apply current effect
                if (this.currentEffect !== 'none') {
                    // Try overlay method first
                    videoEffects.classList.add(`effect-${this.currentEffect}`);
                    
                    // Fallback: apply directly to video element
                    video.classList.add(`effect-${this.currentEffect}`);
                }
            }

            selectFrame(option) {
                // Remove active class from all frames
                document.querySelectorAll('.frame-option').forEach(opt => opt.classList.remove('active'));
                
                // Add active class to selected frame
                option.classList.add('active');
                
                // Get frame name
                this.currentFrame = option.dataset.frame;
                
                // Update frame overlay
                this.updateFrameOverlay();
            }

            updateFrameOverlay() {
                const frameOverlay = document.getElementById('frameOverlay');
                const frameBorder = frameOverlay.querySelector('.frame-border');
                const frameCorners = frameOverlay.querySelectorAll('.frame-corners');
                
                // Reset styles
                frameBorder.style.border = '4px solid #fff';
                frameCorners.forEach(corner => {
                    corner.style.border = '3px solid #ffd700';
                });
                
                // Apply frame-specific styles
                switch (this.currentFrame) {
                    case 'classic':
                        frameBorder.style.border = '4px solid #fff';
                        frameBorder.style.boxShadow = '0 0 20px rgba(255, 255, 255, 0.3)';
                        break;
                    case 'vintage':
                        frameBorder.style.border = '6px solid #8B4513';
                        frameBorder.style.boxShadow = '0 0 20px rgba(139, 69, 19, 0.5)';
                        frameCorners.forEach(corner => {
                            corner.style.border = '4px solid #D2691E';
                        });
                        break;
                    case 'modern':
                        frameBorder.style.border = '2px solid #333';
                        frameBorder.style.boxShadow = '0 0 30px rgba(0, 0, 0, 0.8)';
                        frameCorners.forEach(corner => {
                            corner.style.border = '2px solid #666';
                        });
                        break;
                    case 'party':
                        frameBorder.style.border = '5px solid #ff6b6b';
                        frameBorder.style.boxShadow = '0 0 25px rgba(255, 107, 107, 0.6)';
                        frameCorners.forEach(corner => {
                            corner.style.border = '4px solid #feca57';
                        });
                        break;
                    case 'polaroid':
                        frameBorder.style.border = '20px solid #fff';
                        frameBorder.style.borderBottom = '60px solid #fff';
                        frameBorder.style.boxShadow = '0 0 20px rgba(0, 0, 0, 0.3)';
                        frameCorners.forEach(corner => {
                            corner.style.display = 'none';
                        });
                        break;
                }
            }

            async switchCamera() {
                if (this.stream) {
                    this.stream.getTracks().forEach(track => track.stop());
                }
                
                this.facingMode = this.facingMode === 'user' ? 'environment' : 'user';
                
                try {
                    await this.initializeCamera();
                    this.updateCameraStatus(`Switched to ${this.facingMode === 'user' ? 'front' : 'back'} camera`, 'success');
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

            toggleGrid() {
                this.gridEnabled = !this.gridEnabled;
                const gridBtn = document.getElementById('toggleGrid');
                const cameraFrame = document.querySelector('.camera-frame');
                
                if (this.gridEnabled) {
                    gridBtn.classList.add('active');
                    this.addGridOverlay(cameraFrame);
                    this.updateCameraStatus('Grid enabled', 'success');
                } else {
                    gridBtn.classList.remove('active');
                    this.removeGridOverlay(cameraFrame);
                    this.updateCameraStatus('Grid disabled', 'success');
                }
            }

            addGridOverlay(container) {
                if (container.querySelector('.grid-overlay')) return;
                
                const gridOverlay = document.createElement('div');
                gridOverlay.className = 'grid-overlay';
                gridOverlay.style.cssText = `
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    pointer-events: none;
                    z-index: 5;
                    background-image: 
                        linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px),
                        linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px);
                    background-size: 33.33% 33.33%;
                `;
                container.appendChild(gridOverlay);
            }

            removeGridOverlay(container) {
                const gridOverlay = container.querySelector('.grid-overlay');
                if (gridOverlay) {
                    gridOverlay.remove();
                }
            }

            async showCountdown() {
                const countdown = document.getElementById('countdown');
                countdown.style.display = 'block';
                
                for (let i = 3; i > 0; i--) {
                    countdown.textContent = i;
                    await this.delay(1000);
                }
                
                countdown.textContent = 'Ketawa dong anjing';
                await this.delay(500);
                countdown.style.display = 'none';
            }

            flashEffect() {
                const flash = document.createElement('div');
                flash.style.cssText = `
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: white;
                    z-index: 15;
                    opacity: 0.9;
                    pointer-events: none;
                    animation: flashAnimation 0.3s ease-out;
                `;
                
                // Add flash animation keyframes
                if (!document.querySelector('#flashKeyframes')) {
                    const style = document.createElement('style');
                    style.id = 'flashKeyframes';
                    style.textContent = `
                        @keyframes flashAnimation {
                            0% { opacity: 0; }
                            50% { opacity: 0.9; }
                            100% { opacity: 0; }
                        }
                    `;
                    document.head.appendChild(style);
                }
                
                document.querySelector('.camera-frame').appendChild(flash);
                
                setTimeout(() => {
                    flash.remove();
                }, 300);
            }

            async capturePhoto() {
                if (!this.stream) return;

                // Disable capture button temporarily
                const captureBtn = document.getElementById('capturePhoto');
                captureBtn.disabled = true;

                try {
                    // Show countdown
                    await this.showCountdown();

                    // Flash effect
                    if (this.flashEnabled) {
                        this.flashEffect();
                    }

                    // Set canvas size to match video
                    this.canvas.width = this.video.videoWidth;
                    this.canvas.height = this.video.videoHeight;

                    // Save the current context state
                    this.ctx.save();

                    // Flip the canvas horizontally to correct the mirror effect
                    this.ctx.scale(-1, 1);
                    this.ctx.translate(-this.canvas.width, 0);

                    // Draw video frame to canvas (this will be flipped back to normal)
                    this.ctx.drawImage(this.video, 0, 0, this.canvas.width, this.canvas.height);

                    // Restore the context state
                    this.ctx.restore();

                    // Apply current effect to canvas
                    this.applyEffectToCanvas();

                    // Apply frame overlay to canvas
                    this.applyFrameToCanvas();

                    // Show preview
                    this.showPreview();

                    this.updateCameraStatus('Photo captured successfully!', 'success');
                } catch (error) {
                    console.error('Error capturing photo:', error);
                    this.updateCameraStatus('Error capturing photo', 'error');
                } finally {
                    // Re-enable capture button
                    captureBtn.disabled = false;
                }
            }

            applyEffectToCanvas() {
                if (this.currentEffect === 'none') return;

                const imageData = this.ctx.getImageData(0, 0, this.canvas.width, this.canvas.height);
                const data = imageData.data;

                switch (this.currentEffect) {
                    case 'sepia':
                        this.applySepiaEffect(data);
                        break;
                    case 'grayscale':
                        this.applyGrayscaleEffect(data);
                        break;
                    case 'invert':
                        this.applyInvertEffect(data);
                        break;
                    case 'vintage':
                        this.applyVintageEffect(data);
                        break;
                    case 'cool':
                        this.applyCoolEffect(data);
                        break;
                    case 'warm':
                        this.applyWarmEffect(data);
                        break;
                    case 'dramatic':
                        this.applyDramaticEffect(data);
                        break;
                    case 'dreamy':
                        this.applyDreamyEffect(data);
                        break;
                    case 'pop':
                        this.applyPopEffect(data);
                        break;
                    case 'noir':
                        this.applyNoirEffect(data);
                        break;
                    case 'saturate':
                        this.applySaturateEffect(data);
                        break;
                }

                this.ctx.putImageData(imageData, 0, 0);
            }

            applySepiaEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    const r = data[i];
                    const g = data[i + 1];
                    const b = data[i + 2];
                    
                    data[i] = Math.min(255, (r * 0.393) + (g * 0.769) + (b * 0.189));
                    data[i + 1] = Math.min(255, (r * 0.349) + (g * 0.686) + (b * 0.168));
                    data[i + 2] = Math.min(255, (r * 0.272) + (g * 0.534) + (b * 0.131));
                }
            }

            applyGrayscaleEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    const gray = data[i] * 0.299 + data[i + 1] * 0.587 + data[i + 2] * 0.114;
                    data[i] = gray;
                    data[i + 1] = gray;
                    data[i + 2] = gray;
                }
            }

            applyInvertEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    data[i] = 255 - data[i];
                    data[i + 1] = 255 - data[i + 1];
                    data[i + 2] = 255 - data[i + 2];
                }
            }

            applyVintageEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    const r = data[i];
                    const g = data[i + 1];
                    const b = data[i + 2];
                    
                    // Apply sepia first
                    data[i] = Math.min(255, (r * 0.393) + (g * 0.769) + (b * 0.189));
                    data[i + 1] = Math.min(255, (r * 0.349) + (g * 0.686) + (b * 0.168));
                    data[i + 2] = Math.min(255, (r * 0.272) + (g * 0.534) + (b * 0.131));
                    
                    // Reduce saturation and increase contrast
                    data[i] = Math.min(255, data[i] * 1.2);
                    data[i + 1] = Math.min(255, data[i + 1] * 1.1);
                    data[i + 2] = Math.min(255, data[i + 2] * 0.8);
                }
            }

            applyCoolEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    data[i] = Math.max(0, data[i] - 20); // Reduce red
                    data[i + 1] = Math.min(255, data[i + 1] + 10); // Increase green
                    data[i + 2] = Math.min(255, data[i + 2] + 30); // Increase blue
                }
            }

            applyWarmEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    data[i] = Math.min(255, data[i] + 30); // Increase red
                    data[i + 1] = Math.min(255, data[i + 1] + 15); // Increase green
                    data[i + 2] = Math.max(0, data[i + 2] - 10); // Reduce blue
                }
            }

            applyDramaticEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    // Increase contrast
                    data[i] = data[i] > 128 ? Math.min(255, data[i] * 1.8) : Math.max(0, data[i] * 0.6);
                    data[i + 1] = data[i + 1] > 128 ? Math.min(255, data[i + 1] * 1.8) : Math.max(0, data[i + 1] * 0.6);
                    data[i + 2] = data[i + 2] > 128 ? Math.min(255, data[i + 2] * 1.8) : Math.max(0, data[i + 2] * 0.6);
                }
            }

            applyDreamyEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    // Soften and brighten
                    data[i] = Math.min(255, data[i] * 1.2);
                    data[i + 1] = Math.min(255, data[i + 1] * 1.3);
                    data[i + 2] = Math.min(255, data[i + 2] * 1.1);
                }
            }

            applyPopEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    // Increase saturation and contrast
                    data[i] = Math.min(255, data[i] * 1.4);
                    data[i + 1] = Math.min(255, data[i + 1] * 1.8);
                    data[i + 2] = Math.min(255, data[i + 2] * 1.4);
                }
            }

            applyNoirEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    // Convert to grayscale first
                    const gray = data[i] * 0.299 + data[i + 1] * 0.587 + data[i + 2] * 0.114;
                    
                    // Apply high contrast
                    const contrast = gray > 128 ? Math.min(255, gray * 1.5) : Math.max(0, gray * 0.5);
                    
                    data[i] = contrast;
                    data[i + 1] = contrast;
                    data[i + 2] = contrast;
                }
            }

            applySaturateEffect(data) {
                for (let i = 0; i < data.length; i += 4) {
                    // Increase saturation
                    data[i] = Math.min(255, data[i] * 1.8);
                    data[i + 1] = Math.min(255, data[i + 1] * 1.8);
                    data[i + 2] = Math.min(255, data[i + 2] * 1.8);
                }
            }

            applyFrameToCanvas() {
                const frameWidth = 20;
                const cornerSize = 30;
                
                this.ctx.save();
                
                switch (this.currentFrame) {
                    case 'classic':
                        this.drawClassicFrame(frameWidth, cornerSize);
                        break;
                    case 'vintage':
                        this.drawVintageFrame(frameWidth, cornerSize);
                        break;
                    case 'modern':
                        this.drawModernFrame(frameWidth, cornerSize);
                        break;
                    case 'party':
                        this.drawPartyFrame(frameWidth, cornerSize);
                        break;
                    case 'polaroid':
                        this.drawPolaroidFrame();
                        break;
                }
                
                this.ctx.restore();
            }

            drawClassicFrame(frameWidth, cornerSize) {
                // Draw white border
                this.ctx.strokeStyle = '#ffffff';
                this.ctx.lineWidth = 4;
                this.ctx.strokeRect(frameWidth, frameWidth, this.canvas.width - frameWidth * 2, this.canvas.height - frameWidth * 2);
                
                // Draw golden corners
                this.ctx.strokeStyle = '#ffd700';
                this.ctx.lineWidth = 3;
                this.drawCorners(cornerSize);
            }

            drawVintageFrame(frameWidth, cornerSize) {
                // Draw brown border
                this.ctx.strokeStyle = '#8B4513';
                this.ctx.lineWidth = 6;
                this.ctx.strokeRect(frameWidth, frameWidth, this.canvas.width - frameWidth * 2, this.canvas.height - frameWidth * 2);
                
                // Draw orange corners
                this.ctx.strokeStyle = '#D2691E';
                this.ctx.lineWidth = 4;
                this.drawCorners(cornerSize);
            }

            drawModernFrame(frameWidth, cornerSize) {
                // Draw dark border
                this.ctx.strokeStyle = '#333333';
                this.ctx.lineWidth = 2;
                this.ctx.strokeRect(frameWidth, frameWidth, this.canvas.width - frameWidth * 2, this.canvas.height - frameWidth * 2);
                
                // Draw gray corners
                this.ctx.strokeStyle = '#666666';
                this.ctx.lineWidth = 2;
                this.drawCorners(cornerSize);
            }

            drawPartyFrame(frameWidth, cornerSize) {
                // Draw colorful border
                this.ctx.strokeStyle = '#ff6b6b';
                this.ctx.lineWidth = 5;
                this.ctx.strokeRect(frameWidth, frameWidth, this.canvas.width - frameWidth * 2, this.canvas.height - frameWidth * 2);
                
                // Draw yellow corners
                this.ctx.strokeStyle = '#feca57';
                this.ctx.lineWidth = 4;
                this.drawCorners(cornerSize);
            }

            drawPolaroidFrame() {
                // Draw white polaroid border
                this.ctx.fillStyle = '#ffffff';
                
                // Top border
                this.ctx.fillRect(0, 0, this.canvas.width, 20);
                // Left border
                this.ctx.fillRect(0, 0, 20, this.canvas.height);
                // Right border
                this.ctx.fillRect(this.canvas.width - 20, 0, 20, this.canvas.height);
                // Bottom border (larger for polaroid effect)
                this.ctx.fillRect(0, this.canvas.height - 60, this.canvas.width, 60);
                
                // Add polaroid text
                this.ctx.fillStyle = '#666666';
                this.ctx.font = '16px Arial';
                this.ctx.textAlign = 'center';
                this.ctx.fillText('L-PhotoBooth', this.canvas.width / 2, this.canvas.height - 20);
            }

            drawCorners(cornerSize) {
                // Top-left corner
                this.ctx.beginPath();
                this.ctx.moveTo(10, 10 + cornerSize);
                this.ctx.lineTo(10, 10);
                this.ctx.lineTo(10 + cornerSize, 10);
                this.ctx.stroke();
                
                // Top-right corner
                this.ctx.beginPath();
                this.ctx.moveTo(this.canvas.width - 10 - cornerSize, 10);
                this.ctx.lineTo(this.canvas.width - 10, 10);
                this.ctx.lineTo(this.canvas.width - 10, 10 + cornerSize);
                this.ctx.stroke();
                
                // Bottom-left corner
                this.ctx.beginPath();
                this.ctx.moveTo(10, this.canvas.height - 10 - cornerSize);
                this.ctx.lineTo(10, this.canvas.height - 10);
                this.ctx.lineTo(10 + cornerSize, this.canvas.height - 10);
                this.ctx.stroke();
                
                // Bottom-right corner
                this.ctx.beginPath();
                this.ctx.moveTo(this.canvas.width - 10 - cornerSize, this.canvas.height - 10);
                this.ctx.lineTo(this.canvas.width - 10, this.canvas.height - 10);
                this.ctx.lineTo(this.canvas.width - 10, this.canvas.height - 10 - cornerSize);
                this.ctx.stroke();
            }

            showPreview() {
                const preview = document.getElementById('photoPreview');
                const previewImage = document.getElementById('previewImage');
                
                // Convert canvas to image
                const dataURL = this.canvas.toDataURL('image/jpeg', 0.9);
                previewImage.src = dataURL;
                
                // Show preview section
                preview.style.display = 'block';
                
                // Hide camera frame
                document.querySelector('.camera-frame').style.display = 'none';
                document.querySelector('.camera-controls').style.display = 'none';
                document.querySelector('.controls-section').style.display = 'none';
            }

            hidePreview() {
                const preview = document.getElementById('photoPreview');
                preview.style.display = 'none';
                
                // Show camera frame
                document.querySelector('.camera-frame').style.display = 'block';
                document.querySelector('.camera-controls').style.display = 'flex';
                document.querySelector('.controls-section').style.display = 'block';
            }

            retakePhoto() {
                this.hidePreview();
                this.updateCameraStatus('Ready to take another photo!', 'success');
            }

            downloadPhoto() {
                const canvas = this.canvas;
                const link = document.createElement('a');
                const timestamp = new Date().toISOString().replace(/[:.]/g, '-');
                link.download = `L-PhotoBooth-${timestamp}.jpg`;
                link.href = canvas.toDataURL('image/jpeg', 0.9);
                link.click();
                
                this.updateCameraStatus('Photo downloaded successfully!', 'success');
            }

            async sharePhoto() {
                try {
                    const canvas = this.canvas;
                    
                    // Convert canvas to blob
                    canvas.toBlob(async (blob) => {
                        const timestamp = new Date().toISOString().replace(/[:.]/g, '-');
                        const file = new File([blob], `L-PhotoBooth-${timestamp}.jpg`, {
                            type: 'image/jpeg'
                        });
                        
                        if (navigator.share && navigator.canShare && navigator.canShare({ files: [file] })) {
                            try {
                                await navigator.share({
                                    files: [file],
                                    title: 'L-PhotoBooth Photo',
                                    text: 'Check out this amazing photo from L-PhotoBooth! 📸'
                                });
                                this.updateCameraStatus('Photo shared successfully!', 'success');
                            } catch (error) {
                                if (error.name !== 'AbortError') {
                                    console.error('Error sharing:', error);
                                    this.fallbackShare();
                                }
                            }
                        } else {
                            this.fallbackShare();
                        }
                    }, 'image/jpeg', 0.9);
                } catch (error) {
                    console.error('Error preparing photo for sharing:', error);
                    this.fallbackShare();
                }
            }

            fallbackShare() {
                // Fallback: copy image data URL to clipboard or show share options
                const dataURL = this.canvas.toDataURL('image/jpeg', 0.9);
                
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(dataURL).then(() => {
                        this.updateCameraStatus('Photo data copied to clipboard!', 'success');
                    }).catch(() => {
                        this.showShareModal(dataURL);
                    });
                } else {
                    this.showShareModal(dataURL);
                }
            }

            showShareModal(dataURL) {
                // Create a simple share modal
                const modal = document.createElement('div');
                modal.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.8);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    z-index: 2000;
                `;
                
                modal.innerHTML = `
                    <div style="background: white; padding: 20px; border-radius: 10px; max-width: 400px; text-align: center;">
                        <h3>Share Your Photo</h3>
                        <p>Right-click the image below and select "Save image as..." or "Copy image"</p>
                        <img src="${dataURL}" style="max-width: 100%; height: auto; border-radius: 5px; margin: 10px 0;">
                        <button onclick="this.parentElement.parentElement.remove()" style="padding: 10px 20px; background: #667eea; color: white; border: none; border-radius: 5px; cursor: pointer;">Close</button>
                    </div>
                `;
                
                document.body.appendChild(modal);
                
                // Close modal when clicking outside
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.remove();
                    }
                });
            }

            updateCameraStatus(message, type = 'info') {
                const statusElement = document.getElementById('cameraStatus');
                const icons = {
                    success: 'fas fa-check-circle',
                    error: 'fas fa-exclamation-circle',
                    warning: 'fas fa-exclamation-triangle',
                    info: 'fas fa-info-circle'
                };
                
                const colors = {
                    success: '#4CAF50',
                    error: '#f44336',
                    warning: '#ff9800',
                    info: '#2196F3'
                };
                
                statusElement.innerHTML = `<i class="${icons[type]}"></i> ${message}`;
                statusElement.style.color = colors[type];
                
                // Auto-hide status after 3 seconds for success messages
                if (type === 'success') {
                    setTimeout(() => {
                        statusElement.innerHTML = '<i class="fas fa-circle"></i> Camera ready - Strike a pose!';
                        statusElement.style.color = colors.info;
                    }, 3000);
                }
            }

            delay(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }
        }

        // Initialize Photo Booth when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new PhotoBooth();
        });

        // Additional utility functions
        function initializeGalleryLightbox() {
            const galleryItems = document.querySelectorAll('.gallery-item');
            
            galleryItems.forEach(item => {
                item.addEventListener('click', () => {
                    const img = item.querySelector('img');
                    const lightbox = document.createElement('div');
                    lightbox.className = 'lightbox';
                    lightbox.style.cssText = `
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: rgba(0, 0, 0, 0.9);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        z-index: 1000;
                        cursor: pointer;
                    `;
                    
                    const lightboxImg = document.createElement('img');
                    lightboxImg.src = img.src;
                    lightboxImg.alt = img.alt;
                    lightboxImg.style.cssText = `
                        max-width: 90%;
                        max-height: 90%;
                        object-fit: contain;
                        border-radius: 10px;
                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
                    `;
                    
                    lightbox.appendChild(lightboxImg);
                    document.body.appendChild(lightbox);
                    
                    lightbox.addEventListener('click', () => {
                        lightbox.remove();
                    });
                });
            });
        }

        // Initialize gallery lightbox
        document.addEventListener('DOMContentLoaded', initializeGalleryLightbox);

        // Load more gallery functionality
        document.getElementById('loadMoreGallery').addEventListener('click', function() {
            const button = this;
            const originalText = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            button.disabled = true;
            
            // Simulate loading more images
            setTimeout(() => {
                const galleryGrid = document.querySelector('.gallery-grid');
                const newImages = [
                    {
                        src: '{{ asset("storage/image/orang1.jpeg") }}',
                        alt: 'Additional Wedding Photo',
                        category: 'wedding',
                        title: 'Wedding Memories',
                        description: 'More beautiful wedding moments'
                    },
                    {
                        src: '{{ asset("storage/image/orang2.jpeg") }}',
                        alt: 'Additional Corporate Photo',
                        category: 'corporate',
                        title: 'Corporate Success',
                        description: 'Professional team building'
                    }
                ];
                
                newImages.forEach((imgData, index) => {
                    const galleryItem = document.createElement('div');
                    galleryItem.className = 'gallery-item';
                    galleryItem.setAttribute('data-category', imgData.category);
                    galleryItem.setAttribute('data-aos', 'fade-up');
                    galleryItem.setAttribute('data-aos-delay', (index * 100).toString());
                    
                    galleryItem.innerHTML = `
                        <img src="${imgData.src}" alt="${imgData.alt}" loading="lazy">
                        <div class="gallery-overlay">
                            <h4>${imgData.title}</h4>
                            <p>${imgData.description}</p>
                        </div>
                    `;
                    
                    galleryGrid.appendChild(galleryItem);
                });
                
                // Reinitialize AOS for new elements
                AOS.refresh();
                
                // Reinitialize lightbox for new images
                initializeGalleryLightbox();
                
                button.innerHTML = originalText;
                button.disabled = false;
                
                // Hide button after loading
                button.style.display = 'none';
            }, 1500);
        });
    </script>

    <!-- Google Analytics (replace with your tracking ID) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_TRACKING_ID');
    </script>

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "L-PhotoBooth",
        "description": "Professional photo booth rental services for weddings, parties, corporate events, and special occasions",
        "url": "{{ url('/') }}",
        "telephone": "+1-555-123-4567",
        "email": "info@lphotobooth.com",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Metro Area",
            "addressCountry": "US"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "40.7128",
            "longitude": "-74.0060"
        },
        "openingHours": "Mo-Fr 09:00-18:00",
        "priceRange": "$299-$799",
        "serviceArea": {
            "@type": "GeoCircle",
            "geoMidpoint": {
                "@type": "GeoCoordinates",
                "latitude": "40.7128",
                "longitude": "-74.0060"
            },
            "geoRadius": "40000"
        },
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Photo Booth Packages",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Basic Package",
                        "description": "4 hours photo booth service with basic features"
                    },
                    "price": "299",
                    "priceCurrency": "USD"
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Premium Package",
                        "description": "6 hours photo booth service with premium features"
                    },
                    "price": "499",
                    "priceCurrency": "USD"
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Deluxe Package",
                        "description": "8 hours photo booth service with deluxe features"
                    },
                    "price": "799",
                    "priceCurrency": "USD"
                }
            ]
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "reviewCount": "150"
        },
        "review": [
            {
                "@type": "Review",
                "author": {
                    "@type": "Person",
                    "name": "Sarah Johnson"
                },
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "5"
                },
                "reviewBody": "L-PhotoBooth made our wedding absolutely perfect! The quality of photos was amazing and our guests loved it."
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
                
                // Send to analytics if needed
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'timing_complete', {
                        'name': 'load',
                        'value': loadTime
                    });
                }
            }
        });

        // Error tracking
        window.addEventListener('error', function(e) {
            console.error('JavaScript error:', e.error);
            
            // Send to error tracking service if needed
            if (typeof gtag !== 'undefined') {
                gtag('event', 'exception', {
                    'description': e.error.message,
                    'fatal': false
                });
            }
        });

        // Service Worker registration for PWA capabilities
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js')
                    .then(function(registration) {
                        console.log('ServiceWorker registration successful');
                    })
                    .catch(function(err) {
                        console.log('ServiceWorker registration failed: ', err);
                    });
            });
        }

        // Add to home screen prompt
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            
            // Show install button or banner
            const installBanner = document.createElement('div');
            installBanner.innerHTML = `
                <div style="position: fixed; bottom: 20px; right: 20px; background: #667eea; color: white; padding: 15px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); z-index: 1000; max-width: 300px;">
                    <p style="margin: 0 0 10px 0; font-size: 14px;">Install L-PhotoBooth app for better experience!</p>
                    <button onclick="installApp()" style="background: white; color: #667eea; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer; margin-right: 10px;">Install</button>
                    <button onclick="this.parentElement.parentElement.remove()" style="background: transparent; color: white; border: 1px solid white; padding: 8px 16px; border-radius: 5px; cursor: pointer;">Later</button>
                </div>
            `;
            document.body.appendChild(installBanner);
        });

        function installApp() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted the install prompt');
                    }
                    deferredPrompt = null;
                });
            }
        }
    </script>

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
</body>
</html>
