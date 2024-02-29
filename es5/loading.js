(function ($) {

  /* --------------------------------------------------
    ローディング https://jito-site.com/jquery-loading-screen-animation/
  -------------------------------------------------- */
  $(window).on('load',function(){
    $('.loader').delay(500).fadeIn(500);
    $('.loader').delay(2000).fadeOut(1000);
    $('.loader-bg').delay(3500).fadeOut(1000);
  });
  setTimeout(function(){
    $('.loader-bg').fadeOut(5000);
  },5000);

})(jQuery);