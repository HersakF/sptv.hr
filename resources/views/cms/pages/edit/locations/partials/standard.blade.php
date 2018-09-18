@if($page->locations->count() > 0)
    @if($page->locations->count() > 1)
        <a data-toggle="modal" data-target="#addLocationsItemModal" class="btn btn-lg btn-warning minw140 push-down-20"><span class="fa fa-plus white"></span> Location</a>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-center"><i class="fa fa-map-marker"></i></th>
            <th>Location</th>
            <th>Address</th>
            <th>Visibility</th>
            <th class="text-center"><i class="fa fa-pencil"></i></th>
            <th class="text-center"><i class="fa fa-trash"></i></th>
        </tr>
        </thead>
        <tbody id="sortableLocations" style="overflow:auto;">
        @foreach($page->locations as $item)
            <tr id="loca_{{ $item->id }}">
                <td class="col-sm-1 text-center">
                    <i class="fa fa-map-marker fa-2x"></i>
                </td>
                <td class="col-sm-4">
                    {{ $item->title }}
                </td>
                <td class="col-sm-4">
                    {{ $item->address }}
                </td>
                <td class="col-sm-1 text-center">
                    <select class="form-control select set-locations-visibility" id="{{ $item->id }}">
                        <option value="0" @if($item->visibility == 0 ) selected @endif>Hidden</option>
                        <option value="1" @if($item->visibility == 1 ) selected @endif>Shown</option>
                    </select>
                </td>
                <td class="col-sm-1">
                    <a data-id="{{ $item->id }}" class="btn btn-block btn-lg btn-info editLocationsItem">Edit</a>
                </td>
                <td class="col-sm-1">
                    <button data-box="#deleteConfirmation" id="{{ $item->id }}" class="btn btn-block btn-lg btn-danger mb-control deleteLocationsItem">Remove</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <a data-toggle="modal" data-target="#addLocationsItemModal" class="btn btn-lg btn-warning minw140"><span class="fa fa-plus white"></span> Location</a>
@endif