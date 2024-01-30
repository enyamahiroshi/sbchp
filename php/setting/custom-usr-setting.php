<?php
function handle_user_specific_mall_category_restrictions($object) {
	$user = wp_get_current_user();

	// ユーザーとタームの関連付け
	$user_term_relations = array(
		'testStaff' => 'nag-c-hp'
	);

	// 現在のユーザーが配列に含まれているか確認
	if (array_key_exists($user->user_login, $user_term_relations)) {
			$term_slug = $user_term_relations[$user->user_login];

			// 投稿保存時の処理
			if (isset($object->ID)) {
					$post_id = $object->ID;
					if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
					if (!current_user_can('edit_post', $post_id)) return;
					if ('mall' != get_post_type($post_id)) return;

					$term = get_term_by('slug', $term_slug, 'model-house_cat');
					if ($term) {
							wp_set_post_terms($post_id, array($term->term_id), 'model-house_cat', false);
					}
			}

			// タームの取得時の処理
			if (is_array($object)) {
					$filtered_terms = array_filter($object, function($term) use ($term_slug) {
							return $term->slug == $term_slug;
					});
					return $filtered_terms;
			}
	}

	return $object;
}

add_action('save_post', 'handle_user_specific_mall_category_restrictions');
add_filter('get_terms', 'handle_user_specific_mall_category_restrictions', 10, 4);