<?php echo $arrData['app-name-sei'] . ' ' . $arrData['app-name-mei']; ?> 様

この度はモデルハウス見学予約のお申し込みありがとうございます。
内容を確認後、後日担当よりご連絡いたします。

◆ モデルハウス見学予約
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

●見学希望の会場
 <?php echo $arrData['park'] ?? ''; ?><?php echo "\n"; ?>

<?php $no = 1; foreach ($arrData['model'] as $model): ?>
[<?php esc_html_e($no); ?>棟目]<?php echo "\n"; ?>
 モデルハウス ： <?php echo $model['name'] ?? ''; ?><?php echo "\n"; ?>
 希望日 　　　： <?php echo date('Y年n月j日', strtotime($model['date'])) ?? ''; ?><?php echo "\n"; ?>
 希望時間 　　： <?php echo $model['time'] ?? ''; ?><?php echo "\n"; ?><?php echo "\n"; ?>
<?php $no++; endforeach; ?>

▼ お申込者様情報 －－－－－－－－－－－－▼
 お名前 　： <?php echo $arrData['app-name-sei'] . ' ' . $arrData['app-name-mei']; ?>（<?php echo $arrData['app-kana-sei'] . ' ' . $arrData['app-kana-mei']; ?>）<?php echo "\n"; ?>
 電話番号 ： <?php echo $arrData['app-tel']; ?><?php echo "\n"; ?>
 性別 　　： <?php echo $arrData['app-sex']; ?><?php echo "\n"; ?>
 年代 　　： <?php echo $arrData['app-age']; ?><?php echo "\n"; ?>
 職業 　　： <?php echo $arrData['app-job']; ?><?php echo "\n"; ?>
 お住まいの市町村 ： <?php echo $arrData['app-shi']; ?><?php echo "\n"; ?>
 メールアドレス 　： <?php echo $arrData['app-email']; ?><?php echo "\n"; ?>
 来場ご予定人数 　： 大人 <?php echo $arrData['app-ninzu-adult']; ?>名<?php if (isset($arrData['app-ninzu-child']) && !empty($arrData['app-ninzu-child'])): ?>　子ども <?php echo $arrData['app-ninzu-child']; ?>名<?php endif; ?><?php echo "\n"; ?>
 ご家族構成 　　　： <?php echo $arrData['app-family']; ?><?php echo "\n"; ?>
 ご検討されたい住宅の種類 ： <?php echo $arrData['app-kento']; ?><?php echo "\n"; ?>
 計画地域（市町村など） ： <?php echo Utils::mbWordwrap($arrData['app-area']); ?>
 建築用土地の有無 　： <?php echo $arrData['app-tochi']; ?><?php echo "\n"; ?>
 ご相談されたい内容 ： <?php echo $arrData['app-naiyo']; ?><?php echo "\n"; ?>

▼ 自由記入欄 －－－－－－－－－－－－－－▼

<?php echo Utils::mbWordwrap($arrData['app-biko']); ?><?php echo "\n"; ?>

－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－