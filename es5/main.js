(function ($) {

  /* --------------------------------------------------
    スクロールで処理
  -------------------------------------------------- */
  const $aadClass = 'is-fixed';

  // header
  const $hideClass = 'is-hide';
  const $AppearGM = $('body, .header');
  const $AppearGMTiming = $('.sec:first-of-type').offset().top;
  $(window).on('load scroll', function () {
    if ($(this).scrollTop() > $AppearGMTiming && $AppearGM.hasClass($aadClass) == false) {
      $AppearGM.removeClass($hideClass);
      $AppearGM.addClass($aadClass);
    } else if ($(this).scrollTop() > 0 && $(this).scrollTop() < $AppearGMTiming && $AppearGM.hasClass($hideClass) == false) {
      $AppearGM.addClass($hideClass);
      $AppearGM.removeClass($aadClass);
    } else if ($(this).scrollTop() == 0) {
      $AppearGM.removeClass($hideClass).removeClass($aadClass);
    }
  });

  // pageTop
  const $pageTop = $('.button-page-top');
  const $pageTopT = '400';
  $(window).on('load scroll', function () {
    if ($(this).scrollTop() > $pageTopT) {
      $pageTop.addClass($aadClass).on('tap click', function () {
        $(this).removeClass($aadClass);
      });
    } else if ($(this).scrollTop() < $pageTopT) {
      $pageTop.removeClass($aadClass);
    }
  });


  /* --------------------------------------------------
    メニュー開閉
  -------------------------------------------------- */
  const body = $('body');
  const menuWrap = $('.global-menu');
  const header = $('.header');
  const BtnOpen = $('.js-tgl-menu');
  const className = 'is-open';
  const NaviLink = $('.header-nav .menu a[href]');
  const mediaqueryPoint = '1399px';
  $(window).on('resize', function () {
    if (window.matchMedia( "(min-width: " + mediaqueryPoint + ")" ).matches) {
      if (body.hasClass(className)) {
        body.removeClass(className);
        header.removeClass(className);
        menuWrap.removeClass(className);
        BtnOpen.removeClass(className);
      }
    }
  });
  BtnOpen.on('tap click', function () {
    if (window.matchMedia( "(max-width: " + mediaqueryPoint + ")" ).matches) {
      if (body.hasClass(className)) {
        body.removeClass(className);
        header.removeClass(className);
        menuWrap.removeClass(className);
        BtnOpen.removeClass(className);
      } else {
        body.addClass(className);
        header.addClass(className);
        menuWrap.addClass(className);
        BtnOpen.addClass(className);
      }
    }
  });
  NaviLink.on('tap click', function () {
    if (window.matchMedia( "(max-width: " + mediaqueryPoint + ")" ).matches) {
      if (body.hasClass(className)) {
        body.removeClass(className);
        header.removeClass(className);
        menuWrap.removeClass(className);
        BtnOpen.removeClass(className);
      } else {
        body.addClass(className);
        header.addClass(className);
        menuWrap.addClass(className);
        BtnOpen.addClass(className);
      }
    }
  });


  /* --------------------------------------------------
    サブメニュー開閉
  -------------------------------------------------- */
  const tglSubmenuHeader = $('.header-nav .js-tgl-submenu');
  tglSubmenuHeader.on('mouseover', function () {
    $(this).find('.sub-menu').css({ 'opacity': '1', 'visibility': 'visible' });
  }).on('mouseout', function () {
    $(this).find('.sub-menu').css({ 'opacity': '0', 'visibility': 'hidden' });
  });

  const tglSubmenuFooter = $('.footer-nav .js-tgl-submenu');
  const footerSubmenu = $('.footer-nav .sub-menu');
  const classAction = 'is-action';
  tglSubmenuFooter.on('tap click mouseover', function () {
    footerSubmenu.removeClass(classAction);
    if ($(this).find('.sub-menu').hasClass(classAction)) {
      $(this).find('.sub-menu').removeClass(classAction);
    } else {
      $(this).find('.sub-menu').addClass(classAction);
    }
  }).on('mouseout', function () {
    footerSubmenu.removeClass(classAction);
  });


  /* --------------------------------------------------
    anchor link
  -------------------------------------------------- */
  const $anchor = 'a[href^="#"]';
  const $_header = $('.header');
  const headerHeight = $_header.height() + 40;
  const speed = 300;

  $($anchor).on('tap click', function() {
    const href= $(this).attr("href");
    const target = $(href == "#" || href == "" ? 'html' : href);
    const position = target.offset().top - headerHeight;
    $("html, body").stop().animate({scrollTop:position}, speed, 'swing');
    return false;
  });
  $(window).on('load', function() {
    if(document.URL.match("#")) {
      const str = location.href ;
      const cut_str = "#";
      const indexB = str.indexOf(cut_str);
      const hrefB = str.slice(indexB);
      const targetB = hrefB;
      const positionB = $(targetB).offset().top - headerHeight;
      $("html, body").stop().animate({scrollTop:positionB}, speed, 'swing');
      return false;
    }
  });

  /* --------------------------------------------------
    form: タップして読む
  -------------------------------------------------- */
  const tapItem = $('.agree-inc-pp');
  const visibleCls = 'is-visible';
  tapItem.on('tap click', function () {
    if ( $(this).hasClass(visibleCls) ){
      $(this).removeClass(visibleCls);
    } else {
      $(this).addClass(visibleCls);
    }
  });

})(jQuery);