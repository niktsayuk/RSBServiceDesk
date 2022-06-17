<?php
    session_start();
    require_once 'connect.php';

    $region_center = $_POST['RC'];
    $region_city = $_POST['RP'];

    try
    {
        mysqli_query($connect, "INSERT INTO `city` (`id`, `region_center`, `region_city`) VALUES (NULL, '$region_center','$region_city')");
        $_SESSION['message'] = 'Город успешно добавлен!'; 
    }
    catch (Exception)
    {   
        $_SESSION['message'] = 'Не удалось добавить город!';
    }
    
    header('Location: ../main.php?send');
?>