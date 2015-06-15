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

$years = [];
for($i = date('Y'); $i>=2005; $i--) {
    $years[] = $i;
}
$monthes = Config::get('site.monthes.' . Config::get('app.locale'));

$year = Input::get('year') ?: null;
$month = Input::get('month') ?: null;

$publications = Dic::valuesBySlug('publications', function($query) use ($year, $month) {

    if ($year && $month) {
        $filter_exp_1 = $year . '-' . $month . '-01';
        $filter_exp_2 = $year . '-' . $month . '-31';

        $query->filter_by_field('published_at', '>=', $filter_exp_1);
        $query->filter_by_field('published_at', '<=', $filter_exp_2);
    }

    $query->order_by_field('published_at', 'DESC');

}, ['fields', 'textfields'], 1, 1, 1, $limit);

foreach ($publications as $pub => $publication)
    if ($publication->press_name == '')
        unset($publications[$pub]);

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

    @if (false)
        <div class="news-sidebar">
            <form action="?" method="GET" name="date-filter">
                <h3>Архив публикаций</h3>
                <select name="month" id="month" for="date-filter">
                    @foreach ($monthes as $m => $month)
                        <?
                        $current_month = Input::get('month') ?: date('m');
                        ?>
                        <option value="{{ $m }}"{{ $m == $current_month ? ' selected="selected"' : '' }}>{{ $month }}</option>
                    @endforeach
                </select>

                <select name="year" id="year" for="date-filter">
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
    @endif

    <div class="content">
        <div class="page-desc">
            <p>
                {{ $page->block('intro') }}
            </p>
        </div>
        @if (isset($publications) && is_object($publications) && $publications->count())
            <div class="news-list inf-scroll">
                @foreach ($publications as $press)
                    <div class="unit">
                        <div class="news">
                            <h2>
                                {{ $press->press_name }}
                            </h2>
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
                                {{ $press->preview }}
                                @if ($press->link_to_file != '')
                                    <a href="{{ $press->link_to_file }}" class="download pdf">
                                        {{ trans("interface.download_pdf") }}
                                    </a>
                                @endif
                                @if ($press->content != '' && $press->slug)
                                    <a href="{{ URL::route('app.publication', ['slug' => $press->slug]) }}">Подробнее</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="page-nav">
                    <a href="{{ URL::route('page', ['slug' => pageslug('publications'), 'page' => $p+1]) }}" class="next">
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
        @endif

    </div>

@stop


@section('scripts')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>
        var _AGROKOM_coords = [{{ $page->block('coords') }}];
    </script>
@stop