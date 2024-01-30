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
  const NaviLink = $('.menu a[href]');
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

})(jQuery);