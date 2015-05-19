<?
/**
 * TITLE: О компании
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())


@section('header')
    @include(Helper::layout('header_about'))
@stop


@section('body_class') business @stop


@section('content')

    <div class="slogan">
        {{ nl2br(trans("interface.slogan")) }}
    </div>
    <div id="preload-visual" data-img="{{ Config::get('site.theme_path') }}/images/visual-about.jpg" class="visual-wide">
        <div class="holder">
            <div class="teaser">
                {{ trans("interface.logo.about.top") }}
            </div>
        </div>
    </div>
    <div class="content">
        <h1>
            {{ $page->h1_or_name() }}
        </h1>
    </div>
    {{ $page->block('content') }}

@stop


@section('scripts')
@stop