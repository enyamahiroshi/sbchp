(function ($) {
  // 切り替える対象にclass属性。
  const $elem = $('.switch');
  // 切り替えの対象のsrc属性の末尾の文字列。
  const sp = '_sp.';
  const pc = '_pc.';
  // 画像を切り替えるウィンドウサイズ。
  const replaceWidth = 768;

  function imageSwitch() {
    // ウィンドウサイズを取得する。
    const windowWidth = parseInt($(window).width());
    // ページ内にあるすべての`.switch`に適応される。
    $elem.each(function() {
    const $this = $(this);
    // ウィンドウサイズが768px以上であれば_spを_pcに置換する。
    if (windowWidth >= replaceWidth) {
      $this.attr('src', $this.attr('data-src').replace(sp, pc));
    // ウィンドウサイズが768px未満であれば_pcを_spに置換する。
    } else {
      $this.attr('src', $this.attr('data-src'));
    }
    });
  }

  imageSwitch();
  // 動的なリサイズは操作後0.2秒経ってから処理を実行する。
  let resizeTimer;
  $(window).on('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
      imageSwitch();
    }, 200);
  });
})(jQuery);

//動画読み込み完了
document.addEventListener('DOMContentLoaded', function () {
  const videoWrappers = document.getElementsByClassName('mv__movie');
  for(let i = 0; i < videoWrappers.length; i++) {
      const videoWrapper = videoWrappers[i];
      const video = videoWrapper.getElementsByTagName('video')[0];
      video.addEventListener('canplay', function() {
          videoWrapper.classList.add('is-play');
      }, false);
  }
}, false);