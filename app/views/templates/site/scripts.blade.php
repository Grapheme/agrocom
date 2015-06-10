<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>

    {{ HTML::scriptmod(Config::get('site.theme_path').'/scripts/vendor.js') }}
    {{ HTML::scriptmod(Config::get('site.theme_path').'/scripts/main.js') }}
    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-17193616-18', 'auto');
  ga('send', 'pageview');

</script>