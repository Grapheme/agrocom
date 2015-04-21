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
#    Cache::put('app.business', $business, 60);
#    return $business;
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
#dd($slider);
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
{{--            <a href="{{ URL::route('app.business') }}"><img src="{{ $biz->img_full('mainpage_logo') }}"></a>--}}
        </li>
        @endforeach
{{--
        <li>
            <a href="business.html"><img src="{{ Config::get('site.theme_path') }}/images/logo-don-tabaco-mid.png"></a>
        </li>
        <li>
            <a href="business.html"><img src="{{ Config::get('site.theme_path') }}/images/logo-tavr-mid.png"></a>
        </li>
        <li>
            <a href="business.html"><img src="{{ Config::get('site.theme_path') }}/images/logo-atlantis-pack-mid.png"></a>
        </li>
        <li>
            <a href="business.html"><img src="{{ Config::get('site.theme_path') }}/images/logo-aqua-don-mid.png"></a>
        </li>
--}}
    </ul>
    @endif

    <div class="content">
        <div class="row text-col-2">

            {{ $page->block('description') }}

        </div>
    </div>
    <div class="recent-news">
        <div class="content">
            <p class="head-title">Последние новости</p>
            <a href="" class="unit">
                <time>11.12.2014</time>
                <div class="title">«Атлантис-Пак» — <br>лучший российский экспортер</div>
                <div class="desc">«Атлантис-Пак» стал победителем конкурса «Лучший российский экспортер» по итогам 2013 года.</div>
            </a>
            <a href="" class="unit">
                <time>22.11.2014</time>
                <div class="title">Мэр Ростова-на-Дону наградил бизнесменов за вклад в развитие города</div>
                <div class="desc">Мэр Ростова-на-Дону Михаил Чернышев наградил бизнесменов и руководителей организаций за вклад в развитие города.</div>
            </a>
            <a href="" class="unit">
                <time>20.10.2014</time>
                <div class="title">Сеть «Тавровские мясные лавки» вышла на крымский рынок</div>
                <div class="desc">Первая лавка тавровской розничной сети открылась 5 июля в Симферополе.</div>
            </a>
        </div>
    </div>
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