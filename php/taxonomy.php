<?php get_header(); ?>
<?php
  $taxonomy = get_query_var('taxonomy');
  $post_type = get_taxonomy($taxonomy)->object_type[0];
  $obj = get_post_type_object($post_type);
?>
    <header class="page-header">
      <h1 class="page-header__title"><?php echo $obj->labels->name; ?></h1>
    </header>
    <?php //パンくずリスト(yoast seo)
    if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<aside class="bread-navi">','</aside>' ); }
    ?>
    <section class="sec sec-archive">
      <div class="inner">
        <h2 class="title02">「<?php single_term_title(); ?>」記事一覧</h2>
        <?php if ( have_posts() ) : ?>
        <div class="post-list post-list--<?php echo $obj->name; ?>">
          <?php
            while( have_posts() ): the_post();
            $thumbNail = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
            if( !$thumbNail ) {
              $thumbNail = get_stylesheet_directory_uri() . '/assets/images/common/img-default-thumbnail.png';
            }
          ?>
          <article class="post post--<?php echo $obj->name; ?>">
            <a href="<?php the_permalink(); ?>" class="post-eyecatch"><img src="<?php echo $thumbNail; ?>" alt=""></a>
            <div class="post-category"><?php single_term_title(); ?></div>
            <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
            <div class="post-date"><?php the_time('Y.m.d'); ?></div>
          </article>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>

        <?php //ページネーション
        the_posts_pagination(
          array(
            'mid_size' => 1, // 現在ページの左右に表示するページ番号の数
            'prev_text' => '', // 「前へ」リンクのテキスト
            'next_text' => '', // 「次へ」リンクのテキスト
            'type' => 'list', // 戻り値の指定 (plain/list)
          )
        ); ?>

      </div>
    </section>
<?php get_footer(); ?>