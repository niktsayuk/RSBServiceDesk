<div class="modal fade " id="select_city" tabindex="-1" aria-bs-labelledby="busketLabel" aria-bs-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="noWorkLabel">Выбрать город</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body d-flex flex-column bd-highlight mb-3">
                    <?php 
                        $list_city = mysqli_query($connect, "SELECT * FROM `city` ORDER BY id DESC");
                        while($city = mysqli_fetch_assoc($list_city))
                        {

                            echo '<button type="submit" OnClick="SelectCity()" class="btn text-start"></button>
                                <input type="button" class="btn text-start" value="РП '.$city['region_city'].'" OnClick="SelectCity(this.value)">';
                        }  
                    ?>
                </div>
            </div>
        </div>
    </div>