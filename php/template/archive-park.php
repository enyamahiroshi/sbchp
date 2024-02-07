<?php
$post_type = get_queried_object(); // 現在のページの投稿タイプを取得
$post_type_slug = $post_type->name; //投稿タイプのスラッグ
//パーク情報をスラッグで処理
switch ($post_type_slug) {
  case 'nag-c': //長野中央ハウジングパーク
    $park_add = "〒381-0031  長野県長野市西尾張部1030-2";
    $park_googlemap = "https://maps.app.goo.gl/LntD9JcAuCatCTPp7";
    $park_tel = "026-263-8991";
    $park_open = "10:00～17:00";
    $park_logo_image = 'logo-nagano-hp.svg';
    $park_map_image = 'park/nag-c/img-facility-map-nagano.png';

    $post_types = array( //モデルハウスTOPICS一覧取得クエリ用
      'modelhouse-a'
    );
    break;
  case 'ueda': //上田ハウジングパーク
    $park_add = "〒386-0001  長野県上田市上田1360-1";
    $park_googlemap = "https://maps.app.goo.gl/FvTYKNW1bJ8ZBSLZA";
    $park_tel = "0268-21-0633";
    $park_open = "10:00～17:00";
    $park_logo_image = 'logo-ueda-hp.svg';
    $park_modelhouse_all_topics = 'model-house-topics/ueda-hp-topics';
    $park_googlemap = 'model-house-topics/ueda-hp-topics';
    $park_map_image = 'park/ueda/img-facility-map-ueda.png';

    $post_types = array( //モデルハウスTOPICS一覧取得クエリ用
      'modelhouse-a'
    );
    break;
  case 'saku': //佐久平ハウジングパーク
    $park_add = "〒385-0028  長野県佐久市佐久平駅東20-2";
    $park_googlemap = "https://maps.app.goo.gl/FPUC8M9kENgQXEuY7";
    $park_tel = "0267-66-6650";
    $park_open = "10:00～17:00";
    $park_logo_image = 'logo-saku-hp.svg';
    $park_modelhouse_all_topics = 'model-house-topics/saku-hp-topics';
    $park_map_image = 'park/saku/img-facility-map-saku.png';

    $post_types = array( //モデルハウスTOPICS一覧取得クエリ用
      'modelhouse-a'
    );
    break;
  default:
    break;
}
?>
  <header class="page-header page-header--park">
    <h1 class="park-title"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/<?php echo $park_logo_image; ?>" alt="<?php post_type_archive_title(); ?>"></h1>
  </header>

  <section class="sec sec-park-overview">
		<div class="inner">
			<ul class="park-overview">
        <li class="park-overview__data data-address">
          <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/ico-pin.svg" alt="Map" width="20" height="20"></span>
          <p><?php echo $park_add; ?></p>
          <a class="button-map not-icon" href="<?php echo $park_googlemap; ?>" target="_blank" rel="noopener noreferrer">MAP</a>
        </li>
        <li class="park-overview__data data-tel">
          <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/ico-tel.svg" alt="Tel" width="20" height="20"></span>
          <a class="link-tel" href="tel:<?php echo $park_tel; ?>"><?php echo $park_tel; ?></a>
          <p>(管理事務所)</p>
        </li>
        <li class="park-overview__data data-open">
          <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/ico-clock.svg" alt="Open" width="20" height="20"></span>
          <p><?php echo $park_open; ?></p>
        </li>
      </ul>
		</div>
	</section>

  <section class="sec sec-park-main-slider">
		<div class="inner">
			<?php //パークスライダーMain ?>
			<div class="park-main-slider slider">
				<?php //パークスライダーMain - 本体 ?>
				<div class="slider-park-main">
					<div class='swiper-wrapper'>
						<div class='swiper-slide'><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/park/<?php echo $post_type_slug; ?>/img-slide-1.jpg" alt=""></div>
						<div class='swiper-slide'><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/park/<?php echo $post_type_slug; ?>/img-slide-2.jpg" alt=""></div>
						<div class='swiper-slide'><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/park/<?php echo $post_type_slug; ?>/img-slide-3.jpg" alt=""></div>
					</div>
          <div class="swiper-pagination"></div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>
		</div>
	</section>

  <?php //モデルハウス一覧 ?>
  <section class="sec sec-list-modelhouse">
    <h2 class="title-list-modelhouse"><span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/ico-house.svg" alt="" width="23" height="23"></span>モデルハウス一覧</h2>
    <div class="list-modelhouse-wrap">
      <?php if(have_posts()) : ?>
      <ul class="list-modelhouse">
        <?php while (have_posts()) : the_post(); ?>
        <?php
        $logo_data = SCF::get('scf_modelhouse_logo');
        $modelhouse_name = SCF::get('scf_modelhouse_name');
        ?>
        <li class="list-item">
          <a href="<?php the_permalink(); ?>" class="post-group">
            <figure class="post-image">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sample/img-modelhouse.jpg" alt="">
            </figure>
            <div class="modelhouse-logo">
              <?php echo wp_get_attachment_image($logo_data,'large'); ?>
            </div>
            <h2 class="modelhouse-name"><?php if($modelhouse_name){ echo $modelhouse_name; } else { the_title(); } ?></h2>
            <div class="more-text">詳細を見る</div>
          </a>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
	</section>

  <section class="sec sec-l sec-park-information">
		<div class="inner">
      <div class="column-layout-two">
        <?php //モデルハウスTOPICS ?>
        <section class="column-layout-two__first">
          <h2 class="title-1">モデルハウスTOPICS</h2>
          <?php //ループクエリ
          $args = array(
            'post_type' => $post_types,
            'posts_per_page' => '10',
            'orderby' => 'date', // 新着順にソート
            'order' => 'DESC', // 降順（新しい順）
          );
          get_template_part('template/loop', 'modelhouse-topics', $args);
          ?>
          <div class="link-list-more button-wrap --right">
            <a href="<?php echo esc_url( home_url() ); ?>/<?php echo $park_modelhouse_all_topics; ?>" class="button-arrow-right">一覧を見る</a>
          </div>
        </section>
        <section class="column-layout-two__second">
          <div class="block-calendar">
            <h2 class="title-icon title-icon--calendar">営業日カレンダー</h2>
            <p class="text-s">各モデルハウスの営業日をご確認いただけます。</p>
            <div class="button-wrap">
              <a href="" class="button button-calender">営業日カレンダー</a>
            </div>
          </div>
          <div class="block-park-map">
            <h2 class="title-icon title-icon--map">場内マップ</h2>
            <a class="link-park-map" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/<?php echo $park_map_image; ?>">
              <figure class="link-park-map__image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/<?php echo $park_map_image; ?>" alt="場内マップ">
              </figure>
              <div class="button-plus">クリックして拡大</div>
            </a>
          </div>
        </section>
      </div><?php //.column-layout-two ?>
    </div>
	</section>