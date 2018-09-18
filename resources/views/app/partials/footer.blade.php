<footer class="footer-standard">
    <div class="footer-widget-area padding-five-tb xs-padding-30px-tb">
        <div class="container">
            <div class="row equalize sm-equalize-auto">
                <div class="col-md-3 col-sm-12 col-xs-12 widget border-right border-color-extra-light-gray sm-no-border-right sm-margin-40px-bottom sm-text-center">
                    <a href="{{ url('/') }}" class="margin-20px-bottom display-inline-block"><img class="footer-logo" src="{{ asset('app/images/logo_dark.png') }}" alt="SPTV"></a>
                    <div class="widget-title alt-font text-small text-extra-dark-gray text-uppercase margin-10px-bottom font-weight-600">DRUŠTVENE MREŽE</div>
                    <ul class="small-icon no-margin">
                        <li><a class="facebook" href="https://www.facebook.com/Sportska.televizija.SPTV/" target="_blank"><i class="fa fa-facebook"></i><span></span></a></li>
                        <li><a class="youtube" href="https://www.youtube.com/user/SportskaTelevizija" target="_blank"><i class="fa fa-youtube"></i><span></span></a></li>
                        <li><a class="instagram" href="https://www.instagram.com/sportskatelevizija/" target="_blank"><i class="fa fa-instagram"></i><span></span></a></li>
                    </ul>
                </div>
                @if($mainNavigation->count() > 0)
                    <div class="col-md-3 col-sm-12 col-xs-12 widget border-right border-color-extra-light-gray padding-45px-left sm-padding-15px-left sm-no-border-right sm-margin-40px-bottom sm-text-center">
                        <div class="widget-title alt-font text-small text-extra-dark-gray text-uppercase margin-10px-bottom font-weight-600">IZBORNIK</div>
                        <ul class="list-unstyled">
                            @foreach($mainNavigation as $page)
                                <li><a class="text-small" href="{{ '/'.$page->url }}">{{ $page->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-3 col-sm-12 col-xs-12 widget border-right border-color-extra-light-gray padding-45px-left sm-padding-15px-left sm-clear-both sm-no-border-right sm-margin-40px-bottom sm-text-center">
                    <div class="widget-title alt-font text-small text-extra-dark-gray text-uppercase margin-10px-bottom font-weight-600">Kontakt</div>
                    <p class="text-small display-block margin-15px-bottom width-80 sm-width-70 sm-center-col">Sportska televizija<br>Kneza Ljudevita Posavskog 48<br> 10000 Zagreb</p>
                    <div class="text-small">E-mail: <a href="mailto:info@sptv.hr">info@sptv.hr</a></div>
                    <div class="text-small">Telefon: +385 1 555 3800</div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 widget padding-45px-left sm-padding-15px-left sm-text-center">
                    <div class="widget-title alt-font text-small text-extra-dark-gray text-uppercase margin-20px-bottom font-weight-600">O NAMA</div>
                    <p class="text-small width-95 xs-width-100">Televizijsko poslovanje je poslovanje s ljudima, o ljudima i za ljude. Poslovanje Sportske televizije je poslovanje sa sportašima, o sportašima i za sportaše i sve koji se tako osjećaju.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light-gray footer-strip padding-20px-tb xs-padding-20px-tb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center text-small display-table">
                    <div class="display-table-cell vertical-align-middle">
                        Sva prava pridržana &copy; {{ Carbon\Carbon::parse(date("Y"))->format("Y") }} Sportska Televizija.
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>