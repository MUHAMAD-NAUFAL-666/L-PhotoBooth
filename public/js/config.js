// L-PhotoBooth Configuration File
const LPhotoBoothConfig = {
    // API Endpoints
    api: {
        baseUrl: '/api',
        endpoints: {
            contact: '/contact',
            booking: '/booking',
            gallery: '/gallery',
            testimonials: '/testimonials'
        }
    },

    // Animation Settings
    animations: {
        duration: {
            fast: 300,
            normal: 600,
            slow: 1000
        },
        easing: 'ease-in-out',
        stagger: 100
    },

    // Scroll Settings
    scroll: {
        offset: 80,
        behavior: 'smooth',
        threshold: 0.1
    },

    // Gallery Settings
    gallery: {
        itemsPerPage: 12,
        lazyLoad: true,
        lightbox: true
    },

    // Contact Form Settings
    contact: {
        validation: {
            required: ['name', 'email', 'message'],
            email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
            phone: /^[\+]?[1-9][\d]{0,15}$/
        },
        messages: {
            success: 'Thank you! Your message has been sent successfully.',
            error: 'Sorry, there was an error sending your message. Please try again.',
            validation: {
                required: 'This field is required.',
                email: 'Please enter a valid email address.',
                phone: 'Please enter a valid phone number.'
            }
        }
    },

    // Social Media Links
    social: {
        facebook: 'https://facebook.com/lphotobooth',
        instagram: 'https://instagram.com/lphotobooth',
        twitter: 'https://twitter.com/lphotobooth',
        linkedin: 'https://linkedin.com/company/lphotobooth',
        youtube: 'https://youtube.com/lphotobooth'
    },

    // Business Information
    business: {
        name: 'L-PhotoBooth',
        phone: '+1 (555) 123-4567',
        email: 'info@lphotobooth.com',
        address: 'Greater Metro Area',
        hours: {
            monday: '9:00 AM - 6:00 PM',
            tuesday: '9:00 AM - 6:00 PM',
            wednesday: '9:00 AM - 6:00 PM',
            thursday: '9:00 AM - 6:00 PM',
            friday: '9:00 AM - 8:00 PM',
            saturday: '10:00 AM - 8:00 PM',
            sunday: '12:00 PM - 6:00 PM'
        }
    },

    // Pricing Information
    pricing: {
        packages: [
            {
                id: 'basic',
                name: 'Basic Package',
                price: 299,
                duration: 4,
                features: [
                    '4 hours photo booth service',
                    'Unlimited photos',
                    'Basic props collection',
                    'Instant printing (2 copies)',
                    'Digital gallery access',
                    'Professional attendant'
                ]
            },
            {
                id: 'premium',
                name: 'Premium Package',
                price: 499,
                duration: 6,
                featured: true,
                features: [
                    '6 hours photo booth service',
                    'Unlimited photos',
                    'Premium props & backdrops',
                    'Instant printing (3 copies)',
                    'Custom photo templates',
                    'Social media sharing',
                    'Digital gallery & USB drive',
                    'Professional attendant'
                ]
            },
            {
                id: 'deluxe',
                name: 'Deluxe Package',
                price: 799,
                duration: 8,
                features: [
                    '8 hours photo booth service',
                    'Unlimited photos & videos',
                    'Deluxe props & custom backdrops',
                    'Instant printing (4 copies)',
                    'Custom branding & templates',
                    'Social media integration',
                    'Digital gallery & USB drive',
                    'Guest book creation',
                    '2 professional attendants'
                ]
            }
        ]
    },

    // Feature Information
    features: [
        {
            icon: 'fas fa-camera-retro',
            title: 'High-Quality Photos',
            description: 'Professional DSLR cameras and studio lighting ensure every photo is picture-perfect with vibrant colors and sharp details.'
        },
        {
            icon: 'fas fa-print',
            title: 'Instant Printing',
            description: 'Get your photos printed instantly with our high-speed printers. Take home beautiful keepsakes within seconds.'
        },
        {
            icon: 'fas fa-palette',
            title: 'Custom Backgrounds',
            description: 'Choose from hundreds of digital backgrounds or create custom ones to match your event theme perfectly.'
        },
        {
            icon: 'fas fa-share-alt',
            title: 'Social Media Ready',
            description: 'Instantly share your photos on social media platforms or send them via email and SMS to your guests.'
        },
        {
            icon: 'fas fa-magic',
            title: 'Fun Props & Effects',
            description: 'Extensive collection of props, filters, and special effects to make your photos more entertaining and memorable.'
        },
        {
            icon: 'fas fa-headset',
            title: 'Professional Support',
            description: 'Our experienced attendants ensure smooth operation and help your guests create amazing photos throughout the event.'
        }
    ]
};

// Export configuration
if (typeof module !== 'undefined' && module.exports) {
    module.exports = LPhotoBoothConfig;
}
