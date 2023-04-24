<?php 
require_once('db-connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"  /> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Work+Sans&display=swap" rel="stylesheet">    
        <title>Home: The Gargbage collection</title>
    </head>
    <body>
        <?php 
       require_once('header.php'); 
        ?>
        <div class="container">
            <div class="overlay">
                <h1>MAKE THE WORLD A CLEANER PLACE, <br>STARTING WITH YOUR OWN SPACE</h1>
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
