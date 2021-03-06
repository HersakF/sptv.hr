<div class="modal" id="editGalleriesItemModal" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead"></h4>
            </div>
            <form class="form-horizontal push-up-10" id="editGalleriesItemForm" action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" maxlength="255" placeholder="Title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Subtitle</label>
                            <input type="text" name="subtitle" class="form-control" maxlength="255" placeholder="Subtitle"/>
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