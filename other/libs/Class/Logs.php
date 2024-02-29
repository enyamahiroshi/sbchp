<?php
class Logs
{
    /**
     * __construct
     */
    public function __construct()
    {
    }
    /**
     * ログの出力
     *
     * @param string $msg
     * @return void
     */
    public static function printLog($msg)
    {
        $today = date('Y/m/d H:i:s');

        $path = LOG_REALFILE;

        $msg = "$today [{$_SERVER['SCRIPT_NAME']}] $msg from {$_SERVER['REMOTE_ADDR']}\n";

        error_log($msg, 3, $path);

        Logs::rotation(MAX_LOG_QUANTITY, MAX_LOG_SIZE, $path);
    }

    /**
     * ログローテーション
     *
     * @param int $max
     * @param int $size
     * @param string $path
     * @return void
     */
    public static function rotation($max_log, $max_size, $path)
    {
        // ファイルが存在しない場合、終了
        if (!file_exists($path)) return;

        // ファイルが最大サイズを超えていない場合、終了
        if (filesize($path) <= $max_size) return;

        // Windows 版 PHP への対策として明示的に事前削除
        $path_max = "$path.$max_log";
        if (file_exists($path_max)) {
            $res = unlink($path_max);
            if (!$res) return;
        }

        // アーカイブのインクリメント
        for ($i = $max_log; $i >= 2; $i--) {
            $path_old = "$path." . ($i - 1);
            $path_new = "$path.$i";
            if (file_exists($path_old)) {
                rename($path_old, $path_new);
            }
        }

        // 現在ファイルのアーカイブ
        rename($path, "$path.1");
    }
}
