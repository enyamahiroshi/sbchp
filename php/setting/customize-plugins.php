<?php


/* -------------------------------------------------------------
//  MW WP Form ：　エラーメッセージの変更
// ------------------------------------------------------------*/
function my_error_message($error, $key, $rule){
  if($key === 'お名前' && $rule === 'noempty'){ return '未入力です'; }
  if($key === 'フリガナ' && $rule === 'noempty'){ return '未入力です'; }
  if($key === 'メールアドレス' && $rule === 'noempty'){ return '未入力です'; }
  if($key === 'お問い合わせ内容' && $rule === 'noempty'){ return '未入力です'; }
  if($key === 'agree' && $rule === 'required'){ return '同意が必要です'; }
  return $error;
}
add_filter('mwform_error_message_mw-wp-form-596', 'my_error_message', 10, 3);

function my_error_message2($error, $key, $rule){
  if($key === 'お名前' && $rule === 'noempty'){ return '未入力です'; }
  if($key === 'フリガナ' && $rule === 'noempty'){ return '未入力です'; }
  if($key === '誕生年' && $rule === 'noempty'){ return '未入力です'; }
  if($key === '誕生月' && $rule === 'noempty'){ return '未入力です'; }
  if($key === '誕生日' && $rule === 'noempty'){ return '未入力です'; }
  if($key === '性別' && $rule === 'required'){ return '未選択です'; }
  if($key === 'メールアドレス' && $rule === 'noempty'){ return '未入力です'; }
  if($key === 'メールアドレス(確認)' && $rule === 'noempty'){ return '未入力です'; }
  if($key === '郵便番号' && $rule === 'noempty'){ return '未入力です'; }
  if($key === 'ご住所' && $rule === 'noempty'){ return '未入力です'; }
  if($key === '電話番号' && $rule === 'noempty'){ return '未入力です'; }
  if($key === 'agree' && $rule === 'required'){ return '同意が必要です'; }
  return $error;
}
add_filter('mwform_error_message_mw-wp-form-124', 'my_error_message2', 10, 3);

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