<?php
/**
 * 共通利用
 */
class Utils
{
    /**
     * __construct
     */
    public function __construct()
    {
    }

    /**
     * mode取得
     *
     * @return void
     */
    public static function mode()
    {
        $pattern = '/^[a-zA-Z0-9_]+$/';
        $mode = null;
        if (isset($_REQUEST['mode']) && preg_match($pattern, $_REQUEST['mode'])) {
            $mode =  $_REQUEST['mode'];
        }
        return $mode;
    }


    public static function checked($index = '', $value = '', $default = false)
    {

        if ($default && !$value) {
            echo ' checked';
        }

        if (is_array($value)) {

            if (in_array($index, $value, true)) {
                echo ' checked';
            }

        } else {
            if ($value && $value == $index) {
                echo ' checked';
            }
        }
    }
    public static function selected($index = '', $value = '')
    {
        if ($value && $value == $index) {
            echo ' selected="selected"';
        }
    }

    /**
     * エラー表示
     */
    public static function printErr($value = '')
    {
        if ($value) {
            echo '<span class="u-error">' . $value . '</span>';
        }
    }

    /**
     * 長い文字に改行を追加
     *
     * @param string $string
     * @param integer $width
     * @param string $break
     * @param boolean $cut
     * @return string $string
     */
    public static function mbWordwrap($string, $width = 200, $break = "\n", $cut = true)
    {

        $return = '';

        $texts = preg_split("/\r\n|\r|\n/", $string);
        if (empty($texts)) {
            return $return;
        }

        if (!$cut) {
            $regexp = '#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){'.$width.',}\b#U';
        } else {
            $regexp = '#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){'.$width.'}#';
        }

        foreach ($texts as $line => $text) {

            $textLength = mb_strlen($text, 'UTF-8');

            if ($width < $textLength) {

                $length = ceil($textLength / $width);

                $i = 1;
                while ($i < $length) {
                    preg_match($regexp, $text, $matches);
                    $_text = $matches[0];
                    $return .= $_text . $break;
                    $text = substr($text, strlen($_text));
                    $i++;
                }
                $return .= $text . $break;
            } else {
                $return .= $text . $break;
            }
        }

        return $return;
    }

    /**
     * キーからIDを削除
     *
     * @param string $string
     * @return string
     */
    public static function trimData($string)
    {
        return strstr($string, '-ID-', true);
    }


}
