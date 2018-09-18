@if($page->locations_app->count() > 0)
    <div class="row">
        <div class="col-md-9 center-col last-paragraph-no-margin margin-40px-bottom xs-margin-30px-bottom">
            @foreach($page->locations_app as $location)
                <div id="map" class="width-100 map-box" data-lat="{{ $location->lat }}" data-long="{{ $location->lng }}" data-title="{{ $location->title }}" data-address="{{ $location->address }}"></div>
            @endforeach
        </div>
    </div>
@endif