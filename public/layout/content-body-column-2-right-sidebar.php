<div class="l-content__body">
  <div class="c-container _lg_ _readable_">
    <div class="c-row _xl_">
      <div class="c-col _pc8_">

        <main class="l-main">
          <?php if (have_posts()) :
            while (have_posts()) :
              the_post(); ?>
              <?php
              if (get_post_type() === 'hardware') {
                get_template_part('component/entry', 'hardware');
              } else {
                get_template_part('component/entry');
              }
              ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </main>
      </div>

      <div class="c-col _pc4_">
        <?php get_sidebar(); ?>
      </div>
    </div><!-- c-row -->
  </div><!-- c-container -->
</div><!-- l-content__body -->
