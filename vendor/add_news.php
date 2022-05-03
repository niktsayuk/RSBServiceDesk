<?php
    session_start();
    require_once 'connect.php';

    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = date("j, n, Y");

   mysqli_query($connect, "INSERT INTO `news` (`title`, `description`, `date`) VALUES ('$title', '$description', '$date')");

    $_SESSION['message'] = 'Новость успешно опублинована!';
    header('Location: ../main.php?send');
?>