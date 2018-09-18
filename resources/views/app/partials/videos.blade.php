@if($page->videos_app->count() > 0)
    <div class="row">
        <div class="col-md-9 center-col last-paragraph-no-margin margin-40px-bottom xs-margin-35px-bottom">
            @foreach($page->videos_app as $video)
                <div class="fit-videos">
                    <iframe width="560" height="315" src="{{ $video->embed_url }}?autoplay=0;rel=0&amp;controls=1&amp;showinfo=0" allowfullscreen></iframe>
                </div>
            @endforeach
        </div>
    </div>
@endif