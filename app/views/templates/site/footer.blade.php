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
    #$business_all = DicLib::loadImages($business_all, ['logo']);
    $business_all = DicLib::loadUploads($business_all, ['logo_svg']);
    #Helper::tad($business_all);
    Cache::put('app.business_all', $business_all, 60);
    #echo "<!-- From DB -->";
} else {
    #echo "<!-- From cache -->";
}
?>

<footer>
    <div class="logos-line-wrapper">
        <div class="holder">
            <div class="logos-line">
                <div class="wrapper"><!--
                    @if (isset($business_all) && count($business_all))
                        @foreach ($business_all as $tmp)
                            {{----><a href="{{ $tmp->link }}" class="unit"><img src="{{ $tmp->img_full('logo') }}" /></a><!----}}
                            --><a href="{{ $tmp->link }}" class="unit"><img src="{{ $tmp->upload('logo_svg') }}" /></a><!--
                        @endforeach
                    @endif
                    -->
                </div>
            </div>
            <div class="logo">
                {{ trans("interface.logo.bottom-small") }}
            </div>
        </div>
    </div>
    <div class="real-footer">
        <div class="company"><strong>{{ trans("interface.company.name") }}<br></strong><span>&copy; 2006-{{ date('Y') }}</span></div>
        <div class="address">
            {{ nl2br(trans("interface.company.address")) }}
        </div>
        <div class="contacts">
            {{ nl2br(trans("interface.company.phones")) }}
        </div>
        <div class="contacts">
            {{ trans("interface.facebook") }}
        </div>
    </div>
</footer>