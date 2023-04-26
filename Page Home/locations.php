<!DOCTYPE html>
 <html>
  <head>
  	<meta charset="utf-8">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
      <link rel="stylesheet" href="locations.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Work+Sans&display=swap" rel="stylesheet">
        <title>Locations</title>
  </head>
  <body onload="initMap()">
  <?php
       require_once('header.php');
        ?>
    <div class="container">
        <div class="overlay">
        <h2>Our Headquaters</h2>
        <p>Taltech University, Tammasaarenkatu 7, P.O. Box 24, 00181 <br> Tallinn </p>
        <div id="map" style="height: 500px"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjVsfVaKjQQbVIBR-O_5ZQlbZnYSiojnc"></script>
        <script>
            function initMap() {
                // The location of Uluru
                const tallinn = { lat:59.39499615513293, lng:24.671981726169246, };
                // The map, centered at Uluru
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 12,
                    center: tallinn,
                });
                // The marker, positioned at Uluru
                const marker = new google.maps.Marker({
                    position: tallinn,
                    map: map,
                });
            }
            window.initMap = initMap;
        </script>
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

  		






