@extends('app.index')

@section('meta')
    @include('app.partials.meta')
@endsection

@section('content')

    <!-- HEADER -->
    @include('app.partials.header-secondary')

    @if($currentPage->count() > 0)
        @foreach($currentPage as $page)
            <!-- ARTICLE -->
            <section class="bg-light-gray section-article">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 center-col">
                            @php $fragmentVideoURL = null @endphp
                            @foreach($page->carousels_app as $carousel)
                                @if($carousel->carousels_fragments_app->count() > 1)
                                    <div class="swiper-full-screen swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach($carousel->carousels_fragments_app as $fragment)
                                                <div class="swiper-slide" style="">
                                                    <img src="{{ asset($fragment->photos->path) }}" alt="{{ $fragment->photos->alt }}">
                                                    @php $fragmentVideoURL = $fragment->url @endphp
                                                    @if($fragmentVideoURL)
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
                                                            <div class="bg-primary text-center text-white">
                                                                <a href="{{ $fragment->url }}" class="popup-vimeo display-block text-white padding-10px-tb line-height-10"><i class="fa fa-play-circle-o icon-small"></i><span class="text-extra-large margin-10px-left position-relative top-pull-2">Pokrenite video</span></a>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @elseif($carousel->carousels_fragments_app->count() > 0)
                                    @foreach($carousel->carousels_fragments_app as $fragment)
                                        <img src="{{ asset($fragment->photos->path) }}" alt="{{ $fragment->photos->alt }}">
                                        @php $fragmentVideoURL = $fragment->url @endphp
                                        @if($fragmentVideoURL)
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
                                                <div class="bg-primary text-center text-white">
                                                    <a href="{{ $fragment->url }}" class="popup-vimeo display-block text-white padding-10px-tb line-height-10"><i class="fa fa-play-circle-o icon-small"></i><span class="text-extra-large margin-10px-left position-relative top-pull-2">Pokrenite video</span></a>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            <div class="margin-50px-bottom xs-margin-25px-bottom">
                                <h3 class="text-uppercase text-primary">{{ $page->title }}</h3>
                                @if($page->subtitle)<h6 class="alt-font text-gray text-medium">{{ $page->subtitle }}</h6>@endif
                                @if($page->content)<div class="text-large text-medium-gray">{!! $page->content !!}</div>@endif
                            </div>
                            @if($page->videos_app->count() > 0)
                                @foreach($page->videos_app as $video)
                                    <div class="margin-50px-bottom xs-margin-25px-bottom">
                                        <div class="fit-videos">
                                            <iframe width="560" height="315" src="{{ $video->embed_url }}?autoplay=0;rel=0&amp;controls=1&amp;showinfo=0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @if($page->galleries_app->count() > 0)
                        @foreach($page->galleries_app as $gallery)
                            @if($gallery->galleries_fragments_app->count() > 1)
                                <div class="row lightbox-gallery">
                                    <div class="col-md-9 center-col no-padding xs-padding-15px-lr ">
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
                </div>
            </section>

            <!-- MARKETING -->
            @if($marketings->count() > 0)
                <section class="bg-medium-gray section-marketing">
                    <div class="container">
                        <div class="row">
                            @foreach($marketings as $marketing)
                                <div class="col-sm-9 center-col text-center">
                                    <a href="{{ $marketing->url }}" target="_blank">
                                        <img src="{{ asset($marketing->photos->path) }}" alt="{{ $marketing->photos->alt }}">
                                    </a>
                                </div>
                                @break
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif

            @break
        @endforeach
    @endif
@endsection
