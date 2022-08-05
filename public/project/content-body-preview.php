<?php if (!is_user_logged_in()) : ?>
	<div class="p-preview-login" style="margin-top: 24px;">
		<?php
		$args = array(
			'echo'           => true,
			'redirect'       => home_url('/preview'),
			// 'redirect'       => ( is_ssl() ? 'https://': 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
			'form_id'        => 'loginform',
			'label_username' => __('Username'),
			'label_password' => __('Password'),
			'label_remember' => __('Remember Me'),
			'label_log_in'   => __('Log In'),
			'id_username'    => 'user_login',
			'id_password'    => 'user_pass',
			'id_remember'    => 'rememberme',
			'id_submit'      => 'wp-submit',
			'remember'       => true,
			'value_username' => '',
			'value_remember' => false,
		);
		wp_login_form($args);
		?>
	</div>
<?php else : ?>
	<?php
	// $user = wp_get_current_user();
	$is_author = current_user_can('publish_posts');
	$author_id = $is_author ? '' : get_current_user_id();

	$args = array(
		'posts_per_page' => -1,
		'numberposts'    => -1,
		'orderby'        => 'post_date',
		'order'          => 'DESC',
		'post_type'      => array('post', 'page', 'sample', 'q-and-a', 'download', 'material', 'hardware'),
		'post_status'    => 'pending',
		'author'         => $author_id,
	);

	$myposts = get_posts($args);

	if ($myposts) :
	?>

		<div class="c-row u-mt5">
			<?php
			foreach ($myposts as $post) :
				setup_postdata($post);
			?>
				<div class="c-col _tablet6_">
					<?php get_template_part('component/summary-card'); ?>
				</div>
			<?php
			endforeach;
			wp_reset_postdata();
			?>

		</div>
		<!--row-->

	<?php else : ?>
		<div class="widget" style="margin-top: 24px;">
			<div>このユーザーの公開前の記事はありません。</div>
		</div>
	<?php endif; ?>
<?php endif;
