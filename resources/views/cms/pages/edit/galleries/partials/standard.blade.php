@if($page->galleries->count() > 0)
    @foreach($page->galleries as $gallery)
        <a data-toggle="modal" data-target="#addGalleriesFragmentsModal" class="btn btn-lg btn-warning minw140 push-down-20"><span class="fa fa-plus white"></span> Photo</a>

        @if($gallery->galleries_fragments->count() > 0)
            <button class="btn btn-lg btn-default set-galleries-visibility minw140  push-down-20" id="{{ $gallery->id }}" value="{{ $gallery->visibility }}">@if($gallery->visibility == 0) <i class="fa fa-eye-slash"></i> Hidden @else <i class="fa fa-eye"></i> Shown @endif</button>
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
                @foreach($gallery->galleries_fragments as $item)
                    <tr id="gafr_{{ $item->id }}">
                        <td class="col-sm-1">
                            <a data-id="{{ $item->id }}" class="editGalleriesItem">
                                <div class="img-box">
                                    <img src="{{ asset($item->photos->path) }}" class="img-table">
                                </div>
                            </a>
                        </td>
                        <td class="col-sm-4">
                            {{ $item->title }}
                        </td>
                        <td class="col-sm-4">
                            {{ $item->subtitle }}
                        </td>
                        <td class="col-sm-1 text-center">
                            <select class="form-control select set-galleries-fragments-visibility" id="{{ $item->id }}">
                                <option value="0" @if($item->visibility == 0 ) selected @endif>Hidden</option>
                                <option value="1" @if($item->visibility == 1 ) selected @endif>Shown</option>
                            </select>
                        </td>
                        <td class="col-sm-1">
                            <a data-id="{{ $item->id }}" class="btn btn-block btn-lg btn-info editGalleriesItem">Edit</a>
                        </td>
                        <td class="col-sm-1">
                            <button type="button" class="btn btn-block btn-lg btn-danger mb-control deleteGalleriesItem" data-box="#deleteConfirmation" id="{{ $item->id }}">Remove</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
@else
    <a data-toggle="modal" data-target="#addGalleriesItemModal" class="btn btn-lg btn-warning minw140"><span class="fa fa-plus white"></span> Photo</a>
@endif