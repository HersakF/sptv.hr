<div class="modal" id="addGalleriesItemModal" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">New gallery</h4>
            </div>
            <form class="form-horizontal push-up-10" action="/cms/galleries" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="page_id" value="{{ $page->id }}">
                    <input type="hidden" name="title" value="{{ $page->title }}">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Photos</label>
                            <input type="file" multiple name="photos[]" class="files" title="Search..." accept="image/*" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
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