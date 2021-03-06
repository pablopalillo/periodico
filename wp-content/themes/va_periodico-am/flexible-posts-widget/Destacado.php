<?php
/**
 * Flexible Posts Widget: Old Default widget template
 * 
 * @since 1.0.0
 *
 * This is the ORIGINAL default template used by the plugin.
 * There is a new default template (default.php) that will be 
 * used by default if no template was specified in a widget.
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( !empty($title) )
	echo $before_title . $title . $after_title;

if( $flexible_posts->have_posts() ):
?>
	<div class="dpe-flexible-posts destacado">
	<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
			<a href="<?php echo the_permalink(); ?>">
				<?php 
				$title = get_the_title();
				$meta_title = get_post_meta($post->ID, 'titulo', true);
				if($meta_title != '') $title = $meta_title;
				?>
				<h4 class="title"><?php echo $title; ?></h4>
				<div class="inner">
				<?php
					if( $thumbnail == true ) {
						// If the post has a feature image, show it
						if( has_post_thumbnail() ) {
							the_post_thumbnail( $thumbsize );
						// Else if the post has a mime type that starts with "image/" then show the image directly.
						} elseif( 'image/' == substr( $post->post_mime_type, 0, 6 ) ) {
							echo wp_get_attachment_image( $post->ID, $thumbsize );
						}
					}
				?>
				<?php 
				$excerpt = get_the_excerpt();
				$meta_excerpt = '<p>'.get_post_meta($post->ID, 'descripcion', true).'</p>';
				if($meta_excerpt != '') $excerpt = $meta_excerpt;
				?>
				<?php echo $meta_excerpt; ?>
				</div>
			</a>
	<?php endwhile; ?>
	</div><!-- .dpe-flexible-posts -->
<?php else: // We have no posts ?>
	<div class="dpe-flexible-posts no-posts">
		<p><?php _e( 'No post found', 'flexible-posts-widget' ); ?></p>
	</div>
<?php	
endif; // End have_posts()
	
echo $after_widget;
