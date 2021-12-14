<?php get_header(); ?>

<div class="l-content">
  <div class="l-content__header">
    <div class="c-container _lg_">
      <?php get_template_part('component/widget', 'content-header-archive'); ?>
    </div>
  </div>

  <?php

  if (is_page('hardwares') || is_post_type_archive('hardware') || is_tax(['hardware-series', 'hardware-type', 'hardware-genre'])) {

    get_template_part('layout/content-body-archive', 'column-2-right-sidebar');
  } else {
    get_template_part('layout/content-body-archive', get_theme_mod('stic_template_archive', 'column-1-wide'));
  }
  ?>

  <div class="l-content__footer">
    <div class="c-container _lg_">
      <?php get_template_part('component/pagination'); ?>
      <?php get_template_part('component/widget', 'content-footer-archive'); ?>
    </div>
  </div>
</div><!-- .l-content -->

<?php
get_footer();
