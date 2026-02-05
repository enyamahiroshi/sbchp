<?php
/**
 * From Action
 *
 */
$objApp = new Reserve();
$objApp->confirm();
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

  <article class="form-contents --confirm">

    <?php //step ?>
    <section class="sec sec-form-step">
      <div class="inner">
        <div class="form-step">
          <div class="step-item complete"><div class="dot"></div><div class="text">入力</div></div>
          <div class="step-separate"></div>
          <div class="step-item current"><div class="dot"></div><div class="text">確認</div></div>
          <div class="step-separate"></div>
          <div class="step-item"><div class="dot"></div><div class="text">完了</div></div>
        </div>
      </div>

      <?php if (!empty($objApp->exceptionErr)): ?>
      <div class="inner">
        <div class="form-info-attentions">
            <p class="u-error__box"><?php echo $objApp->exceptionErr; ?></p>
        </div>
      </div>
      <?php endif; ?>

    </section>

    <form method="post" action="?">
    <input type="hidden" name="mode" value="complete">
    <input type="hidden" name="<?php echo TRANSACTION_NAME; ?>" value="<?php echo Sessions::getToken(); ?>">

    <section class="sec sec-s sec-form-contents sec-form-contents--confirm">
      <div class="inner">
        <p>入力内容をご確認いただき、間違いがなければ「この内容で申し込む」ボタンをクリックして申し込みを完了してください。</p>

        <?php //確認内容の表示 ?>
        <section class="confirm-items">
          <div class="confirm-item">
            <div class="confirm-item-label">見学希望の会場</div>
            <div class="confirm-item-data">
              <?php esc_html_e($objApp->arrData['park'] ?? ''); ?>
            </div>
          </div>
          <?php $no = 1; foreach ($objApp->arrData['model'] as $model): ?>
          <div class="confirm-item">
            <div class="confirm-item-label">見学希望のモデルハウス - <?php esc_html_e($no); ?>棟目</div>
            <div class="confirm-item-data">
            <?php esc_html_e(Utils::trimData($model['name'] ?? '')); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">見学希望日 - <?php esc_html_e($no); ?>棟目</div>
            <div class="confirm-item-data">
            <?php esc_html_e(date('Y年n月j日', strtotime($model['date'])) ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">見学希望時間 - <?php esc_html_e($no); ?>棟目</div>
            <div class="confirm-item-data">
            <?php esc_html_e($model['time'] ?? ''); ?>
            </div>
          </div>
          <?php $no++; endforeach; ?>
          <div class="confirm-item">
            <div class="confirm-item-label">お名前</div>
            <div class="confirm-item-data">
            <?php esc_html_e($objApp->arrData['app-name-sei'] ?? ''); ?><?php esc_html_e($objApp->arrData['app-name-mei'] ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">お名前（カナ）</div>
            <div class="confirm-item-data">
            <?php esc_html_e($objApp->arrData['app-kana-sei'] ?? ''); ?><?php esc_html_e($objApp->arrData['app-kana-mei'] ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">電話番号</div>
            <div class="confirm-item-data">
            <?php esc_html_e($objApp->arrData['app-tel'] ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">性別</div>
            <div class="confirm-item-data">
            <?php esc_html_e($objApp->arrData['app-sex'] ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">年代</div>
            <div class="confirm-item-data">
            <?php esc_html_e($objApp->arrData['app-age'] ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">職業</div>
            <div class="confirm-item-data">
            <?php esc_html_e($objApp->arrData['app-job'] ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">お住まいの市町村</div>
            <div class="confirm-item-data">
            <?php esc_html_e($objApp->arrData['app-shi'] ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">メールアドレス</div>
            <div class="confirm-item-data">
            <?php esc_html_e($objApp->arrData['app-email'] ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">来場ご予定人数</div>
            <div class="confirm-item-data">
              大人　　<?php esc_html_e($objApp->arrData['app-ninzu-adult'] ?? ''); ?>名
              <?php if (isset($objApp->arrData['app-ninzu-child']) && !empty($objApp->arrData['app-ninzu-child'])): ?>
              <br>子ども　<?php esc_html_e($objApp->arrData['app-ninzu-child'] ?? ''); ?>名
              <?php endif; ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">ご家族構成</div>
            <div class="confirm-item-data">
            <?php esc_html_e($objApp->arrData['app-family'] ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">ご検討されたい住宅の種類</div>
            <div class="confirm-item-data">
            <?php esc_html_e($objApp->arrData['app-kento'] ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">計画地域（市町村など）</div>
            <div class="confirm-item-data">
            <?php echo nl2br(esc_html($objApp->arrData['app-area'] ?? '')); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">建築用土地の有無</div>
            <div class="confirm-item-data">
            <?php esc_html_e($objApp->arrData['app-tochi'] ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">ご相談されたい内容</div>
            <div class="confirm-item-data">
            <?php esc_html_e($objApp->arrData['app-naiyo'] ?? ''); ?>
            </div>
          </div>
          <div class="confirm-item">
            <div class="confirm-item-label">自由記入欄</div>
            <div class="confirm-item-data">
            <?php echo nl2br(esc_html($objApp->arrData['app-biko'] ?? '')); ?>
            </div>
          </div>
        </section><?php //確認内容の表示 ?>

      </div>
    </section>

    <?php //ボタン ?>
    <section class="sec sec-form-contents sec-button">
      <div class="inner">
        <div class="button-wrap">
          <button type="button" class="button button-arrow --reverse" onclick="location.href='<?php echo home_url(RESERVE_INPUT_SLUG); ?>'">修正する</button>
          <button type="submit" class="button button-arrow">この内容で申し込む</button>
        </div>
      </div>
    </section>

    </form>

<?php get_footer(); ?>