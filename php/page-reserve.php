<?php
/**
 * From Action
 *
 */
$objApp = new Reserve();
$objApp->main();
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('style-custom', get_template_directory_uri() . '/assets/form/css/app.css', false, '','all');
});
?>
<?php get_header(); ?>
  <header class="page-header page-header--reserve">
    <div class="inner">
      <h1 class="page-header__title page-header__title--reserve">モデルハウス見学予約フォーム［無料］</h1>
    </div>
  </header>

  <section class="sec sec-form-info">
    <div class="inner">
      <p class="form-info-intro">気になるハウスメーカーのモデルハウスをまとめて見学予約できるサービスです。<br>下記の申し込みフォームにて<em>同一展示場からご希望のモデルハウスを最大3棟</em>まで選び、ご希望の見学日・時間帯を指定してください。なお、見学時間は<em>1棟あたり90分間隔以上</em>をお勧めします。また、<em>30分以内のご見学及び住宅建築予定が無い方のご見学はプレゼント対象外</em>とさせていただきます。</p>
      <div class="form-info-notes">
        <p>※キャンペーン開催の場合は、<em class="red">”期間中に見学された方”</em>が特典対象となります。なお、過去に本キャンぺーン特典を受けたご家族は特典対象外とさせていただきます。</p>
        <p>※各出展メーカーが単独開催する見学キャンペーンとの重複申込みはできません。</p>
        <p>※見学予約日のご指定前に必ず各展示場の「営業日カレンダー」にて営業日をご確認ください。</p>
        <p>※12月27日〜翌年1月7日は、年末年始のため見学予約システムでの受付ができません。各社ごとに休業期間が異なりますので見学ご希望のモデルハウスへ直接お問い合わせください。</p>
      </div>
      <div class="form-info-merit-container">
        <h2>見学予約のメリット</h2>
        <dl class="form-info-merit">
          <div>
            <dt>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/reserve/img-merit-1.svg" alt="メリット1">
            </dt>
            <dd>
              <p>予約済みなので<em class="text-em-red">待ち時間がありません</em>！</p>
            </dd>
          </div>
          <div>
            <dt>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/reserve/img-merit-2.svg" alt="メリット2">
            </dt>
            <dd>
              <p>ご希望の見学時間で<em class="text-em-green">ゆったり見学</em>できます！</p>
            </dd>
          </div>
          <div>
            <dt>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/reserve/img-merit-3.svg" alt="メリット3">
            </dt>
            <dd>
              <p>事前に質問などができるので<em class="text-em-blue">効率的</em>です！</p>
            </dd>
          </div>
        </dl>
      </div>
      <div class="form-info-attentions">
        <h2>注意事項</h2>
        <ul>
          <li>お申込みフォームは、お申込みをSBCハウジングが代行して一旦受け付けるもので、<em>ご予約の完了ではありません。</em></li>
          <li>ご希望日時を各モデルハウスと調整のうえ、SBCハウジングより<em>改めて見学予約結果を連絡させていただきます。</em></li>
          <li>お申込み後の自動返信メールや、予約結果連絡メールが「@sbchp.jp」から送信されますので受信設定をお願い致します。なお、メールが届かない場合はSBCハウジングまでお電話ください。TEL.026-238-6501（平日：10:00～18:00）</li>
          <li>モデルハウスが定休日や長期休暇等により、予約結果連絡メールの日数がかかる場合があります。また、ご予約いただいたメーカーよりお電話がある場合がございます。</li>
          <li>ご予約が確定した後に<em>キャンセルをされる場合は各モデルハウスへ直接ご連絡をお願いいたします。</em></li>
        </ul>
      </div>
    </div>
  </section>

  <section id="appForm" class="sec sec-form-title">
    <div class="inner">
      <h2 class="form-title-tab">モデルハウス見学予約フォーム</h2>
    </div>
  </section>

  <article class="form-contents">

    <?php //step ?>
    <section class="sec sec-form-step">
      <div class="inner">
        <div class="form-step">
          <div class="step-item current"><div class="dot"></div><div class="text">入力</div></div>
          <div class="step-separate"></div>
          <div class="step-item"><div class="dot"></div><div class="text">確認</div></div>
          <div class="step-separate"></div>
          <div class="step-item"><div class="dot"></div><div class="text">完了</div></div>
        </div>
      </div>

      <?php if (!empty($objApp->exceptionErr) || isset($objApp->arrErr['g-recaptcha-response'])): ?>
      <div class="inner">
        <div class="form-info-attentions">
        <?php if (!empty($objApp->exceptionErr)): ?>
            <p class="u-error__box"><?php echo $objApp->exceptionErr; ?></p>
        <?php endif; ?>
        <?php if (isset($objApp->arrErr['g-recaptcha-response'])) : ?>
            <p class="u-error__box"><?php echo $objApp->arrErr["g-recaptcha-response"]; ?></p>
        <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>

    </section>



    <form method="post" action="?" novalidate>
    <input type="hidden" name="mode" value="confirm">
    <input type="hidden" name="<?php echo TRANSACTION_NAME; ?>" value="<?php echo Sessions::getToken(); ?>">


    <?php //1.展示場選択 ?>
    <section class="sec sec-form-contents sec-form-contents--1">
      <div class="inner">
        <h2 class="form-title" data-num="1">ご希望の展示場を選んでください。（いずれか1つ）</h2>

        <section class="form-item-wrap-radio select-park js-park">
          <fieldset>

            <?php //各展示場 ?>
            <div class="form-item">
              <input type="radio" name="park" id="park-nag-c" data-park="--park-in-nag-c" value="SBC長野中央ハウジングパーク"<?php Utils::checked('SBC長野中央ハウジングパーク', $objApp->arrData['park'] ?? '', true); ?>>
              <label class="form-item-label" for="park-nag-c">
                <figure class="form-item-image">
                  <img class="img-park_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/park/nag-c/img-slide-1.jpg" alt="SBC長野中央ハウジングパーク外観" width="354" height="200">
                </figure>
                <div class="park-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo-nagano-hp.svg" alt="SBC長野中央ハウジングパークロゴ"></div>
                <span class="status-checked"></span>
              </label>
            </div>

            <?php //各展示場 ?>
            <div class="form-item">
              <input type="radio" name="park" id="park-ueda" data-park="--park-in-ueda" value="SBC上田ハウジングパーク"<?php Utils::checked('SBC上田ハウジングパーク', $objApp->arrData['park'] ?? ''); ?>>
              <label class="form-item-label" for="park-ueda">
                <figure class="form-item-image">
                  <img class="img-park_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/park/ueda/img-slide-1.jpg" alt="SBC上田ハウジングパーク外観" width="354" height="200">
                </figure>
                <div class="park-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo-ueda-hp.svg" alt="SBC上田ハウジングパークロゴ"></div>
                <span class="status-checked"></span>
              </label>
            </div>

            <?php //各展示場 ?>
            <div class="form-item">
              <input type="radio" name="park" id="park-saku" data-park="--park-in-saku" value="SBC佐久平ハウジングパーク"<?php Utils::checked('SBC佐久平ハウジングパーク', $objApp->arrData['park'] ?? ''); ?>>
              <label class="form-item-label" for="park-saku">
                <figure class="form-item-image">
                  <img class="img-park_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/park/saku/img-slide-1.jpg" alt="SBC佐久平ハウジングパーク外観" width="354" height="200">
                </figure>
                <div class="park-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo-saku-hp.svg" alt="SBC佐久平ハウジングパークロゴ"></div>
                <span class="status-checked"></span>
              </label>
            </div>

          </fieldset>
        </section>

      </div>
    </section><?php //1.展示場選択 ?>


    <?php //2.モデルハウス選択 ?>
    <section class="sec sec-l sec-form-contents sec-form-contents--2">
      <div class="inner">
        <h2 class="form-title" data-num="2">ご見学希望のモデルハウスを選んでください。（最大3棟まで選択可能）</h2>
        <?php if (isset($objApp->arrErr['models']) && !empty($objApp->arrErr['models'])): ?>
        <div class="form-info-attentions">
            <?php Utils::printErr($objApp->arrErr['models'] ?? ''); ?>
        </div>
        <?php endif; ?>

        <section class="form-item-wrap-checkbox select-modelhouse js-modelhouse">
          <fieldset>

            <?php // モデルハウスの投稿タイプ'nag-c'の記事リスト
            $args = array(
              'post_type' => 'nag-c',
              'posts_per_page' => -1,

              // 一時的にリストから除外（記事ID）
              'post__not_in' => array(365,9224),
            );
            if ( isset( $args ) ) { $new_Query = new WP_Query($args); }
            ?>
            <?php if($new_Query->have_posts()): ?>
            <ul class="list-modelhouse --park-in-nag-c">
              <?php while ($new_Query->have_posts()) : $new_Query->the_post(); ?>
              <?php
              $logo_data = SCF::get('scf_modelhouse_logo');
              $logo_image_path = wp_get_attachment_image($logo_data,'medium');
              $logo_image_path = !empty($logo_image_path) ? $logo_image_path : '<img width="216" height="60" src="' . get_stylesheet_directory_uri() . '/assets/images/common/logo-sample.png">';
              // $modelhouse_name = SCF::get('scf_modelhouse_name'); //モデルハウスの商品名ではなくモデルハウス名（記事タイトル）を使用に変更
              $modelhouse_name = get_the_title();
              $slug = get_post(get_the_ID())->post_name . '_' . get_the_ID();
              $modelhouse = !empty($modelhouse_name) ? $modelhouse_name : get_the_title();
              $keyName = $modelhouse . '-ID-' . get_the_ID();
              ?>
              <li class="list-item form-item" data-model="<?php echo get_the_ID(); ?>">
                <input type="checkbox" name="model[<?php echo get_the_ID(); ?>][name]" id="mh-<?php echo $slug; ?>" value="<?php esc_attr_e($keyName ?? ''); ?>"<?php Utils::checked($keyName, $objApp->arrData['models'] ?? []); ?>>
                <label class="post-group form-item-label" for="mh-<?php echo $slug; ?>">
                  <?php if (has_post_thumbnail()) : ?>
                  <figure class="post-image">
                    <?php the_post_thumbnail(); ?>
                  </figure>
                  <?php else: ?>
                  <figure class="post-image no-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/img-no-image.png" alt="no image">
                  </figure>
                  <?php endif; ?>
                  <div class="modelhouse-logo">
                    <?php echo $logo_image_path; ?>
                  </div>
                  <h2 class="modelhouse-name"><?php esc_html_e($modelhouse ?? ''); ?></h2>
                  <span class="status-checked"></span>
                </label>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>

            <?php // モデルハウスの投稿タイプ'ueda'の記事リスト
            $args = array(
              'post_type' => 'ueda',
              'posts_per_page' => -1,
            );
            if ( isset( $args ) ) { $new_Query = new WP_Query($args); }
            ?>
            <?php if($new_Query->have_posts()): ?>
            <ul class="list-modelhouse --park-in-ueda">
              <?php while ($new_Query->have_posts()) : $new_Query->the_post(); ?>
              <?php
              $logo_data = SCF::get('scf_modelhouse_logo');
              $logo_image_path = wp_get_attachment_image($logo_data,'medium');
              $logo_image_path = !empty($logo_image_path) ? $logo_image_path : '<img width="216" height="60" src="' . get_stylesheet_directory_uri() . '/assets/images/common/logo-sample.png">';
              // $modelhouse_name = SCF::get('scf_modelhouse_name'); //モデルハウスの商品名ではなくモデルハウス名（記事タイトル）を使用に変更
              $modelhouse_name = get_the_title();
              $slug = get_post(get_the_ID())->post_name . '_' . get_the_ID();
              $modelhouse = !empty($modelhouse_name) ? $modelhouse_name : get_the_title();
              $keyName = $modelhouse . '-ID-' . get_the_ID();
              ?>
              <li class="list-item form-item" data-model="<?php echo get_the_ID(); ?>">
                <input type="checkbox" name="model[<?php echo get_the_ID(); ?>][name]" id="mh-<?php echo $slug; ?>" value="<?php esc_attr_e($keyName ?? ''); ?>"<?php Utils::checked($keyName, $objApp->arrData['models'] ?? []); ?>>
                <label class="post-group form-item-label" for="mh-<?php echo $slug; ?>">
                  <?php if (has_post_thumbnail()) : ?>
                  <figure class="post-image">
                    <?php the_post_thumbnail(); ?>
                  </figure>
                  <?php else: ?>
                  <figure class="post-image no-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/img-no-image.png" alt="no image">
                  </figure>
                  <?php endif; ?>
                  <div class="modelhouse-logo">
                    <?php echo $logo_image_path; ?>
                  </div>
                  <h2 class="modelhouse-name"><?php esc_html_e($modelhouse ?? ''); ?></h2>
                  <span class="status-checked"></span>
                </label>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>

            <?php // モデルハウスの投稿タイプ'saku'の記事リスト
            // 除外する記事がある場合
            // $exclude_ids = array( 7071 );
            $args = array(
              'post_type' => 'saku',
              'posts_per_page' => -1,
              // 'post__not_in' => $exclude_ids,
            );
            if ( isset( $args ) ) { $new_Query = new WP_Query($args); }
            ?>
            <?php if($new_Query->have_posts()): ?>
            <ul class="list-modelhouse --park-in-saku">
              <?php while ($new_Query->have_posts()) : $new_Query->the_post(); ?>
              <?php
              $logo_data = SCF::get('scf_modelhouse_logo');
              $logo_image_path = wp_get_attachment_image($logo_data,'medium');
              $logo_image_path = !empty($logo_image_path) ? $logo_image_path : '<img width="216" height="60" src="' . get_stylesheet_directory_uri() . '/assets/images/common/logo-sample.png">';
              // $modelhouse_name = SCF::get('scf_modelhouse_name'); //モデルハウスの商品名ではなくモデルハウス名（記事タイトル）を使用に変更
              $modelhouse_name = get_the_title();
              $slug = get_post(get_the_ID())->post_name . get_the_ID();
              $modelhouse = !empty($modelhouse_name) ? $modelhouse_name : get_the_title();
              $keyName = $modelhouse . '-ID-' . get_the_ID();
              ?>
              <li class="list-item form-item" data-model="<?php echo get_the_ID(); ?>">
                <input type="checkbox" name="model[<?php echo get_the_ID(); ?>][name]" id="mh-<?php echo $slug; ?>" value="<?php esc_attr_e($keyName ?? ''); ?>"<?php Utils::checked($keyName, $objApp->arrData['models'] ?? []); ?>>
                <label class="post-group form-item-label" for="mh-<?php echo $slug; ?>">
                  <?php if (has_post_thumbnail()) : ?>
                  <figure class="post-image">
                    <?php the_post_thumbnail(); ?>
                  </figure>
                  <?php else: ?>
                  <figure class="post-image no-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/img-no-image.png" alt="no image">
                  </figure>
                  <?php endif; ?>
                  <div class="modelhouse-logo">
                    <?php echo $logo_image_path; ?>
                  </div>
                  <h2 class="modelhouse-name"><?php esc_html_e($modelhouse ?? ''); ?></h2>
                  <span class="status-checked"></span>
                </label>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>

          </fieldset>
        </section>

      </div>
    </section><?php //2.モデルハウス選択 ?>


    <?php //3.見学日と見学開始時間選択

        $startDate = '';
        $endDate = '';

        if (RESERVATION_START_DATE) {
            $date = new DateTime();
            $date->modify('+' . RESERVATION_START_DATE . ' day');
            $startDate = $date->format('Y-m-d');
        }

        if (RESERVATION_END_DATE) {
            $date = new DateTime();
            $date->modify('+' . RESERVATION_END_DATE . ' day');
            $endDate = $date->format('Y-m-d');
        }

    ?>

    <section class="sec sec-form-contents sec-form-contents--3">
      <div class="inner">
        <h2 class="form-title" data-num="3">モデルハウス毎に、ご見学希望の見学日と見学開始時間を選んでください。</h2>

        <section class="select-date">
          <ul class="list-modelhouse js-modelhouseList">

          <?php if (isset($objApp->arrData['model'])) : $no = 1 ;foreach ((array)$objApp->arrData['model'] as $id => $model) :
            if (MODEL_HOUSE_MAX < $no) {
                break;
            }
          ?>
            <li class="list-item" data-item="<?php esc_attr_e($model['name'] ?? ''); ?>" data-id="<?php esc_attr_e($id ?? ''); ?>">
                <h3 class="list-item__title">希望日時を選択<em>［<?php esc_html_e($no ?? ''); ?>棟目］</em></h3>
                <div class="post-group">
                    <figure class="post-image js-postImage">
                        <img src="" alt="">
                    </figure>
                    <div class="modelhouse-logo js-logoImage">
                        <img width="216" height="60" src="" class="attachment-large size-large" alt="">
                    </div>
                    <h2 class="modelhouse-name js-ModelName"><?php esc_html_e(Utils::trimData($model['name'] ?? '')); ?></h2>
                </div>
                <div class="form-item-wrap-date">
                    <div class="form-item">
                    <label class="form-item-label">▼ご希望の見学日</label>
                    <input type="text" name="model[<?php esc_html_e($id); ?>][date]" value="<?php esc_attr_e($model['date'] ?? ''); ?>" class="js-datepicker js-ModelDate" placeholder="カレンダーを表示">
                    <?php Utils::printErr($objApp->arrErr['model'][$id]['date'] ?? ''); ?>
                    </div>
                </div>
                <div class="form-item-wrap-select">
                    <label class="form-item-label">▼ご希望の見学開始時間</label>
                    <div class="form-item-select">
                    <select name="model[<?php esc_html_e($id); ?>][time]" class="js-ModelTime">
                        <option disabled="" selected="" value="">選択してください</option>
                        <?php foreach (ITEM_TIMES as $item) :  ?>
                        <option value="<?php esc_attr_e($item ?? ''); ?>"<?php Utils::selected($item, $model['time'] ?? ''); ?>><?php esc_html_e($item ?? ''); ?></option>
                        <?php endforeach;  ?>
                    </select>
                    </div>
                    <?php Utils::printErr($objApp->arrErr['model'][$id]['time'] ?? ''); ?>
                </div>
            </li>
          <?php $no++; endforeach; endif; ?>
          </ul>

          <div class="js-notesMess message-select-data is-selected"></div>

          <?php //Utils::printErr($objApp->arrErr['models'] ?? ''); ?>

          <template id="inputTemplate">
            <h3 class="list-item__title">希望日時を選択<em>［1棟目］</em></h3>
              <div class="post-group">
                <figure class="post-image js-postImage">
                  <img src="" alt="">
                </figure>
                <div class="modelhouse-logo js-logoImage">
                  <img width="216" height="60" src="" class="attachment-large size-large" alt="">
                </div>
                <h2 class="modelhouse-name js-ModelName"></h2>
              </div>
              <div class="form-item-wrap-date">
                <div class="form-item">
                  <label class="form-item-label">▼ご希望の見学日</label>
                  <input type="text" name="" class="js-datepicker js-ModelDate" placeholder="カレンダーを表示">
                </div>
              </div>
              <div class="form-item-wrap-select">
                <label class="form-item-label">▼ご希望の見学開始時間</label>
                <div class="form-item-select">
                  <select name="" class="js-ModelTime">
                    <option disabled="" selected="" value="">選択してください</option>
                    <?php foreach (ITEM_TIMES as $id => $item) :  ?>
                    <option value="<?php esc_attr_e($item ?? ''); ?>"><?php esc_html_e($item ?? ''); ?></option>
                    <?php endforeach;  ?>
                  </select>
                </div>
              </div>
          </template>

        </section>

      </div>
    </section><?php //3.見学日と見学開始時間選択 ?>


    <?php //4.お申込者様情報 ?>
    <section class="sec sec-form-contents sec-form-contents--4">
      <div class="inner">
        <h2 class="form-title" data-num="4">お申込者様情報</h2>

        <section class="form-items-container">

          <?php //お名前 ?>
          <div class="form-item-block">
            <label class="form-item-block-label required" for="app-name-sei">お名前</label>
            <div class="form-item">
              <input type="text" name="app-name-sei" id="app-name-sei" value="<?php esc_attr_e($objApp->arrData['app-name-sei'] ?? ''); ?>" maxlength="50" class="size-S" placeholder="姓" required>
              <input type="text" name="app-name-mei" id="app-name-mei" value="<?php esc_attr_e($objApp->arrData['app-name-mei'] ?? ''); ?>" maxlength="50" class="size-S" placeholder="名" required>
              <?php Utils::printErr($objApp->arrErr['app-name-sei'] ?? ''); ?>
              <?php Utils::printErr($objApp->arrErr['app-name-mei'] ?? ''); ?>
            </div>
          </div>

          <?php //お名前（カナ） ?>
          <div class="form-item-block">
            <label class="form-item-block-label required" for="app-kana-sei">お名前（カナ）</label>
            <div class="form-item">
              <input type="text" name="app-kana-sei" id="app-kana-sei" value="<?php esc_attr_e($objApp->arrData['app-kana-sei'] ?? ''); ?>" maxlength="50" class="size-S" placeholder="セイ" required>
              <input type="text" name="app-kana-mei" id="app-kana-mei" value="<?php esc_attr_e($objApp->arrData['app-kana-mei'] ?? ''); ?>" maxlength="50" class="size-S" placeholder="メイ" required>
              <?php Utils::printErr($objApp->arrErr['app-kana-sei'] ?? ''); ?>
              <?php Utils::printErr($objApp->arrErr['app-kana-mei'] ?? ''); ?>
              <p class="form-item-explanation">※全角カタカナでご入力ください。</p>
            </div>
          </div>

          <?php //電話番号 ?>
          <div class="form-item-block">
            <label class="form-item-block-label required" for="app-tel">電話番号</label>
            <div class="form-item">
              <input type="text" name="app-tel" id="app-tel" value="<?php esc_attr_e($objApp->arrData['app-tel'] ?? ''); ?>" maxlength="15" class="size-S" placeholder="08012345678" required>
              <?php Utils::printErr($objApp->arrErr['app-tel'] ?? ''); ?>
              <p class="form-item-explanation">※予約確定のご連絡をこちらの電話番号にお知らせします。必ず連絡のつく電話番号を入力してください。<br>※半角数字でご入力ください。<br>※ハイフン無しでご入力ください。</p>
            </div>
          </div>

          <?php //性別 ?>
          <div class="form-item-block">
            <label class="form-item-block-label required">性別</label>
            <div class="form-item-wrap-radio">
              <fieldset>
                <?php foreach (ITEM_SEX as $id => $item) : ?>
                <div class="form-item">
                  <input type="radio" name="app-sex" id="app-sex-<?php echo esc_attr_e($id); ?>" value="<?php esc_attr_e($item ?? ''); ?>"<?php Utils::checked($item, $objApp->arrData['app-sex'] ?? ''); ?>>
                  <label class="form-item-label size-M" for="app-sex-<?php echo esc_attr_e($id); ?>"><?php esc_html_e($item ?? ''); ?></label>
                </div>
                <?php endforeach;?>
                <?php Utils::printErr($objApp->arrErr['app-sex'] ?? ''); ?>
              </fieldset>
            </div>
          </div>

          <?php //年代 ?>
          <div class="form-item-block">
            <label class="form-item-block-label required">年代</label>
            <div class="form-item-wrap-select">
              <div class="form-item-select">
                <select name="app-age" id="app-age" required>
                  <option disabled="" selected="" value="">お選びください</option>
                  <?php foreach (ITEM_AGE as $id => $item) :  ?>
                  <option value="<?php esc_attr_e($item ?? ''); ?>"<?php Utils::selected($item, $objApp->arrData['app-age'] ?? ''); ?>><?php esc_html_e($item ?? ''); ?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <?php Utils::printErr($objApp->arrErr['app-age'] ?? ''); ?>
            </div>
          </div>

          <?php //職業 ?>
          <div class="form-item-block">
            <label class="form-item-block-label required" for="app-job">職業</label>
            <div class="form-item">
              <input type="text" name="app-job" id="app-job" value="<?php esc_attr_e($objApp->arrData['app-job'] ?? ''); ?>" maxlength="50" class="size-L" placeholder="会社員" required>
              <?php Utils::printErr($objApp->arrErr['app-job'] ?? ''); ?>
            </div>
          </div>

          <?php //お住まいの市町村 ?>
          <div class="form-item-block">
            <label class="form-item-block-label required" for="app-shi">お住まいの市町村</label>
            <div class="form-item">
              <input type="text" name="app-shi" id="app-shi" value="<?php esc_attr_e($objApp->arrData['app-shi'] ?? ''); ?>" maxlength="200" class="size-L" placeholder="長野市" required>
              <?php Utils::printErr($objApp->arrErr['app-shi'] ?? ''); ?>
            </div>
          </div>

          <?php //メールアドレス ?>
          <div class="form-item-block">
            <label class="form-item-block-label required" for="app-email">メールアドレス</label>
            <div class="form-item">
              <input type="email" name="app-email" id="app-email" value="<?php esc_attr_e($objApp->arrData['app-email'] ?? ''); ?>" maxlength="250" class="size-L" required>
              <?php Utils::printErr($objApp->arrErr['app-email'] ?? ''); ?>
            </div>
          </div>

          <?php //メールアドレス（確認用） ?>
          <div class="form-item-block">
            <label class="form-item-block-label required" for="app-email-kakunin">メールアドレス（確認用）</label>
            <div class="form-item">
              <input type="email" name="app-email-kakunin" id="app-email-kakunin" value="<?php esc_attr_e($objApp->arrData['app-email-kakunin'] ?? ''); ?>" maxlength="250" class="size-L" required>
              <?php Utils::printErr($objApp->arrErr['app-email-kakunin'] ?? ''); ?>
              <p class="form-item-explanation">※確認のため再入力してください。</p>
            </div>
          </div>

        </section>

        <section class="form-items-container">

          <?php //来場ご予定人数 ?>
          <div class="form-item-block --ninzu">
            <label class="form-item-block-label required" for="app-ninzu-adult">来場ご予定人数</label>
            <div class="form-item">
              <div class="sup-item">
                <span class="input-sup">大人</span>
                <input type="text" name="app-ninzu-adult" id="app-ninzu-adult" value="<?php esc_attr_e($objApp->arrData['app-ninzu-adult'] ?? ''); ?>" maxlength="2" class="size-XS" required>
                <span class="input-sup">名</span>
              </div>
              <div class="sup-item">
                <span class="input-sup">子ども</span>
                <input type="text" name="app-ninzu-child" id="app-ninzu-child" value="<?php esc_attr_e($objApp->arrData['app-ninzu-child'] ?? ''); ?>" maxlength="2" class="size-XS" required>
                <span class="input-sup">名</span>
              </div>
              <div class="--app-ninzu__adjustment">
              <?php Utils::printErr($objApp->arrErr['app-ninzu-adult'] ?? ''); ?>
              <?php Utils::printErr($objApp->arrErr['app-ninzu-child'] ?? ''); ?>
              </div>
              <p class="form-item-explanation">※大人は必須です。</p>
            </div>
          </div>

          <?php //ご家族構成 ?>
          <div class="form-item-block">
            <label class="form-item-block-label required" for="app-family">ご家族構成</label>
            <div class="form-item-wrap-select">
              <div class="form-item-select">
                <select name="app-family" id="app-family" required>
                  <option disabled="" selected="" value="">お選びください</option>
                  <?php foreach (ITEM_FAMILY as $id => $item) :  ?>
                  <option value="<?php esc_attr_e($item ?? ''); ?>"<?php Utils::selected($item, $objApp->arrData['app-family'] ?? ''); ?>><?php esc_html_e($item ?? ''); ?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <?php Utils::printErr($objApp->arrErr['app-family'] ?? ''); ?>
            </div>
          </div>

          <?php //ご検討されたい住宅の種類 ?>
          <div class="form-item-block">
            <label class="form-item-block-label required">ご検討されたい住宅の種類</label>
            <div class="form-item-wrap-radio">
              <fieldset>
                <?php foreach (ITEM_HOUSING_TYPE as $id => $item) : ?>
                <div class="form-item">
                  <input type="radio" name="app-kento" id="app-kento-<?php echo esc_attr_e($id); ?>" value="<?php esc_attr_e($item ?? ''); ?>"<?php Utils::checked($item, $objApp->arrData['app-kento'] ?? ''); ?>>
                  <label class="form-item-label size-M" for="app-kento-<?php echo esc_attr_e($id); ?>"><?php esc_html_e($item ?? ''); ?></label>
                </div>
                <?php endforeach; ?>
                <?php Utils::printErr($objApp->arrErr['app-kento'] ?? ''); ?>
              </fieldset>
            </div>
          </div>

          <?php //計画地域（市町村など） ?>
          <div class="form-item-block">
            <label class="form-item-block-label any" for="app-area">計画地域（市町村など）</label>
            <div class="form-item">
              <textarea name="app-area" id="app-area" maxlength="1000" class="size-L"><?php esc_attr_e($objApp->arrData['app-area'] ?? ''); ?></textarea>
              <?php Utils::printErr($objApp->arrErr['app-area'] ?? ''); ?>
              <p class="form-item-explanation">例）「長野市内に」「軽井沢で」などと記入してください。</p>
            </div>
          </div>

          <?php //建築用土地の有無 ?>
          <div class="form-item-block">
            <label class="form-item-block-label required" for="app-tochi">建築用土地の有無</label>
            <div class="form-item-wrap-select">
              <div class="form-item-select">
                <select name="app-tochi" id="app-tochi" required>
                  <option disabled="" selected="" value="">お選びください</option>
                  <?php foreach (ITEM_LAND as $id => $item) :  ?>
                  <option value="<?php esc_attr_e($item ?? ''); ?>"<?php Utils::selected($item, $objApp->arrData['app-tochi'] ?? ''); ?>><?php esc_html_e($item ?? ''); ?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <?php Utils::printErr($objApp->arrErr['app-tochi'] ?? ''); ?>
            </div>
          </div>

          <?php //ご相談されたい内容 ?>
          <div class="form-item-block">
            <label class="form-item-block-label required">ご相談されたい内容</label>
            <div class="form-item-wrap-radio">
              <fieldset>
                <?php foreach (ITEM_CONSULT as $id => $item) : ?>
                <div class="form-item">
                  <input type="radio" name="app-naiyo" id="app-naiyo-<?php echo esc_attr_e($id); ?>" value="<?php esc_attr_e($item ?? ''); ?>"<?php Utils::checked($item, $objApp->arrData['app-naiyo'] ?? ''); ?>>
                  <label class="form-item-label size-M" for="app-naiyo-<?php echo esc_attr_e($id); ?>"><?php esc_html_e($item ?? ''); ?></label>
                </div>
                <?php endforeach;?>
                <?php Utils::printErr($objApp->arrErr['app-naiyo'] ?? ''); ?>
              </fieldset>
            </div>
          </div>

          <?php //自由記入欄 ?>
          <div class="form-item-block">
            <label class="form-item-block-label any" for="app-biko">自由記入欄</label>
            <div class="form-item">
              <textarea name="app-biko" id="app-biko" maxlength="1000" class="size-L"><?php esc_attr_e($objApp->arrData['app-biko'] ?? ''); ?></textarea>
              <?php Utils::printErr($objApp->arrErr['app-biko'] ?? ''); ?>
              <p class="form-item-explanation">リフォームについて等、ご自由にお書きください。（1,000文字まで）</p>
            </div>
          </div>

        </section>

      </div>
    </section><?php //4.お申込者様情報 ?>


    <?php //個人情報の取扱いについて ?>
    <section class="sec sec-form-contents sec-agree">
      <div class="inner">
        <div class="agree-title">個人情報の取扱いについて</div>
        <div class="agree-lead">モデルハウス見学予約フォームをご利用いただくには個人情報保護方針に同意していただく必要があります。</div>
        <aside class="agree-inc-pp">
          <div class="pp">
          <?php get_template_part('template/part', 'privacy-policy'); ?>
          </div>
        </aside>

        <?php //上記の個人情報保護方針に同意する ?>
        <div class="form-item-wrap-checkbox agree-block">
          <div class="form-item">
            <input type="checkbox" name="app-agree" id="app-agree" value="1"<?php Utils::checked(1, $objApp->arrData['app-agree'] ?? ''); ?>>
            <label class="form-item-label" for="app-agree">上記の個人情報保護方針に同意する<span class="require">必須</span></label>
          </div>
          <?php Utils::printErr($objApp->arrErr['app-agree'] ?? ''); ?>
        </div>

      </div>
    </section>


    <?php //ボタン ?>
    <section class="sec sec-form-contents sec-button">
      <div class="inner">
        <div class="button-wrap">
          <button type="submit" class="button button-arrow">確認画面へ</button>
          <div id="g-recaptcha-wrapper"></div>
        </div>
      </div>
    </section>
    </form>

    <?php add_action('wp_footer', function() { ?>
<script>
window.addEventListener('DOMContentLoaded',function() {

    const objPark = document.querySelector('.js-park');
    const parkItem = objPark.querySelectorAll('input[type="radio"]');

    const objModelhouse = document.querySelector('.js-modelhouse');
    const modelhouseItem = objModelhouse.querySelectorAll('input[type="checkbox"]');

    const inputTemplate = document.getElementById('inputTemplate');

    const objModelhouseList = document.querySelector('.js-modelhouseList');

    fromInit();
    handlerModelhouseMess();

    function fromInit() {
        /** 展示場・モデルハウスの初期表示制御 */
        objModelhouse.querySelectorAll('ul').forEach(element => {
            element.style.display = 'none';
        });
        parkItem.forEach(radioButton => {
            if (radioButton.checked) {
                const parkArea = radioButton.getAttribute('data-park');
                document.querySelector('.' + parkArea).style.display = 'grid';
            }
        });
        /** 選択済みのモデルハウスの初期表示制御 */
        objModelhouseList.querySelectorAll('li').forEach(element => {
            const id = element.getAttribute('data-id');
            const model = document.querySelector('.js-modelhouse [data-model="' + id + '"]');
            if (model) {
                const postimage = model.querySelector('.post-image img').getAttribute('src');
                if (postimage) {
                    element.querySelector('.post-image img').setAttribute('src', postimage);
                    if (model.querySelector('.post-image').classList.contains('no-image')) {
                        element.querySelector('.post-image').classList.add('no-image');
                    }
                }
                const logoimage = model.querySelector('.modelhouse-logo img').getAttribute('src');
                if (logoimage) {
                    element.querySelector('.modelhouse-logo img').setAttribute('src', logoimage);
                }
            }
        });

        const errors = document.querySelectorAll('.u-error, .u-error__box');

        if (errors.length > 0) {
            const firstError = errors[0];
            // 最初のエラー要素の位置を取得
            const rect = firstError.getBoundingClientRect();
            // スクロール位置を計算（-50px）
            const scrollTopPosition = window.pageYOffset + rect.top - 150;
            // スクロールする
            window.scrollTo({
                top: scrollTopPosition,
                behavior: 'smooth'
            });
        }
    }

    function handlerModelhouseMess() {
        const notesMess = document.querySelector('.js-notesMess');
        const liElements = objModelhouseList.querySelectorAll('li');
        if (liElements.length > 0) {
            notesMess.classList.add('is-selected');
        } else {
            notesMess.classList.remove('is-selected');
        }
    }

    /** 展示場切り替え制御 */
    for (let i = 0; i < parkItem.length; i++) {
        parkItem[i].addEventListener('change', function(e) {
            /** モデルハウスのチェック解除・非表示 */
            modelhouseItem.forEach(checkbox => {
                checkbox.checked = false;
            });
            objModelhouse.querySelectorAll('ul').forEach(element => {
                element.style.display = 'none';
            });

            /** ご希望のモデルハウス解除 */
            objModelhouseList.querySelectorAll('li').forEach(element => {
                element.remove();
            });

            /** 選択した展示場のモデルハウスの表示 */
            const parkArea = this.getAttribute('data-park');
            document.querySelector('.' + parkArea).style.display = 'grid';

            handlerModelhouseMess();
        });
    }

    /** モデルハウス選択・解除時の制御 */
    for (let i = 0; i < modelhouseItem.length; i++) {
        modelhouseItem[i].addEventListener('change', function(e) {

            var modelhouse = e.target.value;

            const liElements = objModelhouseList.querySelectorAll('li');

            if (e.target.checked) {

                if (liElements.length >= <?php echo MODEL_HOUSE_MAX; ?>) {
                    alert("<?php echo MODEL_HOUSE_MAX; ?>棟までしか選択できません。");
                    e.target.checked = false;
                    return false;
                }

                const inputName = this.getAttribute('name').replace(/\[name\]$/, '');
                const postimage = this.nextElementSibling.querySelector('.post-image img').getAttribute('src');
                const logoimage = this.nextElementSibling.querySelector('.modelhouse-logo img').getAttribute('src');

                const nameEl = inputTemplate.content.querySelector('.js-ModelName');
                      nameEl.textContent = this.value.replace(/-ID-.*/, '');

                const dateInputEl = inputTemplate.content.querySelector('.js-ModelDate');
                      dateInputEl.setAttribute('name', inputName + '[date]');

                const timeInputEl = inputTemplate.content.querySelector('.js-ModelTime');
                      timeInputEl.setAttribute('name', inputName + '[time]');

                const postImageEl = inputTemplate.content.querySelector('.js-postImage');
                if (this.nextElementSibling.querySelector('.post-image').classList.contains('no-image')) {
                    postImageEl.classList.add('no-image');
                }
                postImageEl.querySelector('img').setAttribute('src', postimage);

                const logoImageEl = inputTemplate.content.querySelector('.js-logoImage');
                logoImageEl.querySelector('img').setAttribute('src', logoimage);


                var liElement = document.createElement('li');
                liElement.classList.add('list-item');
                liElement.setAttribute('data-item', modelhouse);

                const id = this.closest('li').getAttribute('data-model');
                liElement.setAttribute('data-id', id);

                liElement.appendChild(inputTemplate.content.cloneNode(true));
                objModelhouseList.appendChild(liElement);

                const tag = objModelhouseList.nextElementSibling;
                if (tag) {
                    if (tag.tagName === 'SPAN') {
                        tag.remove();
                    }
                }

            } else {
                const liToRemove = objModelhouseList.querySelector('li[data-item="' + modelhouse + '"]');
                if (liToRemove) {
                    objModelhouseList.removeChild(liToRemove);
                }
            }

            const headItem = objModelhouseList.querySelectorAll('li .list-item__title em');
            $no = 1;
            for (let i = 0; i < headItem.length; i++) {
                headItem[i].textContent = '［' + $no + '棟目］';
                $no++;
            }

            handlerModelhouseMess();
        });
    }
});
</script>
<?php if (GOOGLE_SITE_KEY) : ?>
<script src="https://www.google.com/recaptcha/api.js?render=explicit&onload=onRecaptchaLoad"></script>
<script>
    function onRecaptchaLoad() {
        var clientId = grecaptcha.render('g-recaptcha-wrapper', {
            'sitekey': '<?php echo GOOGLE_SITE_KEY; ?>',
            'badge': 'bottomleft',
            'size': 'invisible'
        });
        grecaptcha.ready(function() {
            grecaptcha.execute(clientId, {
                action: 'submit'
            });
        });
    }
</script>
<?php endif; ?>
<?php }, 20); ?>
<?php get_footer(); ?>