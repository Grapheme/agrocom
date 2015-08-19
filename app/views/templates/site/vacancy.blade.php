<?
/**
 * TITLE: Вакансия
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>
@extends(Helper::layout())
<?
$seo = $vacancy->seo;
$page_title = $vacancy->name;
?>


@section('body_class') press @stop


@section('content')

    <div class="center vacansies">

        <h1>{{ $vacancy->name }}</h1>

        {{ $vacancy->description }}

        <a class="mail-button" href="mailto:{{ Config::get('app.settings.main.vacancy_address') }}?subject={{ ('Отклик на вакансию ' . $vacancy->name) }}">Откликнуться</a>

    </div>

@stop


@section('scripts')
@stop