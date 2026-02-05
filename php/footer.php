  </main>

  <footer class="footer">
    <div class="inner">
      <div class="footer__menu">
        <div class="footer__menu__nav">
          <?php //カスタムメニューの呼び出し
            $menu = array (
              'menu'=>'footer_menu1',
              'menu_class'=>'menu',
              'container'=>'nav',
              'container_class' =>'footer-nav',
              'items_wrap'=>'<ul class="%2$s">%3$s</ul>',
            );
            wp_nav_menu( $menu );
          ?>
          <?php //カスタムメニューの呼び出し
            $menu = array (
              'menu'=>'footer_menu2',
              'menu_class'=>'menu',
              'container'=>'nav',
              'container_class' =>'footer-nav',
              'items_wrap'=>'<ul class="%2$s">%3$s</ul>',
            );
            wp_nav_menu( $menu );
          ?>
        </div>
        <aside class="sns-links-wrap">
          <ul class="sns-links">
            <li class="sns-links__item sns-links__item--instagram">
              <a href="https://www.instagram.com/sbc.hp/" target="_blank" rel="noopener noreferrer">SBCハウジング</a>
            </li>
          </ul>
        </aside>
      </div>

      <div class="corporate-info">
        <div class="corporate-info__data">
          <div class="corporate-name">株式会社SBCハウジング</div>
          <div class="corporate-address">長野市問御所町1200 TOiGO SBC4階</div>
          <div class="corporate-tel"><a href="tel:026-238-6501">TEL.026-238-6501</a></div>
          <div class="corporate-fax">FAX.026-238-6502</div>
        </div>
        <div class="corporate-info__other">
          <div class="corporate-pp"><a href="<?php echo esc_url(home_url()); ?>/privacy-policy/">プライバシーポリシー</a></div>
          <div class="corporate-copyright">©SBC Housing Park All rights reserved.</div>
        </div>
      </div>
    </div>
  </footer>

  <aside>
    <a href="#top" class="button-page-top"></a>
  </aside>
<?php wp_footer(); ?>
</body>
</html>