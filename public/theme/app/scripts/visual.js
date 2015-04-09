$(document).ready(function() {
  
  $(window).load(function() {
    setTimeout(function(){
      $('header .holder').addClass('loaded');
    }, 100)
  });
  
  function preloadImage(elem) {
    elem = $(elem);
    elem.each(function(){
      var $this = $(this);
      $('<img src="'+$this.attr('data-img')+'">').load(function(){
        $this.css({
          'background-image': 'url('+$(this).attr('src')+')'
        });
        $this.addClass('loaded');
      });
    });
  }
  
  //var $preload_visual = $('#preload-visual');
  preloadImage('#preload-visual');
  preloadImage('.visual-wide-thin');
  
  function isScrolledIntoView(elem){
    var $elem = $(elem);
    var $window = $(window);
 
    var docViewTop = $window.scrollTop();
    var docViewBottom = docViewTop + $window.height();
 
    var elemTop = $elem.offset().top;
    var elemBottom = elemTop + $elem.height();
 
    //return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    return docViewBottom >= elemTop
  }
  
  $(window).scroll(function(){
    $('body > .content > *, body > .content > .center > *, body > .visual-wide-thin, footer .logos-line').each(function(){
      if (isScrolledIntoView(this)) {
        $(this).addClass('on-screen');
      } else {
        //$(this).removeClass('on-screen');
      }
    });
  });
  
  $(window).resize(function(){
    $(window).scroll();
  });
  
  $(window).scroll();
  
});