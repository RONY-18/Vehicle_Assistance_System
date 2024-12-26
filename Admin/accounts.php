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
                  $que1= "SELECT * FROM `accounts` WHERE 1";
                  $result1 = mysqli_query($con,$que1);
              
                  
                ?> 
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

/* Table container animation */
@keyframes tableContainerFade {
    0% {
        opacity: 0;
        transform: translateY(50px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Row animation */
@keyframes slideIn {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Animate the entire table container */
.table-container {
    opacity: 0;
    animation: tableContainerFade 0.8s ease forwards;
}

/* Animate the table header */
.contact-table thead {
    opacity: 0;
    animation: slideIn 0.6s ease forwards 0.4s;
}

/* Animate table rows */
.contact-table tbody tr {
    opacity: 0;
    animation: slideIn 0.6s ease forwards;
}

/* Add animation delay for each row */
.contact-table tbody tr:nth-child(1) { animation-delay: 0.5s; }
.contact-table tbody tr:nth-child(2) { animation-delay: 0.6s; }
.contact-table tbody tr:nth-child(3) { animation-delay: 0.7s; }
.contact-table tbody tr:nth-child(4) { animation-delay: 0.8s; }
.contact-table tbody tr:nth-child(5) { animation-delay: 0.9s; }
.contact-table tbody tr:nth-child(6) { animation-delay: 1.0s; }
.contact-table tbody tr:nth-child(7) { animation-delay: 1.1s; }
.contact-table tbody tr:nth-child(8) { animation-delay: 1.2s; }
.contact-table tbody tr:nth-child(9) { animation-delay: 1.3s; }
.contact-table tbody tr:nth-child(10) { animation-delay: 1.4s; }

/* Also animate the table heading text */
.table-container h3 {
    opacity: 0;
    animation: tableContainerFade 0.6s ease forwards 0.2s;
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
            <li><a href="./add_vendor.php" class="active">
                <span>Add Vendor</span>
            </a></li>
            <li><a href="./orders.php" class="active">
                <span>Orders</span>
            </a></li>
            <li><a href="./accounts.php">
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
    <div class="section__container">
    <div class="table-container">
        <h3>Accounts</h3>
        <table class="contact-table" style="margin-right:30px;">
            <thead>
            <tr>
                
                <th>Email</th>
                <th>Password</th>
                
                <th>created_at</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody >
            <!-- PHP code to fetch and display registration data -->
            <tr >
            <?php
              
              while($row = mysqli_fetch_assoc($result1)) { ?>

                
                <td> <?php  echo $row['email']; ?> </td>
                <td> <?php  echo $row['password']; ?> </td>
                
                <td> <?php  echo $row['created_at']; ?> </td>
                <td><a href="./operations/update_acc.php?uid=<?php echo $row['id']; ?>"><button type="button" class="action-btn" style="background-color:#f57c00">Update</button></a></td>
                <td><a href="./operations/delete_acc.php?uid=<?php echo $row['id'];?>"><button type="button" class="action-btn" style="background-color:red">Delete</button></a></td>
            </tr>
            <?php }?>
            
            <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
    </div>
    </main>
</body>
</html>
