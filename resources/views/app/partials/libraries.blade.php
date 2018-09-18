<script type="text/javascript" src="{{ asset('app/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/skrollr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/smooth-scroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/jquery.appear.js') }}"></script>

<script type="text/javascript" src="{{ asset('app/js/bootsnav.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/jquery.nav.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/page-scroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/swiper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/jquery.count-to.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/jquery.stellar.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/isotope.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/imagesloaded.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/classie.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/hamburger-menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/counter.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/jquery.fitvids.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/equalize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/skill.bars.jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/justified-gallery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/jquery.easypiechart.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/instafeed.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/retina.min.js') }}"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ba0c735e2435027"></script>

{{--<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>--}}
{{--<script>--}}
    {{--if(Hls.isSupported()) {--}}
        {{--var video = document.getElementById('video');--}}
        {{--var hls = new Hls();--}}
        {{--hls.loadSource('https://wowza.h1telekom.hr:1935/sporttv/smil:sptv.smil/playlist.m3u8');--}}
        {{--hls.attachMedia(video);--}}
        {{--hls.on(Hls.Events.MANIFEST_PARSED,function() {--}}
            {{--video.play();--}}
        {{--});--}}
    {{--}--}}
    {{--// hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.--}}
    {{--// When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.--}}
    {{--// This is using the built-in support of the plain video element, without using hls.js.--}}
    {{--else if (video.canPlayType('application/vnd.apple.mpegurl')) {--}}
        {{--video.src = 'https://wowza.h1telekom.hr:1935/sporttv/smil:sptv.smil/playlist.m3u8';--}}
        {{--video.addEventListener('canplay',function() {--}}
            {{--video.play();--}}
        {{--});--}}
    {{--}--}}
{{--</script>--}}

@if($currentPage->count() > 0)
    @foreach($currentPage as $page)
        @if($page->locations_app->count() > 0)
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADe9CNKfMsrGO7TMXiHahfLab94AxxV0A"></script>
            <script type="text/javascript" src="{{ asset('app/js/maps.js') }}"></script>
        @endif
    @endforeach
@endif

<script type="text/javascript" src="{{ asset('app/js/main.js') }}"></script>