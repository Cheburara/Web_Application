<?php
require_once('db-connection.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitReservation"])) {
    $timehours = sanitize_input($_POST["timehour"]);
    $time2 = sanitize_input($_POST["time2"]);
    $services = sanitize_input($_POST["service"]);
    $address = sanitize_input($_POST["address"]);
    $price = sanitize_input($_POST["price"]);

    try {
        $conn = new PDO("mysql:host=anysql.itcollege.ee;dbname=ICS0008_23", 'ICS0008_WT_23', '134fdaeb6fe1');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
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
?>
