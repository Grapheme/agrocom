<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>
<?
## Бизнесы для футера - будем их кешировать
$business_all = Cache::get('app.business_all');
if (!$business_all) {
    $business_all = Dic::valuesBySlug('business_all', function($query){
        $query->orderBy('lft', 'ASC');
        $query->orderBy('id', 'ASC');
    }, ['fields'], true, true, true);
    $business_all = DicLib::loadImages($business_all, ['logo']);
    #Helper::tad($business_all);
    Cache::put('app.business_all', $business_all, 60);
    echo "<!-- From DB -->";
} else {
    echo "<!-- From cache -->";
}
?>

<footer>
    <div class="logos-line-wrapper">
        <div class="holder">
            <div class="logos-line">
                <div class="wrapper"><!--
                    @if (isset($business_all) && count($business_all))
                        @foreach ($business_all as $tmp)
                            --><a href="{{ $tmp->link }}" class="unit"><img src="{{ $tmp->img_full('logo') }}" /></a><!--
                        @endforeach
                    @endif
                    -->
                </div>
            </div>
            <div class="logo"><img src="{{ Config::get('site.theme_path') }}/images/logo-agrokom-small.png" /></div>
        </div>
    </div>
    <div class="real-footer">
        <div class="company"><strong>ООО «ГРУППА АГРОКОМ»<br></strong><span>&copy; 2006-{{ date('Y') }}</span></div>
        <div class="address">344002, г. Ростов-на-Дону<br>ул. Красноармейская, 170</div>
        <div class="contacts">
            Тел. приемная +7 863 250-58-10,<br> факс +7 863 290-71-16<br> <br> Дирекция по корпоративным коммуникациям<br> +7 863 250-58-14
        </div>
    </div>
</footer>