<?php 
require_once('db-connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="team.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"  /> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Work+Sans&display=swap" rel="stylesheet">    
        <title>About us: TEAM</title>
    </head>
        <body>
            <?php 
       require_once('header.php'); 
        ?>
            <main>
                <h1>Meet Our Garbage Collection Company Team</h1>
                <section>
                    <h2>John Smith - CEO</h2>
                    <p>John has been in the garbage collection industry for over 20 years. He has a passion for creating sustainable waste management solutions and ensuring that our clients receive top-notch service. He oversees the entire operation of our company and is always looking for ways to improve our services.</p>
                </section>
            
                <section>
                    <h2>Jane Doe - Operations Manager</h2>
                    <p>Jane is responsible for overseeing the day-to-day operations of our company. She ensures that all of our trucks are in good working order, schedules routes for our drivers, and manages our team of customer service representatives. She has been with our company for 10 years and is dedicated to providing excellent customer service.</p>
                </section>
            
                <section>
                    <h2>Mark Johnson - Driver Supervisor</h2>
                    <p>Mark is responsible for supervising our team of drivers. He ensures that they are following safety protocols, driving responsibly, and delivering exceptional service to our clients. Mark has been with our company for 5 years and is a valued member of our team.</p>
                </section>
            
                <section>
                    <h2>Emily Brown - Customer Service Representative</h2>
                    <p>Emily is one of our customer service representatives. She is responsible for answering phone calls, responding to emails, and assisting our clients with any questions or concerns they may have. Emily has been with our company for 2 years and always goes above and beyond to provide exceptional customer service.</p>
                </section>
            </main>

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
<?php
        echo "Hellow World";
        ?>
