<?php
function connectDatabase() {
    $DB_HOST = 'anysql.itcollege.ee';
    $DB_USER = 'ICS0008_WT_23';
    $DB_PASS = '134fdaeb6fe1';
    $DB_NAME = 'ICS0008_23';

    $link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    if ($link->connect_error) {
        die('Error connecting database: ' . $link->connect_error);
    }

    return $link;
}
?>