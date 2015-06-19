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
      $('#main-slider').addClass('loaded');
      $('.slogan').addClass('loaded');
    }, 100)
  });
  
  $('.sub-header').addClass('loaded');
  
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
  
  var _svg = '<?xml version="1.0" encoding="utf-8"?> <!-- Generator: Adobe Illustrator 18.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0) --> <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"> <svg version="1.1" id="play" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 61.8 61.8" enable-background="new 0 0 61.8 61.8" xml:space="preserve"> <path id="opacity" opacity="0.4" fill="#FFFFFF" d="M30.9,7c13.2,0,23.9,10.7,23.9,23.9S44.1,54.8,30.9,54.8S7,44.1,7,30.9 S17.7,7,30.9,7 M30.9,0C13.8,0,0,13.8,0,30.9s13.8,30.9,30.9,30.9C48,61.8,61.8,48,61.8,30.9S48,0,30.9,0L30.9,0z"/> <polygon id="_x3E_" fill="#FFFFFF" points="24.5,21.2 41.3,30.9 24.5,40.6 "/> <g id="round_x5F_1"> <path fill="#FFFFFF" d="M0,30.9h7C7,17.8,17.6,7.2,30.6,7V0C13.7,0.2,0,13.9,0,30.9z"/> <path fill="#FFFFFF" d="M54.8,30.9c0,13.2-10.7,23.9-23.9,23.9c0,0,0,0,0,0v7c0,0,0,0,0,0C48,61.8,61.8,48,61.8,30.9H54.8z"/> </g> <g id="round_x5F_2"> <path fill="#FFFFFF" d="M0,30.9h7C7,17.8,17.6,7.2,30.6,7V0C13.7,0.2,0,13.9,0,30.9z"/> <path fill="#FFFFFF" d="M54.8,30.9c0,13.2-10.7,23.9-23.9,23.9c0,0,0,0,0,0v7c0,0,0,0,0,0C48,61.8,61.8,48,61.8,30.9H54.8z"/> </g> </svg>';
  
  $('.video .preview').each(function(){
    $(this).append(_svg);
  });
  
  $('.video .preview').click(function(e){
    e.preventDefault();
    var $iframe = $(this).closest('.video').find('iframe');
    var _src = $iframe.attr('src');
    $iframe.attr('src', _src+'&autoplay=1');
    $(this).fadeOut();
  });
  
});