<?
/**
 * TITLE: Раскрытие информации
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
if (isset($page) && is_object($page))
    $seo = $page->seo;
?>


@section('body_class') contacts @stop


@section('content')

    <div class="sub-header">

        {{ Menu::placement('news_press') }}

    </div>

    <div class="content">
        <div class="row">

            <h1 class="title">
                {{ $page->h1_or_name() }}
            </h1>

            @if (count($page->blocks))
                @foreach ($page->blocks as $block)
                    @if (0)
                        <h2>{{ $page->block($block->slug, 'name') }}</h2>
                    @endif
                    {{ $page->block($block->slug) }}
                @endforeach
            @endif

        </div>
    </div>

@stop


@section('scripts')
@stop