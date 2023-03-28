<?php
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
        // open file to write it
        $fp = fopen('users.csv', 'a');

        // write data 
        fputcsv($fp, array($username, $email, $password));

        // close file
        fclose($fp);

        // Redirection to success
        header('Location: thanku.html');
        exit;
    }
}
?>

