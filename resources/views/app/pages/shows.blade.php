@extends('app.index')

@section('meta')
    @include('app.partials.meta')
@endsection

@section('content')

    <!-- HEADER -->
    @include('app.partials.header-secondary')

    @if($currentPage->count() > 0)
        @foreach($currentPage as $page)
            <!-- CAROUSELS -->
            @include('app.partials.carousels')

            @php $hasCarousel = 0 @endphp

            @if($page->carousels_app->count() > 0)
                @foreach($page->carousels_app as $carousel)
                    @if($carousel->carousels_fragments_app->count() > 0)
                        @php $hasCarousel = 1 @endphp
                    @endif
                @endforeach
            @endif

            <!-- SHOWS -->
            <section id="blog" class="bg-light-gray blog-post-style5 section-shows @if($hasCarousel) section-with-carousel @endif">
                <div class="container">
                    <div class="row padding-50px-top padding-25px-bottom">
                        <div class="col-md-12 no-padding xs-padding-15px-lr text-center">
                            <h3 class="text-uppercase text-primary">{{ $page->title }}</h3>
                            @if($page->subtitle)<h6 class="alt-font text-grey text-medium">{{ $page->subtitle }}</h6>@endif
                            @if($page->content)<div class="text-grey">{!! $page->content !!}</div>@endif
                        </div>
                    </div>

                    @if($shows->count() > 0)
                        <div class="row equalize sm-equalize-auto">
                            <div class="col-md-12 no-padding xs-padding-15px-lr">
                                <ul class="blog-grid blog-3col gutter-large">
                                    <li class="grid-sizer"></li>
                                    @foreach($shows as $key => $article)
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
                        <!-- PAGINATION -->
                        @if($shows->total() > $shows->perPage())
                            <div class="row margin-30px-top">
                                <div class="text-center">
                                    <div class="pagination">
                                        {{ $shows->links() }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 center-col text-center">
                                <p>Trenutno nema sadržaja.</p>
                            </div>
                        </div>
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
