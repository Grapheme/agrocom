
var _AGROKOM_render_slider;

$(document).ready(function() {
  _AGROKOM_render_slider = function() {
    $('.common-slider').each(function(){
      if (!$(this).data('slder')) {
        var $next = $(this).prev('.common-slider-controls').find('.next');
        var $prev = $(this).prev('.common-slider-controls').find('.prev');
        var $numbers = $(this).prev('.common-slider-controls').find('.numbers');
        
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
        $(this).data('slider', $slider);
        
        $next.click(function(e){
          e.preventDefault();
          $slider.goToNextSlide();
        });
        $prev.click(function(e){
          e.preventDefault();
          $slider.goToPrevSlide();
        });
        
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

      }
    });
  }
  _AGROKOM_render_slider();
});