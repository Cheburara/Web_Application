<?php
session_start();
require_once('db-connection.php');

// Check if the user is logged in
 if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
     header('Location: login.php');
     exit();
}

// Connect to the database
$link = mysqli_connect('anysql.itcollege.ee', 'ICS0008_WT_23', '134fdaeb6fe1', 'ICS0008_23');

$email = $_SESSION['email'];
$query = "SELECT id FROM users WHERE email = '$email'";
$result = mysqli_query($link, $query);
$user_id = mysqli_fetch_assoc($result)['id'];
$_SESSION['user_id'] = $user_id;
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
    <div class="change">
    <h1>Change Password</h1> 
        <form action="change_password.php" method="POST" id="profileEdit" name="profileEdit">
    <input type="hidden" name="session_id" value="<?php echo session_id(); ?>">
    <p>
            <p><label>Old Password:</label>
            <input type="password" name="old_password" id="old_password" required />
            </p>
            <p>
                <label>New Password:</label>
                <input type="password" name="new_password" id="new_password" required />
            </p>
            <p>
                <label>Confirm New Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" required />
            </p>
            <p>
            <button type="submit" name="change_password" id="change_password">Change Password</button>
                <br>
                <a href="my_profile.php">Cancel</a>
            </p>
</form>
</div>
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