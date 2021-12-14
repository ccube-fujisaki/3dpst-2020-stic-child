<div class="c-sample _page_">
  <div class="c-container ">
    <div class="c-row _xs_">
      <?php
        $args = array(
          'posts_per_page' => -1,
          'orderby'        => 'post_date',
          'order'          => 'DESC',
          'post_type'      => 'sample'
        );

        $myposts = get_posts( $args );
        foreach( $myposts as $post ): setup_postdata( $post );
      ?>

        <div class="c-col _phone6_ _tablet4_ _pc3_">
          <?php get_template_part( 'component/article-sample-archive' ); ?>
        </div>

      <?php endforeach; wp_reset_postdata(); ?>

    </div>
  </div>
</div>
