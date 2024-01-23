<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title><?php bloginfo('name'); wp_title('|', true, 'left'); ?></title>
  <?php wp_head(); ?>
</head>
<body id="top" <?php body_class(); ?>>

  <?php //header ?>
  <header class="header">
    <a href="<?php echo esc_url( home_url() ); ?>/" class="header__logo">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo.svg" alt="モモセボデーロゴマーク">
    </a>
    <section class="global-menu">
      <?php //カスタムメニューの呼び出し
        wp_nav_menu( array ( 'menu'=>'header_menu', 'container'=>'nav' , 'container_class' =>'header-navi' , 'menu_class'=>'menu',  'items_wrap'=>'<ul class="%2$s">%3$s</ul>' ) );
      ?>
      <aside class="inquiry-links sp">
        <div class="inquiry-links__title">各種お問い合わせ</div>
        <div class="button-wrap">
          <a href="<?php echo esc_url( home_url() ); ?>/inquiry/" class="button button--inpuiry">新車購入のご相談</a>
          <a href="<?php echo esc_url( home_url() ); ?>/inquiry/" class="button button--inpuiry">修理・点検・車検のご相談</a>
          <a href="<?php echo esc_url( home_url() ); ?>/inquiry" class="button button--inpuiry-other">その他のお問い合わせ</a>
        </div>
      </aside>
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
    </section>
    <button class="menu-bar js-tgl-menu" type="button"><span class="menu-bar-line"></span><span class="menu-bar-image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/icon-menu-text.svg" alt="MENU"></span></button>
  </header>

  <main class="main">