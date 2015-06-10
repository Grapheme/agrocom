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
    <div id="preload-visual" data-img="/uploads/files/1432284937_1687.jpg" class="visual-wide">
        <div class="holder">
            <div class="teaser">
                <img src="/uploads/files/1432284937_1751.png" style="margin-bottom: -67px;margin-left: 75px;">
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