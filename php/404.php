<?php get_header(); ?>

<?php
  $page = get_post( get_the_ID() );
  $slug = $page->post_name;
?>
<header class="sr-fadeIn2 page-header ">
  <h1 class="page-header__title"><span>NOT FOUND</span>404</h1>
</header>

<main class="main-wrap">

  <section class="sec">
    <div class="inner">
      <p>404 ページがみつかりません</p>
    </div>
  </section>

<?php get_footer(); ?>