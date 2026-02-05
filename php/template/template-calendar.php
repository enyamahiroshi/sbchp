<?php global $objApp; ?>
<?php /* <div class="calendar-month">対象月：<?php esc_html_e($objApp->nowAt->format('m月')); ?></div> */ ?>
<div class="calendar-update">更新日：<?php esc_html_e($objApp->updateAt->format('Y年m月d日 H時i分')); ?></div>

<div class="tbl-scroll js-scroll-hint">

<table class="tbl-calendar">
<thead>
<?php foreach ($objApp->header as $line => $columns) : ?>
<tr>
<?php foreach ($columns as $no => $column) :  ?>

        <th class="<?php echo $column['week'] ?? ''; ?><?php if ($no === 0){ echo ' cell-modelhouse'; } else{ echo ' cell-date'; } ?>">
        <?php if ($no === 0): ?>
            <div><?php esc_html_e($objApp->nowAt->format('Y年m月')); ?></div>
            <div>モデルハウス</div>
        <?php else: ?>
            <?php if ($column['day'] instanceof DateTime) : ?>
                <span><?php esc_html_e($column['day']->format('d') ?? ''); ?><span>
                <span><?php esc_html_e($column['day']->format('D') ?? ''); ?><span>
            <?php endif; ?>
        <?php endif; ?>
        </th>
<?php endforeach; ?>
</tr>
<?php endforeach; ?>
</thead>

<tbody>
<?php foreach ($objApp->rows as $line => $columns) : ?>
<tr>
<?php foreach ($columns as $no => $column) :  ?>
        <td class="<?php esc_attr_e($column['class'] ?? ''); ?><?php if ($no === 0){ echo ' cell-modelhouse'; } else{ echo ' cell-status'; } ?>">
            <?php if ($no === 0): ?>
                <div class="cell-md-logo">
                    <?php if (isset($column['img']) && !empty($column['img'])): ?>
                        <img src="<?php esc_attr_e($column['img'] ?? ''); ?>" alt="">
                    <?php endif; ?>
                </div>
                <?php //2行目にモデルハウス名を入力してロゴの下に表示する - 20240402 ?>
                <div class="cell-md-name"><?php esc_html_e($column['mhName'] ?? ''); ?></div>
                <div class="cell-md-info">
                    <div class="cell-md-info-tel"><?php esc_html_e($column['tel'] ?? ''); ?></div>
                    <div class="cell-md-info-open"><?php esc_html_e($column['time'] ?? ''); ?></div>
                </div>
            <?php else: ?>
                <span></span>
            <?php endif; ?>
        </td>
<?php endforeach; ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>

<div class="status-explanation">
    <div class="normal cell-status"><span></span><p>通常営業</p></div>
    <div class="contact cell-status" data-status="2"><span></span><p>お問い合わせください</p></div>
    <div class="holiday cell-status" data-status="3"><span></span><p>休業日</p></div>
    <div class="morning cell-status" data-status="4"><span></span><p>午前営業</p></div>
    <div class="afternoon cell-status" data-status="5"><span></span><p>午後営業</p></div>
</div>