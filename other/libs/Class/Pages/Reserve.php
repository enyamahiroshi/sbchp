<?php
/**
 * - 見学予約
 * 
 * 
 * 
 * 
 * 
 */
class Reserve
{
    public $objSessions;

    public $tempRequestSession;

    public $exceptionErr;

    public function __construct($tempKey = 'tempReserve')
    {
        $this->objSessions = new Sessions();

        if (!isset($_SESSION[$tempKey])) {
            $_SESSION[$tempKey] = [];
        }
        $this->tempRequestSession = &$_SESSION[$tempKey];
    }
    /**
     * 入力画面用
     *
     * @return void
     */
    public function main()
    {

        switch (Utils::mode()) {

            case 'confirm':

                if ($this->objSessions->isValidToken()) {

                    $this->arrData = $_POST;
                    $this->arrErr = $this->lfCheckError($this->arrData, true);
                    

                    if (isset($this->arrData['model'])) {
                        $i = 0;
                        foreach ($this->arrData['model'] as $key => $item) {
                            if ($i < MODEL_HOUSE_MAX) {
                                $this->arrData['models'][] = $item['name'];
                            } else {
                                unset($this->arrData['model'][$key]);
                            }
                            $i++;
                        }
                    } else {
                        $this->arrData['models'] = [];
                    }

                    if (!$this->arrErr) {
                        $this->seve($this->arrData);
                        wp_redirect(get_permalink(get_page_by_path(RESERVE_CONFIRM_SLUG)->ID));
                        exit;
                    }
                } else {
                    $this->exceptionErr = VALIDTOKEN_ERRORS;
                }
                break;

            default:
                $this->arrData = $this->tempRequestSession;
                break;
        }
    }
    /**
     * 確認画面
     *
     * @return void
     */
    public function confirm()
    {

        if (empty($this->tempRequestSession)) {
            wp_redirect(get_permalink(get_page_by_path(RESERVE_INPUT_SLUG)->ID));
            exit;
        }

        $this->arrData = $this->tempRequestSession;

        switch (Utils::mode()) {
            case 'complete':
                if ($this->objSessions->isValidToken()) {

                    $this->arrErr = $this->lfCheckError($this->arrData);

                    if (!$this->arrErr) {
                        try {

                            $objMails = new Mails();

                            $userName = $this->arrData['app-name-sei'] . $this->arrData['app-name-mei'] . '様';

                            if ($objMails->reserve($this->arrData['app-email'], $this->arrData, $userName)) {

                                $this->tempRequestSession = [];
                                unset($this->tempRequestSession);

                                wp_redirect(get_permalink(get_page_by_path(RESERVE_COMPLETE_SLUG)->ID));
                                exit;
                            } else {
                                $this->exceptionErr = MAILL_ERRORS;
                            }
                        } catch (Exception $e) {
                            Logs::printLog($e->getMessage());
                        }
                    }
                } else {
                    $this->exceptionErr = VALIDTOKEN_ERRORS;
                }
            default:
                break;
        }
    }

