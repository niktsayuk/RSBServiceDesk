<?php
    session_start();
    require_once 'connect.php';

    $id_action = $_POST['ID'];

    try{
        mysqli_query($connect, "DELETE FROM news WHERE id='$id_action'");
        $_SESSION['message'] = 'Новость успешно удалена!';
    }
    catch (Exception)
    {
        $_SESSION['message'] = 'Не удалось удалить новость!';  
    }
    header('Location: ../main.php?send');
?>