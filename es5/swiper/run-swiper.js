//swiper オプション
//https://swiperjs.com/swiper-api
//https://open-code.tech/post-1163 動作サンプル
//https://b-risk.jp/blog/2022/04/swiper/#01_Swiper


/* ===============================
* モデルハウスの概要スライダー
/* =============================== */
//モデルハウスの概要スライダー サムネイル
const swiper_modelhouse_a_thumbnail = new Swiper(".slider-modelhouse-small-thumbnail", {
  slidesPerView: 5,
  spaceBetween: 6,
  freeMode: true,
  watchSlidesProgress: true,
  breakpoints: {
    1024: {
      spaceBetween: 10,
    },
  },
});
//モデルハウスの概要スライダー 本体
const swiper_modelhouse_a = new Swiper('.slider-modelhouse-small', {
  direction: 'horizontal', //水平:horizontal, 垂直:vertical
  loop: true,
  slidesPerView: 'auto',    //1画面で見えるスライド数を指定 autoで常にスライドが見えるように
  thumbs: {
    swiper: swiper_modelhouse_a_thumbnail
  },
});


/* ===============================
* モデルハウスのメインスライダー
/* =============================== */
//モデルハウスのメインスライダー サムネイル
const swiper_modelhouse_main_thumbnail = new Swiper(".slider-modelhouse-main-thumbnail", {
  slidesPerView: 5,
  spaceBetween: 6,
  freeMode: true,
  watchSlidesProgress: true,
  breakpoints: {
    768: {
      spaceBetween: 10,
    },
  },
});
//モデルハウスのメインスライダー 本体
const swiper_modelhouse_main = new Swiper('.slider-modelhouse-main', {
  direction: 'horizontal', //水平:horizontal, 垂直:vertical
  loop: true,
  slidesPerView: 'auto', //1画面で見えるスライド数を指定 autoで常にスライドが見えるように
  thumbs: {
    swiper: swiper_modelhouse_main_thumbnail
  },
  navigation: { //ナビゲーション（矢印）
    centeredSlides: false, //アクティブなスライドを真ん中に
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    768: {
      spaceBetween: 20,
    },
    1024: {
      spaceBetween: 40,
    },
  },
});


/* ===============================
* パークのメインスライダー
/* =============================== */
//パークのメインスライダー 本体
const swiper_park_main = new Swiper('.slider-park-main', {
  direction: 'horizontal', //水平:horizontal, 垂直:vertical
  loop: true,
  slidesPerView: 'auto', //1画面で見えるスライド数を指定 autoで常にスライドが見えるように
  navigation: { //ナビゲーション（矢印）
    centeredSlides: false, //アクティブなスライドを真ん中に
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {                       //ページネーション（ドット）
    el: '.swiper-pagination',
  },
  breakpoints: {
    768: {
      spaceBetween: 20,
    },
    1024: {
      spaceBetween: 40,
    },
  },
});