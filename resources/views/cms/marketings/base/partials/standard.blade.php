<div class="panel panel-colorful">
    <div class="panel-heading">
        <div class="panel-title-box">
            <h3>Marketings</h3>
        </div>
    </div>
    <div class="panel-body">
        <a data-toggle="modal" data-target="#addItemModal" class="btn btn-lg btn-warning"><span class="fa fa-plus white"></span> Advert</a>
    </div>
    @if($items->count() > 0)
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center"><i class="fa fa-camera"></i></th>
                    <th>Advert</th>
                    <th>Visibility</th>
                    <th class="text-center"><i class="fa fa-desktop"></i></th>
                    <th class="text-center"><i class="fa fa-pencil"></i></th>
                    <th class="text-center"><i class="fa fa-trash"></i></th>
                </tr>
                </thead>
                <tbody id="sortableMarketings" style="overflow:auto;">
                @foreach($items as $item)
                    <tr id="adve_{{ $item->id }}">
                        <td class="col-sm-1">
                            <div class="img-box">
                                @if($item->photos != null)
                                    <img src="{{ asset($item->photos->path) }}" class="img-table editItemPhoto" data-photo-id="{{ $item->photos->id }}"/>
                                @else
                                    <img src="{{ asset('cms/joli/img/no-img.jpg') }}" class="img-table"/>
                                @endif
                            </div>
                        </td>
                        <td class="col-sm-7">
                            {{ $item->title }}
                        </td>
                        <td class="col-sm-1 text-center">
                            <select class="form-control select set-visibility" id="{{ $item->id }}">
                                <option value="0" @if($item->visibility == 0 ) selected @endif>Hidden</option>
                                <option value="1" @if($item->visibility == 1 ) selected @endif>Shown</option>
                            </select>
                        </td>
                        <td class="col-sm-1">
                            <a class="btn btn-block btn-lg btn-default @if($item->url == null) disabled @endif" href="{{ $item->url }}" target="_blank">Web</a>
                        </td>
                        <td class="col-sm-1">
                            <a data-id="{{ $item->id }}" class="btn btn-block btn-lg btn-info editItem">Edit</a>
                        </td>
                        <td class="col-sm-1">
                            <button data-box="#deleteConfirmation" id="{{ $item->id }}" class="btn btn-block btn-lg btn-danger mb-control deleteItem">Remove</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $items->links() }}
            </div>
        </div>
    @endif
</div>