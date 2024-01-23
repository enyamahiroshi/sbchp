<?php //前後の記事
  //https://phper.pro/903
  if( is_singular( array( 'works', 'kurumano-chie-bukuro' ) ) ){
    $gpt = get_post_type( $post->ID );
    $obj = get_post_type_object( $gpt );
    $post_type = $obj->name;
    $taxonomy = $post_type . '_category';
    $cat = get_the_terms($post->ID, $taxonomy);
    $cat_name = $cat[0]->name;
    $cat_slug = $cat[0]->slug;

    $previous_post = get_previous_post(true, '', $taxonomy);
    $next_post = get_next_post(true, '', $taxonomy);
  } else {
    $post_type = 'information';
    $cat = get_the_category();
    $cat_name = $cat[0]->cat_name;
    $cat_slug  = $cat[0]->category_nicename;

    $previous_post = get_previous_post(true);
    $next_post = get_next_post(true);
  }
  $previous_id = $previous_post->ID;
  $previous_date = mysql2date('Y.m.d', $previous_post->post_date);
  $next_id = $next_post->ID;
  $next_date = mysql2date('Y.m.d', $next_post->post_date);
  $catch_thumbnail_size = 'medium';
?>
<aside class="post-navi">
  <article class="prev-post">
    <?php if( $previous_post ): ?>
    <div class="prev-post-title">前の記事</div>
    <a href=""<?php the_permalink( $previous_id ); ?>" class="post">
      <div class="post__thumbnail">
        <?php
        if( has_post_thumbnail( $previous_id ) ):
          echo '<figure class="post-eyecatch">'.get_the_post_thumbnail( $previous_id, $catch_thumbnail_size ).'</figure>';
        elseif( prev_thumbnail_image() ):
        ?>
        <figure class="post-eyecatch"><?php echo prev_thumbnail_image(); ?></figure>
        <?php endif; ?>
      </div>
      <div class="post__data">
        <div class="post__data__meta">
          <time class="post-date" datetime="<?php echo $previous_date; ?>"><?php echo $previous_date; ?></time>
        </div>
        <div class="post-title"><?php echo get_the_title( $previous_id ); ?></div>
      </div>
    </a>
    <?php endif; ?>
  </article>

  <article class="archive-post">
    <a href="<?php echo esc_url( home_url() ); ?>/<?php echo $post_type; ?>/<?php echo $cat_slug; ?>" class="button button--02">
    <?php echo $cat_name; ?>一覧
    </a>
  </article>

  <article class="next-post">
    <?php if( $next_post ): ?>
    <div class="next-post-title">次の記事</div>
    <a href=""<?php the_permalink( $next_id ); ?>" class="post">
      <div class="post__thumbnail">
        <?php
        if( has_post_thumbnail( $next_id ) ):
          echo '<figure class="post-eyecatch">'.get_the_post_thumbnail( $next_id, $catch_thumbnail_size ).'</figure>';
        elseif( next_thumbnail_image() ):
        ?>
        <figure class="post-eyecatch"><?php echo next_thumbnail_image(); ?></figure>
        <?php endif; ?>
      </div>
      <div class="post__data">
        <div class="post__data__meta">
          <time class="post-date" datetime="<?php echo $next_date; ?>"><?php echo $next_date; ?></time>
        </div>
        <div class="post-title"><?php echo get_the_title( $next_id ); ?></div>
      </div>
    </a>
    <?php endif; ?>
  </article>
</aside>