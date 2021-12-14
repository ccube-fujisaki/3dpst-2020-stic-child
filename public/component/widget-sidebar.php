<div class="c-widget _sidebar_">
  <?php
  if (is_page('hardwares') || get_post_type() === 'hardware') {
    dynamic_sidebar('sidebar-hardware');
  } else {
    dynamic_sidebar('sidebar');
  }
  ?>
</div>

<div class="c-widget _sidebar_">
  <?php
  if (is_page('samples')) {
    dynamic_sidebar('sidebar-sample');
  }
  ?>
</div>

<div class="c-widget _sidebar_ _sticky_">
  <div class="u-sticky _gt-pc_">
    <?php dynamic_sidebar('sidebar-sticky'); ?>
  </div>
</div>
