var arr_p = [];
$(document).ready(function() {
  
  /* this make all text into div */
  /*$('body.news-detail .content').contents().filter(function(){
    return this.nodeType !== 1;
  })
  .wrap( "<p></p>" );
  */
  /* this delete empty <p> */
  /*$('body.news-detail .content p').each(function(){
    if ($(this).text().replace(/\s+/g, '')==''){
      $(this).remove();
    }
  });*/
  
  //$('body.news-detail .content p').wrapAll( "<div class='new' />");
  /*$('body.news-detail .content p').each(function(){
    if (!$(this).prev().is('p')) {
      arr_p.push([$(this)]);
    } else {
      arr_p[arr_p.length-1].push($(this));
    }
  });*/
  
  /*$.each(arr_p, function(index,value){
    var $_this = $();
    $.each(value, function(index2, value2){
      $_this.add(value2);
    })
    $_this.wrap('<div class="new" />');
  });*/
  
  $('body.news-detail .content p').map(function() {
    if (!$(this).prev().is('p')) {
        return $(this).nextUntil(':not(p)').andSelf();
    }
  }).wrap("<div class='text-col-2' />");
  
})