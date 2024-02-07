<?php
/*
* Template Name: TOPICSテンプレート
* Template Post Type: page
*/
?>
<?php get_header(); ?>
<?php
// 現在のページのIDを取得
$page_id = get_the_ID();
// ページのスラッグを取得
$page_slug = get_post_field('post_name', $page_id);
// 取得したスラッグによって処理
switch ($page_slug) {
  case 'nag-c-hp-topics': //長野中央ハウジングパーク
    $img_path = 'logo-nagano-hp.svg';
    $park_name = '長野中央ハウジングパーク';
    $post_types = array( //モデルハウスTOPICS一覧取得クエリ用
      'modelhouse-a'
    );
    break;
  case 'ueda-hp-topics': //上田ハウジングパーク
    $img_path = 'logo-ueda-hp.svg';
    $park_name = '上田ハウジングパーク';
    $post_types = array( //モデルハウスTOPICS一覧取得クエリ用
      'modelhouse-a'
    );
    break;
  case 'saku-hp-topics': //佐久平ハウジングパーク
    $img_path = 'logo-saku-hp.svg';
    $park_name = '佐久平ハウジングパーク';
    $post_types = array( //モデルハウスTOPICS一覧取得クエリ用
      'modelhouse-a'
    );
    break;
  default:
    break;
}
?>
  <header class="page-header">
    <div class="inner">
      <h1 class="page-header__title">モデルハウスTOPICS</h1>
    </div>
  </header>

	<section class="sec sec-list-modelhouse-topics-page">
		<div class="inner">
			<h2 class="title-housingpark"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/<?php echo $img_path; ?>" alt="<?php echo $park_name; ?>"></h2>
      <?php //ループクエリ
      $args = array(
        'post_type' => $post_types,
        'posts_per_page' => '10',
        'orderby' => 'date', // 新着順にソート
        'order' => 'DESC', // 降順（新しい順）
      );
      get_template_part('template/loop', 'modelhouse-topics', $args);
      ?>
		</div>
	</section>
<?php get_footer(); ?>