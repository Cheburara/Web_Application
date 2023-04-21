<?php
function connectDatabase() {
    $DB_HOST = 'localhost';
    $DB_USER = 'arroba';
    $DB_PASS = 'BedolagA614';
    $DB_NAME = 'db_arroba';

    $link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    if ($link->connect_error) {
        die('Error connecting database: ' . $link->connect_error);
    }

    return $link;
}
?>