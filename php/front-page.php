<?php get_header(); ?>
  <div class="mv">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/img-mv.png" alt="">
  </div>

  <section class="sec sec-l sec-event-news">
		<div class="inner">
      <?php //イベント&NEWS ?>
      <h2 class="title-2">
        <img class="img-park_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo-main.svg" alt="SBCハウジングパークロゴ" width="128" height="12">イベント&NEWS
      </h2>
      <?php //ループクエリ
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => '10',
        'orderby' => 'date', // 新着順にソート
        'order' => 'DESC', // 降順（新しい順）
      );
      $new_query = new WP_Query($args);
      if( $new_query->have_posts() ):
      ?>
      <ul class="list-event-news-smart">
        <?php while( $new_query->have_posts() ): $new_query->the_post(); ?>
        <li class="list-item">
          <a href="<?php the_permalink(); ?>" class="post-group">
            <div class="post-category
            <?php
            $categories = get_the_category();
            foreach ($categories as $category) {
              echo ' cat-'.$category->slug;
            }
            ?>
            ">
            <?php
            $categories = get_the_category();
            foreach ($categories as $category) {
              echo $category->name;
            }
            ?>
            </div>
            <div class="post-detail">
              <!-- <time class="post-date"><?php the_time('Y年m月d日'); ?></time> -->
              <h3 class="post-title"><?php the_title(); ?></h3>
            </div>
          </a>
        </li>
        <?php endwhile; ?>
        <?php else: ?>
        <li class="no-posts">
          <p>現在、イベント＆NEWSはありません</p>
        </li>
      </ul>
      <?php endif; wp_reset_postdata(); ?>
    </div>
  </section>

  <section class="sec sec-l sec-park-list">
		<div class="inner">
      <h2 class="title-1" data-sub="ご希望の展示場をご見学ください">展示場を選ぶ</h2>
      <div class="park-list">
        <?php //パーク ?>
        <section class="park">
          <figure class="park-image">
            <img class="img-park_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/park/nag-c/img-slide-1.jpg" alt="SBC長野中央ハウジングパーク外観" width="354" height="200">
          </figure>
          <h3 class="park-name --nag-c"><span>長野中央</span>ハウジングパーク</h3>
          <div class="detail-container">
            <ul class="park-overview --nag-c">
              <li class="park-overview__data data-address">
                <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/ico-pin.svg" alt="Map" width="20" height="20"></span>
                <p>長野県長野市西尾張部1030-2</p>
              </li>
              <li class="park-overview__data data-house">
                <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/ico-house.svg" alt="" width="23" height="23"></span>
                <p>モデルハウス11棟</p>
              </li>
            </ul>
            <div class="park-button">
              <a class="button button-gray" href="<?php echo esc_url( home_url() ); ?>/nag-c">モデルハウス一覧</a>
              <a class="button button-reserve-s" href="<?php echo esc_url( home_url() ); ?>/reserve">見学予約</a>
            </div>
            <h4 class="title-3">モデルハウスTOPICS</h4>
            <?php //ループクエリ
            // 投稿タイプを動的に取得
            $post_types = array();
            $suffix = '_nag-c';

            // すべての投稿タイプを取得
            $all_post_types = get_post_types(array('public' => true, '_builtin' => false), 'names');

            // 特定のサフィックスを含む投稿タイプをフィルタリング
            foreach ($all_post_types as $post_type) {
              if (strpos($post_type, $suffix) !== false) {
                $post_types[] = $post_type;
              }
            }

            $args = array(
              'post_type' => $post_types,
              'posts_per_page' => '3',
              'orderby' => 'date', // 新着順にソート
              'order' => 'DESC', // 降順（新しい順）
            );
            get_template_part('template/loop', 'modelhouse-topics-no-images', $args);
            ?>
            <div class="button-wrap --right">
              <a href="<?php echo esc_url( home_url() ); ?>/model-house-topics/nag-c-hp-topics" class="button-arrow-right">一覧を見る</a>
            </div>
          </div>
          <button class="button-tgl-open_close js-tgl-park"><span></span></button>
        </section>
        <?php //パーク ?>
        <section class="park">
          <figure class="park-image">
            <img class="img-park_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/park/ueda/img-slide-1.jpg" alt="SBC上田ハウジングパーク外観" width="354" height="200">
          </figure>
          <h3 class="park-name --ueda"><span>上田</span>ハウジングパーク</h3>
          <div class="detail-container">
            <ul class="park-overview --ueda">
              <li class="park-overview__data data-address">
                <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/ico-pin.svg" alt="Map" width="20" height="20"></span>
                <p>長野県上田市上田1360-1</p>
              </li>
              <li class="park-overview__data data-house">
                <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/ico-house.svg" alt="" width="23" height="23"></span>
                <p>モデルハウス15棟</p>
              </li>
            </ul>
            <div class="park-button">
              <a class="button button-gray" href="<?php echo esc_url( home_url() ); ?>/ueda">モデルハウス一覧</a>
              <a class="button button-reserve-s" href="<?php echo esc_url( home_url() ); ?>/reserve">見学予約</a>
            </div>
            <h4 class="title-3">モデルハウスTOPICS</h4>
            <?php //ループクエリ
            // 投稿タイプを動的に取得
            $post_types = array();
            $suffix = '_ueda';

            // すべての投稿タイプを取得
            $all_post_types = get_post_types(array('public' => true, '_builtin' => false), 'names');

            // 特定のサフィックスを含む投稿タイプをフィルタリング
            foreach ($all_post_types as $post_type) {
              if (strpos($post_type, $suffix) !== false) {
                $post_types[] = $post_type;
              }
            }

            $args = array(
              'post_type' => $post_types,
              'posts_per_page' => '3',
              'orderby' => 'date', // 新着順にソート
              'order' => 'DESC', // 降順（新しい順）
            );
            get_template_part('template/loop', 'modelhouse-topics-no-images', $args);
            ?>
            <div class="button-wrap --right">
              <a href="<?php echo esc_url( home_url() ); ?>/model-house-topics/ueda-hp-topics" class="button-arrow-right">一覧を見る</a>
            </div>
          </div>
          <button class="button-tgl-open_close js-tgl-park"><span></span></button>
        </section>
        <?php //パーク ?>
        <section class="park">
          <figure class="park-image">
            <img class="img-park_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/park/saku/img-slide-1.jpg" alt="SBC佐久平ハウジングパーク外観" width="354" height="200">
          </figure>
          <h3 class="park-name --saku"><span>佐久平</span>ハウジングパーク</h3>
          <div class="detail-container">
            <ul class="park-overview --saku">
              <li class="park-overview__data data-address">
                <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/ico-pin.svg" alt="Map" width="20" height="20"></span>
                <p>長野県佐久市佐久平駅東20-2</p>
              </li>
              <li class="park-overview__data data-house">
                <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/ico-house.svg" alt="" width="23" height="23"></span>
                <p>モデルハウス10棟</p>
              </li>
            </ul>
            <div class="park-button">
              <a class="button button-gray" href="<?php echo esc_url( home_url() ); ?>/saku">モデルハウス一覧</a>
              <a class="button button-reserve-s" href="<?php echo esc_url( home_url() ); ?>/reserve">見学予約</a>
            </div>
            <h4 class="title-3">モデルハウスTOPICS</h4>
            <?php //ループクエリ
            // 投稿タイプを動的に取得
            $post_types = array();
            $suffix = '_saku';

            // すべての投稿タイプを取得
            $all_post_types = get_post_types(array('public' => true, '_builtin' => false), 'names');

            // 特定のサフィックスを含む投稿タイプをフィルタリング
            foreach ($all_post_types as $post_type) {
              if (strpos($post_type, $suffix) !== false) {
                $post_types[] = $post_type;
              }
            }

            $args = array(
              'post_type' => $post_types,
              'posts_per_page' => '3',
              'orderby' => 'date', // 新着順にソート
              'order' => 'DESC', // 降順（新しい順）
            );
            get_template_part('template/loop', 'modelhouse-topics-no-images', $args);
            ?>
            <div class="button-wrap --right">
              <a href="<?php echo esc_url( home_url() ); ?>/model-house-topics/saku-hp-topics" class="button-arrow-right">一覧を見る</a>
            </div>
          </div>
          <button class="button-tgl-open_close js-tgl-park"><span></span></button>
        </section>
      </div>
    </div>
  </section>

  <section class="sec sec-l sec-oyakudachi-column-title">
		<div class="inner">
      <h2 class="title-1" data-sub="家を建てる前に知っておきたい豆知識や情報が満載！">家づくりお役立ちコラム</h2>
    </div>
	</section>
  <section class="sec sec-l sec-oyakudachi-column-home">
		<div class="inner">
      <?php //ループクエリ
      $args = array(
        'post_type' => 'oyakudachi-column',
        'posts_per_page' => '5',
      );
      $oyakudachi_query = new WP_Query($args);
      ?>
			<ul class="list-oyakudachi-column">
        <?php if ($oyakudachi_query->have_posts()): while ($oyakudachi_query->have_posts()): $oyakudachi_query->the_post(); ?>
        <li class="list-item">
          <a href="<?php the_permalink(); ?>" class="post-group">
            <figure class="post-image">
              <?php if (has_post_thumbnail()): the_post_thumbnail(); ?>
              <?php else: ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sample/img-dammy.jpg" alt="">
              <?php endif; ?>
            </figure>
            <div class="post-detail">
              <h3 class="post-title"><?php the_title(); ?></h3>
              <?php
              $main_text = SCF::get('scf_text_mainarea');
              // $main_text = mb_substr($main_text, 0, 80);
              if($main_text){
                echo '<div class="post-lead">'.$main_text.'</div>';
              }
              ?>
            </div>
          </a>
        </li>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </ul>
		</div>
	</section>

  <section class="sec sec-l sec-oyakudachi-list">
		<div class="inner">

    </div>
  </section>
<?php get_footer(); ?>