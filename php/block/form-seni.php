<?php
// URLパラメータを使用してフォームで自動選択を可能にする(https://www.narugaro.com/web/%E3%80%90wordpress%E3%80%91mw-wp-form%E3%82%92%E4%BD%BF%E3%81%A3%E3%81%A6%E5%89%8D%E3%83%9A%E3%83%BC%E3%82%B8%E3%81%A7%E9%81%B8%E3%82%93%E3%81%A0%E9%A0%85%E7%9B%AE%E3%82%92%E3%83%95%E3%82%A9%E3%83%BC/#functionsphp)
$shikibetsu = '211';// MW WP Form : フォームの識別値
$shikibetsuKey = 'mwform_value_mw-wp-form-' . $shikibetsu ;
function my_mwform_value( $value, $name ) {
  if($name === 'お問い合わせ項目' && !empty( $_GET['k']) && !is_array($_GET['k'])){
  return $_GET['k'];
  }
  return $value;
  }
  add_filter($shikibetsuKey, 'my_mwform_value', 10, 2);
?>