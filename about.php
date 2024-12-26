


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>About Us - Spanner Man 24/7</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }


        main {
            padding-top: 100px;
            background-color: black;
        }

        .hero-section {
            height: 60vh;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/back_trust_2.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            transform: translateY(30px);
            opacity: 0;
            animation: slideUp 0.8s forwards;
            animation-delay: 0.5s;
        }

        .hero-content p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            transform: translateY(30px);
            opacity: 0;
            animation: slideUp 0.8s forwards;
            animation-delay: 0.7s;
        }

        .about-section {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .about-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .about-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/back_cards.webp');
            background-size: cover;
            color: whitesmoke;
            background-position: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            transform: translateY(50px);
            opacity: 0;
            transition: transform 0.5s ease, box-shadow 0.3s ease;
        }

        .about-card.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .about-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .about-card img {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
        }

        .about-card h3 {
            color: whitesmoke;
            margin-bottom: 1rem;
        }

        .stats-section {
            background: #f5f5f5;
            color: whitesmoke;
            padding: 4rem 2rem;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/back_trust_below_2.png');
            background-size: cover;
            background-position: center;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 3rem auto 0;
        }

        .stat-card {
            opacity: 0;
            transform: scale(0.9);
        }

        .stat-card.visible {
            animation: scaleIn 0.5s forwards;
        }

        .stat-number {
            font-size: 2.5rem;
            color: #ff4d4d;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

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
    <link rel="stylesheet" href="./style.css">
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

    <main>
        <section class="hero-section">
            <div class="hero-content">
                <h1>Your Trusted Road Partner</h1>
                <p>With over a decade of experience, Spanner Man has been providing reliable roadside assistance to thousands of motorists across the country.</p>
            </div>
        </section>

        <section class="about-section">
            <div class="about-grid">
                <div class="about-card">
                    <img src="images/our_mission.png" alt="Our Mission">
                    <h3>Our Mission</h3>
                    <p>To provide fast, reliable, and professional roadside assistance services 24/7, ensuring no motorist is left stranded.</p>
                </div>
                <div class="about-card">
                    <img src="images/vision.png" alt="Our Vision">
                    <h3>Our Vision</h3>
                    <p>To become the most trusted name in emergency vehicle assistance, known for our quick response times and exceptional service.</p>
                </div>
                <div class="about-card">
                    <img src="images/handshake.png" alt="Our Values">
                    <h3>Our Values</h3>
                    <p>Reliability, professionalism, and customer satisfaction are at the core of everything we do.</p>
                </div>
            </div>
        </section>

        <section class="stats-section">
            <h2>Our Impact</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">15,000+</div>
                    <p>Successful Rescues</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">30</div>
                    <p>Minutes Average Response Time</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">98%</div>
                    <p>Customer Satisfaction</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number">24/7</div>
                    <p>Hours of Service</p>
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
        // Intersection Observer for about cards
        const aboutCards = document.querySelectorAll('.about-card');
        const statCards = document.querySelectorAll('.stat-card');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.2
        });

        aboutCards.forEach(card => observer.observe(card));
        statCards.forEach(card => observer.observe(card));

        // Header scroll effect
        
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