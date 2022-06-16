<?php
    session_start();
    require_once 'connect.php';

    $id_action = $_POST['ID'];

    try{
        mysqli_query($connect, "DELETE FROM city WHERE id='$id_action'");
        $_SESSION['message'] = 'Город успешно удален!';
    }
    catch (Exception)
    {
        $_SESSION['message'] = 'Не удалось удалить город!';  
    }
    header('Location: ../main.php?send');
?>