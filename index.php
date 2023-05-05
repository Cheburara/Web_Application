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
                <h1 id="text">MAKE THE WORLD A CLEANER PLACE, <br>STARTING WITH YOUR OWN SPACE</h1>
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
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const text = document.getElementById('text');
                const strText = text.textContent;
                const splitText = strText.split("");
                text.textContent = "";

                for(let i=0; i < splitText.length; i++){
                    text.innerHTML += "<span>" + splitText[i] + "</span>";
                }

                let char = 0;
                let timer = setInterval(onTick, 50);

                function onTick(){
                    const span = text.querySelectorAll('span')[char];
                    span.classList.add('fade');
                    char++;
                    if(char === splitText.length){
                        complete();
                        return;
                    }
                }

                function complete(){
                    clearInterval(timer);
                    timer = null;
                }
            });
        </script>
    </body>
</html>
