<?php get_header(); ?>
  <header class="page-header">
    <h1 class="page-header__title"><?php the_title(); ?></h1>
  </header>
  <?php //パンくずリスト(yoast seo)
  if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<aside class="bread-navi">','</aside>' ); }
  ?>

  <section class="sec">
    <div class="inner">
		<?php the_content(); ?>
    </div>
  </section>
<?php get_footer(); ?>