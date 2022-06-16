<div class="modal fade " id="add_city" tabindex="-1" aria-bs-labelledby="busketLabel" aria-bs-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="noWorkLabel">Регистрация нового города</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">

                    <form action="vendor/add_city.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

                        <div class="mt-2 text-center">
                            <label class="form-label">РЦ (Регион)</label> 
                            <input  class="form-control" type="text" name="RC">
                        </div>

                        <div class="mt-2 text-center">
                            <label class="form-label">РП (Город)</label> 
                            <input  class="form-control" type="text" name="RP">
                        </div>

                            <button type="submit" class="btn bg-green rounded text-white px-3 mt-3">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>