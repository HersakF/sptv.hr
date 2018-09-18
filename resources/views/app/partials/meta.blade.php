@if($currentPage->count() > 0)
    @foreach($currentPage as $page)
        <title>{{ $page->title }} | Sportska televizija</title>
        <meta name="Author" content="Sportska televizija" />
        <meta name="Description" content="{{ $page->seo_description }}" />
        <meta name="Keywords" content="{{ $page->seo_keywords }}" />

        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $page->title }} | Sportska televizija" />
        <meta property="og:description" content="{{ $page->seo_description }}" />
        @if($page->carousels_app->count() > 0)
            @foreach($page->carousels_app as $carousel)
                @if($carousel->carousels_fragments_app->count() > 0)
                    @foreach($carousel->carousels_fragments_app as $fragment)
                        <meta property="og:image" content="{{ asset($fragment->photos->path) }}" />
                        @break
                    @endforeach
                @else
                    <meta property="og:image" content="{{ asset('app/images/static/facebook.jpg') }}" />
                @endif
            @endforeach
        @else
            <meta property="og:image" content="{{ asset('app/images/static/facebook.jpg') }}" />
        @endif
        <meta property="og:image:width" content="1366"/>
        <meta property="og:image:height" content="768" />
        <meta property="fb:app_id" content="120114922047702" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:description" content="{{ $page->seo_description }}" />
        <meta name="twitter:title" content="{{ $page->title }}" />
        <meta name="twitter:site" content="" />

        @if($page->carousels_app->count() > 0)
            @foreach($page->carousels_app as $carousel)
                @if($carousel->carousels_fragments_app->count() > 0)
                    @foreach($carousel->carousels_fragments_app as $fragment)
                        <meta name="twitter:image" content="{{ asset($fragment->photos->path) }}" />
                        @break
                    @endforeach
                @else
                    <meta name="twitter:image" content="{{ asset('app/images/static/facebook.jpg') }}" />
                @endif
            @endforeach
        @else
            <meta name="twitter:image" content="{{ asset('app/images/static/facebook.jpg') }}" />
        @endif
        <meta name="twitter:image" content="{{ asset('app/images/static/facebook.jpg') }}" />
        <meta name="twitter:creator" content="" />

        <link rel="canonical" href="{{ url()->current() }}" />
    @endforeach
@endif