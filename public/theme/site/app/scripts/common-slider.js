
$(document).ready(function() {
  $('.common-slider').each(function(){
    
    function prerender(newIndex) {
      if (newIndex==0) {
        $prev.css({
          visibility: 'hidden'
        });
      } else {
        $prev.css({
          visibility: 'visible'
        });
      };
      
      if (newIndex==_count) {
        $next.css({
          visibility: 'hidden'
        });
      } else {
        $next.css({
          visibility: 'visible'
        });
      }
      $numbers.text((newIndex+1)+'/'+(_count+1))
    }
    
    var _count = $(this).find('>li').size()-1;
    var $slider = $(this).bxSlider({
      pager: false,
      infiniteLoop: false,
      controls: false,
      onSliderLoad: function($el, currentIndex){
        prerender(currentIndex);
      },
      onSlideBefore: function($slideElement, oldIndex, newIndex){
        prerender(newIndex);
      }
    });
    var $next = $(this).closest('.bx-wrapper').prev('.common-slider-controls').find('.next');
    var $prev = $(this).closest('.bx-wrapper').prev('.common-slider-controls').find('.prev');
    var $numbers = $(this).closest('.bx-wrapper').prev('.common-slider-controls').find('.numbers');

    $next.click(function(e){
      e.preventDefault();
      $slider.goToNextSlide();
    });
    $prev.click(function(e){
      e.preventDefault();
      $slider.goToPrevSlide();
    });
  });
});