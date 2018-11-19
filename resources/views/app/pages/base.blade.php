@extends('app.index')

@section('meta')
    <!-- META -->
    @include('app.partials.meta')
@endsection

@section('content')


    <!-- HEADER -->
    @include('app.partials.header-secondary')

    @if($currentPage->count() > 0)
        @foreach($currentPage as $page)
            <!-- CAROUSELS -->
            @include('app.partials.carousels')

            <!-- SCHEDULES -->
            @php
                $now = Carbon\Carbon::now('Europe/Zagreb');
                $today = $now->toDateString();
                $time = $now->toTimeString();
                $show= '';
            @endphp
            @foreach($schedules as $key => $schedule)
                @php
                    $count = count ($schedules);
                    $prev = $schedules[(($key - 1) < 0) ? ($count - 1) : ($key - 1)];
                    $next = $schedules[(($key + 1) > ($count - 1)) ? 0 : ($key + 1)];
                    if($time >= $schedule->time && $time < $next->time){ $show = $schedule; }
                @endphp
            @endforeach
            @if($show)
                @php $program = App\Pages::where('pages.id', '=', $show->page_id)->first(); @endphp
                <section class="bg-white section-schedules-feed">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 xs-no-padding">
                                <div class="swiper-slider-schedules swiper-container">
                                    <div class="swiper-wrapper">
                                        @php $pass = 0; @endphp
                                        @foreach($schedules as $schedule)
                                            @if($schedule->id == $show->id)
                                                <div class="swiper-slide text-center swiper-emission active">
                                                    @php
                                                        try {
                                                            $getPage = App\Pages::where('url', '=', $schedule->linked_page_url)->first();
                                                            $linkedPage = null;
                                                            if($getPage->url != '') { $linkedPage = $getPage; }
                                                        } catch (Exception $exception) {
                                                            $linkedPage = null;
                                                        }
                                                    @endphp
                                                    <a href="@if($linkedPage == null){{ $program->url }}@else{{ url($linkedPage->getAbsolutePath()) }}@endif">
                                                        <span class="schedule-time alt-font font-weight-600 text-primary tab-tag">{{ Carbon\Carbon::parse($schedule->time)->format("H:i") }}</span>
                                                        <span class="schedule-title text-extra-dark-gray display-inline-block tab-title">{{ $schedule->title }}</span>
                                                    </a>
                                                </div>
                                                @php $pass++; @endphp
                                            @elseif($pass > 0)
                                                <div class="swiper-slide text-center swiper-emission">
                                                    @php
                                                        try {
                                                            $getPage = App\Pages::where('url', '=', $schedule->linked_page_url)->first();
                                                            $linkedPage = null;
                                                            if($getPage->url != '') { $linkedPage = $getPage; }
                                                        } catch (Exception $exception) {
                                                            $linkedPage = null;
                                                        }
                                                    @endphp
                                                    <a href="@if($linkedPage == null){{ $program->url }}@else{{ url($linkedPage->getAbsolutePath()) }}@endif">
                                                        <span class="schedule-time alt-font font-weight-600 text-primary tab-tag">{{ Carbon\Carbon::parse($schedule->time)->format("H:i") }}</span>
                                                        <span class="schedule-title text-extra-dark-gray display-inline-block tab-title">{{ $schedule->title }}</span>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            <!-- HIGHLIGHTS -->
            @if($highlights->count() > 0 && $highlightsArticles->count() > 0)
                <section id="blog" class="bg-light-gray blog-post-style5 section-news-home">
                    <div class="container">
                        @foreach($highlights as $item)
                            <div class="row padding-20px-bottom">
                                <div class="col-md-12 no-padding xs-padding-15px-lr text-center">
                                    <h3 class="text-uppercase text-primary">{{ $item->title }}</h3>
                                    @if($item->subtitle)<h6 class="alt-font text-grey text-medium">{{ $item->subtitle }}</h6>@endif
                                </div>
                            </div>
                        @endforeach

                        @if($highlightsArticles->count() > 0)
                            <div class="row">
                                @foreach($highlightsArticles as $key => $article)
                                    {{ $fragmentVideoURL = null }}
                                    <div class="grid-item col-sm-6 col-md-4 @if($loop->last) no-margin @else sm-margin-35px-bottom @endif @if($key == 2) hidden-sm @endif">
                                        <div class="blog-post">
                                            <div class="blog-post-images overflow-hidden image-hover-style-1">
                                                <a href="{{ url($article->getAbsolutePath()) }}">
                                                    @if($article->carousels_app->count() > 0)
                                                        @foreach($article->carousels_app as $carousel)
                                                            @if($carousel->carousels_fragments_app->count() > 0)
                                                                @foreach($carousel->carousels_fragments_app as $fragment)
                                                                    <img src="{{ asset($fragment->photos->path) }}" alt="{{ $fragment->photos->alt }}" data-no-retina="">
                                                                    {{ $fragmentVideoURL = $fragment->url }}
                                                                    @break
                                                                @endforeach
                                                            @else
                                                                <img src="{{ asset('app/images/static/no-img-category.jpg') }}" alt="" data-no-retina="">
                                                                {{ $fragmentVideoURL = $fragment->url }}
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <img src="{{ asset('app/images/static/no-img-category.jpg') }}" alt="" data-no-retina="">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="post-details bg-white padding-40px-all">
                                                <span class="news-date text-grey">{{ Carbon\Carbon::parse($article->emitted_at)->format("d/m/y") }}
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
                                    </div>
                                    {{ $fragmentVideoURL = null }}
                                @endforeach
                            </div>
                        @endif
                        @foreach($highlights as $item)
                            <div class="row margin-40px-top">
                                <div class="col-md-12 no-padding xs-padding-15px-lr text-center">
                                    <a href="{{ $item->url }}" class="btn btn-primary btn-rounded btn-large xs-margin-two-all">Saznajte više</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- STORIES -->
            @if($stories->count() > 0  && $storiesArticles->count() > 0)
                <section id="blog" class="bg-primary blog-post-style5 section-news-home">
                    <div class="container">
                        @foreach($stories as $item)
                            <div class="row padding-20px-bottom">
                                <div class="col-md-12 no-padding xs-padding-15px-lr text-center">
                                    <h3 class="text-uppercase text-white">{{ $item->title }}</h3>
                                    @if($item->subtitle)<h6 class="alt-font text-white text-medium">{{ $item->subtitle }}</h6>@endif
                                </div>
                            </div>
                        @endforeach

                        @if($storiesArticles->count() > 0)
                            <div class="row">
                                @foreach($storiesArticles as $key => $article)
                                    {{ $fragmentVideoURL = null }}
                                    <div class="grid-item col-sm-6 col-md-4 @if($loop->last) no-margin @else sm-margin-35px-bottom @endif @if($key == 2) hidden-sm @endif">
                                        <div class="blog-post">
                                            <div class="blog-post-images overflow-hidden image-hover-style-1">
                                                <a href="{{ url($article->getAbsolutePath()) }}">
                                                    @if($article->carousels_app->count() > 0)
                                                        @foreach($article->carousels_app as $carousel)
                                                            @if($carousel->carousels_fragments_app->count() > 0)
                                                                @foreach($carousel->carousels_fragments_app as $fragment)
                                                                    <img src="{{ asset($fragment->photos->path) }}" alt="{{ $fragment->photos->alt }}" data-no-retina="">
                                                                    {{ $fragmentVideoURL = $fragment->url }}
                                                                    @break
                                                                @endforeach
                                                            @else
                                                                <img src="{{ asset('app/images/static/no-img-category.jpg') }}" alt="" data-no-retina="">
                                                                {{ $fragmentVideoURL = $fragment->url }}
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
                                    </div>
                                    {{ $fragmentVideoURL = null }}
                                @endforeach
                            </div>
                        @endif

                        @foreach($stories as $item)
                            <div class="row margin-40px-top">
                                <div class="col-md-12 no-padding xs-padding-15px-lr text-center">
                                    <a href="{{ $item->url }}" class="btn btn-white btn-rounded btn-large xs-margin-two-all">Saznajte više</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- VIDEO WIDGET SECTION -->
            <section class="bg-white section-news-other-home">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 padding-20px-lr xs-padding-15px-lr">
                            @if($page->videos_app->count() > 0)
                                <div class="swiper-full-screen swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($page->videos_app as $video)
                                            <div class="swiper-slide" style="">
                                                <div class="fit-videos">
                                                    <iframe width="560" height="315" src="{{ $video->embed_url }}?autoplay=0;rel=0&amp;controls=0&amp;showinfo=0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if($page->videos_app->count() > 1)
                                        <div class="swiper-pagination swiper-pagination-white"></div>
                                        <div class="swiper-button-next swiper-button-black-highlight"></div>
                                        <div class="swiper-button-prev swiper-button-black-highlight"></div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            <!-- HRVATSKA REPREZENTACIJA FEED -->
            @if($feedHrvatskaRepka)
                @php $countFeed = 1 @endphp
                @php $healthyFeed = false @endphp
                @if(isset($feedHrvatskaRepka["channel"]["item"]))
                    @foreach($feedHrvatskaRepka["channel"]["item"] as $feed)
                        @php
                            try {
                                $feedLink   = $feed["link"];
                                $feedTitle  = $feed["title"];
                            } catch (Exception $exception) {
                                $feedLink   = null;
                                $feedTitle  = null;
                            }
                        @endphp
                        @if($feedLink && $feedTitle)
                            @php $healthyFeed = true; @endphp
                        @endif
                    @endforeach
                    @if($healthyFeed == true)
                        <section class="bg-light-gray section-news-feed">
                            <div class="container">
                                <div class="row padding-40px-bottom">
                                    <div class="col-sm-3 col-xs-8 xs-center-col">
                                        <img src="{{ asset('app/images/static/hrvatskareprezentacija.png') }}" alt="Hrvatska reprezentacija">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="swiper-multy-row-container-news swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach($feedHrvatskaRepka["channel"]["item"] as $feed)
                                                @php
                                                    try {
                                                        $feedLink   = $feed["link"];
                                                        $feedTitle  = $feed["title"];
                                                    } catch (Exception $exception) {
                                                        $feedLink   = null;
                                                        $feedTitle  = null;
                                                    }
                                                @endphp
                                                @if($feedLink && $feedTitle)
                                                    <div class="grid-item swiper-slide col-md-4 col-sm-4 col-xs-12 feed-block">
                                                        <div class="blog-post bg-white inner-match-height">
                                                            <div class="post-details padding-40px-all sm-padding-20px-all text-center">
                                                                <a href="{{ $feedLink }}" target="_blank" class="feed-title text-primary display-block">{!! str_limit(strip_tags($feedTitle), $limit = 100, $end = '...') !!}</a>
                                                                <a href="{{ $feedLink }}" target="_blank" class="btn btn-primary btn-rounded btn-small">Saznajte više</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($countFeed == 9) @break @endif
                                                @php $countFeed++ @endphp
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                @endif
            @endif

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

            <!-- SPORTSKA HRVATSKA FEED -->
            @if($feedSportskaHrvatska)
                @php $countFeed = 1 @endphp
                @php $healthyFeed = false @endphp

                @if(isset($feedSportskaHrvatska["channel"]["item"]))
                    @foreach($feedSportskaHrvatska["channel"]["item"] as $feed)
                        @php
                            try {
                                $feedLink   = $feed["link"];
                                $feedTitle  = $feed["title"];
                            } catch (Exception $exception) {
                                $feedLink   = null;
                                $feedTitle  = null;
                            }
                        @endphp
                        @if($feedLink && $feedTitle)
                            @php $healthyFeed = true; @endphp
                        @endif
                    @endforeach
                    @if($healthyFeed == true)
                        <section class="bg-light-gray section-news-feed">
                            <div class="container">
                                <div class="row padding-40px-bottom">
                                    <div class="col-sm-3 col-xs-8 xs-center-col">
                                        <img src="{{ asset('app/images/static/sportskahrvatska.png') }}" alt="Sportska Hrvatska">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="swiper-blog swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach($feedSportskaHrvatska["channel"]["item"] as $feed)
                                                @php
                                                    try {
                                                        $feedLink   = $feed["link"];
                                                        $feedTitle  = $feed["title"];
                                                    } catch (Exception $exception) {
                                                        $feedLink   = null;
                                                        $feedTitle  = null;
                                                    }
                                                @endphp
                                                @if($feedLink && $feedTitle)
                                                    <div class="grid-item swiper-slide col-md-4 col-sm-4 col-xs-12 feed-block">
                                                        <div class="blog-post bg-white inner-match-height">
                                                            <div class="post-details padding-40px-all sm-padding-20px-all text-center">
                                                                <a href="{{ $feedLink }}" target="_blank" class="feed-title text-primary display-block">{!! str_limit(strip_tags($feedTitle), $limit = 100, $end = '...') !!}</a>
                                                                <a href="{{ $feedLink }}" target="_blank" class="btn btn-primary btn-rounded btn-small">Saznajte više</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($countFeed == 9) @break @endif
                                                @php $countFeed++ @endphp
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                @endif
            @endif

            <!-- BLOG -->
            @if($news->count() > 0  && $newsArticles->count() > 0)
                <section class="bg-primary section-news-home">
                    <div class="container">

                        @foreach($news as $item)
                            <div class="row padding-20px-bottom">
                                <div class="col-md-12 no-padding xs-padding-15px-lr text-center">
                                    <h3 class="text-uppercase text-white">{{ $item->title }}</h3>
                                    @if($item->subtitle)<h6 class="alt-font text-white text-medium">{{ $item->subtitle }}</h6>@endif
                                </div>
                            </div>
                        @endforeach

                        @if($newsArticles->count() > 0)
                            <div class="row equalize">
                                @foreach($newsArticles as $key => $article)
                                    {{ $fragmentVideoURL = null }}
                                    <div class="grid-item col-sm-6 col-md-4 @if($loop->last) no-margin @else sm-margin-35px-bottom @endif @if($key == 2) hidden-sm @endif">
                                        <div class="blog-post">
                                            <div class="blog-post-images overflow-hidden image-hover-style-1">
                                                <a href="{{ url($article->getAbsolutePath()) }}">
                                                    @if($article->carousels_app->count() > 0)
                                                        @foreach($article->carousels_app as $carousel)
                                                            @if($carousel->carousels_fragments_app->count() > 0)
                                                                @foreach($carousel->carousels_fragments_app as $fragment)
                                                                    <img src="{{ asset($fragment->photos->path) }}" alt="{{ $fragment->photos->alt }}" data-no-retina="">
                                                                    {{ $fragmentVideoURL = $fragment->url }}
                                                                    @break
                                                                @endforeach
                                                            @else
                                                                <img src="{{ asset('app/images/static/no-img-category.jpg') }}" alt="" data-no-retina="">
                                                                {{ $fragmentVideoURL = $fragment->url }}
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
                                    </div>
                                    {{ $fragmentVideoURL = null }}
                                @endforeach
                            </div>
                        @endif

                        @foreach($news as $item)
                            <div class="row margin-40px-top">
                                <div class="col-md-12 no-padding xs-padding-15px-lr text-center">
                                    <a href="{{ $item->url }}" class="btn btn-white btn-rounded btn-large xs-margin-two-all">Saznajte više</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- MARKETING -->
            @if($marketings->count() > 1)
                <section class="bg-medium-gray section-marketing">
                    <div class="container">
                        <div class="row">
                            @foreach($marketings as $key => $marketing)
                                @if($key > 0)
                                    <div class="col-sm-9 center-col text-center">
                                        <a href="{{ $marketing->url }}" target="_blank">
                                            <img src="{{ asset($marketing->photos->path) }}" alt="{{ $marketing->photos->alt }}">
                                        </a>
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif

            <!-- PARTNERS -->
            @if($partners->count() > 0)
                <section class="bg-light-gray section-partners">
                    <div class="container">
                        <div class="row">
                            <div class="swiper-slider-clients swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($partners as $partner)
                                        <div class="swiper-slide text-center">
                                            <a href="{{ $partner->url }}" target="_blank">
                                                <img src="{{ asset($partner->photos->path) }}" alt="{{ $partner->photos->alt }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach
    @endif
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <div class="addthis_inline_follow_toolbox"></div>

@endsection
