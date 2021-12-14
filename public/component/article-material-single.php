<?php if (have_posts()) :
  while (have_posts()) :
    the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('p-sample c-entry'); ?>>
      <div class="c-entry__body">
        <div id="post_id" style="display: none;"><?php echo the_ID(); ?></div>
        <div class="c-row _lg_">

          <div class="c-col _pc6_">
            <?php get_template_part('part/material-figure'); ?>

            <?php if (have_rows('material-color')) : ?>
              <h3 class="u-mt5">カラー</h3>
              <div class="p-sample__variation">
                <div class="c-image-list">
                  <?php
                  while (have_rows('material-color')) :
                    the_row();
                  ?>
                    <?php
                    if (!wp_get_attachment_url(get_sub_field('image'))) {
                      $class = sprintf(' _%s_', get_sub_field('color')['value']);
                    }
                    $label = get_sub_field('custom-label') !== '' ? get_sub_field('custom-label') : get_sub_field('color')['label'];
                    ?>
                    <div class="c-image-list__item<?php echo $class; ?>" aria-label="<?php echo $label; ?>" data-balloon-pos="up" data-balloon-length="small">
                      <div class="c-image-list__image">
                        <?php if (wp_get_attachment_image_url(get_sub_field('image'))) : ?>
                          <img src="<?php echo wp_get_attachment_image_url(get_sub_field('image'), 'thumbnail'); ?>" alt="<?php echo $label; ?>" @click="getImage(<?php echo get_sub_field('image'); ?>)" data-url="<?php echo wp_get_attachment_image_url(get_sub_field('image'), 'square'); ?>">
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endwhile; ?>
                </div>
              </div>
            <?php endif; ?>
          </div><!-- c-col -->

          <div class="c-col _pc6_">
            <div class="p-sample__content">
              <h1 class="p-sample__title"><?php the_title(); ?></h1>
              <p class="p-sample__summary"><?php the_field('material-summary'); ?>

                <?php if ($terms = get_the_terms(get_the_ID(), 'material-feature')) : ?>
              <div class="p-sample__tag">
                <?php foreach ($terms as $term) : ?>
                  <div class="p-sample__tag__item"><?php echo esc_html($term->name); ?></div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <?php if ($terms = get_the_terms(get_the_ID(), 'material-usage')) : ?>
              <div class="p-sample__tag">
                <?php foreach ($terms as $term) : ?>
                  <div class="p-sample__tag__item"><?php echo esc_html($term->name); ?></div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <div class="p-sample__description">
              <?php the_content(); ?>
            </div>

            <?php
            if ($terms = get_the_terms(get_the_ID(), 'material-printer')) :
            ?>
              <h3>対応プリンタ</h3>
              <ul class="c-list c-list--style-none">
                <?php foreach ($terms as $term) : ?>
                  <?php
                  if ($term->term_id === 158 || $term->term_id === 180) {
                    continue;
                  }
                  ?>
                  <?php // $path = sprintf( '/materials?%s=%s', $term->taxonomy, rawurlencode( $term->slug ) );
                  ?>
                  <li><?php echo $term->name; ?></li>
                  <!-- <li><a href="<?php // echo home_url( $path );
                                    ?>"><?php // echo $term->name;
                                        ?></a></li> -->
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
            </div><!-- p-sample__content -->
          </div><!-- c-col -->

        </div><!-- c-row -->
      </div><!-- c-entry__body -->

      <div class="c-entry-footer">
        <div class="c-row _lg_">

          <div class="c-col _pc6_">
            <?php get_template_part('part/sample-related-material-items'); ?>
          </div>

          <div class="c-col _pc6_">
            <?php get_template_part('part/sample-related-posts'); ?>
          </div>

        </div>
      </div><!-- c-entry-footer -->
    </article>

<?php endwhile;
endif; ?>
