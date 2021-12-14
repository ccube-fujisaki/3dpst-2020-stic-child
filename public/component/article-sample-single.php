<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('p-sample c-entry'); ?>>

      <div class="c-entry__body">
        <div class="c-row _lg_">

          <div class="c-col _pc6_">
            <?php get_template_part('part/sample-figure'); ?>
          </div><!-- c-col -->

          <div class="c-col _pc6_">
            <div class="p-sample__content">
              <h1 class="p-sample__title"><?php the_title(); ?></h1>

              <div class="p-sample__tag">
                <?php
                $taxonomies = ['sample-material', 'sample-tag'];
                foreach ($taxonomies as $taxonomy) {
                  $terms = get_the_terms(get_the_ID(), $taxonomy);
                  if ($terms) {
                    foreach ($terms as $term) {
                      printf('<div class="p-sample__tag__item"><a class="p-sample__tag__a" href="/%s/%s/">%s</a></div>', $term->taxonomy, $term->slug, $term->name);
                    }
                  }
                }
                ?>
              </div><!-- p-sample__tag -->

              <div class="p-sample__description">
                <?php the_content(); ?>
              </div>

              <?php get_template_part('part/sample-table'); ?>

            </div><!-- p-sample__content -->
          </div><!-- c-col -->

        </div><!-- c-row -->
      </div><!-- c-entry__body -->

      <div class="c-entry-footer">
        <div class="c-row _lg_">

          <div class="c-col _pc6_">
            <?php get_template_part('part/sample-related-items'); ?>
          </div>

          <div class="c-col _pc6_">
            <?php get_template_part('part/sample-related-posts'); ?>
          </div>

        </div>
      </div><!-- c-entry-footer -->
    </article>

<?php endwhile;
endif; ?>
