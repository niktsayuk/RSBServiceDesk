<?php
    session_start();
    require_once 'vendor/connect.php';
?>

<div>
    <h3 class="mt-5">Список зарегистрированных пользователей</h3>

    <?php include('models/modal_register.php') ?>

    <a class="btn rounded btn-green my-3" data-bs-toggle="modal" data-bs-target="#add">Добавить</a>
    <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="msg text-center text-green pt-3"> '.$_SESSION['message'].' </p>';
        }
        unset($_SESSION['message']);
    ?>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">Номер</th>
                <th scope="col">Профиль</th>
                <th scope="col">ФИО</th>
                <th scope="col">Логин</th>
                <th scope="col">Пароль</th>
                <th scope="col">Телефон</th>
                <th scope="col">Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $list_user = mysqli_query($connect, "SELECT users.*, profile.name
                                        FROM `users` JOIN `profile` ON users.id_profile=profile.id");

                while($user = mysqli_fetch_assoc($list_user))
                    echo '<tr>
                            <td>'.$user['id'].'</td>
                            <td>'.$user['name'].'</td>
                            <td>'.$user['full_name'].'</td>
                            <td>'.$user['login'].'</td>
                            <td>'.$user['password'].'</td>
                            <td>'.$user['phone'].'</td>
                            <td>
                                <form action="vendor/delete_user.php" method="post">
                                    <input type="hidden" name="ID" value="'.$user['id'].'">
                                    <button type="submit" class=" btn btn-outline-danger"> Удалить </button>
                                </form>
                            </td>
                        </tr>';
            ?>
            
        </tbody>
    </table>
</div>