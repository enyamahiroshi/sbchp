(function ($) {

  /* --------------------------------------------------
    デザインから選ぶ：シャッフルして表示
  -------------------------------------------------- */
  const bool = [1, -1];
  const sortTrgUl = '.list-design-modelhouse';
  const sortTrgUlLi = '.list-design-modelhouse .list-item';
  $(sortTrgUl).hide();
  $(sortTrgUl).html(
    $(sortTrgUlLi).sort(function (a, b) {
      return bool[Math.floor(Math.random() * bool.length)];
    })
  );
  $(sortTrgUl).show();

})(jQuery);