<?php
$postType = get_query_var('postType');
$postCategory = get_query_var('postCategory');
$postNum = get_query_var('postNum');
$args = array(
  'post_type' => $postType,
  'category_name' => $postCategory,
  'posts_per_page' => $postNum,
);
$the_query = new WP_Query( $args );
if( $the_query->have_posts() ):
?>
<ul class="post-list sr-fadeInUp">
<?php
while( $the_query->have_posts() ): $the_query->the_post();
$category = get_the_category();
$cat_name = $category[0]->cat_name;
$cat_slug = $category[0]->category_nicename;
?>
  <li class="post-list__item">
    <div class="post-date"><?php the_time('Y.m.d'); ?></div>
    <?php /* <div class="post-category post-category--<?php echo $cat_slug; ?>"><?php echo $cat_name; ?></div> */ ?>
    <a href="<?php the_permalink(); ?>" class="post-link"><?php the_title(); ?></a>
  </li>
<?php endwhile; ?>
</ul>
<?php endif; wp_reset_postdata(); ?>