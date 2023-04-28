<?php
require_once('db-connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
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

    if (!empty($errors)) {
        // Display error messages as alerts and redirect to login.php
        echo "<script>";
        foreach ($errors as $error) {
            echo "alert('$error');";
        }
        echo "window.location.replace('login.php');";
        echo "</script>";
        exit;
    }

    // Check if email exists in the database
    $link = connectDatabase();
    $stmt = $link->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        echo "Error preparing query: " . $link->error;
        exit;
    }

    if ($result->num_rows == 0) {
        echo '<script>alert("Email address not found");</script>';
        echo "<script>setTimeout(function(){window.location.href='login.php';},1000);</script>";
    exit;
    }

    // Fetch the user's information from the database
    $user = $result->fetch_assoc();

    // Compare the provided password with the hashed password in the database
    if (password_verify($password, $user['password'])) {
        // Generate a new session ID
        session_regenerate_id();
        $session_id = session_id();

        // Set the session variable
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['session_id'] = $session_id;

        // Insert the session ID into the sessions table
        $stmt = $link->prepare("INSERT INTO sessions (user_id, session_id, last_activity) VALUES (?, ?, ?)");
        $user_id = $user['id'];
        $last_activity = date('Y-m-d H:i:s');
        $stmt->bind_param("iss", $user_id, $session_id, $last_activity);
        $stmt->execute();

        // Redirect the user to the home page
        header('Location: my_profile.php');
        exit;
    } else {
        // If we get here, the login failed
        echo "Invalid email or password";
    }
}

// Update the last_activity column in the sessions table
$session_id = $_SESSION['session_id'];
$last_activity = date('Y-m-d H:i:s');
$stmt = $link->prepare("UPDATE sessions SET last_activity = ? WHERE session_id = ?");
$stmt->bind_param("ss", $last_activity, $session_id);
$stmt->execute();

// Close statement and connection
$stmt->close();
$link->close();

?>
