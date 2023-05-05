<?php

require_once('db-connection.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitReservation"])) {
    $timehours = sanitize_input($_POST["timehour2"]);
    $services = sanitize_input($_POST["type"]);
    $address = sanitize_input($_POST["address"]);
    require_once('db-connection.php');

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitReservation"])) {
        $timehours = sanitize_input($_POST["timehour2"]);
        $time2 = $_POST["day"] ?? array();
        $services = sanitize_input($_POST["type"]);
        $address = sanitize_input($_POST["address"]);
        $price = sanitize_input($_POST["garbage-price"]);

        try {
            $conn = new PDO("mysql:host=localhost;dbname=db_iltrei", 'iltrei', 'ilja2002');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }

        // Get the user ID from the users table
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$_SESSION["username"]]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = $user['id'];

        // Insert the reservation into the reservations table
        $stmt = $conn->prepare("INSERT INTO reservations (user_id, timehour, time2, service, address, price) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $timehours, $time2, $services, $address, $price]);

        // After the reservation is successfully added to the database
        $_SESSION['reservation_sent'] = true;
        header('Location: services.php');
        exit();
    }


    $price = sanitize_input($_POST["price"]);

    try {
        $conn = new PDO("mysql:host=localhost;dbname=db_iltrei", 'iltrei', 'ilja2002');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }

    // Get the user ID from the users table
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$_SESSION["username"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $user['id'];

    // Insert the reservation into the reservations table
    $stmt = $conn->prepare("INSERT INTO reservations (user_id, timehour, service, address, price) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $timehours, $services, $address, $price]);

    // After the reservation is successfully added to the database
    $_SESSION['reservation_sent'] = true;
    header('Location: index.php');
    exit();
}

