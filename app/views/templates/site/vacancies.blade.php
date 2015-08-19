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

    Vacancies are here

@stop


@section('scripts')
@stop