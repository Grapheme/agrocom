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

$years = [];
for($i = date('Y'); $i>=2005; $i--) {
    $years[] = $i;
}
$monthes = Config::get('site.monthes.' . Config::get('app.locale'));

$year = Input::get('year') ?: null;
$month = Input::get('month') ?: null;

$news = Dic::valuesBySlug('news', function($query) use ($limit, $p, $year, $month) {

    if ($year && $month) {
        $filter_exp_1 = $year . '-' . $month . '-01';
        $filter_exp_2 = $year . '-' . $month . '-31';

        $query->filter_by_field('published_at', '>=', $filter_exp_1);
        $query->filter_by_field('published_at', '<=', $filter_exp_2);
    }

    $query->filter_by_field('news_name', '!=', '', true);
    #$query->order_by_field('published_at', 'DESC');

}, ['fields', 'textfields'], 1, 1, 0, $limit);
#echo '<!--';
Helper::ta($news);
#echo '-->';
#echo '<!--';
Helper::smartQueries(1);
#echo '-->';
die;

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
    <div class="content">
        <div class="page-desc">
            <p>
                {{ $page->block('intro') }}
            </p>
        </div>

        <div class="news-filter" data-month="{{ Config::get('site.monthes.' . Config::get('app.locale') . '.' . date('m')) }}" data-year="{{ date('Y') }}">
            <form action="?" method="GET" name="date-filter">
                <div class="title">
                    {{ trans("interface.news_archive") }}
                </div>
                <select name="month" id="month" for="date-filter">
                    @foreach ($monthes as $m => $month)
                        <?
                        $current_month = Input::get('month') ?: date('m');
                        ?>
                        <option value="{{ $m }}"{{ $m == $current_month ? ' selected="selected"' : '' }}>{{ $month }}</option>
                    @endforeach
                </select> <select name="year" id="year" for="date-filter">
                    @foreach ($years as $year)
                        <?
                        $current_year = Input::get('year') ?: date('Y');
                        ?>
                        <option value="{{ $year }}"{{ $year == $current_year ? ' selected="selected"' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>

                <button type="submit" for="date-filter">Показать</button>
            </form>
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
                    <center>
                      <div class="preloader">
                        <div class="ball"></div>
                        <div class="ball1"></div>
                      </div>
                    </center>
                </div>
            </div>
        @else
            <div class="no-publications">
                {{ trans("interface.no_publications") }}
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