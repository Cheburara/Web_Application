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
    $old_password = $_POST['old_password'];
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
    
    // Check if old password matches with the one stored in the database
    $link = mysqli_connect("anysql.itcollege.ee", "ICS0008_WT_23", "134fdaeb6fe1", "ICS0008_23");
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $query = "SELECT password FROM users WHERE id = '$user_id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $stored_password = $row['password'];
    mysqli_close($link);
    
    if (!password_verify($old_password, $stored_password)) {
        $errors[] = "Old password is incorrect";
    }
    
    // If there are no errors, update the user's password in the database
    if (empty($errors)) {
        // Establish a database connection
        $link = mysqli_connect("anysql.itcollege.ee", "ICS0008_WT_23", "134fdaeb6fe1", "ICS0008_23");
        if (!$link) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // Hash the new password and update it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password = '$hashed_password' WHERE id = '$user_id'";
        mysqli_query($link, $query);
        mysqli_close($link);
        
        // Set a success message and redirect to the profile page
        $_SESSION['success'] = "Password changed successfully!";
        // Display success message, if any
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

?>
