## Мультиязычность

Для реализации мультиязычности достаточно добавить к роуту или группе роутов префикс {lang}, например так:

```php
Route::group(array('prefix' => '{lang}'), function() {
    Route::get('/article/{id}', array('as' => 'article', 'uses' => 'ArticleController@getArticle'));
});
```

Или так:

```php
Route::get('/{lang}/article/{id}', array('as' => 'article', 'uses' => 'ArticleController@getArticle'));
```

Система сама будет заменять данный сегмент на текущую активную локаль (Config::get('app.locale')):

```php
URL::route('article', 123) => /en/article/123
```

Для генерации ссылки на страницу с другим языком достаточно просто передать нужную локаль в параметрах маршрута:

```php
URL::route('article', ['lang' => 'ru', 'id' => 123]) => /ru/article/123
## или так:
URL::route('article', ['lang' => 'ru', 123]) => /ru/article/123
```

Следует отметить, что доступны будут только те локали, которые определены в конфиге (Config::get('app.locales')):

```php
'locales' => array(
    'ru' => 'Русский',
    'en' => 'English',
),
```

Все методы контроллеров, которые будут обрабатывать мультиязычные роуты, первым параметром должны принимать параметр $lang:

```php
public function getArticle($lang, $id) {
    ...
}
```

## Locale switcher

Пример реализации кнопок переключения между языковыми версиями - с поддержкой главной страницы и с сохранением урл-адреса текущей страницы (при условии, что роут текущей страницы имеет префикс {lang}):

```php
@if (NULL !== ($route = Route::getCurrentRoute()) && is_object($route))
    <?
    $route_name = $route->getName();
    $route_lang = $route->getParameter('lang');
    $langs = [
        'ru' => 'rus',
        'en' => 'eng',
    ];
    ?>
    <div class="lang-sw">

        @foreach ($langs as $lang_sign => $lang_text)

            <?
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
            ?>

            <a href="{{ URL::route($route_name, $route_params) }}" class="{{ $class }}">{{ $lang_text }}</a>

        @endforeach
        
    </div>
@endif
```

## Принцип работы мультиязычности

Для реализации мультиязычности используются модифицированные классы движка Laravel 4.2 с добавлением необходимых методов и свойств. Все они находятся в /app/lib/:
CustomRoute, CustomRouteFacade, CustomRouter, CustomRoutingServiceProvider, CustomURL, CustomUrlGenerator, CustomUrlServiceProvider
В файле /app/config/app.php добавлены необходимые сервис-провайдеры:

```php
        'Sngrl\Routing\CustomUrlServiceProvider',
        'Sngrl\Routing\CustomRoutingServiceProvider',
```

Там же переопределены некоторые алиасы:

```php
		#'Route'           => 'Illuminate\Support\Facades\Route',
		'Route'           => 'Sngrl\Support\Facades\CustomRoute',
        #'URL'             => 'Illuminate\Support\Facades\URL',
        'URL'             => 'Sngrl\Support\Facades\CustomURL',
```

Также в файле /app/routes.php объявлен следующий паттерн для переменной {lang}:

```php
Route::pattern('lang', implode('|', array_keys(Config::get('app.locales'))))
    ->defaults('lang', Config::get('app.locale'))
;
```

Он делает возможными для использования только те локали, которые указаны в файле /app/config/app.php в секции locales.
Также устанавливается значение для паттерна по умолчанию, которое используется в том случае, если значение не передано явно (данный функционал не является стандартным для Laravel, и был реализован самостоятельно).