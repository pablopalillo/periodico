<?php

function periodico_setup()
{
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'a-la-medida', 135, 125, true );
	add_image_size( 'edicion-impresa', 290, 325, true );
	add_image_size( 'periodico-full-width', 1038, 576, true );

	// Usamos el nav_menu
	register_nav_menu( 'main-menu', 'Menú principal' );
	register_nav_menu( 'util-menu', 'Menú utilitario' );
}
// añadimos la funcion periodico_setup(), cuando se activa el tema.
add_action( 'after_setup_theme', 'periodico_setup' );

/**
 * registra los widgtets del tema , 
 * registre los temas que necesite en esta funcion
 *
 * @return void
 **/
function periodico_widget_init()
{

	register_sidebar( 
		array(
			'id'    		=> 'widget-ads-horizontal',
			'name'			=> "widget-ads-horizontal",
			'description'	=> 'Contenido para los banners horizontales',
			'before_widget' => '<div id="%1$s" class="widget-ads-horizontal" >',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar( 
		array(
			'id'    		=> 'redes-sociales',
			'name'			=> "redes-sociales",
			'description'	=> 'Contenido para los íconos de redes sociales',
			'before_widget' => '<div id="%1$s" class="redes-sociales" >',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar( 
		array(
			'id'    		=> 'sidebar',
			'name'			=> "sidebar",
			'description'	=> 'Sidebar',
			'before_widget' => '<div id="%1$s" class="widget-%1$s" >',
			'after_widget'  => '</div>',
		)
	);
}
add_action( 'widgets_init', 'periodico_widget_init' );


/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function periodico_wp_title( $title, $sep ) 
{
	global $paged, $page;

	if ( is_feed() ) 
	{
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) 
	{
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'periodico' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'periodico_wp_title', 10, 2 );

/**
 * scripts comunes en todo el sitio -
 * basicamente utizados para implementar el estilo por defecto
 * style.css y los estilos de boostrap
 * utilizalos con responsabilidad.
 *
 **/
function periodico_styles()
{ 
	// add general style
	wp_enqueue_style( 'style', get_template_directory_uri().'/style.css',array(),'3.0.2' );

	// add css bootstrap
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/bootstrap-3.3.1/css/bootstrap.min.css',array(),'3.3.1' );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri().'/bootstrap-3.3.1/css/bootstrap-theme.min.css',array(),'3.3.1' );
	wp_enqueue_style( 'bootstrap-map', get_template_directory_uri().'/bootstrap-3.3.1/css/bootstrap.css.map',array(),'3.3.1' );
	wp_enqueue_style( 'bootstrap-theme-map', get_template_directory_uri().'/bootstrap-3.3.1/css/bootstrap-theme.css.map',array(),'3.3.1' );
} 
add_action( 'wp_enqueue_scripts', 'periodico_styles' );


/**
 * scripts utilizados globalmente.
 * No incluyas scripts que sean comunes para el sitio.
 * intenta siempre incluirlos al final.
 * utilizalos con responsabilidad.
 *
 **/
function periodico_scripts()
{ 
	//add jquery
	wp_enqueue_script('jquery','/wp-includes/js/jquery/jquery.js',false,'1.11.0',true);

	//add scripts boostrap , con la opcion de cargar al final.
	wp_enqueue_script('bootstrap.min', get_template_directory_uri().'/bootstrap-3.3.1/js/bootstrap.min.js',false,'3.3.1',true);

	wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.js',false,'1.0',true);
} 
add_action( 'wp_enqueue_scripts', 'periodico_scripts' );

/**
* Funcion que inicia los widgets , se debe incluir la clase 
* que contiene el widget continuacion para luego registrarlos
*
**/

function periodicoWidgets()
{
	//add classes
	//include_once(TEMPLATEPATH.'/widgets/widget-social.php');
	//include_once(TEMPLATEPATH.'/widgets/widget-banner.php');
	//add widget
 	//register_widget( 'Widget_Social' );
 	//register_widget( 'Widget_Banner' );

}
add_action( 'widgets_init', 'periodicoWidgets' );



/**
* bt_pagination
* Funcion para crear paginado adaptado al estilo de boostrap
*
* @version  1.0
* @author Pablo Martínez
*/
function bt_pagination() 
{
	$prev_arrow = is_rtl() ? '&laquo;' : '&laquo;';
	$next_arrow = is_rtl() ? '&raquo;' : '&raquo;';

	global $wp_query;
	$curr 	= get_query_var('paged');
	settype($curr, "int"); 

	$total 	= $wp_query->max_num_pages;
	$big = 999999999;
	if( $total > 1 )  
	{
		if( !$current_page = $curr )
		{
			$current_page = 1;
		}
		if( get_option('permalink_structure') ) 
		{
			$format = 'page/%#%/';
		} else 
		{
			$format = '&paged=%#%';
		}

		$pag = paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, $curr ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
				) );

		$replace = str_replace("<li><span class='page-numbers current'>","<li class='active'><span class='page-numbers current'>", $pag );
		$replace = str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $replace );

		echo $replace;
	}
}


/**
* custon_nav_class
* filtro ejecutado desde bt_menu
*
**/

function custom_nav_class($classes, $item)
{
	if( array_search("menu-item-has-children", $classes) 
		&& !$item->menu_item_parent  
	  )
	{
		$classes[] = "dropdown";
	}

	return $classes;
}	



/**
 * bt_menu 
 * Menu creado cuando se implementa bootstrap
 * Para mas informacion puede consultar en 
 * esta documentacion 
 * http://codex.wordpress.org/Function_Reference/wp_get_nav_menu_items#Building_simple_menu_list
 *
 * @return string
 * @author Pablo Martínez
 **/

function bt_menu()
{
	add_filter('nav_menu_css_class' , 'custom_nav_class' , 10 , 2);
	$menu = wp_nav_menu(
		array(
			'theme_location' => 'main-menu',
			'menu_class' => 'nav navbar-nav',
			'echo' => false
			)
		);

	$rp_menu = str_replace('dropdown"><a','dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"', $menu);
	$rp_menu = str_replace('class="sub-menu"','class="sub-menu dropdown-menu"', $rp_menu);

	// Bootstrap estrucure
	echo 	'<nav id="menu-principal" class="navbar navbar-default" role="navigation">'
			.'<div class="navbar-header">'
			.'<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-inicio">'
			.'<span class="sr-only">Toggle navigation</span>'
				.'<span class="icon-bar"></span>'
				.'<span class="icon-bar"></span>'
				.'<span class="icon-bar"></span>'
			.'</button>'
				  .'<span class="hidden-sm hidden-md hidden-lg navbar-brand" data-toggle="collapse" data-target="#barra-inicio" >Menú</span>'
				.'</div>'
    			.'<div id="barra-inicio" class="collapse navbar-collapse">'
				.$rp_menu
				.'</div>'
			.'</nav>';
}


/**
 * getSubcategories
 *
 * Permite obtener subcategorias dependiendo
 * de una categoria padre.
 *
 * @param codigo de la categoria padre, extraido generalmente con esta funcion
*		  get_cat_ID( single_cat_title("", false) ); 
 * @return array
 * @author Pablo Martínez
 **/
function getSubcategories($parent)
{
	settype($parent, 'int');

	$args = array(
		'orderby' => 'id',
		'parent'  => $parent
		);

	$categories = get_categories( $args );

	if($categories == NULL || count($categories) == 0 )
	{
		return NULL;
	}

	return $categories;
}

function newrs_add_custom_variables($m, $data, $options) {
    $m->addHelper('custom_date', function() {
    	$timestamp = strtotime($data->post_date);
    	$date = date_i18n('j \d\e F Y', $timestamp);
    	return $date;
    } );
    $m->addHelper('custom_comments', function() {
    	$comments = "$data->comment_count";
    	return $comments;
    } );
}
add_filter('new_rs_slides_renderer_helper', 'newrs_add_custom_variables', 10, 4);

/* Adición de skin personalizado para el slider /**/
add_filter('new_royalslider_skins', 'new_royalslider_add_custom_skin', 10, 2);
function new_royalslider_add_custom_skin($skins) {
      $skins['periodico'] = array(
           'label' => 'Periódico',
           'path' => get_bloginfo('template_url') . '/new-royalslider/periodico/periodico.css'
      );
      return $skins;
}