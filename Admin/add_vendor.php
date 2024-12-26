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
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
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

        /* Sidebar Styles */
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

        /* Header Styles */
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

        /* Main Content Area */
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

        /* Content Sections */
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

        /* Animations */
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

        /* Responsive Design */
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
    color: var(--text-light);
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
    background: var(--secondary-color);
    animation: slideLine 3s infinite;
}

/* vendor form */
.vendor-form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
            animation: fadeIn 0.6s ease-out;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2c3e50;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #ff4d4d;
            outline: none;
        }

        .save-btn {
            background: #ff4d4d;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .save-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 77, 77, 0.3);
        }

        .save-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255,255,255,0.2);
            transform: translate(-50%, -50%) rotate(45deg);
            animation: ripple 1s infinite;
        }

        @keyframes ripple {
            0% {
                transform: translate(-50%, -50%) rotate(45deg) scale(0);
                opacity: 1;
            }
            100% {
                transform: translate(-50%, -50%) rotate(45deg) scale(1);
                opacity: 0;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
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
    </style>
</head>
<body>
     <!-- Sidebar Navigation -->
     <nav class="sidebar">
    <div class="logo">
    <h1>Spanner Man 24/7</h1>
    </div>
        <ul class="nav-links">
            <li><a href="./home.php" class="active">
                <span>Dashboard</span>
            </a></li>
            <li><a href="./add_vendor.php">
                <span>Add Vendor</span>
            </a></li>
            <li><a href="./orders.php" class="active">
                <span>Orders</span>
            </a></li>
            <li><a href="./accounts.php" class="active">
                <span>Accounts</span>
            </a></li>
            <li><a href="./vendors.php" class="active">
                <span>Vendors</span>
            </a></li>
        </ul>
    </nav>

     <!-- Top Header -->
     <header class="header">
        <a href="./logout_adm.php"><button class="logout-btn">Logout</button></a>
    </header>
    <main class="main-content">

    <div class="vendor-form">
            <h2 style="margin-bottom: 2rem; color: #2c3e50;">Add New Vendor</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="vendor_name">Vendor Name</label>
                    <input type="text" id="vendor_name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="service_area">Service Area/ NH or AH number [Please enter in format: NH## or AH## (e.g., NH17, AH19)]</label>
                    <input type="text" pattern="^(NH|AH)[0-9]+$" id="service_area" name="area" required>
                </div>

                <div class="form-group">
                    <label for="specialization">Specialization</label>
                    <select id="specialization" name="space" required>
                        <option value="">Select Specialization</option>
                        <option value="Car guide">Car guide</option>
                        <option value="Regular Service">Regular Service</option>
                        <option value="Car Inspection">Car Inspection</option>
                        <option value="Maintenance">Maintenance</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="specialization">Towing Service Available ?</label>
                    <select id="specialization" name="towing" required>
                        <option value="">Select Options </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="experience">PINCODE</label>
                    <input type="number" id="experience" name="exp" min="0" required>
                </div>
                <div class="form-group">
                    <label for="experience">Minimum Service Charge</label>
                    <input type="number" id="experience" name="price" min="0" required>
                </div>

                <button type="submit" name="sub" class="save-btn">Save Vendor</button>
                <?php      
          if(isset($_POST['sub']))
  {
    $Name = $_POST['name'];
    $Phone = $_POST['phone'];
    $Email= $_POST['email'];
    $Add = $_POST['address'];
    $Ser = $_POST['area'];
    $Space = $_POST['space'];
    $tow = $_POST['towing'];
    $Exp = $_POST['exp'];
    $Price = $_POST['price'];


    $q1= "INSERT INTO `vendors`(`name`, `phone`, `email`,  `address`, `area`,`space`, `towing`,`pin`,`charges`, `created_at`) VALUES ('$Name','$Phone','$Email','$Add' ,'$Ser' ,'$Space' , '$tow' ,'$Exp' ,'$Price' , current_timestamp());";

    if($con -> query($q1)==true){
    
        echo '<script language="javascript">';
        echo 'alert("Saved !")';
        echo '</script>';

    } 
  
    else{
         echo"Error: $q1 <br> $con -> error";
    }
    $con-> close();
  }
    ?>
            </form>
        </div>
    </main>
</body>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add active class to current nav item

           

            // Logout button animation
            

            // Card hover effect
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Simulate loading data
            setTimeout(() => {
                document.getElementById('emergency-requests').innerHTML = `
                    <p>Loading emergency requests...</p>
                `;
                document.getElementById('active-orders').innerHTML = `
                    <p>Loading active orders...</p>
                `;
            }, 1000);
        });
    </script>
</html>