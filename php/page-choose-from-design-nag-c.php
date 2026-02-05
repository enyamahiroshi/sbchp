<?php get_header(); ?>
  <header class="page-header page-header-full">
    <div class="inner">
      <h1 class="page-header__title page-header__title--design">
        <img class="img-park_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo-nagano-hp.svg" alt="SBC長野中央ハウジングパークロゴ" width="128" height="12">デザインから選ぶ
      </h1>
    </div>
  </header>

  <section class="sec sec-full sec-list-design-modelhouse">
    <div class="inner">
      <?php //ループクエリ
      $args = array(
        'post_type' => 'nag-c',
        'posts_per_page' => -1,
        'order' => 'DESC', // 降順（新しい順）
      );
      $new_Query = new WP_Query($args);
      ?>
      <?php if($new_Query->have_posts()): ?>
      <ul class="list-design-modelhouse">
        <?php while($new_Query->have_posts()): $new_Query->the_post(); ?>
        <?php
        // カスタムフィールドデータ
        $main_slides = array();
        $image_count = 0; // 画像数
        $images = array(); // 画像情報
        for ($i = 1; $i <= 5; $i++) {
          $main_slides[] = SCF::get('scf_modelhouse_main_slider' . $i . '_img');
          if ($main_slides[$i - 1]) {
            $image_count++; // 画像が登録されていれば画像数をカウントアップ
            $images[] = wp_get_attachment_image_src($main_slides[$i - 1], 'large');
          }
        }
        ?>
        <?php if ($image_count > 0): // 画像が登録されている記事のみ表示 ?>
        <?php for ($i = 0; $i < $image_count; $i++): ?>
        <li class="list-item">
          <a class="list-item__link" href="<?php the_permalink(); ?>">
            <figure class="design-modelhouse-image">
              <img src="<?php echo $images[$i][0]; ?>" alt="<?php echo $images[$i][1]; ?>">
            </figure>
            <div class="cover"><p>このモデルハウスの<br>詳細を見る</p></div>
          </a>
        </li>
        <?php endfor; ?>
        <?php endif; ?>
        <?php endwhile; ?>
      </ul>
      <?php endif; wp_reset_postdata(); ?>
    </div>
  </section>
<?php get_footer(); ?>