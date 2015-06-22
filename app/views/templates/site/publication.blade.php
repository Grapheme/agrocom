<?
/**
 * TITLE: Страница одной публикации
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
$seo = $press->seo;
$page_title = $press->press_name;
?>


@section('body_class') news news-detail @stop


@section('content')

    <div class="sub-header">

        {{ Menu::placement('news_press') }}

    </div>


    <div class="content">
        <h1>
            {{ $press->press_name }}
        </h1>
        <div class="date">
            {{ Carbon::createFromFormat('Y-m-d', $press->published_at)->format('d.m.Y') }}
        </div>

        <br/>

        {{ $press->preview }}

        @if ($press->is_img('image'))
            <div class="poster">
                <img src="{{ $press->image->full() }}">
            </div>
        @endif

        <br/>
        <div class="text-col-2">
          {{ $press->content }}
        </div>
    </div>

@stop