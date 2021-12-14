<?php // 関連するブログ記事
$args = array(
  'posts_per_page'   => -1,
  'numberposts'      => -1,
  'orderby'          => 'post_date',
  'order'            => 'DESC',
  'post_type'        => 'post',
  'post_status'      => 'publish'
);

$myposts = get_posts($args);
$current_id = get_the_ID();

foreach ( $myposts as $post ) : setup_postdata( $post );
  if ( have_rows( 'post-related-sample' )):
    while ( have_rows( 'post-related-sample' )): the_row();
      $sample_id = ( int ) get_sub_field( 'id' );
      if ( $current_id === $sample_id ) {
        $related_posts[] = $post;
      }
    endwhile;
  endif;
endforeach; wp_reset_postdata(); ?>

<?php if ($related_posts): ?>
  <h2>関連するブログ記事</h2>
  <div class="c-row">
    <?php foreach ( $related_posts as $post ) : setup_postdata ($post); ?>
      <div class="c-col _phone6_">
        <?php get_template_part( 'component/summary-card-simple' ); ?>
      </div>
    <?php endforeach; wp_reset_postdata(); ?>
  </div>

<?php endif; ?>
