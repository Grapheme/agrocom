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
foreach ($news as $n => $new)
    if ($new->news_name == '')
        unset($news[$n]);
#dd($news);
#Helper::tad($news);
?>


@section('body_class') news @stop


@section('content')

    <div class="sub-header">

        {{ Menu::placement('news_press') }}

    </div>
    {{--
    <div class="news-sidebar">
        <form name="date-filter">
            <h3>Архив новостей</h3>
            <select name="month" id="month" for="date-filter">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>

            <select name="year" id="year" for="date-filter">
                <option value="1">2015</option>
                <option value="2">2014</option>
                <option value="3">2013</option>
                <option value="4">2012</option>
                <option value="5">2011</option>
                <option value="6">2010</option>
                <option value="7">2009</option>
                <option value="8">2008</option>
                <option value="9">2007</option>
                <option value="10">2006</option>
                <option value="11">2005</option>
            </select>

            <button type="submit" for="date-filter">Показать</button>
        </form>
    </div>
    --}}
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