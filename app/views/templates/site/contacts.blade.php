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
              <p class="form-head">
                  {{ trans("interface.feedback.form_title") }}
              </p>
              <form id="feed-back-form" action="{{ URL::route('ajax.send-message') }}" method="POST">
                <p class="field-title">
                    {{ trans("interface.feedback.name") }}
                </p>
                <input type="text" name="name">
                <p class="field-title">
                    {{ trans("interface.feedback.email") }}
                </p>
                <input type="text" name="email">
                <p class="field-title">
                    {{ trans("interface.feedback.message") }}
                </p>
                <textarea name="content" class="message"></textarea>
                <button type="submit">
                    {{ trans("interface.feedback.send") }}
                </button>
                <div class="form-error js-form-error"></div>
              </form>
            </div>
            <div class="form-holder final">
              <p class="form-head js-form-success">Сообщение успешно отправлено</p>
            </div>
            <!-- ФОРМА ОБРАТНОЙ СВЯЗИ -->
            <div class="map"><div id="MyGmaps" style="width:960px;height:450px;"></div></div>
        </div>

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
            'required': '{{ trans("interface.feedback.msg.required") }}',
            'email_format': '{{ trans("interface.feedback.msg.email_format") }}',
            'status_success': '{{ trans("interface.feedback.msg.status_success") }}',
            'status_error': '{{ trans("interface.feedback.msg.status_error") }}'
        };
    </script>
@stop