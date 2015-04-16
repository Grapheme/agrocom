<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>


<header class="big">
    <div class="holder">
        <div class="logo-wrapper">
            <a href="{{ URL::route('mainpage') }}" class="logo">
                <img src="{{ Config::get('site.theme_path') }}/images/logo_2_duga_2.svg" class="duga1"/>
                <img src="{{ Config::get('site.theme_path') }}/images/logo_2_text.svg" class="text"/>
                <img src="{{ Config::get('site.theme_path') }}/images/logo_2_duga_1.svg" class="duga2"/>
            </a>
        </div>
        <div class="lang-sw">
            <a href="/ru/" class="active">rus</a>
            <a href="/en/">eng</a>
        </div>

        {{ Menu::placement('main_menu') }}

    </div>
    <div class="shadow"></div>
</header>