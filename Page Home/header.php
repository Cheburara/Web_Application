<?php

require_once('db-connection.php');

if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
    //Show header for logged in users
    include 'header-logged-in.php';
} else{
    include 'header-!logged-in.php';
}

?>