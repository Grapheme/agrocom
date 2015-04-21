<?
/**
 * TITLE: Список новостей
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
$limit = 5;
$p = Input::get('page') ?: 1;
#dd($p);
$news = Dic::valuesBySlug('news', function($query) use ($limit, $p) {
    $query->order_by_field('published_at', 'DESC');
    #$query->skip($limit*($p-1));
}, ['fields', 'textfields'], 1, 1, 0, $limit);
#Helper::tad($news);
$news = DicLib::loadGallery($news, ['gallery']);
#dd($news);
#Helper::tad($news);
?>


@section('body_class') news @stop


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
        @if (isset($news) && is_object($news) && $news->count())
            <div class="news-list inf-scroll">
                @foreach ($news as $new)
                    <div class="unit">
                        <div class="date">{{ Carbon::createFromFormat('Y-m-d', $new->published_at)->format('d.m.Y') }}</div>
                        <div class="news">
                            <h2>
                                <a href="{{ URL::route('app.news_one', ['slug' => $new->slug]) }}">
                                    {{ $new->news_name }}
                                </a>
                            </h2>

                            @if (is_object($new->gallery) && isset($new->gallery->photos) && is_object($new->gallery->photos) && $new->gallery->photos->count())
                                <div class="common-slider-controls"><a href="" class="prev"><span></span></a>
                                    <div class="numbers"></div><a href="" class="next"><span></span></a>
                                </div>
                                <ul class="common-slider">
                                    @foreach ($new->gallery->photos as $image)
                                        <li><img src="{{ $image->full() }}"></li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="description">
                                {{ $new->preview }}
                            </div>

                            @if($new->content)
                                <a href="{{ URL::route('app.news_one', ['slug' => $new->slug]) }}" class="more">
                                    {{ trans("interface.more") }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div class="page-nav">
                    <a href="{{ URL::route('page', ['slug' => 'news', 'page' => $p+1]) }}" class="next">
                        {{ trans("interface.next_page") }}
                    </a>
                </div>
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