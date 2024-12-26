<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "break_pass";                                             
    $con = mysqli_connect($server,$username,$password,$dbname);
    if(! $con){
      ?>

       <div class="alert alert-warning alert-dismissible fade show" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
         <strong><?php echo("connection faled due to : <br> $con -> error");?></strong> 
       </div>
       
       <script>
         $(".alert").alert();
       </script>

    <?php } ?>
<!-- services.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - RoadHelp 24/7</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
     #main1{
    height: 1250px;
    width: 90%;
    margin-left: 50px;
    margin-right: 50px;
    
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

        .services-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
    padding: 2rem;
    max-width: 1400px;
    margin: 0 auto;
}

.service-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    min-width: 250px;
}

.service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #ff4d4d, #ff8533);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease-in-out;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
}

.service-card:hover::before {
    transform: scaleX(1);
}

.service-card img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 1rem;
    transition: transform 0.3s ease-in-out;
}

.service-card:hover img {
    transform: scale(1.1) rotate(5deg);
}

.service-card h3 {
    color: #333;
    margin: 1rem 0;
    font-size: 1.5rem;
    position: relative;
}

.service-card p {
    color: #666;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.service-features {
    list-style: none;
    padding: 0;
    margin: 0;
    width: 100%;
}

.service-features li {
    padding: 0.5rem 0;
    color: #555;
    position: relative;
    transform: translateX(-20px);
    opacity: 0;
    transition: all 0.3s ease-in-out;
}

.service-card:hover .service-features li {
    transform: translateX(0);
    opacity: 1;
}

.service-features li:nth-child(1) { transition-delay: 0.1s; }
.service-features li:nth-child(2) { transition-delay: 0.2s; }
.service-features li:nth-child(3) { transition-delay: 0.3s; }

/* Responsive breakpoints */
@media (max-width: 1200px) {
    .services-grid {
        grid-template-columns: repeat(2, 1fr);
        max-width: 900px;
    }
}

@media (max-width: 768px) {
    .services-grid {
        grid-template-columns: 1fr;
        padding: 1rem;
    }
    
    .service-card {
        margin-bottom: 1rem;
    }
}

/* Form Container Styles */
.help-form-section {
    max-width: 800px;
    margin: 2rem auto;
    padding: 3rem;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 30px;
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.1),
        inset 0 -1px 2px rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    animation: formFloat 1s ease-out;
    position: relative;
    overflow: hidden;
}

.help-form-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        45deg,
        transparent,
        rgba(255, 255, 255, 0.1),
        transparent
    );
    transform: rotate(45deg);
    animation: lightSweep 3s infinite linear;
    pointer-events: none;
}

@keyframes lightSweep {
    0% { transform: rotate(45deg) translateY(-100%); }
    100% { transform: rotate(45deg) translateY(100%); }
}

@keyframes formFloat {
    0% {
        opacity: 0;
        transform: translateY(30px) scale(0.95);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* Heading Styles */
.help-form-section h2 {
    text-align: center;
    color: #1a1a1a;
    margin-bottom: 3rem;
    font-size: 2.5rem;
    font-weight: 700;
    letter-spacing: -0.5px;
    position: relative;
    padding-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.help-form-section h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 150px;
    height: 4px;
    background: linear-gradient(90deg, #ff6b6b, #ff8c42, #6c63ff);
    border-radius: 2px;
    animation: gradientMove 3s infinite linear;
}

@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Form Group Styles */
.form-group {
    position: relative;
    margin-bottom: 1.5rem;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 1.2rem;
    border: 2px solid rgba(108, 99, 255, 0.1);
    border-radius: 15px;
    font-size: 1.1rem;
    background: rgba(255, 255, 255, 0.8);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 
        inset 0 2px 4px rgba(0, 0, 0, 0.05),
        0 2px 4px rgba(0, 0, 0, 0.02);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #6c63ff;
    background: white;
    box-shadow: 
        0 0 0 4px rgba(108, 99, 255, 0.1),
        0 8px 16px rgba(108, 99, 255, 0.1);
    transform: translateY(-4px);
}

/* Location Group Styles */
.form-group:has(#location) {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 1rem;
}

.location-btn {
    background: linear-gradient(45deg, #4CAF50, #45a049);
    color: white;
    border: none;
    padding: 1.2rem;
    border-radius: 15px;
    cursor: pointer;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
}

.location-btn:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 6px 16px rgba(76, 175, 80, 0.3);
}

/* Password Toggle Button */
.toggle-password {
    position: absolute;
    right: 1.2rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1.4rem;
    opacity: 0.7;
    transition: all 0.3s ease;
    z-index: 2;
}

.toggle-password:hover {
    opacity: 1;
    transform: translateY(-50%) scale(1.2);
}

/* Submit Button Styles */
.submit-btn {
    width: 100%;
    padding: 1.3rem;
    background: linear-gradient(45deg, #6c63ff, #ff6b6b);
    color: white;
    border: none;
    border-radius: 15px;
    font-size: 1.2rem;
    font-weight: 600;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    margin-top: 2rem;
    text-transform: uppercase;
    box-shadow: 0 6px 12px rgba(108, 99, 255, 0.2);
}

.submit-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 255, 255, 0.3),
        transparent
    );
    transition: 0.5s;
}

.submit-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(108, 99, 255, 0.3);
}

.submit-btn:hover::before {
    left: 100%;
}

/* Select Styling */
.form-group select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%236c63ff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1.2rem center;
    background-size: 1.2em;
}

/* Textarea Styling */
.form-group textarea {
    min-height: 150px;
    resize: vertical;
    line-height: 1.6;
}

