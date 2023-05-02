    <?php
    require_once('db-connection.php');
    ?>
    <!DOCTYPE html>
     <html lang="en">
      <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="services.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"  />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Work+Sans&display=swap" rel="stylesheet">
            <title>Services</title>
          <script>
          function calculatePrice() {
          // Get the selected options
          var timehour = document.querySelector('input[name="timehour"]:checked').value;
          var service = document.querySelector('input[name="service"]:checked').value;

          // Calculate the price based on the selected options
          var price = 0;
          if (timehour === "9:00-12:00") {
          price += 50;
          } else if (timehour === "15:00-19:00") {
          price += 70;
          } else if (timehour === "9:00-20:00") {
          price += 100;
          }
          if (service === "Full-clean") {
          price += 100;
          } else if (service === "Surface") {
          price += 50;
          } else if (service === "Large-scale") {
          price += 150;
          }

          // Set the calculated price to the price field
          document.getElementById("price").value = "$" + price;
          document.getElementById("price").value = price;

          }

          // Add an event listener to the time and service elements to calculate the price automatically
          document.addEventListener("DOMContentLoaded", function() {
          var timeElements = document.querySelectorAll('input[name="timehour"]');
          for (var i = 0; i < timeElements.length; i++) {
          timeElements[i].addEventListener("change", calculatePrice);
          }

          var serviceElements = document.querySelectorAll('input[name="service"]');
          for (var i = 0; i < serviceElements.length; i++) {
          serviceElements[i].addEventListener("change", calculatePrice);
          }
          });

          </script>
      </head>
      <?php
      session_start();
      require_once('header.php');
      ?>
        <div class="container">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjVsfVaKjQQbVIBR-O_5ZQlbZnYSiojnc&callback=initMap&libraries=places&language=EN"></script>
            <div class="overlay">
                <h1>Start Service</h1>
                <h2>Waste Management Services</h2>
                <h3>Waste Connections offers waste management services for your home or business.<br>
                    From garbage collection to recycling, we will handle it. We take care of your business waste with reliable trash pickup and dumpster rentals.</h3>
            </div>

            <div class="form-wrapper">
            <div class="tab-container">
                <button class="tablinks" onclick="toggle_visibility('garbage-form'); toggleActive(this)">Scheduled</button>
                <button class="tablinks" onclick="toggle_visibility('form2'); toggleActive(this)">On-demand</button>
            </div>


                <form id="garbage-form" action="services_validation2.php" method="post" style="display: none">
                <div class="form-container">
                <div class="form-step" id="step-1">
                    <label for="days">Enter your info:</label><br><br>
                    <label for="address"><br>Address:</label><br>
                    <label for="address-input"></label><input type="text" id="address-input" name="address" placeholder="Enter your address">
                    <label for="postcode"><br>Postcode:</label><br>
                    <input type="text" id="postcode" name="postcode" required><br><br>
                    <div class="next-button"><button class="next-btn" type="button">Next</button><br></div>
                </div>
                    <div class="form-step" id="step-2">
                        <label for="type">Type of Garbage:</label>
                        <select id="type" name="type">
                            <option value="recyclable">Recyclable</option>
                            <option value="non-recyclable">Non-Recyclable</option>
                            <option value="both">Both</option>
                        </select><br><br>
                        <label for="timehour"><font size="+1">Select time:</font></label><br><br>
                        <input type="radio" id="8:00-12:00" name="timehour" value="9:00-12:00" required><label for="9:00-12:00">9:00-12:00</label>
                        <br>
                        <input type="radio" id="13:00-19:00" name="timehour" value="15:00-19:00" required><label for="15:00-19:00">15:00-19:00</label>
                        <br>
                        <input type="radio" id="9:00-20:00" name="timehour" value="9:00-20:00" required><label for="9:00-20:00">9:00-20:00</label>
                        <br>
                        <br>
                        <button class="prev-btn" type="button">Previous</button>
                        <button class="next-btn" type="button">Next</button>
                    </div>
                <div class="form-step" id="step-3">
                    <label for="days">Days for Garbage Collection(only two possible):</label><br>
                    <input type="checkbox" id="monday" name="day" value="monday">
                    <label for="monday">Monday</label><br>
                    <input type="checkbox" id="tuesday" name="day" value="tuesday">
                    <label for="tuesday">Tuesday</label><br>
                    <input type="checkbox" id="wednesday" name="day" value="wednesday">
                    <label for="wednesday">Wednesday</label><br>
                    <input type="checkbox" id="thursday" name="day" value="thursday">
                    <label for="thursday">Thursday</label><br>
                    <input type="checkbox" id="friday" name="day" value="friday">
                    <label for="friday">Friday</label><br><br>
                    <button class="prev-btn" type="button">Previous</button>
                    <input type="submit" id="submitReservation" name="submitReservation" value="Submit">
                </div>
                </div>
            </form>
            <form id="form2" form action="services_validation.php" method="post" style="display: none">
                <div class="form-container">
                            <div class="form-step" id="step-1">
                                <label for="days">Enter your info:</label><br><br>
                                <label for="address"><br>Address:</label><br>
                                <label for="address-input"></label><input type="text" id="address-input" name="address" placeholder="Enter your address">
                                <label for="postcode"><br>Postcode:</label><br>
                                <input type="text" id="postcode" name="postcode" required><br><br>
                                <div class="next-button"><button class="next-btn" type="button">Next</button><br></div>
                                <button class="next-btn" type="button">Next</button>
                            </div>
                            <div class="form-step" id="step-2">
                                <label for="timehour"><font size="+1">Select time:</font></label><br><br>
                                <label for="time2">Service <day></day>:</label>
                                <input type="date" name="time2" id="time2" class="time2" required min="2023-01-01" max="2033-01-01" required><br><br>
                                <input type="radio" id="8:00-12:00" name="timehour" value="9:00-12:00" required><label for="9:00-12:00">9:00-12:00</label>
                                <br>
                                <input type="radio" id="13:00-19:00" name="timehour" value="15:00-19:00" required><label for="15:00-19:00">15:00-19:00</label>
                                <br>
                                <input type="radio" id="9:00-20:00" name="timehour" value="9:00-20:00" required><label for="9:00-20:00">9:00-20:00</label>
                                <br>
                                <br>
                                <button class="prev-btn" type="button">Previous</button>
                                <button class="next-btn" type="button">Next</button>
                            </div>

                            <div class="form-step" id="step-3">
                                <label for="service"><font size="+1">Type of garbage:</font></label><br>
                                <br>
                                <div class="input-container">
                                    <input type="radio" id="First op" name="service" value="Full-clean" required>
                                    <label for="First op"><font size="+1">Recyclable</font></label>
                                    <br>
                                    <input type="radio" id="Second op" name="service" value="Surface" required>
                                    <label for="Second op"><font size="+1">Non-Recyclable</font></label>
                                    <br>
                                    <input type="radio" id="Third op" name="service" value="Large-scale" required>
                                    <label for="Third op"><font size="+1">Both</font></label><br><br>
                                    <label for="price">Price:</label>
                                    <input type="text" id="price" name="price" class="price" readonly  style="color: white !important;">
                                    <br>
                                </div>
                                <br>
                                <br>
                                <button class="prev-btn" type="button">Previous</button>
                                <input type="submit" id="submitReservation" name="submitReservation" value="Submit">
                            </div>
                        </form>
            </div>

        <?php
        if(empty($name)) {
            $errors[] = "First name is required";
        } else if(!preg_match("/^[A-Za-z' -]+$/", $name)) {
            $errors[] = "Invalid first name format";
        }
        if(empty($address)) {
            $errors[] = "Address is required";
        } else if (!preg_match('/^(?:\\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/', $address)) {
            $errors[] = "Invalid address format";
        }
        if(empty($postalcode)) {
            $errors[] = "Postal code is required";
        } else if (!preg_match('/^[0-9]{4}\s-\s[0-9]{3}$/', $postalcode)){
            $errors[] = "Invalid postal code format";
        }


        ?>
            <?php
            if (isset($_SESSION['reservation_sent']) && $_SESSION['reservation_sent']) {
                echo '<script language="javascript">';
                echo 'alert("Reservation successfully sent")';
                echo '</script>';
                unset($_SESSION['reservation_sent']);
            }
            ?>
        </div>
                </div>
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
                    <script>var input = document.getElementById('address-input');
                        var options = {
                            componentRestrictions: { country: 'ee' }
                        };
                        var autocomplete = new google.maps.places.Autocomplete(input, options);

                        var input = document.getElementById('address-input2');
                        var options = {
                            componentRestrictions: { country: 'ee' }
                        };
                        var autocomplete = new google.maps.places.Autocomplete(input, options);</script>
        <script src="script.js"></script>
      </body>
    </html>
