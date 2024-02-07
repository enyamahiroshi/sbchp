<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title><?php bloginfo('name'); wp_title('|', true, 'left'); ?></title>
<?php wp_head(); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body id="top" <?php body_class(); ?>>

  <?php //header ?>
  <header class="header">
    <div class="header__logo-wrap">
      <a href="<?php echo esc_url( home_url() ); ?>/" class="header__logo">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo-main.svg" alt="SBCハウジングパーク" width=262" height="26">
      </a>
      <div class="site-copy">長野県の住宅総合展示場_長野市・上田市・佐久市に3会場</div>
    </div>
    <section class="global-menu">
      <?php //カスタムメニューの呼び出し
        $menu = array (
          'menu'=>'header_menu',
          'menu_class'=>'menu',
          'container'=>'nav',
          'container_class' =>'header-nav',
          'items_wrap'=>'<ul class="%2$s">%3$s</ul>',
        );
        wp_nav_menu( $menu );
      ?>
      <aside class="sns-links">
        <a href="http://" target="_blank" rel="noopener noreferrer" class="sns-links__item sns-links__item--facebook"></a>
        <a href="http://" target="_blank" rel="noopener noreferrer" class="sns-links__item sns-links__item--instagram"> </a>
      </aside>
    </section>
    <a href="<?php echo esc_url( home_url() ); ?>/" class="button-reserve">
      <em>見学予約</em>
    </a>
    <button class="menu-bar js-tgl-menu" type="button"><span class="menu-bar-line"></span></button>
  </header>

  <a href="<?php echo esc_url( home_url() ); ?>/" class="button-reserve button-reserve--fixed">
    <span>今すぐ</span><em>見学予約</em><span>をする</span>
  </a>

  <?php //パンくず
  echo '<div class="bread-nav">';
  if( function_exists( 'aioseo_breadcrumbs' ) ){ aioseo_breadcrumbs(); }
  echo '</div>';
  ?>
  <main class="main">