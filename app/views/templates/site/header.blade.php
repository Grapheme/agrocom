<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>

<header>
    <div class="holder"><a href="{{ URL::route('mainpage', ['lang' => Config::get('app.locale')]) }}" class="logo">
            {{ trans("interface.logo.top-mini") }}
            <!--img(src="/images/logo.svg")--></a>

        @include(Helper::layout('header_navi'))

    </div>
    <div class="shadow"></div>
</header>