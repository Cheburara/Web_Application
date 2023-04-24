<?php

require_once('db-connection.php');

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

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

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {

        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $session_id = session_id();
        $_SESSION['session_id'] = $session_id;

        $stmt = $link->prepare("INSERT INTO sessions (user_id, session_id, last_activity) VALUES (?, ?, ?)");
        $user_id = $user['id'];
        $last_activity = date('Y-m-d H:i:s');
        $stmt->bind_param("iss", $user_id, $session_id, $last_activity);
        $stmt->execute();

        header('Location: my_profile.php');
        exit;
    }

    echo "Invalid email or password";
}

$session_id = $_SESSION['session_id'];
$last_activity = date('Y-m-d H:i:s');
$stmt = $link->prepare("UPDATE sessions SET last_activity = ? WHERE session_id = ?");
$stmt->bind_param("ss", $last_activity, $session_id);
$stmt->execute();

$stmt->close();
$link->close();

?>
