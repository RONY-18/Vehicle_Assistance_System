<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
        <strong><?php echo("connection failed due to : <br> $con -> error");?></strong> 
    </div>
    <script>
        $(".alert").alert();
    </script>
    <?php 
    exit();
} 

$Name = $_POST['name'];
$Email = $_POST['email'];
$pass = $_POST['pass'];
$Loc = $_POST['location'];
$pin = $_POST['pincode'];
$Nh = $_POST['nh'];
$Issue = $_POST['issue'];
$Des = $_POST['description'];

// First, insert into accounts table
$q_val = "INSERT INTO `accounts`(`email`,`password`, `created_at`) VALUES (?, ?, current_timestamp())";
$stmt_accounts = $con->prepare($q_val);
if (!$stmt_accounts) {
    die('Prepare failed: ' . $con->error);
}
$stmt_accounts->bind_param("ss", $Email, $pass);
$stmt_accounts->execute();
$stmt_accounts->close();

// Then, insert into requests table
$q1 = "INSERT INTO `requests`(`name`, `email`, `password`, `loc`, `pincode`, `NH`, `issue`, `details`, `created_at`) 
       VALUES (?, ?, ?, ?, ?, ?, ?, ?, current_timestamp())";
$stmt = $con->prepare($q1);
if (!$stmt) {
    die('Prepare failed: ' . $con->error);
}
$stmt->bind_param("ssssssss", $Name, $Email, $pass, $Loc, $pin, $Nh, $Issue, $Des);

if($stmt->execute()){
    //required files
    require 'Phpmail/src/Exception.php';
    require 'Phpmail/src/PHPMailer.php';
    require 'Phpmail/src/SMTP.php';

    try {
        $mail = new PHPMailer(true);
        
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'spannerman0075@gmail.com';
        $mail->Password   = 'pcdwxemmymhejmae';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        $mail->setFrom('spannerman0075@gmail.com');
        $mail->addAddress($Email);
        $mail->addReplyTo('spannerman0075@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = "Registration Confirmation";
        $mail->Body    = "CONGRATULATIONS !! 
        Your Registration is Successful ,This is a Confirmation Mail send from our side , You can now login with the Email Id and Password set during Your registration 
        Make sure you login with the same Email Id as used during Registration <br><br>
        <big><b>Password You given :- $pass</b></big><br><br>

        As we do not have any 'Forget Password ?' Option Yet, Make sure You Remember your password, In case you can't remember your password, We Provide with the Passowrd you set, <big><b>Just DONT SHARE this mail with ANYONE</b></big>.";

        $mail->send();
       
        echo '<script language="javascript">';
        echo 'alert("Your Registration is done Successfully! , Check you Email ! ")';
        echo '</script>';

        // Only redirect after successful email send
        header("location:login.php");
        exit();
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$con->close();
?>