    /**
     * 完了画面
     *
     * @return void
     */
    public function thanks()
    {
        $url = get_permalink(get_page_by_path(RESERVE_CONFIRM_SLUG)->ID);
        if (!isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], $url) === false){
            wp_redirect(get_permalink(get_page_by_path(RESERVE_INPUT_SLUG)->ID));
            exit;
        }
    }

    /**
     * 会員情報入力チック
     *
     * @param array $arrForm
     * @param boolean $admin 
     * @return void
     */
    function lfCheckError($arrForm = [], $recaptchaCheck = false)
    {
        $objErr = new Validate($arrForm);

        $objErr->doFunc(['展示場', 'park'], ['SELECT_CHECK']);

        if (isset($arrForm['model'])) {

            foreach ($arrForm['model'] as $id => $model) {

                if (!empty($model['name'])) {

                    if (empty($model['date'])) {
                        $objErr->arrErr['model'][$id]['date'] = '入力されていません。';
                    }

                    if (!isset($model['time']) || empty($model['time'])) {
                        $objErr->arrErr['model'][$id]['time'] = '入力されていません。';
                    }
                }
            }
        } else {
            $objErr->arrErr['models'] = 'ご見学希望のモデルハウスを選択してください。';
        }

        $objErr->doFunc(['お名前（姓）', 'app-name-sei', 50], ['EXIST_CHECK', 'MAX_LENGTH_CHECK']);
        $objErr->doFunc(['お名前（名）', 'app-name-mei', 50], ['EXIST_CHECK', 'MAX_LENGTH_CHECK']);
        $objErr->doFunc(['フリガナ（セイ）', 'app-kana-sei', 50], ['EXIST_CHECK', 'MAX_LENGTH_CHECK', 'KANA_CHECK']);
        $objErr->doFunc(['フリガナ（メイ）', 'app-kana-mei', 50], ['EXIST_CHECK', 'MAX_LENGTH_CHECK', 'KANA_CHECK']);
        $objErr->doFunc(['電話番号', 'app-tel', 15], ['EXIST_CHECK', 'TEL_CHECK', 'MAX_LENGTH_CHECK']);
        $objErr->doFunc(['性別', 'app-sex'], ['SELECT_CHECK']);
        $objErr->doFunc(['年代', 'app-age'], ['SELECT_CHECK']);

        $objErr->doFunc(['職業', 'app-job', 50], ['EXIST_CHECK', 'MAX_LENGTH_CHECK']);

        $objErr->doFunc(['お住まいの市町村', 'app-shi', 200], ['EXIST_CHECK', 'MAX_LENGTH_CHECK']);

        $objErr->doFunc(['メールアドレス', 'app-email', 250], ['EXIST_CHECK', 'MAX_LENGTH_CHECK', 'EMAIL_CHECK']);
        $objErr->doFunc(['メールアドレス（確認用）', 'app-email-kakunin', 250], ['EXIST_CHECK', 'MAX_LENGTH_CHECK', 'EMAIL_CHECK']);

        $objErr->doFunc(['メールアドレス', 'メールアドレス（確認用）', 'app-email', 'app-email-kakunin'], ['EQUAL_CHECK']);


        $objErr->doFunc(['来場予定人数（大人）', 'app-ninzu-adult', 2], ['EXIST_CHECK', 'NUM_CHECK', 'MAX_LENGTH_CHECK']);
        $objErr->doFunc(['来場予定人数（子ども）', 'app-ninzu-child', 2], ['NUM_CHECK', 'MAX_LENGTH_CHECK']);

        $objErr->doFunc(['家族構成', 'app-family'], ['SELECT_CHECK']);

        $objErr->doFunc(['住宅の種類', 'app-kento'], ['SELECT_CHECK']);

        $objErr->doFunc(['建築用土地の有無', 'app-tochi'], ['SELECT_CHECK']);

        $objErr->doFunc(['ご相談されたい内容', 'app-naiyo'], ['SELECT_CHECK']);

        $objErr->doFunc(['自由記入欄', 'app-biko', 1000], ['MAX_LENGTH_CHECK']);

        $objErr->doFunc(['個人情報保護方針に同意する', 'app-agree'], ['SELECT_CHECK']);

        if ($recaptchaCheck && GOOGLE_SITE_KEY) {
            if (isset($arrForm['g-recaptcha-response'])) { 
                $result_message = $objErr->reCAPTCHA($arrForm['g-recaptcha-response']);
                if ($result_message) {
                    Logs::printLog("reCAPTCHA ERROR : " . $result_message);
                    $objErr->arrErr['g-recaptcha-response'] = RECAPTCHA_ERRORS;
                }
            } else {
                $objErr->arrErr['g-recaptcha-response'] = RECAPTCHA_ERRORS;
                Logs::printLog("reCAPTCHA ERROR : g-recaptcha-response do not");
            }
        }

        return $objErr->arrErr;
    }


    /**
     * セッション保存処理
     *
     * @param array $params
     * @return void
     */
    public function seve($params = [])
    {
        foreach ($params as $key => $value) {
            $this->tempRequestSession[$key] = $value;
        }
    }
}
