<?php

require_once('db-connection.php');

session_start();

require_once('login_validation.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = validateLoginInput($email, $password);

    if (count($errors) == 0) {
        // Validation passed, save data to the database
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

        if (password_verify($password, $user['password'])) {
            // Set the session variable
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $session_id = session_id();
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
            $errors[] = "Invalid email or password";
        }
    }

    // If we get here, the validation failed
    $_SESSION['errors'] = $errors;
    header('Location: login.php');
    exit;
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
