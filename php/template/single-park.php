<?php
// ページ属するスラッグを取得
$post_type_slug = get_post_type();
// 取得したスラッグによって処理
switch ($post_type_slug) {
  case 'nag-c': //長野中央ハウジングパーク
    $img_path = 'logo-nagano-hp.svg';
    $park_name = '長野中央ハウジングパーク';
    $cal_link = 'nag-c-calendar';
    break;
  case 'ueda': //上田ハウジングパーク
    $img_path = 'logo-ueda-hp.svg';
    $park_name = '上田ハウジングパーク';
    $cal_link = 'ueda-calendar';
    break;
  case 'saku': //佐久平ハウジングパーク
    $img_path = 'logo-saku-hp.svg';
    $park_name = '佐久平ハウジングパーク';
    $cal_link = 'saku-calendar';
    break;
  default:
    break;
}
?>
<header class="page-header">
	<div class="inner">
		<div class="page-header__sub">モデルハウス詳細</div>
		<em class="page-header__title page-header__title--modelhouse">
			<img class="img-park_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/<?php echo $img_path; ?>" alt="<?php echo $park_name; ?>ロゴ" width="183.34" height="12.87">
			<a href="<?php echo esc_url( home_url() ); ?>/calendar/<?php echo $cal_link; ?>" class="button button-calender-s" target="_blank" rel="noopener noreferrer">営業日カレンダー</a>
		</em>
	</div>
</header>

<?php //カスタムフィールドデータ
$logo_data = SCF::get('scf_modelhouse_logo');
$modelhouse_name = SCF::get('scf_modelhouse_name');
$koho = SCF::get('scf_modelhouse_koho');
$gaiyo = SCF::get('scf_modelhouse_gaiyo');
$gaiyo = nl2br(esc_html($gaiyo));

//出力したいテキストからURLを自動で検出し、aタグで囲んでリンク化する
$gaiyo; //対象のテキスト
$pattern = '/((http|https):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
$replace = '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>';
$gaiyo = preg_replace( $pattern, $replace, $gaiyo );

$tel = SCF::get('scf_modelhouse_tel');
$website = SCF::get('scf_modelhouse_website');
$s_slide1 = SCF::get('scf_modelhouse_slider1_img');
$s_slide2 = SCF::get('scf_modelhouse_slider2_img');
$s_slide3 = SCF::get('scf_modelhouse_slider3_img');
$s_slide4 = SCF::get('scf_modelhouse_slider4_img');
$main_slide1 = SCF::get('scf_modelhouse_main_slider1_img');
$main_slide2 = SCF::get('scf_modelhouse_main_slider2_img');
$main_slide3 = SCF::get('scf_modelhouse_main_slider3_img');
$main_slide4 = SCF::get('scf_modelhouse_main_slider4_img');
$main_slide5 = SCF::get('scf_modelhouse_main_slider5_img');
$group_block = SCF::get('scf_group_modelhouse_block');
?>
<section class="sec sec-page-title-modelhouse">
	<div class="inner">
		<h1 class="title-modelhouse">
			<figure class="modelhouse-logo">
				<?php echo wp_get_attachment_image($logo_data, 'large'); ?>
			</figure>
			<em class="modelhouse-name"><?php if($modelhouse_name){ echo $modelhouse_name; } else { the_title(); } ?></em>
		</h1>
		<div class="modelhouse-sub-data"><?php if($koho){ echo $koho; } ?></div>
	</div>
</section>

<section class="sec sec-modelhouse-overview">
	<div class="inner">

		<div class="modelhouse-overview">
			<?php //モデルハウススライダーA ?>
			<?php if($s_slide1 || $s_slide2 || $s_slide3 || $s_slide4): ?>
			<div class="modelhouse-overview-slider slider">
				<?php //モデルハウススライダーA - 本体 ?>
				<div class="slider-modelhouse-small">
					<div class='swiper-wrapper'>
						<?php if($s_slide1){ echo '<div class="swiper-slide">'.wp_get_attachment_image($s_slide1, 'large').'</div>'; } ?>
						<?php if($s_slide2){ echo '<div class="swiper-slide">'.wp_get_attachment_image($s_slide2, 'large').'</div>'; } ?>
						<?php if($s_slide3){ echo '<div class="swiper-slide">'.wp_get_attachment_image($s_slide3, 'large').'</div>'; } ?>
						<?php if($s_slide4){ echo '<div class="swiper-slide">'.wp_get_attachment_image($s_slide4, 'large').'</div>'; } ?>
					</div>
				</div>
				<?php //モデルハウススライダーA - サムネイル ?>
				<div class="slider-modelhouse-small-thumbnail">
					<div class="swiper-wrapper slider-thumbnail">
						<?php if($s_slide1){ echo '<div class="swiper-slide">'.wp_get_attachment_image($s_slide1, 'medium').'</div>'; } ?>
						<?php if($s_slide2){ echo '<div class="swiper-slide">'.wp_get_attachment_image($s_slide2, 'medium').'</div>'; } ?>
						<?php if($s_slide3){ echo '<div class="swiper-slide">'.wp_get_attachment_image($s_slide3, 'medium').'</div>'; } ?>
						<?php if($s_slide4){ echo '<div class="swiper-slide">'.wp_get_attachment_image($s_slide4, 'medium').'</div>'; } ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php //モデルハウススライダー横の文章 ?>
			<div class="modelhouse-overview-text block-link">
				<?php if($gaiyo){ echo '<p class="block-link">'.$gaiyo.'</p>'; } ?>
			</div>
		</div>

		<?php //モデルハウス 各種問い合わせボタン ?>
		<div class="button-wrap-modelhouse">
			<a href="<?php echo esc_url( home_url() ); ?>/reserve" class="button button-reserve-l">見学予約</a>
			<?php if($tel){ echo '<a href="tel:'.$tel.'" class="button button-tel">'.$tel.'</a>'; } ?>
			<?php if($website){ echo '<a href="'.$website.'" target="_blank" rel="noopener noreferrer" class="button button-blank">メーカーサイト</a>'; } ?>
		</div>

	</div>
