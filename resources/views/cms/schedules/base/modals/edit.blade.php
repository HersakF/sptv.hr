<div class="modal" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead"></h4>
            </div>
            <form class="form-horizontal push-up-10" id="editItemForm" action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" maxlength="255" placeholder="Title"/>
                        </div>
                        <div class="col-md-12">
                            <label>Linked page</label>
                            <select class="form-control select" data-live-search="true" name="linked_page_url"></select>
                        </div>
                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea name="description" class="ckeditor"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control" maxlength="255" placeholder="Date"/>
                        </div>
                        <div class="col-md-12">
                            <label>Time</label>
                            <input type="time" name="time" class="form-control" maxlength="255" placeholder="Time"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-lg col-md-1 col-md-offset-5 btn-success"><i class="fa fa-check"></i></button>
                    <button type="button" class="btn btn-lg col-md-1 btn-danger" data-dismiss="modal"><i class="fa fa-times"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>