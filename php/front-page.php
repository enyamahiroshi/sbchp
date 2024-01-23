<?php get_header(); ?>
    <div class="mv">
      <div class="mv__movie">
        <video class="movie switch lozad" src="" data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/mbody_mv_sp.mp4" poster="" muted playsinline loop autoplay></video>
      </div>
      <div class="mv__catchcopy">
        <figure class="mv__catchcopy__image">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/img-mv-catchcopy.svg" alt="">
        </figure>
        <h1 class="mv__catchcopy__text">創業1948年以来、<br>私たちモモセボデーは常にお客様の<br class="sp">カーライフサポートに徹してきました</h1>
      </div>
    </div>

    <section class="sec sec-latest-campaign">
      <div class="inner">
        <h2 class="title">キャンペーン情報</h2>
        <?php
        $recruitCatSlug = get_category_by_slug('recruit');
        $recruitCatID = $recruitCatSlug->term_id;
        $args = array(
          'post_type' => 'post',
          'category_name' => 'campaign',
          'posts_per_page' => '1',
        );
        $the_query = new WP_Query( $args );
        if( $the_query->have_posts() ):
        ?>
        <div class="post-list">
          <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
          <?php
            $thumbNail = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
            if( !$thumbNail ) {
              $thumbNail = get_stylesheet_directory_uri() . '/assets/images/common/img-default-thumbnail.png';
            }
          ?>
          <a href="<?php the_permalink(); ?>" class="post">
            <div class="post__thumbnail">
                <figure class="post-eyecatch">
                  <img src="<?php echo $thumbNail; ?>" alt="">
                </figure>
            </div>
            <div class="post__data">
              <div class="post__data__meta">
                <time class="post-date"><?php the_time('Y.m.d'); ?></time>
              </div>
              <div class="post-title"><?php the_title(); ?></div>
            </div>
          </a>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <div class="button-wrap">
          <a href="<?php echo esc_url( home_url() ); ?>/information/campaign" class="button button--03"><span class="pc">「キャンペーン情報」</span>一覧<span class="sp">を見る</span></a>
        </div>
      </div>
    </section>

    <section class="sec sec-home-history">
      <div class="inner">
        <div class="home-history">
          <div class="home-history__main">
            <h2 class="home-history__main__title">創業1948年（昭和23年 ）─<br>かつては自動車の製造にもチャレンジ。</h2>
            <p class="home-history__main__text">
            日本の自動車の黎明期、自動車製造のチャレンジも経験したモモセボデー。<br>そこから大型ボデー製作から自動車整備へ、<br class="pc">そして救助のためのレッカーまで<br class="pc">大型・小型・特殊車の全てをお任せいただける会社となりました。<br>今でもそのチャレンジ精神をDNAに持ち続け、<br class="pc">乗る人の安全・安心のために歩み続けます。
            </p>
            <div class="button-wrap">
              <a href="<?php echo esc_url( home_url() ); ?>/history" class="button button--02">モモセボデーの歴史詳細へ</a>
            </div>
          </div>
          <div class="home-history__image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/img-history.png" alt="">
          </div>
        </div>
      </div>
    </section>

    <section class="sec sec-home-service">
      <div class="inner">
        <h2 class="title01">モモセボデーのサービス</h2>
        <div class="page-intro">
          <p>モモセボデーでは、新車販売からお車の修理・架装、整備、車検と一貫したサポートを行っています。<br>緊急時にも24時間365日対応。安心してお客様のカーライフをお楽しみください。</p>
        </div>

        <a href="<?php echo esc_url( home_url() ); ?>/service/car-sales" class="service-link">
          <div class="service-link__content">
            <div class="service-link__content__title">
              <em>新車販売</em>
              <span>［国内外の新車販売］</span>
            </div>
            <p class="service-link__content__text">
            正規ディラーでは単一のメーカーから車種を選ばなければなりません。モモセボデーでは複数のメーカーの新車を取り扱っていますので、幅広い知識で車の特徴を把握したアドバイスを行えます。
            </p>
          </div>
          <div class="service-link__image service-link__image--car-sales"></div>
        </a>

        <a href="<?php echo esc_url( home_url() ); ?>/service/repair" class="service-link">
          <div class="service-link__content">
            <div class="service-link__content__title">
              <em>修理 / 架装</em>
              <span>［鈑金・修理、ボデー製作、塗装］</span>
            </div>
            <p class="service-link__content__text">
            へこんだり傷ついてしまったボディ・ドア・バンパー・ボンネットを熟練の技術で新車同様に美しく仕上げます。コーナーを少し当ててしまった、そんな部分も「きれいになった！」とご満足いただけるよう、私たちはスピーディ・低コストでお直しいたします。
            </p>
          </div>
          <div class="service-link__image service-link__image--repair"></div>
        </a>

        <a href="<?php echo esc_url( home_url() ); ?>/service/maintenance" class="service-link">
          <div class="service-link__content">
            <div class="service-link__content__title">
              <em>整備 / 備える</em>
              <span>［車検・点検・整備、保険］</span>
            </div>
            <p class="service-link__content__text">
            愛車をより良い状態でお乗りいただくために、豊富な技術と経験でお預かりしたお車の状態を把握し、スピーディにベストな状態でお返しいたします。代車もご用意できますのでお預かり期間中も不自由さはありません。
            </p>
          </div>
          <div class="service-link__image service-link__image--maintenance"></div>
        </a>

        <a href="<?php echo esc_url( home_url() ); ?>/service/emergency" class="service-link">
          <div class="service-link__content">
            <div class="service-link__content__title">
              <em>緊急対応</em>
              <span>［修理・車両救助対応、レッカー・NEXCO連携］</span>
            </div>
            <p class="service-link__content__text">
            車がぶつかってしまった！自動車を側溝に落としてしまった・・。気が動転しとても落ち着ける状況ではありません。モモセボデーでは24時間365日ご連絡をいただければ対応できる体制をとっています。
            </p>
          </div>
          <div class="service-link__image service-link__image--emergency"></div>
        </a>
      </div>
    </section>
<?php get_footer(); ?>