<?php
/**
 * セッション関連
 */

class Sessions
{
    /**
     * __construct
     */
    public function __construct()
    {
    }
    /**
     * セッションパラメーターの指定
     *
     * @return void
     */
    public function initSession()
    {
        ini_set('session.cache_limiter', 'none');

        session_write_close();

        $https = 
            (isset($_SERVER['HTTPS']) && !is_null($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS'])) ||
            (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on');

        $params = array(
            'lifetime' => 0,
            'path' => '/',
            'domain' => DOMAIN_NAME,
            'httponly' => true,
            'secure' => $https,
            'samesite' => ''
        );

        if ($https) {
            $params['samesite'] = 'None';
        }

        session_set_cookie_params($params);
        session_name(APP_NAME);
        session_start();

        // if (session_id() !== '') {
        //     setcookie('legacy-'.session_name(), session_id(), $params['lifetime'], $params['path'], $params['domain'], $https, true);
        // }
    }

    /**
     * トランザクショントークンを生成し, 取得する.
     *
     * 悪意のある不正な画面遷移を防止するため, 予測困難な文字列を生成して返す.
     * 同時に, この文字列をセッションに保存する.
     *
     * この関数を使用するためには, 生成した文字列を次画面へ渡すパラメーターとして
     * 出力する必要がある.
     *
     * 例)
     * <input type='hidden' name='transactionid' value="この関数の返り値" />
     *
     * 遷移先のページで, LC_Page::isValidToken() の返り値をチェックすることにより,
     * 画面遷移の妥当性が確認できる.
     *
     * @access protected
     * @return string トランザクショントークンの文字列
     */
    public static function getToken()
    {
        if (empty($_SESSION[TRANSACTION_NAME])) {
            $_SESSION[TRANSACTION_NAME] = Sessions::createToken();
        }

        return $_SESSION[TRANSACTION_NAME];
    }

    /**
     * トランザクショントークン用の予測困難な文字列を生成して返す.
     *
     * @access private
     * @return string トランザクショントークン用の文字列
     */
    public static function createToken()
    {
        return sha1(uniqid(rand(), true));
    }

    /**
     * トランザクショントークンの妥当性をチェックする.
     *
     * 生成されたトランザクショントークンの妥当性をチェックする.
     * この関数を使用するためには, 前画面のページクラスで LC_Page::getToken()
     * を呼んでおく必要がある.
     *
     * トランザクショントークンは, SC_Helper_Session::getToken() が呼ばれた際に
     * 生成される.
     * 引数 $is_unset が false の場合は, トークンの妥当性検証が不正な場合か,
     * セッションが破棄されるまで, トークンを保持する.
     * 引数 $is_unset が true の場合は, 妥当性検証後に破棄される.
     *
     * @access protected
     * @param boolean $is_unset 妥当性検証後, トークンを unset する場合 true;
     *                          デフォルト値は false
     * @return boolean トランザクショントークンが有効な場合 true
     */
    public function isValidToken($is_unset = false)
    {
        $ret = $_REQUEST[TRANSACTION_NAME] === $_SESSION[TRANSACTION_NAME];

        if (empty($_REQUEST[TRANSACTION_NAME]) || empty($_SESSION[TRANSACTION_NAME])) {
            $ret = false;
        }
        if ($is_unset || $ret === false) {
            Sessions::destroyToken();
        }
        return $ret;
    }
    /**
     * トランザクショントークンを破棄する.
     *
     * @return void
     */
    public static function destroyToken()
    {
        unset($_SESSION[TRANSACTION_NAME]);
    }
    /**
     * セッションIDを新しいIDに書き換える
     *
     * @return bool
     */
    public static function regenerateSID()
    {
        return session_regenerate_id(true);
    }
}
