<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="thanku.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Work+Sans&display=swap" rel="stylesheet">
        <title>Errors</title>
    </head>
<body>
<h1>Error Page</h1>

<p><?php
    session_start();

    // Check if errors exist in session
    if (isset($_SESSION['errors']) && is_array($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
echo '<ul>';
    foreach ($_SESSION['errors'] as $error) {
    echo '<li>' . $error . '</li>';
    }
    echo '</ul>';

// Clear the errors from the session
unset($_SESSION['errors']);
}
    ?></p>
<div class="login">
    <p>Go back <a href="services.php"><br><br>Services</a></p>
</div>


</body>
</html>