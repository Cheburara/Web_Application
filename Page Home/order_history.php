<?php

require_once('db-connection.php');

// Check if the user is logged in
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: login.php');
    exit();
}

// Connect to the database
$link = mysqli_connect('localhost', 'arroba', 'BedolagA614', 'db_arroba');

// Get the user's ID from the users table
$email = $_SESSION['email'];
$query = "SELECT id FROM users WHERE email = '$email'";
$result = mysqli_query($link, $query);
$user_id = mysqli_fetch_assoc($result)['id'];

// Get the user's order history from the reservations table
$query = "SELECT * FROM reservations WHERE user_id = '$user_id'";
$result = mysqli_query($link, $query);

// Display the order history in a table
echo '<table>';
echo '<tr><th>Time</th><th>Data</th><th>Service</th><th>Price</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['timehour'] . '</td>';
    echo '<td>' .  date('Y-m-d', strtotime($row['time2'])) . '</td>';
    echo '<td>' . $row['service'] . '</td>';
    //echo '<td>' . $row['price'] . '</td>';
    echo '</tr>';
}
echo '</table>';

// Close the database connection
mysqli_close($link);
?>
