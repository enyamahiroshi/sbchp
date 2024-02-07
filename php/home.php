<?php get_header(); ?>
  <header class="page-header">
    <div class="inner">
      <h1 class="page-header__title page-header__title--event-news">
        <img class="img-park_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo-main.svg" alt="SBCハウジングパークロゴ" width="128" height="12">イベント&NEWS
      </h1>
    </div>
  </header>

  <section class="sec sec-list-event-news">
    <div class="inner">
      <ul class="list-event-news">
        <?php if ( have_posts() ) : while( have_posts() ): the_post(); ?>
        <?php //カスタムフィールドから取得
				$main_image = SCF::get('scf_image_main');
				$main_title = SCF::get('scf_title_main');
				$main_text = SCF::get('scf_text_main');
        $main_text = mb_substr($main_text, 0, 100);
				$group_text = SCF::get('scf_group_text_block');
				?>
        <li class="list-item">
          <a href="<?php the_permalink(); ?>" class="list-item__link">
            <div class="post-image-container">
              <figure class="post-image">
              <?php //イントロ画像
              if($main_image){
                echo wp_get_attachment_image($main_image,'large');
              } else {
                echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/common/img-no-image.png" alt="no image">';
              } ?>
              </figure>
            </div>
            <div class="post-detail">
              <h2 class="post-name"><?php the_title(); ?></h2>
              <time class="post-date"><?php the_time('Y年m月d日'); ?></time>
              <div class="post-overview">
              <?php //イントロ文章
              if($main_text){
                echo '<p>'.$main_text.'</p>';
              } ?>
              </div>
              <div class="more-text">詳細を見る</div>
            </div>
          </a>
        </li>
        <?php endwhile; endif; ?>
      </ul>
    </div>
  </section>
<?php get_footer(); ?>