<?
/**
 * TITLE: Контакты
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())


@section('body_class') contacts @stop


@section('content')

    <div class="sub-header">
        <h1 class="title">
            {{ trans("interface.contacts") }}
        </h1>
    </div>
    <div class="content">
        <div class="row">
            <div class="address">

                {{ $page->block('contacts') }}

            </div>
            <!-- ФОРМА ОБРАТНОЙ СВЯЗИ -->
            <div class="form-holder">
              <p class="form-head">Форма обратной связи</p>
              <form id="feed-back-form" action="{{ URL::route('ajax.send-message') }}" method="POST">
                <p class="field-title">Ваше имя</p>
                <input type="text" name="name">
                <p class="field-title">E-mail:</p>
                <input type="text" name="email">
                <p class="field-title">Сообщение:</p>
                <textarea name="content" class="message"></textarea>
                <button type="submit">Отправить</button>
              </form>
            </div>
            <div class="form-holder final">
              <p class="form-head">Сообщение успешно отправлено!</p>
            </div>
            <!-- ФОРМА ОБРАТНОЙ СВЯЗИ -->
            <div class="map"><div id="MyGmaps" style="width:960px;height:450px;"></div></div>
        </div>

       

        <div class="map"><div id="MyGmaps" style="width:480px;height:450px;"></div></div>
      </div>

    </div>
    <div class="grey">
        <div class="content">

            {{ $page->block('filials') }}

        </div>
    </div>


@stop


@section('scripts')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>
        var _AGROKOM_coords = [{{ $page->block('coords') }}];
        var _AGROKOM_ = {
            'required': 'Обязательное поле!',
            'email_format': 'Неверный формат. Попробуйте еще!'
        };
    </script>
@stop