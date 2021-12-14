<?php

$args    = array(
	'numberposts'    => -1,
	'orderby'        => 'rand',
	'order'          => 'DESC',
	'post_type'      => 'sample',
	'post_status'    => 'publish',
	'tax_query'      => array(
    array(
      // 'relation' => 'OR',
      'taxonomy' => 'sample-material',
      'field'    => 'slug',
      'terms'    => $post->post_name,
    )
	),
);

$myposts = get_posts( $args );

if ( $myposts ) : ?>
  <h3>関連する造形サンプル</h3>
  <div class="c-sample slick-sample-single">
	<?php
	foreach ( $myposts as $post ) :
		setup_postdata( $post );
		?>
		<?php get_template_part( 'component/article-sample-archive' ); ?>
		<?php
	endforeach;
	wp_reset_postdata();
	?>
  </div>
<?php endif; ?>
