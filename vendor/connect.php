<?php

    $connect = mysqli_connect('localhost', 'root', '', 'servicedesk');
    
    if (!$connect) {
        die('Error connect to DataBase');
    }
?>