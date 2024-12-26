<?php  
// session_start();
// session_unset();
// session_destroy();   
// header("location:../index.php");

?>

<?php
session_start();

// Clear all session data
$_SESSION = array();

// Destroy the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

// Destroy the session
session_destroy();

// Redirect to index page
header("Location: ../index.php");
exit();
?>