</section>

<section class="sec sec-modelhouse-main-slider">
	<div class="inner">

		<?php //モデルハウススライダーMain ?>
		<?php if($main_slide1 || $main_slide2 || $main_slide3 || $main_slide4 || $main_slide5): ?>
		<div class="modelhouse-main-slider slider">
			<?php //モデルハウススライダーMain - 本体 ?>
			<div class="slider-modelhouse-main">
				<div class='swiper-wrapper'>
					<?php if($main_slide1){ echo '<div class="swiper-slide">'.wp_get_attachment_image($main_slide1, 'large').'</div>'; } ?>
					<?php if($main_slide2){ echo '<div class="swiper-slide">'.wp_get_attachment_image($main_slide2, 'large').'</div>'; } ?>
					<?php if($main_slide3){ echo '<div class="swiper-slide">'.wp_get_attachment_image($main_slide3, 'large').'</div>'; } ?>
					<?php if($main_slide4){ echo '<div class="swiper-slide">'.wp_get_attachment_image($main_slide4, 'large').'</div>'; } ?>
					<?php if($main_slide5){ echo '<div class="swiper-slide">'.wp_get_attachment_image($main_slide5, 'large').'</div>'; } ?>
				</div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
			<?php //モデルハウススライダーMain - サムネイル ?>
			<div class="slider-modelhouse-main-thumbnail">
				<div class="swiper-wrapper slider-thumbnail">
					<?php if($main_slide1){ echo '<div class="swiper-slide">'.wp_get_attachment_image($main_slide1, 'medium').'</div>'; } ?>
					<?php if($main_slide2){ echo '<div class="swiper-slide">'.wp_get_attachment_image($main_slide2, 'medium').'</div>'; } ?>
					<?php if($main_slide3){ echo '<div class="swiper-slide">'.wp_get_attachment_image($main_slide3, 'medium').'</div>'; } ?>
					<?php if($main_slide4){ echo '<div class="swiper-slide">'.wp_get_attachment_image($main_slide4, 'medium').'</div>'; } ?>
					<?php if($main_slide5){ echo '<div class="swiper-slide">'.wp_get_attachment_image($main_slide5, 'medium').'</div>'; } ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

	</div>
</section>

<?php if($group_block):
foreach($group_block as $fields):
$group_title = $fields['scf_group_modelhouse_block_title'];
$group_text = $fields['scf_group_modelhouse_block_text'];
$group_text = nl2br($group_text);
$group_link = $fields['scf_group_modelhouse_block_link'];
$group_image = $fields['scf_group_modelhouse_block_image'];
?>
<section class="sec sec-modelhouse-text-block block-editor">
	<div class="inner">
		<div class="modelhouse-text-block">
			<div class="modelhouse-text-block__body">
				<?php if($group_title){ echo '<h2>'.$group_title.'</h2>'; } ?>
				<?php if($group_text){ echo '<p>'.$group_text.'</p>'; } ?>
				<?php if($group_link){ echo '<p class="block-link">参考リンク：<a href="'.$group_link.'" target="_blank" rel="noopener noreferrer">'.$group_link.'</a></p>'; } ?>
			</div>
			<?php
			if($group_image){
			echo '<figure class="modelhouse-text-block__image">'.wp_get_attachment_image($group_image, 'large').'</figure>';
			}
			?>
		</div>
	</div>
</section>
<?php endforeach; endif; ?>

<section class="sec sec-list-modelhouse-topics">
	<div class="inner">
		<div class="list-modelhouse-topics-wrap">
			<h2 class="title-small">モデルハウスTOPICS</h2>

			<?php //ループクエリ
			// 20240626 改修
			// 基本：現在表示しているモデルハウスname(slug)と同じスラッグ名の投稿タイプの記事を取得して表示する
			// ただし、完全統合型タイプの場合（モデルハウル管理ページの「統合元」が在る場合）は、その統合元の記事を表示する
			$post_slug = get_post_field('post_name');
			// Smart Custom Fieldsからカスタムフィールドの値を取得
			$modelhouse_ids = SCF::get('scf_integration_modelhouse');
			if ( $modelhouse_ids ){
				foreach ( $modelhouse_ids as $id ){
					// IDからスラッグを取得
					$post_object = get_post($id);
					if ( $post_object ){
						$slug = $post_object->post_name;
					}
				}
				$post_slug = esc_html( $slug );
			}
			$args = array(
				'post_type' => $post_slug,
				'posts_per_page' => '10',
				'orderby' => 'date', // 新着順にソート
				'order' => 'DESC', // 降順（新しい順）
			);
			get_template_part('template/loop', 'modelhouse-topics-in-park', $args);
			?>
		</div>

	</div>
</section>