    <?php //ループクエリ
    if ( isset( $args ) ) {
      $new_Query = new WP_Query($args);
    }
    ?>
    <?php if($new_Query->have_posts()): ?>
    <ul class="list-modelhouse-topics-no-thumbs">
      <?php while($new_Query->have_posts()): $new_Query->the_post(); ?>
      <?php
      // 現在の記事のIDを取得
      $page_id = get_the_ID();
      $post_type_label = get_post_type_object(get_post_type())->label; // 投稿タイプのラベル名を取得
      //記事データ取得
      $kaisaibi = SCF::get('scf_kaisaibi');
      $main_text = SCF::get('scf_group_modelhouse_topics_overview_text');
      $group_block = SCF::get('scf_group_modelhouse_topics_block');
      ?>
      <li class="list-item">
        <a href="<?php the_permalink(); ?>" class="post-group">
          <div class="post-detail">
            <h3 class="post-title"><?php the_title(); ?></h3>
            <?php /* <div class="post-meta-date">開催日：<?php if($kaisaibi): ?><?php echo $kaisaibi; ?><?php endif; ?></div> */ ?>
            <div class="post-meta-date">更新日：<time class="post-date"><?php the_time('Y年m月d日'); ?></time></div>
            <div class="post-meta-modelhouse-name"><?php echo $post_type_label; ?></div>
          </div>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>
    <?php endif; wp_reset_postdata(); ?>