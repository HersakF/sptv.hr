<div class="panel panel-colorful">
    <div class="panel-heading">
        <div class="panel-title-box">
            <h3>{{ $currentParent->title }}</h3>
        </div>
    </div>
    <div class="panel-body">
        <a data-toggle="modal" data-target="#addItem" class="btn btn-lg btn-warning"><span class="fa fa-plus white"></span> Page</a>
    </div>
    @if($items->count() > 0)
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center"><i class="fa fa-camera"></i></th>
                    <th>Page</th>
                    <th>Category</th>
                    <th>Visibility</th>
                    @if($user->role == 'superadministrator')<th>Navigation</th>@endif
                    @if($user->role == 'superadministrator')<th>Multiplicity</th>@endif
                    @if($user->role == 'superadministrator')<th>Removability</th>@endif
                    @if($user->role == 'superadministrator')<th>Sortability</th>@endif
                    <th class="text-center"><i class="fa fa-paperclip"></i></th>
                    <th class="text-center"><i class="fa fa-pencil"></i></th>
                    <th class="text-center"><i class="fa fa-trash"></i></th>
                </tr>
                </thead>
                <tbody @if(($currentPage->sortability == 1)) id="sortablePages" @endif style="overflow:auto;">
                @foreach($items as $item)
                    <tr id="page_{{ $item->id }}">
                        <td class="col-sm-1 text-center">
                            @if($item->carousels->count() > 0)
                                @foreach($item->carousels as $carousel)
                                    @if($carousel->carousels_fragments->count() > 0)
                                        @foreach($carousel->carousels_fragments as $fragment)
                                            <div class="img-box">
                                                <img src="{{ asset($fragment->photos->path) }}" class="img-table">
                                            </div>
                                            @break
                                        @endforeach
                                    @else
                                        <div class="img-box">
                                            <img src="{{ asset('cms/joli/img/no-img.jpg') }}" class="img-table">
                                        </div>
                                    @endif
                                    @break
                                @endforeach
                            @else
                                <div class="img-box">
                                    <img src="{{ asset('cms/joli/img/no-img.jpg') }}" class="img-table">
                                </div>
                            @endif
                        </td>
                        <td class="col-sm-2">
                            {{ $item->title }}
                            @if($item->type)<span class="small-info">Slog - {{ $item->type }}</span>@endif
                        </td>
                        <td class="col-sm-2">
                            @if( $item->category == 'base')
                                Home
                            @elseif( $item->category == 'programs' )
                                Program
                            @elseif( $item->category == 'shows' )
                                Shows
                            @elseif( $item->category == 'news' )
                                News
                            @elseif( $item->category == 'stories' )
                                Stories
                            @elseif( $item->category == 'highlights' )
                                Highlights
                            @elseif( $item->category == 'about' )
                                About
                            @elseif( $item->category == 'contact' )
                                Contact
                            @elseif( $item->category == 'livestream' )
                                Livestream
                            @elseif( $item->category == 'terms-of-use' )
                                Terms of use
                            @endif
                        </td>
                        <td class="col-sm-1 text-center">
                            <select class="form-control select set-visibility" id="{{ $item->id }}" @if( $item->category == 'base') disabled @endif>
                                <option value="0" @if($item->visibility == 0 ) selected @endif>Hidden</option>
                                <option value="1" @if($item->visibility == 1 ) selected @endif>Shown</option>
                            </select>
                        </td>
                        @if($user->role == 'superadministrator')
                        <td class="col-sm-1">
                            <select class="form-control select set-navigation" id="{{ $item->id }}" value="{{ $item->navigation }}" @if( $item->category == 'base') disabled @endif>
                                <option value="out" @if($item->navigation == 'out' ) selected @endif>Out</option>
                                <option value="main" @if($item->navigation == 'main' ) selected @endif>Main</option>
                            </select>
                        </td>
                        <td class="col-sm-1 text-center">
                            <select class="form-control select set-multiplicity" id="{{ $item->id }}" @if( $item->category == 'base') disabled @endif>
                                <option value="0" @if($item->multiplicity == 0 ) selected @endif>No</option>
                                <option value="1" @if($item->multiplicity == 1 ) selected @endif>Yes</option>
                            </select>
                        </td>
                        <td class="col-sm-1 text-center">
                            <select class="form-control select set-removability" id="{{ $item->id }}" @if( $item->category == 'base') disabled @endif>
                                <option value="0" @if($item->removability == 0 ) selected @endif>No</option>
                                <option value="1" @if($item->removability == 1 ) selected @endif>Yes</option>
                            </select>
                        </td>
                        <td class="col-sm-1 text-center">
                            <select class="form-control select set-sortability" id="{{ $item->id }}" @if( $item->category == 'base') disabled @endif>
                                <option value="0" @if($item->sortability == 0 ) selected @endif>Disabled</option>
                                <option value="1" @if($item->sortability == 1 ) selected @endif>Enabled</option>
                            </select>
                        </td>
                        @endif
                        <td class="col-sm-1">
                            <a class="btn btn-block btn-lg btn-success active editItemSubpages @if($item->multiplicity == 0 ) disabled @endif" href="/cms/pages/subpages/{{ $item->id }}">Pages</a>
                        </td>
                        <td class="col-sm-1">
                            <a class="btn btn-block btn-lg btn-info active" href="/cms/pages/{{ $item->id }}/edit">Edit</a>
                        </td>
                        <td class="col-sm-1">
                            <button type="button" class="btn btn-block btn-lg btn-danger mb-control deleteItem @if($item->removability == 0 ) disabled @endif" data-box="#deleteConfirmation" id="{{ $item->id }}">Remove</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center paginator" data-paginator="{{ $items->currentPage() }}">
                {{ $items->links() }}
            </div>
        </div>
    @endif
</div>