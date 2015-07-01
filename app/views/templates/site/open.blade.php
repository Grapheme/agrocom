<?
/**
 * TITLE: Раскрытие информации
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
if (isset($page) && is_object($page))
    $seo = $page->seo;

$records = Dic::valuesBySlug('open_info', function($query) {
    $query->order_by_field('published_at', 'DESC');
}, ['fields']);
$records = DicLib::loadUploads($records, ['link_to_file']);
if (Input::get('debug') == 1) {
    Helper::tad($records);
}
?>


@section('body_class') contacts @stop


@section('content')

    <div class="sub-header">

        {{ Menu::placement('news_press') }}

    </div>

    <div class="content">
        <div class="row">

{{--
            <h1 class="title">
                {{ $page->h1_or_name() }}
            </h1>
--}}

            @if (Input::get('debug') == 1)

                <div class="news-list inf-scroll on-screen">

                    @if (isset($records) && count($records))

                        @foreach ($records as $record)

                            <div class="unit on-screen">
                                <div class="date">
                                    {{ Carbon::createFromFormat('Y-m-d', $record->published_at)->format('d.m.Y') }}
                                </div>
                                <div class="news">
                                    <div class="description" style="padding-left: 0;padding-top: 10px;">
                                        {{ $record->name }}
                                    </div>
                                    <br>
                                    @if (isset($record->link_to_file) && is_object($record->link_to_file) && $record->link_to_file->path)
                                        <a href="{{ $record->link_to_file->path }}" class="more" style="margin: 0;" target="_blank">Загрузить</a>
                                    @endif
                                </div>
                            </div>

                        @endforeach
                    @endif
                </div>
            @endif

            @if (count($page->blocks))
                @foreach ($page->blocks as $block)
                    @if (0)
                        <h2>{{ $page->block($block->slug, 'name') }}</h2>
                    @endif
                    {{ $page->block($block->slug) }}
                @endforeach
            @endif

        </div>
    </div>

@stop


@section('scripts')
@stop