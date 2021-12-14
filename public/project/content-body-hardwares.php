<?php $args = array(
  'posts_per_page'   => -1,
  'offset'           => 0,
  'category'         => '',
  'category_name'    => '',
  'orderby'          => 'menu_order',
  'order'            => 'ASC',
  'include'          => '',
  'exclude'          => '',
  'meta_key'         => '',
  'meta_value'       => '',
  'post_type'        => 'hardware',
  'post_mime_type'   => '',
  'post_parent'      => '',
  'author'     => '',
  'post_status'      => 'publish',
  'suppress_filters' => true
);
$myposts = get_posts($args);

if ($myposts) : ?>
  <div class="p-archive" style="margin-top: 2rem;">
    <div class="c-row _md_">
      <?php foreach ($myposts as $post) : setup_postdata($post); ?>

        <article id="<?php echo the_ID(); ?>" <?php echo post_class('c-col _tablet6_ p-archive__item'); ?>>
          <?php get_template_part('component/summary-card', 'hardware'); ?>
        </article>
      <?php
      endforeach;
      wp_reset_postdata(); ?>
    </div>
  </div>
<?php
endif;
