<?php
    session_start();
    require_once 'vendor/connect.php'; 
?>

<div>
    <h3 class="my-5">Активные заявки</h3>

    <!--<div class="modal fade" id="add_task" tabindex="-1" aria-bs-labelledby="busketLabel" aria-bs-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="noWorkLabel">Регистрация новой заявки</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">							
                    <form action="signup.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        
                        <div class="mt-1 text-center">
                            <label class="form-label">Категория задачи</label> 
                            <select class="form-select" aria-label="Пример выбора по умолчанию" name="id_categories">
                           
                            </select>
                        </div>

                        <div class="mt-1 text-center">
                            <label class="form-label">пользователь</label> 
                            <select class="form-select" aria-label="Пример выбора по умолчанию" name="id_user">
                            
                            </select>
                        </div>

                        <div class="mt-2 text-center">
                            <label class="form-label">Описание задачи</label> 
                            <input  class="form-control" type="text" name="description">
                        </div>
                        
                        <div class="mt-2 text-center">
                            <label class="form-label">ID терминала</label> 
                            <input  class="form-control" type="text" name="terminal_id">
                        </div>

                        <div class="mt-2 text-center">
                            <label class="form-label">Мерчант</label> 
                            <input  class="form-control" type="text" name="merchant">
                        </div>

                        <div class="mt-2 text-center">
                            <label class="form-label">Название компании</label> 
                            <input class="form-control" type="text" name="company_name">
                        </div>

                        <div class="mt-2 text-center">
                            <label class="form-label">Адрес</label> 
                            <input class="form-control" type="text" name="address">
                        </div>

                        <div class="mt-2 text-center">
                            <label class="form-label">Телефон</label> 
                            <input class="form-control" type="text" name="phone">
                        </div>

                            <button type="submit" class="btn bg-green rounded text-white px-3 mt-3">Создать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>-->
    <a href="" class="btn rounded btn-green my-3" data-bs-toggle="modal" data-bs-target="#add_task">Cоздать заявку</a>
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
                    if($task_second['id_categories'] == $task['id'])
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
