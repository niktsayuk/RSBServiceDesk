<?php
    session_start();
    require_once 'vendor/connect.php'; 
?>

<div>
    <h3 class="my-5">Активные заявки</h3>
        

        <?php
            $today = date("m.d.y");  
            $list_task = mysqli_query($connect, "SELECT task.id_categories, categories.*
                                        FROM `task` RIGHT JOIN `categories` ON task.id_categories=categories.id");
            while($task = mysqli_fetch_assoc($list_task))
            {
                if($task['id_categories']==$task['id'])
                    echo '<h4 class="mt-5">'.$task['name'].'</h4>';
                
                
                $list_task_second = mysqli_query($connect, "SELECT task.*, users.full_name
                            FROM `task` RIGHT JOIN `users` ON task.id_user=users.id");

                while($task_second = mysqli_fetch_assoc($list_task_second))
                {                    
                    if($task_second['id_categories'] == $task['id'] and $task['id_user']==$_SESSION['user']['id'])
                    {
                        echo '<table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">ID заявки</th>
                                        <th scope="col">ID терминала</th>
                                        <th scope="col">Дата создания</th>
                                        <th scope="col">Ответственный</th>
                                        <th scope="col">Дата изменения</th>
                                        <th scope="col">Автор изменения</th>
                                        <th scope="col">Описание</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>'.$task_second['id'].'</td>
                                        <td>'.$task_second['terminal_id'].'</td>
                                        <td>'.$today.'</td>
                                        <td>Цаюк Н. С.</td>
                                        <td>'.$today.'</td>
                                        <td>'.$task_second['full_name'].'</td>
                                        <td>'.$task_second['description'].'</td>
                                    </tr>
                                </tbody>
                            </table>';
                    } 
                }
            }
        ?>
</div>
