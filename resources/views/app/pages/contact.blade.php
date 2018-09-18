@extends('app.index')

@section('meta')
    @include('app.partials.meta')
@endsection

@section('content')

    <!-- HEADER -->
    @include('app.partials.header-secondary')

    @if($currentPage->count() > 0)
        @foreach($currentPage as $page)

            <!-- CONTACT -->
            <section class="bg-light-gray section-contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 center-col">
                            @if($page->carousels_app->count() > 0)
                                <div class="margin-50px-bottom xs-margin-25px-bottom">
                                    @foreach($page->carousels_app as $carousel)
                                        @if($carousel->carousels_fragments_app->count() > 1)
                                            <div class="blog-post-content">
                                                <div class="swiper-full-screen swiper-container white-move">
                                                    @foreach($carousel->carousels_fragments_app as $fragment)
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset($fragment->photos->path) }}" alt="{{ $fragment->photos->alt }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="swiper-pagination swiper-pagination-square swiper-pagination-white"></div>
                                                <div class="swiper-button-next swiper-button-black-highlight"></div>
                                                <div class="swiper-button-prev swiper-button-black-highlight"></div>
                                            </div>
                                        @elseif($carousel->carousels_fragments_app->count() > 0)
                                            @foreach($carousel->carousels_fragments_app as $fragment)
                                                <img src="{{ asset($fragment->photos->path) }}" alt="{{ $fragment->photos->alt }}">
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            @endif
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
                            @if($page->locations_app->count() > 0)
                                @foreach($page->locations_app as $location)
                                    <div id="map" class="width-100 map-box" data-lat="{{ $location->lat }}" data-long="{{ $location->lng }}" data-title="{{ $location->title }}" data-address="{{ $location->address }}"></div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            @break
        @endforeach
    @endif
@endsection
