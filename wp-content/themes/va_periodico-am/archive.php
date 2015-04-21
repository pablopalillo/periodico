<?php get_header(); ?>
<div class="container-fluid">
		<div class="col-sm-8">
			<h1 class="page-title post" style="height:auto;width:100%;">
			<?php if (is_category())
				{
					single_cat_title() ;
			 	} elseif (is_tag()) 
			 	{
					single_tag_title();
				} 
				  elseif (is_day()) 
				{
					the_time('l, F j, Y');
				} elseif (is_month()) 
				{
					the_time('F Y');
				} elseif (is_year()) 
				{
					the_time('Y');
				}
			?>
			</h1>
			<?php while ( have_posts() ) : the_post() ?>
				<?php get_template_part( 'content-home', get_post_format() ); ?>
			<?php endwhile; ?>
			<div class="pag">
				<?php
				/* paginacion marca telemedellin */
				if ( function_exists( 'bt_pagination' ) ) 
				{
					bt_pagination();
				}
				?>
			</div>
		</div>
	<?php /* Este row se cierra en el footer /**/ ?>
<?php get_footer(); ?>
