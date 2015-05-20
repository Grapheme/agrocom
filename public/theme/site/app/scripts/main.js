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
			email: 'Неверный формат. Попробуйте еще!'
		},
		message: 'Обязательное поле!'
	},
 	submitHandler: function(form) {
     var _url = $(form).attr('action'),
         _data = $(form).serialize(),
         _method = $(form).attr('method')||'POST';
     $.ajax({
       type: _method,
       url: _url,
       data: _data,
       success: function(data) {
         $('.form-holder').slideUp();
         $('.form-holder.final').slideDown();
       }
 	 });
 	}
 })
})