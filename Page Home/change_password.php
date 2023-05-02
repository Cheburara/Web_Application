<?php
session_start();

// Check if the user is logged in
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: login.php');
    exit();
}
$errors = array();

if (isset($_POST['change_password'])) {
    $user_id = $_SESSION['user_id'];
    $password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validate the password format
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/',$password)) {
        $errors[] = "Invalid password format. Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }

    // Check if password is strong enough
    $weak_passwords = array("password", "123456", "12345678", "qwerty", "abc123", "password1", "admin", "123123", "letmein", "welcome", "monkey", "football", "1234567", "access", "master", "sunshine", "letmein", "shadow", "password1", "hello", "charlie", "trustno1", "welcome1", "jennifer", "monkey1", "password2");
    if (in_array($password, $weak_passwords)) {
        $errors[] = "Password is too weak";
    }

    if ($password != $confirm_password) {
        $errors[] = "Passwords do not match";
    }
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . $error . "</li>";
    }
    echo "</ul>";
   // If there are no errors, update the user's password in the database
   if (empty($errors)) {
    // Establish a database connection
    $link = mysqli_connect("localhost", "arroba", "BedolagA614", "db_arroba");
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }
        // Set a success message and redirect to the profile page
        $_SESSION['success'] = "Password changed successfully!";
        header('Location: my_profile.php');
        exit();
    }
}

// Display errors
echo "<ul>";
foreach ($errors as $error) {
    echo "<li>" . $error . "</li>";
}
echo "</ul>";

// Display success message, if any
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']);
}
?>





