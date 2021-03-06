<?
/**
 * TITLE: Простая страница
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
        <h1 class="title">
            {{ $page->h1_or_name() }}
        </h1>
    </div>
    <div class="content">
        <div class="row">
            <div class="address">

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
    </div>

@stop


@section('scripts')
@stop