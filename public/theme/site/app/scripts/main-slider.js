$(document).ready(function() {
  var $slider = $('#main-slider'),
      $slides = $slider.find('.slide'),
      $dots = $slider.find('.dots a'),
      delay = 50*1000,
      timer;
      
  $dots.click(function(e){
    e.preventDefault();
    if (!$(this).hasClass('active')) {
      var count = $dots.size()-1;
      var cur = $dots.index($(this));
      
      $slides.removeClass('active');
      $dots.removeClass('active');
      setTimeout(function(){
        $slides.eq(cur).addClass('active');  
      }, 100);
      $(this).addClass('active');
      
      if (cur>=count) {
        var next = 0;
      } else {
        var next = cur+1;
      }
      clearTimeout(timer);
      timer = setTimeout(function(){
        $dots.eq(next).click();
      }, delay);
      
    }
  });
  
  $(window).load(function() {
    $dots.eq(0).click();
  });
});