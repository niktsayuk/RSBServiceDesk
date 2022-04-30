<?php
    session_start();
    require_once 'vendor/connect.php';
    require_once 'vendor/data_sql.php';
?>

<div>
    <?php include('models/modal_register.php') ?>

    <div class="d-flex my-3">
        <a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_worker">Добавить сотрудника</a>
        <a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_city">Добавить город</a>
        <a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_categories">Добавить категории</a>
        <a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_categories">Добавить новость</a>
    </div>
    
    <h4 class="mt-5">Список зарегистрированных сотрудников</h4>

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
                $list_user = mysqli_query($connect, $sa_user_to_id_profile);

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