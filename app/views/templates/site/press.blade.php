<?
/**
 * TITLE: Публикации в СМИ
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
$limit = 5;
$p = Input::get('page') ?: 1;
#dd($p);

$publications = Dic::valuesBySlug('publications', function($query) {
    $query->order_by_field('published_at', 'DESC');
}, ['fields', 'textfields'], 1, 1, 1, $limit);

#Helper::smartQueries(1);

$publications = DicLib::loadImages($publications, ['image']);
#dd($publications);
#Helper::tad($publications);
?>


@section('body_class') press @stop


@section('content')

    <div class="sub-header">

        {{ Menu::placement('news_press') }}

    </div>

    <div class="content">
        <div class="page-desc">
            <p>
                {{ $page->block('intro') }}
            </p>
        </div>
        @if ($publications->count())
            <div class="news-list inf-scroll">
                @foreach ($publications as $press)
                    <div class="unit">
                        <div class="news">
                            <h2>{{ $press->press_name }}</h2>
                            <div class="date-info">
                                @if ($press->published_at)
                                    {{ Carbon::createFromFormat('Y-m-d', $press->published_at)->format('d.m.Y') }}
                                @endif
                                @if ($press->source)
                                    // {{ $press->source }}
                                @endif
                                @if ($press->source_number)
                                    // {{ $press->source_number }}
                                @endif
                            </div>
                            @if ($press->is_img('image'))
                                <div class="poster">
                                    <img src="{{ $press->image->full() }}">
                                </div>
                            @endif
                            <div class="description">
                                {{ $press->content }}
                                @if ($press->link_to_file != '')
                                    <a href="{{ $press->link_to_file }}" class="download pdf">Скачать .pdf</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="page-nav"><a href="{{ URL::route('page', ['slug' => pageslug('publications'), 'page' => $p+1]) }}" class="next">Следующая страница</a></div>
            </div>
        @endif

    </div>

@stop


@section('scripts')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>
        var _AGROKOM_coords = [{{ $page->block('coords') }}];
    </script>
@stop