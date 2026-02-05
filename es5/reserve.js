(function ($) {
  $(window).on("load", DP);
  $(".list-modelhouse").on("change", DP);

  function DP() {
    $.datepicker.setDefaults($.datepicker.regional["ja"]);
    $(".js-datepicker").datepicker({
      minDate: "5d", // 今日の日付から選択が可能
      maxDate: "+14d", // 今日の日付から14日後まで選択が可能
      onSelect: function (dateText, inst) {
        $(this).val(dateText); // 選択された日付を表示する
      },
      beforeShow: function (input, inst) {
        $(input).prop("readonly", true); // readonlyプロパティをtrueに設定
      },
      // 特定期間を選択不可にする -- 年ごとに日付を指定する場合
      // beforeShowDay: function(date) {
      //   var startDate = new Date(2024, 11, 28); // 2024年12月28日 (月は0始まりなので12月は11)
      //   var endDate = new Date(2025, 0, 8);    // 2025年1月8日まで不可

      //   if (date >= startDate && date <= endDate) {
      //     return [false, "", "選択不可"]; // この範囲内の日付は無効
      //   }
      //   return [true];
      // }
      // 特定期間を選択不可にする -- 毎年決まった日付の場合
      beforeShowDay: function (date) {
        var month = date.getMonth(); // 月 (0 = 1月, 11 = 12月)
        var day = date.getDate(); // 日

        // 8月12日〜8月16日 を選択不可にする
        if (month === 7 && day >= 12 && day <= 16) {
          return [false, "", "選択不可"];
        }
        // 12月27日〜12月31日 を選択不可にする
        if (month === 11 && day >= 27 && day <= 31) {
          return [false, "", "選択不可"];
        }
        // 1月1日〜1月7日 を選択不可にする
        if (month === 0 && day >= 1 && day <= 7) {
          return [false, "", "選択不可"];
        }

        return [true];
      },
    });
  }

  /* --------------------------------------------------
    見学予約フォームに今日から4日後以上14日以内の日付を含むselectボックスを自動的に設定
  -------------------------------------------------- */
  // const selectBox = $('.js-date-set');
  // const today = new Date();

  // // 4日後の日付を取得
  // const fromDate = new Date(today);
  // fromDate.setDate(today.getDate() + 4);

  // // 14日後の日付を取得
  // const toDate = new Date(today);
  // toDate.setDate(today.getDate() + 14);

  // // fromDateからtoDateまでの日付をselectボックスに追加
  // for (const date = fromDate; date <= toDate; date.setDate(date.getDate() + 1)) {
  //   const dateString = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
  //   const option = $('<option>').val(dateString).text(dateString);
  //   selectBox.append(option);
  // }

  /* --------------------------------------------------
    見学予約フォームの日にちカレンダーで左右でのカーソル移動を禁止する
  -------------------------------------------------- */
  // // Disable cursor navigation for date input
  // $('input[type="date"]').keydown(function(event) {
  //   // Disable left and right arrow keys
  //   if (event.keyCode === 37 || event.keyCode === 39) {
  //       event.preventDefault();
  //   }
  // });

  // // Disable keyboard input for date input
  // $('input[type="date"]').on('keydown', function(event) {
  //     event.preventDefault();
  // });
})(jQuery);
