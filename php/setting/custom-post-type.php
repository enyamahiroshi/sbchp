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


/********************************************************************************
 カスタム投稿タイプの設定
*********************************************************************************/

// ▼▼▼▼▼▼▼▼▼▼ ------- ここからカスタム投稿タイプ設定のセット ------- ▼▼▼▼▼▼▼▼▼▼
global
$cpSlug,      // カスタム投稿のスラッグ名
$cpName,      // カスタム投稿の表示名
$cpTaxSlug,   // カスタム投稿のタクソノミーのスラッグ名（ _category or _tag ）
$cpTaxName,   // カスタム投稿のタクソノミーの表示名（ カテゴリー か タグ ）
$rewriteslug; // リライトルールを書き換えて sample/カテゴリー名/… という自然なURLにする場合

$cpSlug       = 'oyakudachi-column';
$cpName       = '家づくりお役立ちコラム';
$cpTaxSlug    = $GLOBALS['cpSlug'].'_category';
$cpTaxName    = /* $GLOBALS['cpName']. */'カテゴリー';
$rewriteslug  = 'category';

add_action( 'init', function() {
	// カスタム投稿タイプを作成
	$labels = array(
		'name'               => $GLOBALS['cpName'], //管理画面などで表示する名前（単数形）
		'add_new_item'       => '新規'.$GLOBALS['cpName'].'追加', //新規作成ページのタイトルに表示される名前
		'add_new'            => '新規追加', //メニューに表示される名前
		'edit_item'          => '編集', //編集ページのタイトルに表示される名前
		'view_item'          => '表示', //編集ページの「投稿を表示」ボタンのラベル
		'search_items'       => '検索', //一覧ページの検索ボタンのラベル
	);
	$args = array(
    'label'               => $GLOBALS['cpSlug'],
		'labels'              => $labels,
		'public'              => true, // ユーザーが内容を投稿する場合true(通常はtrue)
		'show_in_rest'        => true, // Gutenberg 有効化
		'has_archive'         => true, // アーカイブページを作成するか否かを設定(trueでindexページを作成)
		'hierarchical'        => true, // 階層構造か否か（trueの場合はカテゴリー、falseの場合はタグ）
		'exclude_from_search' => false, // WPの検索機能から検索した際、検索対象に含めるか否かを設定（※trueの場合は検索対象に含めない）
		'menu_position'       => 5,
		'rewrite'             => array( // パーマリンクの生成
			'with_front'        => false,
		),
		'menu_icon'           => 'dashicons-edit-large', // メニューアイコン設定(アイコン選択: https://developer.wordpress.org/resource/dashicons/)
		'supports'            => array( // 管理画面から投稿できる項目を設定
		'title', // タイトル表示を有効に
		'editor', // 本文の表示を有効に
		// 'custom-fields', カスタムフィールド
		'thumbnail', // アイキャッチ画像
		'author', // 作成者
		)
	);
	register_post_type( $GLOBALS['cpSlug'], $args );
	// ▼カスタムタクソノミーを作成 ※パーマリンクの細かい設定は「Custom Post Type Permalinks」プラグインで行う
	// $args = array(
	// 	'label'        => $GLOBALS['cpTaxName'],
	// 	'public'       => true,
	// 	'show_ui'      => true,
	// 	'show_in_rest' => true, // Gutenberg 有効化
	// 	'query_var'    => true,
	// 	'hierarchical' => true, // 階層構造か否か（trueの場合はカテゴリー、falseの場合はタグ）
	// 	'rewrite'      => array(  // パーマリンクのりライトルール ※パーマリンクの細かい設定は「Custom Post Type Permalinks」プラグインで行う
	// 		'with_front' => false,
	// 		'slug' => $GLOBALS['cpSlug'], // urlを任意に指定する場合 → array( 'slug' => 'aaa/bbb', default： true )
	// 	),
	// );
	// register_taxonomy( $GLOBALS['cpTaxSlug'], $GLOBALS['cpSlug'], $args );
});
// リライトルール（カスタムタクソノミーの分） ※パーマリンクの細かい設定は「Custom Post Type Permalinks」プラグインで行う
add_rewrite_rule($GLOBALS['cpSlug'].'/'.$GLOBALS['rewriteslug'].'/([^/]+)/?$', 'index.php?'.$GLOBALS['cpTaxSlug'].'=$matches[1]', 'top');
add_rewrite_rule($GLOBALS['cpSlug'].'/'.$GLOBALS['rewriteslug'].'/([^/]+)/page/?([0-9]{1,})/?$',	'index.php?'.$GLOBALS['cpTaxSlug'].'=$matches[1]&paged=$matches[2]', 'top');
// 投稿画面にてタクソノミー検索を可能にする
add_action('restrict_manage_posts', function() {
global $post_type;
if ( $GLOBALS['cpSlug'] == $post_type ) {
	?>
	<select name="<?php echo $GLOBALS['cpTaxSlug']; ?>">
		<option value="">カテゴリー指定なし</option>
		<?php
		$terms = get_terms($GLOBALS['cpTaxSlug']);
		foreach ($terms as $term) { ?>
			<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
		<?php } ?>
	</select>
	<?php
}
});
// ▲▲▲▲▲▲▲▲▲▲ ------- ここまでカスタム投稿タイプ設定のセット ------- ▲▲▲▲▲▲▲▲▲▲


