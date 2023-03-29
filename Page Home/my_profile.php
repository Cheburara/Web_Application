<?php
session_start();
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
<header>
    <img class="logo" src="images/logoR.png" alt="logo" width="100px" height="100px">
    <nav>
        <ul class="nav__links">
            <li><a href="home.html">HOME</a></li>
            <li><a href="services.php">SERVICES</a></li>
            <li><a href="locations.html">LOCATIONS</a></li>
            <li><a href="my_profile.php">MY PROFILE</a></li>
            <div class="dropdown">
                <button class="dropbtn">ABOUT US</button>
                <div class="dropdown-content">
                    <a href="team.html">TEAM</a>
                    <a href="history.html">HISTORY</a>
                </div>
            </div>
        </ul>
    </nav>
    <a class="cta" href="form.html"><button>Sign</button></a>
</header>
<div class="container">
    <div class="overlay">
        <h1>My Profile</h1>
        <form action="edit.php" method="POST" id="profileEdit" name="profileEdit">
            <input type="hidden" name="session_id" value="<?php echo session_id(); ?>">
            <p>
                <label>Email:</label>
                <input type="text" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required/>
            </p>
            <p>
                <label>Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $_SESSION['username']; ?>"  pattern="[A-Za-z' -]+" required/>
            </p>
            <p>
                <label>Address:</label>
                <input type="text" name="address" id="address" required />
            </p>
            <p>
                <button type="submit" name="edit" id="edit">Edit</button>
            </p>
        </form>
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

