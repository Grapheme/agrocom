<?
/**
 * TITLE: Вакансии
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
$vacancies = Dic::valuesBySlug('vacancies', function ($query) {

    $query->orderBy('lft', 'ASC');

}, ['fields', 'textfields'], 1, 1, 1);
#Helper::tad($vacancies);
?>


@section('body_class') press @stop


@section('content')

    <div class="center vacansies">

        <h1>Вакансии ООО «ГРУППА АГРОКОМ»</h1>

        @if (isset($vacancies) && is_object($vacancies) && $vacancies->count())
            @foreach ($vacancies as $vacancy)
                <a href="{{ URL::route('app.vacancy', [$vacancy->id]) }}">{{ $vacancy->name }}</a><br/>
            @endforeach
        @else
            <!-- no vacancies -->
        @endif

        <!-- Это вакансии отдельных партнёров. Не думаю, что им отдельный контейнер нужен -->

        {{ $page->block('other') }}

    </div>

@stop


@section('scripts')
@stop