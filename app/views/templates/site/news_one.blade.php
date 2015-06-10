<?
/**
 * TITLE: Страница одной новости
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
$seo = $new->seo;
$page_title = $new->news_name;
?>


@section('body_class') news @stop


@section('content')

    <div class="sub-header">

        {{ Menu::placement('news_press') }}

    </div>


    <div class="content">
        <h1>
            {{ $new->news_name }}
        </h1>
        <div class="date">
            {{ Carbon::createFromFormat('Y-m-d', $new->published_at)->format('d.m.Y') }}
        </div>

        <br/>

        {{ $new->preview }}

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

        <br/>

        {{ $new->content }}

    </div>

@stop