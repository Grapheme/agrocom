function LoadGmaps(){if("object"==typeof _AGROKOM_coords){var e=new google.maps.LatLng(_AGROKOM_coords[0],_AGROKOM_coords[1]),o={zoom:16,center:e,disableDefaultUI:!0,panControl:!1,zoomControl:!0,zoomControlOptions:{style:google.maps.ZoomControlStyle.SMALL},mapTypeControl:!0,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.DROPDOWN_MENU},streetViewControl:!0,mapTypeId:google.maps.MapTypeId.ROADMAP},i=new google.maps.Map(document.getElementById("MyGmaps"),o);new google.maps.Marker({position:e,map:i,title:"344002, г. Ростов-на-Дону, ул. Красноармейская, 170"})}}$(document).ready(function(){$("#feed-back-form").validate({rules:{name:"required",email:{required:!0,email:!0},message:"required"},messages:{name:"Обязательное поле!",email:{required:"Обязательное поле!",email:"Неверный формат. Попробуйте еще!"},message:"Обязательное поле!"},submitHandler:function(e){var o=$(e).attr("action"),i=$(e).serialize(),n=$(e).attr("method")||"POST";$(".js-form-error").hide(),$.ajax({type:n,url:o,data:i}).done(function(e){e.responseText&&1==e.status&&($(".js-form-success").html(e.responseText),$(".form-holder").slideUp(),$(".form-holder.final").slideDown()),!e.status&&e.responseText&&$(".js-form-error").show().html(e.responseText)}).fail(function(e){$(".js-form-error").show().html("Server error")})}})}),$(document).ready(function(){var e,o=$("#main-slider"),i=o.find(".slide"),n=o.find(".dots a"),t=5e4;if(Modernizr.csstransitions)var s=0;else var s=100;n.click(function(o){if(o.preventDefault(),!$(this).hasClass("active")){var r=n.size()-1,a=n.index($(this));if(i.removeClass("active"),n.removeClass("active"),setTimeout(function(){i.eq(a).addClass("active")},s),$(this).addClass("active"),a>=r)var d=0;else var d=a+1;clearTimeout(e),e=setTimeout(function(){n.eq(d).click()},t)}}),$(window).load(function(){n.eq(0).click()})});var _AGROKOM_render_slider;$(document).ready(function(){(_AGROKOM_render_slider=function(){$(".common-slider").each(function(){function e(e){i.css(0==e?{visibility:"hidden"}:{visibility:"visible"}),o.css(e==t?{visibility:"hidden"}:{visibility:"visible"}),n.text(e+1+"/"+(t+1))}if(!$(this).data("slder")){var o=$(this).prev(".common-slider-controls").find(".next"),i=$(this).prev(".common-slider-controls").find(".prev"),n=$(this).prev(".common-slider-controls").find(".numbers"),t=$(this).find(">li").size()-1,s=$(this).bxSlider({pager:!1,infiniteLoop:!1,controls:!1,onSliderLoad:function(o,i){e(i)},onSlideBefore:function(o,i,n){e(n)}});$(this).data("slider",s),o.click(function(e){e.preventDefault(),s.goToNextSlide()}),i.click(function(e){e.preventDefault(),s.goToPrevSlide()})}})})()});var _AGROKOM_isScrolledIntoView;$(document).ready(function(){function e(e){e=$(e),e.each(function(){var e=$(this),o=e.attr("data-img")||null;o?$('<img src="'+e.attr("data-img")+'">').load(function(){e.css({"background-image":"url("+$(this).attr("src")+")"}),e.addClass("loaded")}):e.addClass("loaded")})}function o(e){if(e){{var o=$(e),i=$(window),n=i.scrollTop(),t=n+i.height(),s=o.offset().top;s+o.height()}return t>=s}return!1}$("header").hasClass("big")&&$("header .holder").addClass("loaded"),$("#main-slider .preloader-wrapper .preloader").addClass("loaded"),$(window).load(function(){$("#main-slider .preloader-wrapper .preloader").removeClass("loaded"),setTimeout(function(){$("header .holder").addClass("loaded"),$(".sub-header").addClass("loaded"),$("#main-slider").addClass("loaded"),$(".slogan").addClass("loaded")},100)}),e("#preload-visual"),e(".visual-wide-thin"),e("#main-slider .slide"),_AGROKOM_isScrolledIntoView=o,$(window).scroll(function(){$("body > .content > *, body > .grey > .content > .unit, body > .two-columns > article > .content > .center > *, body > .recent-news > .content > *, body > .content .news-list .unit, body > .content > .center > *, body > .visual-wide-thin, footer .logos-line, .projects-grid .unit").each(function(e){if(o(this)){var i=$(this);$(this).closest(".projects-grid").size()?setTimeout(function(){i.addClass("on-screen")},0):i.addClass("on-screen")}})}),$(window).resize(function(){$(window).scroll()}),$(window).scroll()}),$(document).ready(function(){function e(){var e=$(".page-nav a.next");if(e.size()>0&&_AGROKOM_isScrolledIntoView(e)){var o=e.attr("href");e.remove(),$.ajax({url:o,success:function(e){var o=$(e).find(".inf-scroll > *");$(".inf-scroll").append(o),_AGROKOM_render_slider(),$(window).scroll()}})}}$(".inf-scroll").size()>0&&$(window).scroll(function(){e()})}),$(document).ready(function(){LoadGmaps()});