<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>

<header>
    <div class="holder"><a href="{{ URL::route('mainpage') }}" class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 213.5 25.3" enable-background="new 0 0 213.5 25.3"><g fill="#fff"><path d="M66.5.2v9.7h3.8L75.5.2h2.9l-5.8 10.9v.3l5.8 13.5h-2.9l-5.2-12.2h-3.8v12.2h-2.7V.2h2.7zM2.8 25H0L4 1.2C4.1.7 4.7.1 5.3.1h4.9c.6 0 1.2.5 1.3 1.1l4 23.8h-2.8l-1-6H3.8l-1 6zM9.3 3.4C9.2 3.1 9.1 3 9 3H6.7c-.2 0-.3.1-.3.4L4.3 16.2h7.2L9.3 3.4zM21.1 3v22h-2.8V.2h11.1V3h-8.3zM40 .2c1.3 0 2.3.4 3.2 1.2.9.8 1.3 1.8 1.3 3v5.5c0 1.2-.4 2.3-1.3 3.2-.9.9-1.9 1.3-3.2 1.3h-5.6V25h-2.8V.2H40zm0 11.4c1 0 1.7-.7 1.7-1.7V4.5C41.6 3.5 41 3 40 3h-5.6v8.6H40zM46.9 4.5c0-1.2.4-2.3 1.3-3.2.9-.9 1.9-1.3 3.2-1.3h4c1.2 0 2.3.4 3.2 1.3.9.9 1.3 1.9 1.3 3.2v16.4c0 1.2-.4 2.3-1.3 3.2-.9.9-1.9 1.3-3.2 1.3h-4c-1.2 0-2.3-.4-3.2-1.3-.9-.9-1.3-1.9-1.3-3.2V4.5zm2.8 16.4c0 1 .7 1.7 1.7 1.7h4c1 0 1.7-.7 1.7-1.7V4.5c0-1-.7-1.7-1.7-1.7h-4c-1 0-1.7.7-1.7 1.7v16.4zM79.9 4.5c0-1.2.4-2.3 1.3-3.2.9-.9 1.9-1.3 3.2-1.3h4c1.2 0 2.3.4 3.2 1.3.9.9 1.3 1.9 1.3 3.2v16.4c0 1.2-.4 2.3-1.3 3.2-.9.9-1.9 1.3-3.2 1.3h-4c-1.2 0-2.3-.4-3.2-1.3-.9-.9-1.3-1.9-1.3-3.2V4.5zm2.8 16.4c0 1 .7 1.7 1.7 1.7h4c1 0 1.7-.7 1.7-1.7V4.5c0-1-.7-1.7-1.7-1.7h-4c-1 0-1.7.7-1.7 1.7v16.4zM108.8.2h5.5l.9 24.8h-2.8l-.8-22h-.3l-4.4 21.7h-2.5L99.9 3h-.3l-.9 22h-2.8l1-24.8h5.4l3.3 18 3.2-18z"/></g><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="182.617" y1="42.952" x2="148.756" y2="-15.697"><stop offset=".158" stop-color="#00B7C7"/><stop offset=".333" stop-color="#00BEC7"/><stop offset=".593" stop-color="#00D3C7"/><stop offset=".905" stop-color="#00F4C7"/><stop offset="1" stop-color="#00FFC7"/></linearGradient><path fill="url(#a)" d="M124.1 3v22.1h-2.8V.1h11.1V3h-8.3zM142.7.2c1.3 0 2.3.4 3.2 1.2.9.8 1.3 1.8 1.3 3.1V10c0 1.2-.4 2.3-1.3 3.2-.9.9-1.9 1.3-3.2 1.3h-5.6v10.7h-2.8V.2h8.4zm0 11.4c1 0 1.7-.7 1.7-1.7V4.5c0-1-.7-1.5-1.7-1.5h-5.6v8.7h5.6zm14.9 13.5h-2.8l1.6-6.9h-3.1c-.6 0-1.2-.5-1.3-1.1l-4.1-17h2.9l3.6 14.9c0 .3.2.4.3.4h2.2c.1 0 .2 0 .2-.1L160.7.1h2.8l-5.9 25zm18.2 0V2.9h-7.2v22.2h-2.8V.1h12.9v25h-2.9zm17 0V2.9h-7.2v22.2h-2.8V.1h12.9v25h-2.9zm7.8 0h-2.8l4.1-23.9c.1-.5.7-1.1 1.3-1.1h5c.6 0 1.2.5 1.3 1.1l4.1 23.9h-2.8l-1-6.1h-8.1l-1.1 6.1zm6.5-21.7c-.1-.3-.2-.4-.3-.4h-2.3c-.2 0-.3.1-.3.4L202 16.2h7.2l-2.1-12.8z"/></svg>
            <!--img(src="/images/logo.svg")--></a>

        @if (NULL !== ($route = Route::getCurrentRoute()) && is_object($route))
            <?
            #dd($route);
            $langs = [
                'ru' => 'rus',
                'en' => 'eng',
            ];
            ?>
            <div class="lang-sw">
                @foreach ($langs as $lang_sign => $lang_text)
                    <a href="{{ URL::route($route->getName(), ['lang' => $lang_sign] + $route->parameters()) }}" @if($lang_sign == $route->getParameter('lang')) class="active" @endif>{{ $lang_text }}</a>
                @endforeach
            </div>
        @endif

        {{ Menu::placement('main_menu') }}

    </div>
    <div class="shadow"></div>
</header>