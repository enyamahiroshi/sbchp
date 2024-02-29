<?php
// カスタムフィールド 'scf_modelhouse_logo' の値を取得する関数
function get_modelhouse_logo($post_id) {
  $logo_id = get_post_meta($post_id, 'scf_modelhouse_logo', true);
  return wp_get_attachment_image_src($logo_id, 'full')[0];
}

// 'nag-c' カスタム投稿タイプのサムネイル画像のURLを取得する関数
function get_nagc_thumbnail_url($post_id) {
  return get_the_post_thumbnail_url($post_id);
}

// [nagc_checkbox] ショートコードの処理関数
function nagc_checkbox_shortcode() {
  $args = array(
      'post_type' => 'nag-c',
      'posts_per_page' => -1,
  );
  $nagc_posts = get_posts($args);

  $output = '';
  foreach ($nagc_posts as $post) {
      $logo_url = get_modelhouse_logo($post->ID);
      $thumb_url = get_nagc_thumbnail_url($post->ID);
      $output .= '<label><input type="checkbox" name="nagc_post[]" value="' . $post->ID . '" data-logo="' . esc_url($logo_url) . '" data-thumb="' . esc_url($thumb_url) . '"> ' . esc_html($post->post_title) . '</label><br>';
  }

  return $output;
}
add_shortcode('nagc_checkbox', 'nagc_checkbox_shortcode');

// [nagc_checkbox] ショートコードを使用してフォームにチェックボックスを追加する
add_action('wpcf7_init', 'add_nagc_checkbox_tag', 10, 0);
function add_nagc_checkbox_tag() {
  wpcf7_add_form_tag('nagc_checkbox', 'nagc_checkbox_shortcode_handler');
}

function nagc_checkbox_shortcode_handler($tag) {
  return nagc_checkbox_shortcode();
}

// フォーム送信時に 'nag-c' カスタム投稿タイプの情報を取り込む
add_filter('wpcf7_posted_data', 'add_nagc_post_info_to_email', 10, 1);
function add_nagc_post_info_to_email($posted_data) {
    // もしフォームがチェックボックスフィールド 'nagc_post[]' を含んでいる場合
    if (isset($posted_data['nagc_post']) && is_array($posted_data['nagc_post'])) {
        $nagc_posts_info = array();

        // チェックボックスで選択された各 'nag-c' カスタム投稿タイプのポストの情報を取得
        foreach ($posted_data['nagc_post'] as $post_id) {
            $post_title = get_the_title($post_id);
            $post_logo = get_modelhouse_logo($post_id);
            $post_thumb = get_nagc_thumbnail_url($post_id);

            // メール本文に追加する形式に変換
            $nagc_posts_info[] = array(
                'title' => $post_title
            );
        }

        // フォーム送信データに 'nagc_posts_info' を追加
        $posted_data['nagc_posts_info'] = $nagc_posts_info;
    }

    return $posted_data;
}








//長野中央
add_action( 'wpcf7_init', 'parkNagano' );
function parkNagano() {
    $args = array(
        'post_type' => 'nag-c', // 投稿のタイプ
        'posts_per_page' => -1, // 表示する記事の数 (-1は全ての記事を取得)
    );
    $posts = get_posts( $args );
    $titles = array();
    foreach ( $posts as $post ) {
        $titles[$post->ID] = $post->post_title;
    }
    $GLOBALS['parkNagano'] = $titles;
}
function parkNagano_form_tag( $tag ) {
    if ( ! is_array( $GLOBALS['parkNagano'] ) || empty( $GLOBALS['parkNagano'] ) ) {
        return $tag;
    }
    if ( 'inc_park_nag-c' === $tag['name'] ) {
        $tag['raw_values'] = array_keys( $GLOBALS['parkNagano'] );
        $tag['values'] = array_values( $GLOBALS['parkNagano'] );
    }
    return $tag;
}
add_filter( 'wpcf7_form_tag', 'parkNagano_form_tag' );

//上田
add_action( 'wpcf7_init', 'parkUeda' );
function parkUeda() {
    $args = array(
        'post_type' => 'ueda', // 投稿のタイプ
        'posts_per_page' => -1, // 表示する記事の数 (-1は全ての記事を取得)
    );
    $posts = get_posts( $args );
    $titles = array();
    foreach ( $posts as $post ) {
        $titles[$post->ID] = $post->post_title;
    }
    $GLOBALS['parkUeda'] = $titles;
}
function parkUeda_form_tag( $tag ) {
    if ( ! is_array( $GLOBALS['parkUeda'] ) || empty( $GLOBALS['parkUeda'] ) ) {
        return $tag;
    }
    if ( 'inc_park_ueda' === $tag['name'] ) {
        $tag['raw_values'] = array_keys( $GLOBALS['parkUeda'] );
        $tag['values'] = array_values( $GLOBALS['parkUeda'] );
    }
    return $tag;
}
add_filter( 'wpcf7_form_tag', 'parkUeda_form_tag' );

//佐久
add_action( 'wpcf7_init', 'parkSaku' );
function parkSaku() {
    $args = array(
        'post_type' => 'saku', // 投稿のタイプ
        'posts_per_page' => -1, // 表示する記事の数 (-1は全ての記事を取得)
    );
    $posts = get_posts( $args );
    $titles = array();
    foreach ( $posts as $post ) {
        $titles[$post->ID] = $post->post_title;
    }
    $GLOBALS['parkSaku'] = $titles;
}
function parkSaku_form_tag( $tag ) {
    if ( ! is_array( $GLOBALS['parkSaku'] ) || empty( $GLOBALS['parkSaku'] ) ) {
        return $tag;
    }
    if ( 'inc_park_saku' === $tag['name'] ) {
        $tag['raw_values'] = array_keys( $GLOBALS['parkSaku'] );
        $tag['values'] = array_values( $GLOBALS['parkSaku'] );
    }
    return $tag;
}
add_filter( 'wpcf7_form_tag', 'parkSaku_form_tag' );
