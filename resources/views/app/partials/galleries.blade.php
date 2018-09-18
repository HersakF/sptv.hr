@if($page->galleries_app->count() > 0)
    @foreach($page->galleries_app as $gallery)
        @if($gallery->galleries_fragments_app->count() > 1)
            <div class="row lightbox-gallery">
                <div class="col-md-9 center-col last-paragraph-no-margin xs-padding-15px-lr no-padding">
                    <ul class="portfolio-grid work-3col gutter-medium">
                        <li class="grid-sizer"></li>
                        @foreach($gallery->galleries_fragments_app as $fragment)
                            <li class="grid-item">
                                <a href="{{ asset($fragment->photos->path) }}" title="{{ $fragment->photos->caption }}.">
                                    <figure>
                                        <div class="portfolio-img bg-extra-dark-gray"><img src="{{ asset($fragment->photos->path) }}" alt="{{ $fragment->photos->alt }}" class="project-img-gallery"/></div>
                                    </figure>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    @endforeach
@endif