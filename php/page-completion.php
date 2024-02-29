<?php
/**
 * From Action
 *
 */
$objApp = new Reserve();
$objApp->thanks();
?>
<?php get_header(); ?>
  <header class="page-header page-header--reserve">
    <div class="inner">
      <h1 class="page-header__title page-header__title--reserve">モデルハウス見学予約フォーム［無料］</h1>
    </div>
  </header>

  <article class="form-contents --complete">

    <?php //step ?>
    <section class="sec sec-form-step">
      <div class="inner">
        <div class="form-step">
          <div class="step-item complete"><div class="dot"></div><div class="text">入力</div></div>
          <div class="step-separate"></div>
          <div class="step-item complete"><div class="dot"></div><div class="text">確認</div></div>
          <div class="step-separate"></div>
          <div class="step-item current"><div class="dot"></div><div class="text">完了</div></div>
        </div>
      </div>
    </section>

    <section class="sec sec-form-contents sec-form-contents--complete">
      <div class="inner">
        <h2 class="complete-title">お申し込みありがとうございます。</h2>
        <p>入力いただいたメールアドレス宛に自動返信メールが届きます。万が一メールが届かない場合はSBCハウジングまでお電話ください。TEL.026-238-6501（平日：10:00～18:00）</p>
        <div class="form-info-attentions">
          <h2>注意事項</h2>
          <ul>
            <li>お申込みフォームは、お申込みをSBCハウジングが代行して一旦受け付けるもので、<em>ご予約の完了ではありません。</em></li>
            <li>ご希望日時を各モデルハウスと調整のうえ、SBCハウジングより<em>改めて見学予約結果を連絡させていただきます。</em></li>
            <li>お申込み後の自動返信メールや、予約結果連絡メールが「@sbchp.jp」から送信されますので受信設定をお願い致します。なお、メールが届かない場合はSBCハウジングまでお電話ください。TEL.026-238-6501（平日：10:00～18:00）</li>
            <li>モデルハウスが定休日や長期休暇等により、予約結果連絡メールの日数がかかる場合があります。また、ご予約いただいたメーカーよりお電話がある場合がございます。</li>
            <li>お客様の個人情報は、お客様が見学を希望する住宅メーカーに対してのみお伝えし、各住宅メーカーが責任を持って管理いたします。</li>
            <li>お客様の個人情報は、ご見学についての必要事項のご連絡に利用させて頂き、法令等で開示を求められた場合を除き、本人の許可なしに第三者に提供する事はありません。</li>
            <li>ご予約が確定した後に<em>キャンセルをされる場合は各モデルハウスへ直接ご連絡をお願いいたします。</em></li>
          </ul>
        </div>
      </div>
    </section>

    <?php //ボタン ?>
    <section class="sec sec-form-contents sec-button">
      <div class="inner">
        <div class="button-wrap">
          <a href="<?php echo esc_url( home_url() ); ?>" class="button button-arrow">HOMEへ戻る</a>
        </div>
      </div>
    </section>

<?php get_footer(); ?>