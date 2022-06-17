<div>
	<div class="d-flex bg-white p-3 mb-3">
		<a class="btn rounded btn-green mx-2" data-bs-toggle="modal" data-bs-target="#add_task">Создать заявку</a>
	</div>    

    <div class="accordion" id="accordionExample">

        <div class="accordion-item">
            <h1 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                    Список активных заявок
                </button>
            </h1>
            <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
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
                                 $list_task1 = mysqli_query($connect, "SELECT task.id, categories.name, task.id_user, task.id_terminal, task.description, task.date, task.action  FROM `task` JOIN `categories` ON task.id_categories=categories.id");

                                while($task2 = mysqli_fetch_assoc($list_task1))
                                    if ($task2['id_user'] == $_SESSION['user']['id_user'] && $task2['action'] == 0)
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
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item mt-3">
            <h1 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    Список закрытых заявок
                </button>
            </h1>
            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Данные о завершённых заявках хранятся 30 дней, если Вам требуются данные по более поздним заявкам, обратитесь к менеджерам</p>
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
                                $list_task = mysqli_query($connect, "SELECT task.id, categories.name, task.id_user, task.id_terminal, task.description, task.date, task.action  FROM `task` JOIN `categories` ON task.id_categories=categories.id");

                                while($task = mysqli_fetch_assoc($list_task))
                                {
                                    if ($task['id_user'] == $_SESSION['user']['id_user'] && $task['action'] == 1)
                                    {
                                        echo '<tr>
                                        <td>'.$task['id'].'</td>
                                        <td>'.$task['name'].'</td>
                                        <td>'.$task['id_terminal'].'</td>
                                        <td>'.$task['description'].'</td>
                                        <td>'.$task['date'].'</td>
                                        <td>Выполнена</td>
                                        
                                    </tr>';
                                    }
                                } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
