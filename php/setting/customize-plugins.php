<?php

/* -------------------------------------------------------------
//  All in one ：　アーカイブやカスタム投稿でも機能するようにする
// ------------------------------------------------------------*/
//ディスクリプション
function my_description( $description ){
  if( is_archive() ){
    $description = 'ディスクリプションを入力';
  } elseif( is_post_type_archive() ){
    $description = '';
  }
  return $description;
}
add_filter('aioseop_description', 'my_description');

//キーワード
function my_keywords($keywords){
  if(is_archive()){
    $keywords = 'キーワードを入力';
  } elseif( is_post_type_archive() ){
    $description = '';
  }
  return $keywords;
}
add_filter('aioseop_keywords', 'my_keywords');

/* -------------------------------------------------------------
//  All in one ：　編集画面に非表示にする
// ------------------------------------------------------------*/
function wp_custom_admin_css() { ?>
  <style type="text/css">
  #aioseo-settings {
    display:none;
  }
  </style>
  <?php }
  add_action('admin_head', 'wp_custom_admin_css', 100);


?>