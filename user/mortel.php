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


        .services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
    padding: 20px 0;
}

.service-card {
    background: white;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    opacity: 0;
    animation: fadeInUp 0.5s ease forwards;
    animation-delay: calc(var(--card-index) * 0.1s);
}

.service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #ff4d4d, #f57c00);
    transform: translateX(-100%);
    transition: transform 0.3s ease;
}

.service-card:hover::before {
    transform: translateX(0);
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
}

.service-icon {
    width: 50px;
    height: 50px;
    background: #f8f9fa;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    transition: all 0.3s ease;
}

.service-card:hover .service-icon {
    background: #ff4d4d;
    color: white;
    transform: rotate(360deg);
}

.service-title {
    font-size: 18px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 12px;
}

.service-description {
    font-size: 14px;
    color: #7f8c8d;
    margin-bottom: 16px;
    line-height: 1.5;
}

.book-btn {
    background: #f57c00;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
    width: 100%;
}

.book-btn:hover {
    background: #ff4d4d;
    transform: translateY(-2px);
}

.service-price {
    font-size: 16px;
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 16px;
}

.service-features {
    list-style: none;
    padding: 0;
    margin: 0 0 16px 0;
}

.service-features li {
    font-size: 14px;
    color: #7f8c8d;
    margin-bottom: 8px;
    padding-left: 20px;
    position: relative;
}

.service-features li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: #f57c00;
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

@media (max-width: 768px) {
    .services-grid {
        grid-template-columns: 1fr;
        padding: 16px;
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
            <li><a href="../user.php">
                <span>Dashboard</span>
            </a></li>
            <li><a href="./mortel.php" class="active">
                <span>Other Service</span>
            </a></li>
            <li><a href="./emergency.php">
                <span>Emergency Service</span>
            </a></li>
        </ul>
    </nav>

    <header class="header">
        <a href="../logout.php"><button class="logout-btn">Logout</button></a>
    </header>

    <main class="main-content">
    <div class="content-section">
        <h2>Our Services</h2>
        <div class="services-grid">
            <!-- Regular Service -->
            <div class="service-card" style="--card-index: 0">
                <div class="service-icon">🔧</div>
                <h3 class="service-title">Regular Service</h3>
                <p class="service-description">Comprehensive car maintenance to keep your vehicle in top condition.</p>
                <p class="service-price">Starting from ₹1,499</p>
                <ul class="service-features">
                    <li>Oil Change</li>
                    <li>Filter Replacement</li>
                    <li>Basic Diagnostics</li>
                </ul>
               <a href="./regular.php"><button class="book-btn">Book Now</button></a>
            </div>

            <!-- Repair Service -->
            <div class="service-card" style="--card-index: 1">
                <div class="service-icon">⚡</div>
                <h3 class="service-title">Towing Service</h3>
                <p class="service-description">Expert towing service with some most experienced drivers of India .</p>
                <p class="service-price">Starting from ₹999</p>
                <ul class="service-features">
                    <li>Fast Towing</li>
                    <li>No Damage Garentee</li>
                    <li>within 15 Min service</li>
                </ul>
                <a href="./towing.php"><button class="book-btn">Book Now</button></a>
            </div>

            <!-- Inspection Service -->
            <div class="service-card" style="--card-index: 2">
                <div class="service-icon">🔍</div>
                <h3 class="service-title">Car Inspection</h3>
                <p class="service-description">Detailed inspection and health check for your vehicle.</p>
                <p class="service-price">Starting from ₹799</p>
                <ul class="service-features">
                    <li>Full Diagnostics</li>
                    <li>Safety Check</li>
                    <li>Performance Report</li>
                </ul>
               <a href="./inspection.php"><button class="book-btn">Book Now</button></a>
            </div>
        </div>
    </div>

    </main>
</body>
</html>