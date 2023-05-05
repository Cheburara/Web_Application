<?php
session_start();

function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitReservation"])) {
    // Server-side validation
    $timehours = sanitize_input($_POST["timehour"]);
    $time2 = sanitize_input($_POST["time2"]);
    $services = sanitize_input($_POST["service"]);
    $address = sanitize_input($_POST["address"]);
    $price = sanitize_input($_POST["price"]);
    $postalcode = sanitize_input($_POST["postcode"]);

    // Validation rules
    if(empty($address)) {
        array_push($errors, "Invalid address!");
    } else if (!preg_match('/^(?:\\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/', $address)) {
        array_push($errors, "Invalid address!");
    }

    if(empty($postalcode)) {
        array_push($errors, "Invalid code!");
    } else if (!preg_match('/^[0-9]{4}\s-\s[0-9]{3}$/', $postalcode)){
        array_push($errors, "Invalid code!");
    }

    $timehourss = array("9:00-12:00", "15:00-19:00", "9:00-20:00");
    if (empty($timehours) || !in_array($timehours, $timehourss)) {
        array_push($errors, "Invalid time slot!");
    }

    $servicess = array("Full-clean", "Surface", "Large-scale");
    if (empty($services) || !in_array($services, $servicess)) {
        array_push($errors, "Invalid service!");
    }

    if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $time2)) {// YYYY-MM-DD format of date
        array_push($errors, "Invalid date!");
    } else {
        $timestamp = strtotime($time2);
        $minDate = strtotime(date("Y-m-d"));
        $maxDate = strtotime("2033-01-01");

        if (!$timestamp || $timestamp < $minDate || $timestamp > $maxDate) {
            array_push($errors, "Invalid date!");
        }
    }

    if (!checkdate(substr($time2, 5, 2), substr($time2, 8, 2), substr($time2, 0, 4))) {
        array_push($errors, "Invalid date!");
    }

    if (empty($address)) {
        array_push($errors, "Invalid address!");
    } else if (!preg_match("/^[a-zA-Z0-9\säöüõÄÖÜÕ.,#-]+$/u", $address)) {
        array_push($errors, "Invalid address!");
    }

    if (!is_numeric($price) || $price <= 0) {
        array_push($errors, "Invalid price!");
    }

    if(count($errors) == 0){
        // Validation successful
        $_SESSION['reservationData'] = array(
            'timehour' => $timehours,
            'time2' => $time2,
            'service' => $services,
            'price' => $price
        );
        require_once "save_reservation.php"; // Redirect to the next page
        exit();
    }
}
?>

<!-- Display error messages as alerts -->
<?php foreach($errors as $error): ?>
    <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <br>
       
    </form>
</div>

