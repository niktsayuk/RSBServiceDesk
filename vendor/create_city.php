<?php
    session_start();
    require_once 'connect.php';

    $region_center = $_POST['RC'];
    $region_city = $_POST['RP'];

    if(mysqli_query($connect, "INSERT INTO `city` (`region_center`, `region_city`) VALUES ('$region_center','$region_city')"))
        $_SESSION['message'] = 'Данные успешно добавлены!';    
    else
        $_SESSION['message'] = 'Данные не добавлены!';

    
    header('Location: ../main.php?send');
    
?>