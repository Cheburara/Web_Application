<?php
require_once('db-connection.php');
session_start();

// Check if the user is logged in
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: login.php');
    exit();
}

// Get the session ID
$session_id = session_id();

// Connect to the database
$link = mysqli_connect('localhost', 'arroba', 'BedolagA614', 'db_arroba');

// Get the user's ID from the sessions table
$query = "SELECT user_id FROM sessions WHERE session_id = '$session_id'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$user_id = $row['user_id'];

// Get the user's information from the users table
$query = "SELECT username, email FROM users WHERE id = '$user_id'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$email = $row['email'];

// Get the user's address from the reservations table
$query = "SELECT address FROM reservations WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($link, $query);
$reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="my_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"  />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Work+Sans&display=swap" rel="stylesheet">
    <title>My Profile</title>
</head>
<body>
<?php 
       require_once('header.php'); 
        ?>
<div class="container">
    <div class="overlay">
        <h1>My Profile</h1>
        <form action="edit.php" method="POST" id="profileEdit" name="profileEdit">
            <input type="hidden" name="session_id" value="<?php echo session_id(); ?>">
            <p>
                <label>Email:</label>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required/>
            </p>
            <p>
                <label>Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $username; ?>"  pattern="[A-Za-z' -]+" required/>
            <p>
                <label>Address:</label>
                <input type="text" name="address" id="address" value="<?php echo $reservations[0]['address']; ?>" required />
            </p>
            <p>
                <label>Phone:</label>
                <input type="text" name="phone" id="phone" value="" pattern="[0-9]{10}" required />
            </p>
           <p>
                <button type="submit" name="edit" id="edit">Edit</button>
            </p>
        </form>
             <?php
            // Retrieve user's order history from database and display it
            include('order_history.php');
             ?>
            </p>
           <p>
    </div>
</div>
<footer>
    <div class="footer-content">
        <h3>EcoClean</h3>
        <p>Make a difference together</p>
        <ul class="socials">
            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>Copyright</p>
    </div>
</footer>
</body>
</html>

