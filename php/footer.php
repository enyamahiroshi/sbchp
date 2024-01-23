    <?php if( !is_page( array( 'inquiry', 'thanks' ) ) ): ?>

    <?php //実績紹介　新着
    if( !( is_post_type_archive( 'works' ) || is_singular( 'works' ) ) ): ?>
    <section class="sec sec-latest-works">
      <div class="inner">
        <h2 class="title04">実績紹介</h2>
        <?php
        $args = array(
          'post_type' => 'works',
          'posts_per_page' => '6',
        );
        $the_query = new WP_Query( $args );
        if( $the_query->have_posts() ):
        ?>
        <div class="post-list post-list--works">
          <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
          <?php
            $taxonomy = 'works_category';
            $taxonomy_terms_cat = get_the_terms($post->ID, $taxonomy);
            $taxonomy_terms_cat_name = $taxonomy_terms_cat[0]->name;
            $taxonomy_terms_cat_slug = $taxonomy_terms_cat[0]->slug;
            $thumbNail = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
            if( !$thumbNail ) {
              $thumbNail = get_stylesheet_directory_uri() . '/assets/images/common/img-default-thumbnail.png';
            }
          ?>
          <article class="post post--works">
            <a href="<?php the_permalink(); ?>" class="post-eyecatch"><img src="<?php echo $thumbNail; ?>" alt=""></a>
            <a href="<?php echo esc_url( home_url() ); ?>/works/<?php echo $taxonomy_terms_cat_slug; ?>" class="post-category"><?php echo $taxonomy_terms_cat_name; ?></a>
            <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
            <div class="post-date"><?php the_time('Y.m.d'); ?></div>
            </a>
          </article>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <div class="button-wrap">
          <a href="<?php echo esc_url( home_url() ); ?>/works" class="button button--03">「実績紹介」一覧</a>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php //お知らせ　新着
    if( !( is_home() || is_category() || is_single() ) || is_category('recruit') ): ?>
    <section class="sec sec-latest">
      <div class="inner">
        <h2 class="title04">お知らせ</h2>
        <?php
        $recruitCatSlug1 = get_category_by_slug('campaign');
        $recruitCatID1 = $recruitCatSlug1->term_id;
        $recruitCatSlug2 = get_category_by_slug('recruit');
        $recruitCatID2 = $recruitCatSlug2->term_id;
        $args = array(
          'post_type' => 'post',
          'category__not_in' => array($recruitCatID1,$recruitCatID2),
          'posts_per_page' => '3',
        );
        $the_query = new WP_Query( $args );
        if( $the_query->have_posts() ):
        ?>
        <div class="post-list">
          <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
          <?php
            $cats = get_the_category();
            foreach($cats as $cat) {
              $cat_name = $cat->name;
              $cat_slug = $cat->slug;
            }
            $thumbNail = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
            if( !$thumbNail ) {
              $thumbNail = get_stylesheet_directory_uri() . '/assets/images/common/img-default-thumbnail.png';
            }
          ?>
          <article class="post">
            <div class="post__thumbnail">
              <a href="<?php the_permalink(); ?>">
                <figure class="post-eyecatch">
                  <img src="<?php echo $thumbNail; ?>" alt="">
                </figure>
              </a>
            </div>
            <div class="post__data">
              <div class="post__data__meta">
                <time class="post-date"><?php the_time('Y.m.d'); ?></time>
                <a href="<?php echo esc_url( home_url() ); ?>/information/<?php echo $cat_slug; ?>" class="post-category"><?php echo $cat_name; ?></a>
              </div>
              <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
            </div>
          </article>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <div class="button-wrap">
          <a href="<?php echo esc_url( home_url() ); ?>/information" class="button button--03">「お知らせ」一覧</a>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php //クルマの知恵袋　新着
    if( !( is_post_type_archive( 'kurumano-chie-bukuro' ) || is_singular( 'kurumano-chie-bukuro' ) ) ): ?>
    <section class="sec sec-latest-kurumano-chie-bukuro">
      <div class="inner">
        <div class="title-latest-kurumano-chie-bukuro">
          <h2>クルマの知恵袋</h2>
          <p>モモセボデーが配信する、クルマの知って得する情報！</p>
        </div>
        <?php
        $args = array(
          'post_type' => 'kurumano-chie-bukuro',
          'posts_per_page' => '6',
        );
        $the_query = new WP_Query( $args );
        if( $the_query->have_posts() ):
        ?>
        <div class="post-list post-list--kurumano-chie-bukuro">
          <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
          <?php
            $taxonomy = 'kurumano-chie-bukuro_category';
            $taxonomy_terms_cat = get_the_terms($post->ID, $taxonomy);
            $taxonomy_terms_cat_name = $taxonomy_terms_cat[0]->name;
            $taxonomy_terms_cat_slug = $taxonomy_terms_cat[0]->slug;
            $thumbNail = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
            if( !$thumbNail ) {
              $thumbNail = get_stylesheet_directory_uri() . '/assets/images/common/img-default-thumbnail.png';
            }
          ?>
          <article class="post post--kurumano-chie-bukuro">
            <a href="<?php the_permalink(); ?>" class="post-eyecatch"><img src="<?php echo $thumbNail; ?>" alt=""></a>
            <a href="<?php echo esc_url( home_url() ); ?>/kurumano-chie-bukuro/<?php echo $taxonomy_terms_cat_slug; ?>" class="post-category"><?php echo $taxonomy_terms_cat_name; ?></a>
            <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
          </article>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <div class="button-wrap">
          <a href="<?php echo esc_url( home_url() ); ?>/kurumano-chie-bukuro" class="button button--03_white">「クルマの知恵袋」一覧</a>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php //お問い合わせ・ご相談へ ?>
    <section class="sec sec-to-inquiry">
      <div class="inner">
        <h2 class="title05">車の購入、修理、点検、車検 等<br class="sp">のご相談はこちらから</h2>
        <p class="to-inquiry-text">
        「いろいろなメーカーの車を比べて検討したい」<br class="pc">「別のところで買った車だけど修理や点検をして欲しい」<br class="pc">「車の塗装をしたいけど見積りをお願いしたい」
        </p>
        <p class="to-inquiry-subtext">
          などなど…お車に関することはお気軽にご相談ください。
        </p>
        <a href="<?php echo esc_url( home_url() ); ?>/inquiry" class="button button--01">お問い合わせ・ご相談</a>
        <div class="to-inquiry-tel">
          <p class="to-inquiry-tel__text">お急ぎの方はお電話で</p>
          <a href="tel:0263-25-8899" class="to-inquiry-tel__num link-tel"><span>TEL</span> 0263-25-8899</a>
          <p class="to-inquiry-tel__text">お電話対応時間［平日 8:30 - 17:30］</p>
        </div>
      </div>
    </section>
    <?php endif; ?>
  </main>

  <?php //フッター ?>
  <footer class="footer">
    <div class="footer__head">
      <div class="footer__head__logo">
        <P class="footer__head__logo__catchcopy">創業1948年（昭和23年）</P>
        <figure class="footer__head__logo__image">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo2.svg" alt="モモセボデーロゴマーク">
        </figure>
      </div>
      <?php //カスタムメニューの呼び出し
        wp_nav_menu( array ( 'menu'=>'footer_menu', 'container'=>'nav' , 'container_class' =>'footer-navi' , 'menu_class'=>'menu',  'items_wrap'=>'<ul class="%2$s">%3$s</ul>' ) );
      ?>
    </div>
    <div class="footer__foot">
      <div class="footer__foot__info">
        <div class="footer__foot__info__address">
          <p>〒399-0004 長野県松本市市場2番8号</p>
          <a href="<?php echo esc_url(home_url()); ?>/company/#accessmap" class="bottun-footer"><span>アクセス</span>MAP</a>
        </div>
        <div class="footer__foot__info__number">
          <a href="tel:0263-25-8899" class="bottun-footer">TEL 0263-25-8899</a>
          <p>FAX 0263-25-8099</p>
        </div>
      </div>
      <div class="footer__foot__group">
        <p>モモセボデーグループ</p>
        <ul class="footer__foot__group__icon">
          <li class="footer__foot__group__icon__momosebody"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo.svg" alt="モモセボデーロゴマーク"></li>
          <li class="footer__foot__group__icon__centralparts"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo-centralparts.png" alt="セントラルパーツロゴマーク"></li>
        </ul>
      </div>
      <div class="footer__foot__other">
        <aside class="sns-links">
          <a href="http://" target="_blank" rel="noopener noreferrer" class="sns-links__item">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><path d="M15,30A15,15,0,1,1,30,15,15.017,15.017,0,0,1,15,30ZM6.64,21.39v0A9.954,9.954,0,0,0,12.1,23a9.73,9.73,0,0,0,7.54-3.31,10.506,10.506,0,0,0,2.616-6.847c0-.153,0-.311-.008-.459a7.284,7.284,0,0,0,1.785-1.851,7.282,7.282,0,0,1-2.051.562,3.573,3.573,0,0,0,1.569-1.977,7.227,7.227,0,0,1-2.265.867,3.535,3.535,0,0,0-2.607-1.125,3.572,3.572,0,0,0-3.569,3.567,3.214,3.214,0,0,0,.1.814,10.158,10.158,0,0,1-7.359-3.73,3.588,3.588,0,0,0-.482,1.791,3.549,3.549,0,0,0,1.591,2.968,3.48,3.48,0,0,1-1.614-.444v.045a3.587,3.587,0,0,0,2.865,3.5,3.529,3.529,0,0,1-1.614.06,3.562,3.562,0,0,0,3.331,2.479,7.13,7.13,0,0,1-4.434,1.525A6.416,6.416,0,0,1,6.64,21.39Z" fill="#fff"/></svg>
          </a>
          <a href="http://" target="_blank" rel="noopener noreferrer" class="sns-links__item">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><path d="M15,30A15,15,0,0,1,4.393,4.393,15,15,0,1,1,25.607,25.607,14.9,14.9,0,0,1,15,30ZM11.223,5.77a5.46,5.46,0,0,0-5.454,5.454v7.4a5.46,5.46,0,0,0,5.454,5.453h7.4a5.459,5.459,0,0,0,5.453-5.453v-7.4A5.46,5.46,0,0,0,18.624,5.77Zm7.4,16.1h-7.4a3.249,3.249,0,0,1-3.246-3.244v-7.4a3.249,3.249,0,0,1,3.246-3.245h7.4a3.248,3.248,0,0,1,3.244,3.245v7.4A3.248,3.248,0,0,1,18.624,21.869Zm-3.7-11.815a4.869,4.869,0,1,0,4.87,4.869A4.875,4.875,0,0,0,14.923,10.054Zm4.87-1.168a1.169,1.169,0,1,0,1.168,1.168A1.17,1.17,0,0,0,19.793,8.886Zm-4.87,8.7a2.661,2.661,0,1,1,2.661-2.661A2.664,2.664,0,0,1,14.923,17.584Z" transform="translate(0)" fill="#fff"/></svg>
          </a>
          <a href="http://" target="_blank" rel="noopener noreferrer" class="sns-links__item">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><path d="M15,30A15,15,0,0,1,4.393,4.393,15,15,0,1,1,25.607,25.607,14.9,14.9,0,0,1,15,30ZM10.385,13.251v3h2.637V23.51a10.539,10.539,0,0,0,3.245,0V16.253h2.42l.46-3h-2.88V11.3a1.5,1.5,0,0,1,1.692-1.622h1.31V7.126a16.138,16.138,0,0,0-2.324-.2c-2.456,0-3.922,1.51-3.922,4.04v2.288Z" transform="translate(0)" fill="#fff"/></svg>
          </a>
        </aside>
        <p class="footer__foot__copyrights">© MOMOSE BODY co,ltd.</p>
      </div>
    </div>
  </footer>

  <?php if( !is_page( array( 'inquiry', 'thanks' ) ) ): ?>
  <aside class="inquiry-links pc">
    <div class="inquiry-links__title">各種お問い合わせ</div>
    <div class="button-wrap">
      <a href="<?php echo esc_url( home_url() ); ?>/inquiry/?k=新車の購入について相談したい" class="button button--inpuiry">新車購入のご相談</a>
      <a href="<?php echo esc_url( home_url() ); ?>/inquiry/?k=車の修理・点検・車検の相談をしたい" class="button button--inpuiry">修理・点検・車検のご相談</a>
      <a href="<?php echo esc_url( home_url() ); ?>/inquiry" class="button button--inpuiry-other">その他のお問い合わせ</a>
    </div>
  </aside>
  <?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>