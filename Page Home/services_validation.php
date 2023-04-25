<?php
session_start();

function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitReservation"])) {
    // Server-side validation
    $timehours = sanitize_input($_POST["timehour"]);
    $time2 = sanitize_input($_POST["time2"]);
    $services = sanitize_input($_POST["service"]);
    $price = sanitize_input($_POST['price']);
 
    // Validation rules
    $isValid = true;
    $timehourss = array("9:00-12:00", "15:00-19:00", "9:00-20:00");
    if (empty($timehours) || !in_array($timehours, $timehourss)) {
        $isValid = false;
        echo "Invalid time slot!<br>";
    }

    $servicess = array("Full-clean", "Surface", "Large-scale");
    if (empty($services) || !in_array($services, $servicess)) {
        $isValid = false;
        echo "Invalid service!<br>";
    }

    if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $time2)) {// YYYY-MM-DD format of date
        $isValid = false;
        echo "Invalid date!<br>";
    }
    else {
        $timestamp = strtotime($time2);
        $minDate = strtotime(date("Y-m-d"));
        $maxDate = strtotime("2033-01-01");
    
        if (!$timestamp || $timestamp < $minDate || $timestamp > $maxDate) {
            $isValid = false;
            echo "Invalid date!<br>";
        }
    }
    if (!checkdate(substr($time2, 5, 2), substr($time2, 8, 2), substr($time2, 0, 4))) {
        $isValid = false;
        echo "Invalid date!<br>";
    }

    if($isValid){
        // Validation successful
        $_SESSION['reservationData'] = array(
            'timehour' => $timehours,
            'time2' => $time2,
            'service' => $services
        );
        require_once "save_reservation.php"; // Redirect to the next page
        exit();
    }
}
?>