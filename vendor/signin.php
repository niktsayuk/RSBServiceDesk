<?php
    session_start();
    require_once 'connect.php';
    require_once 'data_sql.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    $check_user = mysqli_query($connect, "SELECT users.id, users.full_name, users.id_profile, profile.name FROM `users` RIGHT JOIN `profile` ON users.id_profile=profile.id WHERE `login` = '$login' AND `password` = '$password'");

    if (mysqli_num_rows($check_user) > 0) 
    {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id_user" => $user['id'],
            "id_profile" => $user['id_profile'],
            "name" => $user['full_name'],
            "profile" =>$user['name']
        ];

        header('Location: ../main.php');

    } else 
    {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../index.php');
    }
    ?>
