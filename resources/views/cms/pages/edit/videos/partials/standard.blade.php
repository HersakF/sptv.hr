@if($page->videos->count() > 0)
    <a data-toggle="modal" data-target="#addVideosItemModal" class="btn btn-lg btn-warning minw140 push-down-20"><span class="fa fa-plus white"></span> Video</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-center"><i class="fa fa-camera"></i></th>
            <th>Video</th>
            <th>Vidljivo</th>
            <th class="text-center"><i class="fa fa-desktop"></i></th>
            <th class="text-center"><i class="fa fa-pencil"></i></th>
            <th class="text-center"><i class="fa fa-trash"></i></th>
        </tr>
        </thead>
        <tbody id="sortableVideos" style="overflow:auto;">
        @foreach($page->videos as $item)
            <tr id="vide_{{ $item->id }}">
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
                </td>
                <td class="col-sm-1 text-center">
                    <select class="form-control select set-videos-visibility" id="{{ $item->id }}">
                        <option value="0" @if($item->visibility == 0 ) selected @endif>Ne</option>
                        <option value="1" @if($item->visibility == 1 ) selected @endif>Da</option>
                    </select>
                </td>
                <td class="col-sm-1">
                    <a class="btn btn-block btn-lg btn-warning @if($item->standard_url == null) disabled @endif" href="{{ $item->standard_url }}" target="_blank">Pogledaj</a>
                </td>
                <td class="col-sm-1">
                    <a data-id="{{ $item->id }}" class="btn btn-block btn-lg btn-info editVideosItem">Uredi</a>
                </td>
                <td class="col-sm-1">
                    <button type="button" class="btn btn-block btn-lg btn-danger mb-control deleteVideosItem" data-box="#deleteConfirmation" id="{{ $item->id }}">Obriši</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <a data-toggle="modal" data-target="#addVideosItemModal" class="btn btn-lg btn-warning minw140"><span class="fa fa-plus white"></span> Video</a>
@endif