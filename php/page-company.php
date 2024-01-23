<?php get_header(); ?>
    <header class="page-header">
      <h1 class="page-header__title"><?php the_title(); ?></h1>
    </header>
    <?php //パンくずリスト(yoast seo)
    if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<aside class="bread-navi">','</aside>' ); }
    ?>

    <section class="sec">
      <div class="inner">
        <h2 class="title02">会社概要</h2>

        <table class="tbl01 tbl01--company">
          <tr>
            <th class="tbl-th">商号</th>
            <td class="tbl-td">株式会社モモセボデー</td>
          </tr>
          <tr>
            <th class="tbl-th">創業</th>
            <td class="tbl-td">1948年（昭和23年）</td>
          </tr>
          <tr>
            <th class="tbl-th">資本金</th>
            <td class="tbl-td">15,000,000円</td>
          </tr>
          <tr>
            <th class="tbl-th" id="accessmap">住所</th>
            <td class="tbl-td">
            〒399-0004<br>長野県松本市市場2番8号<br>TEL（0263）25-8899<br>FAX（0263）25-8099
            <div class="g-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6438.312411122321!2d137.95967040627045!3d36.21139802961969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601d0f070bd79b77%3A0x904adeaf5e89993d!2z44Oi44Oi44K744Oc44OH44O8!5e0!3m2!1sja!2sjp!4v1665728097672!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            </td>
          </tr>
          <tr>
            <th class="tbl-th">社内役員</th>
            <td class="tbl-td">代表取締役社長　上條 一詞<br>取締役　丸山 量大<br>工場長　大山 順也</td>
          </tr>
          <tr>
            <th class="tbl-th">従業員</th>
            <td class="tbl-td">29名（令和4年4月現在）</td>
          </tr>
          <tr>
            <th class="tbl-th">取引先</th>
            <td class="tbl-td">長野日野自動車(株)、UDトラックス(株)、いすゞ自動車中部(株)、三菱ふそうトラック・バス(株)、松本日産自動車(株)、長野ダイハツ販売(株)、 (株)スズキ自販長野、ブリヂストンタイヤ長野販売(株)、中日本高速道路株式会社（NEXCO中日本）、古河ユニック(株)、社団法人日本自動車連盟（JAF）</td>
          </tr>
          <tr>
            <th class="tbl-th">取引銀行</th>
            <td class="tbl-td">八十二銀行、長野銀行、松本信用金庫、長野県信用組合ほか</td>
          </tr>
        </table>

        <div class="button-wrap">
          <a href="<?php echo esc_url( home_url() ); ?>/history" class="button button--02">モモセボデーの歴史はこちら</a>
        </div>
      </div>
    </section>

<?php get_footer(); ?>