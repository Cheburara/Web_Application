<?php
session_start();

function sanitize_input($input): string
{
    return htmlspecialchars(stripslashes(trim($input)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitReservation"])) {
    // Server-side validation
    $timehours = sanitize_input($_POST["timehour2"]);
    $services = sanitize_input($_POST["type"]);
    $address = sanitize_input($_POST["address"]);
    $time2 = $_POST["day"] ?? array();
    $price = sanitize_input($_POST["garbage-price"]);

    // Validation rules
    $isValid = true;
    $timehourss = array("9:00-12:00", "15:00-19:00", "9:00-20:00");
    if (empty($timehours) || !in_array($timehours, $timehourss)) {
        $isValid = false;
        echo "Invalid time slot!<br>";
    }

    $servicess = array("recyclable", "non-recyclable", "both");
    if (empty($services) || !in_array($services, $servicess)) {
        $isValid = false;
        echo "Invalid service!<br>";
    }

    if (empty($address)) {
        $isValid = false;
        echo "Invalid address!<br>";
    } else if (!preg_match("/^[a-zA-Z0-9\säöüõÄÖÜÕ.,#-]+$/u", $address)) {
        $isValid = false;
        echo "Invalid address!<br>";
    }

    if (count(array($time2)) > 2 || count(array($time2)) == 0) {
        $isValid = false;
        echo "Invalid number of days selected!<br>";
    }


    if ($isValid) {
        // Validation successful
        $_SESSION['reservationData'] = array(
            'timehour' => $timehours,
            'service' => $services,
            'time2' => $time2,
            'price' => $price
        );
        require_once "save_reservation2.php"; // Redirect to the next page
        exit();
    }
}