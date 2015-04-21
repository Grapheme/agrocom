<?
/**
 * TITLE: Главная страница
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
#$business = Cache::get('app.business', function(){
    $business = Dic::valuesBySlug('business', function($query){
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
    $slider = Dic::valuesBySlug('slider', function($query){
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
    $news = Dic::valuesBySlug('news', function($query){
        $query->order_by_field('published_at', 'DESC');
        $query->orderBy('id', 'DESC');
        $query->limit(3);
    }, ['fields', 'textfields'], true, true, true);
    #$news = DicLib::loadImages($news, ['image']);
    #Helper::tad($news);
    #Cache::put('app.news', $news, 60);
    #return $news;
#});
#Helper::tad($news);
?>


@section('header')
    @include(Helper::layout('header_big'))
@stop


@section('content')

    <div class="slogan">
        Объединяем<br> Сохраняем<br> Приумножаем
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
                <p class="head-title">Последние новости</p>
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

    <div class="projects-grid">
        <div class="head-title">
            <a href="/projects.html">Проекты</a>
        </div>
        <div class="holder">
            <div class="unit">
                <a style="background-image:url('http://dummyimage.com/640x640');" class="visual"></a>
                <div class="info">
                    <div class="title">Продукция и разработки</div>
                    <div class="text">
                        На основе собственных научных и технологических мощностей разрабатывает системные решения для проектов цифрового телевещания в России и за рубежом.
                    </div>
                    <a href="" class="more">Подробнее</a>
                </div>
            </div>
            <div class="unit">
                <a style="background-image:url('http://dummyimage.com/640x640');" class="visual"></a>
                <div class="info">
                    <div class="title">Продукция и разработки</div>
                    <div class="text">
                        На основе собственных научных и технологических мощностей разрабатывает системные решения для проектов цифрового телевещания в России и за рубежом.
                    </div>
                    <a href="" class="more">Подробнее</a>
                </div>
            </div>
            <div class="unit">
                <a style="background-image:url('http://dummyimage.com/640x640');" class="visual"></a>
                <div class="info">
                    <div class="title">Продукция и разработки</div>
                    <div class="text">
                        На основе собственных научных и технологических мощностей разрабатывает системные решения для проектов цифрового телевещания в России и за рубежом.
                    </div>
                    <a href="" class="more">Подробнее</a>
                </div>
            </div>
            <div class="unit">
                <a style="background-image:url('http://dummyimage.com/640x640');" class="visual"></a>
                <div class="info">
                    <div class="title">Продукция и разработки</div>
                    <div class="text">
                        На основе собственных научных и технологических мощностей разрабатывает системные решения для проектов цифрового телевещания в России и за рубежом.
                    </div>
                    <a href="" class="more">Подробнее</a>
                </div>
            </div>
            <div class="unit wide">
                <a style="background-image:url('http://dummyimage.com/640x640');" class="visual"></a>
                <div class="info">
                    <div class="title">Продукция и разработки</div>
                    <div class="text">
                        На основе собственных научных и технологических мощностей разрабатывает системные решения для проектов цифрового телевещания в России и за рубежом.
                    </div>
                    <a href="" class="more">Подробнее</a>
                </div>
            </div>
        </div>
    </div>

@stop


@section('scripts')
@stop