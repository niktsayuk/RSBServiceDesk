<div class="modal fade " id="add" tabindex="-1" aria-bs-labelledby="busketLabel" aria-bs-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="noWorkLabel">Регистрация нового пользователя</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">

                    <form action="vendor/signup.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        
                        <div class="mt-1 text-center">
                            <label class="form-label">Профиль пользователя</label> 
                            <select class="form-select" aria-label="Пример выбора по умолчанию" name="profile">
                            <?php 
                                $list_profile = mysqli_query($connect, $all_profile);

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