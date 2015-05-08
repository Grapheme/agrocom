<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>


<header class="big">
    <div class="holder">
        <div class="logo-wrapper">
            <a href="{{ URL::route('mainpage', ['lang' => Config::get('app.locale')]) }}" class="logo">
                <img src="{{ Config::get('site.theme_path') }}/images/logo_2_duga_2.svg" class="duga1" />
                {{ trans("interface.logo.top-big") }}
                <img src="{{ Config::get('site.theme_path') }}/images/logo_2_duga_1.svg" class="duga2" />
            </a>
        </div>

        @include(Helper::layout('header_navi'))

    </div>
    <div class="shadow"></div>
</header>