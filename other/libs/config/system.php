<?php
/*  基本設定 ------------- */

/** APP NAME（COOKIE NAME）  */
define('APP_NAME', 'sbchp_FormApp');

/** COOKIE設定用:ドメイン */
define('DOMAIN_NAME', $_SERVER["HTTP_HOST"]);

/** COOKIE設定用:パス */
define('ROOT_PATH', '/');

/** トランザクション名 */
define('TRANSACTION_NAME', 'tids');


/* ログ関連
 ---------------------------------------*/
/** 標準ログファイル */
define('LOG_REALFILE', realpath(dirname(__FILE__)) . "/../logs/site.log");
/** ログファイル最大数(ログテーション) */
define('MAX_LOG_QUANTITY', 3);
/** ログファイルに保存する最大容量(byte) */
define('MAX_LOG_SIZE', "1000000");


/* ページスラッグ関連
 ---------------------------------------*/

/** 予約申し込み・確認・完了画面 */
define('RESERVE_INPUT_SLUG', 'reserve');
define('RESERVE_CONFIRM_SLUG', 'reserve/confirm');
define('RESERVE_COMPLETE_SLUG', 'reserve/completion');
