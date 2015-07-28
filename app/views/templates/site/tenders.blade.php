<?
/**
 * TITLE: Тендеры
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
/*
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
*/

$tenders = Dic::valuesBySlug('tenders', function ($query) {

    #$query->order_by_field('published_at', 'DESC');

}, ['fields', 'textfields'], 1, 1, 1);

$tenders = DicLib::loadUploads($tenders, ['upload1', 'upload2', 'upload3']);
#Helper::tad($tenders);
?>


@section('body_class') press @stop


@section('content')

    <div class="sub-header loaded">
        <h1>Тендеры</h1>
    </div>

    <div class="tenders">
        @if (count($tenders))
            {{--<div class="tender fotorama" data-width="720" data-height="215" data-autoplay="true" data-click="false" data-swipe="false">--}}

                @foreach($tenders as $tender)

                    <div class="tender-item">
                        <div class="tender-left">
                            <p class="dead-line">Заявки<br> принимаются до:</p>
                            <span class="dead-line-date">{{ Carbon::createFromFormat('Y-m-d', $tender->published_at)->format('d.m.Y') }}</span>
                        </div>

                        <div class="tender-right">
                            <h3 class="tender-header">{{ $tender->name }}</h3>

                            <p class="tender-text">{{ $tender->description }}</p>

                            <?
                            $fields = ['upload1', 'upload2', 'upload3'];
                            ?>
                            @foreach ($fields as $field)
                                @if (is_object($tender->$field))
                                    <?
                                    $temp = explode('.', $tender->$field->original_name);
                                    $format = array_pop($temp);
                                    $file_name = implode('.', $temp);
                                    ?>
                                    <p class="tender-doc">
                                        <a href="{{ $tender->$field->path }}" download="{{ $tender->$field->original_name }}">{{ $file_name }}</a>
                                        ({{ $format }}, {{ ceil(($tender->$field->filesize)/1024) }} кб)
                                    </p>
                                @endif
                            @endforeach
                            <p class="tender-doc">
                                <a href="{{ $tender->link }}">{{ $tender->type }}</a>
                            </p>
                        </div>
                    </div>

                @endforeach

            {{--</div>--}}
        @endif
    </div>

@stop


@section('scripts')
@stop