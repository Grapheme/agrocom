function LoadGmaps(){var o=new google.maps.LatLng(47.227823,39.713598),n={zoom:16,center:o,disableDefaultUI:!0,panControl:!1,zoomControl:!0,zoomControlOptions:{style:google.maps.ZoomControlStyle.SMALL},mapTypeControl:!0,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.DROPDOWN_MENU},streetViewControl:!0,mapTypeId:google.maps.MapTypeId.ROADMAP},e=new google.maps.Map(document.getElementById("MyGmaps"),n),i=new google.maps.Marker({position:o,map:e,title:"344002, г. Ростов-на-Дону, ул. Красноармейская, 170"}),t=new google.maps.InfoWindow({content:"344002, г. Ростов-на-Дону, ул. Красноармейская, 170. <br>Приемная +7 (863) 250-58-14"});google.maps.event.addListener(i,"click",function(){t.open(e,i)})}$(document).ready(function(){});var _AGROKOM_render_slider;$(document).ready(function(){(_AGROKOM_render_slider=function(){$(".common-slider").each(function(){function o(o){e.css(0==o?{visibility:"hidden"}:{visibility:"visible"}),n.css(o==t?{visibility:"hidden"}:{visibility:"visible"}),i.text(o+1+"/"+(t+1))}if(!$(this).data("slder")){var n=$(this).prev(".common-slider-controls").find(".next"),e=$(this).prev(".common-slider-controls").find(".prev"),i=$(this).prev(".common-slider-controls").find(".numbers"),t=$(this).find(">li").size()-1,l=$(this).bxSlider({pager:!1,infiniteLoop:!1,controls:!1,onSliderLoad:function(n,e){o(e)},onSlideBefore:function(n,e,i){o(i)}});$(this).data("slider",l),n.click(function(o){o.preventDefault(),l.goToNextSlide()}),e.click(function(o){o.preventDefault(),l.goToPrevSlide()})}})})()});var _AGROKOM_isScrolledIntoView;$(document).ready(function(){function o(o){o=$(o),o.each(function(){var o=$(this);$('<img src="'+o.attr("data-img")+'">').load(function(){o.css({"background-image":"url("+$(this).attr("src")+")"}),o.addClass("loaded")})})}function n(o){if(o){{var n=$(o),e=$(window),i=e.scrollTop(),t=i+e.height(),l=n.offset().top;l+n.height()}return t>=l}return!1}$(window).load(function(){setTimeout(function(){$("header .holder").addClass("loaded"),$(".sub-header").addClass("loaded")},100)}),o("#preload-visual"),o(".visual-wide-thin"),_AGROKOM_isScrolledIntoView=n,$(window).scroll(function(){$("body > .content > *, body > .grey > .content > .unit, body > .two-columns > article > .content > .center > *, body > .recent-news > .content > *, body > .content .news-list .unit, body > .content > .center > *, body > .visual-wide-thin, footer .logos-line").each(function(){n(this)&&$(this).addClass("on-screen")})}),$(window).resize(function(){$(window).scroll()}),$(window).scroll()}),$(document).ready(function(){function o(){var o=$(".page-nav a.next");if(o.size()>0&&_AGROKOM_isScrolledIntoView(o)){var n=o.attr("href");o.remove(),$.ajax({url:n,success:function(o){var n=$(o).find(".inf-scroll > *");$(".inf-scroll").append(n),_AGROKOM_render_slider(),$(window).scroll()}})}}$(".inf-scroll").size()>0&&$(window).scroll(function(){o()})}),$(document).ready(function(){LoadGmaps()});