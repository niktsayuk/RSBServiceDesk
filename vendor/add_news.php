<?php
    session_start();
    require_once 'connect.php';

    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = date("j, n, Y");

    try
    {
        mysqli_query($connect, "INSERT INTO `news` (`title`, `description`, `date`) VALUES ('$title', '$description', '$date')");
        $_SESSION['message'] = 'Новость успешно опублинована!';
    }
    catch (Exception)
    {
            $_SESSION['message'] = 'Не удалось опубликовать новость!';
    }

   
    header('Location: ../main.php?send');
?>