<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>


<header class="big">
    <div class="holder">
        <div class="logo-wrapper">
            <a href="{{ URL::route('mainpage') }}" class="logo">
                <img src="{{ Config::get('site.theme_path') }}/images/logo_2_duga_2.svg" class="duga1" /> <img src="{{ Config::get('site.theme_path') }}/images/logo_2_text.svg" class="text" /> <img src="{{ Config::get('site.theme_path') }}/images/logo_2_duga_1.svg" class="duga2" />
            </a>
        </div>

        <?
        $route = Route::getCurrentRoute();
        $langs = [
                'ru' => 'rus', 'en' => 'eng',
        ];
        ?>

        <div class="lang-sw">
            @foreach ($langs as $lang_sign => $lang_text)
                <a href="{{ URL::route($route->getName(), ['lang' => $lang_sign] + $route->parameters()) }}" @if($lang_sign == $route->getParameter('lang')) class="active" @endif>{{ $lang_text }}</a>
            @endforeach
        </div>

        {{ Menu::placement('main_menu') }}

    </div>
    <div class="shadow"></div>
</header>