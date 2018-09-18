<div class="panel panel-colorful">
    <div class="panel-heading">
        <div class="panel-title-box">
            <h3>Files</h3>
        </div>
    </div>
    <div class="panel-body">
        <a data-toggle="modal" data-target="#addItemModal" class="btn btn-lg btn-warning"><span class="fa fa-plus white"></span> Files</a>
    </div>
    @if($items->count() > 0)
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center"><i class="fa fa-file-o"></i></th>
                    <th>File</th>
                    <th>Visibility</th>
                    <th class="text-center"><i class="fa fa-eye"></i></th>
                    <th class="text-center"><i class="fa fa-copy"></i></th>
                    <th class="text-center"><i class="fa fa-pencil"></i></th>
                    <th class="text-center"><i class="fa fa-trash"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="col-sm-1 text-center">
                            @if(File::extension($item->path) == 'pdf')
                                <i class="fa fa-file-pdf-o fa-2x"></i>
                            @elseif(File::extension($item->path) == 'doc' || File::extension($item->path) == 'docx')
                                <i class="fa fa-file-word-o fa-2x"></i>
                            @elseif(File::extension($item->path) == 'xls' || File::extension($item->path) == 'xlsx')
                                <i class="fa fa-file-excel-o fa-2x"></i>
                            @elseif(File::extension($item->path) == 'ppt' || File::extension($item->path) == 'pptx')
                                <i class="fa fa-file-powerpoint-o fa-2x"></i>
                            @elseif(File::extension($item->path) == 'txt')
                                <i class="fa fa-file-text-o fa-2x"></i>
                            @endif
                        </td>
                        <td class="col-sm-6">
                            {{ $item->title }}
                            @if($item->pages != null)
                                <span class="small-info">
                                    <a href="{{ url('/cms/pages/'.$item->pages->id.'/edit') }}">{{ $item->pages->title }}</a>
                                </span>
                            @else
                                <span class="small-info">Free</span>
                            @endif
                        </td>
                        <td class="col-sm-1 text-center">
                            <select class="form-control select set-visibility" id="{{ $item->id }}">
                                <option value="0" @if($item->visibility == 0 ) selected @endif>Hidden</option>
                                <option value="1" @if($item->visibility == 1 ) selected @endif>Shown</option>
                            </select>
                        </td>
                        <td class="col-sm-1 text-center">
                            <a href="{{ asset($item->path) }}" target="_blank" class="btn btn-block btn-lg btn-default">Open</a>
                        </td>
                        <td class="col-sm-1 text-center">
                            <button type="button" data-path="{{ asset($item->path) }}" class="btn btn-block btn-lg btn-warning btn-copy-to-clipboard">Copy</button>
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