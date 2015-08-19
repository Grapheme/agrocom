<?
/**
 * TITLE: Главная страница
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
#$business = Cache::get('app.business', function(){
$business = Dic::valuesBySlug('business', function ($query) {
    $query->orderBy('lft', 'ASC');
    $query->orderBy('id', 'ASC');
}, ['fields'], true, true, true);
$business = DicLib::loadImages($business, ['logo', 'mainpage_logo']);
#Helper::tad($business);
#Cache::put('app.business', $business, 60);
#return $business;
#});
#Helper::tad($business);

#$slider = Cache::get('app.slider', function(){
$slider = Dic::valuesBySlug('slider', function ($query) {
    $query->orderBy('lft', 'ASC');
    $query->orderBy('id', 'ASC');
}, ['fields'], true, true, true);
$slider = DicLib::loadImages($slider, ['image']);
#Helper::tad($slider);
#    Cache::put('app.slider', $slider, 60);
#    return $slider;
#});
#Helper::tad($slider);

#$news = Cache::get('app.news', function(){
$news = Dic::valuesBySlug('news', function ($query) {
    $query->filter_by_field('news_name', '!=', '', true);
    $query->order_by_field('published_at', 'DESC');
    $query->orderBy('id', 'DESC');
    $query->limit(3);
}, ['fields', 'textfields'], true, true, true);
#$news = DicLib::loadImages($news, ['image']);
#Helper::smartQueries(1);
#Helper::tad($news);
#Cache::put('app.news', $news, 60);
#return $news;
#});
#Helper::smartQueries(1);
foreach ($news as $n => $new)
    if ($new->news_name == '')
        unset($news[$n]);
#Helper::tad($news);

$projects = Dic::valuesBySlug('projects', function ($query) {
    $query->orderBy('lft', 'ASC');
    $query->orderBy('id', 'DESC');
}, ['fields', 'textfields'], true, true, true);
$projects = DicLib::loadImages($projects, ['image']);
#Helper::tad($projects);
foreach ($projects as $p => $project)
    if ($project->project_name == '')
        unset($projects[$p]);
$projects_count = count($projects);


$tenders = Dic::valuesBySlug('tenders', function ($query) {

    #$query->order_by_field('published_at', 'DESC');

}, ['fields', 'textfields'], 1, 1, 1);
$tenders = DicLib::loadUploads($tenders, ['upload1', 'upload2', 'upload3']);
#Helper::tad($tenders);
?>


@section('header')
    @include(Helper::layout('header_big'))
@stop


@section('content')

    <div class="slogan">
        {{ nl2br(trans("interface.slogan")) }}
    </div>

    @if (isset($slider) && is_object($slider))
        <div id="main-slider">
            <div class="preloader-wrapper">
                <div class="preloader">
                    <div class="ball"></div>
                    <div class="ball1"></div>
                </div>
            </div>
            @foreach ($slider as $slide)
                <div @if($slide->is_img('image')) data-img='{{ $slide->image->full() }}' @endif class="slide">
                    <div class="holder">
                        <div class="text">
                            @if ($slide->number)
                                <div class="row">
                                    <big>{{ $slide->number }}</big>
                                    @if ($slide->unit)
                                        <small>{{ $slide->unit }}</small>
                                    @endif
                                </div>
                            @endif
                            @if ($slide->entity)
                                <div class="row">
                                    {{ $slide->entity }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="dots">
                @foreach ($slider as $slide)
                    <a href=""></a>
                @endforeach
            </div>
        </div>
    @endif

    @if (isset($business) && is_object($business) && $business->count())
        <ul class="business-list">
            @foreach ($business as $biz)
                <li>
                    <a href="{{ URL::route('app.business', ['slug' => $biz->slug]) }}"><img src="{{ $biz->img_full('mainpage_logo') }}"></a>
                </li>
            @endforeach
        </ul>
    @endif

    <div class="content">
        <div class="row text-col-2">
            {{ $page->block('description') }}
        </div>
    </div>

    @if (isset($news) && is_object($news) && $news->count())
        <div class="recent-news">
            <div class="content">
                <p class="head-title">
                    <a href="{{ URL::route('page', pageslug('news')) }}">
                        {{ trans("interface.news") }}
                    </a>
                </p>
                @foreach ($news as $new)
                    <a href="{{ URL::route('app.news_one', ['slug' => $new->slug]) }}" class="unit">
                        <time>{{ Carbon::createFromFormat('Y-m-d', $new->published_at)->format('d.m.Y') }}</time>
                        <div class="title">{{ $new->news_name }}</div>
                        <div class="desc">{{ $new->preview }}</div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif


    @if (count($tenders))
        <div class="tenders-holder">
            <div class="tenders">
                <p class="tender-title">
                    <a href="{{ URL::route('page', pageslug('tenders')) }}">
                        Тендеры
                    </a>
                </p>
                <div class="tender fotorama" data-width="960" data-height="150" data-autoplay="3000" data-click="false" data-swipe="false">

                    @foreach($tenders as $tender)

                        <div class="tender-item">
                            <div class="tender-left">
                                <p class="dead-line">Заявки<br> принимаются до:</p>
                                <span class="dead-line-date">{{ Carbon::createFromFormat('Y-m-d', $tender->published_at)->format('d.m.Y') }}</span>
                            </div>

                            <div class="tender-right">
                                <h3 class="tender-header">{{ $tender->name }}</h3>

                                <p class="tender-text">{{ $tender->description }}</p>

                                <a href="{{ URL::route('page', pageslug('tenders')) }}"></a>

                                @if (false)
                                    <?
                                    $fields = ['upload1', 'upload2', 'upload3'];
                                    ?>
                                    @foreach ($fields as $field)
                                        @if (is_object($tender->$field))
                                            <?
                                            $temp = explode('.', $tender->$field->original_name);
                                            $format = last($temp);
                                            ?>
                                            <p class="tender-doc">
                                                <a href="{{ $tender->$field->path }}" download="{{ $tender->$field->original_name }}">{{ $tender->$field->original_name }}</a>
                                                ({{ $format }}, {{ ceil(($tender->$field->filesize)/1024) }} кб)
                                            </p>
                                        @endif
                                    @endforeach
                                    <p class="tender-doc">
                                        Подача заявок — на электронной торговой площадке <a href="{{ $tender->link }}">{{ $tender->type }}</a>
                                    </p>
                                @endif
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    @endif

    <div class="ivan-link">
        <div class="logo">
            {{ trans("interface.ivan-logo") }}
        </div>
        <p>{{ trans("interface.index.savvidi") }}</p>
        <a href="http://savvidi.ru/" target="_blank">www.savvidi.ru</a>
    </div>

    @if (isset($projects) && is_object($projects) && $projects->count())
        <div class="projects-grid">
            <div class="head-title">
                <a href="{{ URL::route('page', pageslug('projects'))  }}">
                    {{ trans("interface.projects_title") }}
                </a>
            </div>
            <div class="holder">
                <?
                $i = 0;
                ?>
                @foreach ($projects as $project)
                    <div class="unit{{ $projects_count % 2 == 1 && ++$i == $projects_count ? ' wide' : '' }}">
                        <a style="background-image:url('{{ $project->is_img('image') ? $project->img_full('image') : '' }}');" class="visual"></a>
                        <div class="info">
                            <div class="title">{{ $project->project_name }}</div>
                            <div class="text">
                                {{ $project->mainpage_short }}
                            </div>
                            <a href="{{ URL::route('app.project', ['slug' => $project->slug]) }}" class="more">
                                {{ trans("interface.more") }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@stop


@section('scripts')
@stop