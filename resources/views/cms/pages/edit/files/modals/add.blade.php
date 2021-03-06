<div class="modal" id="addFilesItemModal" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Nova datoteka</h4>
            </div>
            <form class="form-horizontal push-up-10" action="/cms/files" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="page_id" value="{{ $page->id }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Naziv</label>
                            <input type="text" name="title" class="form-control" maxlength="255" placeholder="Naziv" oninvalid="this.setCustomValidity('Molimo ispunite polje.')" oninput="setCustomValidity('')" required/>
                        </div>
                        <div class="col-md-12">
                            <label>Datoteke</label>
                            <input type="file" multiple name="files[]" class="files" title="Pretraži..." accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" oninvalid="this.setCustomValidity('Molimo ispunite polje.')" oninput="setCustomValidity('')" required/>
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