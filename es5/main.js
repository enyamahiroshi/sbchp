(function ($) {

  /* --------------------------------------------------
    スクロールで処理
  -------------------------------------------------- */
  const $aadClass = 'is-fixed';

  // header
  const $AppearGM = $('.header');
  const $AppearGMTiming = $('.sec:first-of-type').offset().top;
  $(window).on('load scroll', function () {
    if ($(this).scrollTop() > $AppearGMTiming && $AppearGM.hasClass($aadClass) == false) {
      $AppearGM.addClass($aadClass);
    } else if ($(this).scrollTop() > 0 && $(this).scrollTop() < $AppearGMTiming) {
      $AppearGM.removeClass($aadClass);
    } else if ($(this).scrollTop() == 0) {
      $AppearGM.removeClass($aadClass);
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
  const isOpen = 'is-open';
  const NaviLink = $('.header-nav .menu a[href]');
  const mediaqueryPoint = '1399px';
  $(window).on('resize', function () {
    if (window.matchMedia( "(min-width: " + mediaqueryPoint + ")" ).matches) {
      if (body.hasClass(isOpen)) {
        body.removeClass(isOpen);
        header.removeClass(isOpen);
        menuWrap.removeClass(isOpen);
        BtnOpen.removeClass(isOpen);
      }
    }
  });
  BtnOpen.on('tap click', function () {
    if (window.matchMedia( "(max-width: " + mediaqueryPoint + ")" ).matches) {
      if (body.hasClass(isOpen)) {
        body.removeClass(isOpen);
        header.removeClass(isOpen);
        menuWrap.removeClass(isOpen);
        BtnOpen.removeClass(isOpen);
      } else {
        body.addClass(isOpen);
        header.addClass(isOpen);
        menuWrap.addClass(isOpen);
        BtnOpen.addClass(isOpen);
      }
    }
  });
  NaviLink.on('tap click', function () {
    if (window.matchMedia( "(max-width: " + mediaqueryPoint + ")" ).matches) {
      if (body.hasClass(isOpen)) {
        body.removeClass(isOpen);
        header.removeClass(isOpen);
        menuWrap.removeClass(isOpen);
        BtnOpen.removeClass(isOpen);
      } else {
        body.addClass(isOpen);
        header.addClass(isOpen);
        menuWrap.addClass(isOpen);
        BtnOpen.addClass(isOpen);
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
  const footerSubmenu = $('.footer-nav .menu .sub-menu');
  const classAction = 'is-action';
  tglSubmenuFooter.on('click mouseover', function () {
    if ($(this).find('.sub-menu').hasClass(classAction)) {
      $(this).find('.sub-menu').removeClass(classAction);
    } else {
      footerSubmenu.removeClass(classAction);
      $(this).find('.sub-menu').addClass(classAction);
    }
  }).on('mouseout', function () {
    footerSubmenu.removeClass(classAction);
  });


  /* --------------------------------------------------
    展示場開閉
  -------------------------------------------------- */
  const tglParkOC = $('.js-tgl-park');
  $(this).parent('.park').removeClass(isOpen);
  $(tglParkOC).on('tap click', function () {
    if ($(this).parent('.park').hasClass(isOpen)) {
      $(this).parent('.park').removeClass(isOpen);
    } else {
      $(this).parent('.park').addClass(isOpen);
    }
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