<?php

session_start();

// Include database connection file
require_once('db-connection.php');

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    function validateForm($username, $email, $password, $confirm_password) {
        $errors = array();

        // validation for empty form
        if (empty($username)) {
            $errors[] = "Username is required";
        }
        if (empty($email)) {
            $errors[] = "Email is required";
        }
        if (empty($password)) {
            $errors[] = "Password is required";
        }
        if (empty($confirm_password)) {
            $errors[] = "Confirm password is required";
        }

        // validation for email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }

        // validation for the same password
        if ($password != $confirm_password) {
            $errors[] = "Passwords do not match";
        }

        return $errors;
    }
    
    // form validation
    $form_errors = validateForm($username, $email, $password, $confirm_password);
    if (!empty($form_errors)) {
        // outpus errors
        echo "<ul>";
        foreach ($form_errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
         // open database connection
         $link = connectDatabase();

        // hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

         // prepare insert statement
         $stmt = $link->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
         $stmt->bind_param("sss", $username, $email, $hashed_password);
 
         // execute insert statement
         if ($stmt->execute()) {
             // set session variables
             $_SESSION['username'] = $username;
             $_SESSION['email'] = $email;
             $_SESSION['password'] = $password;
 
             // redirect to success page
             header('Location: thanku.html');
             exit;
         } else {
             echo "Error: " . $stmt->error;
         }
 
         // close statement and connection
         $stmt->close();
         $link->close();
     }
 }





 


