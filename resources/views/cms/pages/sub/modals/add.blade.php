<div class="modal" id="addItem" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Nova stranica</h4>
            </div>
            <form class="form-horizontal push-up-10" action="/cms/pages" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="author" value="{{ $user->name }}">
                    <input type="hidden" name="page_id" value="{{ $currentParent->id }}">
                    <input type="hidden" name="category" value="{{ $currentParent->category }}">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Title</label>
                            <input type="text" name="title" maxlength="255" class="form-control" placeholder="Title" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
                        </div>
                        <div class="col-md-12">
                            <label>Subtitle</label>
                            <input type="text" name="subtitle" maxlength="255" class="form-control" placeholder="Subtitle"/>
                        </div>
                        <div class="col-md-12">
                            <label>Slug</label>
                            <input type="text" name="url" maxlength="255" class="form-control" placeholder="Slug" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
                        </div>
                        @if($parent->category == 'highlights')
                            <div class="col-md-12">
                                <label>Released at</label>
                                <input type="date" name="released_at" class="form-control" placeholder="Released at" value="{{ Carbon\Carbon::now('Europe/Zagreb')->toDateString() }}" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
                            </div>
                            <div class="col-md-12">
                                <label>Emitted at</label>
                                <input type="date" name="emitted_at" class="form-control" placeholder="Emitted at" value="{{ Carbon\Carbon::now('Europe/Zagreb')->toDateString() }}" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
                            </div>
                        @else
                            <input type="hidden" name="emitted_at" value="{{ Carbon\Carbon::now('Europe/Zagreb')->toDateString() }}"/>
                            <input type="hidden" name="released_at" value="{{ Carbon\Carbon::now('Europe/Zagreb')->toDateString() }}"/>
                        @endif
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