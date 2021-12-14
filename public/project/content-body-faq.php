<dl class="faq">
  <?php $args = array(
	'posts_per_page' => -1,
	'numberposts'    => -1,
	'post_type'      => 'q-and-a',
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
	'post_status'    => array( 'publish', 'private' ),
);

  $custom_posts = get_posts( $args );

if ( $custom_posts ) :
	foreach ( $custom_posts as $post ) :
		setup_postdata( $post ); ?>
	<dt class="faq__title"><?php the_title(); ?></dt>
	<dd class="faq__content">
		<?php the_content(); ?>
		<?php echo stic_edit_button(); ?>
	</dd>
	  <?php endforeach; ?>

  <?php else : // 記事が無い場合 ?>
	<p>まだFAQがありません。</p>
	  <?php
	  endif;
	  wp_reset_postdata(); // クエリのリセット
	?>
</dl><!--faq-->