/* Input Placeholder Animation */
.form-group input::placeholder,
.form-group textarea::placeholder {
    color: #999;
    transition: all 0.3s ease;
}

.form-group input:focus::placeholder,
.form-group textarea:focus::placeholder {
    opacity: 0;
    transform: translateX(-10px);
}

/* Error and Success States */
.form-group.error input {
    border-color: #ff6b6b;
    animation: shake 0.5s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
}

.form-group.success input {
    border-color: #4CAF50;
}

@keyframes shake {
    10%, 90% { transform: translateX(-1px); }
    20%, 80% { transform: translateX(2px); }
    30%, 50%, 70% { transform: translateX(-4px); }
    40%, 60% { transform: translateX(4px); }
}

/* Loading State */
.submit-btn.loading {
    background: linear-gradient(45deg, #ccc, #999);
    pointer-events: none;
}

.submit-btn.loading::after {
    content: '';
    position: absolute;
    width: 24px;
    height: 24px;
    border: 3px solid #fff;
    border-radius: 50%;
    border-top-color: transparent;
    animation: spin 1s linear infinite;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

@keyframes spin {
    to { transform: translate(-50%, -50%) rotate(360deg); }
}

/* Responsive Styles */
@media (max-width: 768px) {
    .help-form-section {
        padding: 2rem;
        margin: 1rem;
    }

    .form-group:has(#location) {
        grid-template-columns: 1fr;
    }

    .help-form-section h2 {
        font-size: 2rem;
    }
}

/* Custom Background Animation */
.background-animation {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background: linear-gradient(45deg, #f3f4f6, #ffffff);
    opacity: 0.8;
}
</style>
<body>
    <div class="background-animation"></div>
    
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
    <main class="services-page">
        

       <div id="main1">

       <section class="help-form-section" id="get-help">
            <h2>Request Emergency Assistance</h2>
            
            <form id="assistance-form" action="req.php" method="POST">
        <div class="form-group">
            <input type="text" id="name" name="name" placeholder="Your Name" required>
        </div>
        <div class="form-group">
            <input type="email" id="email" name="email" placeholder="Email id" required>
        </div>
        <div class="form-group">
            <input type="password" id="pass" name="pass"  placeholder="New Password" required>
            <button type="button" class="toggle-password" onclick="togglePassword()">
            👁️
        </button>
        </div>
        <div class="form-group">
            <input type="text" id="location" name="location" placeholder="Current Location" required>
            <input type="text" id="pincode" name="pincode" placeholder=" PINCODE " required>
            <button type="button" onclick="getLocation()" class="location-btn">Get My Location</button>
        </div>
        
        <div class="form-group">
            <input type="text" pattern="^(NH|AH)[0-9]+$" id="email" name="nh" placeholder="NH or AH You are in Currently [Please enter in format: NH## or AH## (e.g., NH17, AH19)]" required>
        </div>
        <div class="form-group">
            <select id="issue" name="issue" required>
                <option value="">Select Issue</option>
                <option value="flat_tire">Flat Tire</option>
                <option value="battery">Dead Battery</option>
                <option value="fuel">Out of Fuel</option>
                <option value="mechanical">Mechanical Issue</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <textarea id="description" name="description" placeholder="Additional Details"></textarea>
        </div> 
        <button type="submit" name="sub" class="submit-btn">Request Assistance</button>
    </form>

   
        </section>

       </div>

        <section class="page-hero" style="margin-left : 50px;">
            <h1>Our Services</h1>
            <p>Professional assistance when you need it most</p>
        </section>

        <section class="services-grid">
            <div class="service-card">
                <img src="images/tire_services.png" alt="Tire Service">
                <h3>Tire Service</h3>
                <p>Flat tire change and repair services available 24/7</p>
                <ul class="service-features">
                    <li>Flat tire repair</li>
                    <li>Tire replacement</li>
                    <li>Wheel balancing</li>
                </ul>
            </div>

            <div class="service-card">
                <img src="images/189-1892047_check-engine-light-emblem.png" alt="Engine Breakdown">
                <h3>Engine Breakdown Service</h3>
                <p> onspot repair asistant and repair services available 24/7</p>
                <ul class="service-features">
                    <li>engine repair</li>
                    <li>engine oil replacement</li>
                    <li>emergency vehicel asistant</li>
                </ul>
            </div>

            <div class="service-card">
                <img src="images/fuel delivry.png" alt="Fuel Delivery">
                <h3>Fuel delivery Service</h3>
                <p>Fuel delivery available 24/7</p>
                <ul class="service-features">
                    <li>within 15 min</li>
                    <li>super fast delivery</li>
                    <li>first delivery free</li>
                </ul>
            </div>

            <div class="service-card">
                <img src="images/towing_service.png" alt="Towing Service">
                <h3>Towing Service</h3>
                <p>Towing services available 24/7</p>
                <ul class="service-features">
                    <li>Fast towing </li>
                    <li>both 2 and 4 wheeler</li>
                    <li> within 15 min service </li>
                </ul>
            </div>
            <!-- Add more service cards -->
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

    
</body>
<script>

function togglePassword() {
            const passwordInput = document.getElementById('pass');
            const toggleButton = document.querySelector('.toggle-password');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = '👁️‍🗨️';
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = '👁️';
            }
        }

function getLocation() {
    if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(
           function(position) {
               const latitude = position.coords.latitude;
               const longitude = position.coords.longitude;

fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`)
    .then(response => response.json())
    .then(data => {
        // Extract full address
        const address = data.display_name;
        document.getElementById('location').value = address;
        
        // Extract postal code
        const postcode = data.address.postcode || '';
        document.getElementById('pincode').value = postcode;
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


</script>
</html>