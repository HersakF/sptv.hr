<div class="row padding-80px-top md-padding-80px-top sm-padding-80px-top xs-padding-50px-top margin-40px-bottom xs-margin-35px-bottom">
    <div class="col-md-9 center-col last-paragraph-no-margin">
        <h3 class="text-uppercase text-primary">{{ $page->title }}</h3>
        @if($page->subtitle)<h6 class="alt-font text-gray text-medium">{{ $page->subtitle }}</h6>@endif
        @if($page->content)<div class="text-large line-height-30 text-extra-dark-gray xs-line-height-26">{!! $page->content !!}</div>@endif
    </div>
</div>