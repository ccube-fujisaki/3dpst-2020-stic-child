<?php
$taxonomies = get_post_taxonomies(get_the_ID());
$_taxonomy  = !empty($taxonomies[0]) ? $taxonomies[0] : false;
$terms      = ($_taxonomy) ? get_the_terms(get_the_ID(), $_taxonomy) : [];

if ($terms) : ?>
  <div class="c-taxonomy">
    <?php foreach ($terms as $_term) : ?>
      <span class="c-term _<?php echo esc_attr($_taxonomy); ?>-<?php echo esc_attr($_term->slug); ?>_ c-term">
        <?php echo esc_html($_term->name); ?>
      </span>
      <?php break; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>