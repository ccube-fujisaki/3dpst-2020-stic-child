<?php // 造形サンプル一覧を表示させる
if ( !$related_samples = get_field('post-related-sample')[0] ) return;

$args = array(
  'posts_per_page'   => -1,
  'numberposts'      => -1,
  'orderby'          => 'post_date',
  'order'            => 'DESC',
  'include'          => $related_samples,
  'post_type'        => 'sample',
  'post_status'      => [ 'publish', 'draft', 'pending', 'future' ],
  'suppress_filters' => true
);

if ( !$myposts = get_posts($args)) return;
?>

<div class="c-related-sample">
  <h2>この記事に関連する造形サンプル</h2>
  <div class="c-sample">
    <div class="c-row _xs_">
      <div class="c-col _phone6_ _tablet4_ _pc3_">
      <?php
      foreach($myposts as $post) : setup_postdata($post);
        get_template_part( 'component/article-sample-archive' );
      endforeach; wp_reset_postdata();
      ?>
      </div>
    </div>
  </div>
</div>
