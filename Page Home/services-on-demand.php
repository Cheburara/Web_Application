<?php
?>
<!DOCTYPE html>
 <html lang="en">
  <head>
  	<meta charset="utf-8">
  	<link rel="stylesheet" href="services2.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"  />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Work+Sans&display=swap" rel="stylesheet">
        <title>Services</title>

</head>
  <body>
  	<header>
  		<img class="logo" src="images/logoR.png" alt="logo" width="100px" height="100px">
            <nav>
                <ul class="nav__links">
                    <li><a href="home.html">HOME</a></li>
                    <li><a href="services.php">SERVICES</a></li>
                    <li><a href="locations.html">LOCATIONS</a></li>
                    <li><a href="my_profile.html">MY PROFILE</a></li>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjVsfVaKjQQbVIBR-O_5ZQlbZnYSiojnc&libraries=places&language=EN"></script>
    <div class="form-container">
        <form id="garbage-form">
            <div class="form-step" id="step-1">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" pattern="[A-Za-z' -]+" required>
                <label for="address">Address:</label>
                <input type="text" id="address-input" name="address" placeholder="Enter your address">
                <label for="postcode">Postcode:</label>
                <input type="text" id="postcode" name="postcode">


                <button class="next-btn" type="button">Next</button>
            </div>

            <div class="form-step" id="step-2">
                <label for="days">Days for Garbage Collection:</label>
                <input type="checkbox" id="monday" name="day" value="monday">
                <label for="monday">Monday</label>
                <input type="checkbox" id="tuesday" name="day" value="tuesday">
                <label for="tuesday">Tuesday</label>
                <input type="checkbox" id="wednesday" name="day" value="wednesday">
                <label for="wednesday">Wednesday</label>
                <input type="checkbox" id="thursday" name="day" value="thursday">
                <label for="thursday">Thursday</label>
                <input type="checkbox" id="friday" name="day" value="friday">
                <label for="friday">Friday</label>
                <input type="checkbox" id="saturday" name="day" value="saturday">
                <label for="saturday">Saturday</label>
                <input type="checkbox" id="sunday" name="day" value="sunday">
                <label for="sunday">Sunday</label>

                <button class="prev-btn" type="button">Previous</button>
                <button class="next-btn" type="button">Next</button>
            </div>

            <div class="form-step" id="step-3">
                <label for="type">Type of Garbage:</label>
                <select id="type" name="type">
                    <option value="recyclable">Recyclable</option>
                    <option value="organic">Organic</option>
                    <option value="non-recyclable">Non-Recyclable</option>
                </select>

                <button class="prev-btn" type="button">Previous</button>
                <button type="submit">Submit</button>
                id="submitReservation" name="submitReservation"
            </div>
        </form>
    </div>
    </form>
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
    <script src="script.js"></script>
  </body>
</html>