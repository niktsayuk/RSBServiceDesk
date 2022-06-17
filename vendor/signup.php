<?php
    session_start();
    require_once 'connect.php';

    $id_profile = $_POST['profile'];
    $id_city = $_POST['city'];
    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    try
    {
        mysqli_query($connect, "INSERT INTO `users` (`id`, `id_profile`, `id_city`, `full_name`, `login`, `password`, `phone`) 
                                            VALUES (NULL, '$id_profile','$id_city','$full_name','$login','$password','$phone')");

        $_SESSION['message'] = 'Регистрация пользователя прошла успешно!';
    }
    catch (Exception)
    {
        $_SESSION['message'] = 'Не удалось зарегистрировать пользователя!';
    }
    
    header('Location: ../main.php?send');
?>
