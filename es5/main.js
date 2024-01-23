(function ($) {

  /* --------------------------------------------------
    スクロールで処理
  -------------------------------------------------- */
  const $aadclass = 'is-fixed';
  // header
  const $hideClass = 'is-hide';
  const $AppearGM = $('body, .header');
  const $AppearGMTiming = $('.sec:first-of-type').offset().top;
  $(window).on('load scroll', function () {
    if ($(this).scrollTop() > $AppearGMTiming && $AppearGM.hasClass($aadclass) == false) {
      $AppearGM.removeClass($hideClass);
      $AppearGM.addClass($aadclass);
    } else if ($(this).scrollTop() > 0 && $(this).scrollTop() < $AppearGMTiming && $AppearGM.hasClass($hideClass) == false) {
      $AppearGM.addClass($hideClass);
      $AppearGM.removeClass($aadclass);
    } else if ($(this).scrollTop() == 0) {
      $AppearGM.removeClass($hideClass).removeClass($aadclass);
    }
  });
  // pagetop
  const $pageTop = $('.bottun-page-top');
  const $pageTopT = '400';
  $(window).on('load scroll', function () {
    if ($(this).scrollTop() > $pageTopT) {
      $pageTop.addClass($aadclass).on('tap click', function () {
        $(this).removeClass($aadclass);
      });
    } else if ($(this).scrollTop() < $pageTopT) {
      $pageTop.removeClass($aadclass);
    }
  });

  /* --------------------------------------------------
    メニュー開閉
  -------------------------------------------------- */
  const body = $('body');
  const menuWrap = $('.global-menu');
  const header = $('.header');
  const BtnOpen = $('.js-tgl-menu');
  const classname = 'is-open';
  const NaviLink = $('.menu a[href]');
  const mediaquerynum = '767px';
  $(window).on('resize', function () {
    if (window.matchMedia( "(min-width: " + mediaquerynum + ")" ).matches) {
      if (body.hasClass(classname)) {
        body.removeClass(classname);
        header.removeClass(classname);
        menuWrap.removeClass(classname);
        BtnOpen.removeClass(classname);
      }
    }
  });
  BtnOpen.on('tap click', function () {
    if (window.matchMedia( "(max-width: " + mediaquerynum + ")" ).matches) {
      if (body.hasClass(classname)) {
        body.removeClass(classname);
        header.removeClass(classname);
        menuWrap.removeClass(classname);
        BtnOpen.removeClass(classname);
      } else {
        body.addClass(classname);
        header.addClass(classname);
        menuWrap.addClass(classname);
        BtnOpen.addClass(classname);
      }
    }
  });
  NaviLink.on('tap click', function () {
    if (window.matchMedia( "(max-width: " + mediaquerynum + ")" ).matches) {
      if (body.hasClass(classname)) {
        body.removeClass(classname);
        header.removeClass(classname);
        menuWrap.removeClass(classname);
        BtnOpen.removeClass(classname);
      } else {
        body.addClass(classname);
        header.addClass(classname);
        menuWrap.addClass(classname);
        BtnOpen.addClass(classname);
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