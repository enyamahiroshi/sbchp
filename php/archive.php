<?php get_header(); ?>
<?php
/*
* 投稿タイプによってテンプレートファイルを振り分ける
*/
//長野、上田、佐久平の各ハウジングパーク紹介ページ
if( is_post_type_archive( array('nag-c','ueda','saku')  ) ){
  get_template_part('template/archive', 'park');
}

//その他共通
else {
}
?>
<?php get_footer(); ?>