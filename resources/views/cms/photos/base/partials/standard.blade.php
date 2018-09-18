<div class="panel panel-colorful">
    <div class="panel-heading">
        <div class="panel-title-box">
            <h3>Photos</h3>
        </div>
    </div>
    <div class="panel-body">
        <a data-toggle="modal" data-target="#addItemModal" class="btn btn-lg btn-warning"><span class="fa fa-plus white"></span> Photo</a>
    </div>
    @if($items->count() > 0)
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center"><i class="fa fa-camera"></i></th>
                    <th>Caption</th>
                    <th>Alt</th>
                    <th>Source</th>
                    <th class="text-center"><i class="fa fa-pencil"></i></th>
                    <th class="text-center"><i class="fa fa-trash"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="col-sm-1">
                            <a data-id="{{ $item->id }}" class="editItem">
                                <div class="img-box">
                                    <img src="{{ asset($item->path) }}" class="img-table">
                                </div>
                            </a>
                        </td>
                        <td class="col-sm-3">
                            {{ $item->caption }}
                        </td>
                        <td class="col-sm-3">
                            {{ $item->alt }}
                        </td>
                        <td class="col-sm-3">
                            {{ $item->source }}
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
            <div class="text-center">
                {{ $items->links() }}
            </div>
        </div>
    @endif
</div>