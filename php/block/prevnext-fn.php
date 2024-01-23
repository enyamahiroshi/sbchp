<?php
/* 一つ前の投稿の本文中に挿入されている最初の画像を抽出してattachment情報を取得する方法
https://8millions.net/wordpress279
*************************************************************************************/
function prev_thumbnail_image() {
global $post;
$image = '';
$get_size = 'thumbnail';
$prev_post = get_previous_post(true);
if(is_post_type_archive(array('works', 'kurumano-chie-bukuro')) || (get_post_type() === array('works', 'kurumano-chie-bukuro' )&& is_single())) {
  $prev_post = get_adjacent_post(false, '1');
  $prev_id = $prev_post->ID;
}
$image_get = preg_match_all('/<img.+class=[\'"].*wp-image-([0-9]+).*[\'"].*>/i', $prev_post->post_content, $matches);
$image_id = $matches[1][0];
$image = wp_get_attachment_image( $image_id, $get_size, false, array(
  'class' => 'thumbnail-image',   //レイアウト調整のために画像にクラスを設置
  'srcset' => wp_get_attachment_image_srcset( $image_id, $get_size ),   //高解像度対応
  'sizes' => wp_get_attachment_image_sizes( $image_id, $get_size )
));
if( empty( $image ) ) {
  $image = '';
}
return $image;
}

/* 一つ後の投稿の本文中に挿入されている最初の画像を抽出してattachment情報を取得する方法
*************************************************************************************/
function next_thumbnail_image() {
global $post;
$image = '';
$get_size = 'thumbnail';
$next_post = get_next_post(true);
if(is_post_type_archive(array('works', 'kurumano-chie-bukuro')) || (get_post_type() === array('works', 'kurumano-chie-bukuro' )&& is_single())) {
  $next_post = get_adjacent_post(false, '1', false);
  $next_id = $next_post->ID;
}
$image_get = preg_match_all('/<img.+class=[\'"].*wp-image-([0-9]+).*[\'"].*>/i', $next_post->post_content, $matches);
$image_id = $matches[1][0];
$image = wp_get_attachment_image( $image_id, $get_size, false, array(
  'class' => 'thumbnail-image',   //レイアウト調整のために画像にクラスを設置
  'srcset' => wp_get_attachment_image_srcset( $image_id, $get_size ),   //高解像度対応
  'sizes' => wp_get_attachment_image_sizes( $image_id, $get_size )
));
if( empty( $image ) ) {
  $image = '';
}
return $image;
}
?>