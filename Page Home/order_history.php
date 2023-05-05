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

// Display the order history dropdown button
echo '<button onclick="showOrderHistory()">Show Order History</button>';

// Display the order history table in a hidden div
echo '<div id="orderHistory" style="display:none">';
if(mysqli_num_rows($result) == 0) {
    // If there are no orders, display a message instead of a table
    echo 'None of orders are done yet';
} else {
    // Display the table with order history
    echo '<table>';
    echo '<tr><th>Time</th><th>Date/Days</th><th>Service</th><th>Address</th><th>Price</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['timehour'] . '</td>';
        if ($row['time2'] == null) {
            echo '<td>' . $row['selected_days'] . '</td>';
        } else {
            echo '<td>' .  date('Y-m-d', strtotime($row['time2'])) . '</td>';
        }
        echo '<td>' . $row['service'] . '</td>';
        echo '<td>' . $row['address'] . '</td>';
        echo '<td>' . $row['price'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
echo '</div>';

// Close the database connection
mysqli_close($link);

// Display the JavaScript function to show the order history table
echo '<script>';
echo 'function showOrderHistory() {';
echo '  var orderHistory = document.getElementById("orderHistory");';
echo '  if (orderHistory.style.display === "none") {';
echo '    orderHistory.style.display = "block";';
echo '  } else {';
echo '    orderHistory.style.display = "none";';
echo '  }';
echo '}';
echo '</script>';
?>
