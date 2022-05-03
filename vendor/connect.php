<?php

    $connect = mysqli_connect('localhost', 'root', '', 'servicedesk');
    //$connect = mysqli_connect('localhost', 'niktsayuk_sd', 'admin@1', 'niktsayuk_sd');
    
    if (!$connect) {
        die('Error connect to DataBase');
    }
?>