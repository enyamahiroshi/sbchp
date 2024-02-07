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
				<?php
				$kaisaibi = SCF::get('scf_kaisaibi');
				$main_image = SCF::get('scf_group_modelhouse_topics_overview_image');
				$main_text = SCF::get('scf_group_modelhouse_topics_overview_text');
				$group_block = SCF::get('scf_group_modelhouse_topics_block');
				$author_name = get_the_author_meta('display_name'); //ユーザーの「表示名」 = ユーザー作成時にモデルハウス名と設定する
				?>
				<div class="post-meta">
					<?php if($kaisaibi): ?>
					<p class="kaisaibi"><?php echo $kaisaibi; ?></p>
					<p class="modelhouse-name">[<?php echo $author_name; ?>]</p>
					<p class="modelhouse-park">SBC長野中央ハウジングパーク</p>
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
							echo '<p class="item-block__text">'.$fields['scf_group_modelhouse_topics_block_text'].'</p>';
						}
						echo '</div>';
					}
				} ?>
			</div>
			<?php endif; ?>
		</div>
	</section>