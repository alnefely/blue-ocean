<div class="col-12">
    <div class="panel panel-primary tabs-style-3 p-0 pt-2">
        <div class="tab-menu-heading">
            <div class="tabs-menu ">
                <ul class="nav panel-tabs">
                    @foreach(SupportedLangs() as $localeCode => $properties)
                        <li>
                            <a href="#tab-{{$localeCode}}" class="{{ ($localeCode==appLangKey())? 'active' : '' }}" data-toggle="tab">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="panel-body tabs-menu-body">
            <div class="tab-content">

                @foreach(SupportedLangs() as $localeCode => $properties)
                    <div class="tab-pane {{ ($localeCode==appLangKey())? 'active' : '' }}" id="tab-{{$localeCode}}">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>{{ __('global.media.news.name') }} ({{ $properties['native'] }}) <strong class="text-danger">*</strong></label>
                                <input dir="{{langDir($localeCode)}}" required type="text" class="form-control" name="title[{{$localeCode}}]" required value="{{ old("title")[$localeCode] ?? '' }}" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>{{ __('global.media.news.tags') }} ({{ $properties['native'] }})</label>
                                <br />
                                <input name="tags[{{$localeCode}}]" value="{{ old("tags")[$localeCode] ?? '' }}" class="tag_{{$localeCode}}" placeholder="{{ __('global.media.news.tags') }}" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>{{ __('global.media.news.description') }} ({{ $properties['native'] }}) <strong class="text-danger">*</strong></label>
                                <textarea dir="{{langDir($localeCode)}}" required name="description[{{$localeCode}}]" class="form-control" rows="5">{{ old("description")[$localeCode] ?? '' }}</textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>{{ __('global.media.news.content') }} ({{ LangNative($localeCode) }}) <strong class="text-danger">*</strong></label>
                                <textarea dir="{{langDir($localeCode)}}" name="content[{{$localeCode}}]" class="form-control my-editor" rows="5">{!! old('content')[$localeCode] ?? '' !!}</textarea>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    @section('css')
<style>
    .tox-notifications-container,
    .tox-throbber__busy-spinner,
    .tox-promotion-link{
        display: none !important;
    }
</style>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js"></script>
    <script src="{{ url('/backend/editor_config.js') }}"></script>
@endsection
