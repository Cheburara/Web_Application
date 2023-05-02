<header>
  <img class="logo" src="images/logoR.png" alt="logo" width="100px" height="100px">
  <nav>
    <ul class="nav__links">
      <li><a href="index.php">HOME</a></li>
      <li><a href="services.php">SERVICES</a></li>
      <li><a href="locations.php">LOCATIONS</a></li>
      <li><a href="my_profile.php">MY PROFILE</a></li>
      <div class="dropdown">
        <button class="dropbtn">ABOUT US</button>
        <div class="dropdown-content">
          <a href="team.php">TEAM</a>
          <a href="history.php">HISTORY</a>
        </div>
      </div>
    </ul>
  </nav>
  <a class="cta" href="logout.php"><button id="logout-button">Log Out</button></a>
</header>

<script>
  var intentionalNavigation = false; // initialize flag
  
  // Listen for clicks on links
  document.addEventListener("click", function(e) {
    var target = e.target;
    
    // Check if the target is a link to another page on the same site
    if (target.tagName.toLowerCase() === "a" && target.href.indexOf(window.location.origin) === 0) {
      intentionalNavigation = true; // set flag to true
    }
  });
  
  // Listen for the "unload" event
  window.addEventListener("unload", function(e) {
    if (!intentionalNavigation) { // check if flag is false
      // Create a new AJAX request
      var xhr = new XMLHttpRequest();
      
      // Set the request method and URL
      xhr.open("POST", "logout.php", true);
      
      // Send the request
      xhr.send();
    }
  });
</script>
