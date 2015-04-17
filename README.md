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