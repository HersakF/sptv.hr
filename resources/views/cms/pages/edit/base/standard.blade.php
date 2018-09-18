<form class="form-horizontal" action="/cms/pages/{{ $page->id }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="form-group">
        <div class="col-md-12">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" maxlength="255" value="{{ $page->title }}" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
        </div>
        @if($page->category != 'base')
            <div class="col-md-12">
                <label>Subtitle</label>
                <input type="text" name="subtitle" class="form-control" placeholder="Subtitle" maxlength="255" value="{{ $page->subtitle }}"/>
            </div>
            @if($page->category == 'highlights')
                <input type="hidden" class="released-at-form" name="released_at" value="{{ Carbon\Carbon::parse($page->released_at)->format("Y-m-d") }} {{ Carbon\Carbon::parse($page->released_at)->format("H:i") }}" />
                <div class="col-md-6">
                    <label>Released at date:</label>
                    <input type="date" class="form-control released-at-date" placeholder="Released at" value="{{ Carbon\Carbon::parse($page->released_at)->format("Y-m-d") }}" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
                </div>
                <div class="col-md-6">
                    <label>Released at time:</label>
                    <input type="time" class="form-control released-at-time" placeholder="Released at" value="{{ Carbon\Carbon::parse($page->released_at)->format("H:i") }}" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
                </div>

                <input type="hidden" class="emitted-at-form" name="emitted_at" value="{{ Carbon\Carbon::parse($page->emitted_at)->format("Y-m-d") }} {{ Carbon\Carbon::parse($page->emitted_at)->format("H:i") }}" />
                <div class="col-md-6">
                    <label>Emitted at date:</label>
                    <input type="date" class="form-control emitted-at-date" placeholder="Emitted at date:" value="{{ Carbon\Carbon::parse($page->emitted_at)->format("Y-m-d") }}" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
                </div>
                <div class="col-md-6">
                    <label>Emitted at time:</label>
                    <input type="time" class="form-control emitted-at-time" placeholder="Emitted at time:" value="{{ Carbon\Carbon::parse($page->emitted_at)->format("H:i") }}" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
                </div>
            @endif
            @if($page->category != 'programs')
                <div class="col-md-12">
                    <label>Slug</label>
                    <input type="text" name="url" class="form-control" placeholder="Slug" maxlength="255" value="{{ $page->url }}" oninvalid="this.setCustomValidity('Please fill in the field.')" oninput="setCustomValidity('')" required/>
                </div>
                <div class="col-md-12">
                    <label>Abstract</label>
                    <textarea name="abstract" class="ckeditor">
                        {{ $page->abstract }}
                    </textarea>
                </div>
                <div class="col-md-12">
                    <label>Text</label>
                    <textarea name="content" class="ckeditor">
                        {{ $page->content }}
                    </textarea>
                </div>
            @endif
        @endif
        <div class="col-md-6">
            <label>SEO keywords</label>
            <input type="text" name="seo_keywords" class="form-control" maxlength="255" placeholder="SEO keywords" value="{{ $page->seo_keywords }}"/>
        </div>
        <div class="col-md-6">
            <label>SEO description</label>
            <input type="text" name="seo_description" class="form-control" maxlength="255" placeholder="SEO description" value="{{ $page->seo_description }}"/>
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-lg pull-right"><span class="fa fa-check white"></span> Save</button>
</form>
