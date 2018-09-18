<div class="panel panel-colorful">
    <div class="panel-heading">
        <div class="panel-title-box">
            <h3>{{ $gallery->title }}</h3>
        </div>
    </div>
    <div class="panel-body">
        <a data-toggle="modal" data-target="#addItem" class="btn btn-lg btn-warning"><span class="fa fa-plus white"></span> Photos</a>
    </div>

    @if($items->galleries_fragments->count() > 0)
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center"><i class="fa fa-camera"></i></th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Visibility</th>
                    <th class="text-center"><i class="fa fa-pencil"></i></th>
                    <th class="text-center"><i class="fa fa-trash"></i></th>
                </tr>
                </thead>
                <tbody id="sortableGalleriesFragments" style="overflow:auto;">
                @foreach($items->galleries_fragments as $item)
                    <tr id="cafr_{{ $item->id }}">
                        <td class="col-sm-1">
                            <div class="img-box">
                                <img src="{{ asset($item->photos->path) }}" class="img-table">
                            </div>
                        </td>
                        <td class="col-sm-4">
                            {{ $item->title }}
                        </td>
                        <td class="col-sm-4">
                            {{ $item->subtitle }}
                        </td>
                        <td class="col-sm-1 text-center">
                            <select class="form-control select set-visibility" id="{{ $item->id }}">
                                <option value="0" @if($item->visibility == 0 ) selected @endif>Hidden</option>
                                <option value="1" @if($item->visibility == 1 ) selected @endif>Shown</option>
                            </select>
                        </td>
                        <td class="col-sm-1">
                            <a data-id="{{ $item->id }}" class="btn btn-block btn-lg btn-info editItem">Edit</a>
                        </td>
                        <td class="col-sm-1">
                            <button type="button" class="btn btn-block btn-lg btn-danger mb-control deleteItem" data-box="#deleteConfirmation" id="{{ $item->id }}">Remove</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>