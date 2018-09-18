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
                            <label>Full name</label>
                            <input type="text" name="name" class="form-control" maxlength="255" placeholder="Full name" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
                        </div>
                        <div class="col-md-12">
                            <label>E-mail</label>
                            <input type="text" name="email" class="form-control" maxlength="255" placeholder="E-mail" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
                        </div>
                        <div class="col-md-12">
                            <label>Category</label>
                            <select class="form-control select" name="role">
                                <option value="superadministrator">Superadministrator</option>
                                <option value="administrator">Administrator</option>
                            </select>
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