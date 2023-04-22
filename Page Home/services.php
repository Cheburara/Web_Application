 <?php
    function fun($input)//string as input function
    {
        return htmlspecialchars(stripslashes(trim($input)));
    }
?>
<?php //current data download
         if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["download"]))
         {
            $timehours = ($_POST["timehour"]);
             $time2 = ($_POST["time2"]);
             $services = ($_POST["service"]);
             $servicedata = fun($timehours) . ";" . fun($time2) . ";" .fun($services);
             header("Content-Type: text/csv");
             header("Content-Disposition: attachment; filename=servicedata.csv");
             header('Expires: 0');
             header('Pragma: public');
             echo $servicedata;
             exit(); 
                 
         }
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

</head>
  <body>
  	<header>
  		<img class="logo" src="images/logoR.png" alt="logo" width="100px" height="100px">
            <nav>
                <ul class="nav__links">
                    <li><a href="index.php">HOME</a></li>
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
<form action="services.php" method="post" >
    
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
    <label for="time2">Service day (Monday, Tuesday, Friday only):</label>
    <input type="date" name="time2" id="time2" class="time2"
       required min="2023-01-01" max="2033-01-01" required>
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

    <br><br>
    <input type="radio" name="privacy-policy" required><font size="+2">I agree with privacy policy</font><br>
    <input type="submit" id="submitReservation" name="submitReservation" value="Submit">
    
    
</form>
                <?php
// Check if the form is submitted
     if(isset($_POST['submitReservation'])){

    // Server-side validation
        $timehours = isset($_POST['timehour']) ? $_POST['timehour'] : '';
        $time2 = $_POST['time2'];
        $services = isset($_POST['service']) ? $_POST['service'] : '';

        // Validation rules, no integers or forbidden symbols.
        $isValid = true;
         $timehourss = array("9:00-12:00", "15:00-19:00", "9:00-20:00");
         if (empty($_POST['timehour']) && !in_array($_POST['timehour'], $timehours)) {
            $isValid = false;
            echo "Invalid !";
        }
        if ($timehourss = ''){
            $isValid = false;
            echo "Invalid !";
        }
        $servicess = array("Full cleaning", "Surface and ground cleaning(dust, rubbish)", "Collection of large-scale garbage");
        if (empty($_POST['service']) && !in_array($_POST['service'], $services)) {
            $isValid = false;
            echo "Invalid !";
        }
        if ($servicess = ''){
            $isValid = false;
            echo "Invalid !";
        }

        if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $time2)) {// YYYY-MM-DD format of date
            $isValid = false;
            echo "Invalid date!";
        }
    
        else {
            $timestamp = strtotime($time2);
            $minDate = strtotime("2023-01-01");
            $maxDate = strtotime("2033-01-01");
    
            if (!$timestamp || $timestamp < $minDate || $timestamp > $maxDate) {
                $isValid = false;
                echo "Invalid date!";
            }
        }
         if (!checkdate(substr($time2, 5, 2), substr($time2, 8, 2), substr($time2, 0, 4))) {
            $isValid = false;
            echo "Invalid date!";
        }

    
                    $timehour = fun($timehours);
                    $time2 = fun($time2);
                    $service = fun($services);
                    $servicedata = implode(';', [$timehour, $time2, $service]) . ";\n";
        if($isValid){
        // Save 
        
        $servicedata = array($timehour, $_POST['time2'], $service);
        $file = fopen('servicedata.csv', 'a');
        chmod('servicedata.csv', 0777);
        fputcsv($file, $servicedata,';');//writting data into file
        fclose($file);
                    echo '<form id="download" action="services.php" method="POST">';
                    echo '<input type="hidden" name="timehour" value='.$timehour.'>';
                    echo '<input type="hidden" name="time2" value='.$time2.'>';
                    echo '<input type="hidden" name="service" value='.$service.'>';
                    echo '<input type="submit" name="download" value="Download current data">';//download button
                    echo '</form>';

        // Displaing of confirmation massage
        echo "<div id='confirmedText'>Reservation has been confirmed.</div>";// Display div with id 'confirmedText'
        echo "<br>";
     }
    else{
          // Display div with id 'confirmedError'
          echo "<div id='confirmedError'>Reservation unsuccessful.</div>";
        }
        
    
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
