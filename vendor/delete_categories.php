<?php
    session_start();
    require_once 'connect.php';

    $id_action = $_POST['ID'];

    try{
        mysqli_query($connect, "DELETE FROM categories WHERE id='$id_action'");
        $_SESSION['message'] = 'Категория успешно удалена!';
    }
    catch (Exception)
    {
        $_SESSION['message'] = 'Не удалось удалить категорию!';  
    }
    header('Location: ../main.php?send');
?>