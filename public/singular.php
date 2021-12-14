<?php get_header(); ?>

<?php
if (!get_theme_mod('stic_eyecatch_position') && get_post_meta(get_the_ID(), 'stic_display_eyecatch', true) !== 'hide' && get_post_type() !== 'hardware') {
  get_template_part('component/eyecatch', 'overtop');
}
?>

<div class="l-content">
  <div class="l-content__header">
    <div class="c-container _lg_">
      <?php get_template_part('component/widget', 'content-header-singular'); ?>
    </div>
  </div>

  <?php get_template_part('layout/content-body'); ?>

  <div class="l-content__footer">
    <div class="c-container _lg_">
      <?php get_template_part('component/widget', 'content-footer-singular'); ?>
    </div>
  </div>
</div><!-- .l-content -->

<?php
get_footer();
