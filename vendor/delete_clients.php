<?php
    session_start();
    require_once 'connect.php';

    $id = $_POST['ID'];

    try {
        mysqli_query($connect, "DELETE FROM clients WHERE id='$id'");
        $_SESSION['message'] = 'Клиент успешно удален!';
    }
    catch (Exception) {
        $_SESSION['message'] = 'Не удалось удалить клиента!';
    }
    header('Location: ../main.php?send');
?>