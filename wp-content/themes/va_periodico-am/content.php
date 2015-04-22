<div id="post-<?php the_ID(); ?>" class="col-sm-12">
	<h2>
		<?php echo get_the_title() ?>
	</h2>
	<div class="meta">
		<div class="category"><?php the_category(', ') ?></div>
		<span class="date"><?php the_date('j \d\e F Y') ?></span> 
		<span class="comments"><?php comments_number('0', '1', '%'); ?></span>
	</div>
<!--	<figure class="image-article">
		<?php //the_post_thumbnail() ?>
	</figure> -->
	<?php the_content(); ?>
	<?php //comments_template('',true); ?>
<!-- 	<p>Relacionadas</p>
	<p>Comentarios</p> -->
</div>