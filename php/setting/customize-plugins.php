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
// function my_keywords($keywords){
//   if(is_archive()){
//     $keywords = 'キーワードを入力';
//   } elseif( is_post_type_archive() ){
//     $description = '';
//   }
//   return $keywords;
// }
// add_filter('aioseop_keywords', 'my_keywords');

//投稿画面から「All in One SEO Pack」を削除する（管理者と編集者は表示）
if ( is_admin() ) {
  if ( !( current_user_can( 'administrator' ) || current_user_can( 'editor' ) ) ) {
    function wp_custom_admin_css() { ?>
    <style type="text/css">
      label[for="aioseo-settings-hide"],
      #aioseo-settings {
        display:none;
      }
    </style>
    <?php }
    add_action('admin_head', 'wp_custom_admin_css', 100);
  }
}


?>