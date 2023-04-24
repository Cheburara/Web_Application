<?php
function rememberMe() {
    // Check if the "Remember Me" checkbox is checked
    if(isset($_POST['remember_me'])) {
        // Set a cookie to remember the user's login for 30 days
        setcookie("user_login", $_POST['username'], time()+60*60*24*30);
        setcookie("user_password", $_POST['password'], time()+60*60*24*30);
    } else {
        // If the checkbox is not checked, remove any existing cookies
        setcookie("user_login", "", time()-3600);
        setcookie("user_password", "", time()-3600);
    }
}
?>
