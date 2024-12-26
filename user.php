<?php

session_start();
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

<?php } 
    
?>
<?php 

$profile = $_SESSION['Aus'];

 if($profile == true){

 }
 else{
   header("location: ./login.php");
 }
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    welcome
   <a href="./logout.php"> <button>Logout</button></a>
</body>
</html> -->

<?php 
$que2 = "SELECT * FROM `requests` WHERE `email` = '$profile'";
$result2 = mysqli_query($con, $que2);
$user_data = mysqli_fetch_assoc($result2);

// Get vendor counts for different services
$pincode = $user_data['pincode'];
$NH = $user_data['NH'];

// Count towing service vendors
$towing_query = "SELECT COUNT(*) as count FROM `vendors` WHERE `pin` = '$pincode' AND `area` = '$NH' AND `towing` = 'Yes'";
$towing_result = mysqli_query($con, $towing_query);
$towing_count = mysqli_fetch_assoc($towing_result)['count'];

// Count emergency service vendors
$emergency_query = "SELECT COUNT(*) as count FROM `vendors` WHERE `pin` = '$pincode' AND `area` = '$NH'";
$emergency_result = mysqli_query($con, $emergency_query);
$emergency_count = mysqli_fetch_assoc($emergency_result)['count'];

// Count other service vendors
$other_query = "SELECT COUNT(*) as count FROM `vendors` WHERE `pin` = '$pincode' AND `area` = '$NH' AND (`space` = 'Maintenance' OR `space` = 'Regular Service' OR `space` = 'Car guide' OR `space` = 'Car Inspection')";
$other_result = mysqli_query($con, $other_query);
$other_count = mysqli_fetch_assoc($other_result)['count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Spanner Man 24/7</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f7fa;
            min-height: 100vh;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 250px;
            background: #2c3e50;
            padding-top: 60px;
            transition: all 0.3s ease;
            z-index: 100;
        }

        .sidebar .logo {
            padding: 0 1.5rem 2rem;
            color: white;
            font-size: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 1rem;
        }

        .nav-links {
            list-style: none;
            padding: 0 0.5rem;
        }

        .nav-links li {
            margin-bottom: 0.5rem;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            padding: 0.8rem 1rem;
            color: #ecf0f1;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover {
            background: rgba(255,255,255,0.1);
            transform: translateX(5px);
        }

        .nav-links a.active {
            background: #ff4d4d;
            color: white;
        }

        .header {
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            height: 60px;
            background: white;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 99;
        }

        .logout-btn {
            background: #ff4d4d;
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #ff3333;
            transform: translateY(-2px);
        }

        .main-content {
            margin-left: 250px;
            padding: 80px 2rem 2rem;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s forwards;
        }

        .card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .card h3 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .card p {
            color: #7f8c8d;
            font-size: 2rem;
            font-weight: bold;
        }

        .welcome-section {
            margin-bottom: 2rem;
            opacity: 0;
            animation: fadeIn 0.6s forwards;
        }

        .welcome-section h1 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .welcome-section p {
            color: #7f8c8d;
        }

        .content-section {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s forwards 0.3s;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding-top: 60px;
            }

            .sidebar .logo {
                display: none;
            }

            .nav-links a span {
                display: none;
            }

            .header {
                left: 70px;
            }

            .main-content {
                margin-left: 70px;
            }
        }

        .logo h1 {
            color: white;
            font-size: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .logo h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: #ff4d4d;
            animation: slideLine 3s infinite;
        }

        @keyframes slideLine {
            50% {
                left: 100%;
            }
        }

        /* Enhanced content section styling with centered text and background */
.content-section {
    background: linear-gradient(rgba(17, 14, 14, 0), rgba(19, 14, 14, 0)), 
                url('images/back_card_use.jpg') center/cover;
    padding: 2.5rem;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(44, 62, 80, 0.1);
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    opacity: 0;
    transform: translateY(30px);
    animation: sectionFadeIn 0.8s forwards;
    text-align: center;
}

