<?php get_header(); ?>
<?php $class = "" ?>
	<?php if(is_home()): ?>
		<?php echo get_new_royalslider(2); ?>
		<?php query_posts("cat=-14"); ?>
	<?php else: ?>
		<?php $class = "post-individual" ?>
	<?php endif; ?>

	<div class="content row">
		<div class="col-sm-8 <?php echo $class ?>">
			<?php while ( have_posts() ) : the_post() ?>
				<?php if(is_home()): ?>
				<?php get_template_part( 'content-home', get_post_format() ); ?>
				<?php else: ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endif ?>
			<?php endwhile; ?>
		</div>
	<?php /* Este row se cierra en el footer /**/ ?>
<?php get_footer(); ?>