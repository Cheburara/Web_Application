
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
  <body>
  	<?php 
    session_start();
       require_once('header.php'); 
        ?>
<form action="services_validation.php" method="post" >
    
  	 <div class="container">
            <div class="overlay">
            <div id="request">    
                <h1><i>Garbage collection request</i></h1><br>
                <form action="submit-form.php">
            
        <label for="timehour"><font size="+1">Select time:</font></label><br>
        <div class="input-container">
<input type="radio" id="9:00-12:00" name="timehour" value="9:00-12:00" required><label for="9:00-12:00">9:00-12:00</label>
<br>
<input type="radio" id="15:00-19:00" name="timehour" value="15:00-19:00" required><label for="15:00-19:00">15:00-19:00</label>
<br>
<input type="radio" id="9:00-20:00" name="timehour" value="9:00-20:00" required><label for="9:00-20:00">9:00-20:00</label>
        </div>
        <br>
        <br>
        <label for="time2">Service day:</label>
<input type="date" name="time2" id="time2" class="time2" 
       required min="<?php echo date('Y-m-d', strtotime('+1 day'));?>" 
       max="<?php echo date('Y-m-d', strtotime('+1 year'));?>" required>

        <br>
        <br>
    <label for="service"><font size="+1">Type of service:</font></label>
     <br>
    <div class="input-container">
    <input type="radio" id="First op" name="service" value="Full-clean" required>
    <label for="First op"><font size="+1">Full cleaning</font></label>
    <br>
    <input type="radio" id="Second op" name="service" value="Surface" required>
    <label for="Second op"><font size="+1">Surface and ground cleaning(dust, rubbish)</font></label>
    <br>
    <input type="radio" id="Third op" name="service" value="Large-scale" required>
    <label for="Third op"><font size="+1">Collection of large-scale garbage</font></label>
    </div>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" class="price" readonly >



    <br><br>
    <input type="radio" name="privacy-policy" required><font size="+2">I agree with privacy policy</font><br>
    <input type="submit" id="submitReservation" name="submitReservation" value="Submit">
</form>
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
