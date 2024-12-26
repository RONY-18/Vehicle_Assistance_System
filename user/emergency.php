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
// First get pincode and NH from requests
$que2 = "SELECT pincode, NH FROM `requests` WHERE `email` = '$profile'";
$result2 = mysqli_query($con, $que2);
$row2 = mysqli_fetch_assoc($result2);
$pincode = $row2['pincode'];
$NH = $row2['NH'];

// Then get vendors matching both pincode and NH
$que = "SELECT * FROM `vendors` WHERE `pin` = '$pincode' AND `area` = '$NH'";
$result1 = mysqli_query($con, $que);
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

        .table-container {
    background: white;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    margin: 24px 0;
    opacity: 0;
    animation: fadeIn 0.6s ease forwards;
    position: relative;
    overflow: hidden;
}

.table-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #ff4d4d, #f57c00);
    animation: slideInBorder 1.5s ease forwards;
}

.table-container h3 {
    color: #2c3e50;
    font-size: 24px;
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
    animation: slideInLeft 0.6s ease forwards;
}

.table-container h3::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 60px;
    height: 3px;
    background: #ff4d4d;
    border-radius: 2px;
    animation: slideRight 0.6s ease forwards 0.3s;
}

.contact-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 8px;
    margin-top: 12px;
}

.contact-table thead tr {
    background: #f8f9fa;
    animation: fadeInDown 0.5s ease forwards;
}

.contact-table th {
    color: #2c3e50;
    font-weight: 600;
    padding: 16px;
    text-align: left;
    border-bottom: 2px solid #edf2f7;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.contact-table th::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: #ff4d4d;
    transform: translateX(-100%);
    transition: transform 0.3s ease;
}

.contact-table th:hover::after {
    transform: translateX(0);
}

.contact-table tbody tr {
    background: white;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
    transform: translateY(0);
    transition: all 0.3s ease;
    opacity: 0;
    animation: fadeInUp 0.5s ease forwards;
    animation-delay: calc(var(--row-index, 0) * 0.1s);
}

.contact-table tbody tr:hover {
    transform: translateY(-4px) scale(1.01);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    background: linear-gradient(45deg, #ffffff, #f8f9fa);
}

.contact-table td {
    padding: 16px;
    color: #4a5568;
    border-top: 1px solid #edf2f7;
    position: relative;
    overflow: hidden;
}

.contact-table td::before {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    background: rgba(245, 124, 0, 0.05);
    transform: translateX(-100%);
    transition: transform 0.3s ease;
}

.contact-table tr:hover td::before {
    transform: translateX(0);
}

.action-btn {
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    color: white;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.action-btn::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s ease, height 0.6s ease;
}

.action-btn:hover::before {
    width: 200px;
    height: 200px;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
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

@keyframes slideRight {
    from { width: 0; }
    to { width: 60px; }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
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

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInBorder {
    from { left: -100%; }
    to { left: 0; }
}

@keyframes pulseGlow {
    0% { box-shadow: 0 0 0 0 rgba(245, 124, 0, 0.4); }
    70% { box-shadow: 0 0 0 10px rgba(245, 124, 0, 0); }
    100% { box-shadow: 0 0 0 0 rgba(245, 124, 0, 0); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .table-container {
        padding: 16px;
        overflow-x: auto;
    }
    
    .contact-table {
        min-width: 600px;
    }
    
    .contact-table th,
    .contact-table td {
        padding: 12px;
    }
}

/* Loading Animation */
.table-container.loading::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}
    </style>
</head>
<body>
    <nav class="sidebar">
        <div class="logo">
            <h1>Spanner Man 24/7</h1>
        </div>
        <ul class="nav-links">
            <li><a href="../user.php">
                <span>Dashboard</span>
            </a></li>
            <li><a href="./mortel.php">
                <span>Other Service</span>
            </a></li>
            <li><a href="./emergency.php" class="active">
                <span>Emergency Service</span>
            </a></li>
        </ul>
    </nav>

    <header class="header">
        <a href="../logout.php"><button class="logout-btn">Logout</button></a>
    </header>

    <main class="main-content">
    <div class="section__container">
    <div class="table-container">
        <h3>Availabe Emergency Service Around You :-</h3>
        <table class="contact-table" style="margin-right:30px;">
            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Area of Service</th>

              
                <th>Spetialization</th>
               
                <th>Starting Charges</th>
               
                <th>Update</th>
                
            </tr>
            </thead>
            <tbody >
            <!-- PHP code to fetch and display registration data -->
            <tr >
            <?php
              
              while($row = mysqli_fetch_assoc($result1)) { ?>

                <td> <?php  echo $row['name']; ?> </td>
                
                <td> <?php  echo $row['address']; ?> </td>
                <td> <?php  echo $row['area']; ?> </td>
                
                <td> <?php  echo $row['space']; ?> </td>
        
                <td> <?php  echo $row['charges']; ?> </td>
                
                <td><a href="./operate/procress_emergen.php?uid=<?php echo $row['id']; ?>"><button type="button" class="action-btn" style="background-color:green">CALL FOR HELP</button></a></td>
                
            </tr>
            <?php }?>
            
            <!-- Add more rows as needed -->
            </tbody>
        </table>
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