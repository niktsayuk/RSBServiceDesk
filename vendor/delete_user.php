<?php
    session_start();
    require_once 'connect.php';

    $id = $_POST['ID'];

    $sql = "DELETE FROM users WHERE id='$id'";
    mysqli_query($connect, $sql);
    header('Location: ../main.php');
?>