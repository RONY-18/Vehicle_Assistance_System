<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spanner Man</title>
    <link rel="stylesheet" href="style.css">
    <style>
        footer {
            background: #333;
            color: white;
            padding: 3rem 2rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
        }

        .footer-section a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #ff4d4d;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
    </style>
</head>
<body>
<header>
        <nav>
            <div class="logo">
                <h1>Spanner Man 24/7</h1>
            </div>
            <ul>
                <li><a href="./index.php" class="active">Home</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="./service.php">Services</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <li><a href="./login.php" class="admin-btn">Login</a></li>
            </ul>
            <div class="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>
<br>
<br>
<br>
<br>
<br>
<br>
    <main>
         <section id="emergency-form" class="hero">
            
            <h2 style="color:red">Need Emergency Assistance?</h2>
            <br>
            <br>
            <form id="assistance-form" action="process_request.php" method="POST">
                
               <a href="./service.php"> <button type="button" class="submit-btn">Request Assistance</button></a>
            </form>
        </section>

        <section id="services" style="margin-left : 100px;">
            <h2>Our Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <img src="images/tire_services.png" alt="Tire Service">
                    <h3>Tire Service</h3>
                    <p>Flat tire change and repair services</p>
                </div>
                <div class="service-card">
                    <img src="images/battery_service.png" alt="Battery Service">
                    <h3>Battery Service</h3>
                    <p>Jump start and battery replacement</p>
                </div>
                <div class="service-card">
                    <img src="images/fuel delivry.png" alt="Fuel Delivery">
                    <h3>Fuel Delivery</h3>
                    <p>Emergency fuel delivery service</p>
                </div>
                <div class="service-card">
                    <img src="images/towing_service.png" alt="Towing">
                    <h3>Towing Service</h3>
                    <p>24/7 emergency towing available</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>📞 Emergency: (555) 0123-4567</p>
                <p>📧 Email: spannerman0075@gmail.com</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="./about.php">About Us</a>
                <a href="./service.php">Services</a>
                <a href="./contact.php">Contact</a>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="#" class="social-icon">Facebook</a>
                    <a href="#" class="social-icon">Twitter</a>
                    <a href="#" class="social-icon">Instagram</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 RoadHelp 24/7. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // script.js
document.addEventListener('DOMContentLoaded', function() {
    // Form submission handling
    const assistanceForm = document.getElementById('assistance-form');
    
    assistanceForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Form validation
        if (!validateForm()) {
            return;
        }

        // Submit form data
        const formData = new FormData(assistanceForm);
        
        fetch('process_request.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Your request has been submitted. Our team will contact you shortly.');
                assistanceForm.reset();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });
});

function validateForm() {
    const name = document.getElementById('name').value;
    const phone = document.getElementById('phone').value;
    const location = document.getElementById('location').value;
    const issue = document.getElementById('issue').value;

    if (!name || !phone || !location || !issue) {
        alert('Please fill in all required fields');
        return false;
    }

    // Phone number validation
    const phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phone)) {
        alert('Please enter a valid 10-digit phone number');
        return false;
    }

    return true;
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                
                // Reverse geocoding using OpenStreetMap Nominatim API
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`)
                    .then(response => response.json())
                    .then(data => {
                        const address = data.display_name;
                        document.getElementById('location').value = address;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Could not fetch address. Please enter manually.');
                    });
            },
            function(error) {
                console.error('Error:', error);
                alert('Could not get your location. Please enter manually.');
            }
        );
    } else {
        alert('Geolocation is not supported by your browser');
    }
}



// script.js
document.addEventListener('DOMContentLoaded', function() {
    // Add background animation div
    const backgroundAnimation = document.createElement('div');
    backgroundAnimation.className = 'background-animation';
    document.body.prepend(backgroundAnimation);

    // Header scroll effect
    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Animate service cards on scroll
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach((card, index) => {
        card.style.setProperty('--card-index', index);
    });

    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, {
        threshold: 0.1
    });

    serviceCards.forEach(card => {
        card.style.animationPlayState = 'paused';
        observer.observe(card);
    });

    // Enhanced form submission with loading state
    const assistanceForm = document.getElementById('assistance-form');
    const submitBtn = assistanceForm.querySelector('.submit-btn');
    
    assistanceForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (!validateForm()) {
            return;
        }

        // Add loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="loading-spinner"></span> Submitting...';
        
        try {
            const formData = new FormData(assistanceForm);
            const response = await fetch('process_request.php', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                showNotification('Success! Our team will contact you shortly.', 'success');
                assistanceForm.reset();
            } else {
                showNotification('Error: ' + data.message, 'error');
            }
        } catch (error) {
            console.error('Error:', error);
            showNotification('An error occurred. Please try again.', 'error');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Request Assistance';
        }
    });
});

// Enhanced form validation with visual feedback
function validateForm() {
    const name = document.getElementById('name');
    const phone = document.getElementById('phone');
    const location = document.getElementById('location');
    const issue = document.getElementById('issue');
    let isValid = true;

    // Reset previous validation states
    [name, phone, location, issue].forEach(field => {
        field.classList.remove('invalid', 'valid');
    });

    if (!name.value.trim()) {
        showFieldError(name, 'Please enter your name');
        isValid = false;
    } else {
        showFieldSuccess(name);
    }

    const phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phone.value)) {
        showFieldError(phone, 'Please enter a valid 10-digit phone number');
        isValid = false;
    } else {
        showFieldSuccess(phone);
    }

    if (!location.value.trim()) {
        showFieldError(location, 'Please enter your location');
        isValid = false;
    } else {
        showFieldSuccess(location);
    }

    if (!issue.value) {
        showFieldError(issue, 'Please select an issue');
        isValid = false;
    } else {
        showFieldSuccess(issue);
    }

    return isValid;
}

function showFieldError(field, message) {
    field.classList.add('invalid');
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.textContent = message;
    field.parentNode.appendChild(errorDiv);
}

function showFieldSuccess(field) {
    field.classList.add('valid');
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    document.body.appendChild(notification);

    // Animate in
    setTimeout(() => notification.classList.add('show'), 100);

    // Remove after 5 seconds
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 5000);
}

// Enhanced geolocation with loading state
function getLocation() {
    const locationBtn = document.querySelector('.location-btn');
    const locationInput = document.getElementById('location');

    if (navigator.geolocation) {
        locationBtn.disabled = true;
        locationBtn.innerHTML = '<span class="loading-spinner"></span> Getting location...';
        
        navigator.geolocation.getCurrentPosition(
            async function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                
                try {
                    const response = await fetch(
                        `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`
                    );
                    const data = await response.json();
                    locationInput.value = data.display_name;
                    showFieldSuccess(locationInput);
                } catch (error) {
                    console.error('Error:', error);
                }
            }
        )
    }
}    
                
    </script>
</body>
</html>

