<?php
    session_start();
    require_once 'connect.php';

    $id_action = $_POST['ID'];

    $sql = "DELETE FROM news WHERE id='$id_action'";
    mysqli_query($connect, $sql);
    header('Location: ../admin.php');
?>