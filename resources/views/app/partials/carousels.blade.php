@if($page->carousels_app->count() > 0)
    @foreach($page->carousels_app as $carousel)
        @if($carousel->carousels_fragments_app->count() > 1)
            <section class="no-padding main-slider mobile-height">
                <div class="swiper-full-screen swiper-container width-100 padding-100px-top xs-padding-80px-top">
                    <div class="swiper-wrapper">
                        @foreach($carousel->carousels_fragments_app as $fragment)
                            <div class="swiper-slide cover-background header" style="background-image:url('{{ asset($fragment->photos->path) }}');">
                                <div class="opacity-extra-medium bg-extra-dark-gray"></div>
                                <div class="container position-relative height-500px xs-height-400px">
                                    <div class="slider-typography text-center">
                                        <div class="slider-text-middle-main">
                                            <div class="slider-text-middle">
                                                @if($fragment->title)
                                                    <h2 class="title width-80 center-col">{{ $fragment->title }}</h2>
                                                @endif
                                                @if($fragment->subtitle)
                                                    <h3 class="subtitle width-80 center-col">{{ $fragment->subtitle }}</h3>
                                                @endif
                                                @if($fragment->url)
                                                    @php
                                                        $isVideo = false;
                                                        try {
                                                            $videoPartials = parse_url($fragment->url);
                                                            if((preg_match('/youtube/', $videoPartials['host']) == true) || (preg_match('/vimeo/', $videoPartials['host']) == true)){ $isVideo = true; }
                                                        } catch (Exception $exception) {
                                                            $isVideo = false;
                                                        }
                                                    @endphp
                                                    @if($isVideo == true)
                                                        <a href="{{ $fragment->url }}" class="popup-vimeo btn btn-white btn-circle"><i class="fa fa-play icon-very-small"></i></a>
                                                    @else
                                                        <a href="{{ $fragment->url }}" class="btn btn-white btn-rounded btn-large">Saznajte više</a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination swiper-pagination-white"></div>
                    <div class="swiper-button-next swiper-button-black-highlight display-none"></div>
                    <div class="swiper-button-prev swiper-button-black-highlight display-none"></div>
                </div>
            </section>
        @elseif($carousel->carousels_fragments_app->count() == 1)
            <section class="no-padding main-slider mobile-height">
                <div class="swiper-full-screen swiper-container width-100 white-move padding-100px-top xs-padding-80px-top">
                    @foreach($carousel->carousels_fragments_app as $fragment)
                        <div class="cover-background header" style="background-image:url('{{ asset($fragment->photos->path) }}');">
                            <div class="opacity-extra-medium bg-extra-dark-gray"></div>
                            <div class="container position-relative height-500px xs-height-400px">
                                <div class="slider-typography text-center">
                                    <div class="slider-text-middle-main">
                                        <div class="slider-text-middle">
                                            @if($fragment->title)
                                                <h2 class="title width-80 center-col">{{ $fragment->title }}</h2>
                                            @endif
                                            @if($fragment->subtitle)
                                                <h3 class="subtitle width-80 center-col">{{ $fragment->subtitle }}</h3>
                                            @endif
                                            @if($fragment->url)
                                                @php
                                                    $isVideo = false;
                                                    try {
                                                        $videoPartials = parse_url($fragment->url);
                                                        if((preg_match('/youtube/', $videoPartials['host']) == true) || (preg_match('/vimeo/', $videoPartials['host']) == true)){ $isVideo = true; }
                                                    } catch (Exception $exception) {
                                                        $isVideo = false;
                                                    }
                                                @endphp
                                                @if($isVideo == true)
                                                    <a href="{{ $fragment->url }}" class="popup-vimeo btn btn-white btn-circle"><i class="fa fa-play icon-very-small"></i></a>
                                                @else
                                                    <a href="{{ $fragment->url }}" class="btn btn-white btn-rounded btn-large">Saznajte više</a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    @endforeach
@endif

