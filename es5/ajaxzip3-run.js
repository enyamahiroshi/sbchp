(function ($) {

  $( '#zip' ).keyup( function() {
    AjaxZip3.zip2addr( this, '', 'prefecture', 'address' );
  });

})(jQuery);