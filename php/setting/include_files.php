<?php

/* -------------------------------------------------------------
//  CSS,JSファイルの読込
// ------------------------------------------------------------*/
// ヘッダーにファイル追加
function import_files_to_header() {
  wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', false, filemtime(get_stylesheet_directory() . '/style.css') );
  if ( is_post_type_archive( array('nag-c','ueda','saku') ) || is_singular( array('nag-c','ueda','saku') ) ) {
    wp_enqueue_style( 'swiper', get_stylesheet_directory_uri() . '/assets/js/swiper/swiper-bundle.min.css');
  }
  //日付ピッカー
  if( is_page( 'reserve' ) ){
    wp_enqueue_style( 'jquery-ui-css', get_stylesheet_directory_uri() . '/assets/js/jquery-ui.min.css' );
  }
}
add_action( 'wp_enqueue_scripts', 'import_files_to_header' );

// フッターにファイル追加
function import_files_to_footer() {
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/js/main.min.js', false, filemtime(get_stylesheet_directory() . '/assets/js/main.min.js') );
  if ( is_front_page() ){
    wp_enqueue_script( 'loading', get_stylesheet_directory_uri() . '/assets/js/loading.min.js', false, filemtime(get_stylesheet_directory() . '/assets/js/loading.min.js') );
  }
  if ( is_post_type_archive( array('nag-c','ueda','saku') ) || is_singular( array('nag-c','ueda','saku') ) ) {
    wp_enqueue_script( 'swiper', get_stylesheet_directory_uri() . '/assets/js/swiper/swiper-element-bundle.min.js');
    wp_enqueue_script( 'run-swiper', get_stylesheet_directory_uri() . '/assets/js/swiper/run-swiper.min.js', false, filemtime(get_stylesheet_directory() . '/assets/js/swiper/run-swiper.min.js') );
  }
  if ( is_page( array('choose-from-design-nag-c','choose-from-design-ueda','choose-from-design-saku') ) ) {
    wp_enqueue_script( 'choose', get_stylesheet_directory_uri() . '/assets/js/choose.min.js', false, filemtime(get_stylesheet_directory() . '/assets/js/choose.min.js') );
  }
  if ( is_page( array('nag-c-calendar','ueda-calendar','saku-calendar') ) ) {
    wp_enqueue_script( 'scroll-hint', get_stylesheet_directory_uri() . '/assets/js/scroll-hint.min.js' );
  }
  //日付ピッカー
  if( is_page( 'reserve' ) ){
    wp_enqueue_script( 'jquery-ui', get_stylesheet_directory_uri() . '/assets/js/jquery-ui.min.js' );
    wp_enqueue_script( 'jquery.ui.datepicker-ja', get_stylesheet_directory_uri() . '/assets/js/jquery.ui.datepicker-ja.min.js' );
    wp_enqueue_script( 'reserve', get_stylesheet_directory_uri() . '/assets/js/reserve.min.js', false, filemtime(get_stylesheet_directory() . '/assets/js/reserve.min.js') );
  }
  /* ajaxzip3
  if ( is_page('inquiry') ) {
    wp_enqueue_script( 'ajaxzip3', get_stylesheet_directory_uri() . '/assets/js/ajaxzip3.min.js', true, array());
    wp_enqueue_script( 'ajaxzip3-run', get_stylesheet_directory_uri() . '/assets/js/ajaxzip3-run.min.js', true, array());
  }
   */
}
add_action('wp_footer', 'import_files_to_footer');
?>