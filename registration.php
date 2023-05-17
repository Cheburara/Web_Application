<?php 
session_start(); // Start the session

// Retrieve the variables from the session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$confirm_password = isset($_SESSION['confirm_password']) ? $_SESSION['confirm_password'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Work+Sans&display=swap" rel="stylesheet"> 
    <title>EcoClean</title>
</head>
<body> 
    <?php 
       require_once('header.php'); 
        ?>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="registration_validation.php" method="POST">
                    <h2>Sign up</h2>
                    <br>
                    <div class="inputbox">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="username" value="<?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : ''; ?>" required>
                        <label for="#">Name</label>
                        </div>
                        <div class="inputbox">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="email" name="email" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" required>
                        <label for="#">Email</label>
                        </div>
                        <div class="inputbox">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" required>
                        <label for="#">Password</label>
                        </div>
                        <div class="inputbox">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="confirm_password" required>
                        <label for="#">Confirmed Password</label>
                        </div>

                    <br>
                    <button name="submit">Register</button>
                    <div class="register">
                        <p>Have an account <a href="login.php"><br><br>Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
