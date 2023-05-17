<?php
session_start();

function sanitize_input($input) {
    if (is_array($input)) {
        foreach ($input as &$value) {
            $value = sanitize_input($value);
        }
        return $input;
    }
    return htmlspecialchars(stripslashes(trim($input)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitReservation"])) {
    // Server-side validation
    $timehours = sanitize_input($_POST["timehour2"]);
    $services = sanitize_input($_POST["type"]);
    $address = sanitize_input($_POST["address"]);
    $days = sanitize_input($_POST["day"] ?? array());
    $price = sanitize_input($_POST["garbage-price"]);
    $postalcode = sanitize_input($_POST["postcode"]);

    // Validation rules
    $isValid = true;
    $errors = array();

    if (empty($address)) {
        $isValid = false;
        $errors[] = "Invalid address!";
    } else if (!preg_match('/^[\p{L}0-9_ \-\',.;:]+(?:, [\p{L}0-9_ \-\',.;:]+){2,3}$/u', $address)) {
        $isValid = false;
        $errors[] = "Invalid address!";
    }

    if (empty($postalcode)) {
        $isValid = false;
        $errors[] = "Invalid code!";
    } else if (!preg_match('/^[0-9]{1,8}$/', $postalcode)){
        $isValid = false;
        $errors[] = "Invalid code!";
    }

    $timehourss = array("9:00-12:00", "13:00-16:00", "17:00-20:00");
    if (empty($timehours) || !in_array($timehours, $timehourss)) {
        $isValid = false;
        $errors[] = "Invalid time slot!";
    }

    $servicess = array("recyclable", "non-recyclable", "both");
    if (empty($services) || !in_array($services, $servicess)) {
        $isValid = false;
        $errors[] = "Invalid service!";
    }

    if (count(array($days)) > 2 || count(array($days)) == 0) {
        $isValid = false;
        $errors[] = "Invalid number of days selected!";
    }

    if ($isValid) {
        // Validation successful
        $_SESSION['reservationData'] = array(
            'timehour2' => $timehours,
            'type' => $services,
            'day' => $days,
            'garbage-price' => $price
        );
        require_once "save_reservation2.php"; // Redirect to the next page
        exit();
    } else {
        // Store error messages in session variable and redirect to errors.php
        $_SESSION['errors'] = $errors;
        header("Location: errors.php");
        exit();
    }
}
