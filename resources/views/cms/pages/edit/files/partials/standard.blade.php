@if($page->files->count() > 0)
    <a data-toggle="modal" data-target="#addFilesItemModal" class="btn btn-lg btn-warning minw140 push-down-20"><span class="fa fa-plus white"></span> Datoteka</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-center"><i class="fa fa-file-o"></i></th>
            <th>Datoteka</th>
            <th>Vidljivo</th>
            <th class="text-center"><i class="fa fa-save"></i></th>
            <th class="text-center"><i class="fa fa-pencil"></i></th>
            <th class="text-center"><i class="fa fa-trash"></i></th>
        </tr>
        </thead>
        <tbody id="sortableFiles" style="overflow:auto;">
        @foreach($page->files as $item)
            <tr id="file_{{ $item->id }}">
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
                <td class="col-sm-8">
                    {{ $item->title }}
                </td>
                <td class="col-sm-1 text-center">
                    <select class="form-control select set-files-visibility" id="{{ $item->id }}">
                        <option value="0" @if($item->visibility == 0 ) selected @endif>Ne</option>
                        <option value="1" @if($item->visibility == 1 ) selected @endif>Da</option>
                    </select>
                </td>
                <td class="col-sm-1 text-center">
                    <a href="{{ asset($item->path) }}" target="_blank" class="btn btn-block btn-lg btn-warning">Pogledaj</a>
                </td>
                <td class="col-sm-1">
                    <a data-id="{{ $item->id }}" class="btn btn-block btn-lg btn-info editFilesItem">Uredi</a>
                </td>
                <td class="col-sm-1">
                    <button data-box="#deleteConfirmation" id="{{ $item->id }}" class="btn btn-block btn-lg btn-danger mb-control deleteFilesItem">Obriši</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <a data-toggle="modal" data-target="#addFilesItemModal" class="btn btn-lg btn-warning minw140"><span class="fa fa-plus white"></span> Datoteka</a>
@endif