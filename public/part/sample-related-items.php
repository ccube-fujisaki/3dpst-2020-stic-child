<?php

$args = array(
  'posts_per_page'   => 12,
  'numberposts'      => 12,
  'orderby'          => 'rand',
  'order'            => 'DESC',
  'exclude'          => get_the_ID(),
  'post_type'        => 'sample',
  'post_status'      => 'publish',
  'tax_query'        => array(
    'relation' => 'OR',
    // get_tax_query_array('sample-printer'),
    stic_get_tax_query_array('sample-material'),
    stic_get_tax_query_array('sample-tag')
  )
);
$myposts = get_posts($args);

if( $myposts ): ?>
  <h3>関連する造形サンプル</h3>
  <div class="c-sample slick-sample-single">
    <?php foreach ( $myposts as $post ): setup_postdata( $post ); ?>
      <?php get_template_part( 'component/article-sample-archive' ); ?>
    <?php endforeach; wp_reset_postdata(); ?>
  </div>
<?php endif; ?>
