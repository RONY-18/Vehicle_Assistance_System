<?php 
session_start();
              $server = "localhost";
              $username = "root";
              $password = "";
              $dbname = "break_pass";
                  $con = mysqli_connect($server,$username,$password,$dbname);
                  if(! $con){
                      die("connection faled due to :");
                  }
                  ?>
                  <?php 

$profile = $_SESSION['Aus'];

 if($profile == true){

 }
 else{
   header("location: ./login.php");
 }
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        .container {
            text-align: center;
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-out;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, #6e8efb, transparent);
            animation: loadingLine 2s linear infinite;
        }

        .icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            background: #4CAF50;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: scaleIn 0.5s ease-out 0.3s both, pulse 2s infinite;
            position: relative;
        }

        .icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 3px solid #4CAF50;
            animation: ripple 1.5s infinite;
        }

        .icon::before {
            content: '✓';
            font-size: 40px;
            color: white;
        }

        h1 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 1rem;
            opacity: 0;
            animation: slideUp 0.5s ease-out 0.5s forwards;
        }

        .subtitle {
            color: #666;
            margin-top: 1rem;
            opacity: 0;
            animation: slideUp 0.5s ease-out 0.7s forwards;
            margin-bottom: 2rem;
        }

        .back-button {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            letter-spacing: 1px;
            opacity: 0;
            animation: slideUp 0.5s ease-out 0.9s forwards;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .back-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .back-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes scaleIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        @keyframes ripple {
            0% {
                transform: scale(1);
                opacity: 0.8;
            }
            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        @keyframes loadingLine {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .particles {
            position: absolute;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 8px;
            height: 8px;
            background: #6e8efb;
            border-radius: 50%;
            animation: particle 1s ease-out forwards;
        }

        @keyframes particle {
            0% {
                transform: scale(0) translate(0, 0);
                opacity: 1;
            }
            100% {
                transform: scale(1) translate(var(--tx), var(--ty));
                opacity: 0;
            }
        }
    </style>
</head>
<body>
<div id="main">
    <?php if(isset($_GET['uid'])) {
      
      $id=$_GET['uid'];
      $q4= "SELECT * FROM `vendors` WHERE `id` = '$id'";
      $result23 = mysqli_query($con,$q4);
      
    }
    while($row = mysqli_fetch_assoc($result23)) {

    $name = $row['name'];  
    $phone = $row['phone'];
    $Add = $row['address'];
    $Area = $row['area'];
    $space = $row['space'];
    $Charges = $row['charges'];
    $email = $row['email'];


 }?>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'Phpmail/src/Exception.php';
require 'Phpmail/src/PHPMailer.php';
require 'Phpmail/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
// if (isset($_POST["send"])) {

  
// }
$mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'spannerman0075@gmail.com';   //SMTP write your email
    $mail->Password   = 'pcdwxemmymhejmae';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom('spannerman0075@gmail.com'); // Sender Email and name
    $mail->addAddress($profile);     //Add a recipient email  
    $mail->addReplyTo('spannerman0075@gmail.com'); // reply to sender email

    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = "BOOKING DONE !";   // email subject headings
    $mail->Body    = "<big><b>THEY WILL ARIVE WITHIN 15 MIN</b></big><br><br>
                    HERE are the details of the Vendor YOU chose:- <br><br>
                    <b>Name :- $name</b><br>
                    <b>Phone :- $phone</b><br>
                    <b>Email Address :- $email</b><br>
                    <b>Address :- $Add</b><br>
                    <b>Area :- $Area</b><br>
                    <b>Space :- $space</b><br>
                    <b>Charges :- $Charges</b><br><br>
                    <big><b>YOU can also call them to Request them to come faster....</b></big>"; //email message

    // Success sent message alert
    $mail->send();

    ?>

<div class="container">
        <div class="icon"></div>
        <h1>Check Your Email</h1>
        <p class="subtitle">We've sent you all the booking details!</p>
        <a href="http://localhost/emg_service_pass/user.php" class="back-button">Back to Dashboard</a>
    </div>
</body>
<script>
        // Particle effect when clicking the button
        document.querySelector('.back-button').addEventListener('click', function(e) {
            const particles = document.createElement('div');
            particles.className = 'particles';
            particles.style.left = e.clientX + 'px';
            particles.style.top = e.clientY + 'px';
            
            for(let i = 0; i < 8; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                const tx = (Math.random() - 0.5) * 100;
                const ty = (Math.random() - 0.5) * 100;
                particle.style.setProperty('--tx', `${tx}px`);
                particle.style.setProperty('--ty', `${ty}px`);
                particles.appendChild(particle);
            }
            
            document.body.appendChild(particles);
            setTimeout(() => particles.remove(), 1000);
        });
    </script>
</html>                  