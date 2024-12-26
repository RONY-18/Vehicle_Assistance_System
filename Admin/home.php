
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
 
             
 $profile = $_SESSION['Aus'];

 if($profile == true){

 }
 else{
   header("location: ./admin.php");
 }
    
?>

<?php
                  $que1= "SELECT * FROM `message` WHERE 1";
                  $result1 = mysqli_query($con,$que1);
              
                  
                ?> 

<?php
// Function to get dashboard statistics
function getDashboardStats($con) {
    $stats = array(
        'total_orders' => 0,
        'active_vendors' => 0,
        'active_accounts' => 0,
        'completed_today' => 0
    );
    
    // Get total orders
    $orderQuery = "SELECT COUNT(*) as total FROM requests";
    $orderResult = mysqli_query($con, $orderQuery);
    if($orderResult) {
        $row = mysqli_fetch_assoc($orderResult);
        $stats['total_orders'] = $row['total'];
    }
    
    // Get active vendors
    $vendorQuery = "SELECT COUNT(*) as total FROM vendors";
    $vendorResult = mysqli_query($con, $vendorQuery);
    if($vendorResult) {
        $row = mysqli_fetch_assoc($vendorResult);
        $stats['active_vendors'] = $row['total'];
    }

    // Get active vendors
    $accountQuery = "SELECT COUNT(*) as total FROM accounts";
    $accountResult = mysqli_query($con, $accountQuery);
    if($accountResult) {
        $row = mysqli_fetch_assoc($accountResult);
        $stats['active_accounts'] = $row['total'];
    }
    
   
    
    return $stats;
}

// Get the statistics
$dashboardStats = getDashboardStats($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Spanner Man 24/7</title>
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
/* Table Styles */
.table-container {
    overflow-x: auto;
    margin-top: 1rem;
}

.contact-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.contact-table th,
.contact-table td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid #eee;
}

.contact-table th {
    background: #2c3e50;
    color: white;
    font-weight: 500;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.contact-table tr {
    transition: all 0.3s ease;
}

.contact-table tr:hover {
    background: #f8f9fa;
}

/* Message Cell Styles */
.message-cell {
    position: relative;
    max-width: 200px;
}

.message-preview {
    cursor: pointer;
}

.message-full {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.2);
    z-index: 100;
    min-width: 300px;
    max-width: 400px;
}

.message-cell:hover .message-full {
    display: block;
}

/* Status Badge Styles */
.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
}

.status-badge.new {
    background: #e3f2fd;
    color: #1976d2;
}

.status-badge.read {
    background: #e8f5e9;
    color: #388e3c;
}

.status-badge.pending {
    background: #fff3e0;
    color: #f57c00;
}

/* Action Button Styles */
.action-btn {
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 5px;
    background: #4CAF50;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
}

.action-btn:hover {
    background: #45a049;
    transform: translateY(-2px);
}

/* Animation Styles */
.fade-in {
    animation: fadeIn 0.5s ease-in-out forwards;
    opacity: 0;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Add animation delay for each row */
.contact-table tr:nth-child(1) { animation-delay: 0.1s; }
.contact-table tr:nth-child(2) { animation-delay: 0.2s; }
.contact-table tr:nth-child(3) { animation-delay: 0.3s; }
.contact-table tr:nth-child(4) { animation-delay: 0.4s; }
.contact-table tr:nth-child(5) { animation-delay: 0.5s; }
    </style>
</head>
<body>
    <!-- Sidebar Navigation -->
    <nav class="sidebar">
    <div class="logo">
    <h1>Spanner Man 24/7</h1>
    </div>
        <ul class="nav-links">
            <li><a href="./home.php">
                <span>Dashboard</span>
            </a></li>
            <li><a href="./add_vendor.php" class="active">
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

    <!-- Main Content -->
    <main class="main-content">
        <div class="welcome-section">
            <h1>Welcome, Admin</h1>
            <p>Here's what's happening today</p>
        </div>

        <div class="dashboard-cards">
            <div class="card">
                <h3>Total Orders</h3>
                <p><?php echo number_format($dashboardStats['total_orders']); ?></p>
            </div>
            <div class="card">
                <h3>Active Vendors</h3>
                <p><?php echo number_format($dashboardStats['active_vendors']); ?></p>
            </div>
            
            <div class="card">
                <h3>Active Accounts</h3>
                <p><?php echo number_format($dashboardStats['active_accounts']); ?></p>
            </div>
        </div>

        <div class="content-section contact-table-section">
    <h2>Recent Contact Form Submissions</h2>
    <div class="table-container">
        <table class="contact-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Feedback</th>
                  
                    <th>Date</th>
                    <th>Delete</th>
                    <th>Read</th>
                </tr>
            </thead>
            <tbody>
                
                <tr class="fade-in">
                <?php
              
              while($row = mysqli_fetch_assoc($result1)) { ?>

                <td> <?php  echo $row['name']; ?> </td>
                <td> <?php  echo $row['email']; ?> </td>
                
                
                <td> <?php  echo $row['phone']; ?> </td>
                <td> <?php  echo $row['feedback']; ?> </td>
                <td> <?php  echo $row['created_at']; ?> </td>
               
                <td><a href="./operations/delete_mes.php ?uid=<?php echo $row['id'];?>"><button type="button" class="action-btn" style="background-color:red">Delete</button></a></td>
            
            
                    <td>
                        <button class="action-btn" onclick="updateStatus(<?php echo $submission['id']; ?>)">
                            Read
                        </button>
                    </td>
                </tr>
                <?php }?>
               
            </tbody>
        </table>
    </div>
</div>

        <div class="content-section">
            <h2>Please Logout after using the Admin Pannel</h2>
            <div id="emergency-requests">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>

        <div class="content-section">
            <h2>Browse through the admin pannel, For more details</h2>
            <div id="active-orders">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>
    </main>

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
                    <p></p>
                `;
                document.getElementById('active-orders').innerHTML = `
                    <p></p>
                `;
            }, 1000);
        });
    </script>
</body>
</html>