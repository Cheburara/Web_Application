<?php
session_start();

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Email validation
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Check if email exists in the database
    $users = array_map('str_getcsv', file('users.csv'));
    $emails = array_column($users, 1);
    if (!in_array($email, $emails)) {
        echo "Email address not found";
        exit;
    }

    // Password validation
    if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>])(?!.*(.)\1{2,}).{8,}$/',$password)) {
        echo "Invalid password format. Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character. It cannot contain repeating characters.";
        exit;
    }

    // Check if password is strong enough
    $weak_passwords = array("password", "123456", "12345678", "qwerty", "abc123", "password1", "admin", "123123", "letmein", "welcome", "monkey", "football", "1234567", "access", "master", "sunshine", "letmein", "shadow", "password1", "hello", "charlie", "trustno1", "welcome1", "jennifer", "monkey1", "password2");
    if (in_array($password, $weak_passwords)) {
        echo "Password is too weak";
        exit;
    }

    // Hash the password before comparing it to the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Open the file for reading
    $fp = fopen('users.csv', 'r');

    // Loop through the file and look for a match
    while ($row = fgetcsv($fp)) {
        if (isset($row[1]) && isset($row[2]) && $row[1] == $email && $row[2] == $password) {
            // Regenerate the session ID
            session_regenerate_id(true);

            // Set the session variable
            $_SESSION['loggedIn'] = true;

            // Redirect the user to the home page
            header('Location: registration.html');
            exit;
        }
    }

    // If we get here, the login failed
    echo "Invalid email or password";
}
?>
