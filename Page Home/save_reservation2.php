<?php

require_once('db-connection.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitReservation"])) {
    $timehours = sanitize_input($_POST["timehour2"]);
    $services = sanitize_input($_POST["type"]);
    $address = sanitize_input($_POST["address"]);
    $price = sanitize_input($_POST["garbage-price"]);
    $days = sanitize_input($_POST["day"] ?? array());

    try {
        $conn = new PDO("mysql:host=localhost;dbname=db_ilshyn", 'ilshyn', 'Shin!40022');
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
    $stmt = $conn->prepare("INSERT INTO reservations (user_id, timehour, service, address, price, selected_days) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $timehours, $services, $address, $price, $days]);

    // After the reservation is successfully added to the database
    $_SESSION['reservation_sent'] = true;
    header('Location: services.php');
    exit();
}