<?php

function validateLoginInput($email, $password) {
    $errors = array();

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate the password format
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/',$password)) {
        $errors[] = "Invalid password format. Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }

    // Check if password is strong enough
    $weak_passwords = array("password", "123456", "12345678", "qwerty", "abc123", "password1", "admin", "123123", "letmein", "welcome", "monkey", "football", "1234567", "access", "master", "sunshine", "letmein", "shadow", "password1", "hello", "charlie", "trustno1", "welcome1", "jennifer", "monkey1", "password2");
    if (in_array($password, $weak_passwords)) {
        $errors[] = "Password is too weak";
    }

    return $errors;
}
 // If we get here, the validation passed
 $_SESSION['loggedIn'] = true;
 $_SESSION['username'] = $user['username'];
 $_SESSION['email'] = $user['email'];
 $session_id = session_id();
 $_SESSION['session_id'] = $session_id;

 // Redirect the user to the save_login.php script
 header('Location: login_save_db.php');
 exit;
?>