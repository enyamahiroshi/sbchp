<?php get_header(); ?>
    <header class="page-header">
      <h1 class="page-header__title">
				<?php
					$gpt = get_post_type( $post->ID );
					$obj = get_post_type_object( $gpt );
				  if( is_singular( array( 'works', 'kurumano-chie-bukuro' ) ) ){
						$gpt = get_post_type( $post->ID );
						$obj = get_post_type_object( $gpt );
						$post_type = $obj->name;
						$taxonomy = $post_type . '_category';
						$cat = get_the_terms($post->ID, $taxonomy);
						$cat_name = $cat[0]->name;
						$cat_slug = $cat[0]->slug;
						$taxname = $obj->labels->name;
					} else {
						$cat = get_the_category();
						$cat_name = $cat[0]->cat_name;
						$cat_slug  = $cat[0]->category_nicename;
						$taxname = 'お知らせ';
					}
					echo $taxname;
				?>
			</h1>
    </header>
    <?php //パンくずリスト(yoast seo)
    if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<aside class="bread-navi">','</aside>' ); }
    ?>
		<section class="sec sec-post">
			<div class="inner">
				<?php if(have_posts()): the_post(); ?>
				<header class="post-header">
					<h1 class="post-title"><?php the_title(); ?></h1>
					<div class="post-meta">
						<time class="post-date"><?php the_time('Y.m.d'); ?></time>
						<span class="post-category post-category--<?php echo $post_type; ?>"><?php echo $cat_name; ?></span>
					</div>
				</header>

				<div class="post-body">
					<?php the_content(); ?>
				</div>
				<?php endif; ?>

				<?php //前後の記事（ block/prevnext.php, blick/prevnext-fn.php ）
				get_template_part( 'block/prevnext' ); ?>

			</div>
		</section>
<?php get_footer(); ?>