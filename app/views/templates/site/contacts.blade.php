<?
/**
 * TITLE: Контакты
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())


@section('content')

    <div class="sub-header">
        <h1 class="title">Контактная информация</h1>
    </div>
    <div class="content">
        <div class="row">
            <div class="address">

                {{ $page->block('contacts') }}

            </div>
            <div class="map"><div id="MyGmaps" style="width:480px;height:374px;"></div></div>
        </div>
    </div>
    <div class="grey">
        <div class="content">

            {{ $page->block('filials') }}

        </div>
    </div>


@stop


@section('scripts')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>
        var _AGROKOM_coords = [{{ $page->block('coords') }}];
    </script>
@stop