<div class="p-sample__figure">

<figure class="p-sample__image">
  <?php
    $img = get_the_post_thumbnail(get_the_ID(), 'square');
    $img_id = get_post_thumbnail_id(get_the_ID());
    $description = get_post( $img_id )->post_content;

    if(has_post_thumbnail()) : ?>
      <img
        id="material-eyecatch"
        src="<?php echo get_the_post_thumbnail_url(); ?>"
        alt="<?php echo $descripion; ?>"
      >

    <?php endif; ?>
    <figcaption id="material-caption" class="p-sample__figcaption"></figcaption>
</figure>


</div><!-- p-sample__figure -->
