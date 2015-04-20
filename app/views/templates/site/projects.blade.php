<?
/**
 * TITLE: Страница одного проекта
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
#if (NULL !== ($slug = Input::get('slug')))
#    Redirect(URL::route('app.project', ['slug' => $slug]));

## Бизнесы для футера - будем их кешировать
$projects = Cache::get('app.projects', function(){
    $projects = Dic::valuesBySlug('projects', function($query){
        $query->orderBy('lft', 'ASC');
        $query->orderBy('id', 'ASC');
    }, ['fields', 'textfields'], true, true, true);
    $projects = DicLib::loadGallery($projects, ['gallery']);
    #Helper::tad($projects);
    Cache::put('app.projects', $projects, 60);
    return $projects;
});
#$projects = NULL;
#Helper::tad($projects);
if (!count($projects)) {
    Redirect(URL::route('mainpage'), '302 Found');
}

if (!isset($slug) || NULL === $slug) {
    foreach($projects as $proj) {
        break;
    }
    Redirect(URL::route('app.project', ['slug' => $proj->slug]));
}

$seo = $project->seo;
$page_title = $project->name;
?>


@section('content')

    <div class="sub-header">
        <h1>Проекты</h1>
    </div>
    <div class="two-columns">
        <aside>
            <ul>
                @foreach ($projects as $proj)
                    <li><a href="{{ URL::route('app.project', ['slug' => $proj->slug]) }}"@if($proj->slug == $slug) class="active" @endif>{{ $proj->project_name }}</a></li>
                @endforeach
            </ul>
        </aside>
        <article>
            <div class="content">
                <div class="center">

                    <h1>{{ $project->project_name }}</h1>

                    {{ $project->short }}

                    @if (is_object($project->gallery) && isset($project->gallery->photos) && is_object($project->gallery->photos) && $project->gallery->photos->count())
                        <div class="common-slider-controls"><a href="" class="prev"><span></span></a>
                            <div class="numbers"></div><a href="" class="next"><span></span></a>
                        </div>
                        <ul class="common-slider">
                            @foreach ($project->gallery->photos as $image)
                                <li><img src="{{ $image->full() }}"></li>
                            @endforeach
                        </ul>
                    @endif

                    {{ $project->full }}

                    {{ $project->contacts }}

                </div>
            </div>
        </article>
    </div>

@stop


@section('scripts')
@stop