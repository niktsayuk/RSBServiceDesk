<?php
    session_start();
    require_once 'connect.php';

    $id_user = $_SESSION['user']['id_user'];
    $phone_manager = $_SESSION['user']['phone'];
    $id_categories = $_POST['categories'];
    $id_terminal = $_POST['ID_terminal'];
    $description = $_POST['description'];
    $date = date("j, n, Y");

    try
    {
        mysqli_query($connect, "INSERT INTO `task`(`id_user`, `id_categories`, `id_terminal`, `description`, `phone_manager`, `date`) VALUES ('$id_user','$id_categories', '$id_terminal', '$description', '$phone_manager', '$date')");
        $_SESSION['message'] = 'Заявка успешно отправлена!'; 
    }
    catch (Exception)
    {   
        $_SESSION['message'] = 'Не удалось отправить заявку!';
    }

    if ($connect->affected_rows == 1){
        echo "Информация занесена в базу данных";
        }else{
        echo "Информация не занесена в базу данных" . $connect->error;
        }
    header('Location: ../main.php?send');
?>