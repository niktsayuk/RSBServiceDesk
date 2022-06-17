<?php
    session_start();
    require_once 'vendor/connect.php'; 
    
?>

<div class="bg-white p-3">
    <a href="" class="btn rounded btn-green mb-5" data-bs-toggle="modal" data-bs-target="#add_task">Cоздать заявку</a>

    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">Номер</th>
                <th scope="col">Категория</th>
                <th scope="col">ID терминала</th>
                <th scope="col" style="width:15%">Описание</th>
                <th scope="col">Дата</th>
                <th scope="col">Обработка</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                    $list_task1 = mysqli_query($connect, "SELECT task.*, categories.name FROM `task` JOIN `categories` ON task.id_categories=categories.id");
                if (mysqli_num_rows($list_task1) > 0)
                while($task2 = mysqli_fetch_assoc($list_task1))
                    {
                        echo '<tr>
                        <td>'.$task2['id'].'</td>
                        <td>'.$task2['name'].'</td>
                        <td>'.$task2['id_terminal'].'</td>
                        <td>'.$task2['description'].'</td>
                        <td>'.$task2['date'].'</td>
                        <td>В работе</td>
                        
                    </tr>';
                    }  
                    else
                    {
                    
            ?>
        </tbody>
    </table>
    <?php
    echo '<h2 class="text-center pt-3" style="color: silver"> Тут пока что нет заявок </h2>';
}
    ?>
</div>
