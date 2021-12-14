<?php get_header(); ?>

<div class="l-content">
  <div class="l-content__header">
    <div class="c-container _lg_">
      <?php get_template_part('component/widget', 'content-header-singular'); ?>
    </div>
  </div>

  <div class="l-content__body">
    <div class="c-container _lg_ _readable_">
      <?php get_template_part( 'component/article-sample-single'); ?>
    </div>
  </div>

  <div class="l-content__footer">
    <div class="c-container _lg_">
      <?php get_template_part('component/widget', 'content-footer-singular'); ?>
    </div>
  </div>
</div><!-- .l-content -->

<?php get_footer();
