<?
/**
 * TITLE: Страница одного бизнеса
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
$seo = $business->seo;
$page_title = $business->name;
?>


@section('content')

    <div id="preload-visual" data-img="{{ is_object($business->header_bg_image) ? $business->header_bg_image->full() : '' }}" class="visual-wide">
        <div class="logo">
            <img src="{{ is_object($business->logo) ? $business->logo->full() : '' }}">
        </div>
        <div class="holder">
            <h1 class="title">

                {{ $business->header_title }}

            </h1>
            <div class="teaser">

                {{ nl2br($business->header_desc) }}

            </div>
        </div>
    </div>
    <div class="content">
        <h2>
            {{ $business->business_name }}
        </h2>

        <div class="row col-2">
            <div class="info">
                {{ $business->desc }}
            </div>
            <div class="address">
                {{ $business->contacts }}
            </div>
        </div>
        <div class="center">

            {{ $business->content }}

        </div>
    </div>
    <div data-img="http://puu.sh/h6e9S/5c2e19869e.png" class="visual-wide-thin"></div>
    <div class="content">
        <h2>
            {{ $business->company_title }}
        </h2>

        <div class="row col-2">
            <div class="info">
                <p>
                    {{ $business->company_short }}
                </p>
            </div>
            <div class="address">
                    {{ $business->company_contacts }}
            </div>
        </div>
        <div class="center">

            {{ $business->company_full }}

        </div>
    </div>

@stop


@section('scripts')
@stop