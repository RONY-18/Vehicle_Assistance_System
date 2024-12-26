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
          if(isset($_POST['sub']))
  {
    $Aname = $_POST['email'];
    $Apass= $_POST['password'];
    

    $q_val="SELECT * FROM `requests` WHERE email = '$Aname' AND password = '$Apass'";
    $result_adm = mysqli_query($con,$q_val);
    $co = mysqli_num_rows($result_adm);

        if($co>0){
          
          $_SESSION['Aus']=$Aname;
          header("location: user.php");
          

       } 
  
    else{
      echo '<script>alert("Login Failed! Check Your Username and password and TRY AGAIN")</script>'; 
     
    
    }
    $con-> close();
  }
?>
    <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
     <strong><?php  //echo "connected succesfully !"; ?></strong> 
   </div> -->
   
   <script>
     $(".alert").alert();
   </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Spanner Man 24/7</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            flex-direction: column;
        }

        header {
            position: fixed;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            padding: 1rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo h1 {
            color: #333;
            font-size: 1.5rem;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ff4d4d;
        }

        .admin-btn {
            background: #ff4d4d;
            color: white !important;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .admin-btn:hover {
            background: #ff3333;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            margin-top: 60px;
        }

        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            transform: translateY(20px);
            opacity: 0;
            animation: slideUpFade 0.6s forwards;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h2 {
            color: #333;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #666;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: bold;
            transform: translateX(0);
            transition: transform 0.3s ease;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: #ff4d4d;
            box-shadow: 0 0 0 3px rgba(255,77,77,0.1);
            outline: none;
        }

        .form-group input:focus + label {
            transform: translateX(10px);
            color: #ff4d4d;
        }

        .form-group.shake {
            animation: shake 0.5s;
        }

        .login-button {
            width: 100%;
            padding: 1rem;
            background: #ff4d4d;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .login-button:hover {
            background: #ff3333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,77,77,0.3);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .login-button .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.7);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }

        .back-to-home {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-to-home a {
            color: #666;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .back-to-home a:hover {
            color: #ff4d4d;
        }

        .error-message {
            color: #ff4d4d;
            font-size: 0.9rem;
            margin-top: 0.5rem;
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .error-message.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes slideUpFade {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        footer {
            background: #333;
            color: white;
            padding: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>
<?php  
// session_start();
?>
    <header>
        <nav>
            <div class="logo">
                <h1>Spanner Man 24/7</h1>
            </div>
            
        </nav>
    </header>

    <main>
        <div class="login-container">
            <div class="login-header">
                <h2>Login</h2>
                <p>Please enter your Email Id to continue</p>
            </div>
            <form id="login-form" method="POST">
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" id="username" name="email" required>
                    <div class="error-message">Please enter a valid email</div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <div class="error-message">Please enter your password</div>
                </div>
                <button type="submit" name="sub" class="login-button">Login</button>

            </form>
            <div class="back-to-home">
                <a href="./index.php">← Back to Home</a>
            </div>
            <div class="back-to-home">
                <a href="./Admin/admin.php">Admin</a>
            </div>
        </div>
    </main>
    
    

    <footer>
        <p>&copy; 2024 Spanner Man 24/7. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('login-form');
            const loginButton = document.querySelector('.login-button');

            // Add ripple effect to login button
            loginButton.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                
                this.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
            });

            // Form validation with animations
            
           

            function showError(input, message) {
                const formGroup = input.parentElement;
                const errorMessage = formGroup.querySelector('.error-message');
                formGroup.classList.add('shake');
                errorMessage.textContent = message;
                errorMessage.classList.add('show');
                
                setTimeout(() => {
                    formGroup.classList.remove('shake');
                }, 500);
            }

            function hideError(input) {
                const formGroup = input.parentElement;
                const errorMessage = formGroup.querySelector('.error-message');
                errorMessage.classList.remove('show');
            }

            

            // Header scroll effect
            const header = document.querySelector('header');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    header.style.background = 'rgba(255, 255, 255, 0.98)';
                    header.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
                } else {
                    header.style.background = 'rgba(255, 255, 255, 0.95)';
                    header.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
                }
            });
        });
    </script>
</body>
</html>