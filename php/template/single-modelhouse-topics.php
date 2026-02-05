  <header class="page-header">
    <div class="inner">
      <h1 class="page-header__title">モデルハウスTOPICS</h1>
    </div>
  </header>

	<section class="sec sec-s sec-post">
		<div class="inner">
			<?php if(have_posts()): the_post(); ?>
			<header class="post-header post-header--default-post">
				<div class="post-meta">
					<time class="post-date"><?php the_time('Y年m月d日'); ?></time>
				</div>
				<h1 class="post-title"><?php the_title(); ?></h1>
			</header>
			<div class="post-body">
				<?php the_content(); ?>
				<?php /*
				$kaisaibi = SCF::get('scf_kaisaibi');
				$main_image = SCF::get('scf_group_modelhouse_topics_overview_image');
				$main_text = SCF::get('scf_group_modelhouse_topics_overview_text');
				$main_text = nl2br($main_text);
				$group_block = SCF::get('scf_group_modelhouse_topics_block');
      	$post_type_label = get_post_type_object(get_post_type())->label; // 投稿タイプのラベル名を取得
				?>
				<div class="post-meta">
					<?php if($kaisaibi): ?>
					<p class="kaisaibi"><?php echo $kaisaibi; ?></p>
					<p class="modelhouse-name"><?php echo $post_type_label; ?></p>
					<!-- <p class="modelhouse-park">SBC長野中央ハウジングパーク</p> -->
					<?php endif; ?>
				</div>
				<div class="intro-block">
					<figure class="item-image">
					<?php //イントロ画像
					if($main_image){
						echo wp_get_attachment_image($main_image,'large');
					} else {
						echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/common/img-no-image.png" alt="no image">';
					} ?>
					</figure>
					<?php //イントロ文章
					if($main_text){
						echo '<div class="item-block">';
						echo '<p class="item-block__text">'.$main_text.'</p>';
						echo '</div>';
					} ?>
				</div>
				<?php //テキストブロック
				if($group_block){
					foreach ($group_block as $fields ) {
						echo '<div class="item-block">';
						if($fields['scf_group_modelhouse_topics_block_image']){
							echo '<figure class="item-image">';
							echo wp_get_attachment_image($fields['scf_group_modelhouse_topics_block_image'],'large');
						echo '</figure>';
						}
						if($fields['scf_group_modelhouse_topics_block_title']){
							echo '<h2 class="item-block__title">'.$fields['scf_group_modelhouse_topics_block_title'].'</h2>';
						}
						if($fields['scf_group_modelhouse_topics_block_text']){
							echo '<p class="item-block__text">'.nl2br($fields['scf_group_modelhouse_topics_block_text']).'</p>';
						}
						echo '</div>';
					}
				} ?>
				*/ ?>
			</div>
			<?php endif; ?>
		</div>
	</section>