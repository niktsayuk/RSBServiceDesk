<?php
    session_start();
    require_once 'connect.php';
?>

<div>
    <h3 class="mt-5">Список зарегистрированных пользователей</h3>

    <div class="modal fade " id="add" tabindex="-1" aria-bs-labelledby="busketLabel" aria-bs-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="noWorkLabel">Регистрация нового пользователя</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">							
                    <form action="signup.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        
                        <div class="mt-1 text-center">
                            <label class="form-label">Профиль пользователя</label> 
                            <select class="form-select" aria-label="Пример выбора по умолчанию" name="profile">
                            <?php 
                                $list_profile = mysqli_query($connect, "SELECT * FROM `profile`");

                                while($prof = mysqli_fetch_assoc($list_profile))
                                    echo '<option value="'.$prof['id'].'">'.$prof['name'].'</option>';
                            ?>
                            </select>
                        </div>
                        
                        <div class="mt-2 text-center">
                            <label class="form-label">ФИО</label> 
                            <input  class="form-control" type="text" name="full_name">
                        </div>

                        <div class="mt-2 text-center">
                            <label class="form-label">Логин</label> 
                            <input  class="form-control" type="text" name="login">
                        </div>

                        <div class="mt-2 text-center">
                            <label class="form-label">Пароль</label> 
                            <input class="form-control" type="text" name="password">
                        </div>

                        <div class="mt-2 text-center">
                            <label class="form-label">Телефон</label> 
                            <input class="form-control" type="text" name="phone">
                        </div>

                            <button type="submit" class="btn bg-green rounded text-white px-3 mt-3">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <a href="" class="btn rounded btn-green my-3" data-bs-toggle="modal" data-bs-target="#add">Добавить</a>
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
            </tr>
        </thead>
        <tbody>
            <?php 
                $list_user = mysqli_query($connect, "SELECT users.*, profile.name
                                        FROM `users` RIGHT JOIN `profile` ON users.id_profile=profile.id");

                while($user = mysqli_fetch_assoc($list_user))
                    echo '<tr>
                            <td>'.$user['id'].'</td>
                            <td>'.$user['name'].'</td>
                            <td>'.$user['full_name'].'</td>
                            <td>'.$user['login'].'</td>
                            <td>'.$user['password'].'</td>
                            <td>'.$user['phone'].'</td>
                        </tr>';
            ?>
            
        </tbody>
    </table>
</div>