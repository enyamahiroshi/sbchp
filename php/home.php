<?php get_header(); ?>
    <header class="page-header">
      <h1 class="page-header__title">お知らせ</h1>
    </header>
    <?php //パンくずリスト(yoast seo)
    if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<aside class="bread-navi">','</aside>' ); }
    ?>
    <section class="sec sec-archive">
      <div class="inner">
        <h2 class="title02">全記事一覧</h2>
        <?php if ( have_posts() ) : ?>
        <div class="post-list">
          <?php
            while( have_posts() ): the_post();
            $cat = get_the_category();
            $cat_name = $cat[0]->cat_name;
            $cat_slug  = $cat[0]->category_nicename;
            $thumbNail = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
            if( !$thumbNail ) {
              $thumbNail = get_stylesheet_directory_uri() . '/assets/images/common/img-default-thumbnail.png';
            }
          ?>
           <article class="post">
            <div class="post__thumbnail">
              <a href="<?php the_permalink(); ?>">
                <figure class="post-eyecatch">
                  <img src="<?php echo $thumbNail; ?>" alt="">
                </figure>
              </a>
            </div>
            <div class="post__data">
              <div class="post__data__meta">
                <time class="post-date"><?php the_time('Y.m.d'); ?></time>
                <a href="<?php echo esc_url( home_url() ); ?>/information/<?php echo $cat_slug; ?>" class="post-category"><?php echo $cat_name; ?></a>
              </div>
              <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
            </div>
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