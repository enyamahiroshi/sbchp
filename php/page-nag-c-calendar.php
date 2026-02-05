<?php
/** calendar */
require_once (realpath(dirname(__FILE__) . '/calendar/require.php'));

$objApp = new Calendar('nag-c.csv');
$objApp->read();

/** データが取得できない場合はHOMEへ遷移 */
if (empty($objApp->rows)) {
    header('Location: ' . home_url());
    exit;
}
get_header('calendar'); ?>

  <section class="sec sec-l sec-calendar">
    <div class="inner">
    <h1 class="title-2"><?php the_title(); ?></h1>
    <?php get_template_part('template/template', 'calendar'); ?>
    </div>
  </section>

<?php get_footer('calendar'); ?>