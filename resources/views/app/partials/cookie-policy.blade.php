@if($termsOfUse->count() > 0)
    <div class="cookie-policy hidden" id="cookie-policy">
        <div class="cookie-policy-wrapper cookie-default">
            <div class="cookie-text">
                <span>Korištenjem ovih web stranica slažete se sa upotrebom kolačića (cookies).
                    @foreach($termsOfUse as $item)
                        <a href="{{ url($item->url) }}" target="_blank">Saznajte više</a>
                        @break
                    @endforeach
                </span>
            </div>
            <button type="button" class="cookie-button">
                <span class="line line1"></span>
                <span class="line line2"></span>
            </button>
        </div>
    </div>
@endif