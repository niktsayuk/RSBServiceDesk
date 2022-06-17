<?php
    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];

    try
    {
        mysqli_query($connect, "INSERT INTO `categories` (`name`) VALUES ('$name')");
        $_SESSION['message'] = 'Категория успешно добавлена!'; 
    }
    catch (Exception)
    {   
        $_SESSION['message'] = 'Не удалось добавить категорию!';
    }
    
    header('Location: ../main.php?send');
?>