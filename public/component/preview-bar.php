<?php
$url = home_url('/preview');
$user = wp_get_current_user();
$name = $user->data->display_name;
?>
<div class="preview-bar">
  <div class="container preview-bar__container">
    <a class="preview-bar__item" href="<?php echo $url; ?>">確認ページ一覧へ</a>
    <span class="preview-bar__item preview-bar__item--name">こんにちは、<?php echo $name; ?>さん</span>
    <a class="preview-bar__item preview-bar__item--logout" href="<?php echo wp_logout_url($url); ?>">ログアウト</a>
  </div>
</div>
