<!DOCTYPE html>
<html lang="ja">
<head prefix:og="http://ogp.me/ns#">
  <meta charset="UTF-8">
  <?php wp_head(); ?>
</head>

<body <?php body_class( 'site' ); ?>>

<header class = 'l-header' >
  <?php
	get_template_part( 'project/global-nav' );
	?>
</header>
