<?php get_header(); ?>
  <header class="page-header">
    <div class="inner">
      <h1 class="page-header__title">家づくりお役立ちコラム</h1>
    </div>
  </header>

  <section class="sec sec-l sec-oyakudachi-column">
		<div class="inner">
			<ul class="list-oyakudachi-column">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <li class="list-item">
          <a href="<?php the_permalink(); ?>" class="post-group">
            <figure class="post-image">
              <?php if (has_post_thumbnail()): the_post_thumbnail(); ?>
              <?php else: ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sample/img-dammy.jpg" alt="">
              <?php endif; ?>
            </figure>
            <div class="post-detail">
              <h3 class="post-title"><?php the_title(); ?></h3>
              <?php
              $main_text = SCF::get('scf_text_mainarea');
              $main_text = mb_substr($main_text, 0, 80);
              if($main_text){
                echo '<div class="post-lead">'.$main_text.'</div>';
              }
              ?>
            </div>
          </a>
        </li>
        <?php endwhile; endif; ?>
      </ul>
		</div>
	</section>
<?php get_footer(); ?>