@extends('app.index')

@section('meta')
    @include('app.partials.meta')
@endsection

@section('content')

    <!-- HEADER -->
    @include('app.partials.header-secondary')

    @if($currentPage->count() > 0)
        @foreach($currentPage as $page)

            <!-- STORY -->
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
                                <span class="text-grey text-large font-weight-400 margin-30px-top margin-15px-bottom display-block">{{ Carbon\Carbon::parse($page->created_at)->format("d/m/y") }}</span>
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

            <!-- LAST NEWS -->
            @if($stories->count() > 0)
                <section class="bg-primary blog-post-style5 section-news">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 padding-20px-bottom text-center">
                                <h3 class="text-uppercase text-white">Moglo bi vas zanimati...</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 no-padding xs-padding-15px-lr">
                                <ul class="blog-grid blog-3col gutter-large">
                                    <li class="grid-sizer"></li>
                                    @foreach($stories as $key => $article)
                                        @php $fragmentVideoURL = null @endphp
                                        <li class="grid-item @if($key == 2) hidden-sm @endif">
                                            <div class="blog-post">
                                                <div class="blog-post-images overflow-hidden image-hover-style-1">
                                                    <a href="{{ url($article->getAbsolutePath()) }}">
                                                        @if($article->carousels_app->count() > 0)
                                                            @foreach($article->carousels_app as $carousel)
                                                                @if($carousel->carousels_fragments_app->count() > 0)
                                                                    @foreach($carousel->carousels_fragments_app as $fragment)
                                                                        <img src="{{ asset($fragment->photos->path) }}" alt="{{ $fragment->photos->alt }}" data-no-retina="">
                                                                        @php $fragmentVideoURL = $fragment->url @endphp
                                                                        @break
                                                                    @endforeach
                                                                @else
                                                                    <img src="{{ asset('app/images/static/no-img-category.jpg') }}" alt="" data-no-retina="">
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <img src="{{ asset('app/images/static/no-img-category.jpg') }}" alt="" data-no-retina="">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="post-details bg-white padding-40px-all">
                                                    <span class="news-date text-grey">{{ Carbon\Carbon::parse($article->created_at)->format("d/m/y") }}
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
                                                                <a href="{{ $fragment->url }}" class="popup-vimeo pull-right"><i class="fa fa-play-circle-o icon-small"></i></a>
                                                            @endif
                                                        @endif
                                                    </span>
                                                    <a href="{{ url($article->getAbsolutePath()) }}" class="news-title text-primary display-block margin-15px-bottom text-ellipsis">{{ $article->title }}</a>
                                                    @if($article->abstract)
                                                        <p class="margin-15px-bottom height-85px overflow-hidden">{!! str_limit(strip_tags($article->abstract), $limit = 100, $end = '...') !!}</p>
                                                    @endif
                                                    <a href="{{ url($article->getAbsolutePath()) }}" class="news-link text-grey text-small alt-font display-block">Saznajte više</a>
                                                </div>
                                            </div>
                                        </li>
                                        @php $fragmentVideoURL = null @endphp
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            @break
        @endforeach
    @endif
@endsection
