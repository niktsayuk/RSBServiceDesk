<?php
    session_start();
    require_once 'connect.php';
    
    $id_city = $_POST['city'];
    $id_merchant = $_POST['id_merchant'];
    $INN = $_POST['INN'];
    $FIO = $_POST['FIO'];
    $jur_face = $_POST['jur_face'];
    $company_name = $_POST['company_name'];
    $adress = $_POST['adress'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    try
    {
        mysqli_query($connect, "INSERT INTO `clients`(`id`, `id_city`, `id_merchant`, `INN`, `FIO`, `jur_face`, `company_name`, `adress`, `phone`, `mail`, `login`, `password`) VALUES (NULL, '$id_city','$id_merchant','$INN','$FIO','$jur_face','$company_name','$adress','$phone','$mail','$login','$password')");

        $_SESSION['message'] = 'Регистрация клиента прошла успешно!';
    }
    catch (Exception)
    {
        $_SESSION['message'] = 'Не удалось зарегистрировать клиента!';
    }
    
    header('Location: ../main.php?send');
?>