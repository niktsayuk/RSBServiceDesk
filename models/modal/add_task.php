<div class="modal fade " id="add_task" tabindex="-1" aria-bs-labelledby="busketLabel" aria-bs-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="noWorkLabel">Создание новой заявки</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">

                <form action="vendor/add_task.php" method="post">

                    <div class="mt-1 text-center">
                        <label class="form-label">Категория заявки</label> 
                        <select class="form-select" aria-label="Пример выбора по умолчанию" name="categories">
                        <?php 
                            $list_profile = mysqli_query($connect, $all_categories);

                            while($prof = mysqli_fetch_assoc($list_profile))
                                echo '<option value="'.$prof['id'].'">'.$prof['name'].'</option>';
                        ?>
                        </select>
                    </div>

                    <div class="mt-2 text-center">
                        <label class="form-label">ID терминала</label> 
                        <input  class="form-control" type="text" name="ID_terminal">
                    </div>
                    
                    <div class="mt-2 text-center">
                        <label class="form-label">Описание ситуации</label> 
                        <textarea  class="form-control" name="description" rows="3"></textarea>
                    </div>

                    

                        <button type="submit" class="btn bg-green rounded text-white px-3 mt-3">Зарегистрировать</button>
                </form>
            </div>
        </div>
    </div>
</div>