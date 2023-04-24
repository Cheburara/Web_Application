<?php

require_once('db-connection.php');

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
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
        echo "Email address not found";
        exit;
    }

    // Fetch the user's information from the database
    $user = $result->fetch_assoc();

    // Validate the password format
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/',$password)) {
        echo "Invalid password format. Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
        exit;
    }

    // Check if password is strong enough
    $weak_passwords = array("password", "123456", "12345678", "qwerty", "abc123", "password1", "admin", "123123", "letmein", "welcome", "monkey", "football", "1234567", "access", "master", "sunshine", "letmein", "shadow", "password1", "hello", "charlie", "trustno1", "welcome1", "jennifer", "monkey1", "password2");
    if (in_array($password, $weak_passwords)) {
        echo "Password is too weak";
        exit;
    }

    // Compare the provided password with the hashed password in the database
    if (password_verify($password, $user['password'])) {
        // Generate a unique session ID
        $session_id = session_id();

        // Store the session ID in the sessions table
/*$stmt = $link->prepare("INSERT INTO sessions (user_id, session_id, created_at, updated_at) VALUES (?, ?, NOW(), NOW())");

if (!$stmt) {
    echo "Error preparing statement: " . $link->error;
    exit;
}

$stmt->bind_param("is", $user['id'], $session_id);

if (!$stmt->execute()) {
    echo "Error executing statement: " . $stmt->error;
    exit;
}

        // Update the user's last login time in the users table
        $stmt = $link->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
        $stmt->bind_param("i", $user['id']);
        if (!$stmt->execute()) {
            echo "Error executing statement: " . $stmt->error;
            exit;
        }

        // Regenerate the session ID
        session_regenerate_id(true);*/

        // Set the session variable
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['session_id'] = $session_id;

        // Redirect the user to the home page
        header('Location: my_profile.php');
        exit;
    }

    // If we get here, the login failed
    echo "Invalid email or password";
}

// Close statement and connection
$stmt->close();
$link->close();

?>