/* Gradient border effect */
.content-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ff4d4d, #ff8533, #ff4d4d);
    background-size: 200% 100%;
    animation: gradientSlide 3s linear infinite;
}

/* Hover effects with backdrop blur */
.content-section:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(44, 62, 80, 0.15);
    background: linear-gradient(rgba(31, 11, 11, 0), rgba(29, 13, 13, 0)), 
                url('images/back_card_use_4.webp') center/cover;
}

.content-section h2 {
    color: #2c3e50;
    font-size: 1.8rem;
    margin-top: 120px;
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 0.5rem;
    transition: color 0.3s ease;
    text-align: center;
    font-weight: bold;
}

.content-section h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 2px;
    background: #ff4d4d;
    transition: width 0.4s ease;
}

.content-section:hover h2::after {
    width: 50%;
}

/* Loading animation for dynamic content */
#emergency-requests, #active-orders {
    min-height: 100px;
    position: relative;
    transition: all 0.3s ease;
    text-align: center;
    padding: 1rem;
}

#emergency-requests:empty, #active-orders:empty {
    animation: pulseBackground 2s infinite;
}

/* Content text styling */
.content-section p {
    color: #34495e;
    line-height: 1.6;
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

/* Animations */
@keyframes sectionFadeIn {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes gradientSlide {
    0% {
        background-position: 0% 50%;
    }
    100% {
        background-position: 200% 50%;
    }
}

@keyframes pulseBackground {
    0% {
        background: rgba(44, 62, 80, 0.05);
    }
    50% {
        background: rgba(44, 62, 80, 0.1);
    }
    100% {
        background: rgba(44, 62, 80, 0.05);
    }
}

/* Staggered animation for multiple sections */
.content-section:nth-child(2) {
    animation-delay: 0.2s;
}

.content-section:nth-child(3) {
    animation-delay: 0.4s;
}

/* Media query for responsiveness */
@media (max-width: 768px) {
    .content-section {
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .content-section h2 {
        font-size: 1.5rem;
    }
}
    </style>
</head>
<body>
    <nav class="sidebar">
        <div class="logo">
            <h1>Spanner Man 24/7</h1>
        </div>
        <ul class="nav-links">
            <li><a href="./user.php" class="active">
                <span>Dashboard</span>
            </a></li>
            <li><a href="./user/mortel.php">
                <span>Other Service</span>
            </a></li>
            <li><a href="./user/emergency.php">
                <span>Emergency Service</span>
            </a></li>
        </ul>
    </nav>

    <header class="header">
        <a href="./logout.php"><button class="logout-btn">Logout</button></a>
    </header>

    <main class="main-content">
        <div class="welcome-section">
        <?php
                  $que2= "SELECT * FROM `requests` WHERE `email` = '$profile' ";
                  $result2 = mysqli_query($con,$que2);
              
                  
                ?> 
        <?php while($row = mysqli_fetch_assoc($result2)) {?>
            <h1>Welcome, <?php  echo  $row['name']; }?></h1>
            <p>How can we help you today?</p>
        </div>

        <div class="dashboard-cards">
            <div class="card">
                <h3>Available Towing Service</h3>
                <p><?php echo $towing_count; ?></p>
            </div>
            <div class="card">
                <h3>Available other services</h3>
                <p><?php echo $other_count; ?></p>
            </div>
            <div class="card">
                <h3>Available Emergency Services</h3>
                <p><?php echo $emergency_count; ?></p>
            </div>
        </div>

        <div class="content-section">
            <h2 style="color:whitesmoke">Please Logout after using the Users Dashbord</h2>
            <div id="emergency-requests">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>

        <div class="content-section">
            <h2 style="color:whitesmoke">Browse through the Users Dashbord, For more details</h2>
            <div id="active-orders">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            setTimeout(() => {
                document.getElementById('recent-bookings').innerHTML = `
                    <p>Loading your recent bookings...</p>
                `;
                document.getElementById('available-services').innerHTML = `
                    <p>Loading available services...</p>
                `;
            }, 1000);
        });
    </script>
</body>
</html>