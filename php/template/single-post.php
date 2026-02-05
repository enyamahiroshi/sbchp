  <header class="page-header">
    <div class="inner">
      <h1 class="page-header__title page-header__title--event-news">
        <img class="img-park_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo-main.svg" alt="SBCハウジングパークロゴ" width="128" height="12">イベント&NEWS
      </h1>
    </div>
  </header>

	<section class="sec sec-s sec-post">
		<div class="inner">
			<?php if(have_posts()): the_post(); ?>
			<header class="post-header post-header--default-post">
				<?php /*
				<div class="post-meta">
					<time class="post-date"><?php the_time('Y年m月d日'); ?></time>
				</div>
				*/ ?>
				<h1 class="post-title"><?php the_title(); ?></h1>
			</header>
			<div class="post-body">
				<?php //カスタムフィールドから取得
				$main_image = SCF::get('scf_image_main');
				$main_title = SCF::get('scf_title_main');
				$main_text = SCF::get('scf_text_mainarea');
				$main_text = nl2br($main_text);
				$group_text = SCF::get('scf_group_text_block');
				?>
				<?php /*
				<div class="intro-block intro-block--event-news">
					<figure class="item-image">
					<?php //イントロ画像
					if($main_image){
						echo wp_get_attachment_image($main_image,'large');
					} else {
						echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/common/img-no-image.png" alt="no image">';
					} ?>
					</figure>
					<?php //イントロ文章
					if($main_title || $main_text){
						echo '<div class="item-block">';
						if($main_title){
							echo '<h2 class="item-block__title">'.$main_title.'</h2>';
						}
						if($main_text){
							echo '<div class="item-block__text">'.$main_text.'</div>';
						}
						echo '</div>';
					} ?>
				</div>
				*/ ?>
				<?php //テキストブロック
				if($group_text){
					foreach ($group_text as $fields ) {
						echo '<div class="item-block">';
						$group_image = $fields['scf_group_text_block_image'];
						$group_title = $fields['scf_text_block_title'];
						$group_text = $fields['scf_text_block_textarea'];
						$group_text = nl2br($group_text);
						if($group_image){
							echo wp_get_attachment_image($group_image,'large');
						}
						if($group_title){
							echo '<h2 class="item-block__title">'.$group_title.'</h2>';
						}
						if($group_text){
							echo '<div class="item-block__text">'.$group_text.'</div>';
						}
						echo '</div>';
					}
				} ?>
			</div>
			<?php endif; ?>
		</div>
	</section>