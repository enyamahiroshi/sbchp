<div class="recruitment-information">
  <h2 class="headline01 sr-fadeInUp">求人情報</h2>
  <?php
  $args = array(
    'post_type' => 'recruit',
    'posts_per_page' => '-1',
  );
  $the_query = new WP_Query( $args );
  if( $the_query->have_posts() ):
  ?>
  <ul class="list-recruitment sr-fadeInUp">
    <?php
    while( $the_query->have_posts() ): $the_query->the_post();
    $job_intro = get_field('cf-job_intro'); // この仕事について
    if(mb_strlen($job_intro) > 61){
      $job_intro = mb_substr($job_intro,0,60) . '...';
    }
    $job_keitai = get_field('cf-job_keitai'); // 雇用形態
    $job_salary = get_field('cf-job_salary'); // 給与
    ?>
    <li class="job-card">
      <div class="job-card__title">募集職種</div>
      <h3 class="job-card__name"><?php the_title(); ?></h3>
      <div class="job-card__type"><span class="txt-label"><?php echo $job_keitai; ?></span></div>
      <div class="job-card__fee"><span>給与：</span><?php echo $job_salary; ?></div>
      <div class="job-card__lead-text"><?php echo $job_intro; ?></div>
      <div class="button-wrap"><a href="<?php the_permalink(); ?>" class="button button--03">詳細を見る</a></div>
    </li>
    <?php endwhile; ?>
  </ul>
  <?php endif; wp_reset_postdata(); ?>
</div>