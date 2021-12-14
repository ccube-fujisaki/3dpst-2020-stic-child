<div class="p-sample__figure">

<figure class="p-sample__image">

  <?php
	$img         = get_the_post_thumbnail( get_the_ID(), 'square' );
	$img_id      = get_post_thumbnail_id( get_the_ID() );
  $description = get_post( $img_id )->post_content;

if ( has_post_thumbnail() ) {
	  $html = sprintf( '<a href="%s" class="p-sample__image__a venobox" data-gall="gall1" data-title="%s">%s</a>', get_the_post_thumbnail_url(), $description, $img );

}
	echo $html;
	?>
  <p class="p-sample__image__text">画像をクリックで拡大</p>
</figure>

<div class="p-sample__thumbnail">
  <?php if ( have_rows( 'sample-images' ) ) : ?>
	<div class="c-row _xs_">

		<?php
		while ( have_rows( 'sample-images' ) ) :
      the_row();
      $thumbnail_id = get_sub_field('image', 'thumbnail');
      $url = wp_get_attachment_url($thumbnail_id);
			?>
		<div class="c-col _phone4_ _tablet3_ _pc3_">
		  <figure class="col-min-3 p-sample__thumbnail__item">
			<a href="<?php echo $url; ?>" class="venobox" data-gall="gall1" data-title="<?php echo $description; ?>">
			  <?php echo wp_get_attachment_image( $thumbnail_id ); ?>
			</a>
		  </figure>
		</div>
	  <?php endwhile; ?>

	</div><!-- c-row -->
  <?php endif; ?>

</div><!-- p-sample__thumbnail -->
</div><!-- p-sample__figure -->
