<?php

session_start();

// Include database connection file
require_once('db-connection.php');

$errors = array();

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate the password format
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/',$password)) {
        $errors[] = 'Invalid password format. Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.';
    }

    // validation for empty form
    if (empty($username)) {
        $errors[] = 'Username is required';
    }
    if (empty($email)) {
        $errors[] = 'Email is required';
    }
    if (empty($password)) {
        $errors[] = 'Password is required';
    }
    if (empty($confirm_password)) {
        $errors[] = 'Confirmed password is required';
    }

    // validation for email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }

    // check if email already exists in database
    $link = connectDatabase();
    $stmt = $link->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $errors[] = 'This email is already registered';
    }
    $stmt->close();
    $link->close();

    // validation for the same password
    if ($password != $confirm_password) {
        $errors[] = 'Passwords do not match';
    }

    // if there are errors, output them
    if (!empty($errors)) {
        echo "<script>";
        foreach ($errors as $error) {
            echo "alert('$error');";
        }
        echo "window.location.href = 'registration.php';";
        echo "</script>";
    } else {
        // open database connection
        $link = connectDatabase();

        // hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // prepare insert statement
        $stmt = $link->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        // execute insert statement
        if ($stmt->execute()) {
            // set session variables
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            // redirect to success page
            header('Location: thanku.html');
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        // close statement and connection
        $stmt->close();
        $link->close();
    }
}
?>
