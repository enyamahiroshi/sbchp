<?php

/* -------------------------------------------------------------
//  自動更新設定
// ------------------------------------------------------------*/
add_filter( 'auto_update_theme', '__return_true' );
// add_filter( 'auto_update_plugin', '__return_true' );
// add_filter( 'allow_major_auto_core_updates', '__return_true' );
// add_filter( 'allow_minor_auto_core_updates', '__return_true' );

/* -------------------------------------------------------------
// ログイン画面のカスタマイズ
// ------------------------------------------------------------*/
// ロゴ・背景等のcss変更
function my_login_style() {
  wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/admin/login.css' );
  // wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/assets/js/login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_style' );
// ロゴのリンク先を指定
function my_login_logo_url() {
  return "";
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
// ロゴのtitleテキストを指定
function my_login_logo_tit() {
  return "";
}
add_filter( 'login_headertext', 'my_login_logo_tit' );

/* -------------------------------------------------------------
// ブロックエディタ用 block-editor-style.cssを読み込み
// ------------------------------------------------------------*/
function add_block_editor_styles() {
  wp_enqueue_style( 'block-style', get_stylesheet_directory_uri() . '/editor-style/block-editor-style.css' );
}
add_action( 'enqueue_block_editor_assets', 'add_block_editor_styles' );

/* -------------------------------------------------------------
// テーマフォルダ直下のeditor-style.cssを読み込み
// ------------------------------------------------------------*/
add_action('admin_init',function(){
  add_editor_style( '/editor-style/editor-style.css' );
});
// エディタースタイルのキャッシュクリア
function extend_tiny_mce_before_init($mce_init){
  $mce_init['cache_suffix']='v='.time();
  return $mce_init;
}
add_filter('tiny_mce_before_init','extend_tiny_mce_before_init');

/* -------------------------------------------------------------
// header内の不要な要素を非表示
// ------------------------------------------------------------*/
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );
function remove_dns_prefetch( $hints, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		return array_diff( wp_dependencies_unique_hosts(), $hints );
	}
	return $hints;
}

/* -------------------------------------------------------------
// 出力されるコードの非表示設定
// ------------------------------------------------------------*/
//wpバージョンを非表示
remove_action('wp_head', 'wp_generator');
function vc_remove_wp_ver_css_js( $src ) {
if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
$src = remove_query_arg( 'ver', $src );
return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

//絵文字用のJavaScriptとCSSを停止
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

//コメントフォードを非表示
remove_action('wp_head', 'feed_links_extra', 3);

//外部ツールを使って記事を投稿する時のアドレス出力を非表示
remove_action('wp_head', 'rsd_link'); //Really Simple Discovery
remove_action('wp_head', 'wlwmanifest_link'); //Windows Live Writer

/* -------------------------------------------------------------
// 管理者以外の左メニューの非表示設定
// ------------------------------------------------------------*/
if ( !current_user_can( 'administrator' ) ) {
  function remove_menus () {
    // remove_menu_page( 'index.php' );                  // ダッシュボード
    // remove_menu_page( 'edit.php' );                   // 投稿
    // remove_menu_page( 'upload.php' );                 // メディア
    // remove_menu_page( 'edit.php?post_type=page' );    // 固定ページ
    remove_menu_page( 'edit-comments.php' );          // コメント
    remove_menu_page( 'themes.php' );                 // 外観
    remove_menu_page( 'plugins.php' );                // プラグイン
    // remove_menu_page( 'users.php' );                  // ユーザー
    remove_menu_page( 'tools.php' );                  // ツール
    // remove_menu_page( 'options-general.php' );        // 設定
    //以下プラグイン毎
    // remove_menu_page('wpcf7'); //contactform7

    //▼下でインストールプラグインのスラッグ名をダンプ表示できる
    // global $menu;
    // var_dump($menu);

  }
  add_action('admin_menu', 'remove_menus');
}

/* -------------------------------------------------------------
// 管理バーの項目を非表示設定
// ------------------------------------------------------------*/
function remove_bar_menus( $wp_admin_bar ) {
  $wp_admin_bar->remove_menu( 'wp-logo' );      // ロゴ
  $wp_admin_bar->remove_menu( 'themes' );       // サイト名 -> テーマ (公開側)
  // $wp_admin_bar->remove_menu( 'site-name' );    // サイト名
  // $wp_admin_bar->remove_menu( 'view-site' );    // サイト名 -> サイトを表示
  // $wp_admin_bar->remove_menu( 'dashboard' );    // サイト名 -> ダッシュボード (公開側)
  // $wp_admin_bar->remove_menu( 'customize' );    // サイト名 -> カスタマイズ (公開側)
  $wp_admin_bar->remove_menu( 'comments' );     // コメント
  $wp_admin_bar->remove_menu( 'updates' );      // 更新
  $wp_admin_bar->remove_menu( 'view' );         // 投稿を表示
  $wp_admin_bar->remove_menu( 'new-content' );  // 新規
  $wp_admin_bar->remove_menu( 'new-post' );     // 新規 -> 投稿
  $wp_admin_bar->remove_menu( 'new-media' );    // 新規 -> メディア
  $wp_admin_bar->remove_menu( 'new-link' );     // 新規 -> リンク
  $wp_admin_bar->remove_menu( 'new-page' );     // 新規 -> 固定ページ
  $wp_admin_bar->remove_menu( 'new-user' );     // 新規 -> ユーザー
  // $wp_admin_bar->remove_menu( 'my-account' );   // マイアカウント
  // $wp_admin_bar->remove_menu( 'user-info' );    // マイアカウント -> プロフィール
  // $wp_admin_bar->remove_menu( 'edit-profile' ); // マイアカウント -> プロフィール編集
  // $wp_admin_bar->remove_menu( 'logout' );       // マイアカウント -> ログアウト
  // $wp_admin_bar->remove_menu( 'search' );       // 検索 (公開側)
}
add_action('admin_bar_menu', 'remove_bar_menus', 201);

/* -------------------------------------------------------------
// 管理バーの項目を非表示設定
// ------------------------------------------------------------*/
function my_admin_head(){
  //表示オプションタブ
  // echo '<style type="text/css"> #screen-options-link-wrap {display:none !important;} </style>';
  // //ヘルプタブ
  // echo '<style type="text/css"> #contextual-help-link-wrap {display: none !important;} </style>';
}
add_action('admin_head', 'my_admin_head');

?>