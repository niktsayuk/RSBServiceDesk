<?php
    session_start();
    require_once 'connect.php';
    require_once 'data_sql.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    $check_user = mysqli_query($connect, "SELECT users.id, users.full_name, users.id_profile, profile.name, city.region_city FROM `users` JOIN `profile` ON users.id_profile=profile.id JOIN `city` ON users.id_city=city.id WHERE `login` = '$login' AND `password` = '$password'");

    if (mysqli_num_rows($check_user) > 0) 
    {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id_user" => $user['id'],
            "id_profile" => $user['id_profile'],
            "name" => $user['full_name'],
            "profile" => $user['name'],
            "city" => $user['region_city']
        ];

        header('Location: ../main.php');

    } else 
    {
        $check_clients = mysqli_query($connect, "SELECT clients.id, clients.phone, clients.FIO, clients.id_profile, profile.name, city.region_city FROM `clients` JOIN `profile` ON clients.id_profile=profile.id JOIN `city` ON clients.id_city=city.id WHERE `login` = '$login' AND `password` = '$password'");

        if (mysqli_num_rows($check_clients) > 0) 
        {
            $client = mysqli_fetch_assoc($check_clients);

            $_SESSION['user'] = [
                "id_user" => $client['id'],
                "id_profile" => $client['id_profile'],
                "name" => $client['FIO'],
                "profile" => $client['name'],
                "city" => $client['region_city'],
                "phone" => $client['phone']
            ];

            header('Location: ../main.php');
        } else
        {
            $_SESSION['message'] = 'Неверный логин или пароль';
            header('Location: ../index.php');
        }         
    }
?>
