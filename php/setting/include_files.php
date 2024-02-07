<?php

/* -------------------------------------------------------------
//  CSS,JSファイルの読込
// ------------------------------------------------------------*/
// ヘッダーにファイル追加
function import_files_to_header() {
  wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css');
  if ( is_post_type_archive( array('nag-c','ueda','saku') ) || is_singular( array('nag-c','ueda','saku') ) ) {
    wp_enqueue_style( 'swiper', get_stylesheet_directory_uri() . '/assets/js/swiper/swiper-bundle.min.css');
  }
}
add_action( 'wp_enqueue_scripts', 'import_files_to_header' );

// フッターにファイル追加
function import_files_to_footer() {
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/js/main.min.js', true, array());
  if ( is_post_type_archive( array('nag-c','ueda','saku') ) || is_singular( array('nag-c','ueda','saku') ) ) {
    wp_enqueue_script( 'swiper', get_stylesheet_directory_uri() . '/assets/js/swiper/swiper-element-bundle.min.js', true, array());
    wp_enqueue_script( 'run-swiper', get_stylesheet_directory_uri() . '/assets/js/swiper/run-swiper.min.js', true, array());
  }
  // wp_enqueue_script( 'scroll-hint', get_stylesheet_directory_uri() . '/assets/js/scroll-hint.min.js', true, array());
  /* ajaxzip3
  if ( is_page('inquiry') ) {
    wp_enqueue_script( 'ajaxzip3', get_stylesheet_directory_uri() . '/assets/js/ajaxzip3.min.js', true, array());
    wp_enqueue_script( 'ajaxzip3-run', get_stylesheet_directory_uri() . '/assets/js/ajaxzip3-run.min.js', true, array());
  }
   */
}
add_action('wp_footer', 'import_files_to_footer');
?>