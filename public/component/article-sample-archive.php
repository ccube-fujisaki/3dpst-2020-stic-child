<div class="c-sample__item">
  <div class="c-sample__img">
    <?php
    $size = 'square';
    $attr = array(
      'class' => "attachment-$size size-$size"
    );

    if (is_front_page()) {
      the_post_thumbnail($size, $attr);
    } else {
      the_post_thumbnail($size);
    }
    ?>
  </div>
  <!--sample__img-->

  <a class="c-sample__content" href="<?php the_permalink(); ?>">
    <h3 class="c-sample__title"><?php the_title(); ?></h3>
  </a>
  <!--sample__content-->
</div>
