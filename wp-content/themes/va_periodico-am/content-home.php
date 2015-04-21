<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-6') ?>>
	<header>
		<figure class="image-article">
			<a role="article" href="<?php esc_url(the_permalink()) ?>">
				<?php the_post_thumbnail(  ) ?>
			</a>
		</figure>
		<h2>
			<a role="article" href="<?php esc_url(the_permalink()) ?>"><?php echo get_the_title() ?></a>
		</h2>
	</header>
	<div class="content-post">
		<?php the_excerpt(); ?>
	</div>
	<div class="meta">
		<div class="category"><?php the_category(', ') ?></div>
		<span class="date"><?php the_time('j \d\e F Y') ?></span> 
		<span class="comments"><?php comments_number('0', '1', '%'); ?></span>
	</div>
</div>