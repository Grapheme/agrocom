/* jshint devel:true */
//console.log('\'Allo \'Allo!');
$(document).ready(function() {
  
  $("#feed-back-form").validate({
    rules: {
      name: 'required',
      email: {
      required: true,
      email: true
    },
      message: 'required'
    },
    messages: {
      name: 'Обязательное поле!',
      email: {
        required: 'Обязательное поле!',
        email: 'Неверный формат!'
      },
      message: 'Обязательное поле!'
    },
    submitHandler: function(form) {
     var _url = $(form).attr('action'),
         _data = $(form).serialize(),
         _method = $(form).attr('method')||'POST';
         $('.js-form-error').hide();
         $('.form-holder [type="submit"]').attr('disabled', 'disabled');
      $.ajax({
        type: _method,
        url: _url,
        data: _data
      }).done(function(data){
        if(data.status == true) {
          //$('.js-form-success').html(data.responseText);
          $('.form-holder').slideUp();
          $('.form-holder.final').slideDown();
        }
        if(!data.status && data.responseText) {
          $('.js-form-error').show().html(data.responseText);
        }
      }).fail(function(data){
        $('.js-form-error').show().html('Server error');
      }).always(function(){
        $('.form-holder [type="submit"]').removeAttr('disabled');
      });
    }
  });

  $(function () {
    $('.fotorama').fotorama({
      nav: false,
    });
  });
});