<div class="modal fade" id="add_news" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавление новости</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="vendor/add_news.php" method="post" enctype="multipart/form-data">
                    <div class="mt-2 text-center">
                        <label class="form-label">Тема новости</label> 
                        <input  class="form-control" type="text" name="title">
                    </div>

                    <div class="mt-2 text-center">
                        <label class="form-label">Описание</label> 
                        <textarea  class="form-control" name="description" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn bg-green rounded text-white px-3 mt-3">Опубликовать</button>
                </form>
                
            </div>
        </div>
    </div>
</div>