<div class="modal fade " id="add_client" tabindex="-1" aria-bs-labelledby="busketLabel" aria-bs-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="noWorkLabel">Регистрация нового клиента</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">

                <form action="vendor/add_client.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    
                    <div class="mt-1 text-center">
                        <label class="form-label">Город</label> 
                        <select class="form-select" name="city">
                        <?php 
                            $list_city1 = mysqli_query($connect, "SELECT * FROM `city`");

                            while($city2 = mysqli_fetch_assoc($list_city1))
                                echo '<option value="'.$city2['id'].'">'.$city2['region_city'].'</option>';
                        ?>
                        </select>
                    </div>
                    
                    <div class="mt-2 text-center">
                        <label class="form-label">Мерчант</label> 
                        <input  class="form-control" type="text" name="id_merchant">
                    </div>

                    <div class="mt-2 text-center">
                        <label class="form-label">ИНН</label> 
                        <input  class="form-control" type="text" name="INN">
                    </div>

                    <div class="mt-2 text-center">
                        <label class="form-label">ФИО</label> 
                        <input class="form-control" type="text" name="FIO">
                    </div>

                    <div class="mt-2 text-center">
                        <label class="form-label">Юр. лицо</label> 
                        <input class="form-control" type="text" name="jur_face">
                    </div>

                    <div class="mt-2 text-center">
                        <label class="form-label">Наименование организации</label> 
                        <input class="form-control" type="text" name="company_name">
                    </div>

                    <div class="mt-2 text-center">
                        <label class="form-label">Адрес</label> 
                        <input class="form-control" type="text" name="adress">
                    </div>

                    <div class="mt-2 text-center">
                        <label class="form-label">Контактный телефон</label> 
                        <input class="form-control" type="text" name="phone">
                    </div>

                    <div class="mt-2 text-center">
                        <label class="form-label">Эл. почта</label> 
                        <input class="form-control" type="text" name="mail">
                    </div>

                    <div class="mt-2 text-center">
                        <label class="form-label">Логин</label> 
                        <input class="form-control" type="text" name="login">
                    </div>

                    <div class="mt-2 text-center">
                        <label class="form-label">Пароль</label> 
                        <input class="form-control" type="text" name="password">
                    </div>

                        <button type="submit" class="btn bg-green rounded text-white px-3 mt-3">Зарегистрировать</button>
                </form>
            </div>
        </div>
    </div>
</div>