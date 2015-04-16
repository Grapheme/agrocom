/* jshint devel:true */
//console.log('\'Allo \'Allo!');
$(document).ready(function() {
  $('.news-list').jscroll({
    contentSelector: '.news-list .unit',
    callback: function(){
      _AGROKOM_render_slider();
    }
  });
})