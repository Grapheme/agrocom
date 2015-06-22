$(document).ready(function() {
  if ($('.inf-scroll').size()>0) {
    function loadNextPage(){
      var $next_a = $('.page-nav a.next');
      var $nav =  $('.page-nav');
      if ($next_a.size()>0 && _AGROKOM_isScrolledIntoView($next_a)) {
        var next_url = $next_a.attr('href');
        $next_a.remove();
        
        $.ajax({
          url: next_url,
          success: function(raw){
            $nav.slideUp(300, function(){
              $(this).remove();
            })
            var data = $(raw).find('.inf-scroll > *');
            $('.inf-scroll').append(data);
            _AGROKOM_render_slider();
            $(window).scroll();
          }
        });
      }
    }
    
    $(window).scroll(function(){
      loadNextPage();
    })
  }
});