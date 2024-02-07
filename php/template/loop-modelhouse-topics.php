    <?php //ループクエリ
    if ( isset( $args ) ) {
      $new_Query = new WP_Query($args);
    }
    ?>
    <?php if($new_Query->have_posts()): ?>
    <ul class="list-modelhouse-topics-park">
      <?php while($new_Query->have_posts()): $new_Query->the_post(); ?>
      <?php
      // 現在の記事のIDを取得
      $page_id = get_the_ID();
      $author_name = get_the_author_meta('display_name'); //ユーザーの「表示名」 = ユーザー作成時にモデルハウス名と設定する
      //記事データ取得
      $kaisaibi = SCF::get('scf_kaisaibi');
      $main_image = SCF::get('scf_group_modelhouse_topics_overview_image');
      $main_text = SCF::get('scf_group_modelhouse_topics_overview_text');
      $group_block = SCF::get('scf_group_modelhouse_topics_block');
      ?>
      <li class="list-item">
        <a href="<?php the_permalink(); ?>" class="post-group">
          <figure class="post-image">
          <?php //イントロ画像
          if($main_image){
            echo wp_get_attachment_image($main_image,'thumbnail');
          } else {
            echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/common/img-no-image.png" alt="no image">';
          } ?>
          </figure>
          <div class="post-detail-wrap">
            <div class="post-detail">
              <h3 class="post-title"><?php the_title(); ?></h3>
              <div class="post-meta-date">開催日：<?php if($kaisaibi): ?><?php echo $kaisaibi; ?><?php endif; ?></div>
              <div class="post-meta-modelhouse-name">[<?php echo $author_name; ?>]</div>
            </div>
            <?php //イントロ文章
            if($main_text){
              echo '<div class="post-overview">';
              echo '<p class="item-block__text">'.$main_text.'</p>';
              echo '</div>';
            } ?>
          </div>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>
    <?php endif; wp_reset_postdata(); ?>