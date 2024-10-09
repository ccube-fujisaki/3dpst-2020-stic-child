<?php
$color    = get_field('sample-color');
$width    = get_field('sample-size-width');
$depth    = get_field('sample-size-depth');
$height   = get_field('sample-size-height');
$size_ex  = get_field('sample-size-ex');
$price    = get_field('sample-price');
$price_ex = get_field('sample-price-ex');
$date     = get_field('sample-date');
$date_ex  = get_field('sample-date-ex');
$printers = get_the_terms(get_the_ID(), 'sample-printer');
?>
<table class="c-table _stripe_">
  <tbody>
    <?php if (!empty($materials) && is_array($materials)): ?>
      <tr>
        <th>素材</th>
        <td>
          <?php
          $item = array();
          foreach ($materials as $material) {
            $page = get_page_by_path('service/material/' . $material->slug);
            if ($page && isset($page->ID)) {
              $item[] = sprintf('<a href="/service/material/#post-%s">%s</a>', esc_attr($page->ID), esc_html($material->name));
            } else {
              $item[] = esc_html($material->name);
            }
          }
          echo implode(' / ', $item);
          ?>
        </td>
      </tr>
    <?php endif; ?>
    <?php if ($color): ?>
      <tr>
        <th>カラー</th>
        <td><?php echo $color; ?></td>
      </tr>
    <?php endif; ?>
    <?php if ($width && $depth && $height): ?>
      <tr>
        <th>サイズ</th>
        <td>
          <div class="inline-block">
            W<?php echo $width; ?> x
            D<?php echo $depth; ?> x
            H<?php echo $height; ?> mm
          </div>
          <?php if ($size_ex): ?>
            <div class="inline-block tiny-text">
              （<?php echo $size_ex; ?>）
            </div>
          <?php endif; ?>
        </td>
      </tr>
    <?php endif; ?>
    <?php if ($price): ?>
      <tr>
        <th>参考価格</th>
        <td>
          <div class="inline-block">
            <?php echo number_format($price) . '円'; ?>
          </div>
          <?php if ($price_ex): ?>
            <div class="inline-block tiny-text">
              （<?php echo $price_ex; ?>）
            </div>
          <?php endif; ?>
        </td>
      </tr>
    <?php endif; ?>
    <?php if ($date): ?>
      <tr>
        <th>参考納期</th>
        <td>
          <div class="inline-block">
            <?php echo $date ?>日
          </div>
          <?php if ($date_ex): ?>
            <div class="inline-block tiny-text">
              （<?php echo $date_ex; ?>）
            </div>
          <?php endif; ?>
        </td>
      </tr>
    <?php endif; ?>
    <?php if ($printers): ?>
      <tr>
        <th>使用プリンタ</th>
        <td>
          <?php
          $item = array();
          foreach ($printers as $printer) {
            $page = get_page_by_path('service/printer/' . $printer->slug);

            if ($page) {
              $item[] = sprintf('<a href="%s">%s</a>', get_permalink($page->ID), $printer->name);
            } else {
              $item[] = $printer->name;
            }
          }
          echo implode(' / ', $item);
          ?>
        </td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>