// ▼▼▼▼▼▼▼▼▼▼ ------- ここからカスタム投稿タイプ設定のセット ------- ▼▼▼▼▼▼▼▼▼▼
global
$cpSlug2,      // カスタム投稿のスラッグ名
$cpName2,      // カスタム投稿の表示名
$cpTaxSlug2,   // カスタム投稿のタクソノミーのスラッグ名（ _category or _tag ）
$cpTaxName2,   // カスタム投稿のタクソノミーの表示名（ カテゴリー か タグ ）
$rewriteslug2; // リライトルールを書き換えて sample/カテゴリー名/… という自然なURLにする場合

$cpSlug2       = 'model-house';
$cpName2       = 'モデルハウス情報';
$cpTaxSlug2    = $GLOBALS['cpSlug2'].'_cat';
$cpTaxName2    = /* $GLOBALS['cpName2']. */'モデルハウス';
$rewriteslug2  = 'cat';

add_action( 'init', function() {
	// カスタム投稿タイプを作成
	$labels = array(
		'name'               => $GLOBALS['cpName2'], //管理画面などで表示する名前（単数形）
		'add_new_item'       => '新規'.$GLOBALS['cpName2'].'追加', //新規作成ページのタイトルに表示される名前
		'add_new'            => '新規'.$GLOBALS['cpName2'].'追加', //メニューに表示される名前
		'edit_item'          => '編集', //編集ページのタイトルに表示される名前
		'view_item'          => '表示', //編集ページの「投稿を表示」ボタンのラベル
		'search_items'       => '検索', //一覧ページの検索ボタンのラベル
	);
	$args = array(
    'label'               => $GLOBALS['cpSlug2'],
		'labels'              => $labels,
		'public'              => true, // ユーザーが内容を投稿する場合true(通常はtrue)
		'show_in_rest'        => true, // Gutenberg 有効化
		'has_archive'         => true, // アーカイブページを作成するか否かを設定(trueでindexページを作成)
		'hierarchical'        => true, // 階層構造か否か（trueの場合はカテゴリー、falseの場合はタグ）
		'exclude_from_search' => false, // WPの検索機能から検索した際、検索対象に含めるか否かを設定（※trueの場合は検索対象に含めない）
		'menu_position'       => 5,
		'rewrite'             => array( // パーマリンクの生成
			'with_front'        => false,
		),
		'menu_icon'           => 'dashicons-store', // メニューアイコン設定(アイコン選択: https://developer.wordpress.org/resource/dashicons/)
		'supports'            => array( // 管理画面から投稿できる項目を設定
		'title', // タイトル表示を有効に
		'editor', // 本文の表示を有効に
		// 'custom-fields', カスタムフィールド
		'thumbnail', // アイキャッチ画像
		'author', // 作成者
		)
	);
	register_post_type( $GLOBALS['cpSlug2'], $args );
	// ▼カスタムタクソノミーを作成 ※パーマリンクの細かい設定は「Custom Post Type Permalinks」プラグインで行う
	$args = array(
		'label'        => $GLOBALS['cpTaxName2'],
		'public'       => true,
		'show_ui'      => true,
		'show_in_rest' => true, // Gutenberg 有効化
		'query_var'    => true,
		'hierarchical' => true, // 階層構造か否か（trueの場合はカテゴリー、falseの場合はタグ）
		'rewrite'      => array(  // パーマリンクのりライトルール ※パーマリンクの細かい設定は「Custom Post Type Permalinks」プラグインで行う
			'with_front' => false,
			'slug' => $GLOBALS['cpSlug2'], // urlを任意に指定する場合 → array( 'slug' => 'aaa/bbb', default： true )
		)
	);
	register_taxonomy( $GLOBALS['cpTaxSlug2'], $GLOBALS['cpSlug2'], $args );
});
// リライトルール（カスタムタクソノミーの分） ※パーマリンクの細かい設定は「Custom Post Type Permalinks」プラグインで行う
add_rewrite_rule($GLOBALS['cpSlug2'].'/'.$GLOBALS['rewriteslug2'].'/([^/]+)/?$', 'index.php?'.$GLOBALS['cpTaxSlug2'].'=$matches[1]', 'top');
add_rewrite_rule($GLOBALS['cpSlug2'].'/'.$GLOBALS['rewriteslug2'].'/([^/]+)/page/?([0-9]{1,})/?$',	'index.php?'.$GLOBALS['cpTaxSlug2'].'=$matches[1]&paged=$matches[2]', 'top');
// 投稿画面にてタクソノミー検索を可能にする
add_action('restrict_manage_posts', function() {
global $post_type;
if ( $GLOBALS['cpSlug2'] == $post_type ) {
	?>
	<select name="<?php echo $GLOBALS['cpTaxSlug2']; ?>">
		<option value="">カテゴリー指定なし</option>
		<?php
		$terms = get_terms($GLOBALS['cpTaxSlug2']);
		foreach ($terms as $term) { ?>
			<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
		<?php } ?>
	</select>
	<?php
}
});
// ▲▲▲▲▲▲▲▲▲▲ ------- ここまでカスタム投稿タイプ設定のセット ------- ▲▲▲▲▲▲▲▲▲▲


// カスタム投稿に編集者属性を与える
function allowAuthorEditing() {
  add_post_type_support( isset($GLOBALS['cpSlug, cpSlug2']), 'author' );
}
add_action('init','allowAuthorEditing');


?>