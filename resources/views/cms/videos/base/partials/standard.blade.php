<div class="panel panel-colorful">
    <div class="panel-heading">
        <div class="panel-title-box">
            <h3>Videos</h3>
        </div>
    </div>
    <div class="panel-body">
        <a data-toggle="modal" data-target="#addItemModal" class="btn btn-lg btn-warning"><span class="fa fa-plus white"></span> Video</a>
    </div>
    @if($items->count() > 0)
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center"><i class="fa fa-camera"></i></th>
                    <th>Video</th>
                    <th>Visibility</th>
                    <th class="text-center"><i class="fa fa-desktop"></i></th>
                    <th class="text-center"><i class="fa fa-pencil"></i></th>
                    <th class="text-center"><i class="fa fa-trash"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="col-sm-1">
                            <div class="img-box">
                                <a href="{{ $item->standard_url }}" target="_blank">
                                    @if($item->host == "www.youtube.com")
                                        <img class="img-table" src="https://i1.ytimg.com/vi/{{ $item->host_id }}/default.jpg">
                                    @elseif($item->host == "vimeo.com")
                                        @php
                                            $xml = simplexml_load_file("http://vimeo.com/api/v2/video/".$item->host_id.".xml");
                                            $image_thumbnail = $xml->video->thumbnail_large;
                                        @endphp
                                        <img class="img-table" src="{{ $image_thumbnail }}">
                                    @endif
                                </a>
                            </div>
                        </td>
                        <td class="col-sm-7">
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
                        <td class="col-sm-1">
                            <a class="btn btn-block btn-lg btn-warning @if($item->standard_url == null) disabled @endif" href="{{ $item->standard_url }}" target="_blank">Watch</a>
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