<?php
session_start(); // start the session

// check if the user is logged in
if(isset($_SESSION['role'])){
    // user is logged in, destroy the session
    session_destroy(); // delete all the session data
}

// redirect the user to the sign-in page
header("location:signin.php");
?>
