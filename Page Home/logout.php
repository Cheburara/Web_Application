<?php
session_start(); // Start the session

// Check if the user is logged in
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    // Unset all the session variables
    $_SESSION = array();
    
    // Destroy the session
    session_destroy();
    
    // Redirect the user to the login page or any other page as per requirement
    header("Location: index.php");
    exit();
}
?>