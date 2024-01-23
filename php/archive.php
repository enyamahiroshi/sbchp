<?php get_header(); ?>
    <header class="page-header">
      <h1 class="page-header__title"><?php post_type_archive_title(); ?></h1>
    </header>
    <?php //パンくずリスト(yoast seo)
    if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<aside class="bread-navi">','</aside>' ); }
    ?>
    <section class="sec sec-archive">
      <div class="inner">

      <?php if( is_post_type_archive('works') ): // 一覧リスト条件分岐表示 ?>
        <h2 class="title02">実績一覧</h2>
        <div class="page-intro">
          <p>
            軽自動車のちょっとしたキズから大型トラックの修理まで愛車の「困った！」をモモセボデーでまるっと解決！<br>お客様の「ありがとう」「またお願いね」が私たちの原動力です。
          </p>
        </div>
        <?php if ( have_posts() ) : ?>
        <div class="post-list post-list--works">
          <?php
            while( have_posts() ): the_post();
            $taxonomy = 'works_category';
            $taxonomy_terms_cat = get_the_terms($post->ID, $taxonomy);
            $taxonomy_terms_cat_name = $taxonomy_terms_cat[0]->name;
            $taxonomy_terms_cat_slug = $taxonomy_terms_cat[0]->slug;
            $thumbNail = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
            if( !$thumbNail ) {
              $thumbNail = get_stylesheet_directory_uri() . '/assets/images/common/img-default-thumbnail.png';
            }
          ?>
          <article class="post post--works">
            <a href="<?php the_permalink(); ?>" class="post-eyecatch"><img src="<?php echo $thumbNail; ?>" alt=""></a>
            <a href="<?php echo esc_url( home_url() ); ?>/works/<?php echo $taxonomy_terms_cat_slug; ?>" class="post-category"><?php echo $taxonomy_terms_cat_name; ?></a>
            <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
            <div class="post-date"><?php the_time('Y.m.d'); ?></div>
            </a>
          </article>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>

      <?php elseif( is_post_type_archive('kurumano-chie-bukuro') ): // 一覧リスト条件分岐表示 ?>
        <h2 class="title02">クルマの知恵袋一覧</h2>
        <div class="page-intro">
          <p>
            皆さまのカーライフがより良いものとなるような、クルマの豆知識、ちょっとしたお役立ち情報をご紹介していきます。
          </p>
        </div>
        <?php if ( have_posts() ) : ?>
        <div class="post-list post-list--kurumano-chie-bukuro">
          <?php
            while( have_posts() ): the_post();
            $taxonomy = 'kurumano-chie-bukuro_category';
            $taxonomy_terms_cat = get_the_terms($post->ID, $taxonomy);
            $taxonomy_terms_cat_name = $taxonomy_terms_cat[0]->name;
            $taxonomy_terms_cat_slug = $taxonomy_terms_cat[0]->slug;
            $thumbNail = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
            if( !$thumbNail ) {
              $thumbNail = get_stylesheet_directory_uri() . '/assets/images/common/img-default-thumbnail.png';
            }
          ?>
          <article class="post post--kurumano-chie-bukuro">
            <a href="<?php the_permalink(); ?>" class="post-eyecatch"><img src="<?php echo $thumbNail; ?>" alt=""></a>
            <a href="<?php echo esc_url( home_url() ); ?>/kurumano-chie-bukuro/<?php echo $taxonomy_terms_cat_slug; ?>" class="post-category"><?php echo $taxonomy_terms_cat_name; ?></a>
            <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
          </article>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>

      <?php else: // 一覧リスト条件分岐表示 ?>
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

      <?php endif; // 一覧リスト条件分岐表示 ?>

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