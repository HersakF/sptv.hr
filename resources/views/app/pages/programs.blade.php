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

            <!-- PROGRAM -->
            @if($programs->count() > 0)
                <section class="bg-light-gray section-programs @if($hasCarousel) section-with-carousel @endif">
                    <div class="container">
                        <div class="row padding-50px-top padding-25px-bottom">
                            <div class="col-md-12 no-padding xs-padding-15px-lr text-center">
                                <h3 class="text-uppercase text-primary">{{ $page->title }}</h3>
                                @if($page->subtitle)<h6 class="alt-font text-grey text-medium">{{ $page->subtitle }}</h6>@endif
                                @if($page->content)<div class="text-grey">{!! $page->content !!}</div>@endif
                            </div>
                        </div>
                        @if($schedulesDates->count() > 0)
                            <div class="row">
                                <div class="col-md-9 col-sm-12 col-xs-12 center-col text-center tab-style3" id="animated-tab1">
                                    <ul class="nav nav-tabs margin-50px-bottom xs-margin-30px-bottom text-uppercase alt-font text-small font-weight-600">
                                        @php
                                            $now = Carbon\Carbon::now('Europe/Zagreb');
                                            $today = $now->toDateString();
                                            $time = $now->toTimeString();
                                            $showId = '';
                                        @endphp
                                        @foreach($schedulesDates as $key => $date)
                                            @php
                                                if(Carbon\Carbon::parse($date->date)->isMonday()){
                                                    $dayName = "Ponedjeljak";
                                                }elseif (Carbon\Carbon::parse($date->date)->isTuesday()){
                                                    $dayName = "Utorak";
                                                }elseif (Carbon\Carbon::parse($date->date)->isWednesday()){
                                                    $dayName = "Srijeda";
                                                }elseif (Carbon\Carbon::parse($date->date)->isThursday()){
                                                    $dayName = "Četvrtak";
                                                }elseif (Carbon\Carbon::parse($date->date)->isFriday()){
                                                    $dayName = "Petak";
                                                }elseif (Carbon\Carbon::parse($date->date)->isSaturday()){
                                                    $dayName = "Subota";
                                                }elseif (Carbon\Carbon::parse($date->date)->isSunday()){
                                                    $dayName = "Nedjelja";
                                                }
                                            @endphp
                                            <li class="nav @if($key == 0) active @endif">
                                                <a href="#{{ $key }}" data-toggle="tab" class="text-medium-gray">{{ $dayName }} - {{ Carbon\Carbon::parse($date->date)->format("d.m.") }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                @foreach($schedulesDates as $keyDate => $date)
                                    <div id="{{ $keyDate }}" class="center-col tab-pane fade in @if($keyDate == 0) active @endif">
                                        <div class="tab-pane fade in">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-12 col-xs-12 center-col">
                                                    @foreach($schedules as $key => $schedule)
                                                        @if($date->date == $schedule->date)
                                                            @php
                                                                $count = count ($schedules);
                                                                $prev = $schedules[(($key - 1) < 0) ? ($count - 1) : ($key - 1)];
                                                                $next = $schedules[(($key + 1) > ($count - 1)) ? 0 : ($key + 1)];

                                                                if($time >= $schedule->time && $time < $next->time){
                                                                    $showId = $schedule->id;
                                                                }
                                                                try {
                                                                    $getPage = App\Pages::where('url', '=', $schedule->linked_page_url)->first();
                                                                    $linkedPage = null;
                                                                    if($getPage->url != '') { $linkedPage = $getPage; }
                                                                } catch (Exception $exception) {
                                                                    $linkedPage = null;
                                                                }
                                                            @endphp
                                                            <div class="panel-group accordion-style2" id="accordion-main">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading @if($showId == $schedule->id && $keyDate == 0) active @endif">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main" href="#{{ $schedule->id }}">
                                                                            <div class="panel-title">
                                                                                <span class="alt-font font-weight-600 text-primary tab-tag">{{ Carbon\Carbon::parse($schedule->time)->format("H:i") }}</span>
                                                                                <span class="text-extra-dark-gray tab-title text-ellipsis">{{ $schedule->title }}</span>
                                                                                @if($schedule->description || $linkedPage != null)<i class="indicator fa fa-angle-down pull-right text-extra-dark-gray"></i>@endif
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    @if($schedule->description || $linkedPage != null)
                                                                        <div id="{{ $schedule->id }}" class="panel-collapse collapse">
                                                                            <div class="panel-body">
                                                                                @if($linkedPage != null)
                                                                                    <a href="{{ url($linkedPage->getAbsolutePath()) }}" class="text-primary display-block margin-15px-bottom">Saznajte više</a>
                                                                                @endif
                                                                                {!! $schedule->description !!}
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 center-col text-center">
                                    <p>Trenutno nema sadržaja.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </section>
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

            @break
        @endforeach
    @endif

@endsection
