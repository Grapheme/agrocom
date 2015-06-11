<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>

@if (NULL !== ($route = Route::getCurrentRoute()) && is_object($route))
    {{--{{ $route->getName() }}--}}
    <?
    if ($route->getName() == 'mainpage') {
        #var_dump($route); die;
        #dd($route->getParameter('lang'));
    }
    $route_name = $route->getName();
    $route_lang = $route->getParameter('lang');
    $langs = [
        'ru' => 'rus',
        'en' => 'eng',
    ];
    ?>
    <div class="lang-sw">

        {{-- LOCALE SWITCHER --}}

        @foreach ($langs as $lang_sign => $lang_text)

            <?
            if ($lang_sign == Config::get('app.locale'))
                continue;

            #/*
            if (in_array($route_name, ['mainpage'])) {

                ## Если мы на главной странице (основной или языковой)
                $route_name = 'mainpage';
                $route_params = ['lang' => $lang_sign] + $route->parameters();
                $class = (
                        $route_lang == $lang_sign
                        || (
                                is_null($route_lang)
                                && Config::get('app.locale') == Config::get('app.default_locale')
                                && $lang_sign == Config::get('app.locale')
                        )
                ) ? 'active' : '';

            } else {

                ## Для всех остальных роутов, кроме главной страницы (основной или языковой)
                $route_params = ['lang' => $lang_sign] + $route->parameters();
                $class = (NULL !== ($route_lang = $route->getParameter('lang')) && $route_lang == $lang_sign) ? 'active' : '';
            }
            #*/

            ## HACK
            $class = 'active';
            ?>

{{--            <a href="{{ URL::route($route_name, $route_params) }}" class="{{ $class }}">{{ $lang_text }}</a>--}}
            <a href="{{ URL::route('mainpage', ['lang' => $lang_sign]) }}" class="{{ $class }}">{{ $lang_text }}</a>

        @endforeach
    </div>
@endif

{{ Menu::placement('main_menu') }}
