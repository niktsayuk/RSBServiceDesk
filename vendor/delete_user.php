<?php
    session_start();
    require_once 'connect.php';

    $id = $_POST['ID'];

    try {
        mysqli_query($connect, "DELETE FROM users WHERE id='$id'");
        $_SESSION['message'] = 'Пользователь успешно удален!';
    }
    catch (Exception) {
        $_SESSION['message'] = 'Не удалось удалить пользователя!';
    }
    header('Location: ../main.php?send');
?>