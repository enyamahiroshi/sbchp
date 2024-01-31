<?php
/********************************************************************************
 デフォルトの「投稿」ポストの編集
*********************************************************************************/
global
$defaultPotSlug,         // 投稿のスラッグ名
$defaultPostPermalink;   // 投稿の表示名

$defaultPotSlug       = 'イベント&NEWS';
$defaultPostPermalink = 'information';

function edit_admin_menus() {
  global $menu;
  global $submenu;
  $menu[5][0] = $GLOBALS['defaultPotSlug'];
  $submenu['edit.php'][5][0] = 'すべての記事';
}
add_action('admin_menu', 'edit_admin_menus');

// カテゴリー、タグを表示しない
function my_unregister_taxonomies() {
	global $wp_taxonomies;
	/*
	* 投稿機能から「カテゴリー」を削除
	*/
	// if (!empty($wp_taxonomies['category']->object_type)) {
	// 	foreach ($wp_taxonomies['category']->object_type as $i => $object_type) {
	// 		if ($object_type == 'post') {
	// 			unset($wp_taxonomies['category']->object_type[$i]);
	// 		}
	// 	}
	// }
	/*
	* 投稿機能から「タグ」を削除
	*/
	if (!empty($wp_taxonomies['post_tag']->object_type)) {
		foreach ($wp_taxonomies['post_tag']->object_type as $i => $object_type) {
			if ($object_type == 'post') {
				unset($wp_taxonomies['post_tag']->object_type[$i]);
			}
		}
	}
	return true;
}
add_action('init', 'my_unregister_taxonomies');

// 投稿ページのパーマリンクをカスタマイズ
function add_article_post_permalink( $permalink ) {
	$permalink = '/' . $GLOBALS['defaultPostPermalink'] . $permalink;
	return $permalink;
}
add_filter( 'pre_post_link', 'add_article_post_permalink' );
function add_article_post_rewrite_rules( $post_rewrite ) {
	$return_rule = array();
	foreach ( $post_rewrite as $regex => $rewrite ) {
			$return_rule[$GLOBALS['defaultPostPermalink'] . '/' . $regex] = $rewrite;
	}
	return $return_rule;
}
add_filter( 'post_rewrite_rules', 'add_article_post_rewrite_rules' );

// 記事編集画面の不要項目を非表示
function remove_block_editor_options() {
  // remove_post_type_support( 'post', 'author' );              // 投稿者
  // remove_post_type_support( 'post', 'post-formats' );        // 投稿フォーマット
  // remove_post_type_support( 'post', 'revisions' );           // リビジョン
  // remove_post_type_support( 'post', 'thumbnail' );           // アイキャッチ
  remove_post_type_support( 'post', 'excerpt' );             // 抜粋
  remove_post_type_support( 'post', 'comments' );            // コメント
  remove_post_type_support( 'post', 'trackbacks' );          // トラックバック
  remove_post_type_support( 'post', 'custom-fields' );       // カスタムフィールド
  // unregister_taxonomy_for_object_type( 'category', 'post' ); // カテゴリー
  unregister_taxonomy_for_object_type( 'post_tag', 'post' ); // タグ
}
add_action( 'init', 'remove_block_editor_options' );

?>