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

    <?php      
          if(isset($_POST['sub']))
  {
    $Name = $_POST['name'];
    $Email= $_POST['email'];
    $Phone = $_POST['phone'];
    $Feed = $_POST['feed'];

    $q1= "INSERT INTO `message`(`name`, `email`, `phone`, `feedback`, `created_at`) VALUES ('$Name','$Email','$Phone','$Feed' , current_timestamp());";

    if($con -> query($q1)==true){
    
        echo '<script language="javascript">';
        echo 'alert("message successfully sent, Admin will contact you shortly !")';
        echo '</script>';

    } 
  
    else{
         echo"Error: $q1 <br> $con -> error";
    }
    $con-> close();
  }
    ?>
<!-- contact.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - RoadHelp 24/7</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #for1{
            height: 500px;
            width: 90%;
            margin-left: 50px;
            margin-right: 50px;
        }
        #con1{
            height: 350px;
            width: 90%;
            margin-top: 20px;
            margin-left: 50px;
            margin-right: 50px;
            align-items: center;
            text-align: center;
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
</head>
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

    <main class="contact-page">
        <section class="page-hero">
            <h1>Contact Us</h1>
            <p>We're here to help 24/7</p>
        </section>

        <section class="contact-grid">
           <div id="con1">
           <div class="contact-info">
                <div class="contact-card">
                    <div class="icon">📞</div>
                    <h3>Emergency Hotline</h3>
                    <p>(555) 0123-4567</p>
                </div>
                <div class="contact-card">
                    <div class="icon">📞</div>
                    <h3>Vendor Registration</h3>
                    <p>(555) 0697-529</p>
                </div>
                <div class="contact-card">
                    <div class="icon">📧</div>
                    <h3>Email Us</h3>
                    <p>spannerman0075@gmail.com</p>
                </div>
                <div class="contact-card">
                    <div class="icon">📍</div>
                    <h3>Main Office</h3>
                    <p>123 Service Road, City, State 12345</p>
                </div>
            </div>
           </div>

            <div class="map-container">
                
                <iframe 
                width="100%"
                    height="450"
                    style="border:0"
                    loading="lazy"
                    allowfullscreen
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.5191287380917!2d87.30841157433584!3d23.549791896450188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f76e02a734fdc9%3A0xcbd3550951955ac4!2sMichael%20Madhusudan%20Memorial%20College!5e0!3m2!1sen!2sin!4v1733299006858!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
             <br>
             <br>
            <div id="for1">
            <form class="contact-form" method="post">
                <h3>Send us a message</h3>
                <div class="form-group">
                    <input type="text"  name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <textarea placeholder="Your Complain" name="feed" required></textarea>
                </div>
                <button type="submit" name="sub" class="submit-btn">Send Message</button>
                </form>
   

            </form>
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
</body>
</html>