<?php
/*
YARPP Template: stic
Description: Requires a theme which supports post thumbnails
Author: Takashi Fujisaki
*/ ?>


<?php if (have_posts()) : ?>
	<h3 class="c-widget__title">関連記事</h3>
	<div class="c-summary">
		<?php while (have_posts()) : the_post(); ?>
			<?php if (has_post_thumbnail()) : ?>
				<a class="post-list__item col-md-half" href="<?php the_permalink() ?>" rel="bookmark">
					<div class="post-list__img">
						<?php the_post_thumbnail('thumbnail'); ?>
					</div>
					<div class="post-list__content">
						<h4 class="post-list__title"><?php the_title(); ?></h4>

					</div>
				</a>
			<?php endif; ?>
		<?php endwhile; ?>
	</div>

<?php endif; ?>