var _AGROKOM_isScrolledIntoView;

$(document).ready(function() {
  
  if ($('header').hasClass('big')) {
    $('header .holder').addClass('loaded');
  }
  
  $('#main-slider .preloader-wrapper .preloader').addClass('loaded');
  
  $(window).load(function() {
    $('#main-slider .preloader-wrapper .preloader').removeClass('loaded');
    setTimeout(function(){
      $('header .holder').addClass('loaded');
      $('.sub-header').addClass('loaded');
      $('#main-slider').addClass('loaded');
      $('.slogan').addClass('loaded');
    }, 100)
  });
  
  function preloadImage(elem) {
    elem = $(elem);
    elem.each(function(){
      var $this = $(this);
      var data_img = $this.attr('data-img') || null;
      if (data_img) {
        $('<img src="'+$this.attr('data-img')+'">').load(function(){
          $this.css({
            'background-image': 'url('+$(this).attr('src')+')'
          });
          $this.addClass('loaded');
        });
      } else {
        $this.addClass('loaded');
      }
    });
  }
  
  //var $preload_visual = $('#preload-visual');
  preloadImage('#preload-visual');
  preloadImage('.visual-wide-thin');
  preloadImage('#main-slider .slide');
  
  function isScrolledIntoView(elem){
    if (elem) {
      var $elem = $(elem);
      var $window = $(window);
   
      var docViewTop = $window.scrollTop();
      var docViewBottom = docViewTop + $window.height();
      var elemTop = $elem.offset().top;
      var elemBottom = elemTop + $elem.height();
   
      //return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
      return docViewBottom >= elemTop
    } else {
      return false
    }
  }
  
  _AGROKOM_isScrolledIntoView = isScrolledIntoView;
  
  $(window).scroll(function(){
    $('body > .content > *, body > .grey > .content > .unit, body > .two-columns > article > .content > .center > *, body > .recent-news > .content > *, body > .content .news-list .unit, body > .content > .center > *, body > .visual-wide-thin, footer .logos-line, .projects-grid .unit').each(function(index){
      if (isScrolledIntoView(this)) {
        var $this = $(this);
        if ($(this).closest('.projects-grid').size()) {
          setTimeout(function(){
            $this.addClass('on-screen');
          }, 0);
        } else {
          $this.addClass('on-screen');
        }
      } else {
        //$(this).removeClass('on-screen');
      }
    });
  });
  
  $(window).resize(function(){
    $(window).scroll();
  });
  
  $(window).scroll();
  $( "#year, #month" ).selectmenu();
});