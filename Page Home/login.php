
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Work+Sans&display=swap" rel="stylesheet"> 
    <title>EcoClean</title>
</head>
<body> 
    <?php 
       session_start();
       require_once('header.php'); 
        ?>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="form.php" method="POST">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="inputbox">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="forget">
                        <label for="forget"><input type="checkbox">Remember Me</label>
                        <a href="confirm_password">Forget Password</a>
                    </div>
                    <button name="submit">Log in</button>
                    <script>
                        document.getElementById("submit-button").addEventListener("click", function() {
                     var password = document.getElementById("password").value;
                        if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}/.test(password)) {
                        alert("Invalid password format. Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
                        }
                        });
                    </script>
                    <div class="register">
                        <p>Don't have an account <a href="registration.php"><br><br>Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
