<?php get_header(); ?>
  <header class="page-header">
    <div class="inner">
      <h1 class="page-header__title"><?php the_title(); ?></h1>
    </div>
  </header>

  <section class="sec src-privacy-policy">
    <div class="inner">
    <?php get_template_part('template/part', 'privacy-policy') ?>
    </div>
  </section>
<?php get_footer(); ?>