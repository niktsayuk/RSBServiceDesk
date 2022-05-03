<?php
    session_start();
    require_once 'connect.php';

    $profile = $_POST['profile'];
    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    mysqli_query($connect, "INSERT INTO `users` (`id_profile`, `full_name`, `login`, `password`, `phone`) 
                                        VALUES ('$profile','$full_name','$login','$password','$phone')");

    $_SESSION['message'] = 'Регистрация прошла успешно!';
     header('Location: ../main.php?send');
?>
