<div class="modal" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">New photos</h4>
            </div>

            <div class="newPhoto">
                <form class="form-horizontal" action="/cms/photos" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Caption</label>
                                <input type="text" name="caption" maxlength="255" class="form-control" placeholder="Caption"/>
                            </div>
                            <div class="col-md-12">
                                <label>Alt</label>
                                <input type="text" name="alt" maxlength="255" class="form-control" placeholder="Alt"/>
                            </div>
                            <div class="col-md-12">
                                <label>Source</label>
                                <input type="text" name="source" maxlength="255" class="form-control" placeholder="Source"/>
                            </div>
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
</div>