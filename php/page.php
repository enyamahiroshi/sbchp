<?php get_header(); ?>
<header class="page-header">
  <div class="inner">
    <h1 class="page-header__title"><?php the_title(); ?></h1>
  </div>
</header>

<section class="sec">
  <div class="inner">
    <?php the_content(); ?>
  </div>
</section>
<?php get_footer(); ?>