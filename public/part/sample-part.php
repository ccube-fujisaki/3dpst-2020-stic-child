<?php
// なにかやろうとしていたところらしいが現在使っていない 2020/7/28 13:26
if(have_rows('sample-part')) {
while(have_rows('sample-part')): the_row();

  if(!empty(get_sub_field('name'))) {
    echo '<h4 class="sample-part__heading sample__content__heading">' . get_sub_field('name') . '</h4>';
  }

  $width = get_sub_field('width');
  $depth = get_sub_field('depth');
  $height = get_sub_field('height');

  if($width !== '' && $depth !== '' && $height !== '') {
    $size = sprintf('%d x %d x %d mm', $width, $depth, $height);
  } else {
    $size = '';
  }

  $price = get_sub_field('price') !== '' ? number_format(get_sub_field('price')) . '円' :  '';
  $items = array(
    '素材' => get_sub_field('material'),
    'カラー' => get_sub_field('color'),
    'サイズ' => $size,
    '参考価格' => $price,
    '備考' => get_sub_field('ex')
  );
  ?>
  <table class="c-table _stripe_">
    <tbody>
      <?php
      foreach($items as $key => $val):
        if(!empty($val)): ?>
          <tr>
            <th><?php echo $key; ?></th>
            <td><?php echo $val; ?></td>
          </tr>
        <?php
        endif;
      endforeach; ?>
    </tbody>
  </table>
  <?php

endwhile;
}
?>
