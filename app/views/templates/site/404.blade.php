<?
/**
 * TITLE: Ошибка 404
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>
@extends(Helper::layout())
<?
$page_title = '404';
?>


@section('body_class') error-404 @stop


@section('content')

    <div class="error-block-holder">
        <div class="error-block">
            <div class="center-hack"></div>
            <div class="not-found">
                <p>
                    {{ trans("interface.error.404.title") }}
                </p>
            </div>
            <div class="number">
                <p>404</p>
            </div>
            <div class="message">
                <p>
                    {{ trans("interface.error.404.description") }}
                </p>
            </div>
        </div>
    </div>

@stop


@section('scripts')
@stop
