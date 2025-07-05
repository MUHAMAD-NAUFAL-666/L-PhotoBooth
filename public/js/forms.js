// L-PhotoBooth Form Handler
class FormHandler {
    constructor() {
        this.init();
    }

    init() {
        this.setupContactForm();
        this.setupBookingForm();
        this.setupNewsletterForm();
    }

    // Contact Form
    setupContactForm() {
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleContactSubmission(contactForm);
            });
        }
    }

    async handleContactSubmission(form) {
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);

        try {
            // Validate form
            this.validateContactForm(data);

            // Show loading state
            this.showFormLoading(form);

            // Submit form (replace with actual API call)
            const response = await this.submitContactForm(data);

            // Show success message
            this.showFormSuccess(form, 'Thank you! Your message has been sent successfully.');

            // Reset form
            form.reset();

        } catch (error) {
            this.showFormError(form, error.message);
        } finally {
            this.hideFormLoading(form);
        }
    }

    validateContactForm(data) {
        const { name, email, phone, message } = data;

        if (!name || name.trim().length < 2) {
            throw new Error('Please enter a valid name (at least 2 characters).');
        }

        if (!email || !this.isValidEmail(email)) {
            throw new Error('Please enter a valid email address.');
        }

        if (phone && !this.isValidPhone(phone)) {
            throw new Error('Please enter a valid phone number.');
        }

        if (!message || message.trim().length < 10) {
            throw new Error('Please enter a message (at least 10 characters).');
        }
    }

    // Booking Form
    setupBookingForm() {
        const bookingForm = document.getElementById('bookingForm');
        if (bookingForm) {
            bookingForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleBookingSubmission(bookingForm);
            });
        }
    }

    async handleBookingSubmission(form) {
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);

        try {
            this.validateBookingForm(data);
            this.showFormLoading(form);

            const response = await this.submitBookingForm(data);
            this.showFormSuccess(form, 'Booking request submitted! We\'ll contact you within 24 hours.');

            form.reset();

        } catch (error) {
            this.showFormError(form, error.message);
        } finally {
            this.hideFormLoading(form);
        }
    }

    validateBookingForm(data) {
        const { name, email, phone, eventDate, eventType, packageType } = data;

        if (!name || name.trim().length < 2) {
            throw new Error('Please enter a valid name.');
        }

        if (!email || !this.isValidEmail(email)) {
            throw new Error('Please enter a valid email address.');
        }

        if (!phone || !this.isValidPhone(phone)) {
            throw new Error('Please enter a valid phone number.');
        }

        if (!eventDate) {
            throw new Error('Please select an event date.');
        }

        // Check if date is in the future
        const selectedDate = new Date(eventDate);
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (selectedDate < today) {
            throw new Error('Please select a future date for your event.');
        }

        if (!eventType) {
            throw new Error('Please select an event type.');
        }

        if (!packageType) {
            throw new Error('Please select a package.');
        }
    }

    // Newsletter Form
    setupNewsletterForm() {
        const newsletterForm = document.getElementById('newsletterForm');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleNewsletterSubmission(newsletterForm);
            });
        }
    }

    async handleNewsletterSubmission(form) {
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);

        try {
            if (!data.email || !this.isValidEmail(data.email)) {
                throw new Error('Please enter a valid email address.');
            }

            this.showFormLoading(form);

            const response = await this.submitNewsletterForm(data);
            this.showFormSuccess(form, 'Thank you for subscribing to our newsletter!');

            form.reset();

        } catch (error) {
            this.showFormError(form, error.message);
        } finally {
            this.hideFormLoading(form);
        }
    }

    // API Calls (replace with actual endpoints)
    async submitContactForm(data) {
        // Simulate API call
        return new Promise((resolve) => {
            setTimeout(() => {
                resolve({ success: true });
            }, 1000);
        });
    }

    async submitBookingForm(data) {
        // Simulate API call
        return new Promise((resolve) => {
            setTimeout(() => {
                resolve({ success: true });
            }, 1000);
        });
    }

    async submitNewsletterForm(data) {
        // Simulate API call
        return new Promise((resolve) => {
            setTimeout(() => {
                resolve({ success: true });
            }, 1000);
        });
    }

    // Validation Helpers
    isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    isValidPhone(phone) {
        const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
        return phoneRegex.test(phone.replace(/[\s\-\(\)]/g, ''));
    }

    // UI Helpers
    showFormLoading(form) {
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
        }
    }

    hideFormLoading(form) {
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = submitBtn.dataset.originalText || 'Send Message';
        }
    }

    showFormSuccess(form, message) {
        this.showFormMessage(form, message, 'success');
    }

    showFormError(form, message) {
        this.showFormMessage(form, message, 'error');
    }

    showFormMessage(form, message, type) {
        // Remove existing messages
        const existingMessage = form.querySelector('.form-message');
        if (existingMessage) {
            existingMessage.remove();
        }

        // Create new message
        const messageDiv = document.createElement('div');
        messageDiv.className = `form-message form-message-${type}`;
        messageDiv.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            ${message}
        `;

        // Add styles
        messageDiv.style.cssText = `
            padding: 1rem;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            background: ${type === 'success' ? '#d1fae5' : '#fee2e2'};
            color: ${type === 'success' ? '#065f46' : '#991b1b'};
            border: 1px solid ${type === 'success' ? '#a7f3d0' : '#fecaca'};
            animation: slideIn 0.3s ease;
        `;

        // Insert message
        form.insertBefore(messageDiv, form.firstChild);

        // Auto remove after 5 seconds
        setTimeout(() => {
            if (messageDiv.parentNode) {
                messageDiv.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => {
                    messageDiv.remove();
                }, 300);
            }
        }, 5000);
    }

    // Real-time validation
    setupRealTimeValidation(form) {
        const inputs = form.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            input.addEventListener('blur', () => {
                this.validateField(input);
            });

            input.addEventListener('input', () => {
                this.clearFieldError(input);
            });
        });
    }

    validateField(field) {
        const value = field.value.trim();
        const fieldName = field.name;
        let isValid = true;
        let errorMessage = '';

        // Required field validation
        if (field.hasAttribute('required') && !value) {
            isValid = false;
            errorMessage = 'This field is required.';
        }

        // Email validation
        if (fieldName === 'email' && value && !this.isValidEmail(value)) {
            isValid = false;
            errorMessage = 'Please enter a valid email address.';
        }

        // Phone validation
        if (fieldName === 'phone' && value && !this.isValidPhone(value)) {
            isValid = false;
            errorMessage = 'Please enter a valid phone number.';
        }

        // Name validation
        if (fieldName === 'name' && value && value.length < 2) {
            isValid = false;
            errorMessage = 'Name must be at least 2 characters long.';
        }

        // Message validation
        if (fieldName === 'message' && value && value.length < 10) {
            isValid = false;
            errorMessage = 'Message must be at least 10 characters long.';
        }

        // Date validation
        if (field.type === 'date' && value) {
            const selectedDate = new Date(value);
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            if (selectedDate < today) {
                isValid = false;
                errorMessage = 'Please select a future date.';
            }
        }

        if (isValid) {
            this.showFieldSuccess(field);
        } else {
            this.showFieldError(field, errorMessage);
        }

        return isValid;
    }

    showFieldError(field, message) {
        this.clearFieldError(field);
        
        field.classList.add('field-error');
        
        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error-message';
        errorDiv.textContent = message;
        errorDiv.style.cssText = `
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        `;
        
        field.parentNode.appendChild(errorDiv);
    }

    showFieldSuccess(field) {
        this.clearFieldError(field);
        field.classList.add('field-success');
        field.classList.remove('field-error');
    }

    clearFieldError(field) {
        field.classList.remove('field-error', 'field-success');
        const errorMessage = field.parentNode.querySelector('.field-error-message');
        if (errorMessage) {
            errorMessage.remove();
        }
    }
}

// Initialize form handler when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new FormHandler();
});

// Export for module use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = FormHandler;
}
