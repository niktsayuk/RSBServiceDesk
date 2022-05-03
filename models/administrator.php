<?php
    session_start();
    require_once 'vendor/connect.php';
    require_once 'vendor/data_sql.php';
?>

<div>
    <?php include('models/modal_register.php') ?>
    <?php include('models/modal_city.php') ?>
    <?php include('models/modal_news.php') ?>
    <?php 
        if(isset($_GET['send']) && isset( $_SESSION['message'])) 
            echo "<script> new Tost({
                title: false,
                text: '".$_SESSION['message']."',
                theme: 'light',
                autohide: true,
                interval: 5000
              }); </script>"; 
    ?>

    <div class="d-flex bg-white p-3 mb-3">
        <a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_worker">Добавить сотрудника</a>
        <a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_city">Добавить город</a>
        <a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_categories">Добавить категории</a>
        <a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_news">Добавить новость</a>
    </div>

    <div class="bg-white p-3">
        <h4 class="mt-3">Список зарегистрированных сотрудников</h4>

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
                    $list_user = mysqli_query($connect, $_SELECT_USER_PROFILE);

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

    <div class="bg-white p-3 mt-3">
        <h4 class="mt-3">Новости платформы</h4>

        <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col" >Номер</th>
                            <th scope="col" >Тема</th>
                            <th scope="col" >Описание</th>
                            <th scope="col" >Дата</th>
                            <th scope="col" >Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            $list_news = mysqli_query($connect, "SELECT * FROM `news` ORDER BY id DESC");
                            while($news = mysqli_fetch_assoc($list_news))
                            {
                                echo '<tr>
                                    <td>'.$news['id'].'</td>
                                    <td>'.$news['title'].'</td>
                                    <td>'.$news['description'].'</td>
                                    <td>'.$news['date'].'</td>

                                    <td class="d-flex">
                                        <form action="vendor/delete_news.php" method="post">
                                            <input type="hidden" name="ID" value="'.$news['id'].'">
                                            <button type="submit" class="mx-2 btn btn-danger"> Удалить </button>
                                        </form>
                                    </td>
                                </tr>';
                            }  
                        ?>
                    </tbody>
                </table>
    </div>
        
    </div>
    
</div>