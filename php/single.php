<?php get_header(); ?>
<?php
/*
* 投稿タイプによってテンプレートファイルを振り分ける
*/
//イベント＆NEWSタイプ（基本投稿タイプ）
if( is_singular('post') ){
	get_template_part('template/single', 'post');
}
//各パーク投稿タイプ
elseif (is_singular( array('nag-c','ueda','saku') )) {
	get_template_part('template/single', 'park');
}
//お役立ちコラムタイプ
elseif (is_singular( 'oyakudachi-column' )) {
	get_template_part('template/single', 'oyakudachi-column');
}
//その他共通（モデルハウスTOPICS投稿タイプ）
else {
	get_template_part('template/single', 'modelhouse-topics');
}
?>
<?php get_footer(); ?>